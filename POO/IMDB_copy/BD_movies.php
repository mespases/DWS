<?php

    class BD_movies {

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

            $this->extractJson();
        }

        private function extractJson() {
            $this->actores = json_decode(file_get_contents("./json/actores.json"), true);
            $this->directores = json_decode(file_get_contents("./json/directores.json"), true);
            $this->generos = json_decode(file_get_contents("./json/generos.json"), true);
            $this->peliculas = json_decode(file_get_contents("./json/peliculas.json"), true);
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

            for ($i = 0; $i < count($director); $i++) {
                $this->insertTableDirector($id, $director[$i]);
            }



            $this->sendQuery($query);
        }

        private function insertTablePeliculas_Actores($actor, $pelicula) {

        }

        private function insertTablePeliculas_Directores($directore, $pelicula) {

        }

        private function insertTablePeliculas_Generos($genero, $pelicula) {

        }

        private function sendQuery($query) {
            if (!mysqli_query($this->conn, $query)) {
                echo "Error: ".$query."<br>".mysqli_error($this->conn);
            }
        }

        public function closeMySQL() {
            mysqli_close($this->conn);
        }

    }

?>