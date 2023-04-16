<?php

//set session to 10 min
ini_set('session.gc_maxlifetime', 600);
session_start();

$mysqli = require __DIR__ . "/db.php";

//check the username

$sql = sprintf("SELECT * FROM accounts
                    WHERE  username = '%s';",
                   $mysqli->real_escape_string($_POST["username"]));

$result = $mysqli->query($sql);
$user = $result->fetch_assoc();
$hash = $user["password_hash"];
$password = $_POST["password"]; 

if (password_verify($password, $hash)) {
    header("Location: data.php");
    $_SESSION['logged_in'] = true;
} else {
    $_SESSION['logged_in'] = false;
    header("Location: login.php?alert=The username or password is incorrect");
}
