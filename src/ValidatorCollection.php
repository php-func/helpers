<?php

namespace Phpfunc;

class ValidatorCollection
{
    public $collection = [];

    public function add(Validator $validator)
    {
        $this->collection[] = $validator;
    }

}
