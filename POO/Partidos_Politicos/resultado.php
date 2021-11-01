<?php

    class Resultado {

        private $distrito;
        private $partido;
        private $votos;
        private $escanos = 0;
        private $divisor = 1;
        private $porcentaje = 0;

        public function __construct($distrito, $partido, $votos)
        {
            $this->distrito = $distrito;
            $this->partido = $partido;
            $this->votos = $votos;
        }

        public function getPorcentaje(): int
        {
            return $this->porcentaje;
        }

        public function setPorcentaje(int $porcentaje): void
        {
            $this->porcentaje = $porcentaje;
        }


        public function getDivisor(): int
        {
            return $this->divisor;
        }

        public function setDivisor(int $divisor): void
        {
            $this->divisor = $divisor;
        }

        public function setEscanos(int $escanos): void
        {
            $this->escanos = $escanos;
        }

        public function getEscanos(): int
        {
            return $this->escanos;
        }

        public function getPartido()
        {
            return $this->partido;
        }

        public function getDistrito()
        {
            return $this->distrito;
        }

        public function getVotos()
        {
            return $this->votos;
        }



    }


?>