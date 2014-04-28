<?php
include 'classes/House.php';
include 'classes/industrialСomplex.php';
include 'classes/dwellingHouse.php';
include 'classes/Hostel.php';

$dHouse = new Hostel(12, 5);
$dHouse->setHeight(10);
$dHouse->setWidth(15);
echo "Hostel square: " . $dHouse->getSquare() . PHP_EOL;
echo "Hostel price: " . $dHouse->getPrice() . PHP_EOL;
echo "Now" . $dHouse->makeSomething() . PHP_EOL;

echo "complex" . PHP_EOL;
$complexHostel = new Hostel(12, 5);
$complex = new industrialСomplex($complexHostel, 'vehicle', 10, 5);
echo "Now" . $complex->makeSomething() . PHP_EOL;;
