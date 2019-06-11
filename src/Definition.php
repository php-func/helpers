<?php


namespace Phpfunc;


class Definition
{
    /** @var Sentence */
    public $term =null;

    /** @var Sentence */
    public $meaning = null;

    /**
     * Definition constructor.
     * @param Sentence $term
     * @param Sentence $meaning
     */
    public function __construct(Sentence $term, Sentence $meaning)
    {
        $this->term = $term;
        $this->meaning = $meaning;
    }


}