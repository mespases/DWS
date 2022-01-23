<?php

include_once '../DB/db.php';
include_once '../Entities/cities.php';
include_once '../Entities/countries.php';
include_once '../Entities/multimedias.php';
include_once '../Entities/neighborhoods.php';
include_once '../Entities/states.php';
include_once '../Entities/users.php';
include_once '../Entities/properties.php';

    class listHotelsModel {

        private $conn;

        public function __construct() {
            $this->conn = new DB();
        }

        private function executeQuery($query) {
            $this->conn->default();
            $query_result = $this->conn->query($query);
            $this->conn->close();

            return $query_result->fetch_assoc();
        }

        private function getCities($id) {
            $query = "SELECT * FROM `cities` WHERE id=".$id;
            $query_result = $this->executeQuery($query);

            return new cities($query_result["id"], $query_result["name"]);
        }

        private function getCountries($id) {
            $query = "SELECT * FROM `countries` WHERE id=".$id;
            $query_result = $this->executeQuery($query);

            return new countries($query_result["id"], $query_result["name"]);
        }

        private function getMultimedia($id) {
            $query = "SELECT * FROM `multimedias` WHERE propertyId = ".$id." LIMIT 1;";
            $query_result = $this->executeQuery($query);

            $result[] = new multimedias($query_result["id"], $query_result["propertyId"], $query_result["url"]);
            return $result;
        }

        private function getNeigh($id) {
            $query = "SELECT * FROM `neighborhoods` WHERE id=".$id;
            $query_result = $this->executeQuery($query);

            return new neighborhoods($query_result["id"], $query_result["name"]);
        }

        private function getStates($id) {
            $query = "SELECT * FROM `states` WHERE id=".$id;
            $query_result = $this->executeQuery($query);

            return new states($query_result["id"], $query_result["name"]);
        }

        private function getUsers($id) {
            $query = "SELECT * FROM `users` WHERE id=".$id;
            $query_result = $this->executeQuery($query);

            return new users($query_result["id"], $query_result["mail"], $query_result["password"]);
        }

        public function getPropierties() {
            $query = "SELECT * FROM `properties`";
            $this->conn->default();
            $queryresult = $this->conn->query($query);
            $this->conn->close();

            while ($query_result = $queryresult->fetch_assoc()) {
                $results[] =  new properties($query_result["id"], $this->getCountries($query_result["countryId"]), $this->getStates($query_result["stateId"]), $this->getCities($query_result["cityId"]), $this->getNeigh($query_result["neighborhoodId"]), $this->getMultimedia($query_result["id"]),
                    $query_result["zipcode"], $query_result["latitude"], $query_result["longitude"], $query_result["date"], $query_result["description"], $query_result["bathrooms"], $query_result["floor"], $query_result["rooms"], $query_result["surface"], $query_result["price"]);
            }

            return $results;
        }
    }

?>