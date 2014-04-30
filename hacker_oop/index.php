<?php
set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__ . '/src');

spl_autoload_register(
    function ($className) {
        if (file_exists('src/' . str_replace("\\", "/", $className) . '.php')) {
            require_once(str_replace("\\", "/", $className) . '.php');
        }
    }
);
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

$hacker = new Hacker('Igor Kozlov', 'Varrek');

echo "Please input not empty string:" . PHP_EOL;
$string = read_stdin();
if (!$string) {
    echo "Nothing to output!" . PHP_EOL;
} else {
    echo $hacker->hack($string);
}
