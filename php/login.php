<?php
    session_start();
    // echo "The data come from PHP file";
    include_once "config.php";

    // mysqli_real_escape_string() ---> to safely escape user input before including it in a SQL query
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    // echo "from login.php"

    if(!empty($email) && !empty($password)){
        // lets check users entered email & password matched to database any table row email and password
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE  email = '{$email}' AND password = '{$password}'");
        if(mysqli_num_rows($sql) > 0){      //if user's credentials matched
            $row = mysqli_fetch_assoc($sql);
            $status = "Active now";
            // updating user status to active now if user login successfully..
            $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
            if($sql2){

                $_SESSION['unique_id'] = $row['unique_id']; // using this session we used user unique_id in other php file
                echo "success";
            }
        }else{
            echo "Email or Password is incorrect!";

        }

    }else{
        echo "All input fields are required!";
    }
?>