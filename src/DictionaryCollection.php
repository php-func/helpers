<?php


namespace Phpfunc;


class DictionaryCollection extends AbstractCollection
{
    public function add(Dictionary $dictionary)
    {
        $this->collection[] = $dictionary; //$result->toArray();
    }
}