<?php

namespace Phpfunc;

class Translate
{
    /** @var string  */
    public $before = "";

    /** @var string */
    public $after = "";

    /**
     * ValidTranslate constructor.
     * @param string $before
     * @param string $after
     */
    public function __construct($before, $after)
    {
        $this->before = $before;
        $this->after = $after;
    }

}
