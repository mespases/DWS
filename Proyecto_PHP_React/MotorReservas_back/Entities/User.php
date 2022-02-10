<?php

class User
{
    public int $id;
    public string $email;
    public string $password;

    /**
     * @param int $id
     * @param string $email
     * @param string $password
     */
    public function __construct(int $id, string $email, string $password)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

}