<?php
/**
 * Created by PhpStorm.
 * Business: Aleks Ruci
 * Date: 25.05.2019
 * Time: 17:21
 */


require_once '../core/model/Business.php';
require_once '../core/db/BusinessDAO.php';

class BusinessManager
{
    public function getBusinessByID($id)
    {
        $filter = array("id" => $id, "name" => null,"userID"=>null);
        $businessDao = new BusinessDAO();
        $user = $businessDao->getBusinesses($filter)[0];
        return $user;
    }

    public function getBusinessByUserID($id)
    {
        $filter = array("id" => null, "name" => null,"userID"=>$id);
        $businessDao = new BusinessDAO();
        $user = $businessDao->getBusinesses($filter);
        return $user;
    }

    public function getCategoriesByBisnessID($id){
        $filter = array("id" => $id, "name" => null);
        $businessDao = new BusinessDAO();
        $categories= $businessDao->getBusinessCategories($filter);
        return $categories;

    }

    public function getBusinessesByName($name)
    {
        $filter = array("id" => null, "name" => $name ,"userID"=>null);
        $businessDao = new BusinessDAO();
        $users = $businessDao->getBusinesses($filter);
        return $users;
    }

    public function getAllBusinesses()
    {
        $filter = array("id" => null, "name" => null);
        $businessDao = new BusinessDAO();
        $users = $businessDao->getBusinesses($filter);
        return $users;
    }

    public function saveBusiness(Business $business) {
        $businessDao = new BusinessDAO();
        return $businessDao->saveBusiness($business);
    }

    public function updateBusiness(Business $business){
        $businessDao = new BusinessDAO();
        return $businessDao->updateBusiness($business);
    }

    public function deleteBusiness($userId) {
        $businessDao = new BusinessDAO();
        $businessDao->deleteBusiness($userId);
    }
    
    public function getBusinessesByCategoryId($categoryId) {
        $businessDao = new BusinessDAO();
        return $businessDao->getBusinessesByCategoryId($categoryId);
    }

    public function  getUsersReservation($id){
        $businessDao = new BusinessDAO();
        return $businessDao->getUsersWithReservation($id);
    }
}