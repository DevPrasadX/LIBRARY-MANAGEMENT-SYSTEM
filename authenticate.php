<?php
session_start(); // start session

include('connection.php');

$username = $_POST["uname"];
$password = $_POST['pass'];

$query = "SELECT * FROM authentication WHERE admin='$username' AND password='$password'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Output data of each row
    $_SESSION['admin'] = $username; // store admin username in session
    header('Location: Home.php');
    exit;
} else {
     // store login error message in session
    header('Location: login.html');
}

$conn->close(); // close database connection
?>
