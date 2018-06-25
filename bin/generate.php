#!/usr/bin/env php
<?php
require_once(__DIR__ . '/../vendor/autoload.php');

$tokenizer = new \sergiosgc\Text_Parser_BNF_Tokenizer(
    file_get_contents(__DIR__ . '/../data/grammar.txt'),
    new \sergiosgc\Text_Tokenizer_Regex_Matcher_Php());
$sieveGrammar = (new \sergiosgc\Text_Parser_BNF($tokenizer))->parse()->getValue();
$generator = new \sergiosgc\Text_Parser_Generator_LALR($sieveGrammar);
file_put_contents(__DIR__ . '/../lib/Parser.php', sprintf("<?php\nnamespace sergiosgc\\Sieve_Parser;\n\n%s\n?>", $generator->generate('Parser')));
