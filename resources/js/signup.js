import { encode } from "uint8-to-base64";
import { getBuffer } from "azure-x-lib";

const csrfToken = document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content");

const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
const passwordPattern = /^[a-zA-Z0-9._%+-]{3,}$/;


const user = document.getElementById("username");
const email = document.getElementById("email");
const password = document.getElementById("password");
const repassword = document.getElementById("repassword");

const userLabel = document.querySelectorAll("label")[0];
const emailLabel = document.querySelectorAll("label")[1];
const passwordLabel = document.querySelectorAll("label")[2];
const repasswordLabel = document.querySelectorAll("label")[3];

user.addEventListener("blur", (e) => {
    if (e.target.value.length <= 0) {
        userLabel.classList.remove("placeholder-x-active");
        user.style.borderColor = "aqua";
        userLabel.classList.remove("placeholder-x-invalid-label");
    }

    if (!passwordPattern.test(e.target.value) && e.target.value.length > 0) {
        user.style.borderColor = "red";
        userLabel.classList.add("placeholder-x-invalid-label");
    } else {
        user.style.borderColor = "#373e47";
        userLabel.classList.remove("placeholder-x-invalid-label");
    }
});

user.addEventListener("focus", (e) => {
    user.style.borderColor = "aqua";
    userLabel.classList.remove("placeholder-x-invalid-label");
    if (!userLabel.classList.contains("placeholder-x-active"))
    userLabel.classList.add("placeholder-x-active");
});

email.addEventListener("blur", (e) => {
    if (e.target.value.length <= 0) {
        emailLabel.classList.remove("placeholder-x-active");
        email.style.borderColor = "aqua";
        emailLabel.classList.remove("placeholder-x-invalid-label");
    }

    if ((!emailPattern.test(e.target.value)) && e.target.value.length > 0) {
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





repassword.addEventListener("blur", (e) => {
    if (e.target.value.length <= 0) {
        repasswordLabel.classList.remove("placeholder-x-active");
        repassword.style.borderColor = "aqua";
        repasswordLabel.classList.remove("placeholder-x-invalid-label");
    }

    if ((!passwordPattern.test(e.target.value) && e.target.value.length > 0) || (e.target.value != password.value && e.target.value.length > 0)) {
        repassword.style.borderColor = "red";
        repasswordLabel.classList.add("placeholder-x-invalid-label");
    } else {
        repassword.style.borderColor = "#373e47";
        repasswordLabel.classList.remove("placeholder-x-invalid-label");
    }
});

repassword.addEventListener("focus", (e) => {
    repassword.style.borderColor = "aqua";
    repasswordLabel.classList.remove("placeholder-x-invalid-label");
    if (!repasswordLabel.classList.contains("placeholder-x-active"))
    repasswordLabel.classList.add("placeholder-x-active");
});



const form = document.getElementById("input-form-x");

form.onsubmit = async (e) => {
    e.preventDefault();

    console.log();

    const fileData = new Blob([document.getElementById('img-input-x').files[0]]);

    if (fileData.size > 9) {
    
        var promise = new Promise(getBuffer(fileData));
        await promise
          .then(async function (data) {
            const b64encoded = encode(data);
            document.getElementById("bg-x-img").style.backgroundImage = "url(data:image/png;base64," + b64encoded + ")";

            const options = {
              method: "POST",
              headers: {
                "Content-Type": "application/json",
                'X-CSRF-TOKEN': csrfToken,
              },
              body: JSON.stringify({
                userName: user.value,
                userEmail: email.value,
                userPassword: password.value,
                userImage: b64encoded
              }),
            };


            const response = await fetch('/SignUpX', options);
            
            const datax = await response.json();
            console.log(datax);      
            if(!datax.status){
                console.log(data);   
                email.style.borderColor = "red";
                emailLabel.classList.add("placeholder-x-invalid-label");
                user.style.borderColor = "red";
                userLabel.classList.add("placeholder-x-invalid-label");
                return;
            }
        
            window.location = '/MainPage';
             
          });
    }
    else{
        document.getElementById('bg-x-img').style.border = "3px solid aqua";
        console.log('select avatar');
    }
    
}