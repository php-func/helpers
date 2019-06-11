<?php


namespace Phpfunc;


class DefinitionCollection extends AbstractCollection
{
    public function add(Definition $definition)
    {
        $this->collection[] = $definition; //$result->toArray();
    }
}