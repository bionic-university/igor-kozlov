<?php
require_once 'vendor/autoload.php';

use Symfony\Component\ClassLoader\UniversalClassLoader;

$classLoader = new UniversalClassLoader();
$classLoader ->registerNamespaces(array(
    'BionicUniversity' => __DIR__ . '/src',
));
$classLoader->register();
ini_set('display_errors', 'On');
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
