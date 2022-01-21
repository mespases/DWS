<?php

    class Multimedias {

        private $id;
        private $propertyId;
        private $url;

        /**
         * @param $id
         * @param $propertyId
         * @param $url
         */
        public function __construct($id, $propertyId, $url)
        {
            $this->id = $id;
            $this->propertyId = $propertyId;
            $this->url = $url;
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
         * @return mixed
         */
        public function getPropertyId()
        {
            return $this->propertyId;
        }

        /**
         * @param mixed $propertyId
         */
        public function setPropertyId($propertyId): void
        {
            $this->propertyId = $propertyId;
        }

        /**
         * @return mixed
         */
        public function getUrl()
        {
            return $this->url;
        }

        /**
         * @param mixed $url
         */
        public function setUrl($url): void
        {
            $this->url = $url;
        }




    }

?>
