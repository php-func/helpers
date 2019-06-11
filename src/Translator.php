<?php


namespace Phpfunc;


class Translator implements TranslateInt
{
    /** @var AbstractCollection */
    public $sentence = null;

    /** @var DictionaryCollection */
    public $dictionary = null;

    /** @var AbstractCollection */
    public $rule = null;

    /** @var AbstractCollection */
    public $result = null;


    public function __construct()
    {
        $this->reset();
    }

    public function reset()
    {
        $this->sentence = new SentenceCollection();
        $this->dictionary = new DictionaryCollection();
        $this->rule = new RuleCollection();
        $this->result = new SentenceCollection();
    }


    public function addSentence(Sentence $sentence)
    {
        $this->sentence->add($sentence);

        return $this;
    }

    public function addSentenceCollection(SentenceCollection $collection)
    {
        $this->sentence->addCollection($collection);

        return $this;
    }

    public function addDictionary(Dictionary $dictionary)
    {
        $this->dictionary->add($dictionary);

        return $this;
    }

    public function addDictionaryCollection(DictionaryCollection $collection)
    {
        $this->dictionary->addCollection($collection);

        return $this;
    }

    public function addRule(Rule $rule)
    {
        $this->rule->add($rule);

        return $this;

    }

    public function addRuleCollection(RuleCollection $collection)
    {
        $this->rule->addCollection($collection);

        return $this;
    }


    public function addResult(Sentence $result)
    {
        $this->result->add($result);

        return $this;
    }

    public function addResultCollection(SentenceCollection $collection)
    {
        $this->result->addCollection($collection);

        return $this;
    }

    public function convertSentence(Rule $rule, Sentence $sentence)
    {
        $sentence = $this->{$rule->function}($sentence);

        /** @var Word $word */
//        foreach ($sentence->collection as $word) {
//            $result = $this->{$rule->function}($word->name);
//            $result = $this->convert($rule, $sentence);
//        }
        return $sentence;
    }
//
//    public function convert(Rule $rule, Sentence $sentence)
//    {
//        foreach ($sentence->collection as $rule) {
//            $result = $this->convert($rule, $sentence);
//        }
//    }


    public function translateRules()
    {
//        get Sentence to translate
// use Rule
// get Dictionary
//  translate
//        if (!isset($this->messages[$identifier])) {
//            // Explicitly forbid someone to retrieve e non-defiend message
//            throw new \PrestaShopException('Message identifier not found.');
//        }
//        return $this->messages[$identifier];
//        return $this->after;

//  get each sentence from Sentence Collection
//  and translate with Rules Collection
//  to Result collection

        /** @var Sentence $sentence */
        foreach ($this->sentence->collection as $sentence) {
            /** @var Rule $rule */
            foreach ($this->rule->collection as $rule) {
                $result = $this->convertSentence($rule, $sentence);
                $this->addResult($result);
            }

        }
        return $this;
    }


    public function translate()
    {
        $this->translateDictionaryWord();
        $this->translateRules();
        return $this;
    }


    public function translateDictionarySentence()
    {
        /** @var Sentence $sentence */
        foreach ($this->sentence->collection as $sentence) {
            /** @var Definition $definition */
            foreach ($this->dictionary->collection as $definition) {
                $equal = $definition->term->toString() === $sentence->toString();
                if ($equal) {
                    $result = $definition->meaning;
                }
                $this->addResult($result);
            }
        }
        return $this;
    }


    public function translateDictionaryWord()
    {
        $this->result = $this->sentence;
        /** @var Sentence $sentence */
        foreach ($this->result->collection as $sentence) {
//            $word_collection = new WordCollection();

            /** @var Word $word */
            foreach ($sentence->collection->collection as $word) {

                /** @var Dictionary $dictionary */
                foreach ($this->dictionary->collection as $dictionary) {
//                    var_dump('$dictionary', $dictionary);
//die;
                    /** @var Definition $definition */
                    foreach ($dictionary->definition_collection->collection as $definition) {
//                        var_dump('definition', $definition);
//                        var_dump($definition->term->collection->toString());
//                    var_dump($definition->term->toString());
//                        var_dump($word);

//                        echo '<hr>';
//                        die;
                        $equal = strtolower($definition->term->collection->toString()) === strtolower($word->name);
                        if ($equal) {
//                            var_dump($definition->term->collection->toString(), "==", $word->name);

                            $word->name = $definition->meaning->collection->toString();
//                            $result_word = new Word($definition->meaning->collection->toString());
//                            var_dump('$result_word',$result_word);
//                            $word_collection->add($result_word);
                        }
                    }
                }

            }
//            $result = new Sentence($word_collection);

//            $this->addResult($result);

        }
        return $this;
    }

    /**
     * @return AbstractCollection
     */
    public function first_word_has_big_letter(Sentence $sentence)
    {
        $sentence->collection->rewind();
        $first_word = $sentence->collection->current();

//        var_dump($first_word);
//        die;
        if ($first_word->type !== 'numeric') {
            $first_word->name = ucfirst(strtolower($first_word->name)); // Hallo welt!
        }

        return $sentence;
    }

}