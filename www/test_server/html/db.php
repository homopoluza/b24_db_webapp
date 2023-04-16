<?php

$host = "localhost";
$dbname = "excel";
$username = "root";
$password = "Jk8$#pLmN0vQ";

$mysqli = new mysqli(hostname: $host,
                     username: $username,
                     password: $password,
                     database: $dbname);
                     
if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;