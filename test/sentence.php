http://localhost:88/examples/sentence.php
<pre>
<?php
require('../autoload.php');

use \Phpfunc\DefinitionCollection;

use \Phpfunc\Word;
use \Phpfunc\WordCollection;
use \Phpfunc\Sentence;
use \Phpfunc\SentenceCollection;
use \Phpfunc\Rule;
use \Phpfunc\RuleCollection;
use \Phpfunc\Translator;
use \Phpfunc\Dictionary;
use \Phpfunc\DictionaryCollection;
use \Phpfunc\Language;

// Translacja przy użyciu Rules
$sentence_collection = new SentenceCollection();
$sentence = Sentence::fromWords(
    new Word('wlazł'),
    new Word('Kotek'),
    new Word('na'),
    new Word('2'),
    new Word('Płotki')
);
$sentence_collection->add($sentence);

$sentence = Sentence::fromString('kotek spada na 4 nogi');
$sentence_collection->add($sentence);

//var_dump($sentence_collection->toArray());

$rule_collection = new \Phpfunc\RuleCollection();
$rule_collection->add(
    new Rule('first_word_has_big_letter')
);

$translator = new \Phpfunc\Translator();

$translator->addSentenceCollection($sentence_collection);
$translator->addRuleCollection($rule_collection);
$translator->translateRules();

//var_dump($translator->result->toArray());


// Translacja przy użyciu Dictionary

//  key, value, language

// Prepare Dictionary


$polish_english = new Dictionary(
    new Language('Polski', 'PL_pl'),
    new Language('Angielski Brytyjski', 'GB_en'),
    new DefinitionCollection()
);

$polish_english->addDefinition(
    Sentence::fromString('kot'),
    Sentence::fromString('cat')
);

$polish_english->addStrings('kot', 'cat');

$polish_english->addArrayOfStrings(
    [
        ['kot', 'cat'],
        ['kotek', 'cat'],
        ['pies', 'dog'],
        ['mój', 'my']
    ]
);
$translator2 = new \Phpfunc\Translator();
$translator2->addSentenceCollection($sentence_collection);
//var_dump($polish_english);
$translator2->addDictionary($polish_english);
//var_dump($translator2);
//$translator->translateDictionarySentence();
$translator2->translateDictionaryWord();

foreach ($translator2->result->collection as $sentence) {
    var_dump($sentence->collection->toString());
}


// Dictionary && Rules

$translator3 = new \Phpfunc\Translator();

$translator3->addSentenceCollection($sentence_collection);
$translator3->addDictionary($polish_english);
$translator3->addRuleCollection($rule_collection);
$translator3->translate();

foreach ($translator3->result->collection as $sentence) {
    var_dump($sentence->collection->toString());
}
