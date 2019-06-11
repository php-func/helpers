<?php

namespace Phpfunc;

class ResultCollection extends AbstractCollection
{

    public function add(Result $result)
    {
        $this->collection[$result->id] = $result; //$result->toArray();
    }

}