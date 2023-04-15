<?php
require_once("authController.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$dbConnect = new dbConnect();
$authController = new authController($dbConnect);