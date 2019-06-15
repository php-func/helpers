<?php

namespace Phpfunc;

class ArrayFind
{

    public $needle;

    public $haystack;

    public $column;

    public $result;

    /**
     * ArrayFind constructor.
     * @param $needle
     * @param $haystack
     * @param $column
     */
    public function __construct(string $needle, array $haystack, $column = null)
    {
        $this->needle = $needle;
        $this->haystack = $haystack;
        $this->column = $column;
    }

    public function findByKey(){
        $this->result = $this->haystack[$this->needle];
        if (empty($this->result)) {
            throw new \Exception('Country with code: ' . $this->needle . '  not exist ');
        }
        $this->result = $this->haystack[$this->needle];

        return $this;
    }

    public function findByValue(){
        $this->result = \Phpfunc\ArrayFind::array_find($this->needle, $this->haystack, $this->column);
        if (empty($this->result)) {
            throw new \Exception('Country with code: ' . $this->needle . '  not exist ');
        }
        return $this;
    }

    /**
     * @return string
     */
    public function getNeedle()
    {
        return $this->needle;
    }

    /**
     * @param string $needle
     * @return ArrayFind
     */
    public function setNeedle($needle)
    {
        $this->needle = $needle;
        return $this;
    }

    /**
     * @return array
     */
    public function getHaystack()
    {
        return $this->haystack;
    }

    /**
     * @param array $haystack
     * @return ArrayFind
     */
    public function setHaystack($haystack)
    {
        $this->haystack = $haystack;
        return $this;
    }

    /**
     * @return null
     */
    public function getColumn()
    {
        return $this->column;
    }

    /**
     * @param null $column
     * @return ArrayFind
     */
    public function setColumn($column)
    {
        $this->column = $column;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstResult()
    {
        return current($this->result);
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param mixed $result
     * @return ArrayFind
     */
    public function setResult($result)
    {
        $this->result = $result;
        return $this;
    }



    /**
     * @param string $needle
     * @param array $haystack
     * @param null $column
     *
     * @return array
     */
    public static function array_find(string $needle, array $haystack, $column = null)
    {
        $key_array = [];
        if (empty($haystack)) {
            return $key_array;
        }
        if (empty($needle)) {
            return $key_array;
        }
        reset($haystack);
        $first = current($haystack);

        if (empty($first)) {
            return $key_array;
        }

        if (is_array($first)) { // check for multidimentional array

            foreach (array_column($haystack, $column) as $key => $value) {
                if (strpos(strtolower($value), strtolower($needle)) !== false) {
//                    return $key;
                    $key_array[] = $key;

                }
            }

        } else {
            foreach ($haystack as $key => $value) { // for normal array
                if (strpos(strtolower($value), strtolower($needle)) !== false) {
//                    return $key;
                    $key_array[] = $key;

                }
            }
        }
        return $key_array;
    }

}