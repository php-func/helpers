<?php


namespace Phpfunc;


class SentenceCollection extends AbstractCollection
{
    public function add(Sentence $sentence)
    {
        $this->collection[] = $sentence; //$result->toArray();
    }
}