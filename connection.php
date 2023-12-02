<?php

$servername = "localhost";
$username = "root";
$password = "prasad";
$dbname = "microproject";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>