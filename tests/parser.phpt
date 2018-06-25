--TEST--
Parse sieve grammar
--FILE--
<?php
require_once(__DIR__ . '/../vendor/autoload.php');

$tokenizer = new \sergiosgc\Text_Parser_BNF_Tokenizer(
    file_get_contents(getcwd() . '/inputs/grammar.txt'),
    new \sergiosgc\Text_Tokenizer_Regex_Matcher_Php());

$parser = new \sergiosgc\Text_Parser_BNF($tokenizer);
//$parser->setDebugLevel(10);
print((string) $parser->parse()->getValue());
--EXPECT--
[0] <start>-><commands>
[1] <commands>-><commands><commented-command>
[2] <commands>-><commented-command>
[3] <commented-command>-><comment><command>
[4] <commented-command>-><command>
[5] <command>-><identifier><arguments><semicolon>
[6] <command>-><identifier><arguments><bracket-open><block>
[7] <command>-><identifier><semicolon>
[8] <command>-><identifier><bracket-open><block>
[9] <block>-><command><block>
[10] <block>-><bracket-close>
[11] <arguments>-><arguments-plus>
[12] <arguments>-><arguments-plus><test>
[13] <arguments>-><arguments-plus><test-list>
[14] <arguments>-><test>
[15] <arguments>-><test-list>
[16] <arguments-plus>-><arguments-plus><argument>
[17] <arguments-plus>-><argument>
[18] <test>-><identifier><arguments>
[19] <test>-><identifier>
[20] <test-list>-><parenthesis-open><test-plus-csv><parenthesis-close>
[21] <test-plus-csv>-><test>
[22] <test-plus-csv>-><test><comma><test-plus-csv>
[23] <argument>-><string-list>
[24] <argument>-><number>
[25] <argument>-><tag>
[26] <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close>
[27] <string-list>-><string>
[28] <string-plus-csv>-><string>
[29] <string-plus-csv>-><string-plus-csv><comma><string>
[30] <string>-><quoted-string>
[31] <string>-><multi-line>
[32] <comment>-><comment><single-comment>
[33] <comment>-><single-comment>
[34] <single-comment>-><hash-comment>
[35] <single-comment>-><bracket-comment>
