<?php
namespace BionicUniversity\IgorKozlov\HouseOop\Code;
/**
 * Class industrialСomplex
 * @package BionicUniversity\IgorKozlov\HouseOop\Code
 */
class IndustrialComplex extends House
{
    /**
     * @var string
     */
    protected $product;
    /**
     * @var Hostel
     */
    protected $hostel;

    /**
     * @param $hostel
     * @param $product
     * @param $fee
     * @param $roommatesCount
     */
    public function __construct(Hostel $hostel, $product, $fee, $roommatesCount)
    {
        $this->hostel = $hostel;
        $this->product = $product;
    }

    /**
     * @return Hostel
     */
    public function getHostel()
    {
        return $this->hostel;
    }

    /**
     * @param Hostel $hostel
     */
    public function setHostel($hostel)
    {
        $this->hostel = $hostel;
    }

    /**
     * @return mixed
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param mixed $product
     */
    public function setProduct($product)
    {
        $this->product = $product;
    }

    /**
     *
     */
    public function makeSomething()
    {
        return "Perform production" . PHP_EOL;
    }
}
