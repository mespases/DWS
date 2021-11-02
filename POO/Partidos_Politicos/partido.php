<?php

    class Partido {

        private $id;
        private $nombre;
        private $acronimo;
        private $logo;
        private $color;

        public function __construct($id, $nombre, $acronimo, $logo, $color)
        {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->acronimo = $acronimo;
            $this->logo = $logo;
            $this->color = $color;
        }

        public function getNombre()
        {
        return $this->nombre;
        }

        public function getAcronimo()
        {
            return $this->acronimo;
        }

        public function getLogo()
        {
            return $this->logo;
        }

        public function getColor()
        {
            return $this->color;
        }

    }
?>
