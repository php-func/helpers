<?php


namespace Phpfunc;


class Dictionary
{
    /** @var Language */
    public $from = null;

    /** @var Language */
    public $to = null;

    /** @var DefinitionCollection */
    public $definition_collection;

    /**
     * @param Language $from
     * @param Language $to
     * @param DefinitionCollection $definition_collection
     */
    public function __construct(Language $from, Language $to, DefinitionCollection $definition_collection)
    {
        $this->from = $from;
        $this->to = $to;
        $this->definition_collection = $definition_collection;
    }

    /**
     * @param Definition $definition
     *
     * @return $this
     */
    public function add(Definition $definition)
    {
        $this->definition_collection->add($definition);

        return $this;
    }

    /**
     * @param Sentence $term
     * @param Sentence $meaning
     *
     * @return $this
     */
    public function addDefinition(Sentence $term, Sentence $meaning)
    {
        $definition = new Definition($term, $meaning);
        $this->definition_collection->add($definition);

        return $this;
    }


    /**
     * @param string $term
     * @param string $meaning
     *
     * @return $this
     */
    public function addStrings(string $term, string $meaning)
    {
        $this->addDefinition(
            Sentence::fromString($term),
            Sentence::fromString($meaning)
        );

        return $this;
    }

    /**
     * @param array $array_strings
     * @return $this
     */
    public function addArrayOfStrings(array $array_strings)
    {
        foreach ($array_strings as $definition) {
            $this->addStrings($definition[0], $definition[1]);
        }

        return $this;
    }
}