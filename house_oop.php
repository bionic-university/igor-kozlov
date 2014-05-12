<?php
require_once 'vendor/autoload.php';

use Symfony\Component\ClassLoader\UniversalClassLoader;

$classLoader = new UniversalClassLoader();
$classLoader ->registerNamespaces(array(
    'BionicUniversity' => __DIR__ . '/src',
));
$classLoader->register();
ini_set('display_errors', 'On');
$dHouse = new BionicUniversity\Igor_Kozlov\HouseOop\Code\Hostel(12, 5);
$dHouse->setHeight(10);
$dHouse->setWidth(15);
echo "Hostel square: " . $dHouse->getSquare() . PHP_EOL;
echo "Hostel price: " . $dHouse->getPrice() . PHP_EOL;
echo "Now" . $dHouse->makeSomething() . PHP_EOL;

echo "complex" . PHP_EOL;
$complexHostel = new BionicUniversity\Igor_Kozlov\HouseOop\Code\Hostel(12, 5);
$complex = new BionicUniversity\Igor_Kozlov\HouseOop\Code\IndustrialСomplex($complexHostel, 'vehicle', 10, 5);
echo "Now" . $complex->makeSomething() . PHP_EOL;;
