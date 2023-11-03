<?php
session_start();
if (isset($_SESSION['unique_id'])) { //if user is logged in
    header("locaion: users.php");
}
?>
<?php include_once "header.php"; ?>

<body>
    <div class="wrapper">
        <section class="form login">
            <div class="nav">
                <img src="icon.png" alt="" class="iconn">
                <header>AeroChat</header>
            </div>
            <form action="#" autocomplete="off">
                <div class="error-text">
                    <!-- This is an error message! -->
                </div>

                <div class="field input">
                    <label>Email Address</label>
                    <input type="text" name="email" placeholder="Enter your email">
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter your password">
                    <i class="fas fa-eye"></i>
                </div>

                <div class="field button">
                    <input type="submit" id="submitbtn" value="Continue to Chat">
                </div>

            </form>
            <div class="link">Not yet signed up? <a href="index.php"> Sign up</a> now</div>
            <p class="text"> &#169; 543-545-536-527-541 | All rights reserved</p>
        </section>
    </div>
    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/login.js"></script>
</body>

</html>