<?php
namespace BionicUniversity\IgorKozlov\Exam\Code;

interface ImageInterface
{
    /**
     * @return mixed
     */
    public function getHeight();

    /**
     * @return mixed
     */
    public function getWidth();
    public function crop($distanceFromCentre);
    public function resize($n);
} 