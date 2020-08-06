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
    })

    // Cart Remove
    $("button").click(function () {

        if ($( this ).html() === "See Details")
        {
            $('body').append('<!--Item Description popup-->\n' +
                '\n' +
                '<div id="description" class="container bg-light">\n' +
                '    <div class="row">\n' +
                '        <button onclick="close_description()" class="btn btn-danger ml-auto"><i class="fa fa-close"></i></button>\n' +
                '    </div>\n' +
                '    <div class="row p-5">\n' +
                '        <div class="col-sm-4">\n' +
                '            <figure>\n' +
                '                <img src="img/motherboard.jpg" height=auto width="100%">\n' +
                '            </figure>\n' +
                '        </div>\n' +
                '        <div class="col-sm-5" >\n' +
                '            <a href="">MSI H110M PRO-VH PLUS INTEL H110 MOTHERBOARD</a>\n' +
                '            <div>\n' +
                '                <p><span style="color: gray;">Category: </span>Motherboards > LGA Socket</p>\n' +
                '                <p><span style="color: gray;">Code: </span>H110M PRO-VH PLUS</p>\n' +
                '                <p>\n' +
                '                    The PRO Series motherboards fit in any PC.\n' +
                '                    Quality you can trust with top performance and clever business solutions are key aspects of these motherboards.\n' +
                '                    Make your life easier and boost your business with the super stable, reliable and long-lasting PRO Series motherboards.\n' +
                '                </p>\n' +
                '                <ul style="margin-left: 10px;">\n' +
                '                    <li>Supports 6th Gen Intel® Core™ / Pentium® / Celeron® processors</li>\n' +
                '                    <li>Supports DDR4-2133 Memory</li>\n' +
                '                    <li>DDR4 Boost: Give your DDR4 memory a performance boost</li>\n' +
                '                    <li>USB 3.1 Gen1 + SATA 6Gb/s</li>\n' +
                '                </ul>\n' +
                '            </div>\n' +
                '        </div>\n' +
                '        <div class="col-sm-3">\n' +
                '            <p><span style="color: darkgray;">Availability: </span> In Stock</p>\n' +
                '            <button class="btn btn-warning">Add to Cart <i class="fa fa-shopping-cart"></i></button>\n' +
                '            <br><br>\n' +
                '            <button class="btn btn-warning">Add to Wishlist</button>\n' +
                '        </div>\n' +
                '    </div>\n' +
                '</div>\n' +
                '<!--./Item Description popup-->');
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

// Calculate Cart Price
function cartload() {
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