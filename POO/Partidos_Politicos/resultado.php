<?php

    class Resultado {

        private $distrito;
        private $partido;
        private $votos;
        private $resultado;

        public function __construct($distrito, $partido, $votos)
        {
            $this->distrito = $distrito;
            $this->partido = $partido;
            $this->votos = $votos;
        }

        public function setResultado($resultado)
        {
            $this->resultado = $resultado;
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