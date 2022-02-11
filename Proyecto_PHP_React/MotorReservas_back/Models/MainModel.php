<?php

include_once "../Db/Dbo.php";
include_once "../Entities/Hotel.php";
include_once "../Entities/Image.php";
include_once "../Entities/Town.php";

class MainModel
{
    private Dbo $connection;

    public function __construct()
    {
        $this->connection = new Dbo();
    }

    public function getHotel($id): array {
        $sql = "SELECT h.id as 'hotelId', h.name as 'hotelName', h.description as 'hotelDescription', h.street as 'hotelStreet',
                t.id as 'townId', t.name as 'townName',
                h.score as 'hotelScore', h.basicPrice as 'basicPrice', h.deluxePrice as 'deluxePrice',
                (SELECT GROUP_CONCAT(CONCAT(i.id, ',', i.url) SEPARATOR ';') FROM images i
                JOIN hotels_images hi ON hi.imageId = i.id
                WHERE hi.hotelId = h.id) as 'hotelImages'
                FROM hotels h
                JOIN towns t ON t.id = h.townId
                JOIN hotels_images hi ON hi.hotelId = h.id WHERE h.id = ".$id."
                GROUP BY h.id;";
        $this->connection->default();
        $query = $this->connection->query($sql);
        $this->connection->close();
        $hotels = array();
        while ($result = $query->fetch_assoc()) {
            $town = new Town($result["townId"], $result["townName"]);
            // Explode images
            $images = array();
            $imagesStrArr = explode(';', $result["hotelImages"]);
            foreach ($imagesStrArr as $imageStr) {
                $imageArr = explode(',', $imageStr);
                $images[] = new Image($imageArr[0], $imageArr[1]);
            }
            $hotels[] = new Hotel($result["hotelId"], $result["hotelName"], $result["hotelDescription"], $result["hotelStreet"], $town, $result["hotelScore"], $result["basicPrice"], $result["deluxePrice"], $images);
        }
        return $hotels;
    }

    public function getHotels(): array
    {
        $sql = "SELECT h.id as 'hotelId', h.name as 'hotelName', h.description as 'hotelDescription', h.street as 'hotelStreet',
                t.id as 'townId', t.name as 'townName',
                h.score as 'hotelScore', h.basicPrice as 'basicPrice', h.deluxePrice as 'deluxePrice',
                (SELECT GROUP_CONCAT(CONCAT(i.id, ',', i.url) SEPARATOR ';') FROM images i
                JOIN hotels_images hi ON hi.imageId = i.id
                WHERE hi.hotelId = h.id) as 'hotelImages'
                FROM hotels h
                JOIN towns t ON t.id = h.townId
                JOIN hotels_images hi ON hi.hotelId = h.id
                GROUP BY h.id;";
        $this->connection->default();
        $query = $this->connection->query($sql);
        $this->connection->close();
        $hotels = array();
        while ($result = $query->fetch_assoc()) {
            $town = new Town($result["townId"], $result["townName"]);
            // Explode images
            $images = array();
            $imagesStrArr = explode(';', $result["hotelImages"]);
            foreach ($imagesStrArr as $imageStr) {
                $imageArr = explode(',', $imageStr);
                $images[] = new Image($imageArr[0], $imageArr[1]);
            }
            $hotels[] = new Hotel($result["hotelId"], $result["hotelName"], $result["hotelDescription"], $result["hotelStreet"], $town, $result["hotelScore"], $result["basicPrice"], $result["deluxePrice"], $images);
        }
        return $hotels;
    }
}