<?php
namespace BionicUniversity\IgorKozlov\Exam\Code;

/**
 * Interface ImageInterface
 * @package BionicUniversity\IgorKozlov\Exam\Code
 */
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

    /**
     * @param $distanceFromCentre
     *
     * @return mixed
     */
    public function crop($distanceFromCentre);

    /**
     * @param $dimension
     *
     * @return mixed
     */
    public function resize($dimension);
}
