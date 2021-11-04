<?php

    class Partido {

        private $id;
        private $nombre;
        private $acronimo;
        private $logo;
        private $color;

        // Mapeo para el resultado general
        private $votos_totales;
        private $escanos_totales;

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

        public function getVotosTotales()
        {
            return $this->votos_totales;
        }

        public function setVotosTotales($votos_totales): void
        {
            $this->votos_totales = $votos_totales;
        }

        public function getEscanosTotales()
        {
            return $this->escanos_totales;
        }

        public function setEscanosTotales($escanos_totales): void
        {
            $this->escanos_totales = $escanos_totales;
        }


    }
?>
