<?php
require_once("dbConnect.php");
require_once("userModel.php");

class authController
{
    protected $db;

    function __construct(dbConnect $db)
    {
        $this->db = $db;
    }

    function registerUser(string $username, string $password, string $password2)
    {
        $hashedPassword = md5($password);
        if (strlen($password) > 32 || strlen($password) > 32) {
            $_SESSION['registerError'] = 'Username or password are too long (more than 24 symbols)';
        } else if (strlen($password) < 4 || strlen($password) < 4) {
            $_SESSION['registerError'] = 'Username or password are too short (less than 4 symbols)';
        } else if ($password2 != $password) {
            $_SESSION['registerError'] = 'Paswords are not the same';
        } else if ($this->checkIfUserExists($username)) {
            $_SESSION['registerError'] = 'Such user already exists';
        } else {
            $newUser = $this->db->connection->prepare("INSERT INTO `users` (`username`, `password`) VALUES (?, ?)");
            $newUser->bind_param('ss', $username, $hashedPassword);
            $newUser->execute();
            $registeredUser = new userModel($newUser->insert_id, $username, $hashedPassword);
            $_SESSION['username'] = $registeredUser->username;
            $_SESSION['loggedIn'] = true;
            return $registeredUser;
        }
        return false;
    }

    function checkIfUserExists(string $username)
    {
        $getUserStatement = $this->db->connection->prepare("SELECT * FROM `users` WHERE `username`=?");
        $getUserStatement->bind_param('s', $username);
        $getUserStatement->execute();
        $result = $getUserStatement->get_result();
        return $result->num_rows > 0;
    }

    function loginUser(string $username, string $password)
    {
        $hashedPassword = md5($password);
        $getUserStatement = $this->db->connection->prepare("SELECT * FROM `users` WHERE `username`=? and `password`=?");
        $getUserStatement->bind_param('ss', $username, $hashedPassword);
        $getUserStatement->execute();
        $result = $getUserStatement->get_result();
        if ($result->num_rows > 0) {
            $resultArray = $result->fetch_assoc();
            $_SESSION['username'] = $resultArray['username'];
            $_SESSION['loggedIn'] = true;
            return new userModel($resultArray['id'], $resultArray['username'], $resultArray['password']);
        } else {
            $_SESSION['loginError'] = 'User not found';
        }
        return false;
    }

    function logoutUser()
    {
        unset($_SESSION['username']);
        unset($_SESSION['loggedIn']);
        session_destroy();
    }
}
?>