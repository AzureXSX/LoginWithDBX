const csrfToken = document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content");

const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
const passwordPattern = /^[a-zA-Z0-9._%+-]{3,}$/;

const email = document.getElementById("email");
const password = document.getElementById("password");

const emailLabel = document.querySelectorAll("label")[0];
const passwordLabel = document.querySelectorAll("label")[1];

console.log(email);
console.log(password.value);

email.addEventListener("blur", (e) => {
    if (e.target.value.length <= 0) {
        emailLabel.classList.remove("placeholder-x-active");
        email.style.borderColor = "aqua";
        emailLabel.classList.remove("placeholder-x-invalid-label");
    }

    if ((!emailPattern.test(e.target.value) && !passwordPattern.test(e.target.value)) && e.target.value.length > 0) {
        email.style.borderColor = "red";
        emailLabel.classList.add("placeholder-x-invalid-label");
    } else {
        email.style.borderColor = "#373e47";
        emailLabel.classList.remove("placeholder-x-invalid-label");
    }
});

email.addEventListener("focus", (e) => {
    email.style.borderColor = "aqua";
    emailLabel.classList.remove("placeholder-x-invalid-label");
    if (!emailLabel.classList.contains("placeholder-x-active"))
        emailLabel.classList.add("placeholder-x-active");
});

password.addEventListener("blur", (e) => {
    if (e.target.value.length <= 0) {
        passwordLabel.classList.remove("placeholder-x-active");
        password.style.borderColor = "aqua";
        passwordLabel.classList.remove("placeholder-x-invalid-label");
    }

    if (!passwordPattern.test(e.target.value) && e.target.value.length > 0) {
        password.style.borderColor = "red";
        passwordLabel.classList.add("placeholder-x-invalid-label");
    } else {
        password.style.borderColor = "#373e47";
        passwordLabel.classList.remove("placeholder-x-invalid-label");
    }
});

password.addEventListener("focus", (e) => {
    password.style.borderColor = "aqua";
    passwordLabel.classList.remove("placeholder-x-invalid-label");
    if (!passwordLabel.classList.contains("placeholder-x-active"))
    passwordLabel.classList.add("placeholder-x-active");
});

const form = document.getElementById("input-form-x");


form.onsubmit = async (e) => {
    e.preventDefault();

    console.log();

    const response = await fetch('/Login', {
        method: "POST",
        headers:{
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
        },
        body: JSON.stringify({
            userEmail: email.value,
            userPassword: password.value
        })
    });

    const data = await response.json();

    if(data.status.length <= 0){
        email.style.borderColor = "red";
        emailLabel.classList.add("placeholder-x-invalid-label");
        return;
    }

    window.location = '/MainPage';
    console.log(data);   
}

function SignUp() {}

window.SignUp = SignUp;
