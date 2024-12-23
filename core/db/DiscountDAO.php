<?php
/**
 * Created by PhpStorm.
 * User: grent
 * Date: 5/25/2019
 * Time: 5:07 PM
 */
require_once 'DBConnection.php';
class DiscountDAO extends DBConnection
{
    public function __construct()
    {
        parent::__construct();
    }

    public  function getDiscounts($filter)
    {
        $query = "select discount.ID,discount.Name,discount.Value,discount.StartTime,discount.EndTime,
                  b.ID as BusinessID, b.Name as BusinessName, bc.Name as Category,discount.IsActive
                  from discount 
                  inner join business_product bp on discount.BusinessProductID = bp.ID
                  inner join business b on bp.BusinessID = b.ID
                  inner join business_tag bt on b.ID = bt.BusinessID
                  inner join business_category bc on bt.BusinessCategoryID = bc.ID
                  where 1=1
                  ";
        if ($filter["BusinessID"] != null) {
            $id = $this->getRealEscapeString($filter["BusinessID"]);
            $query .= " AND b.`ID`= $id";
        }
        if ($filter["BusinessCategoryID"] != null) {
            $bcID = $this->getRealEscapeString($filter["BusinessCategoryID"]);
            $query .= " AND c.`ID`= $bcID";
        }
        $discounts=array();
        $result=$this->executeQuery($query);
        while ($row = mysqli_fetch_assoc($result)) {
            $discount= new Discount($row['ID']);
            $discount->setName($row["Name"]);
            $discount->setValue($row["Value"]);
            $discount->setStartTime($row["StartTime"]);
            $discount->setEndTime($row["EndTime"]);

            $business= new Business($row["BusinessID"]);
            $business->setName($row["BusinessName"]);
            $discount->setBusiness($business);
            $discount->setCategory($row["Category"]);
            array_push($discounts,$discount);

        }
        return $discounts;
    }

    public  function saveDiscount(Discount $discount){
        $query = "INSERT INTO discount(id, name, discounttypeid, businessproductid, value, description, starttime, endtime) " .
            "VALUES ({$this->getRealEscapeString($discount->getName())} " .
            "      , {$this->getRealEscapeString($discount->getDiscountTypeID())} ".
            "      , {$this->getRealEscapeString($discount->getBusinessProductID())} " .
            "      , {$this->getRealEscapeString($discount->getValue())} " .
            "      , {$this->getRealEscapeString($discount->getDescription())} " .
            "      , {$this->getRealEscapeString($discount->getStartTime())}".
            "      , '{$this->getRealEscapeString($discount->getEndTime())}') ";

        $this->executeQuery($query);
    }

    public function updateDiscount(Discount $discount){
        $query="UPDATE discount " .
            "SET StartTime = {$this->getRealEscapeString($discount->getStartTime())} " .
            "  , EndTime = {$this->getRealEscapeString($discount->getEndTime())} " .
            "  , Description = {$this->getRealEscapeString($discount->getDescription())} " .
            "  , Value = {$this->getRealEscapeString($discount->getValue())} " .
            "  , IsActive = {$this->getRealEscapeString($discount->getisActive())} " .
            "WHERE ID = {$this->getRealEscapeString($discount->getId())}";

        $this->executeQuery($query);
    }

    public  function getDiscountType(){
        $query="Select discount_type.ID,discount_type.Name,discount_type.Description from discount_type";
        $discountsTypes=array();
        $result=$this->executeQuery($query);
        while ($row = mysqli_fetch_assoc($result)) {
            $discountType= new DiscountType();
            $discountType->setId($row["ID"]);
            $discountType->setName($row["Name"]);
            $discountType->setDescription($row["Description"]);

            array_push($discountsTypes,$discountType);

        }
        return $discountsTypes;
    }


}