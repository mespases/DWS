<?php

//require_once "config_db.php";

class Dbo extends MySqli
{
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "hotels";

    public function default()
    {
        parent::__construct($this->hostname, $this->username, $this->password, $this->database);

        if (mysqli_connect_error()) {
            die("Database connection error: " . mysqli_connect_error());
        }
    }

}