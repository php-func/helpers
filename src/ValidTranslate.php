<?php
namespace Phpfunc;


class ValidTranslate
{
    /** @var Valid */
    public $valid;

    /** @var TranslateCollection */
    public $translate;

    /**
     * ValidTranslate constructor.
     * @param Valid $valid
     * @param TranslateCollection $translate
     */
    public function __construct(Valid $valid, TranslateCollection $translate)
    {
        $this->valid = $valid;
        $this->translate = $translate;
    }


    /**
     * @return string
     */
    public function getErrorInfo()
    {
        $info = '';
        foreach ($this->valid->errors as $key => $error) {
            $info .= $this->translate->collection['field_title'] .
                ' "' . $this->translate->collection[$this->valid->names[$key]] . '" '
                . $this->translate->collection[$error] . ' ' . $this->valid->params[$key] . '<br>';
        }
        return $info;
    }

    public function toArray()
    {
        return get_object_vars($this);
    }
}
