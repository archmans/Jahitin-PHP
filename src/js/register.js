var usernameInput = document.getElementById('username');
var emailInput = document.getElementById("email");
var passwordInput = document.getElementById("password");
var errorMsgUsername = document.getElementById('errorMsgUsername');
var errorMsgEmail = document.getElementById('errorMsgEmail');
var errorMsgPassword = document.getElementById('errorMsgPassword');
var isUsernameInputValid = false;
var isEmailInputValid = false;
var isPasswordInputValid = false;
var submitBtn = document.getElementById('submit');

usernameInput.addEventListener("input", function() {
    var username = usernameInput.value;
    var isUsernameInputValid = false;
    if (username.length > 0) {
        if (/^(?=.{1,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/.test(username)) {
            checkAvailabilityUsername(username);
        } else {
            showError("Username must be 1-20 characters, only contain letters, numbers, underscores, and periods.", isUsernameInputValid, usernameInput, errorMsgUsername);
        }
    } else {
        showError("Username is required", isUsernameInputValid, usernameInput, errorMsgUsername);
    }
    updateSubmitButton();
});

function checkAvailabilityUsername(username) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            if (data.isAvailable) {
                notError(error, isUsernameInputValid, usernameInput);
            } else {
                showError("Username is already taken", isUsernameInputValid, usernameInput, errorMsgUsername);
            }
        }
    };
    xmlhttp.open("GET", "ajax/registerAjax.php?data=" + username, true);
    xmlhttp.send();
}

emailInput.addEventListener("input", function() {
    var email = emailInput.value;
    var isEmailInputValid = false;
    if (email.length > 0) {
        if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(email)) {
            notError(errorMsgEmail, isEmailInputValid, emailInput);
        } else {
            showError("Email is not valid", isEmailInputValid, emailInput, errorMsgEmail);
        }
    } else {    
        showError("Email is required", isEmailInputValid, emailInput, errorMsgEmail);
    }
    updateSubmitButton();
});

passwordInput.addEventListener("input", function() {
    var password = passwordInput.value;
    var isPasswordInputValid = false;
    if (password.length > 0) {
        if (/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/.test(password)) {
            notError(errorMsgPassword, isPasswordInputValid, passwordInput);
        } else {
            showError("Password must be at least 8 characters and contain at least one letter and one number", isPasswordInputValid, passwordInput, errorMsgPassword);
        }
    } else {
        showError("Password is required", isPasswordInputValid, passwordInput, errorMsgPassword);
    }
    updateSubmitButton();
});

function showError(message, valid, input, error) {
    input.style.border = "2px solid red";
    error.style.fontSize = "10px";
    error.style.display = "block";
    error.style.color = "red";
    error.innerHTML = message;
    valid = false;
}

function notError(error, valid, input) {
    input.style.border = "2px solid green";
    error.style.display = "none";
    valid = true;
}

function updateSubmitButton() {
    var submitBtn = document.getElementById('submit');
    if (isUsernameInputValid && isEmailInputValid && isPasswordInputValid) {
        submitBtn.disabled = false;
    } else {
        submitBtn.disabled = true;
    }
}