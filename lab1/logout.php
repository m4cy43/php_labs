<?php
require_once("authInit.php");

if (isset($_POST['logout'])) {
    $authController->logoutUser();
    header('Location: /');
}