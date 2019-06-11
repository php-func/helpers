<?php


namespace Phpfunc;


class Sentence extends AbstractCollection
{
    /** @var WordCollection */
    public $collection;

    /**
     * Sentence constructor.
     * @param WordCollection $wordCollection
     */
    public function __construct(WordCollection $wordCollection)
    {
        $this->collection = $wordCollection;
    }

    public function addWord(Word $word)
    {
        $this->collection->add($word);
    }

    public static function fromWords()
    {
        $word_collection = new WordCollection();
        $array_words = func_get_args();
        $word_collection->setCollection($array_words);
        $sentence = new Sentence($word_collection);
        return $sentence;
    }

    public static function fromString(string $string)
    {
        $array_words = explode(' ', $string);
        $word_collection = new WordCollection();
//        $word_collection->setCollection($array_words);

        foreach ($array_words as $word) {
            $type = 'noun';

            if (is_numeric($word)) {
                $type = 'numeric';
            }
            $word_collection->add(
                new Word($word, $type)
            );
        }

        $sentence = new Sentence($word_collection);
        return $sentence;
    }


    /**
     * @return WordCollection
     */
    public function toString()
    {
//        return implode(' ', $this->collection->toArray());
        return $this->collection->toString();
    }

    public function __toString()
    {
        return (string)$this->toString();
    }
}