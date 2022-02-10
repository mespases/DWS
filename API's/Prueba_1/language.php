<?php

    class language {

        private $language_id;
        private $name;
        private $last_update;

        /**
         * @param $language_id
         * @param $name
         * @param $last_update
         */
        public function __construct($language_id, $name, $last_update)
        {
            $this->language_id = $language_id;
            $this->name = $name;
            $this->last_update = $last_update;
        }

        /**
         * @return mixed
         */
        public function getLanguageId()
        {
            return $this->language_id;
        }

        /**
         * @param mixed $language_id
         */
        public function setLanguageId($language_id)
        {
            $this->language_id = $language_id;
        }

        /**
         * @return mixed
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * @param mixed $name
         */
        public function setName($name)
        {
            $this->name = $name;
        }

        /**
         * @return mixed
         */
        public function getLastUpdate()
        {
            return $this->last_update;
        }

        /**
         * @param mixed $last_update
         */
        public function setLastUpdate($last_update)
        {
            $this->last_update = $last_update;
        }




    }

?>