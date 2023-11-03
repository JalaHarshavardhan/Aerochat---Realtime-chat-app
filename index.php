<?php
session_start();
if (isset($_SESSION['unique_id'])) { //if user is logged in
    header("locaion: users.php");
}
?>
<?php include_once "header.php"; ?>

<body>
    <div class="wrapper">
        <section class="form signup">
            <div class="nav">
                <img src="icon.png" alt="" class="iconn">
                <header>AeroChat</header>
            </div>
            <form action="#" autocomplete="off">
                <div class="error-text">
                    <!-- This is an error message! -->
                </div>
                <div class="name-details">
                    <div class="name">
                        <div class="field input">
                            <label>First Name*</label>
                            <input type="text" name="fname" placeholder="First Name" required>
                        </div>
                        <div class="field input">
                            <label>Last Name*</label>
                            <input type="text" name="lname" placeholder="Last Name" required>
                        </div>
                    </div>

                    <div class="field input">
                        <label>Email Address*</label>
                        <input type="text" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="field input">
                        <label>Password*</label>
                        <input type="password" name="password" placeholder="Enter new password" required>
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="field image">
                        <label>Select Image*</label>
                        <input type="file" id="choosefile" name="image" required>
                    </div>
                    <p class="mark">* mark refers to a mandatory field</p>
                    <div class="field button">
                        <input type="submit" id="submitbtn" value="Continue to Chat">
                    </div>
                </div>
            </form>
            <div class="link">Already signed up? <a href="login.php">Login</a> now</div>
            <p class="text"> &#169; 543-545-536-527-541 | All rights reserved</p>
        </section>
    </div>
    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/signup.js"></script>
</body>

</html>