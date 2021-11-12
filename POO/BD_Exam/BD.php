<?php

    class BD {

        private $conn;
        private $servername = "localhost";
        private $username = "root";
        private $password = "";
        private $dbname = "BD_Exam_Rick";


        public function __construct() {
            $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            if ($this->conn->connect_error) {
                die("Conection failed: ". $this->conn->connect_error);
            }
            $this->createDB();
        }

        private function createDB() {
            $query = "CREATE DATABASE [IF NOT EXISTS] ".$this->dbname.";";

            if (!mysqli_query($this->conn, $query)) {
                echo "Error: " . $query . "<br>" . mysqli_error($this->conn);
            }
        }

        public function insertCharacters($id, $name, $status, $species, $type, $gender, $origin, $location, $image, $created, $episodes) {
            $query = "INSERT INTO characters VALUES (".$id.", '".$name."', '".$status."', '".$species."', '".$type."',
            '".$gender."', '".$origin."', '".$location."', '".$image."', '".$created."', '".$episodes."');";

            if (!mysqli_query($this->conn, $query)) {
                echo "Error: " . $query . "<br>" . mysqli_error($this->conn);
            }
        }

        public function insertEpisodes($id, $name, $air_date, $episode, $created, $characters) {
            $query = "INSERT INTO episodes VALUES (".$id.", '".$name."', '".$air_date."', '".$episode."', '".$created."')"; // Ultimo valor va en array D:

            if (!mysqli_query($this->conn, $query)) {
                echo "Error: " . $query . "<br>" . mysqli_error($this->conn);
            }
        }

        public function insertLocations($id, $name, $type, $dimension, $created, $residents) {
            $query = "INSERT INTO locations VALUES ()";

            if (!mysqli_query($this->conn, $query)) {
                echo "Error: " . $query . "<br>" . mysqli_error($this->conn);
            }
        }

        public function closeMySQL() {
            mysqli_close($this->conn);
        }
    }

?>