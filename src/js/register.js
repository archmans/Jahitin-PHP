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
    console.log("Username input event triggered"); 
    var username = usernameInput.value;
    if (username.length > 0) {
        if (/^(?=.{1,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/.test(username)) {
            checkAvailabilityUsername(username);
            usernameInput.style.border = "2px solid green";
            errorMsgUsername.style.display = "none";
            isUsernameInputValid = true;
        } else {
            usernameInput.style.border = "2px solid red";
            errorMsgUsername.style.display = "block";
            errorMsgUsername.style.color = "red";
            errorMsgUsername.fontSize = "10px";
            errorMsgUsername.innerHTML = "Username must be 1-20 characters long and can only contain letters, numbers, underscores and periods.";
            isUsernameInputValid = false;
        }
    } else {
        usernameInput.style.border = "2px solid red";
        errorMsgUsername.style.display = "block";
        errorMsgUsername.style.color = "red";
        errorMsgUsername.fontSize = "10px";
        errorMsgUsername.innerHTML = "Username is required";
        isUsernameInputValid = false;
    }
    updateSubmitButton();
});

function checkAvailabilityUsername(username) {
    console.log("Checking availability of username: " + username);      
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            if (data.isAvailable) {
                usernameInput.style.border = "2px solid green";
                errorMsgUsername.style.display = "none";
                isUsernameInputValid = true;
            } else {
                usernameInput.style.border = "2px solid red";
                errorMsgUsername.style.fontSize = "10px";
                errorMsgUsername.style.display = "block";
                errorMsgUsername.style.color = "red";
                errorMsgPassword.style.fontSize = "10px";
                errorMsgUsername.innerHTML = "Username already exists";
                isUsernameInputValid = false;
            }
        }
    };
    xhr.open("GET", "ajax/registerAjax.php?data=" + username, true);
    xhr.send();
}

emailInput.addEventListener("input", function() {
    console.log("Email input event triggered");
    var email = emailInput.value;
    if (email.length > 0) {
        if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(email)) {
            emailInput.style.border = "2px solid green";
            errorMsgEmail.style.display = "none";
            isEmailInputValid = true;
        } else {
            emailInput.style.border = "2px solid red";
            errorMsgEmail.style.display = "block";
            errorMsgEmail.style.color = "red";
            errorMsgEmail.style.fontSize = "10px";
            errorMsgEmail.innerHTML = "Email is invalid";
            isEmailInputValid = false;
        }
    } else {
        emailInput.style.border = "2px solid red";
        errorMsgEmail.style.display = "block";
        errorMsgEmail.style.color = "red";
        errorMsgEmail.style.fontSize = "10px";
        errorMsgEmail.innerHTML = "Email is required";
        isEmailInputValid = false;
    }
    updateSubmitButton();
});

passwordInput.addEventListener("input", function() {
    console.log("Password input event triggered");
    var password = passwordInput.value;
    if (password.length > 0) {
        if (/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/.test(password)) {
            passwordInput.style.border = "2px solid green";
            errorMsgPassword.style.display = "none";
            isPasswordInputValid = true;
        } else {
            passwordInput.style.border = "2px solid red";
            errorMsgPassword.style.display = "block";
            errorMsgPassword.style.color = "red";
            errorMsgPassword.style.fontSize = "10px";
            errorMsgPassword.innerHTML = "Password must be at least 8 characters long and contain at least one letter and one number";
            isPasswordInputValid = false;
        }
    } else {
        passwordInput.style.border = "2px solid red";
        errorMsgPassword.style.display = "block";
        errorMsgPassword.style.color = "red";
        errorMsgPassword.style.fontSize = "10px";
        errorMsgPassword.innerHTML = "Password is required";
        isPasswordInputValid = false;
    }
    updateSubmitButton();
});

function updateSubmitButton() {
    console.log("Updating submit button");
    var submitBtn = document.getElementById('submit');
    console.log("isUsernameInputValid: " + isUsernameInputValid);
    console.log("isEmailInputValid: " + isEmailInputValid);
    console.log("isPasswordInputValid: " + isPasswordInputValid);
    if (isUsernameInputValid && isEmailInputValid && isPasswordInputValid) {
        console.log("All inputs are valid");
        submitBtn.disabled = false;
    } else {
        console.log("Not all inputs are valid");
        submitBtn.disabled = true;
    }
}