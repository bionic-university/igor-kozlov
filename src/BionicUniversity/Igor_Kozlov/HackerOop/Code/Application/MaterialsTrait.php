<?php

namespace BionicUniversity\Igor_Kozlov\HackerOop\Code\Application;


trait MaterialsTrait
{
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