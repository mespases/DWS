<?php

include_once "../Db/Dbo.php";

class SignupModel
{
    private Dbo $connection;

    public function __construct()
    {
        $this->connection = new Dbo();
    }

    public function checkUserExists($email): bool
    {
        $sql = "SELECT * FROM users WHERE email = '" . $email."';";
        $this->connection->default();
        $query = $this->connection->query($sql);
        $this->connection->close();
        if ($query->num_rows == 0) {
            return false;
        }
        return true;
    }

    public function newUser($email, $password): bool
    {
        try {
            $cryptedPassword = crypt($password, bin2hex(random_bytes(10)));
        } catch (Exception $e) {
            $cryptedPassword = crypt($password, "salt");
        }
        $sql = "INSERT INTO users (email, password) VALUES ('" . $email."', '".$cryptedPassword."');";
        $this->connection->default();
        $this->connection->query($sql);
        if ($this->connection->insert_id > 0) {
            $this->connection->close();
            return true;
        }
        $this->connection->close();
        return false;
    }
}