<?php
require __DIR__ . '/../bootstrap.php';
use BionicUniversity\IgorKozlov\HackerOop\Code\Hacker;

function read_stdin()
{
    $inputHandler = fopen("php://stdin", "r");
    $input = '';
    while (!$input) {
        $input = fgets($inputHandler, 128);

        $input = str_replace("\n", "", $input);
    }
    fclose($inputHandler);
    return $input;
}

$hacker = new BionicUniversity\IgorKozlov\HackerOop\Code\Hacker("Igor Kozlov", "Varrek");

echo "Please input not empty string:" . PHP_EOL;
$string = read_stdin();
if (!$string) {
    echo "Nothing to output!" . PHP_EOL;
} else {
    echo $hacker->hack($string);
}
