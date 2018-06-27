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
?>
--EXPECT--
[0] <start>-><commands>
[1] <commands>-><commands><commented-command>
[2] <commands>-><commented-command>
[3] <commented-command>-><comment><command>
[4] <commented-command>-><command>
[5] <command>-><identifier-stop><semicolon>
[6] <command>-><identifier-fileinto><string><semicolon>
[7] <command>-><identifier-redirect><string><semicolon>
[8] <command>-><identifier-keep><semicolon>
[9] <command>-><identifier-discard><semicolon>
[10] <command>-><identifier-require><string-list><semicolon>
[11] <command>-><identifier-if><test><bracket-open><block>
[12] <command>-><identifier-if><test><bracket-open><block><command-elsif>
[13] <command>-><identifier-if><test><bracket-open><block><command-else>
[14] <command-elsif>-><identifier-elsif><test><bracket-open><block>
[15] <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif>
[16] <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else>
[17] <command-else>-><identifier-else><bracket-open><block>
[18] <command>-><identifier><arguments><semicolon>
[19] <command>-><identifier><arguments><bracket-open><block>
[20] <command>-><identifier><semicolon>
[21] <command>-><identifier><bracket-open><block>
[22] <block>-><command><block>
[23] <block>-><bracket-close>
[24] <arguments>-><arguments-plus>
[25] <arguments>-><arguments-plus><test>
[26] <arguments>-><arguments-plus><test-list>
[27] <arguments>-><test>
[28] <arguments>-><test-list>
[29] <arguments-plus>-><arguments-plus><argument>
[30] <arguments-plus>-><argument>
[31] <test>-><identifier><arguments>
[32] <test>-><identifier>
[33] <test-list>-><parenthesis-open><test-plus-csv><parenthesis-close>
[34] <test-plus-csv>-><test>
[35] <test-plus-csv>-><test><comma><test-plus-csv>
[36] <argument>-><string-list>
[37] <argument>-><number>
[38] <argument>-><tag>
[39] <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close>
[40] <string-list>-><string>
[41] <string-plus-csv>-><string>
[42] <string-plus-csv>-><string-plus-csv><comma><string>
[43] <string>-><quoted-string>
[44] <string>-><multi-line>
[45] <comment>-><comment><single-comment>
[46] <comment>-><single-comment>
[47] <single-comment>-><hash-comment>
[48] <single-comment>-><bracket-comment>
