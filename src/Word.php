<?php


namespace Phpfunc;


class Word
{
    /** @var string */
    public $name;

    /** @var string */
    public $type;

    /**
    Angielski 	Polski
    article 	przedimek
    indefinite article 	przedimek nieokreślony
    definite article 	przedimek określony
    adjective 	przymiotnik
    noun 	rzeczownik
    verb 	czasownik
    adverb 	przysłówek
    preposition 	przyimek
    conjunction 	spójnik
    pronoun 	zaimek
    gerund 	rzeczownik odczasownikowy
    subject 	podmiot
    predicate 	orzeczenie
    intransitive verb 	czasownik nieprzechodni
    transitive verb 	czasownik przechodni
    infinitive 	bezokolicznik
    present participle 	imiesłów czynny
    past participle 	imiesłów bierny (imiesłów czasu przeszłego)
    numeral 	liczebnik
    cardinal number 	liczebnik główny
    ordinal number 	liczebnik porządkowy
    prefix 	przedrostek
    suffix 	przyrostek
    root 	rdzeń wyrazu
    attribute 	przydawka
    adverbial 	okolicznik
    object 	dopełnienie
     */


    /**
     * Word constructor.
     * @param string $name
     * @param string $type
     */
    public function __construct(string $name, $type = 'noun')
    {
        if(!empty($name)){
            $this->name = $name;
            $this->type = $type;
        }
    }


}