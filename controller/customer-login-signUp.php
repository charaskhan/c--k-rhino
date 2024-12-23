<?php

require_once '../core/db/UserDAO.php';
require_once '../core/manager/UserManager.php';
require_once '../core/model/User.php';
require_once '../core/model/UserType.php';
require_once '../core/validation/Validation.php';

session_start();
$_SESSION = array();
$messageError = "";
$messageErrorSignUp="";

if (isset($_POST["login"])) {
    $db = new UserDAO();
    $user = $db->login($_POST['username'], $_POST['password']);
    if (!empty($user)) {
        $_SESSION['id'] = $user[0]['ID'];

        header("Location: customer-homepage.php");
    } else {
        $messageError = "Bad Username or Password";
    }
}
$userController = new UserManager();
$validationController = new Validation();
if (isset($_POST["signUp"])) {

    $name = $_POST["firstname"];
    $last = $_POST["surname"];
    $email = $_POST["email"];
    $pass = $_POST["passwordSignUp"];
    $username = $_POST["usernameSignUp"];
    $confirmPass = $_POST["confirm_passwordSignUp"];
    $phone = $_POST["phone"];

    if ($pass == $confirmPass) {
        $validationController->checkForSignUp(array($name, $last, $email, $pass, $username, $phone));
        if ($validationController->getError() == 0) {
            $user = new User(null);
            $user->setName($name);
            $user->setSurname($last);
            $user->setPassword($pass);
            $user->setUsername($username);
            $user->setEmail($email);
            $user->setUserType(UserType::$CUSTOMER);
            $user->setPhone($phone);
            $id = $userController->saveUser($user);
            if ($id > 0) {
                $_SESSION["CustomerID"] = $id;
                header("Location: customer-home.php");
            }
        }
    } else {
        $messageErrorSignUp = "Passwords do not match!";
    }


}


//include("../view/welcome.php");