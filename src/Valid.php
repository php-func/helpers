<?php

namespace Phpfunc;

use PolkurierWebServiceApi\Exception\ErrorException;

class Valid
{
    public $obj = null;
    public $validatorCollection = [];
    public $result_collection = null;
    public $translate_collection = null;

    public $attributes = [];

    public $info = [];

    public $results = [];
    public $errors = [];
    public $params = [];
    public $names = [];
    public $translate = [];

    /**
     * Valid constructor.
     * @param \Polkurier\ConfigModel $obj
     * @param ValidatorCollection $validatorCollection
     */
    public function __construct(\Polkurier\ConfigModel $obj, ValidatorCollection $validatorCollection, TranslateCollection $translate_collection)
    {
        $this->obj = $obj;
        $this->validatorCollection = $validatorCollection;
        $this->translate_collection = $translate_collection;
        $this->result_collection = new ResultCollection();
    }

    public function checkAll()
    {
        $result = 0;
        $this->info = [];

        /**
         * @var int $key
         * @var Validator $validator
         */
        foreach ($this->validatorCollection->collection as $key => $validator) {
            if (!$this->check($key, $validator)) {
                $result++;
            }
        }
        return $result === 0;
    }


    public function check($key, $validator)
    {
        $result = 0;
        $results = [];
        $status = false;

        if (empty($results[$validator->attribute])) {
            $results[$validator->attribute] = [];
        }

        $val = $this->obj->getAttr($validator->attribute);

        $func = $validator->function;

        $this->results[$validator->attribute]['all'][$key] = [
            'status' => [],
            'info' => [],
            'func' => []
        ];

        $this->results[$validator->attribute]['all'][$key]['func'] = $func;
        try {
            if (empty($validator->params)) {
                $status = $this->$func($val);
            } else if (!empty($validator->params) && !is_array($validator->params)) {
                $status = $this->$func($val, $validator->params);
            } else if (count($validator->params) === 1) {
                $status = $this->$func($val, $validator->params[0]);
            } else if (count($validator->params) === 2) {
                $status = $this->$func($val, $validator->params[0], $validator->params[1]);
            } else if (count($validator->params) === 3) {
                $status = $this->$func($val, $validator->params[0], $validator->params[1], $validator->params[2]);
            }

        } catch (\Exception $ex) {
            $status = false;
            $description = $ex->getMessage();
            $this->results[$validator->attribute]['all'][$key]['info'] = $description;

        }

        $this->results[$validator->attribute]['all'][$key]['status'] = $status;
        $this->results[$validator->attribute]['status'] = $status;
        $this->attributes[$validator->attribute] = $validator->attribute;

        $description = $this->translate_collection->collection['field_title'] .
            ' "' . $this->translate_collection->collection[$validator->attribute] . '" '
            . $this->translate_collection->collection[$func] . ' ';
        $param = '';
        if (!empty($validator->params)) {
            if (is_array($validator->params)) {
                $param = implode(', ', $validator->params);
            } else {
                $param = $validator->params;
            }
        }
        $description .= $param;

        $this->result_collection->add(
            new Result(
                $key,
                $validator->attribute,
                $this->translate_collection->collection[$validator->attribute],
                $description,
                $status,
                $func
            )
        );


        if (empty($this->results[$validator->attribute]['all'][$key]['status'])) {
            $this->results[$validator->attribute]['error'][$key] = $func;
            $this->names[$validator->attribute] = $validator->attribute;
            $this->errors[$key] = $func;
            $this->params[$key] = $validator->params;
            $result++;
        }

        return $result === 0;
    }


    /**
     * @param $val
     * @return bool
     */
    public function not_empty($val)
    {
        return !empty($val);
    }

    /**
     * @param $val
     * @return bool
     */
    public function is_string($val)
    {
        return is_string($val);
    }

    /**
     * @param $val
     * @param int $length
     * @return bool
     */
    public function length_more_than($val, int $length)
    {
        $len = strlen($val);
        return $len >= $length;
    }

    /**
     * @param $val
     * @param int $length
     * @return bool
     */
    public function length_less_than($val, int $length)
    {
        $len = strlen($val);
        return $len <= $length;
    }


    public function length_range($val, $min, $max)
    {
        $len = strlen($val);
        $more_than = $len >= $min;
        $less_than = $len <= $max;
//        return $len >= $min && $len <= $max;
        if (!$more_than) {
            throw new \Exception("Is not more than: " . $min);
        }
        if (!$less_than) {
            throw new \Exception("Is not more than: " . $min);
        }
        return true;
    }

// Valid("name",[["not_empty"],["length",5]])

}
