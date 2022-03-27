let hidden: boolean;
let password: any;

const variables = () => {
    password = document.getElementById("pass");
    hidden = true;
}

const clicked = () => {
    if (hidden) {
        password.type = "text";
        hidden = false;
    } else {
        password.type = "password";
        hidden = true;
    }
}