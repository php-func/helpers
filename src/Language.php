<?php


namespace Phpfunc;


class Language
{
    /** @var string */
    public $name ='';

    /** @var string */
    public $code = '';

    /**
     * Language constructor.
     * @param string $name
     * @param string $code
     */
    public function __construct($name, $code)
    {
        $this->name = $name;
        $this->code = $code;
    }


}