<?php
session_start();

if(!isset($_SESSION['admin'])) {
   
    header('Location: Login.html');
    echo'no user found';
    exit;
}
?>