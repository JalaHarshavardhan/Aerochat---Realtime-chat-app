const searchBar = document.querySelector(".users .search input");
searchBtn = document.querySelector(".users .search button");
usersList = document.querySelector(".users .users-list");

searchBtn.onclick = ()=>{
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchBtn.classList.toggle("active");
    searchBar.value = "";
}

searchBar.onkeyup = ()=>{
    let searchTerm = searchBar.value;
    if(searchTerm != ""){   // i am just adding an active class when user start searching and only run the setInterval ajax if there is no active class
        searchBar.classList.add("active");
    }else{
        searchBar.classList.remove("active");

    }
    // lets start AJAX
    let xhr = new XMLHttpRequest();  //creating XML object
    xhr.open("POST", "php/search.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                usersList.innerHTML = data;
                // console.log(data);
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm);   //sending user search term to php with ajax

}

setInterval(() => {
    // console.log("Hello");
    // lets start AJAX
    let xhr = new XMLHttpRequest();  //creating XML object
    xhr.open("GET", "php/users.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(!searchBar.classList.contains("active")){    // if active not contains in search bar then add this data

                    usersList.innerHTML = data;
                }
                // console.log(data);
                // if(data == "success"){
                //     location.href = "users.php";
                // }else{
                //     errorText.textContent = data;
                //     errorText.style.display = "block";
                // }
            }
        }
    }
    xhr.send();
}, 500);   // this funcion will run frequently after 500ms

// in this file ajax is running two times one for users list and another for search the user
// now we need to stop users list ajax when the search for the user ajax is running.