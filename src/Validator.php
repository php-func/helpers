<?php
namespace Phpfunc;


class Validator
{
    public $attribute;
    public $function = "";
    public $params = [];

    /**
     * Validator constructor.
     * @param $attribute
     * @param $function
     * @param array $params
     */
    public function __construct($attribute, $function, $params = [])
    {
        $this->attribute = $attribute;
        $this->function = $function;
        $this->params = $params;
    }

    public function toArray()
    {
        return get_object_vars($this);
    }
}
