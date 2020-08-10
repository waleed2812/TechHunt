// Jquery Code on startup and other functions
$(document).ready(function () {

    let current_page = (location.pathname.split('/').slice(-1)[0]);

    if(is_logged_in())
    {
        let navbar = $('#navbarCollapse ul:nth-child(3)');

        navbar.css('display','none');

        login(Cookies.get('email'),Cookies.get('password'),Cookies.get('remember_me'));

        if (current_page === "signin.html" || current_page === "signup.html")
            window.location.assign("index.html");
    }
    else
    {

        if (current_page === "cart.html" || current_page === "account.html" || current_page === "wishlist.html")
            window.location.assign("index.html");

        let navbar = $('#navbarCollapse ul:nth-child(4)');

        navbar.css('display','none');
    }

    if(current_page === "account.html") get_account_info();
    else if(current_page === "cart.html") cartload();
    else if(current_page === "wishlist.html") update_wl();

    // Sign Up Form
    $("#signupForm").submit(function () {

        return verify_name() && validate_password();

    });

    // Logging In
    $('#login').click( function () {
        login($('#email').val(), $('#password').val(), $('#remember_me').is(":checked"));
    });

    // Country Code Selector
    let selected_phone;
    let phone_code = $("#phone_code");

    phone_code.ready(function () {
        selected_phone = $("#phone_code option:selected");
        selected_phone.attr("label",$("#phone_code").val());
    })

    phone_code.change(function(){
        selected_phone.removeAttr("label");
        selected_phone = $("#phone_code option:selected");
        selected_phone.attr("label",$("#phone_code").val());
    })

    // Phone number Input
    $("#phone").on('input',function () {
        let pattern = new RegExp(/[^0-9]/g);
        let phone = $("#phone");
        phone.val(phone.val().replace(pattern,""));
    })

    // Password Update Form
    $("#password_update_form").submit(function () {
        return validate_password();
    })

    // Remove Errors Attributes
    $("input").keyup(function () {

        let inp = $("input");

        inp.removeClass("border-danger");
        inp.siblings("label").children('span').remove();

        $('#login_error').html("");
    })

    // Cart Remove
    $("button").click(function () {

        if ($( this ).html() === "See Details")
        {
            let item = [this.id];

            let details_req = new XMLHttpRequest();

            details_req.open('Get', 'php/item_info.php?id='+item[0]);

            details_req.send();

            details_req.onreadystatechange = function() {

                if (details_req.readyState === 4 && details_req.status === 200)
                {
                    $('body').append(details_req.responseText);
                }

            };
        }

    })

});

// Signin
function login(email, password, remember_me)
{
    let details_req = new XMLHttpRequest();

    details_req.open('POST', 'php/login.php');

    details_req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    details_req.send('email='+email+'&password='+password);

    details_req.onreadystatechange = function() {

        if (details_req.readyState === 4 && details_req.status === 200)
        {
            let response = details_req.responseText;
            console.log(response);

            if(response === 'Successfully Logged in')
            {
                if(remember_me)
                {
                    Cookies.set('email',email,{expires: 365});
                    Cookies.set('password',password,{expires: 365});
                    Cookies.set('remember_me',remember_me,{expires: 365});
                }
                else
                {
                    Cookies.set('email',email, {expires: 1});
                    Cookies.set('password',password, {expires: 1});
                    Cookies.set('remember_me',remember_me, {expires: 1});
                }
                window.location.assign("index.html");
            }
            else
            {
                $('#login_error').append(response);
            }
        }

    };
}

//Logout
function logout()
{
    Cookies.set('email',"");
    Cookies.set('password',"");
    Cookies.set('remember_me',"");

    let details_req = new XMLHttpRequest();

    details_req.open('GET', 'php/logout.php');

    let navbar = $('#navbarCollapse ul:nth-child(4)');

    navbar.css('display','none');

    navbar = $('#navbarCollapse ul:nth-child(3)');

    navbar.css('display','inline');



}

// Is logged in
function is_logged_in()
{
    return (Cookies.get('email') !== "") &&
        (Cookies.get('password') !== "") &&
        (Cookies.get('remember_me') !== "") &&
        (typeof (Cookies.get('email')) !== "undefined") &&
        (typeof (Cookies.get('password')) !== "undefined") &&
        (typeof (Cookies.get('remember_me')) !== "undefined");

}

// Validate if password matches password criteria
function validate_password()
{
    let password = $("#password");
    let cpassword = $("#cpassword")

    if (password.val() !== cpassword.val())
    {
        cpassword.addClass("border-danger");
        password.addClass("border-danger");
        password.siblings("label").append(
            '<span style="color:red"> (Password Does Not Match)</span>');
        return false;
    }

    let password_validation = new RegExp(/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/);

    if(!password_validation.test(password.val()))
    {
        cpassword.addClass("border-danger");
        password.addClass("border-danger");
        password.siblings("label").append(
            '<span style="color:red;font-size: 14px"> ' +
            '(Must uppercase, lowercase, and digit.)</span>');
        return false;
    }
    return true;
}

// Verify if the name of user is text only
function verify_name()
{
    let name_regexp = new RegExp(/[^A-Za-z\s]/g);
    let fname = $("#fname");
    let lname = $("#lname");

    if (name_regexp.test(fname.val()))
    {

        fname.addClass("border-danger");
        fname.siblings("label").append(
            '<span style="color:red"> (Only Alphabets)</span>');
        return false;
    }

    if (name_regexp.test(lname.val()))
    {
        lname.addClass("border-danger");
        lname.siblings("label").append(
            '<span style="color:red"> (Only Alphabets)</span>');
        return false;
    }

    return true;
}

// Add to Wl
function add_to_cart_wl(item_id, cart_wl)
{

    if(!is_logged_in())
    {
        show_popup('Not Logged in');
        return ;
    }

    let email = Cookies.get('email');

    let details_req = new XMLHttpRequest();

    details_req.open('Get', 'php/add_wl_cart.php?email='+email+'&item_id='+item_id+'&cart_wl='+cart_wl);

    details_req.send();

    details_req.onreadystatechange = function() {

        if (details_req.readyState === 4 && details_req.status === 200)
        {
            show_popup(details_req.responseText);
        }

    };

}

// Remove from cart
function remove_from_cart_wl(item_id, cart_wl)
{


    let details_req = new XMLHttpRequest();

    details_req.open('Get', 'php/remove_wl_cart.php?ID='+item_id+'&cart_wl='+cart_wl+'&email='+Cookies.get('email'));

    details_req.send();

    details_req.onreadystatechange = function() {

        if (details_req.readyState === 4 && details_req.status === 200)
        {
            show_popup(details_req.responseText);
            $("#"+item_id).remove();
            if(cart_wl === "cart") calprice();
        }

    };


}

// A Small popup to diplay certain messages to user
function show_popup(message)
{
    $('body').append('<div id="temp_popup" class="btn btn-dark position-fixed" ' +
        'style="bottom: 1%;left: 1%;">'+message+'</div>');

    let popup = $("#temp_popup");
    popup.hover( function () {
       popup.stop().fadeIn();
    });

    popup.mouseleave( function () {
        popup.fadeOut(3000);
    });

    popup.fadeOut(3000);
}

//Loading Items for wishlist
function update_wl()
{
    get_items("wishlist");
}
// Calculate Cart Price
function cartload()
{
    get_items("cart");
    get_account_info();
}

// Calculate price of items in cart
function calprice()
{

    let h2Tags = $("#cart h2");
    let sum = 0;
    for (let i = 0; h2Tags[i]; i++)
        sum += parseFloat(h2Tags[i].innerHTML.replace(/[^0-9]/g, ""));

    $("#total_price").html("Total: " + sum);
}

// Close the description div of items
function close_description()
{
    $( '#description' ).remove();
}

// Scroll the page to top
function scrollToTop(scrollDuration)
{
    let scrollStep = -window.scrollY / (scrollDuration / 15),
        scrollInterval = setInterval(function(){
            if ( window.scrollY !== 0 ) {
                window.scrollBy( 0, scrollStep );
            }
            else clearInterval(scrollInterval);
        },15);
}

// Get items in the cart
function get_items(cart_wl)
{
    let email = Cookies.get('email');

    let details_req = new XMLHttpRequest();

    details_req.open('Get', 'php/show_wl_cart.php?email='+email+'&cart_wl='+cart_wl);

    details_req.send();

    details_req.onreadystatechange = function() {

        if (details_req.readyState === 4 && details_req.status === 200)
        {
            $('#'+cart_wl).append(details_req.responseText);
            if(cart_wl === "cart") calprice();
        }

    };
}

//Show Account Info
function get_account_info()
{
    let details_req = new XMLHttpRequest();

    details_req.open('POST', 'php/give_account_info.php');

    details_req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    details_req.send('email='+Cookies.get('email'));

    details_req.onreadystatechange = function() {

        if (details_req.readyState === 4 && details_req.status === 200)
        {
            let response = details_req.responseText;
            $('body').append(response);
        }

    };
}

//Update account Info
function update_account_info()
{
    if(!verify_name()) return ;

    let email = $('#email').val();

    let details_req = new XMLHttpRequest();

    details_req.open('POST', 'php/update_account_info.php');

    details_req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    details_req.send(
        'oemail='+Cookies.get('email')+
        '&email='+ email +
        '&fname=' + $('#fname').val() +
        '&lname=' + $('#lname').val() +
        '&phone_code=' + $('#phone_code').val() +
        '&phone=' + $('#phone').val() +
        '&gender=' + $("input[name='gender']:checked").val() +
        '&street_address=' + $('#street_address').val() +
        '&city=' + $('#city').val() +
        '&zip=' + $('#zip').val() +
        '&country=' + $('#country').val()
    );

    details_req.onreadystatechange = function() {

        if (details_req.readyState === 4 && details_req.status === 200)
        {
            let response = details_req.responseText;

            if(response === 'Updated')
            {
                if(Cookies.get('remember_me') === "true")
                {
                    Cookies.set('email',email,{expires: 365});
                }
                else
                {
                    Cookies.set('email',email, {expires: 1});
                }
            }

            show_popup(response);
        }
    };
}

// Display Items in Shop
function shop() {
    let current_page = (location.pathname.split('/').slice(-1)[0]);
    let page;
    if (current_page === "motherboard.html") {
        page = "Motherboard";
    } else if (current_page === "rams.html") {
        page = "RAM";
    } else if (current_page === "powersupply.html") {
        page = "PSU";
    } else if (current_page === "processor.html") {
        page = "Processor";
    } else if (current_page === "Storage.html") {
        page = "Storage";
    } else if (current_page === "graphic_card.html") {
        page = "GPU";
    } else {
        page = "Other";
    }
    let details_req = new XMLHttpRequest();
    details_req.open('Get', 'php/shop.php?category=' + page );

    details_req.send();

    details_req.onreadystatechange = function() {

        if (details_req.readyState === 4 && details_req.status === 200)
        {
            $('#shop').append(details_req.responseText);
        }

    };
}

// Validate Old Password
function validate_old_password()
{
    let cpassword = Cookies.get('password');
    let password = $("#opassword")

    if (password.val() !== cpassword)
    {
        password.addClass("border-danger");
        password.siblings("label").append(
            '<span style="color:red"> (Wrong Old Password)</span>');
        return false;
    }

    return true;
}

// Update Account Password
function update_password()
{
    if(!validate_password()) return ;

    if(!validate_old_password()) return ;

    let password = $('#password').val();

    let details_req = new XMLHttpRequest();

    details_req.open('POST', 'php/update_password.php');

    details_req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    details_req.send( 'email='+Cookies.get('email') +'&password='+ password);

    details_req.onreadystatechange = function() {

        if (details_req.readyState === 4 && details_req.status === 200)
        {
            let response = details_req.responseText;

            if(response === 'Updated')
            {
                if(Cookies.get('remember_me') === "true")
                {
                    Cookies.set('password',password,{expires: 365});
                }
                else
                {
                    Cookies.set('password',password, {expires: 1});
                }
            }

            show_popup(response);
        }
    };

}