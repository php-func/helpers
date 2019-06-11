<?php
namespace Phpfunc;


class Rule
{
    public $function = "";
    public $params = [];

    /**
     * Validator constructor.
     * @param $function
     * @param array $params
     */
    public function __construct($function, $params = [])
    {
        $this->function = $function;
        $this->params = $params;
    }

    public function toArray()
    {
        return get_object_vars($this);
    }


}
