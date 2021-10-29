<?php

    class Partido {

        private $id;
        private $nombre;
        private $acronimo;
        private $logo;

        private $distrito; // Array
        private $votos; // Array

        public function __construct($id, $nombre, $acronimo, $logo)
        {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->acronimo = $acronimo;
            $this->logo = $logo;
        }

        public function getNombre()
        {
        return $this->nombre;
        }

        public function setDistrito($distrito)
        {
        $this->distrito = $distrito;
        }

        public function setVotos($votos)
        {
        $this->votos = $votos;
        }


        }
        ?>

