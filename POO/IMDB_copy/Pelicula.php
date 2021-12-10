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
        private array $comentarios;

        public function __construct(int $id, string $titulo, string $ano, float $valoracion, string $imagen, string $trailer, array $generos, array $directores, array $actores, array $comentarios = [])
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
            $this->comentarios = $comentarios;
        }


        public function getComentarios(): array
        {
            return $this->comentarios;
        }

        public function getId(): int
        {
            return $this->id;
        }

        public function getTitulo(): string
        {
            return $this->titulo;
        }

        public function getAno(): string
        {
            return $this->ano;
        }

        public function getValoracion(): float
        {
            return $this->valoracion;
        }

        public function getImagen(): string
        {
            return $this->imagen;
        }

        public function getTrailer(): string
        {
            return $this->trailer;
        }

        public function getGeneros(): array
        {
            return $this->generos;
        }

        public function getDirectores(): array
        {
            return $this->directores;
        }

        public function getActores(): array
        {
            return $this->actores;
        }

    }

?>