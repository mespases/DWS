<?php

class db extends mysqli {

    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db_name = "Examen-3-2";


    public function defecto() {
        parent::__construct($this->host, $this->user, $this->password, $this->db_name);
    }

}
?>