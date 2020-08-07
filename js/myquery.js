$(document).ready(function () {

    // Account Settings Form
    $("#formaccount").submit(function (e) {
        var name_regexp = new RegExp(/[^A-Za-z\s]/g);

        if (name_regexp.test($("#fname").val()))
        {

            $("#fname").addClass("border-danger");
            $("#fname").siblings("label").append(
                '<span style="color:red"> (Only Alphabets)</span>');
            return false;
        }

        if (name_regexp.test($("#lname").val()))
        {
            $("#lname").addClass("border-danger");
            $("#lname").siblings("label").append(
                '<span style="color:red"> (Only Alphabets)</span>');
            return false;
        }

    })

    // Checkout Form
    $("#cartform").submit(function (e) {
        var name_regexp = new RegExp(/[^A-Za-z\s]/g);

        if (name_regexp.test($("#fname").val()))
        {

            $("#fname").addClass("border-danger");
            $("#fname").siblings("label").append(
                '<span style="color:red;font-size: 11px"> (Only Alphabets)</span>');
            return false;
        }

        if (name_regexp.test($("#lname").val()))
        {
            $("#lname").addClass("border-danger");
            $("#lname").siblings("label").append(
                '<span style="color:red;font-size: 11px"> (Only Alphabets)</span>');
            return false;
        }

    })

    // Sign Up Form
    $("#signupForm").submit(function (e) {

        e.preventDefault();
        var name_regexp = new RegExp(/[^A-Za-z\s]/g);
        if (name_regexp.test($("#fname").val()))
        {
            $("#fname").addClass("border-danger");
            $("#fname").siblings("label").append(
                '<span style="color:red"> (Only Alphabets)</span>');
            return false;
        }

        if (name_regexp.test($("#lname").val()))
        {
            $("#lname").addClass("border-danger");
            $("#lname").siblings("label").append(
                '<span style="color:red"> (Only Alphabets)</span>');
            return false;
        }

        if ($("#password").val() !== $("#cpassword").val())
        {
            $("#cpassword").addClass("border-danger");
            $("#password").addClass("border-danger");
            $("#password").siblings("label").append(
                '<span style="color:red"> (Password Does Not Match)</span>');
            return false;
        }

        var password_validation = new RegExp(/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/);

        if(!password_validation.test($("#password").val()))
        {
            $("#cpassword").addClass("border-danger");
            $("#password").addClass("border-danger");
            $("#password").siblings("label").append(
                '<span style="color:red;font-size: 14px"> ' +
                '(Must uppercase, lowercase, and digit.)</span>');
            return false;
        }


        let email = $("#email").val();

        let details_req = new XMLHttpRequest();

        details_req.open('GET', 'php/isExisting.php?email='+email);

        details_req.send();

        let response = "";

        details_req.onreadystatechange = function() {

            if (details_req.readyState === 4 && details_req.status === 200)
            {
                response  = details_req.responseText;
                console.log("Response: "+response);
                if(response === "Exists")
                {
                    $("#email").addClass("border-danger");
                    $("#email").siblings("label").append(
                        '<span style="color:red;font-size: 14px"> ' +
                        '(Email Already Exists.)</span>');
                    return false;
                }
            }

        };

    });

    // Country Code Selector
    var selected_phone;
    $("#phone_code").ready(function () {
        selected_phone = $("#phone_code option:selected");
        selected_phone.attr("label",$("#phone_code").val());
    })

    $("#phone_code").change(function(){
        selected_phone.removeAttr("label");
        selected_phone = $("#phone_code option:selected");
        selected_phone.attr("label",$("#phone_code").val());
    })

    // Phone number Input
    $("#phone").on('input',function () {
        let pattern = new RegExp(/[^0-9]/g);
        let phn = $("#phone").val().replace(pattern,"");
        $("#phone").val(phn);
    })

    // Password Update Form
    $("#password_update_form").submit(function (e) {

        if ($("#npassword").val() !== $("#cpassword").val())
        {
            $("#cpassword").addClass("border-danger");
            $("#npassword").addClass("border-danger");
            $("#npassword").siblings("label").append(
                '<span style="color:red"> (Password Does Not Match)</span>');
            return false;
        }
        // Password matching expression. Password must be at least 8 characters, no more than 127 characters, and must
        // include at least one upper case letter, one lower case letter, and one numeric digit.
        var password_validation = new RegExp(/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/);

        if(!password_validation.test($("#npassword").val()))
        {
            $("#cpassword").addClass("border-danger");
            $("#npassword").addClass("border-danger");
            $("#npassword").siblings("label").append(
                '<span style="color:red;font-size: 14px"> ' +
                '(Must uppercase, lowercase, and digit.)</span>');
            return false;
        }

    })

    // Remove Errors Attributes
    $("input").keyup(function () {
        $("#fname").removeClass("border-danger");
        $("#fname").siblings("label").children('span').remove();
        $("#lname").removeClass("border-danger");
        $("#lname").siblings("label").children('span').remove();
        $("#npassword").removeClass("border-danger");
        $("#npassword").siblings("label").children('span').remove();
		$("#password").removeClass("border-danger");
        $("#password").siblings("label").children('span').remove();
        $("#cpassword").removeClass("border-danger");
        $("#email").removeClass("border-danger");
        $("#email").siblings("label").children('span').remove();

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

        else if ($( this ).html() === "Remove From Cart")
        {
            var cartDiv = $("#cart div");
            var divToRm = $( this ).parent().parent()[0];

            for (var i = 1 ; cartDiv[i] ; i++)
            {
                if (cartDiv[i] === divToRm)
                {
                    divToRm.remove();
                    break;
                }
            }
            calprice();
        }

        // Remove from Wishlist
        else if ($( this ).html() === "Remove From Wishlist")
        {
            cartDiv = $("#wishlist div");
            divToRm = $( this ).parent().parent()[0];

            for (var i = 1 ; cartDiv[i] ; i++)
            {
                if (cartDiv[i] === divToRm)
                {
                    divToRm.remove();
                    break;
                }
            }
        }


    })


});

// Add to cart
function add_to_cart(item_id)
{

    let email = "waleed3072@gmail.com";

    let details_req = new XMLHttpRequest();

    details_req.open('Get', 'php/addToCart.php?email='+email+'&item_id='+item_id);

    details_req.send();

    details_req.onreadystatechange = function() {

        if (details_req.readyState === 4 && details_req.status === 200)
        {
            show_popup(details_req.responseText);
        }

    };

}

// Add to Wl
function add_to_wl(item_id)
{

    let email = "waleed3072@gmail.com";

    let details_req = new XMLHttpRequest();

    details_req.open('Get', 'php/addToWL.php?email='+email+'&item_id='+item_id);

    details_req.send();

    details_req.onreadystatechange = function() {

        if (details_req.readyState === 4 && details_req.status === 200)
        {
            show_popup(details_req.responseText);
        }

    };

}

var inter;
function show_popup(message)
{
    $('body').append('<div id="temp_popup" class="btn btn-warning position-fixed" ' +
        'style="bottom: 1%;left: 1%;">'+message+'</div>');
    $("#temp_popup").fadeOut(3000);
}

// Calculate Cart Price
function cartload() {
    get_items();
    calprice();
}

// Calculate price of items in cart
function calprice() {

    var h2Tags =$("#cart h2");
    var sum = 0;
    for (var i = 0 ; h2Tags[i] ; i++)
        sum += parseFloat(h2Tags[i].innerHTML.replace(/[^0-9]/g,""));

    $("#total_price").html("Total: "+sum);
}

function close_description()
{
    $( '#description' ).remove();
}

function scrollToTop(scrollDuration) {
    var scrollStep = -window.scrollY / (scrollDuration / 15),
        scrollInterval = setInterval(function(){
            if ( window.scrollY !== 0 ) {
                window.scrollBy( 0, scrollStep );
            }
            else clearInterval(scrollInterval);
        },15);
}

function get_items()
{
    let item = "waleed3072@gmail.com";

    let details_req = new XMLHttpRequest();

    details_req.open('Get', 'php/cart.php?email='+item);

    details_req.send();

    details_req.onreadystatechange = function() {

        if (details_req.readyState === 4 && details_req.status === 200)
        {
            $('#cart').append(details_req.responseText);
        }

    };
}