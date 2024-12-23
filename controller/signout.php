<?php

session_start();
$_SESSION = array();
session_destroy();

//$host  = $_SERVER['HTTP_HOST'];
header("location: \\rhino-web\index.php");