<?php

    class Properties {

        private $id;
        private countries $country;
        private states $state;
        private cities $city;
        private neighborhoods $neighborhood;
        private $multimedias;
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
         * @param countries $country
         * @param states $state
         * @param cities $city
         * @param neighborhoods $neighborhood
         * @param $multimedias
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
        public function __construct($id, countries $country, states $state, cities $city, neighborhoods $neighborhood, $multimedias, $zipcode, $latitude, $longitude, $date, $description, $bathrooms, $floor, $rooms, $surface, $price)
        {
            $this->id = $id;
            $this->country = $country;
            $this->state = $state;
            $this->city = $city;
            $this->neighborhood = $neighborhood;
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
        public function getCountry(): countries
        {
            return $this->country;
        }

        /**
         * @param countries $country
         */
        public function setCountry(countries $country): void
        {
            $this->country = $country;
        }

        /**
         * @return states
         */
        public function getState(): states
        {
            return $this->state;
        }

        /**
         * @param states $state
         */
        public function setState(states $state): void
        {
            $this->state = $state;
        }

        /**
         * @return cities
         */
        public function getCity(): cities
        {
            return $this->city;
        }

        /**
         * @param cities $city
         */
        public function setCity(cities $city): void
        {
            $this->city = $city;
        }

        /**
         * @return neighborhoods
         */
        public function getNeighborhood(): neighborhoods
        {
            return $this->neighborhood;
        }

        /**
         * @param neighborhoods $neighborhood
         */
        public function setNeighborhood(neighborhoods $neighborhood): void
        {
            $this->neighborhood = $neighborhood;
        }

        /**
         * @return mixed
         */
        public function getMultimedias()
        {
            return $this->multimedias;
        }

        /**
         * @param mixed $multimedias
         */
        public function setMultimedias($multimedias): void
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
