<?php

interface Rentable
{
    public function rent();

    public function leave();
}

abstract class HotelRoom implements Rentable
{
    private $number;
    private $hasTerrace;
    private $hasPrivateBath;
    private $available;

    public function __construct(int $number, bool $hasTerrace, bool $hasPrivateBath)
    {
        $this->number = $number;
        $this->hasTerrace = $hasTerrace;
        $this->hasPrivateBath = $hasPrivateBath;
        $this->available = true;
    }

    public function getRoomNumber()
    {
        return $this->number;
    }

    public function isAvailable()
    {
        return $this->available;
    }

    public function rent()
    {
        $this->available = false;
    }

    public function leave()
    {
        $this->available = true;

        echo 'Room with number ' . $this->number . ' is now available <br>';
    }
}

class SingleHotelRoom extends HotelRoom
{
    public function rent()
    {
        parent::rent();

        echo 'Single hotel room with number ' . $this->getRoomNumber() . ' is rented <br>';
    }
}

class DoubleHotelRoom extends HotelRoom
{
    public function rent()
    {
        parent::rent();

        echo 'Double hotel room with number ' . $this->getRoomNumber() . ' is rented <br>';
    }
}

class ThreeBedHotelRoom extends HotelRoom
{
    public function rent()
    {
        parent::rent();

        echo 'Three bed hotel room with number ' . $this->getRoomNumber() . ' is rented <br>';
    }
}

interface HotelRoomFactory
{
    public function createHotelRoom($number, $hasTerrace, $hasPrivateBath);
}

class SingleHotelRoomFactory implements HotelRoomFactory
{
    public function createHotelRoom($number, $hasTerrace, $hasPrivateBath)
    {
        return new SingleHotelRoom($number, $hasTerrace, $hasPrivateBath);
    }
}

class DoubleHotelRoomFactory implements HotelRoomFactory
{
    public function createHotelRoom($number, $hasTerrace, $hasPrivateBath)
    {
        return new DoubleHotelRoom($number, $hasTerrace, $hasPrivateBath);
    }
}

class ThreeBedHotelRoomFactory implements HotelRoomFactory
{
    public function createHotelRoom($number, $hasTerrace, $hasPrivateBath)
    {
        return new ThreeBedHotelRoom($number, $hasTerrace, $hasPrivateBath);
    }
}

class Hotel
{
    private static $instance;
    private $roomsAvailable;
    private $rooms;
    private $subscribers;

    private function __construct()
    {
        $this->roomsAvailable = [
            SingleHotelRoom::class => 0,
            DoubleHotelRoom::class => 0,
            ThreeBedHotelRoom::class => 0
        ];

        $this->subscribers = [
            SingleHotelRoom::class => [],
            DoubleHotelRoom::class => [],
            ThreeBedHotelRoom::class => []
        ];
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Hotel();
        }

        return self::$instance;
    }

    public function setRoom($room)
    {
        $roomNumber = $room->getRoomNumber();
        $roomType = get_class($room);

        $this->rooms[$roomNumber] = $room;
        $this->roomsAvailable[$roomType]++;
    }

    public function checkin($roomType)
    {
        if ($this->haveAvailableRoomsOfType($roomType)) {
            foreach ($this->rooms as $room) {
                if ($room->isAvailable() && $room instanceof $roomType) {
                    $room->rent();
                    $this->roomsAvailable[$roomType]--;

                    return;
                }
            }
        } else {
            echo 'There are no ' . $roomType . ' rooms available<br>';
        }
    }

    public function checkout($roomNumber)
    {
        $room = $this->rooms[$roomNumber];
        $roomType = get_class($room);

        $room->leave();

        $this->roomsAvailable[$roomType]++;
        $this->notifySubscribers($room);
    }

    private function haveAvailableRoomsOfType($roomType)
    {
        return $this->roomsAvailable[$roomType] > 0;
    }

    public function subscribeToRoomType($roomType, $user)
    {
        $this->subscribers[$roomType][] = $user;
    }

    public function notifySubscribers($room)
    {
        $roomType = get_class($room);
        $message = 'Room ' . $roomType . ' with number ' . $room->getRoomNumber() . ' is now available <br>';

        foreach ($this->subscribers[$roomType] as $subscriber) {
            $subscriber->notify($message);
        }
    }
}

class User
{
    private $firstName;
    private $lastName;
    private $id;

    public function __construct(string $firstName, string $lastName, int $id)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->id = $id;
    }

    public function notify($message)
    {
        echo 'Hello ' . $this->firstName . ' ' . $this->lastName . '. You got a new message: ' . $message;
    }
}

$singleRoomFactory = new SingleHotelRoomFactory();
$doubleRoomFactory = new DoubleHotelRoomFactory();
$threeBedHotelRoomFactory = new ThreeBedHotelRoomFactory();

Hotel::getInstance()->setRoom($singleRoomFactory->createHotelRoom(1, true, false));
Hotel::getInstance()->setRoom($doubleRoomFactory->createHotelRoom(2, true, false));
Hotel::getInstance()->setRoom($threeBedHotelRoomFactory->createHotelRoom(3, true, false));

Hotel::getInstance()->checkin(SingleHotelRoom::class);
Hotel::getInstance()->checkin(SingleHotelRoom::class);
Hotel::getInstance()->checkout(1);
Hotel::getInstance()->checkin(SingleHotelRoom::class);
Hotel::getInstance()->checkin(SingleHotelRoom::class);

Hotel::getInstance()->checkin(DoubleHotelRoom::class);
Hotel::getInstance()->checkin(DoubleHotelRoom::class);
Hotel::getInstance()->checkout(2);
Hotel::getInstance()->checkin(DoubleHotelRoom::class);
Hotel::getInstance()->checkin(DoubleHotelRoom::class);

Hotel::getInstance()->checkin(ThreeBedHotelRoom::class);
Hotel::getInstance()->checkin(ThreeBedHotelRoom::class);
Hotel::getInstance()->checkout(3);
Hotel::getInstance()->checkin(ThreeBedHotelRoom::class);
Hotel::getInstance()->checkin(ThreeBedHotelRoom::class);

$user1 = new User('Marko', 'Markovic', 1);
$user2 = new User('Nikola', 'Nikolic', 2);
$user3 = new User('Ivan', 'Ivanovic', 3);
$user4 = new User('Marko', 'Milic', 4);

Hotel::getInstance()->subscribeToRoomType(SingleHotelRoom::class, $user1);
Hotel::getInstance()->subscribeToRoomType(SingleHotelRoom::class, $user2);
Hotel::getInstance()->subscribeToRoomType(DoubleHotelRoom::class, $user3);
Hotel::getInstance()->subscribeToRoomType(ThreeBedHotelRoom::class, $user4);

echo '<br>';

Hotel::getInstance()->checkout(1);
Hotel::getInstance()->checkout(2);
Hotel::getInstance()->checkout(3);
