<?php
/**
 * Created by PhpStorm.
 * User: grent
 * Date: 5/28/2019
 * Time: 12:38 PM
 */

require_once '../core/db/DiscountDAO.php';
class DiscountManager
{
    public function getDiscountByBusinessID($businessId)
    {
        $filter = array("BusinessID" => $businessId, "BusinessCategoryID" => null);
        $discountDao = new DiscountDAO();
        $discounts = $discountDao->getDiscounts($filter);
        return $discounts;
    }

    public function getDiscountByBusinessCategoryID($businessCategoryId)
    {
        $filter = array("BusinessID" => null, "BusinessCategoryID" => $businessCategoryId);
        $discountDao = new DiscountDAO();
        $discounts = $discountDao->getDiscounts($filter);
        return $discounts;
    }
    public function saveDiscount($discount){
        $discountDao = new DiscountDAO();
        $discountDao->saveDiscount($discount);
    }

    public function getDiscountType(){
        $discountDao = new DiscountDAO();
        return $discountDao->getDiscountType();
    }

}