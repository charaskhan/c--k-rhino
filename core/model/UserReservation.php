<?php


class UserReservation
{
   private $userName;
   private $userSurname;
   private $discountName;
   private $reservationCode;
   private $startTime;
   private $endTime;

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param mixed $userName
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    /**
     * @return mixed
     */
    public function getUserSurname()
    {
        return $this->userSurname;
    }

    /**
     * @param mixed $userSurname
     */
    public function setUserSurname($userSurname)
    {
        $this->userSurname = $userSurname;
    }

    /**
     * @return mixed
     */
    public function getDiscountName()
    {
        return $this->discountName;
    }

    /**
     * @param mixed $discountName
     */
    public function setDiscountName($discountName)
    {
        $this->discountName = $discountName;
    }

    /**
     * @return mixed
     */
    public function getReservationCode()
    {
        return $this->reservationCode;
    }

    /**
     * @param mixed $reservationCode
     */
    public function setReservationCode($reservationCode)
    {
        $this->reservationCode = $reservationCode;
    }

    /**
     * @return mixed
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * @param mixed $startTime
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;
    }

    /**
     * @return mixed
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * @param mixed $endTime
     */
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;
    }




}