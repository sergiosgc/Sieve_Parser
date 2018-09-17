--TEST--
Parse sieve grammar
--FILE--
<?php
require_once(__DIR__ . '/../vendor/autoload.php');

$tokenizer = new \sergiosgc\Text_Parser_BNF_Tokenizer(
    file_get_contents(getcwd() . '/inputs/grammar.txt'),
    new \sergiosgc\Text_Tokenizer_Regex_Matcher_Php());

$sieveGrammar = (new \sergiosgc\Text_Parser_BNF($tokenizer))->parse()->getValue();
$generator = new \sergiosgc\Text_Parser_Generator_LALR($sieveGrammar);
try {
    eval($generator->generate('TestSieveParser'));
} catch (\sergiosgc\Text_Parser_Generator_ShiftReduceConflictException $ex) {
    print($ex->getMessage());
}

$tokenizer = new \sergiosgc\Sieve_Parser\Tokenizer(
    file_get_contents(__DIR__ . '/inputs/not.txt'),
    new \sergiosgc\Text_Tokenizer_Regex_Matcher_Php());

$parser = new TestSieveParser($tokenizer);
$parser->setDebugLevel(10);
print(new \sergiosgc\Sieve_Parser\Script($parser->parse()->getValue()));
?>
--EXPECT--
Read token <identifier-if>(if) state []
-Shifting to state 13

Read token <identifier-not>(not) state [13]
-Shifting to state 32

Read token <identifier>(false) state [13 32]
-Shifting to state 33

Read token <bracket-open>( {) state [13 32 33]
-Reducing using reduce_rule_34 state [13 32 33] Result state [13 32 52]
-Reducing using reduce_rule_32 state [13 32 52] Result state [13 31]
-Shifting to state 51

Read token <identifier-keep>(keep) state [13 31 51]
-Shifting to state 10

Read token <semicolon>(;) state [13 31 51 10]
-Shifting to state 26

Read token <bracket-close>(
}) state [13 31 51 10 26]
-Reducing using reduce_rule_9 state [13 31 51 10 26] Result state [13 31 51 57]
-Shifting to state 58

Read token () state [13 31 51 57 58]
-Reducing using reduce_rule_24 state [13 31 51 57 58] Result state [13 31 51 57 68]
-Reducing using reduce_rule_23 state [13 31 51 57 68] Result state [13 31 51 66]
-Reducing using reduce_rule_12 state [13 31 51 66] Result state [4]
-Reducing using reduce_rule_4 state [4] Result state [2]
-Reducing using reduce_rule_2 state [2] Result state [1]
-Accepting

if not false {
 keep;
}
