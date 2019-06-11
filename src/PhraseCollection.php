<?php


namespace Phpfunc;


class PhraseCollection extends AbstractCollection
{
    public function add(Sentence $sentence)
    {
        $this->collection[] = $sentence; //$result->toArray();
    }
}