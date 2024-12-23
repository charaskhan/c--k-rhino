<?php
$products = array();
$discountTypes = array();
if (isset($_SESSION["BusinessID"])){
    session_start();
    $businessID = $_SESSION["BusinessID"];
    $businessDAO = new BusinessDAO();
    $discountManager = new DiscountManager();
    $products = $businessDAO->getProductsByBusinessId($businessID);
    $discountTypes = $discountManager->getDiscountType();


}
if (isset($_POST['save'])) {


        $discount = new Discount(0);


        $discountName = $_POST["discountName"];
        $descriptionName = $_POST["description"];
        $value = $_POST["value"];
        $starttime = $_POST["starttime"];
        $endtime = $_POST["endtime"];
        $product = $_POST["product"];
        $discounttype=$_POST["discounttype"];

        $discount = new Discount(0);
        $discount->setName($discountName);
        $discount->setDescription($descriptionName);
        $discount->setStartTime($starttime);
        $discount->setEndTime($endtime);
        $discount->setBusinessProductID($product);
        $discount->setDiscountTypeID($discounttype);
        $discount->setValue($value);
        $discountManager->saveDiscount($discount);



    header("Location: business-home.php");
}
