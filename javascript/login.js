const form = document.querySelector(".login form");
continueBtn = form.querySelector(".button input");
errorText = form.querySelector(".error-text");

form.onsubmit = (e)=>{
    e.preventDefault();  //preventing form from submitting
}

continueBtn.onclick = ()=>{
    // console.log("Hello");
    // lets start ajax
    let xhr = new XMLHttpRequest();  //creating XML object
    xhr.open("POST", "php/login.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                    console.log(data);
                if(data === "success"){
                    location.href = "users.php";
                }else{
                    errorText.textContent = data;
                    errorText.style.display = "block";
                }
            }
        }
    }

    // we have to send the form data through ajax to php

    // AJAX, which stands for Asynchronous JavaScript and XML, is a set of web development techniques used to create interactive and dynamic web applications. AJAX allows you to send and receive data from a web server without having to reload the entire web page. It enables web pages to make asynchronous requests to the server, retrieve data, and update parts of the web page without requiring a full page refresh.

    
    let formData = new FormData(form);   // creating a new formData object
    xhr.send(formData);  //sending the form data to php
}