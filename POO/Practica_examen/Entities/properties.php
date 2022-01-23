<?php

    class properties {

        private $id;
        private countries $countryId;
        private states $stateId;
        private cities $cityId;
        private neighborhoods $neighborhoodId;
        private array $multimedias;
        private $zipcode;
        private $latitude;
        private $longitude;
        private $date;
        private $description;
        private $bathrooms;
        private $floor;
        private $rooms;
        private $surface;
        private $price;

        /**
         * @param $id
         * @param countries $countryId
         * @param states $stateId
         * @param cities $cityId
         * @param neighborhoods $neighborhoodId
         * @param array $multimedias
         * @param $zipcode
         * @param $latitude
         * @param $longitude
         * @param $date
         * @param $description
         * @param $bathrooms
         * @param $floor
         * @param $rooms
         * @param $surface
         * @param $price
         */
        public function __construct($id, countries $countryId, states $stateId, cities $cityId, neighborhoods $neighborhoodId, array $multimedias, $zipcode, $latitude, $longitude, $date, $description, $bathrooms, $floor, $rooms, $surface, $price)
        {
            $this->id = $id;
            $this->countryId = $countryId;
            $this->stateId = $stateId;
            $this->cityId = $cityId;
            $this->neighborhoodId = $neighborhoodId;
            $this->multimedias = $multimedias;
            $this->zipcode = $zipcode;
            $this->latitude = $latitude;
            $this->longitude = $longitude;
            $this->date = $date;
            $this->description = $description;
            $this->bathrooms = $bathrooms;
            $this->floor = $floor;
            $this->rooms = $rooms;
            $this->surface = $surface;
            $this->price = $price;
        }

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed $id
         */
        public function setId($id): void
        {
            $this->id = $id;
        }

        /**
         * @return countries
         */
        public function getCountryId(): countries
        {
            return $this->countryId;
        }

        /**
         * @param countries $countryId
         */
        public function setCountryId(countries $countryId): void
        {
            $this->countryId = $countryId;
        }

        /**
         * @return states
         */
        public function getStateId(): states
        {
            return $this->stateId;
        }

        /**
         * @param states $stateId
         */
        public function setStateId(states $stateId): void
        {
            $this->stateId = $stateId;
        }

        /**
         * @return cities
         */
        public function getCityId(): cities
        {
            return $this->cityId;
        }

        /**
         * @param cities $cityId
         */
        public function setCityId(cities $cityId): void
        {
            $this->cityId = $cityId;
        }

        /**
         * @return neighborhoods
         */
        public function getNeighborhoodId(): neighborhoods
        {
            return $this->neighborhoodId;
        }

        /**
         * @param neighborhoods $neighborhoodId
         */
        public function setNeighborhoodId(neighborhoods $neighborhoodId): void
        {
            $this->neighborhoodId = $neighborhoodId;
        }

        /**
         * @return array
         */
        public function getMultimedias(): array
        {
            return $this->multimedias;
        }

        /**
         * @param array $multimedias
         */
        public function setMultimedias(array $multimedias): void
        {
            $this->multimedias = $multimedias;
        }

        /**
         * @return mixed
         */
        public function getZipcode()
        {
            return $this->zipcode;
        }

        /**
         * @param mixed $zipcode
         */
        public function setZipcode($zipcode): void
        {
            $this->zipcode = $zipcode;
        }

        /**
         * @return mixed
         */
        public function getLatitude()
        {
            return $this->latitude;
        }

        /**
         * @param mixed $latitude
         */
        public function setLatitude($latitude): void
        {
            $this->latitude = $latitude;
        }

        /**
         * @return mixed
         */
        public function getLongitude()
        {
            return $this->longitude;
        }

        /**
         * @param mixed $longitude
         */
        public function setLongitude($longitude): void
        {
            $this->longitude = $longitude;
        }

        /**
         * @return mixed
         */
        public function getDate()
        {
            return $this->date;
        }

        /**
         * @param mixed $date
         */
        public function setDate($date): void
        {
            $this->date = $date;
        }

        /**
         * @return mixed
         */
        public function getDescription()
        {
            return $this->description;
        }

        /**
         * @param mixed $description
         */
        public function setDescription($description): void
        {
            $this->description = $description;
        }

        /**
         * @return mixed
         */
        public function getBathrooms()
        {
            return $this->bathrooms;
        }

        /**
         * @param mixed $bathrooms
         */
        public function setBathrooms($bathrooms): void
        {
            $this->bathrooms = $bathrooms;
        }

        /**
         * @return mixed
         */
        public function getFloor()
        {
            return $this->floor;
        }

        /**
         * @param mixed $floor
         */
        public function setFloor($floor): void
        {
            $this->floor = $floor;
        }

        /**
         * @return mixed
         */
        public function getRooms()
        {
            return $this->rooms;
        }

        /**
         * @param mixed $rooms
         */
        public function setRooms($rooms): void
        {
            $this->rooms = $rooms;
        }

        /**
         * @return mixed
         */
        public function getSurface()
        {
            return $this->surface;
        }

        /**
         * @param mixed $surface
         */
        public function setSurface($surface): void
        {
            $this->surface = $surface;
        }

        /**
         * @return mixed
         */
        public function getPrice()
        {
            return $this->price;
        }

        /**
         * @param mixed $price
         */
        public function setPrice($price): void
        {
            $this->price = $price;
        }




    }

?>
