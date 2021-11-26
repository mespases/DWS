<?php

    class BD_movies {

        // Crear todo asociado a aobjetos 
        private $actores;
        private $directores;
        private $generos;
        private $peliculas;

        private $conn;
        private $host = "localhost";
        private $username = "root";
        private $password = "";
        private $bd_name = "bd_movies";

        public function __construct() {
            $this->conn = new mysqli($this->host, $this->username, $this->password);

            $this->createDB();
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->bd_name);

            $this->createTableActores();
            $this->createTableDirector();
            $this->createTableGenero();
            $this->createTablePelicula();
            $this->createTablePeliculas_Actores();
            $this->createTablePeliculas_Directores();
            $this->createTablePeliculas_Generos();

            //$this->extractJson();
        }

        private function extractJson() {
            $this->actores = json_decode(file_get_contents("./json/actores.json"), true);
            $this->directores = json_decode(file_get_contents("./json/directores.json"), true);
            $this->generos = json_decode(file_get_contents("./json/generos.json"), true);
            $this->peliculas = json_decode(file_get_contents("./json/peliculas.json"), true);

            // Actores
            foreach ($this->actores as $actore) {
                $this->insertTableActores($actore["id"], $actore["nombre"], $actore["edad"], $actore["nacionalidad"]);
            }

            // Directores
            foreach ($this->directores as $directore) {
                $this->insertTableDirector($directore["id"], $directore["nombre"], $directore["edad"], $directore["nacionalidad"]);
            }

            // Generos
            foreach ($this->generos as $genero) {
                $this->insertTableGenero($genero["id"], $genero["nombre"]);
            }

            // Peliculas
            foreach ($this->peliculas as $pelicula) {
                $this->insertTablePelicula($pelicula["id"], $pelicula["titulo"], $pelicula["ano"], $pelicula["valoracion"],
                $pelicula["imagen"], $pelicula["trailer"], $pelicula["director"], $pelicula["generos"], $pelicula["actores"]);
            }
        }

        private function createDB() {
            $query = "CREATE DATABASE IF NOT EXISTS ". $this->bd_name;

            $this->sendQuery($query);
        }

        private function createTableActores() {
            $query = "CREATE TABLE IF NOT EXISTS actores (
                            id int PRIMARY KEY,
                            nombre varchar(255),
                            edad int,
                            nacionalidad varchar(255)
                        );";
            $this->sendQuery($query);
        }

        private function createTableDirector() {
            $query = "CREATE TABLE IF NOT EXISTS directores (
                            id int PRIMARY KEY,
                            nombre varchar(255),
                            edad int,
                            nacionalidad varchar(255) 
                        );";
            $this->sendQuery($query);
        }

        private function createTableGenero() {
            $query = "CREATE TABLE IF NOT EXISTS generos(
                            id int PRIMARY KEY,
                            nombre varchar(255)
                    );";

            $this->sendQuery($query);
        }

        private function createTablePelicula() {
            $query = "CREATE TABLE IF NOT EXISTS peliculas(
                            id int PRIMARY KEY,
                            titulo varchar(255),
                            ano varchar(255),
                            valoracion double,
                            imagen varchar(255),
                            trailer varchar(255)
                    );";

            $this->sendQuery($query);
        }

        private function createTablePeliculas_Actores() {
            $query = "CREATE TABLE IF NOT EXISTS peliculas_actores(
                            id_pelicula int not null,
                            id_actor int not null,
                            FOREIGN KEY (id_pelicula) REFERENCES peliculas(id) ON DELETE CASCADE,
                            FOREIGN KEY (id_actor) REFERENCES actores(id) ON DELETE CASCADE 
                    );";

            $this->sendQuery($query);
        }

        private function createTablePeliculas_Directores() {
            $query = "CREATE TABLE IF NOT EXISTS peliculas_directores(
                            id_pelicula int not null,
                            id_director int not null,
                            FOREIGN KEY (id_pelicula) REFERENCES peliculas(id) ON DELETE CASCADE,
                            FOREIGN KEY (id_director) REFERENCES directores(id) ON DELETE CASCADE 
                    );";

            $this->sendQuery($query);
        }

        private function createTablePeliculas_Generos() {
            $query = "CREATE TABLE IF NOT EXISTS peliculas_generos(
                            id_pelicula int not null,
                            id_genero int not null,
                            FOREIGN KEY (id_pelicula) REFERENCES peliculas(id) ON DELETE CASCADE,
                            FOREIGN KEY (id_genero) REFERENCES generos(id) ON DELETE CASCADE 
                    );";

            $this->sendQuery($query);
        }

        private function insertTableActores($id, $nombre, $edad, $nacionalidad) {
            $query = 'INSERT INTO actores VALUES ('.$id.', "'.$nombre.'", '.$edad.', "'.$nacionalidad.'");';

            $this->sendQuery($query);
        }

        private function insertTableDirector($id, $nombre, $edad, $nacionalidad) {
            $query = 'INSERT INTO directores VALUES ('.$id.', "'.$nombre.'", '.$edad.', "'.$nacionalidad.'");';

            $this->sendQuery($query);
        }

        private function insertTableGenero($id, $nombre) {
            $query = 'INSERT INTO generos VALUES ('.$id.', "'.$nombre.'");';

            $this->sendQuery($query);
        }

        private function insertTablePelicula($id, $titulo, $ano, $valoracion, $imagen, $trailer, $director, $genero, $actores) {
            $query = 'INSERT INTO peliculas VALUES ('.$id.', "'.$titulo.'", "'.$ano.'", '.$valoracion.', "'.$imagen.'", "'.$trailer.'");';
            $this->sendQuery($query);

            for ($i = 0; $i < count($director); $i++) {
                $this->insertTablePeliculas_Directores($id, $director[$i]);
            }

            for ($j = 0; $j < count($genero); $j++) {
                $this->insertTablePeliculas_Generos($id, $genero[$j]);
            }

            for ($k = 0; $k < count($actores); $k++) {
                $this->insertTablePeliculas_Actores($id, $actores[$k]);
            }


        }

        private function insertTablePeliculas_Actores($pelicula, $actor) {
            foreach ($this->actores as $actore) {
                if (strcmp($actor, $actore["nombre"])) {
                    $query = 'INSERT INTO peliculas_actores VALUES('.$pelicula.', '.intval($actore["id"]).');';
                }
            }

            $this->sendQuery($query);
        }

        private function insertTablePeliculas_Directores($pelicula, $directore) {
            foreach ($this->directores as $director) {
                if (strcmp($directore, $director["nombre"])) {
                    $query = 'INSERT INTO peliculas_directores VALUES('.$pelicula.', '.intval($director["id"]).');';
                }
            }

            $this->sendQuery($query);
        }

        private function insertTablePeliculas_Generos($pelicula, $genero) {
            foreach ($this->generos as $g) {
                if (strcmp($genero, $g["nombre"])) {
                    $query = 'INSERT INTO peliculas_generos VALUES('.$pelicula.', '.intval($g["id"]).');';
                }
            }

            $this->sendQuery($query);
        }

        public function selectActores() {
            $query = "SELECT * FROM `actores`;";

            return $this->getRows($query);
        }

        public function selectDirectores() {
            $query = "SELECT * FROM `directores`;";

            return $this->getRows($query);
        }

        public function selectGeneros() {
            $query = "SELECT * FROM `generos`;";

            return $this->getRows($query);
        }

        public function selectPeliculas() {
            $query = "SELECT * FROM `peliculas`;";

            return $this->getRows($query);
        }

        public function selectPeliculas_Actores() {
            $query = "SELECT * FROM `peliculas_actores`;";

            return $this->getRows($query);
        }

        public function selectPeliculas_Directores() {
            $query = "SELECT * FROM `peliculas_directores`;";

            return $this->getRows($query);
        }

        public function selectPeliculas_Generos() {
            $query = "SELECT * FROM `peliculas_generos`;";

            return $this->getRows($query);
        }

        private function sendQuery($query) {
            if (!mysqli_query($this->conn, $query)) {
                echo "Error: ".$query."<br>".mysqli_error($this->conn);
            }
        }

        private function getRows($query) {
            $resultado = [];

            while ($row = $this->conn->query($query)->fetch_assoc()) {
                $resultado[] = $row;
            }

            return $resultado;
        }

        public function closeMySQL() {
            mysqli_close($this->conn);
        }

    }

?>