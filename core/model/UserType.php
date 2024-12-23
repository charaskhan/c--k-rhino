<?php
/**
 * Created by PhpStorm.
 * User: grent
 * Date: 5/25/2019
 * Time: 4:49 PM
 */

class UserType
{
    public static $ADMIN  = 1;
    public static $BUSINESS= 2;
    public static $CUSTOMER= 3;

    private $id;
    private $name;

    /**
     * userType constructor.
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}