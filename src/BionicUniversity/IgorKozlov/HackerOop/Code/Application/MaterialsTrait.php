<?php

namespace BionicUniversity\IgorKozlov\HackerOop\Code\Application;

/**
 * Class MaterialsTrait
 *
 * @package BionicUniversity\IgorKozlov\HackerOop\Code\Application
 */
trait MaterialsTrait
{
    /**
     * @var array
     */
    private $materials = array('audios' => array(
        'FirstTrack', 'SecondTrack',
    ),
        'videos' => array('FirstFilm')
    );

    /**
     * @return array
     */
    public function getMaterials()
    {
        return $this->materials;
    }

    /**
     * @param array $materials
     */
    public function setMaterials($materials)
    {
        $this->matirials = $materials;
    }

}
