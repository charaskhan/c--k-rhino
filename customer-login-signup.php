<?php
include("../controller/customer-login-signUp.php");
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
    <title>Log In</title>
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="css/animate.css" type="text/css">
    <link rel="stylesheet" href="css/responsive.css" type="text/css">
    <link rel="stylesheet" href="css/index.css" type="text/css">
    <script type="text/javascript">
        $(document).ready(function() {
            $("#signUp").click(function(){
                $("#usernameLogin").val("");
                $("#passwordLogin").val("");
            });
        });

        $(document).ready(function() {
            $("#login").click(function(){
                $("#firstname").val("");
                $("#surname").val("");
                $("#usernameSignUp").val("");
                $("#email").val("");
                $("#phone").val("");
                $("#passwordSignUp").val("");
                $("#confirm_passwordSignUp").val("");

            });
        });

    </script>
</head>
<body>


<section id="content" style="margin-bottom: 0px;">

    <div class="content-wrap">

        <div class="container clearfix">

            <div class="col_one_third">

                <div class="">
                    <form action="customer-login-signup.php" method="post" id="" class="" enctype="multipart/form-data">

                        <h3>Login to your Account</h3>

                        <div class="col_full">
                            <label for="">Username:</label>
                            <input type="text"  class="form-control"
                                   required autofocus value="<?php
                            if (isset($_POST["username"]))
                                echo $_POST["username"];
                            ?>" name="username" placeholder="Enter Username" id="usernameLogin">
                        </div>

                        <div class="col_full">
                            <label for="">Password:</label>
                            <input type="password" class="form-control" id="" placeholder="Password"
                                   required name="password" id="passwordLogin">
                        </div>

                        <div class="col_full">
                            <button name="login" value="login" id="login" class="custom-btn-style-1" type="submit">Login</button>
                            <a href="#" class="fright">Forgot Password?</a>
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

                    </form>
                </div>

            </div>

            <div class="col_two_third col_last ">


                <h3>Don't have an Account? Register Now.</h3>



                <form name="customer-login-signup.php" action="#" method="post" id="" class="">

                    <div class="col_half">
                        <label for="firstname">Name:</label>
                        <input type="text" name="firstname" value="<?php if (isset($_POST["firstname"])) echo $_POST["firstname"] ?>" class="form-control" id="firstname"
                        placeholder="Name">
                        <?php
                        if (!empty($validationController->getNameError())) {
                            ?>
                            <p class="error"><?php echo $validationController->getNameError(); ?></p>
                            <?php
                        }
                        ?>
                    </div>

                    <div class="col_half col_last">
                        <label for="surname">Surname:</label>
                        <input type="text" id="surname" name="surname" value="<?php if (isset($_POST["surname"])) echo $_POST["surname"] ?>" class="form-control"
                        placeholder="Surname">
                        <?php
                        if (!empty($validationController->getSurnameError())) {
                            ?>
                            <p class="error"><?php echo $validationController->getSurnameError(); ?></p>
                            <?php
                        }
                        ?>
                    </div>

                    <div class="clear"></div>

                    <div class="col_half">
                        <label for="usernameSignUp">Choose a Username:</label>
                        <input type="text" id="usernameSignUp" name="usernameSignUp" value="<?php if (isset($_POST["usernameSignUp"])) echo $_POST["usernameSignUp"] ?>" class="form-control" placeholder="Username">
                        <?php
                        if (!empty($validationController->getUsernameError())) {
                            ?>
                            <p class="error"><?php echo $validationController->getUsernameError(); ?></p>
                            <?php
                        }
                        ?>
                    </div>

                    <div class="col_half col_last">
                        <label for="username">Enter your Email:</label>
                        <input type="text" id="email" name="email" value="<?php if (isset($_POST["email"])) echo $_POST["email"] ?>" class="form-control" placeholder="Email">
                        <?php
                        if (!empty($validationController->getEmailError())) {
                            ?>
                            <p class="error"><?php echo $validationController->getEmailError(); ?></p>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="clear"></div>
                    <div class="col_half">
                        <label for="phone">Phone:</label>
                        <input type="text" id="phone" name="phone" value="<?php if (isset($_POST["phone"])) echo $_POST["phone"] ?>" class="form-control" placeholder="Phone">
                        <?php
                        if (!empty($validationController->getPhoneError())) {
                            ?>
                            <p class="error"><?php echo $validationController->getPhoneError(); ?></p>
                            <?php
                        }
                        ?>
                    </div>

                    <div class="clear"></div>

                    <div class="col_half">
                        <label for="passwordSignUp">Choose Password:</label>
                        <input type="password" id="passwordSignUp" name="passwordSignUp" value="" class="form-control" placeholder="Password">
                        <?php
                        if (!empty($validationController->getPasswordError())) {
                            ?>
                            <p class="error"><?php echo $validationController->getPasswordError(); ?></p>
                            <?php
                        }
                        ?>
                    </div>

                    <div class="col_half col_last">
                        <label for="confirm_passwordSignUp">Re-enter Password:</label>
                        <input type="password" id="confirm_passwordSignUp" name="confirm_passwordSignUp" value="" class="form-control" placeholder="Confirm Password">
                        <?php
                        if (isset($messageErrorSignUp)) {
                            ?>
                            <p class="error"><?php echo $messageErrorSignUp; ?></p>
                            <?php
                        }
                        ?>
                    </div>




                    <div class="clear"></div>

                    <div class="col_full nobottommargin">
                        <button class="custom-btn-style-1" name="signUp"  id="signUp" value="register" type="submit">Register Now</button>
                    </div>

                </form>

            </div>

        </div>

    </div>

</section>

</body>
</html>
