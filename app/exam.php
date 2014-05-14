<?php
require __DIR__ . '/../bootstrap.php';
use BionicUniversity\IgorKozlov\Exam\Code\Image;

$image = new Image(200, 150);
var_dump($image->thumbnail());
var_dump($image->thumbnail('crop'));
var_dump($image->thumbnail('resize'));
