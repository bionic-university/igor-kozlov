<?php
function read_stdin()
{
    $inputHandler = fopen("php://stdin", "r");
    $input='';
    while (!$input){
    $input = fgets($inputHandler, 128);
    $input=str_replace("\n","",$input);
    }
    fclose($inputHandler);
    return $input;
}

echo "Please input not empty string:\n";
$string = read_stdin();
    echo "String you input:\n $string \n";
    echo "Total chars:\n".strlen($string)."\n";
    echo "Unique character: ".count_chars($string, 3)."\n";
    foreach (count_chars($string, 1) as $i => $val) {
        echo "There were $val instance(s) of \"" , chr($i) , "\" in the string.\n";
    }