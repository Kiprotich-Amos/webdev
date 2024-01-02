function validateForm(){
    let password = document.getElementById("password").value;
    let confirmPassword = document.getElementById("confirmPassword")[0].value;

    if (password.length < 8) {
        alert("Password must be at least 8 characters long");
        return false;
    } else if (password !== confirmPassword) {
        alert("Passwords do not match");
        return false;
    }

    return true;
}
