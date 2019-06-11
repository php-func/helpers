<?php

namespace Phpfunc;

class Result
{
    public $id = '';
    public $name = '';
    public $title = '';
    public $description = '';
    public $status = false;
    public $validator = '';

    /**
     * Result constructor.
     * @param $id
     * @param $name
     * @param $title
     * @param $description
     * @param $status
     * @param $validator
     */
    public function __construct($id, $name, $title, $description, $status, $validator)
    {
        $this->id = $id;
        $this->name = $name;
        $this->title = $title;
        $this->description = $description;
        $this->status = $status;
        $this->validator = $validator;
    }

    public function toArray()
    {
        return get_object_vars($this);
    }
}