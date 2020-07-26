function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}
function validateForm(){

    var fname = document.signupForm.fname.value;
    var lname = document.signupForm.lname.value;
    var email = document.signupForm.email.value;
    var pass = document.signupForm.pass.value;
    var cpass = document.signupForm.cpass.value;
    var gender = document.signupForm.gender.value;
    var address = document.signupForm.address.value;
    var city = document.signupForm.city.value;
    var mobile = document.signupForm.mobile.value;
    var province = document.signupForm.province.value;
    var zip = document.signupForm.zip.value;
    var submit = document.signupForm.submit.value;

    var fnameErr = lnameErr = emailErr = passErr = cpassErr
    = genderErr = addressErr = submitErr = cityErr = mobileErr = provinceErr
    = zipErr = true;
    
    if(fname === "") {
        printError("fnameErr", "Please enter your first name");
    } else {
        var regex = /^[a-zA-Z\s]+$/;                
        if(regex.test(fname) === false) {
            printError("fnameErr", "Please enter a valid name");
        } else {
            printError("fnameErr", "");
            fnameErr = false;
        }
    }
    alert("Submission Stop");
    if(lname === "") {
        printError("lnameErr", "Please enter your last name");
    } else {
        var regex = /^[a-zA-Z\s]+$/;
        if(regex.test(fname) === false) {
            printError("lnameErr", "Please enter a valid name");
        } else {
            printError("lnameErr", "");
            lnameErr = false;
        }
    }


    if(email === "") {
        printError("emailErr", "Please enter your email address");
    } else {
        // Regular expression for basic email validation
        var regex = /^\S+@\S+\.\S+$/;
        if(regex.test(email) === false) {
            printError("emailErr", "Please enter a valid email address");
        } else{
            printError("emailErr", "");
            emailErr = false;
        }
    }

    if(pass === "") {
        printError("passErr", "Please enter a password");
    } else {
        var regex = /^[A-Za-z]\w{7,14}$/;                
        if(regex.test(pass) === false) {
            printError("passErr", "Please enter a valid password");
        } else {
            printError("passErr", "");
            passErr = false;
        }
    }

    if(cpass === "") {
        printError("cpassErr", "Please enter a password");
    } else {
        var regex = /^[A-Za-z]\w{7,14}$/;                
        if(regex.test(cpass) === false) {
            printError("cpassErr", "Please enter a valid password");
        } else {
            printError("cpassErr", "");
            passErr = false;
        }
    }

    if(cpass !== pass){
        printError("cpassErr", "Password doest not match.")
        cpassErr = false;
    }

    if(gender === "") {
        printError("genderErr", "Please select your gender");
    } else {
        printError("genderErr", "");
        genderErr = false;
    }

    if(address === "") {
        printError("addressErr", "Please select your gender");
    } else {
        printError("addressErr", "");
        addressErr = false;
    }

    if(city === "") {
        printError("cityErr", "Please enter your last name");
    } else {
        var regex = /^[a-zA-Z\s]+$/;                
        if(regex.test(city) === false) {
            printError("cityErr", "Please enter a valid name");
        } else {
            printError("cityErr", "");
            cityErr = false;
        }
    }

    if(mobile === "") {
        printError("mobileErr", "Please enter your mobile number");
    } else {
        var regex = /^[1-9]\$/;
        if(regex.test(mobile) === false) {
            printError("mobileErr", "Please enter a valid 10 digit mobile number");
        } else{
            printError("mobileErr", "");
            mobileErr = false;
        }
    }

    if(province === "Select") {
        printError("provinceErr", "Please select your country");
    } else {
        printError("provinceErr", "");
        provinceErr = false;
    }

    if(zip === "") {
        printError("zipErr", "Please enter your mobile number");
    } else {
        var regex = /^[1-9]\$/;
        if(regex.test(zip) === false) {
            printError("zipErr", "Please enter a valid 10 digit mobile number");
        } else{
            printError("zipErr", "");
            zipErr = false;
        }
    }

    if(submit === ""){
        printError("submitErr", "Accept Terms And Conditions to Register !")
        submitErr = false;
    }

    if((fnameErr || lnameErr|| emailErr || mobileErr || provinceErr || genderErr) === true) {
        return false;
     } else {
         // Creating a string from input data for preview
         var dataPreview = "You've entered the following details: \n" +
                           "Full Name: " + fname + "\n" +
                           "Email Address: " + email + "\n" +
                           "Mobile Number: " + mobile + "\n" +
                           "Country: " + province + "\n" +
                           "Gender: " + gender + "\n";
                           alert(dataPreview);
                        }
     


}  