<?php
require __DIR__ . '/../bootstrap.php';

$dHouse = new BionicUniversity\IgorKozlov\HouseOop\Code\Hostel(12, 5);
$dHouse->setHeight(10);
$dHouse->setWidth(15);
echo "Hostel square: " . $dHouse->getSquare() . PHP_EOL;
echo "Hostel price: " . $dHouse->getPrice() . PHP_EOL;
echo "Now" . $dHouse->makeSomething() . PHP_EOL;

echo "complex" . PHP_EOL;
$complexHostel = new BionicUniversity\IgorKozlov\HouseOop\Code\Hostel(12, 5);
//$complex = new BionicUniversity\IgorKozlov\HouseOop\Code\IndustrialComplex($complexHostel, 'vehicle');
//echo "Now" . $complex->makeSomething() . PHP_EOL;;
