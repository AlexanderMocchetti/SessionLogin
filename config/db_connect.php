<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "signup_php";
$port = 3306;

$conn = new mysqli($hostname, $username, $password, $database, $port);
if ($conn->connect_error) {
    die("DB connection failure". $conn->connect_error);
}