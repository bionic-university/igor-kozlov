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
//mb_strele]n & mb_subctr - we can add encoding
function mb_count_chars($input) {
    $l = mb_strlen($input, 'UTF-8');
    $unique = array();
    for($i = 0; $i < $l; $i++) {
        $char = mb_substr($input, $i, 1, 'UTF-8');
        if(!array_key_exists($char, $unique))
            $unique[$char] = 0;
        $unique[$char]++;
    }
    return $unique;
}
echo "Please input not empty string:\n";
$string = read_stdin();
if (!$string) {
    echo "Nothing to output\n";
} else {
    echo "String you input are next:\n $string \n";
    echo "Total chars:\n" . mb_strlen($string,'UTF-8') . "\n";
    $uniqueListAll="";
    $unique="";
    foreach (mb_count_chars($string) as $i => $val) {
        $unique.=$i.' ';
        $uniqueListAll.="There were $val instance(s) of \"". $i. "\" in the string.\n";
    }
    echo "Unique character: " .$unique."\n";
    echo $uniqueListAll;
}
