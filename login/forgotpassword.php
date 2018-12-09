<?php
$userrole = 'loginpage';
$title = 'Forgot Password';
require 'misc/pagehead.php';
    require "partials/globalincludes.php";

?>

<script src="js/forgotpassword.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/additional-methods.min.js"></script>

</head>
<body style="background-image: url(images/bg.png); background-size: 100%; color:#a8eaff;">

  <?php require 'misc/pullnav.php'; ?>

    <div class="container logindiv">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <form class="text-center" id="forgotpassword" name="forgotpassword" method="post">
                <h3 class="form-signup-heading"><?php echo $title;?></h3>
                <br>
                <div class="form-group">
                    <input name="email" id="email" type="text" class="form-control input-lg" placeholder="Contact Staff if you need a password reset." autofocus disabled> </div>
                <div class="form-group">
                    <button name="Submit" id="submitbtn" class="btn btn-lg btn-primary btn-block" type="submit">Send Reset Email</button>
                </div>
            </form>
            <div id="message"></div>
            <p id="orlogin" class="text-center"><a href="index.php">Return to Login</a></p>
        </div>
        <div class="col-sm-4"></div>
    </div>
    <script>
        $("#forgotpassword").validate({
            rules: {
                email: {
                    email: true
                    , required: true
                }
            }
        });
    </script>
</body>
</html>
