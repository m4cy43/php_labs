<?php
require_once("authInit.php");

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $registeredUser = $authController->registerUser($username, $password, $password2);
    header('Location: /');
}