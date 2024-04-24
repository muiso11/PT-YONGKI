<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "ptyongki";

$data = mysqli_connect($host, $user, $password, $db);

if ($data === false) {
    die("Connection error");
}
