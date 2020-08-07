$(document).ready(function (){

    $("#signupForm").submit(function (e) {


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


        // let email = $("#email").val();
        alert("email");

        // let details_req = new XMLHttpRequest();
        //
        // details_req.open('Get', 'php/isExisting.php?email='+email);
        //
        // details_req.send();
        //
        // let response = "";

        // details_req.onreadystatechange = function() {
        //
        //     if (details_req.readyState === 4 && details_req.status === 200)
        //     {
        //         response  = details_req.responseText;
        //     }
        //
        // };



    });

});
