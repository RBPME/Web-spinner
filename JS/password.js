var password;
var hidden;

variables = () => {
    password = document.getElementById('pass');
    hidden = true;
}

clicked = () => {
    if (hidden) {
        password.type = "text";
        hidden = false;
    } else {
        password.type = "password";
        hidden = true;
    }
}