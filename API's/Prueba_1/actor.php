<?php

    class actor {

        private $actor_id;
        private $first_name;
        private $last_name;
        private $last_update;

        /**
         * @param $actor_id
         * @param $first_name
         * @param $last_name
         * @param $last_update
         */
        public function __construct($actor_id, $first_name, $last_name, $last_update)
        {
            $this->actor_id = $actor_id;
            $this->first_name = $first_name;
            $this->last_name = $last_name;
            $this->last_update = $last_update;
        }

        /**
         * @return mixed
         */
        public function getActorId()
        {
            return $this->actor_id;
        }

        /**
         * @param mixed $actor_id
         */
        public function setActorId($actor_id)
        {
            $this->actor_id = $actor_id;
        }

        /**
         * @return mixed
         */
        public function getFirstName()
        {
            return $this->first_name;
        }

        /**
         * @param mixed $first_name
         */
        public function setFirstName($first_name)
        {
            $this->first_name = $first_name;
        }

        /**
         * @return mixed
         */
        public function getLastName()
        {
            return $this->last_name;
        }

        /**
         * @param mixed $last_name
         */
        public function setLastName($last_name)
        {
            $this->last_name = $last_name;
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
