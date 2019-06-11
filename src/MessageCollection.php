<?php


namespace Phpfunc;


class MessageCollection extends AbstractCollection
{
    public function add(Message $sentence)
    {
        $this->collection[] = $sentence; //$result->toArray();
    }
}