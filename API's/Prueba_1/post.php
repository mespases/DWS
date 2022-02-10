<?php

include_once 'db.php';
include_once 'actor.php';
include_once 'language.php';

    class post {

        private $conn;

        public function __construct()
        {
            $this->conn = new db();
        }

        public function getActor($id) {
            $sql = "SELECT * FROM `actor` as A INNER JOIN film_actor as B on A.actor_id = B.actor_id WHERE B.film_id = ".$id." GROUP BY B.actor_id;";
            $this->conn->defecto();
            $result = $this->conn->query($sql);
            $this->conn->close();

            $return = Array();
            while ($row = $result->fetch_assoc()) {
                $return[] = new actor($row["actor_id"], $row["first_name"], $row["last_name"], $row["last_update"]);
            }
            return $return;
        }

        public function getLang($id) {
            $sql = "SELECT * FROM `language` WHERE language_id = ".$id;
            $this->conn->defecto();
            $return = $this->conn->query($sql);
            $this->conn->close();
            $result = $return->fetch_assoc();

            return $result;
            //return new language($result["language_id"], $result["name"], $result["last_update"]);
        }

    }

?>