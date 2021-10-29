<?php

    class Resultado {

        private $distrito;
        private $partido;
        private $votos;
        private $escanos;

        public function __construct($distrito, $partido, $votos)
        {
            $this->distrito = $distrito;
            $this->partido = $partido;
            $this->votos = $votos;
        }

        public function setEscanos($escanos)
        {
            $this->escanos = $escanos;
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