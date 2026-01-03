<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: frontend/auth/login.php");
    exit();
}
if (isset($_POST["logout"])) {
    session_unset();
    session_destroy();
    header("Location: /BuyMatch/frontend/auth/login.php");
    exit();
}
// pour les role
if (isset($rolePage) && $_SESSON["role"] !== $rolePage) {
    header("Location: index.php");
    exit() ;  
}
?>