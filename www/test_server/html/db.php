<?php

include 'settings.php';

$host = "localhost";
$dbname = "excel";
$username = "root";

$mysqli = new mysqli(hostname: $host,
                     username: $username,
                     password: PASSWORD_DB,
                     database: $dbname);
                     
if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;