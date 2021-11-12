<?php

    class BD {

        private $conn;
        private $servername = "localhost";
        private $username = "root";
        private $password = "";
        private $dbname = "Simulacion_Exam_Part";

        public function __construct() {


            $this->conn = new mysqli($this->servername, $this->username, $this->password);
            if ($this->conn->connect_error) {
                die("Conection failed: ". $this->conn->connect_error);
            }
            $this->createDB();
            $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            mysqli_set_charset($this->conn, "utf8");
            $this->createCircunscripciones();
            $this->createPartidos();
            $this->createResultado();
        }

        private function createDB() {
            $query = "CREATE DATABASE IF NOT EXISTS ".$this->dbname.";";

            $this->sendQuery($query);
        }

        private function createCircunscripciones() {
            $query  = "CREATE TABLE IF NOT EXISTS circunscripciones (
                            id int PRIMARY KEY,
                            nombre varchar (255),
                            delegados int
                        ); ";

            $this->sendQuery($query);
        }

        private function createPartidos() {
            $query = "CREATE TABLE IF NOT EXISTS partidos (
                            id int PRIMARY KEY,
                            nombre varchar (255),
    						acronimo varchar(255),
                            logo varchar(255),
    						color varchar(255)
                        );";

            $this->sendQuery($query);
        }

        private function createResultado() {
            $query = "CREATE TABLE IF NOT EXISTS resultado (
                            distrito varchar(255),
    						partido varchar(255),
    						votos int
                        );";

            $this->sendQuery($query);
        }

        private function sendQuery($query) {
            if (!mysqli_query($this->conn, $query)) {
                echo "Error: " . $query . "<br>" . mysqli_error($this->conn);
            }
        }

        public function insertPartidos($id, $nombre, $acronimo, $logo, $color) {
            $query = 'INSERT INTO partidos(id, nombre, acronimo, logo, color) VALUES 
                                                    ('.$id.', "'.$nombre.'", "'.$acronimo.'", "'.$logo.'", "'.$color.'");';

            $this->sendQuery($query);
        }

        public function insertCircunscripciones($id, $name, $delegados) {
            $query = "INSERT INTO circunscripciones VALUES (".$id.", '".$name."', ".$delegados.");";

            $this->sendQuery($query);
        }

        public function insertResultados($distrito, $partido, $votos) {
            $query = 'INSERT INTO resultado(distrito, partido, votos) VALUES ("'.$distrito.'", "'.$partido.'", "'.$votos.'");';

            $this->sendQuery($query);
        }

        public function closeMySQL() {
            mysqli_close($this->conn);
        }

        public function selectPartidos() {
            $arr = [];
            $cont = 0;

            $query = "SELECT * FROM partidos";
            $result = $this->conn->query($query);

            while ($row = $result->fetch_assoc()) {
                $arr[$cont] =$row;
                $cont++;
            }
            return $arr;
        }

        public function selectDistritos() {
            $arr = [];
            $cont = 0;

            $query = "SELECT * FROM circunscripciones";
            $result = $this->conn->query($query);

            while ($row = $result->fetch_assoc()) {
                $arr[$cont] =$row;
                $cont++;
            }
            return $arr;
        }

        public function selectResults() {
            $arr = [];
            $cont = 0;

            $query = "SELECT * FROM resultado";
            $result = $this->conn->query($query);

            while ($row = $result->fetch_assoc()) {
                $arr[$cont] =$row;
                $cont++;
            }
            return $arr;
        }

    }

?>
