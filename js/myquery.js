$(document).ready(function () {

    // Account Settings Form
    $("#formaccount").submit(function (e) {

        if ($("#fname").val().match(/[^A-Za-z\s]/g) !== null)
        {

            $("#fname").addClass("border-danger");
            $("#fname").siblings("label").append(
                '<span style="color:red"> (Only Alphabets)</span>');
            return false;
        }

        if ($("#lname").val().match(/[^A-Za-z\s]/g) !== null)
        {
            $("#lname").addClass("border-danger");
            $("#lname").siblings("label").append(
                '<span style="color:red"> (Only Alphabets)</span>');
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
    });

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
        $("#cpassword").removeClass("border-danger");
    })

    // Cart Remove
    $("button").click(function () {

        if ($( this ).html() === "See Details")
            alert(this.id);

        if ($( this ).html() === "Remove From Cart")
        {
            $cartDiv = $("#cart div");
            $divToRm = $( this ).parent().parent()[0];

            for ($i = 1 ; $cartDiv[$i] ; $i++)
            {
                if ($cartDiv[$i] === $divToRm)
                {
                    $divToRm.remove();
                    break;
                }
            }
            calprice();
        }
        // Remove from Wishlist
        if ($( this ).html() === "Remove From Wishlist")
        {
            $cartDiv = $("#wishlist div");
            $divToRm = $( this ).parent().parent()[0];

            for ($i = 1 ; $cartDiv[$i] ; $i++)
            {
                if ($cartDiv[$i] === $divToRm)
                {
                    $divToRm.remove();
                    break;
                }
            }
        }


    })

    // Calculate Cart Price
    function cartload() {
        calprice();
    }
    function calprice() {

        var h2Tags =$("#cart h2");
        $sum = 0;
        for ($i = 0 ; h2Tags[$i] ; $i++)
            $sum += parseFloat(h2Tags[$i].innerHTML.replace(/[^0-9]/g,""));

        $("#total_price").html("Total: "+$sum);
    }

});