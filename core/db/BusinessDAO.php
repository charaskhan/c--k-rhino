<?php
/**
 * Created by PhpStorm.
 * User: Aleks Ruci
 * Date: 25.05.2019
 * Time: 17:07
 */

require_once 'DBConnection.php';
require_once '../core/model/Business.php';
require_once '../core/model/BusinessCategory.php';
require_once '../core/model/Product.php';
require_once '../core/model/UserReservation.php';
require_once '../core/model/UserType.php';

class BusinessDAO extends DBConnection
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getBusinesses($filter)
    {
        $query = "SELECT business.*  
                 FROM business 
                 WHERE 1 = 1 ";

        if ($filter['id'] != null) {
            $query .=" AND business.ID = " . $this->getRealEscapeString($filter['id']);
        }
        if ($filter['name'] != null) {
            $query .=" AND business.Name = '{$this->getRealEscapeString($filter['name'])}'";
        }
        if ($filter['userID'] != null) {
            $query .=" AND business.UserID = '{$this->getRealEscapeString($filter['userID'])}'";
        }

        $result = $this->executeQuery($query);
        $businesses = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $business = new Business($row['ID']);
            $business->setName($row['Name']);
            $business->setAddress($row['Address']);
            $business->setLatitude($row['Latitude']);
            $business->setLongitude($row['Longitude']);
            $business->setLongitude($row['Longitude']);
            $business->setLongitude($row['ImageURL']);

//            $businessType = new UserType($row['UserTypeID']);
//            $businessType->setName($row['TypeName']);
//            $business->setType($businessType);

           // $business->setIsActive($row['IsActive']);

            array_push($businesses, $business);
        }
        return $businesses;
    }

    public function saveBusiness(Business $business)
    {
        $query = "INSERT INTO business(Name, Address, Latitude, Longitude, ImageURL) 
            VALUES ('{$this->getRealEscapeString($business->getName())}' 
                  , '".md5($this->getRealEscapeString($business->getAddress()))."' 
                  , '{$this->getRealEscapeString($business->getLatitude())}' 
                  , '{$this->getRealEscapeString($business->getLongitude())}'
                  , '{$this->getRealEscapeString($business->getImageURL())}'})";
        $this->executeQuery($query);
        return $this->getGeneratedId();
    }

    public function updateBusiness(Business $business)
    {
        $query = "UPDATE `business` SET 
             `Name` = '{$this->getRealEscapeString($business->getName())}',
             `Address` = '".md5($this->getRealEscapeString($business->getAddress()))."',
             `Latitude` = '{$this->getRealEscapeString($business->getLatitude())}', 
             `Longitude` = '{$this->getRealEscapeString($business->getLongitude())}', 
             `ImageURL` = '{$this->getRealEscapeString($business->getImageURL())}', 
              WHERE `ID` = {$this->getRealEscapeString($business->getId())}";

        $this->executeQuery($query);
    }

    public function deleteBusiness($id)
    {
        $query = "DELETE FROM business WHERE ID = {$this->getRealEscapeString($id)} ";
        $this->executeQuery($query);
    }

    public function getBusinessesByCategoryId($categoryId) {
        $query = "SELECT business.*  
                 FROM business
                  INNER JOIN business_tag ON business.ID = business_tag.BusinessID 
                 WHERE BusinessCategoryID =  {$this->getRealEscapeString($categoryId)}";

        $result = $this->executeQuery($query);
        $businesses = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $business = new Business($row['ID']);
            $business->setName($row['Name']);
            $business->setAddress($row['Address']);
            $business->setLatitude($row['Latitude']);
            $business->setLongitude($row['Longitude']);
            $business->setImageURL($row['ImageURL']);

            $businessType = new UserType($row['UserTypeID']);
            $businessType->setName($row['TypeName']);
            $business->setType($businessType);

            $business->setIsActive($row['IsActive']);

            array_push($businesses, $business);
        }
        return $businesses;
    }

    // Start Products

    public function getProducts() {
        $query = "SELECT product.*  
                 FROM product";

        $result = $this->executeQuery($query);
        $products = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $prodcut = new Product($row['ID']);
            $prodcut->setName($row['Name']);
            $prodcut->setPrice($row['Price']);

            array_push($products, $prodcut);
        }
        return $products;
    }

    public function getProductsByBusinessId($businessId) {
        $query = "SELECT product.*,  
                        business_product.Price AS Price
                 FROM product
                  INNER JOIN business_product ON product.ID = business_product.BusinessID 
                 WHERE BusinessID =  {$this->getRealEscapeString($businessId)}";

        $result = $this->executeQuery($query);
        $products = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $prodcut = new Product($row['ID']);
            $prodcut->setName($row['Name']);
            $prodcut->setPrice($row['Price']);

            array_push($products, $prodcut);
        }
        return $products;
    }

    // Start Business Categories


    public function getBusinessCategories($filter)
    {
        $query = "SELECT business_category.*  
                 FROM business_category 
                 WHERE 1 = 1 ";

        if ($filter['id'] != null) {
            $query .=" AND business_category.ID = " . $this->getRealEscapeString($filter['id']);
        }
        if ($filter['name'] != null) {
            $query .=" AND business_category.Name = '{$this->getRealEscapeString($filter['name'])}'";
        }

        $result = $this->executeQuery($query);
        $businessCategories = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $category = new BusinessCategory($row['ID']);
            $category->setName($row['Name']);
            $category->setDescription($row['Description']);
            $category->setImageURL($row['ImageURL']);

            array_push($businessCategories, $category);
        }
        return $businessCategories;
    }


    public function saveBusinessCategory(BusinessCategory $businessCategory)
    {
        $query = "INSERT INTO business_category(Name, Description) 
            VALUES ('{$this->getRealEscapeString($businessCategory->getName())}' 
                  ,'{$this->getRealEscapeString($businessCategory->getDescription())}'
                  ,'{$this->getRealEscapeString($businessCategory->getImageURL())}'})";
        $this->executeQuery($query);
        return $this->getGeneratedId();
    }

    public function updateBusinessCategory(BusinessCategory $businessCategory)
    {
        $query = "UPDATE `business_category` SET 
             `Name` = '{$this->getRealEscapeString($businessCategory->getName())}',
             `Longitude` = '{$this->getRealEscapeString($businessCategory->getDescription())}', 
             `ImageURL` = '{$this->getRealEscapeString($businessCategory->getImageURL())}' 
              WHERE `ID` = {$this->getRealEscapeString($businessCategory->getId())}";

        $this->executeQuery($query);
    }

    public function deleteBusinessCategory($id)
    {
        $query = "DELETE FROM business_category WHERE ID = {$this->getRealEscapeString($id)} ";
        $this->executeQuery($query);
    }

    public  function getUsersWithReservation($businessID){

        $query="Select user.Name,user.Surname,d.Name as DName,r.Code, d.StartTime,d.EndTime from user
                inner join reservation r on user.ID = r.UserID
                inner join discount d on r.DiscountID = d.ID
                inner join business_product bp on d.BusinessProductID = bp.ID
                inner join business b on bp.BusinessID = b.ID
                where d.IsActive=1 and b.ID=".$this->getRealEscapeString($businessID)."
                order r.DateTime desc";
        $result = $this->executeQuery($query);
        $users = array();
        while ($row = $result->fetch_assoc()) {

            $userReservation= new UserReservation();
            $userReservation->setUserName($row['Name']);
            $userReservation->setUserSurname($row['Surname']);
            $userReservation->setDiscountName($row['DName']);
            $userReservation->setReservationCode($row['Code']);
            $userReservation->setStartTime($row['StartTime']);
            $userReservation->setEndTime($row['EndTime']);


            array_push($users, $userReservation);
        }
        return $users;

    }
}