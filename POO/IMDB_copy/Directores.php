<?php

    class Directores {

        private $id;
        private $nombre;
        private $edad;
        private $nacionalidad;

        public function __construct($id, $nombre, $edad, $nacionalidad)
        {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->edad = $edad;
            $this->nacionalidad = $nacionalidad;
        }

    }

?>