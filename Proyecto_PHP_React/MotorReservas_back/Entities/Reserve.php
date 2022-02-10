<?php

class Reserve
{
    public int $id;
    public int $userId;
    public int $hotelId;
    public DateTime $dateStart;
    public DateTime $dateEnd;
    public int $room;

    /**
     * @param int $id
     * @param int $userId
     * @param int $hotelId
     * @param DateTime $dateStart
     * @param DateTime $dateEnd
     * @param int $room
     */
    public function __construct(int $id, int $userId, int $hotelId, DateTime $dateStart, DateTime $dateEnd, int $room)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->hotelId = $hotelId;
        $this->dateStart = $dateStart;
        $this->dateEnd = $dateEnd;
        $this->room = $room;
    }

}