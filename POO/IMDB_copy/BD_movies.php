<?php
include_once "Actores.php";
include_once "Directores.php";
include_once "Pelicula.php";
include_once "Genero.php";
include_once "Comentario.php";

    class BD_movies {

        //SELECT B.nombre, (SELECT GROUP_CONCAT(JSON_ARRAY(comentario)) FROM peliculas_comentarios) as comentario
        //                        FROM peliculas_comentarios as A INNER JOIN usuarios as B on A.id_usuario = B.id
        //                        WHERE A.id_pelicula = '.$id_pelicula.' GROUP BY A.id_usuario;'

        private $actores;
        private $directores;
        private $generos;
        private $peliculas;

        private $conn;
        private $host = "localhost";
        private $username = "root";
        private $password = "";
        private $bd_name = "bd_movies";

        //private $host = "sql480.main-hosting.eu";
        //private $username = "u850300514_mespases";
        //private $password = "x45185284J";
        //private $bd_name = "u850300514_mespases";

        /** Crea una BD e inserta si no existe */
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
            $this->createTableUsers();
            $this->createTableComentarios();

            // Descomentar para insertar todos los datos
            //  $this->extractJson();
        }

        /** Inserta todos los datos de los json en las tablas correspondientes */
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

        /** Crea la base de datos */
        private function createDB() {
            $query = "CREATE DATABASE IF NOT EXISTS ". $this->bd_name;

            $this->sendQuery($query);
        }

        /** Crea la tabla de usuarios */
        private function createTableUsers() {
            $query = "CREATE TABLE IF NOT EXISTS usuarios(
                            id int PRIMARY KEY AUTO_INCREMENT,
                            nombre varchar(255) not null,
                            email varchar(255) not null UNIQUE,
                            password varchar(255) not null
                        );";
            $this->sendQuery($query);
        }

        /** Crea la tabla de comentarios */
        private function createTableComentarios() {
            $query = "CREATE TABLE IF NOT EXISTS comentarios (
                            id int PRIMARY KEY AUTO_INCREMENT,
                            id_pelicula int not null,
    						id_usuario int not null,
    						comentario varchar(255),
    						FOREIGN KEY (id_pelicula) REFERENCES peliculas(id) ON DELETE CASCADE,
    						FOREIGN KEY (id_usuario) REFERENCES usuarios(id) ON DELETE CASCADE
                        );";
            $this->sendQuery($query);
        }

        /** Crea la tabla de actores */
        private function createTableActores() {
            $query = "CREATE TABLE IF NOT EXISTS actores (
                            id int PRIMARY KEY,
                            nombre varchar(255),
                            edad int,
                            nacionalidad varchar(255)
                        );";
            $this->sendQuery($query);
        }

        /** Crea la tabla de directores */
        private function createTableDirector() {
            $query = "CREATE TABLE IF NOT EXISTS directores (
                            id int PRIMARY KEY,
                            nombre varchar(255),
                            edad int,
                            nacionalidad varchar(255) 
                        );";
            $this->sendQuery($query);
        }

        /** Crea la tabla de comentarios */
        private function createTableGenero() {
            $query = "CREATE TABLE IF NOT EXISTS generos(
                            id int PRIMARY KEY,
                            nombre varchar(255)
                    );";

            $this->sendQuery($query);
        }

        /** Crea la tabla de peliculas */
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

        /** Crea la tabla de peliculas acotres fk's */
        private function createTablePeliculas_Actores() {
            $query = "CREATE TABLE IF NOT EXISTS peliculas_actores(
                            id_pelicula int not null,
                            id_actor int not null,
                            FOREIGN KEY (id_pelicula) REFERENCES peliculas(id) ON DELETE CASCADE,
                            FOREIGN KEY (id_actor) REFERENCES actores(id) ON DELETE CASCADE 
                    );";

            $this->sendQuery($query);
        }

        /** Crea la tabla de peliculas directores fk's */
        private function createTablePeliculas_Directores() {
            $query = "CREATE TABLE IF NOT EXISTS peliculas_directores(
                            id_pelicula int not null,
                            id_director int not null,
                            FOREIGN KEY (id_pelicula) REFERENCES peliculas(id) ON DELETE CASCADE,
                            FOREIGN KEY (id_director) REFERENCES directores(id) ON DELETE CASCADE 
                    );";

            $this->sendQuery($query);
        }

        /** Crea la tabla de peliculas generos fk's */
        private function createTablePeliculas_Generos() {
            $query = "CREATE TABLE IF NOT EXISTS peliculas_generos(
                            id_pelicula int not null,
                            id_genero int not null,
                            FOREIGN KEY (id_pelicula) REFERENCES peliculas(id) ON DELETE CASCADE,
                            FOREIGN KEY (id_genero) REFERENCES generos(id) ON DELETE CASCADE 
                    );";

            $this->sendQuery($query);
        }

        /** Inserta los actores */
        private function insertTableActores($id, $nombre, $edad, $nacionalidad) {
            $query = 'INSERT INTO actores VALUES ('.$id.', "'.$nombre.'", '.$edad.', "'.$nacionalidad.'");';

            $this->sendQuery($query);
        }

        /** Inserta los directores */
        private function insertTableDirector($id, $nombre, $edad, $nacionalidad) {
            $query = 'INSERT INTO directores VALUES ('.$id.', "'.$nombre.'", '.$edad.', "'.$nacionalidad.'");';

            $this->sendQuery($query);
        }

        /** Inserta los generos */
        private function insertTableGenero($id, $nombre) {
            $query = 'INSERT INTO generos VALUES ('.$id.', "'.$nombre.'");';

            $this->sendQuery($query);
        }

        /** Inserta las peliculas */
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

        /** Inserta los peliculas actores fk's */
        private function insertTablePeliculas_Actores($pelicula, $actor) {
            foreach ($this->actores as $actore) {
                if ($actor == $actore["nombre"]) {
                    $query = 'INSERT INTO peliculas_actores VALUES('.$pelicula.', '.intval($actore["id"]).');';
                    $this->sendQuery($query);
                }
            }
        }

        /** Inserta los peliculas directores fk's */
        private function insertTablePeliculas_Directores($pelicula, $directore) {
            foreach ($this->directores as $director) {
                if ($directore == $director["nombre"]) {
                    $query = 'INSERT INTO peliculas_directores VALUES('.$pelicula.', '.intval($director["id"]).');';
                    $this->sendQuery($query);
                }
            }
        }

        /** Inserta los peliculas generos fk's */
        private function insertTablePeliculas_Generos($pelicula, $genero) {
            foreach ($this->generos as $g) {
                if ($genero == $g["nombre"]) {
                    $query = 'INSERT INTO peliculas_generos VALUES('.$pelicula.', '.intval($g["id"]).');';
                    $this->sendQuery($query);
                }
            }
        }

        /** Inserta un nuevo comentario en una pelicula en concreto */
        public function insertComentario($id_pelicula, $id_usuario, $comentario) {
            $query = "INSERT INTO `comentarios` (`id_pelicula`, `id_usuario`, `comentario`) VALUES 
                                                            ('".$id_pelicula."', '".$id_usuario["id"]."', '".$comentario."');";

            $this->sendQuery($query);
        }

        /** Registra un nuevo usuario para que pueda iniciar sesion, enseñando un error si ha pasado algo */
        public function insertUsuario($nombre, $email, $password) {
            $query = "INSERT INTO usuarios(nombre, email, password) VALUES ('".$nombre."', '".$email."', '".$password."')";

            if (!mysqli_query($this->conn, $query)) {
                echo "<script>
                            Swal.fire({
                              icon: 'error',
                              title: 'Oops...',
                              text: 'El email introducido ya existe',
                            })
                        </script>";
            }
        }

        /** Selecciona los actores con la id_pelicula pasada */
        private function selectActores($id_pelicula) {
            $query = "SELECT A.id, A.nombre, A.edad, A.nacionalidad FROM actores as A INNER JOIN peliculas_actores as B on A.id = B.id_actor WHERE B.id_pelicula = ".$id_pelicula." GROUP BY A.id";

            $resultado = [];
            $sql = $this->conn->query($query);

            while ($row = $sql->fetch_assoc()) {
                $resultado[] = new Actores($row["id"], $row["nombre"], $row["edad"], $row["nacionalidad"]);
            }

            return $resultado;
        }

        /** Selecciona los directores con la id_pelicula pasada */
        private function selectDirectores($id_pelicula) {
            $query = "SELECT A.id, A.nombre, A.edad, A.nacionalidad FROM directores as A INNER JOIN peliculas_directores as B on A.id = B.id_director WHERE B.id_pelicula = ".$id_pelicula." GROUP BY A.id;";

            $resultado = [];

            $sql = $this->conn->query($query);

            while ($row = $sql->fetch_assoc()) {
                $resultado[] = new Directores($row["id"], $row["nombre"], $row["edad"], $row["nacionalidad"]);
            }

            return $resultado;
        }

        /** Selecciona los generos con la id_pelicula pasada */
        private function selectGeneros($id_pelicula) {
            $query = "SELECT A.id, A.nombre FROM generos as A INNER JOIN peliculas_generos as B on A.id = B.id_genero WHERE B.id_pelicula = ".$id_pelicula." GROUP BY A.id;";

            $resultado = [];

            $sql = $this->conn->query($query);

            while ($row = $sql->fetch_assoc()) {
                $resultado[] = new Genero($row["id"], $row["nombre"]);
            }

            return $resultado;
        }

        /** Selecciona los comentarios con la id_pelicula pasada */
        private function selectComentarios($id_pelicula) {
            $query = 'SELECT B.nombre, A.comentario FROM comentarios as A INNER JOIN usuarios as B on A.id_usuario = B.id 
                              WHERE A.id_pelicula = '.$id_pelicula.';';

            $resultado = [];
            $sql = $this->conn->query($query);

            while ($row = $sql->fetch_assoc()) {
                $resultado[] = new Comentario($row["nombre"], $row["comentario"]);
            }

            return $resultado;
        }

        /** Devuelve el id del usuario pasandole el email */
        public function selectUserId($email) {
            $query = 'SELECT id FROM `usuarios` WHERE email = "'.$email.'";';

            return $this->conn->query($query)->fetch_assoc();
        }

        /** Devuelve todas las peliculas que esten dentro de la BD */
        public function selectAllPeliculas() {
            $query = "SELECT * FROM `peliculas`;";

            $resultado = [];
            $sql = $this->conn->query($query);

            while ($row = $sql->fetch_assoc()) {
                $resultado[] = new Pelicula($row["id"], $row["titulo"], $row["ano"], $row["valoracion"], $row["imagen"], $row["trailer"],
                $this->selectGeneros($row["id"]), $this->selectDirectores($row["id"]), $this->selectActores($row["id"]));
            }

            return $resultado;
        }

        /** Devuelve solo la pelicula del id introducido por parametro */
        public function selectOnePelicula($id_pelicula) {
            $query = "SELECT * FROM `peliculas` WHERE id = ".$id_pelicula.";";

            //$resultado = [];

            $sql = $this->conn->query($query);

            while ($row = $sql->fetch_assoc()) {
                $resultado = new Pelicula($row["id"], $row["titulo"], $row["ano"], $row["valoracion"], $row["imagen"], $row["trailer"],
                    $this->selectGeneros($row["id"]), $this->selectDirectores($row["id"]), $this->selectActores($row["id"]), $this->selectComentarios($row["id"]));
            }

            return $resultado;
        }

        /** Devuelve el numero de peliculas totales dentro de la BD */
        public function getNumeroDePeliculas() {
            $query = "SELECT COUNT(titulo) as numero FROM peliculas;";

            return $this->conn->query($query)->fetch_assoc();
        }

        /** Devuelve todos las peliculas que contengan en el titulo el parametro */
        public function selectBySearch($busqueda) {
            $query = "SELECT * FROM peliculas WHERE titulo LIKE '%".$busqueda."%';";

            $resultado = [];
            $sql = $this->conn->query($query);

            while ($row = $sql->fetch_assoc()) {
                $resultado[] = new Pelicula($row["id"], $row["titulo"], $row["ano"], $row["valoracion"], $row["imagen"], $row["trailer"],
                    $this->selectGeneros($row["id"]), $this->selectDirectores($row["id"]), $this->selectActores($row["id"]));
            }

            return $resultado;

        }

        /** Devuelve true si el usuario y contraseña estan dentro de la BD */
        public function authentifyUser($email, $password) {
            $query = "SELECT * FROM `usuarios` WHERE email = '".$email."';";

            $resultado = $this->conn->query($query)->fetch_assoc();

            if (isset($resultado) && password_verify($password, $resultado["password"])) {
                return true;
            }

            return false;
        }

        /** Realiza la query */
        private function sendQuery($query) {
            if (!mysqli_query($this->conn, $query)) {
                echo "Error: ".$query."<br>".mysqli_error($this->conn);
            }
        }

        /** Cierra la conexion de la base de datos */
        public function closeMySQL() {
            mysqli_close($this->conn);
        }

    }

?>