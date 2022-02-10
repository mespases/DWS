<?php

    class DB extends mysqli {
        private $host = "localhost";
        private $user = "root";
        private $password = "";
        private $db_name = "mallorcasa";

        public function default()
        {
            parent::__construct($this->host, $this->user, $this->password, $this->db_name);
        }


    }
?>
