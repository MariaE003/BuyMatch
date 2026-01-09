<?php
// require_once 'index.php';
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: /BuyMatch/frontend/auth/login.php");
    exit();
}
if (isset($_POST["logout"])) {
    session_unset();
    session_destroy();
    header("Location: /BuyMatch/frontend/auth/login.php");
    exit();
}
// pour les role
function checkRole($roles =[]){
    
   if (!isset($_SESSION["role"])) {
        header("Location: /BuyMatch/frontend/auth/login.php");
        exit();
    }

    if (!in_array($_SESSION["role"], $roles)) {
        header("Location: /BuyMatch/index.php"); 
        exit();
    }
}
?>