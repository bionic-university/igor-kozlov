<?php
function read_stdin()
{
    $inputHandler = fopen("php://stdin", "r");
    $input = fgets($inputHandler, 128);
    $input=str_replace("\n","",$input);
    fclose($inputHandler);
    return $input;
}

echo "Please input string:\n";
$string = read_stdin();
if (!$string) {
    echo "Nothing to output\n";
} else {
    echo "String you input are next:\n $string \n";
    echo "Total chars:\n".strlen($string)."\n";
    echo "Unique character: ".count_chars($string, 3)."\n";
    foreach (count_chars($string, 1) as $i => $val) {
        echo "There were $val instance(s) of \"" , chr($i) , "\" in the string.\n";
    }
}