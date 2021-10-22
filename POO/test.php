<?php

    class Persona {
        public $nombre;
        public $edad;
        public $estatura;
        public $peso;

        /**
         * @param $nombre
         * @param $edad
         * @param $estatura
         * @param $peso
         */
        public function __construct($nombre, $edad, $estatura, $peso)
        {
            $this->nombre = $nombre;
            $this->edad = $edad;
            $this->estatura = $estatura;
            $this->peso = $peso;
        }

        /**
         * @return mixed
         */
        public function getNombre()
        {
            return $this->nombre;
        }

        /**
         * @return mixed
         */
        public function getEdad()
        {
            return $this->edad;
        }

        /**
         * @return mixed
         */
        public function getEstatura()
        {
            return $this->estatura;
        }

        /**
         * @return mixed
         */
        public function getPeso()
        {
            return $this->peso;
        }


    }

?>
