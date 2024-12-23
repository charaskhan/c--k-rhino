<?php
/**
 * Created by PhpStorm.
 * User: Aleks Ruci
 * Date: 25.05.2019
 * Time: 16:17
 */

require_once 'DBConnection.php';

class UserDAO extends DBConnection
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUsers($filter)
    {
        $query = "SELECT user.*,  
        user_type.Name AS TypeName 
                 FROM user 
                 INNER JOIN user_type ON user.UserTypeID = user_type.ID
                 WHERE 1 = 1 ";

        if ($filter['id'] != null) {
            $query .=" AND user.ID = " . $this->getRealEscapeString($filter['id']);
        }
        if ($filter['username'] != null) {
            $query .=" AND user.Username = '{$this->getRealEscapeString($filter['username'])}'";
        }
        if ($filter['password'] != null) {
            $query .=" AND user.Password = '{$this->getRealEscapeString($filter['password'])}'";
        }
        if ($filter['name_surname'] != null) {
            $query .=" AND (user.Name LIKE '%" . $this->getRealEscapeString($filter['name_surname']) . "%' OR user.Surname LIKE '%" . $this->getRealEscapeString($filter['name_surname']) . "%' ";
        }
        if ($filter['phone'] != null) {
            $query .=" AND user.Phone LIKE '%" . $this->getRealEscapeString($filter['phone']) . ")%' ";
        }
        if ($filter['type_id'] != null) {
            $query .=" AND user.UserTypeID = " . $this->getRealEscapeString($filter['type_id']);
        }


        $result = $this->executeQuery($query);
        $users = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $user = new User($row['ID']);
            $user->setUsername($row['Username']);
            $user->setPassword($row['Password']);
            $user->setName($row['Name']);
            $user->setSurname($row['Surname']);
            $user->setPhone($row['Phone']);
            $user->setEmail($row['Email']);

            $userType = new UserType($row['UserTypeID']);
            $userType->setName($row['TypeName']);
            $user->setType($userType);

            $user->setIsActive($row['IsActive']);

            array_push($users, $user);
        }
        return $users;
    }

    public function saveUser(User $user)
    {
        $query = "INSERT INTO user(Username, Password, Name, Surname, Phone, Email, UserTypeID) 
            VALUES ('{$this->getRealEscapeString($user->getUsername())}' 
                  , '".md5($this->getRealEscapeString($user->getPassword()))."' 
                  , '{$this->getRealEscapeString($user->getName())}' 
                  , '{$this->getRealEscapeString($user->getSurname())}' 
                  , '{$this->getRealEscapeString($user->getPhone())}' 
                  , '{$this->getRealEscapeString($user->getEmail())}' 
                  , {$this->getRealEscapeString($user->getType())})";
        $this->executeQuery($query);
        return $this->getGeneratedId();
    }

    public function updateUser(User $user)
    {
        $query = "UPDATE `user` SET 
             `Username` = '{$this->getRealEscapeString($user->getUsername())}',
             `Password` = '".md5($this->getRealEscapeString($user->getPassword()))."',
             `Name` = '{$this->getRealEscapeString($user->getName())}', 
             `Surname` = '{$this->getRealEscapeString($user->getSurname())}', 
             `Phone` = '{$this->getRealEscapeString($user->getPhone())}',
             `Email` = '{$this->getRealEscapeString($user->getEmail())}',
             `IsActive` = '{$this->getRealEscapeString($user->getisActive())}'
              WHERE `ID` = {$this->getRealEscapeString($user->getId())}";

        $this->executeQuery($query);
    }

    public function updateUserNoPassword(User $user)
    {
        $query = "UPDATE `user` SET 
             `Username` = '{$this->getRealEscapeString($user->getUsername())}',
             `Name` = '{$this->getRealEscapeString($user->getName())}', 
             `Surname` = '{$this->getRealEscapeString($user->getSurname())}', 
             `Email` = '{$this->getRealEscapeString($user->getEmail())}',
             `Phone` = '{$this->getRealEscapeString($user->getPhone())}',
             `IsActive` = '{$this->getRealEscapeString($user->getisActive())}'
              WHERE `ID` = {$this->getRealEscapeString($user->getId())}";


        $this->executeQuery($query);
        return mysqli_affected_rows($this->getDB());
    }

    public function updateUserStatus($userId, $status)
    {
        $query = "UPDATE user " .
            "SET IsActive = {$this->getRealEscapeString($status)} " .
            "WHERE ID = {$this->getRealEscapeString($userId)}";

        $this->executeQuery($query);
    }

    public function deleteUser($id)
    {
        $query = "DELETE FROM user WHERE ID = {$this->getRealEscapeString($id)} ";
        $this->executeQuery($query);
    }

    public function getUserTypes()
    {
        $query = "SELECT * FROM user_type";

        $result = $this->executeQuery($query);
        $userTypes = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $userType = new UserType($row['ID']);
            $userType->setName($row['Name']);
            $userType->setDescription($row['Description']);

            array_push($userTypes, $userType);
        }
        return $userTypes;
    }


    public function getUserSubscriptions($userId) {
        $query = "SELECT  user_subscription.ID AS SubsriptionID, 
                          user.*,
                          business_category.ID AS CategoryID,
                          business_category.Name AS CategoryName
                 FROM user_subscription
                 INNER JOIN user ON user_subscription.UserID = user.ID
                 INNER JOIN business_category ON user_subscription.BusinessCategoryID = business_category.ID
                 WHERE user.ID = {$this->getRealEscapeString($userId)} ";

        $result = $this->executeQuery($query);
        $categories = array();
        $subscription = null;
        while ($row = mysqli_fetch_assoc($result)) {
            $subscription = new UserSubscriptions($row['SubsriptionID']);

            $user = new User($row['ID']);
            $user->setUsername($row['Username']);
            $user->setPassword($row['Password']);
            $user->setName($row['Name']);
            $user->setSurname($row['Surname']);
            $user->setPhone($row['Phone']);
            $user->setEmail($row['Email']);
            $user->setIsActive($row['IsActive']);

            $category = new BusinessCategory($row['CategoryID']);
            $category->setName($row['CategoryName']);

            $subscription->setUser($user);

            array_push($categories, $category);
        }
        $subscription->setCategories($categories);
        return $subscription;
    }

    public function login($username, $password)
    {
        $stmt = $this->get_db()->prepare("SELECT * FROM `user` WHERE `Username`=:username AND `Password`=:password");
        $stmt->bindValue(":username", $username, PDO::PARAM_STR);
        $stmt->bindValue(":password", $password, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}