<?php

include_once '../DB/DB.php';
include_once '../Entities/Properties.php';
include_once '../Entities/Cities.php';
include_once '../Entities/Countries.php';
include_once '../Entities/Multimedias.php';
include_once '../Entities/Neighborhoods.php';
include_once '../Entities/States.php';

    class listHotelsModel {

        private DB $conn;

        public function __construct()
        {
            $this->conn = new DB();
        }

        public function getCities($id) {
            $query = "SELECT * FROM `cities` WHERE id = ".$id;
            $this->conn->default();
            $sql_result = $this->conn->query($query);
            $this->conn->close();
            $result = $sql_result->fetch_assoc();
            return new cities($result["id"], $result["name"]);
        }

        public function getCountries($id) {
            $query = "SELECT * FROM `countries` WHERE id = ".$id;
            $this->conn->default();
            $sql_result = $this->conn->query($query);
            $this->conn->close();
            $result = $sql_result->fetch_assoc();
            return new countries($result["id"], $result["name"]);

        }

        public function getNeight($id) {
            $query = "SELECT * FROM `neighborhoods` WHERE id = ".$id;
            $this->conn->default();
            $sql_result = $this->conn->query($query);
            $this->conn->close();
            $result = $sql_result->fetch_assoc();
            return new neighborhoods($result["id"], $result["name"]);
        }

        public function getStates($id) {
            $query = "SELECT * FROM `states` WHERE id = ".$id;
            $this->conn->default();
            $sql_result = $this->conn->query($query);
            $this->conn->close();
            $result = $sql_result->fetch_assoc();
            return new states($result["id"], $result["name"]);

        }

        public function getMultimedia($id) {
            $query = "SELECT * FROM `multimedias` WHERE propertyId = ".$id." LIMIT 1";
            $this->conn->default();
            $sql_result = $this->conn->query($query);
            $this->conn->close();
            $result = $sql_result->fetch_assoc();
            return new multimedias($result["id"], $result["propertyId"], $result["url"]);

        }

        /** POST */
        public function getMultimedias() {
            $query = "SELECT * FROM `multimedias`";
            $this->conn->default();
            $sql_result = $this->conn->query($query);
            $this->conn->close();
            $return = ArraY();

            while ($row = $sql_result->fetch_assoc()) {
                $return[] = new multimedias($row["id"], $row["propertyId"], $row["url"]);
            }

            return $return;

        }

        public function getCitiesPost($id) {
            $query = "SELECT * FROM `cities` WHERE id = ".$id;
            $this->conn->default();
            $sql_result = $this->conn->query($query);
            $this->conn->close();
            $result = $sql_result->fetch_assoc();
            return new cities($result["id"], $result["name"]);
        }

        public function getCountriesPost($id) {
            $query = "SELECT * FROM `countries` WHERE id = ".$id;
            $this->conn->default();
            $sql_result = $this->conn->query($query);
            $this->conn->close();
            $result = $sql_result->fetch_assoc();
            return new countries($result["id"], $result["name"]);

        }

        public function getNeightPost($id) {
            $query = "SELECT * FROM `neighborhoods` WHERE id = ".$id;
            $this->conn->default();
            $sql_result = $this->conn->query($query);
            $this->conn->close();
            $result = $sql_result->fetch_assoc();
            return new neighborhoods($result["id"], $result["name"]);
        }

        public function getStatesPost($id) {
            $query = "SELECT * FROM `states` WHERE id = ".$id;
            $this->conn->default();
            $sql_result = $this->conn->query($query);
            $this->conn->close();
            $result = $sql_result->fetch_assoc();
            return new states($result["id"], $result["name"]);

        }

        public function getList() {
            $query = "SELECT * FROM `properties`";
            $this->conn->default();
            $slq_result = $this->conn->query($query);
            $this->conn->close();

            $return = [];
            while ($result = $slq_result->fetch_assoc()) {
                $return[] = new Properties($result["id"], $this->getCountries($result["countryId"]), $this->getStates($result["stateId"]),
                    $this->getCities($result["cityId"]), $this->getNeight($result["neighborhoodId"]), $this->getMultimedia($result["id"]),
                    $result["zipcode"], $result["latitude"], $result["longitude"], $result["date"], $result["description"],
                    $result["bathrooms"], $result["floor"], $result["rooms"], $result["surface"], $result["price"]);
            }

            return $return;
        }

    }

?>
