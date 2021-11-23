<?php

    class BDD {

        private $conn;
        private $host = "localhost";
        private $username = "root";
        private $password = "";
        private $databasename = "rick";

        public function __construct() {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->databasename);
            if ($this->conn->connect_error) {
                die("Conection failed: ". $this->conn->connect_error);
            }
        }

        public function select() {
            $query = "SELECT * FROM episodes";

            $result = $this->conn->query($query);
            $arr = [];

            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }

            return $arr;
        }

        public function close() {
            mysqli_close($this->conn);
        }
    }



?>