<?php

    class Pelicula {

        private $id;
        private $titulo;
        private $ano;
        private $valoracion;
        private $imagen;
        private $trailer;

        public function __construct($id, $titulo, $ano, $valoracion, $imagen, $trailer)
        {
            $this->id = $id;
            $this->titulo = $titulo;
            $this->ano = $ano;
            $this->valoracion = $valoracion;
            $this->imagen = $imagen;
            $this->trailer = $trailer;
        }


    }

?>