<?php
class MyClass {
    private $myProperty = true;
}

$class = new ReflectionClass("MyClass");
$property = $class->getProperty("myProperty");
$property->setAccessible(true);

$obj = new MyClass();
echo $property->getValue($obj); // Works
//echo $obj->myProperty; // Doesn't work (error)
?>