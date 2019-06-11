<?php


namespace Phpfunc;


abstract class AbstractCollection
{
    public $collection = [];

    /**
     * TranslateCollection constructor.
     * @param array $collection
     */
    public function setCollection(array $collection)
    {
        $this->collection = $collection;
    }

    /**
     * @param AbstractCollection $collection
     * @return $this
     */
    public function addCollection(AbstractCollection $collection)
    {
        $this->collection = array_merge($this->collection, $collection->collection);
        return $this;
    }

    /**
     * @param $sentence
     */
//    public function add($sentence)
//    {
//        $this->collection[] = $sentence; //$result->toArray();
//    }


    /**
     * zurückspulen
     *
     * @return $this
     */
    public function rewind()
    {
        reset($this->collection);
        return $this;
    }
    /**
     * aktuell
     * @return mixed
     */
    public function current()
    {
        $var = current($this->collection);
        return $var;
    }
    /**
     * @return mixed
     */
    public function key()
    {
        $var = key($this->collection);
        return $var;
    }
    /**
     * nächstes
     *
     * @return mixed
     */
    public function next()
    {
        next($this->collection);
        return $this;
    }
    /**
     * previously
     *
     * @return $this
     */
    public function prev()
    {
        prev($this->collection);
        return $this;
    }
    /**
     * gültig
     *
     * @return bool
     */
    public function valid()
    {
        $var = $this->current() !== false;
        return $var;
    }
    /**
     * @return int
     */
    public function size()
    {
        $var = count($this->collection);
        return $var;
    }


    /**
     * @return array
     */
    public function toArray()
    {
        return $this->collection;
    }


    /**
     * @return WordCollection
     */
    public function toString()
    {
        return implode(' ', $this->toArray());
    }

    public function __toString()
    {
        return (string)$this->toString();
    }
}