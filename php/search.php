<?php
    // echo "Hello";
    session_start();

    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
    // echo $searchTerm;
    // these responses are sending ajax to php and php to ajax

    $output = "";
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} AND (fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%')");

    if(mysqli_num_rows($sql) > 0){
        // $output .= "User found";
        include "data.php";
    }else{
        $output .= "No user found";
    }
    
    echo $output;
?>
