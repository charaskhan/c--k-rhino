<?php
session_start();
$discounts=array();
if(!isset($_SESSION['BusinessID']) && !isset($_SESSION['UserID'])){
    header("Location: ../view/welcome.php");
}
if(isset($_SESSION["BusinessID"])){

require_once  '../core/manager/DiscountManager.php';
$businessID=$_SESSION["BusinessID"];
$discountManager= new DiscountManager();
$discounts= $discountManager->getDiscountByBusinessID($businessID);
}