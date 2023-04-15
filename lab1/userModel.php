<?php
class userModel
{
    public readonly int $id;
    public readonly string $username;
    public readonly string $password;
    public function __construct($id, $username, $password, )
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
    }
}