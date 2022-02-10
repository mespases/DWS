<?php

class Image
{
    public int $id;
    public string $url;

    /**
     * @param int $id
     * @param string $url
     */
    public function __construct(int $id, string $url)
    {
        $this->id = $id;
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

}