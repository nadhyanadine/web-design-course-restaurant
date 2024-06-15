const paswrdField = document.querySelector(".form input[type='password']"),
toogleBtn = document.querySelector(".form .field i");

toogleBtn.onclick = ()=> {
    if(paswrdField.type == "password") {
        paswrdField.type = "text";
        toogleBtn.classList.add("active");
    } else {
        paswrdField.type = "password";
        toogleBtn.classList.remove("active");

    }
}