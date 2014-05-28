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
     * @param Hostel $hostel
     * @param string $product
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
     * @return string
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param string $product
     */
    public function setProduct($product)
    {
        $this->product = $product;
    }

    /**
     * @return string
     */
    public function makeSomething()
    {
        return "Perform production" . PHP_EOL;
    }
}
