<?php
/**
 * Created by PhpStorm.
 * User: aleks
 * Date: 12/24/15
 * Time: 10:54 PM
 */

class DBConnection
{
    //constants that specify which DB is being used
    private static $ALEKS_TEST = 1;
    private static $ALEKS_PRODUCTION = 2;
    private static $GRENT_TEST = 3;
    private static $GRENT_PRODUCTION = 4;

    private $DB_USER;
    private $DB_PASS;
    private $DB_NAME;
    private $DB_HOST;

    private $db;
    private $connection;

    public function __construct()
    {
        $this->chooseDB(self::$GRENT_PRODUCTION);

        $this->db = new PDO('mysql:host='.$this->DB_HOST.';dbname='.$this->DB_NAME.';charset=utf8',
            $this->DB_USER, $this->DB_PASS);
        $this->db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

        $this->connection = mysqli_connect($this->DB_HOST,$this->DB_USER,$this->DB_PASS,$this->DB_NAME);

    }

    private function chooseDB($mode)
    {
        switch ($mode) {
            case self::$ALEKS_TEST:
                $this->DB_USER = "b0gSPhRAvo";
                $this->DB_PASS = "6BsAYM6TWM";
                $this->DB_NAME = "b0gSPhRAvo";
                $this->DB_HOST = "remotemysql.com";
                break;
            case self::$ALEKS_PRODUCTION:
                $this->DB_USER = "aruci16";
                $this->DB_PASS = "ar622uci";
                $this->DB_NAME = "web18_aruci16";
                $this->DB_HOST = "stud-proj.epoka.edu.al";
                break;
            case self::$GRENT_TEST:
                $this->DB_USER = "b0gSPhRAvo";
                $this->DB_PASS = "6BsAYM6TWM";
                $this->DB_NAME = "b0gSPhRAvo";
                $this->DB_HOST = "remotemysql";
                break;
            case self::$GRENT_PRODUCTION:
                $this->DB_USER = "root";
                $this->DB_PASS = "";
                $this->DB_NAME = "rhino";
                $this->DB_HOST = "localhost";
                break;
            default:
                die("<h1 style='color: red;'>Could not connect to DB!</h1>");
        }
    }

    public function get_db()
    {
        return $this->db;
    }

    public function getMysqliDB()
    {
        return $this->connection;
    }

    public function __destruct()
    {
        $this->db = null;
        mysqli_close($this->connection);
    }

    public function prepare($statement) {
        return $this->db->prepare($statement);
    }

    public function executeQuery($query){
        return mysqli_query($this->getMysqliDB(),$query);
    }

    public function getRealEscapeString($parameter) {
        return mysqli_real_escape_string($this->getMysqliDB(), $parameter);
    }

    public function getGeneratedId()
    {
        return mysqli_insert_id($this->getMysqliDB());
    }
}
