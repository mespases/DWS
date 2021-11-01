<?php

    class Circunscripcion {

        private $id;
        private $nombre;
        private $delegados;

        public function __construct($id, $nombre, $delegados)
        {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->delegados = $delegados;
        }

        public function getNombre()
        {
            return $this->nombre;
        }

        public function getDelegados()
        {
            return $this->delegados;
        }

    }

?>