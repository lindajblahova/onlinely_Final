var jsSignUpEmail = document.getElementById("formSignUpEmail");
var jsSignUpPassword = document.getElementById("formSignUpPassword");
var jsSignUpPasswordConf = document.getElementById("formSignUpPasswordConf");

var jsEmailRegexPattern = /^[\w]+@[\w]+\.+[\w]{2,3}$/;
var jsPasswordRegexPattern = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15}$/;

    document.getElementById("formSignUpSubmit").disabled = true;
    document.getElementById("formSignUpSubmit").classList.remove("btn-info");
    document.getElementById("formSignUpSubmit").classList.add("btn-secondary");

function jsSignUpSubmitEnable() {
    if (jsEmailRegexPattern.test(jsSignUpEmail.value) && jsPasswordRegexPattern.test(jsSignUpPassword.value) &&
        (jsSignUpPassword.value === jsSignUpPasswordConf.value)) {
        document.getElementById("formSignUpSubmit").disabled = false;
        document.getElementById("formSignUpSubmit").classList.remove("btn-secondary");
        document.getElementById("formSignUpSubmit").classList.add("btn-info");
    }else{
        document.getElementById("formSignUpSubmit").disabled = true;
        document.getElementById("formSignUpSubmit").classList.remove("btn-info");
        document.getElementById("formSignUpSubmit").classList.add("btn-secondary");

    }
}

function jsSignUpValidateEmail() {
    jsSignUpSubmitEnable();
    if(!jsEmailRegexPattern.test(jsSignUpEmail.value)) {
        if (!document.getElementById("formSignUpEmailInvalidFeedback")) {
            jsSignUpEmail.classList.add("is-invalid");
            var newElement = document.createElement("div");
            newElement.setAttribute("id", "formSignUpEmailInvalidFeedback");
            newElement.classList.add("invalid-feedback");
            var newElementContent = document.createTextNode("This is not a valid email address");
            newElement.appendChild(newElementContent);
            jsSignUpEmail.parentNode.insertBefore(newElement, jsSignUpEmail.nextSibling);
        }
    }else{
        if (document.getElementById("formSignUpEmailInvalidFeedback")) {
            document.getElementById("formSignUpEmailInvalidFeedback").parentElement.removeChild(document.
            getElementById("formSignUpEmailInvalidFeedback"));
        }
        jsSignUpEmail.classList.remove("is-invalid");
        jsSignUpEmail.classList.add("is-valid");
    }
}

function jsSignUpValidatePassword() {
    jsSignUpSubmitEnable();
    if (!jsPasswordRegexPattern.test(jsSignUpPassword.value)) {
        if (!document.getElementById("formSignUpPasswordInvalidFeedback")) {
            jsSignUpPassword.classList.add("is-invalid");
            var newElement = document.createElement("div");
            newElement.setAttribute("id", "formSignUpPasswordInvalidFeedback");
            newElement.classList.add("invalid-feedback");
            var newElementContent = document.createTextNode("Password must be between 8 and 15 characters long, " +
                "with at least one uppercase and lowercase character and one number.");
            newElement.appendChild(newElementContent);
            jsSignUpPassword.parentNode.insertBefore(newElement, jsSignUpPassword.nextSibling);
        }
    } else if (jsSignUpPassword.value !== jsSignUpPasswordConf.value) {
        if (!document.getElementById("formSignUpPasswordConfInvalidFeedback")) {
            jsSignUpPasswordConf.classList.add("is-invalid");
            var newElement = document.createElement("div");
            newElement.setAttribute("id", "formSignUpPasswordConfInvalidFeedback");
            newElement.classList.add("invalid-feedback");
            var newElementContent = document.createTextNode("Passwords don't match!");
            newElement.appendChild(newElementContent);
            jsSignUpPasswordConf.parentNode.insertBefore(newElement, jsSignUpPasswordConf.nextSibling);
        }
        if (document.getElementById("formSignUpPasswordInvalidFeedback")) {
            document.getElementById("formSignUpPasswordInvalidFeedback").parentElement.removeChild
            (document.getElementById("formSignUpPasswordInvalidFeedback"));
        }
        jsSignUpPassword.classList.remove("is-invalid");
        jsSignUpPassword.classList.add("is-valid");
    } else {
        if (document.getElementById("formSignUpPasswordConfInvalidFeedback")) {
            document.getElementById("formSignUpPasswordConfInvalidFeedback").parentElement.removeChild
            (document.getElementById("formSignUpPasswordConfInvalidFeedback"));
        }
        jsSignUpPasswordConf.classList.remove("is-invalid");
        jsSignUpPasswordConf.classList.add("is-valid");
    }
}

