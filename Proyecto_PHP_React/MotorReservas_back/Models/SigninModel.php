<?php

include_once "../Db/Dbo.php";
include_once "../Entities/User.php";

class SigninModel
{
    private Dbo $connection;

    public function __construct()
    {
        $this->connection = new Dbo();
    }

    public function checkUser($email, $password): User
    {
        $sql = "SELECT * FROM users WHERE email = '" . $email . "';";
        $this->connection->default();
        $query = $this->connection->query($sql);
        $this->connection->close();
        if ($result = $query->fetch_assoc()) {
            if (crypt($password, $result["password"]) == $result["password"]) {
                return new user($result["id"], $result["email"], $result["password"]);
            }
        }
        return new user(0, "-", "-");
    }
}