<?php
/**
 * Created by PhpStorm.
 * User: Aleks Ruci
 * Date: 25.05.2019
 * Time: 16:32
 */



class UserManager
{
    public function __construct()
    {
        //default constructor
    }

    // Start User
    public function getUserByUsernamePassword($username, $password) {
        $filter = array("id"=>null,"username"=>$username,"password"=>md5($password),"name_surname"=>null,"phone"=>null,"type_id"=>null);
        $userDao = new UserDAO();
        $user= $userDao->getUsers($filter);
        return $user;
    }

    public function getUserByID($id) {
        $filter = array("id"=>$id,"username"=>null,"password"=>null,"name_surname"=>null,"phone"=>null,"type_id"=>null);
        $userDao = new UserDAO();
        $user = $userDao->getUsers($filter)[0];
        return $user;
    }

    public function getAllUsers() {
        $filter = array("id"=>null,"username"=>null,"password"=>null,"name_surname"=>null,"phone"=>null,"type_id"=>null);
        $userDao = new UserDAO();
        $user= $userDao->getUsers($filter);
        return $user;
    }

    public function getUserTypes() {
        $userDao = new UserDAO();
        return $userDao->getUserTypes();
    }

    public function updateUser(User $user){
        $userDao = new UserDAO();
        return $userDao->updateUser($user);
    }

    public function updateUserNoPass(User $user){
        $userDao = new UserDAO();
        return $userDao->updateUserNoPassword($user);
    }

    public function saveUser(User $user) {
        $userDao = new UserDAO();
        return $userDao->saveUser($user);
    }

    public function deleteUser($userId) {
        $userDao = new UserDAO();
        $userDao->deleteUser($userId);
    }
}