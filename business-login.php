<?php
include("../controller/business-login.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Business Login</title>
    <link rel="stylesheet" href="../view/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../view/css/animate.css" type="text/css">
    <link rel="stylesheet" href="../view/css/responsive.css" type="text/css">
    <link rel="stylesheet" href="../view/css/index.css" type="text/css">
</head>
<body class="bg">


<div class="center">
    <a href="welcome.php"><img src="images/logo1.png" alt="Canvas Logo"></a>
</div>
<div style="max-width: 400px; background-color: rgba(255,255,255,0.93);" class="divcenter noradius noborder">
    <div style="padding: 40px;">
        <form action="business-login.php" method="post" enctype="multipart/form-data">
            <h3>Login to your Account</h3>

            <div class="col_full float-none">
                <label for="login-form-username">Username:</label>
                <input type="text" id="inputEmail" class="form-control" placeholder="Enter Username"
                       required autofocus value="<?php
                if (isset($_POST["username"]))
                    echo $_POST["username"];
                ?>" name="username" placeholder="Enter Username">

            </div>

            <div class="col_full float-none">
                <label for="">Password:</label>
                <div class="form-label-group">
                    <input type="password" id="inputPassword" class="form-control"
                           placeholder="Password"
                           required name="password">
                </div>
            </div>

            <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <p style="color: red">
                    <?php
                    if (isset($messageError)) {
                        echo $messageError;
                    }
                    ?>
                </p>
            </div>

            <div class="col_full float-none">
                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit"
                        name="login">Sign in
                </button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
