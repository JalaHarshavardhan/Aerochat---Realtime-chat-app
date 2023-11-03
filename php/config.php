<?php
    $conn = new mysqli("localhost", "root", "", "chat");;
    if(!$conn){
        echo "Database connected" . mysqli_connect_errno();
    }//else{
    //     echo "Error";
    // }

?>