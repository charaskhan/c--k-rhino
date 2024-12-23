<?php
/**
 * Created by PhpStorm.
 * User: Aleks Ruci
 * Date: 09.05.2019
 * Time: 16:25
 */
require_once '../core/db/UserDAO.php';
require_once '../core/manager/BusinessManager.php';
session_start();
$_SESSION = array();
$messageError = "";

if (isset($_POST["login"])) {
    $db = new UserDAO();
    $businessManager= new BusinessManager();
    $user = $db->login($_POST['username'], $_POST['password']);
    if (!empty($user)) {
        $_SESSION['UserID'] = $user[0]['ID'];
        if($user[0]['UserTypeID']==2){
            $business=$businessManager->getBusinessByUserID($_SESSION['UserID']);
             $_SESSION['BusinessID'] = $business[0]->getID();echo $_SESSION["BusinessID"];
             header("Location: ../view/business-home.php");
        }

    } else {
        $messageError = "Bad Username or Password";
    }
    //header("Location: ../view/business-home.php");
}

//include("../view/welcome.php");