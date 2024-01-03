function validateForm() {
    let password = document.getElementById("password").value;
    let confirmPassword = document.getElementById("confirmPassword").value;

    if (password.length < 8) {
        alert("Password must be at least 8 characters long");
        return false;
    } else if (password !== confirmPassword) {
        alert("Passwords do not match");
        return false;
    }

    return true;
}

function handleResponse(response) {
    if (response.status === 'success') {
        alert(response.message);
    } else {
        alert(response.message);
    }
}

document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    form.addEventListener('submit', function (event) {
        event.preventDefault();
        if (validateForm()) {
            fetch('register.php', {
                method: 'POST',
                body: new FormData(form),
            })
                .then(response => response.json())
                .then(data => handleResponse(data))
                .catch(error => console.error('Error: ', error));
        }
    });
});
