<?php

    class BD_R {

        private $conn;
        private $servername = "localhost";
        private $username = "root";
        private $password = "";
        private $dbname = "Rick";

        //private $conn;
        //private $servername = "sql480.main-hosting.eu";
        //private $username = "u850300514_mespases";
        //private $password = "x45185284J";
        //private $dbname = "u850300514_mespases";

        /* Crea una conexion a la BD y crea toda la BD si no existe */
        public function __construct() {
            $this->conn = new mysqli($this->servername, $this->username, $this->password);
            if ($this->conn->connect_error) {
                die("Conection failed: ". $this->conn->connect_error);
            }

            $this->createDB();

            $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            mysqli_set_charset($this->conn, "utf8");

            $this->createTableCharacters();
            $this->createTableEpisodes();
            $this->createTableLocations();
            $this->createTableEp_Ch();
        }

        private function createDB() {
            $query = "CREATE DATABASE IF NOT EXISTS ".$this->dbname.";";

            $this->sendQuery($query);
        }

        private function createTableEp_Ch() {
            $query = "CREATE TABLE IF NOT EXISTS ep_ch (
                        ep_ch_id int AUTO_INCREMENT PRIMARY KEY,
                        id_cha int NOT null,
                        id_epi int NOT null,
                        FOREIGN KEY (id_cha) REFERENCES characters(id) ON DELETE CASCADE,
                        FOREIGN KEY (id_epi) REFERENCES episodes(id) ON DELETE CASCADE
                    )";
            $this->sendQuery($query);
        }

        private function createTableCharacters() {
            $query = "CREATE TABLE IF NOT EXISTS characters (
                        id int PRIMARY KEY,
                        name varchar(255),
                        status varchar(255),
                        species varchar(255),
                        type varchar(255),
                        gender varchar(255),
                        origin varchar(255),
                        location varchar(255),
                        image varchar(255),
                        created varchar(255)
                    )";
            $this->sendQuery($query);
        }

        private function createTableLocations() {
            $query = "CREATE TABLE IF NOT EXISTS locations (
                        id int PRIMARY KEY,
                        name varchar(255),
                        type varchar(255),
    					dimension varchar(255),
    					created varchar(255)
                    )";
            $this->sendQuery($query);
        }

        private function createTableEpisodes() {
            $query = "CREATE TABLE IF NOT EXISTS episodes (
                        id int PRIMARY KEY,
                        name varchar(255),
                        air_date varchar(255),
    					episode varchar(255),
    					created varchar(255)
                    )";
            $this->sendQuery($query);
        }

        private function insertEp_Ch($character, $episode) {
            $query = "INSERT INTO ep_ch(id_cha, id_epi) VALUES (".$character.",".$episode.")";
            $this->sendQuery($query);
        }

        public function insertEpisodes($id, $name, $air_date, $episode, $created) {
            $query = 'INSERT INTO episodes VALUES ('.$id.', "'.$name.'", "'.$air_date.'", "'.$episode.'", "'.$created.'")';
            $this->sendQuery($query);

            // Hay que hacerlo alreves, solo meter los caracteres
            //for ($i = 0; $i < count($characters); $i++) {
            //    $this->insertEp_Ch($characters[$i], $id);
            //}
        }

        public function insertCharacters($id, $name, $status, $species, $type, $gender, $origin, $location, $image, $created, $episodes) {
            $query = 'INSERT INTO characters VALUES ('.$id.', "'.$name.'", "'.$status.'", "'.$species.'", "'.$type.'", "'.$gender.'",
            "'.$origin.'", "'.$location.'", "'.$image.'", "'.$created.'")';
            $this->sendQuery($query);

            for ($i = 0; $i < count($episodes); $i++) {
                $this->insertEp_Ch($id, $episodes[$i]);
            }
        }

        public function insertLocalicaciones($id, $name, $type, $dimension, $created) {
            $query = 'INSERT INTO locations VALUES ('.$id.', "'.$name.'", "'.$type.'", "'.$dimension.'", "'.$created.'")';
            $this->sendQuery($query);
        }

        /* Comprueba si en las querys hay algun error */
        private function sendQuery($query) {
            if (!mysqli_query($this->conn, $query)) {
                echo "Error: " . $query . "<br>" . mysqli_error($this->conn);
            }
        }

        public function closeMySQL() {
            mysqli_close($this->conn);
        }

    }

?>
