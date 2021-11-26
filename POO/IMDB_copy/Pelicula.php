<?php

    class Pelicula {

        private int $id;
        private string $titulo;
        private string $ano;
        private float $valoracion;
        private string $imagen;
        private string $trailer;
        private array $generos;
        private array $directores;
        private array $actores;

        public function __construct(int $id, string $titulo, string $ano, float $valoracion, string $imagen, string $trailer, array $generos, array $directores, array $actores)
        {
            $this->id = $id;
            $this->titulo = $titulo;
            $this->ano = $ano;
            $this->valoracion = $valoracion;
            $this->imagen = $imagen;
            $this->trailer = $trailer;
            $this->generos = $generos;
            $this->directores = $directores;
            $this->actores = $actores;
        }


    }

?>