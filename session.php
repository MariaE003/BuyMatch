<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: frontend/auth/login.php");
    exit();
    // require'frontend/auth/login.php';
}
if (isset($_POST["logout"])) {
    session_unset();
    session_destroy();
    header("Location: frontend/auth/login.php");
    exit();
}
// pour les role
// if () {
//     # code...
// }
?>