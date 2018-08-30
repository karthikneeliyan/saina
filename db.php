<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_STRICT);
define('DB_HOST','localhost:3308');
//define('DB_USER','sainaAdmin');
//define('DB_PASS','Admin@!2#');
//define('DB_DATABASE','SainaDB');

define('DB_USER','admin');
define('DB_PASS','msdabd');
define('DB_DATABASE','saina_drivers');
$mysqli = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_DATABASE);
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
