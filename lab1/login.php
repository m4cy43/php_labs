<?php
require_once("authInit.php");

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $logedinUser = $authController->loginUser($username, $password);
    header('Location: /');
}