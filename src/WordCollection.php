<?php


namespace Phpfunc;


class WordCollection extends AbstractCollection
{
    public function add(Word $sentence)
    {
        $this->collection[] = $sentence; //$result->toArray();
    }


    /**
     * @return WordCollection
     */
    public function toString()
    {
        $str = '';
        /** @var Word $word */
        foreach ($this->collection as $word){
            $str .= $word->name;
            if((count($this->collection)>1)){
                $str .= ' ';
            }
        }
        return $str;
    }
}