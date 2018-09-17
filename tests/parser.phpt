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
[6] <command>-><identifier-notify><string><semicolon>
[7] <command>-><identifier-fileinto><string><semicolon>
[8] <command>-><identifier-redirect><string><semicolon>
[9] <command>-><identifier-keep><semicolon>
[10] <command>-><identifier-discard><semicolon>
[11] <command>-><identifier-require><string-list><semicolon>
[12] <command>-><identifier-if><test><bracket-open><block>
[13] <command>-><identifier-if><test><bracket-open><block><command-elsif>
[14] <command>-><identifier-if><test><bracket-open><block><command-else>
[15] <command-elsif>-><identifier-elsif><test><bracket-open><block>
[16] <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif>
[17] <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else>
[18] <command-else>-><identifier-else><bracket-open><block>
[19] <command>-><identifier><arguments><semicolon>
[20] <command>-><identifier><arguments><bracket-open><block>
[21] <command>-><identifier><semicolon>
[22] <command>-><identifier><bracket-open><block>
[23] <block>-><command><block>
[24] <block>-><bracket-close>
[25] <arguments>-><arguments-plus>
[26] <arguments>-><arguments-plus><test>
[27] <arguments>-><arguments-plus><test-list>
[28] <arguments>-><test>
[29] <arguments>-><test-list>
[30] <arguments-plus>-><arguments-plus><argument>
[31] <arguments-plus>-><argument>
[32] <test>-><identifier-not><test>
[33] <test>-><identifier><arguments>
[34] <test>-><identifier>
[35] <test-list>-><parenthesis-open><test-plus-csv><parenthesis-close>
[36] <test-plus-csv>-><test>
[37] <test-plus-csv>-><test-plus-csv><comma><test>
[38] <argument>-><string-list>
[39] <argument>-><number>
[40] <argument>-><tag>
[41] <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close>
[42] <string-list>-><string>
[43] <string-plus-csv>-><string>
[44] <string-plus-csv>-><string-plus-csv><comma><string>
[45] <string>-><quoted-string>
[46] <string>-><multi-line>
[47] <comment>-><comment><single-comment>
[48] <comment>-><single-comment>
[49] <single-comment>-><hash-comment>
[50] <single-comment>-><bracket-comment>
