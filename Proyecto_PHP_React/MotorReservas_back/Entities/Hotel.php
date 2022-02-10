<?php

class Hotel
{
    public int $id;
    public string $name;
    public string $description;
    public string $street;
    public Town $town;
    public int $score;
    public float $basicPrice;
    public float $deluxePrice;
    public array $images;

    /**
     * @param int $id
     * @param string $name
     * @param string $description
     * @param string $street
     * @param Town $town
     * @param int $score
     * @param float $basicPrice
     * @param float $deluxePrice
     * @param array $images
     */
    public function __construct(int $id, string $name, string $description, string $street, Town $town, int $score, float $basicPrice, float $deluxePrice, array $images)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->street = $street;
        $this->town = $town;
        $this->score = $score;
        $this->basicPrice = $basicPrice;
        $this->deluxePrice = $deluxePrice;
        $this->images = $images;
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @return Town
     */
    public function getTown(): Town
    {
        return $this->town;
    }

    /**
     * @return int
     */
    public function getScore(): int
    {
        return $this->score;
    }

    /**
     * @return float
     */
    public function getBasicPrice(): float
    {
        return $this->basicPrice;
    }

    /**
     * @return float
     */
    public function getDeluxePrice(): float
    {
        return $this->deluxePrice;
    }

    /**
     * @return array
     */
    public function getImages(): array
    {
        return $this->images;
    }

}