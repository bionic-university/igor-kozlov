<?php

namespace BionicUniversity\IgorKozlov\Exam\Code;

/**
 * Class AbstractResizer
 * @package BionicUniversity\IgorKozlov\Exam\Code
 */
abstract class AbstractResizer
{
    /**
     * @param $mode
     * @return mixed
     */
    abstract public function thumbnail($mode);

}
