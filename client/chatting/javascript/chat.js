const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");

form.onsubmit = (e)=> {
    e.preventDefault();
}

sendBtn.onclick = ()=> {

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/insert-chat.php", true);
    xhr.onload = ()=> {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                inputField.value= "";
            }
        }
    }
    // we have to send the form data through ajax to php
    let formData = new FormData(form); //creating new formData Object
        xhr.send(formData); //seidng the form data to php
}

setInterval(()=>{

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/get-chat.php", true);
    xhr.onload = ()=> {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                chatBox.innerHTML = data;
            }
        }
    }


    let formData = new FormData(form); //creating new formData Object
    xhr.send(formData); //seidng the form data to php
}, 500);