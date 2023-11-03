<?php
    session_start();
    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id}");
    $output = "";

    if(mysqli_num_rows($sql) == 1){ //if there is only one row in the database then definitely this is a current logged in user. Therefore, no user to chat if users is equal to 1
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($sql) > 0){

        include "data.php";

        // while($row = mysqli_fetch_assoc($sql)){
        //     $output .= '<a href="#">
        //                 <div class="content">
        //                     <img src="php/images/'. $row['img'] .'" alt="">
        //                     <div class="details">
        //                         <span>'. $row['fname'] . " " . $row['lname'] .'</span>
        //                         <p>This is a test message</p>
        //                     </div>
        //                 </div>
        //                 <div class="status-dot"><i class="fas fa-circle"></i></div>
        //                 </a>';
        // }
    }
    echo $output;

?>

