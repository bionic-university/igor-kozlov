<?php

class MyClass
{
    private function myProperty()
    {
        return true;
    }
}

$class = new ReflectionClass("MyClass");
$class->getMethod("myProperty")->setAccessible(true);

$public = $class->newInstance();
echo $public->myProperty();
?>