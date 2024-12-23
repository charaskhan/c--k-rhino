<?php
session_start();
$users=array();
if(isset($_SESSION["BusinessID"])){
    require_once  '../core/manager/BusinessManager.php';
    $businessID=$_SESSION["BusinessID"];
    $businessManager= new BusinessManager();
    //$users= $businessManager->getUsersReservation($businessID);
}
