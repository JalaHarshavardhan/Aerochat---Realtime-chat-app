const form = document.querySelector(".typing-area");
inputField = form.querySelector(".input-field");
sendBtn = form.querySelector("button");
chatBox = document.querySelector(".chat-box");

form.onsubmit = (e)=>{
    e.preventDefault();  //preventing form from submitting
}

sendBtn.onclick = ()=>{
    // lets start ajax
    let xhr = new XMLHttpRequest();  //creating XML object
    xhr.open("POST", "php/insert-chat.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){

                inputField.value = "";  // once the message is inserted into the database, empty the inputfield
                scrollToBottom();
                // let data = xhr.response;
                //     // console.log(data);
                // if(data == "success"){

                //     location.href = "users.php";
                // }else{
                //     errorText.textContent = data;
                //     errorText.style.display = "block";
                // }
            }
        }
    }
    // we have to send the form data through ajax to php
    let formData = new FormData(form);  // creating new formData object
    xhr.send(formData); // sending the form data to php
}

chatBox.onmouseenter = ()=>{
    chatBox.classList.add("active");
}

chatBox.onmouseleave = ()=>{
    chatBox.classList.remove("active");
}


setInterval(() => {
    // console.log("Hello");
    // lets start AJAX
    let xhr = new XMLHttpRequest();  //creating XML object
    xhr.open("POST", "php/get-chat.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                chatBox.innerHTML = data;
                if(!chatBox.classList.contains("active")){  //if active class not contains in the chatbox then scroll to bottom
                    scrollToBottom();

                }
            }
        }
    }
     // we have to send the form data through ajax to php
     let formData = new FormData(form);  // creating new formData object
     xhr.send(formData); // sending the form data to php
}, 500);   // this funcion will run frequently after 500ms

// in this file ajax is running two times one for users list and another for search the user
// now we need to stop users list ajax when the search for the user ajax is running.

function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
}