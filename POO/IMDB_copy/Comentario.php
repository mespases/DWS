<?php

    class Comentario {

        private string $nombre;
        private string $commentario;
        private string $puntuacion;

        public function __construct(string $nombre, string $commentario, string $puntuacion)
        {
            $this->nombre = $nombre;
            $this->commentario = $commentario;
            $this->puntuacion = $puntuacion;
        }

        public function getPuntuacion(): string {
            return $this->puntuacion;
        }

        public function getNombre(): string
        {
            return $this->nombre;
        }

        public function getCommentario(): string
        {
            return $this->commentario;
        }


    }
?>