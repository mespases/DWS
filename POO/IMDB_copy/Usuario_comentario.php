<?php

    class Usuario_comentario {

        private string $nombre;
        private string $commentario;

        public function __construct(string $nombre, string $commentario)
        {
            $this->nombre = $nombre;
            $this->commentario = $commentario;
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