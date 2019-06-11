<?php

namespace Phpfunc;

class RuleCollection extends AbstractCollection
{
    public function add(Rule $validator)
    {
        $this->collection[] = $validator;
    }
}
