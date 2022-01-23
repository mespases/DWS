<?php

    class users {

        private $id;
        private $mail;
        private $password;

        /**
         * @param $id
         * @param $mail
         * @param $password
         */
        public function __construct($id, $mail, $password)
        {
            $this->id = $id;
            $this->mail = $mail;
            $this->password = $password;
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
        public function getMail()
        {
            return $this->mail;
        }

        /**
         * @param mixed $mail
         */
        public function setMail($mail): void
        {
            $this->mail = $mail;
        }

        /**
         * @return mixed
         */
        public function getPassword()
        {
            return $this->password;
        }

        /**
         * @param mixed $password
         */
        public function setPassword($password): void
        {
            $this->password = $password;
        }




    }

?>
