<?php

namespace Phpfunc;

class TranslateCollection
{
    public $collection = [];

    /**
     * TranslateCollection constructor.
     * @param array $collection
     */
    public function setCollection(array $collection)
    {
        $this->collection = $collection;
    }


    public function add(Phpfunc\Translate $translate)
    {
        $this->collection[$translate->before] = $translate->after;
    }
}
