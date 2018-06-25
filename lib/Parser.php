<?php
namespace sergiosgc\Sieve_Parser;

/* vim: set expandtab tabstop=4 shiftwidth=4 foldmethod=marker: */
/**
 *
 * This is an automatically generated parser for the following grammar:
 *
 * [0] <start>-><commands>
 * [1] <commands>-><commands><commented-command>
 * [2] <commands>-><commented-command>
 * [3] <commented-command>-><comment><command>
 * [4] <commented-command>-><command>
 * [5] <command>-><identifier><arguments><semicolon>
 * [6] <command>-><identifier><arguments><bracket-open><block>
 * [7] <command>-><identifier><semicolon>
 * [8] <command>-><identifier><bracket-open><block>
 * [9] <block>-><command><block>
 * [10] <block>-><bracket-close>
 * [11] <arguments>-><arguments-plus>
 * [12] <arguments>-><arguments-plus><test>
 * [13] <arguments>-><arguments-plus><test-list>
 * [14] <arguments>-><test>
 * [15] <arguments>-><test-list>
 * [16] <arguments-plus>-><arguments-plus><argument>
 * [17] <arguments-plus>-><argument>
 * [18] <test>-><identifier><arguments>
 * [19] <test>-><identifier>
 * [20] <test-list>-><parenthesis-open><test-plus-csv><parenthesis-close>
 * [21] <test-plus-csv>-><test>
 * [22] <test-plus-csv>-><test><comma><test-plus-csv>
 * [23] <argument>-><string-list>
 * [24] <argument>-><number>
 * [25] <argument>-><tag>
 * [26] <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close>
 * [27] <string-list>-><string>
 * [28] <string-plus-csv>-><string>
 * [29] <string-plus-csv>-><string-plus-csv><comma><string>
 * [30] <string>-><quoted-string>
 * [31] <string>-><multi-line>
 * [32] <comment>-><comment><single-comment>
 * [33] <comment>-><single-comment>
 * [34] <single-comment>-><hash-comment>
 * [35] <single-comment>-><bracket-comment>
 *
 * -- Finite State Automaton States --
 * ----------- 0 -----------
 *   --Itemset--
 *     <start>->•<commands>
 *    +<commands>->•<commands><commented-command>
 *    +<commands>->•<commented-command>
 *    +<commented-command>->•<comment><command>
 *    +<commented-command>->•<command>
 *    +<comment>->•<comment><single-comment>
 *    +<comment>->•<single-comment>
 *    +<command>->•<identifier><arguments><semicolon>
 *    +<command>->•<identifier><arguments><bracket-open><block>
 *    +<command>->•<identifier><semicolon>
 *    +<command>->•<identifier><bracket-open><block>
 *    +<single-comment>->•<hash-comment>
 *    +<single-comment>->•<bracket-comment>
 *   --Transitions--
 *    Goto on <commands> to 1 because of <start>->•<commands>
 *    Goto on <commands> to 1 because of <commands>->•<commands><commented-command>
 *    Goto on <commented-command> to 2 because of <commands>->•<commented-command>
 *    Goto on <comment> to 3 because of <commented-command>->•<comment><command>
 *    Goto on <command> to 4 because of <commented-command>->•<command>
 *    Goto on <comment> to 3 because of <comment>->•<comment><single-comment>
 *    Goto on <single-comment> to 5 because of <comment>->•<single-comment>
 *    Shift on <identifier> to 6 because of <command>->•<identifier><arguments><semicolon> Lookahead = 
 *    Shift on <identifier> to 6 because of <command>->•<identifier><arguments><bracket-open><block> Lookahead = 
 *    Shift on <identifier> to 6 because of <command>->•<identifier><semicolon> Lookahead = 
 *    Shift on <identifier> to 6 because of <command>->•<identifier><bracket-open><block> Lookahead = 
 *    Shift on <hash-comment> to 7 because of <single-comment>->•<hash-comment> Lookahead = 
 *    Shift on <bracket-comment> to 8 because of <single-comment>->•<bracket-comment> Lookahead = 
 * ----------- 1 -----------
 *   --Itemset--
 *     <start>-><commands>•
 *     <commands>-><commands>•<commented-command>
 *    +<commented-command>->•<comment><command>
 *    +<commented-command>->•<command>
 *    +<comment>->•<comment><single-comment>
 *    +<comment>->•<single-comment>
 *    +<command>->•<identifier><arguments><semicolon>
 *    +<command>->•<identifier><arguments><bracket-open><block>
 *    +<command>->•<identifier><semicolon>
 *    +<command>->•<identifier><bracket-open><block>
 *    +<single-comment>->•<hash-comment>
 *    +<single-comment>->•<bracket-comment>
 *   --Transitions--
 *    Accept on  using <start>-><commands>
 *    Goto on <commented-command> to 9 because of <commands>-><commands>•<commented-command>
 *    Goto on <comment> to 3 because of <commented-command>->•<comment><command>
 *    Goto on <command> to 4 because of <commented-command>->•<command>
 *    Goto on <comment> to 3 because of <comment>->•<comment><single-comment>
 *    Goto on <single-comment> to 5 because of <comment>->•<single-comment>
 *    Shift on <identifier> to 6 because of <command>->•<identifier><arguments><semicolon> Lookahead = 
 *    Shift on <identifier> to 6 because of <command>->•<identifier><arguments><bracket-open><block> Lookahead = 
 *    Shift on <identifier> to 6 because of <command>->•<identifier><semicolon> Lookahead = 
 *    Shift on <identifier> to 6 because of <command>->•<identifier><bracket-open><block> Lookahead = 
 *    Shift on <hash-comment> to 7 because of <single-comment>->•<hash-comment> Lookahead = 
 *    Shift on <bracket-comment> to 8 because of <single-comment>->•<bracket-comment> Lookahead = 
 * ----------- 2 -----------
 *   --Itemset--
 *     <commands>-><commented-command>•
 *   --Transitions--
 *    Reduce on <identifier> using <commands>-><commented-command> Lookahead = 
 *    Reduce on <hash-comment> using <commands>-><commented-command> Lookahead = 
 *    Reduce on <bracket-comment> using <commands>-><commented-command> Lookahead = 
 *    Reduce on  using <commands>-><commented-command> Lookahead = 
 * ----------- 3 -----------
 *   --Itemset--
 *     <commented-command>-><comment>•<command>
 *     <comment>-><comment>•<single-comment>
 *    +<command>->•<identifier><arguments><semicolon>
 *    +<command>->•<identifier><arguments><bracket-open><block>
 *    +<command>->•<identifier><semicolon>
 *    +<command>->•<identifier><bracket-open><block>
 *    +<single-comment>->•<hash-comment>
 *    +<single-comment>->•<bracket-comment>
 *   --Transitions--
 *    Goto on <command> to 10 because of <commented-command>-><comment>•<command>
 *    Goto on <single-comment> to 11 because of <comment>-><comment>•<single-comment>
 *    Shift on <identifier> to 6 because of <command>->•<identifier><arguments><semicolon> Lookahead = 
 *    Shift on <identifier> to 6 because of <command>->•<identifier><arguments><bracket-open><block> Lookahead = 
 *    Shift on <identifier> to 6 because of <command>->•<identifier><semicolon> Lookahead = 
 *    Shift on <identifier> to 6 because of <command>->•<identifier><bracket-open><block> Lookahead = 
 *    Shift on <hash-comment> to 7 because of <single-comment>->•<hash-comment> Lookahead = 
 *    Shift on <bracket-comment> to 8 because of <single-comment>->•<bracket-comment> Lookahead = 
 * ----------- 4 -----------
 *   --Itemset--
 *     <commented-command>-><command>•
 *   --Transitions--
 *    Reduce on <identifier> using <commented-command>-><command> Lookahead = 
 *    Reduce on <hash-comment> using <commented-command>-><command> Lookahead = 
 *    Reduce on <bracket-comment> using <commented-command>-><command> Lookahead = 
 *    Reduce on  using <commented-command>-><command> Lookahead = 
 * ----------- 5 -----------
 *   --Itemset--
 *     <comment>-><single-comment>•
 *   --Transitions--
 *    Reduce on <identifier> using <comment>-><single-comment> Lookahead = 
 *    Reduce on <hash-comment> using <comment>-><single-comment> Lookahead = 
 *    Reduce on <bracket-comment> using <comment>-><single-comment> Lookahead = 
 * ----------- 6 -----------
 *   --Itemset--
 *     <command>-><identifier>•<arguments><semicolon>
 *     <command>-><identifier>•<arguments><bracket-open><block>
 *     <command>-><identifier>•<semicolon>
 *     <command>-><identifier>•<bracket-open><block>
 *    +<arguments>->•<arguments-plus>
 *    +<arguments>->•<arguments-plus><test>
 *    +<arguments>->•<arguments-plus><test-list>
 *    +<arguments>->•<test>
 *    +<arguments>->•<test-list>
 *    +<arguments-plus>->•<arguments-plus><argument>
 *    +<arguments-plus>->•<argument>
 *    +<test>->•<identifier><arguments>
 *    +<test>->•<identifier>
 *    +<test-list>->•<parenthesis-open><test-plus-csv><parenthesis-close>
 *    +<argument>->•<string-list>
 *    +<argument>->•<number>
 *    +<argument>->•<tag>
 *    +<string-list>->•<square-parenthesis-open><string-plus-csv><square-parenthesis-close>
 *    +<string-list>->•<string>
 *    +<string>->•<quoted-string>
 *    +<string>->•<multi-line>
 *   --Transitions--
 *    Goto on <arguments> to 12 because of <command>-><identifier>•<arguments><semicolon>
 *    Goto on <arguments> to 12 because of <command>-><identifier>•<arguments><bracket-open><block>
 *    Shift on <semicolon> to 13 because of <command>-><identifier>•<semicolon> Lookahead = 
 *    Shift on <bracket-open> to 14 because of <command>-><identifier>•<bracket-open><block> Lookahead = 
 *    Goto on <arguments-plus> to 15 because of <arguments>->•<arguments-plus>
 *    Goto on <arguments-plus> to 15 because of <arguments>->•<arguments-plus><test>
 *    Goto on <arguments-plus> to 15 because of <arguments>->•<arguments-plus><test-list>
 *    Goto on <test> to 16 because of <arguments>->•<test>
 *    Goto on <test-list> to 17 because of <arguments>->•<test-list>
 *    Goto on <arguments-plus> to 15 because of <arguments-plus>->•<arguments-plus><argument>
 *    Goto on <argument> to 18 because of <arguments-plus>->•<argument>
 *    Shift on <identifier> to 19 because of <test>->•<identifier><arguments> Lookahead = 
 *    Shift on <identifier> to 19 because of <test>->•<identifier> Lookahead = 
 *    Shift on <parenthesis-open> to 20 because of <test-list>->•<parenthesis-open><test-plus-csv><parenthesis-close> Lookahead = 
 *    Goto on <string-list> to 21 because of <argument>->•<string-list>
 *    Shift on <number> to 22 because of <argument>->•<number> Lookahead = 
 *    Shift on <tag> to 23 because of <argument>->•<tag> Lookahead = 
 *    Shift on <square-parenthesis-open> to 24 because of <string-list>->•<square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 *    Goto on <string> to 25 because of <string-list>->•<string>
 *    Shift on <quoted-string> to 26 because of <string>->•<quoted-string> Lookahead = 
 *    Shift on <multi-line> to 27 because of <string>->•<multi-line> Lookahead = 
 * ----------- 7 -----------
 *   --Itemset--
 *     <single-comment>-><hash-comment>•
 *   --Transitions--
 *    Reduce on <identifier> using <single-comment>-><hash-comment> Lookahead = 
 *    Reduce on <hash-comment> using <single-comment>-><hash-comment> Lookahead = 
 *    Reduce on <bracket-comment> using <single-comment>-><hash-comment> Lookahead = 
 * ----------- 8 -----------
 *   --Itemset--
 *     <single-comment>-><bracket-comment>•
 *   --Transitions--
 *    Reduce on <identifier> using <single-comment>-><bracket-comment> Lookahead = 
 *    Reduce on <hash-comment> using <single-comment>-><bracket-comment> Lookahead = 
 *    Reduce on <bracket-comment> using <single-comment>-><bracket-comment> Lookahead = 
 * ----------- 9 -----------
 *   --Itemset--
 *     <commands>-><commands><commented-command>•
 *   --Transitions--
 *    Reduce on <identifier> using <commands>-><commands><commented-command> Lookahead = 
 *    Reduce on <hash-comment> using <commands>-><commands><commented-command> Lookahead = 
 *    Reduce on <bracket-comment> using <commands>-><commands><commented-command> Lookahead = 
 *    Reduce on  using <commands>-><commands><commented-command> Lookahead = 
 * ----------- 10 -----------
 *   --Itemset--
 *     <commented-command>-><comment><command>•
 *   --Transitions--
 *    Reduce on <identifier> using <commented-command>-><comment><command> Lookahead = 
 *    Reduce on <hash-comment> using <commented-command>-><comment><command> Lookahead = 
 *    Reduce on <bracket-comment> using <commented-command>-><comment><command> Lookahead = 
 *    Reduce on  using <commented-command>-><comment><command> Lookahead = 
 * ----------- 11 -----------
 *   --Itemset--
 *     <comment>-><comment><single-comment>•
 *   --Transitions--
 *    Reduce on <identifier> using <comment>-><comment><single-comment> Lookahead = 
 *    Reduce on <hash-comment> using <comment>-><comment><single-comment> Lookahead = 
 *    Reduce on <bracket-comment> using <comment>-><comment><single-comment> Lookahead = 
 * ----------- 12 -----------
 *   --Itemset--
 *     <command>-><identifier><arguments>•<semicolon>
 *     <command>-><identifier><arguments>•<bracket-open><block>
 *   --Transitions--
 *    Shift on <semicolon> to 28 because of <command>-><identifier><arguments>•<semicolon> Lookahead = 
 *    Shift on <bracket-open> to 29 because of <command>-><identifier><arguments>•<bracket-open><block> Lookahead = 
 * ----------- 13 -----------
 *   --Itemset--
 *     <command>-><identifier><semicolon>•
 *   --Transitions--
 *    Reduce on <identifier> using <command>-><identifier><semicolon> Lookahead = 
 *    Reduce on <bracket-close> using <command>-><identifier><semicolon> Lookahead = 
 *    Reduce on <hash-comment> using <command>-><identifier><semicolon> Lookahead = 
 *    Reduce on <bracket-comment> using <command>-><identifier><semicolon> Lookahead = 
 *    Reduce on  using <command>-><identifier><semicolon> Lookahead = 
 * ----------- 14 -----------
 *   --Itemset--
 *     <command>-><identifier><bracket-open>•<block>
 *    +<block>->•<command><block>
 *    +<block>->•<bracket-close>
 *    +<command>->•<identifier><arguments><semicolon>
 *    +<command>->•<identifier><arguments><bracket-open><block>
 *    +<command>->•<identifier><semicolon>
 *    +<command>->•<identifier><bracket-open><block>
 *   --Transitions--
 *    Goto on <block> to 30 because of <command>-><identifier><bracket-open>•<block>
 *    Goto on <command> to 31 because of <block>->•<command><block>
 *    Shift on <bracket-close> to 32 because of <block>->•<bracket-close> Lookahead = 
 *    Shift on <identifier> to 6 because of <command>->•<identifier><arguments><semicolon> Lookahead = 
 *    Shift on <identifier> to 6 because of <command>->•<identifier><arguments><bracket-open><block> Lookahead = 
 *    Shift on <identifier> to 6 because of <command>->•<identifier><semicolon> Lookahead = 
 *    Shift on <identifier> to 6 because of <command>->•<identifier><bracket-open><block> Lookahead = 
 * ----------- 15 -----------
 *   --Itemset--
 *     <arguments>-><arguments-plus>•
 *     <arguments>-><arguments-plus>•<test>
 *     <arguments>-><arguments-plus>•<test-list>
 *     <arguments-plus>-><arguments-plus>•<argument>
 *    +<test>->•<identifier><arguments>
 *    +<test>->•<identifier>
 *    +<test-list>->•<parenthesis-open><test-plus-csv><parenthesis-close>
 *    +<argument>->•<string-list>
 *    +<argument>->•<number>
 *    +<argument>->•<tag>
 *    +<string-list>->•<square-parenthesis-open><string-plus-csv><square-parenthesis-close>
 *    +<string-list>->•<string>
 *    +<string>->•<quoted-string>
 *    +<string>->•<multi-line>
 *   --Transitions--
 *    Reduce on <semicolon> using <arguments>-><arguments-plus> Lookahead = 
 *    Reduce on <bracket-open> using <arguments>-><arguments-plus> Lookahead = 
 *    Reduce on <parenthesis-close> using <arguments>-><arguments-plus> Lookahead = 
 *    Reduce on <comma> using <arguments>-><arguments-plus> Lookahead = 
 *    Goto on <test> to 33 because of <arguments>-><arguments-plus>•<test>
 *    Goto on <test-list> to 34 because of <arguments>-><arguments-plus>•<test-list>
 *    Goto on <argument> to 35 because of <arguments-plus>-><arguments-plus>•<argument>
 *    Shift on <identifier> to 19 because of <test>->•<identifier><arguments> Lookahead = 
 *    Shift on <identifier> to 19 because of <test>->•<identifier> Lookahead = 
 *    Shift on <parenthesis-open> to 20 because of <test-list>->•<parenthesis-open><test-plus-csv><parenthesis-close> Lookahead = 
 *    Goto on <string-list> to 21 because of <argument>->•<string-list>
 *    Shift on <number> to 22 because of <argument>->•<number> Lookahead = 
 *    Shift on <tag> to 23 because of <argument>->•<tag> Lookahead = 
 *    Shift on <square-parenthesis-open> to 24 because of <string-list>->•<square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 *    Goto on <string> to 25 because of <string-list>->•<string>
 *    Shift on <quoted-string> to 26 because of <string>->•<quoted-string> Lookahead = 
 *    Shift on <multi-line> to 27 because of <string>->•<multi-line> Lookahead = 
 * ----------- 16 -----------
 *   --Itemset--
 *     <arguments>-><test>•
 *   --Transitions--
 *    Reduce on <semicolon> using <arguments>-><test> Lookahead = 
 *    Reduce on <bracket-open> using <arguments>-><test> Lookahead = 
 * ----------- 17 -----------
 *   --Itemset--
 *     <arguments>-><test-list>•
 *   --Transitions--
 *    Reduce on <semicolon> using <arguments>-><test-list> Lookahead = 
 *    Reduce on <bracket-open> using <arguments>-><test-list> Lookahead = 
 *    Reduce on <parenthesis-close> using <arguments>-><test-list> Lookahead = 
 *    Reduce on <comma> using <arguments>-><test-list> Lookahead = 
 * ----------- 18 -----------
 *   --Itemset--
 *     <arguments-plus>-><argument>•
 *   --Transitions--
 *    Reduce on <identifier> using <arguments-plus>-><argument> Lookahead = 
 *    Reduce on <semicolon> using <arguments-plus>-><argument> Lookahead = 
 *    Reduce on <bracket-open> using <arguments-plus>-><argument> Lookahead = 
 *    Reduce on <parenthesis-open> using <arguments-plus>-><argument> Lookahead = 
 *    Reduce on <parenthesis-close> using <arguments-plus>-><argument> Lookahead = 
 *    Reduce on <comma> using <arguments-plus>-><argument> Lookahead = 
 *    Reduce on <number> using <arguments-plus>-><argument> Lookahead = 
 *    Reduce on <tag> using <arguments-plus>-><argument> Lookahead = 
 *    Reduce on <square-parenthesis-open> using <arguments-plus>-><argument> Lookahead = 
 *    Reduce on <quoted-string> using <arguments-plus>-><argument> Lookahead = 
 *    Reduce on <multi-line> using <arguments-plus>-><argument> Lookahead = 
 * ----------- 19 -----------
 *   --Itemset--
 *     <test>-><identifier>•<arguments>
 *     <test>-><identifier>•
 *    +<arguments>->•<arguments-plus>
 *    +<arguments>->•<arguments-plus><test>
 *    +<arguments>->•<arguments-plus><test-list>
 *    +<arguments>->•<test>
 *    +<arguments>->•<test-list>
 *    +<arguments-plus>->•<arguments-plus><argument>
 *    +<arguments-plus>->•<argument>
 *    +<test>->•<identifier><arguments>
 *    +<test>->•<identifier>
 *    +<test-list>->•<parenthesis-open><test-plus-csv><parenthesis-close>
 *    +<argument>->•<string-list>
 *    +<argument>->•<number>
 *    +<argument>->•<tag>
 *    +<string-list>->•<square-parenthesis-open><string-plus-csv><square-parenthesis-close>
 *    +<string-list>->•<string>
 *    +<string>->•<quoted-string>
 *    +<string>->•<multi-line>
 *   --Transitions--
 *    Goto on <arguments> to 36 because of <test>-><identifier>•<arguments>
 *    Reduce on <semicolon> using <test>-><identifier> Lookahead = 
 *    Reduce on <bracket-open> using <test>-><identifier> Lookahead = 
 *    Reduce on <parenthesis-close> using <test>-><identifier> Lookahead = 
 *    Reduce on <comma> using <test>-><identifier> Lookahead = 
 *    Goto on <arguments-plus> to 15 because of <arguments>->•<arguments-plus>
 *    Goto on <arguments-plus> to 15 because of <arguments>->•<arguments-plus><test>
 *    Goto on <arguments-plus> to 15 because of <arguments>->•<arguments-plus><test-list>
 *    Goto on <test> to 16 because of <arguments>->•<test>
 *    Goto on <test-list> to 17 because of <arguments>->•<test-list>
 *    Goto on <arguments-plus> to 15 because of <arguments-plus>->•<arguments-plus><argument>
 *    Goto on <argument> to 18 because of <arguments-plus>->•<argument>
 *    Shift on <identifier> to 19 because of <test>->•<identifier><arguments> Lookahead = 
 *    Shift on <identifier> to 19 because of <test>->•<identifier> Lookahead = 
 *    Shift on <parenthesis-open> to 20 because of <test-list>->•<parenthesis-open><test-plus-csv><parenthesis-close> Lookahead = 
 *    Goto on <string-list> to 21 because of <argument>->•<string-list>
 *    Shift on <number> to 22 because of <argument>->•<number> Lookahead = 
 *    Shift on <tag> to 23 because of <argument>->•<tag> Lookahead = 
 *    Shift on <square-parenthesis-open> to 24 because of <string-list>->•<square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 *    Goto on <string> to 25 because of <string-list>->•<string>
 *    Shift on <quoted-string> to 26 because of <string>->•<quoted-string> Lookahead = 
 *    Shift on <multi-line> to 27 because of <string>->•<multi-line> Lookahead = 
 * ----------- 20 -----------
 *   --Itemset--
 *     <test-list>-><parenthesis-open>•<test-plus-csv><parenthesis-close>
 *    +<test-plus-csv>->•<test>
 *    +<test-plus-csv>->•<test><comma><test-plus-csv>
 *    +<test>->•<identifier><arguments>
 *    +<test>->•<identifier>
 *   --Transitions--
 *    Goto on <test-plus-csv> to 37 because of <test-list>-><parenthesis-open>•<test-plus-csv><parenthesis-close>
 *    Goto on <test> to 38 because of <test-plus-csv>->•<test>
 *    Goto on <test> to 38 because of <test-plus-csv>->•<test><comma><test-plus-csv>
 *    Shift on <identifier> to 19 because of <test>->•<identifier><arguments> Lookahead = 
 *    Shift on <identifier> to 19 because of <test>->•<identifier> Lookahead = 
 * ----------- 21 -----------
 *   --Itemset--
 *     <argument>-><string-list>•
 *   --Transitions--
 *    Reduce on <identifier> using <argument>-><string-list> Lookahead = 
 *    Reduce on <semicolon> using <argument>-><string-list> Lookahead = 
 *    Reduce on <bracket-open> using <argument>-><string-list> Lookahead = 
 *    Reduce on <parenthesis-open> using <argument>-><string-list> Lookahead = 
 *    Reduce on <parenthesis-close> using <argument>-><string-list> Lookahead = 
 *    Reduce on <comma> using <argument>-><string-list> Lookahead = 
 *    Reduce on <number> using <argument>-><string-list> Lookahead = 
 *    Reduce on <tag> using <argument>-><string-list> Lookahead = 
 *    Reduce on <square-parenthesis-open> using <argument>-><string-list> Lookahead = 
 *    Reduce on <quoted-string> using <argument>-><string-list> Lookahead = 
 *    Reduce on <multi-line> using <argument>-><string-list> Lookahead = 
 * ----------- 22 -----------
 *   --Itemset--
 *     <argument>-><number>•
 *   --Transitions--
 *    Reduce on <identifier> using <argument>-><number> Lookahead = 
 *    Reduce on <semicolon> using <argument>-><number> Lookahead = 
 *    Reduce on <bracket-open> using <argument>-><number> Lookahead = 
 *    Reduce on <parenthesis-open> using <argument>-><number> Lookahead = 
 *    Reduce on <parenthesis-close> using <argument>-><number> Lookahead = 
 *    Reduce on <comma> using <argument>-><number> Lookahead = 
 *    Reduce on <number> using <argument>-><number> Lookahead = 
 *    Reduce on <tag> using <argument>-><number> Lookahead = 
 *    Reduce on <square-parenthesis-open> using <argument>-><number> Lookahead = 
 *    Reduce on <quoted-string> using <argument>-><number> Lookahead = 
 *    Reduce on <multi-line> using <argument>-><number> Lookahead = 
 * ----------- 23 -----------
 *   --Itemset--
 *     <argument>-><tag>•
 *   --Transitions--
 *    Reduce on <identifier> using <argument>-><tag> Lookahead = 
 *    Reduce on <semicolon> using <argument>-><tag> Lookahead = 
 *    Reduce on <bracket-open> using <argument>-><tag> Lookahead = 
 *    Reduce on <parenthesis-open> using <argument>-><tag> Lookahead = 
 *    Reduce on <parenthesis-close> using <argument>-><tag> Lookahead = 
 *    Reduce on <comma> using <argument>-><tag> Lookahead = 
 *    Reduce on <number> using <argument>-><tag> Lookahead = 
 *    Reduce on <tag> using <argument>-><tag> Lookahead = 
 *    Reduce on <square-parenthesis-open> using <argument>-><tag> Lookahead = 
 *    Reduce on <quoted-string> using <argument>-><tag> Lookahead = 
 *    Reduce on <multi-line> using <argument>-><tag> Lookahead = 
 * ----------- 24 -----------
 *   --Itemset--
 *     <string-list>-><square-parenthesis-open>•<string-plus-csv><square-parenthesis-close>
 *    +<string-plus-csv>->•<string>
 *    +<string-plus-csv>->•<string-plus-csv><comma><string>
 *    +<string>->•<quoted-string>
 *    +<string>->•<multi-line>
 *   --Transitions--
 *    Goto on <string-plus-csv> to 39 because of <string-list>-><square-parenthesis-open>•<string-plus-csv><square-parenthesis-close>
 *    Goto on <string> to 40 because of <string-plus-csv>->•<string>
 *    Goto on <string-plus-csv> to 39 because of <string-plus-csv>->•<string-plus-csv><comma><string>
 *    Shift on <quoted-string> to 26 because of <string>->•<quoted-string> Lookahead = 
 *    Shift on <multi-line> to 27 because of <string>->•<multi-line> Lookahead = 
 * ----------- 25 -----------
 *   --Itemset--
 *     <string-list>-><string>•
 *   --Transitions--
 *    Reduce on <identifier> using <string-list>-><string> Lookahead = 
 *    Reduce on <semicolon> using <string-list>-><string> Lookahead = 
 *    Reduce on <bracket-open> using <string-list>-><string> Lookahead = 
 *    Reduce on <parenthesis-open> using <string-list>-><string> Lookahead = 
 *    Reduce on <parenthesis-close> using <string-list>-><string> Lookahead = 
 *    Reduce on <comma> using <string-list>-><string> Lookahead = 
 *    Reduce on <number> using <string-list>-><string> Lookahead = 
 *    Reduce on <tag> using <string-list>-><string> Lookahead = 
 *    Reduce on <square-parenthesis-open> using <string-list>-><string> Lookahead = 
 *    Reduce on <quoted-string> using <string-list>-><string> Lookahead = 
 *    Reduce on <multi-line> using <string-list>-><string> Lookahead = 
 * ----------- 26 -----------
 *   --Itemset--
 *     <string>-><quoted-string>•
 *   --Transitions--
 *    Reduce on <identifier> using <string>-><quoted-string> Lookahead = 
 *    Reduce on <semicolon> using <string>-><quoted-string> Lookahead = 
 *    Reduce on <bracket-open> using <string>-><quoted-string> Lookahead = 
 *    Reduce on <parenthesis-open> using <string>-><quoted-string> Lookahead = 
 *    Reduce on <parenthesis-close> using <string>-><quoted-string> Lookahead = 
 *    Reduce on <comma> using <string>-><quoted-string> Lookahead = 
 *    Reduce on <number> using <string>-><quoted-string> Lookahead = 
 *    Reduce on <tag> using <string>-><quoted-string> Lookahead = 
 *    Reduce on <square-parenthesis-open> using <string>-><quoted-string> Lookahead = 
 *    Reduce on <square-parenthesis-close> using <string>-><quoted-string> Lookahead = 
 *    Reduce on <quoted-string> using <string>-><quoted-string> Lookahead = 
 *    Reduce on <multi-line> using <string>-><quoted-string> Lookahead = 
 * ----------- 27 -----------
 *   --Itemset--
 *     <string>-><multi-line>•
 *   --Transitions--
 *    Reduce on <identifier> using <string>-><multi-line> Lookahead = 
 *    Reduce on <semicolon> using <string>-><multi-line> Lookahead = 
 *    Reduce on <bracket-open> using <string>-><multi-line> Lookahead = 
 *    Reduce on <parenthesis-open> using <string>-><multi-line> Lookahead = 
 *    Reduce on <parenthesis-close> using <string>-><multi-line> Lookahead = 
 *    Reduce on <comma> using <string>-><multi-line> Lookahead = 
 *    Reduce on <number> using <string>-><multi-line> Lookahead = 
 *    Reduce on <tag> using <string>-><multi-line> Lookahead = 
 *    Reduce on <square-parenthesis-open> using <string>-><multi-line> Lookahead = 
 *    Reduce on <square-parenthesis-close> using <string>-><multi-line> Lookahead = 
 *    Reduce on <quoted-string> using <string>-><multi-line> Lookahead = 
 *    Reduce on <multi-line> using <string>-><multi-line> Lookahead = 
 * ----------- 28 -----------
 *   --Itemset--
 *     <command>-><identifier><arguments><semicolon>•
 *   --Transitions--
 *    Reduce on <identifier> using <command>-><identifier><arguments><semicolon> Lookahead = 
 *    Reduce on <bracket-close> using <command>-><identifier><arguments><semicolon> Lookahead = 
 *    Reduce on <hash-comment> using <command>-><identifier><arguments><semicolon> Lookahead = 
 *    Reduce on <bracket-comment> using <command>-><identifier><arguments><semicolon> Lookahead = 
 *    Reduce on  using <command>-><identifier><arguments><semicolon> Lookahead = 
 * ----------- 29 -----------
 *   --Itemset--
 *     <command>-><identifier><arguments><bracket-open>•<block>
 *    +<block>->•<command><block>
 *    +<block>->•<bracket-close>
 *    +<command>->•<identifier><arguments><semicolon>
 *    +<command>->•<identifier><arguments><bracket-open><block>
 *    +<command>->•<identifier><semicolon>
 *    +<command>->•<identifier><bracket-open><block>
 *   --Transitions--
 *    Goto on <block> to 41 because of <command>-><identifier><arguments><bracket-open>•<block>
 *    Goto on <command> to 31 because of <block>->•<command><block>
 *    Shift on <bracket-close> to 32 because of <block>->•<bracket-close> Lookahead = 
 *    Shift on <identifier> to 6 because of <command>->•<identifier><arguments><semicolon> Lookahead = 
 *    Shift on <identifier> to 6 because of <command>->•<identifier><arguments><bracket-open><block> Lookahead = 
 *    Shift on <identifier> to 6 because of <command>->•<identifier><semicolon> Lookahead = 
 *    Shift on <identifier> to 6 because of <command>->•<identifier><bracket-open><block> Lookahead = 
 * ----------- 30 -----------
 *   --Itemset--
 *     <command>-><identifier><bracket-open><block>•
 *   --Transitions--
 *    Reduce on <identifier> using <command>-><identifier><bracket-open><block> Lookahead = 
 *    Reduce on <bracket-close> using <command>-><identifier><bracket-open><block> Lookahead = 
 *    Reduce on <hash-comment> using <command>-><identifier><bracket-open><block> Lookahead = 
 *    Reduce on <bracket-comment> using <command>-><identifier><bracket-open><block> Lookahead = 
 *    Reduce on  using <command>-><identifier><bracket-open><block> Lookahead = 
 * ----------- 31 -----------
 *   --Itemset--
 *     <block>-><command>•<block>
 *    +<block>->•<command><block>
 *    +<block>->•<bracket-close>
 *    +<command>->•<identifier><arguments><semicolon>
 *    +<command>->•<identifier><arguments><bracket-open><block>
 *    +<command>->•<identifier><semicolon>
 *    +<command>->•<identifier><bracket-open><block>
 *   --Transitions--
 *    Goto on <block> to 42 because of <block>-><command>•<block>
 *    Goto on <command> to 31 because of <block>->•<command><block>
 *    Shift on <bracket-close> to 32 because of <block>->•<bracket-close> Lookahead = 
 *    Shift on <identifier> to 6 because of <command>->•<identifier><arguments><semicolon> Lookahead = 
 *    Shift on <identifier> to 6 because of <command>->•<identifier><arguments><bracket-open><block> Lookahead = 
 *    Shift on <identifier> to 6 because of <command>->•<identifier><semicolon> Lookahead = 
 *    Shift on <identifier> to 6 because of <command>->•<identifier><bracket-open><block> Lookahead = 
 * ----------- 32 -----------
 *   --Itemset--
 *     <block>-><bracket-close>•
 *   --Transitions--
 *    Reduce on <identifier> using <block>-><bracket-close> Lookahead = 
 *    Reduce on <bracket-close> using <block>-><bracket-close> Lookahead = 
 *    Reduce on <hash-comment> using <block>-><bracket-close> Lookahead = 
 *    Reduce on <bracket-comment> using <block>-><bracket-close> Lookahead = 
 *    Reduce on  using <block>-><bracket-close> Lookahead = 
 * ----------- 33 -----------
 *   --Itemset--
 *     <arguments>-><arguments-plus><test>•
 *   --Transitions--
 *    Reduce on <semicolon> using <arguments>-><arguments-plus><test> Lookahead = 
 *    Reduce on <bracket-open> using <arguments>-><arguments-plus><test> Lookahead = 
 * ----------- 34 -----------
 *   --Itemset--
 *     <arguments>-><arguments-plus><test-list>•
 *   --Transitions--
 *    Reduce on <semicolon> using <arguments>-><arguments-plus><test-list> Lookahead = 
 *    Reduce on <bracket-open> using <arguments>-><arguments-plus><test-list> Lookahead = 
 *    Reduce on <parenthesis-close> using <arguments>-><arguments-plus><test-list> Lookahead = 
 *    Reduce on <comma> using <arguments>-><arguments-plus><test-list> Lookahead = 
 * ----------- 35 -----------
 *   --Itemset--
 *     <arguments-plus>-><arguments-plus><argument>•
 *   --Transitions--
 *    Reduce on <identifier> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
 *    Reduce on <semicolon> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
 *    Reduce on <bracket-open> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
 *    Reduce on <parenthesis-open> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
 *    Reduce on <parenthesis-close> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
 *    Reduce on <comma> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
 *    Reduce on <number> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
 *    Reduce on <tag> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
 *    Reduce on <square-parenthesis-open> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
 *    Reduce on <quoted-string> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
 *    Reduce on <multi-line> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
 * ----------- 36 -----------
 *   --Itemset--
 *     <test>-><identifier><arguments>•
 *   --Transitions--
 *    Reduce on <semicolon> using <test>-><identifier><arguments> Lookahead = 
 *    Reduce on <bracket-open> using <test>-><identifier><arguments> Lookahead = 
 *    Reduce on <parenthesis-close> using <test>-><identifier><arguments> Lookahead = 
 *    Reduce on <comma> using <test>-><identifier><arguments> Lookahead = 
 * ----------- 37 -----------
 *   --Itemset--
 *     <test-list>-><parenthesis-open><test-plus-csv>•<parenthesis-close>
 *   --Transitions--
 *    Shift on <parenthesis-close> to 43 because of <test-list>-><parenthesis-open><test-plus-csv>•<parenthesis-close> Lookahead = 
 * ----------- 38 -----------
 *   --Itemset--
 *     <test-plus-csv>-><test>•
 *     <test-plus-csv>-><test>•<comma><test-plus-csv>
 *   --Transitions--
 *    Reduce on <parenthesis-close> using <test-plus-csv>-><test> Lookahead = 
 *    Shift on <comma> to 44 because of <test-plus-csv>-><test>•<comma><test-plus-csv> Lookahead = 
 * ----------- 39 -----------
 *   --Itemset--
 *     <string-list>-><square-parenthesis-open><string-plus-csv>•<square-parenthesis-close>
 *     <string-plus-csv>-><string-plus-csv>•<comma><string>
 *   --Transitions--
 *    Shift on <square-parenthesis-close> to 45 because of <string-list>-><square-parenthesis-open><string-plus-csv>•<square-parenthesis-close> Lookahead = 
 *    Shift on <comma> to 46 because of <string-plus-csv>-><string-plus-csv>•<comma><string> Lookahead = 
 * ----------- 40 -----------
 *   --Itemset--
 *     <string-plus-csv>-><string>•
 *   --Transitions--
 *    Reduce on <comma> using <string-plus-csv>-><string> Lookahead = 
 *    Reduce on <square-parenthesis-close> using <string-plus-csv>-><string> Lookahead = 
 * ----------- 41 -----------
 *   --Itemset--
 *     <command>-><identifier><arguments><bracket-open><block>•
 *   --Transitions--
 *    Reduce on <identifier> using <command>-><identifier><arguments><bracket-open><block> Lookahead = 
 *    Reduce on <bracket-close> using <command>-><identifier><arguments><bracket-open><block> Lookahead = 
 *    Reduce on <hash-comment> using <command>-><identifier><arguments><bracket-open><block> Lookahead = 
 *    Reduce on <bracket-comment> using <command>-><identifier><arguments><bracket-open><block> Lookahead = 
 *    Reduce on  using <command>-><identifier><arguments><bracket-open><block> Lookahead = 
 * ----------- 42 -----------
 *   --Itemset--
 *     <block>-><command><block>•
 *   --Transitions--
 *    Reduce on <identifier> using <block>-><command><block> Lookahead = 
 *    Reduce on <bracket-close> using <block>-><command><block> Lookahead = 
 *    Reduce on <hash-comment> using <block>-><command><block> Lookahead = 
 *    Reduce on <bracket-comment> using <block>-><command><block> Lookahead = 
 *    Reduce on  using <block>-><command><block> Lookahead = 
 * ----------- 43 -----------
 *   --Itemset--
 *     <test-list>-><parenthesis-open><test-plus-csv><parenthesis-close>•
 *   --Transitions--
 *    Reduce on <semicolon> using <test-list>-><parenthesis-open><test-plus-csv><parenthesis-close> Lookahead = 
 *    Reduce on <bracket-open> using <test-list>-><parenthesis-open><test-plus-csv><parenthesis-close> Lookahead = 
 *    Reduce on <parenthesis-close> using <test-list>-><parenthesis-open><test-plus-csv><parenthesis-close> Lookahead = 
 *    Reduce on <comma> using <test-list>-><parenthesis-open><test-plus-csv><parenthesis-close> Lookahead = 
 * ----------- 44 -----------
 *   --Itemset--
 *     <test-plus-csv>-><test><comma>•<test-plus-csv>
 *    +<test-plus-csv>->•<test>
 *    +<test-plus-csv>->•<test><comma><test-plus-csv>
 *    +<test>->•<identifier><arguments>
 *    +<test>->•<identifier>
 *   --Transitions--
 *    Goto on <test-plus-csv> to 47 because of <test-plus-csv>-><test><comma>•<test-plus-csv>
 *    Goto on <test> to 38 because of <test-plus-csv>->•<test>
 *    Goto on <test> to 38 because of <test-plus-csv>->•<test><comma><test-plus-csv>
 *    Shift on <identifier> to 19 because of <test>->•<identifier><arguments> Lookahead = 
 *    Shift on <identifier> to 19 because of <test>->•<identifier> Lookahead = 
 * ----------- 45 -----------
 *   --Itemset--
 *     <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close>•
 *   --Transitions--
 *    Reduce on <identifier> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 *    Reduce on <semicolon> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 *    Reduce on <bracket-open> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 *    Reduce on <parenthesis-open> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 *    Reduce on <parenthesis-close> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 *    Reduce on <comma> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 *    Reduce on <number> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 *    Reduce on <tag> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 *    Reduce on <square-parenthesis-open> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 *    Reduce on <quoted-string> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 *    Reduce on <multi-line> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 * ----------- 46 -----------
 *   --Itemset--
 *     <string-plus-csv>-><string-plus-csv><comma>•<string>
 *    +<string>->•<quoted-string>
 *    +<string>->•<multi-line>
 *   --Transitions--
 *    Goto on <string> to 48 because of <string-plus-csv>-><string-plus-csv><comma>•<string>
 *    Shift on <quoted-string> to 26 because of <string>->•<quoted-string> Lookahead = 
 *    Shift on <multi-line> to 27 because of <string>->•<multi-line> Lookahead = 
 * ----------- 47 -----------
 *   --Itemset--
 *     <test-plus-csv>-><test><comma><test-plus-csv>•
 *   --Transitions--
 *    Reduce on <parenthesis-close> using <test-plus-csv>-><test><comma><test-plus-csv> Lookahead = 
 * ----------- 48 -----------
 *   --Itemset--
 *     <string-plus-csv>-><string-plus-csv><comma><string>•
 *   --Transitions--
 *    Reduce on <comma> using <string-plus-csv>-><string-plus-csv><comma><string> Lookahead = 
 *    Reduce on <square-parenthesis-close> using <string-plus-csv>-><string-plus-csv><comma><string> Lookahead =
 *
 */
class Parser extends \sergiosgc\Text_Parser_LALR
{
    /* Constructor {{{ */
    /**
     * Parser constructor
     * 
     * @param Text_Tokenizer Tokenizer that will feed this parser
     */
    public function __construct(&$tokenizer)
    {
        parent::__construct($tokenizer);
        $this->_gotoTable = unserialize('a:13:{i:0;a:5:{s:10:"<commands>";i:1;s:19:"<commented-command>";i:2;s:9:"<comment>";i:3;s:9:"<command>";i:4;s:16:"<single-comment>";i:5;}i:1;a:4:{s:19:"<commented-command>";i:9;s:9:"<comment>";i:3;s:9:"<command>";i:4;s:16:"<single-comment>";i:5;}i:3;a:2:{s:9:"<command>";i:10;s:16:"<single-comment>";i:11;}i:6;a:7:{s:11:"<arguments>";i:12;s:16:"<arguments-plus>";i:15;s:6:"<test>";i:16;s:11:"<test-list>";i:17;s:10:"<argument>";i:18;s:13:"<string-list>";i:21;s:8:"<string>";i:25;}i:14;a:2:{s:7:"<block>";i:30;s:9:"<command>";i:31;}i:15;a:5:{s:6:"<test>";i:33;s:11:"<test-list>";i:34;s:10:"<argument>";i:35;s:13:"<string-list>";i:21;s:8:"<string>";i:25;}i:19;a:7:{s:11:"<arguments>";i:36;s:16:"<arguments-plus>";i:15;s:6:"<test>";i:16;s:11:"<test-list>";i:17;s:10:"<argument>";i:18;s:13:"<string-list>";i:21;s:8:"<string>";i:25;}i:20;a:2:{s:15:"<test-plus-csv>";i:37;s:6:"<test>";i:38;}i:24;a:2:{s:17:"<string-plus-csv>";i:39;s:8:"<string>";i:40;}i:29;a:2:{s:7:"<block>";i:41;s:9:"<command>";i:31;}i:31;a:2:{s:7:"<block>";i:42;s:9:"<command>";i:31;}i:44;a:2:{s:15:"<test-plus-csv>";i:47;s:6:"<test>";i:38;}i:46;a:1:{s:8:"<string>";i:48;}}');
        $this->_actionTable = unserialize('a:49:{i:1;a:4:{s:0:"";a:1:{s:6:"action";s:6:"accept";}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:6;}s:14:"<hash-comment>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:7;}s:17:"<bracket-comment>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:8;}}i:0;a:3:{s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:6;}s:14:"<hash-comment>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:7;}s:17:"<bracket-comment>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:8;}}i:3;a:3:{s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:6;}s:14:"<hash-comment>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:7;}s:17:"<bracket-comment>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:8;}}i:6;a:9:{s:11:"<semicolon>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:13;}s:14:"<bracket-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:14;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:19;}s:18:"<parenthesis-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:20;}s:8:"<number>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:22;}s:5:"<tag>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:23;}s:25:"<square-parenthesis-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:24;}s:15:"<quoted-string>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:26;}s:12:"<multi-line>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:27;}}i:12;a:2:{s:11:"<semicolon>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:28;}s:14:"<bracket-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:29;}}i:14;a:2:{s:15:"<bracket-close>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:32;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:6;}}i:15;a:11:{s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:19;}s:18:"<parenthesis-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:20;}s:8:"<number>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:22;}s:5:"<tag>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:23;}s:25:"<square-parenthesis-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:24;}s:15:"<quoted-string>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:26;}s:12:"<multi-line>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:27;}s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:5:"$args";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_11";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:5:"$args";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_11";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:5:"$args";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_11";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:5:"$args";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_11";}}i:19;a:11:{s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:19;}s:18:"<parenthesis-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:20;}s:8:"<number>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:22;}s:5:"<tag>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:23;}s:25:"<square-parenthesis-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:24;}s:15:"<quoted-string>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:26;}s:12:"<multi-line>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:27;}s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:3:"$id";}s:15:"leftNonTerminal";s:6:"<test>";s:8:"function";s:14:"reduce_rule_19";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:3:"$id";}s:15:"leftNonTerminal";s:6:"<test>";s:8:"function";s:14:"reduce_rule_19";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:3:"$id";}s:15:"leftNonTerminal";s:6:"<test>";s:8:"function";s:14:"reduce_rule_19";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:3:"$id";}s:15:"leftNonTerminal";s:6:"<test>";s:8:"function";s:14:"reduce_rule_19";}}i:20;a:1:{s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:19;}}i:24;a:2:{s:15:"<quoted-string>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:26;}s:12:"<multi-line>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:27;}}i:29;a:2:{s:15:"<bracket-close>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:32;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:6;}}i:31;a:2:{s:15:"<bracket-close>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:32;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:6;}}i:37;a:1:{s:19:"<parenthesis-close>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:43;}}i:38;a:2:{s:7:"<comma>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:44;}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:5:"$test";}s:15:"leftNonTerminal";s:15:"<test-plus-csv>";s:8:"function";s:14:"reduce_rule_21";}}i:39;a:2:{s:26:"<square-parenthesis-close>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:45;}s:7:"<comma>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:46;}}i:44;a:1:{s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:19;}}i:46;a:2:{s:15:"<quoted-string>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:26;}s:12:"<multi-line>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:27;}}i:2;a:4:{s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_2";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_2";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_2";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_2";}}i:4;a:4:{s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_4";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_4";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_4";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_4";}}i:5;a:3:{s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_33";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_33";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_33";}}i:7;a:3:{s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_34";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_34";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_34";}}i:8;a:3:{s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_35";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_35";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_35";}}i:9;a:4:{s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_1";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_1";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_1";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_1";}}i:10;a:4:{s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_3";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_3";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_3";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_3";}}i:11;a:3:{s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_32";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_32";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_32";}}i:13;a:5:{s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_7";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_7";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_7";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_7";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_7";}}i:16;a:2:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:5:"$test";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_14";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:5:"$test";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_14";}}i:17;a:4:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:6:"$tests";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_15";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:6:"$tests";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_15";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:6:"$tests";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_15";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:6:"$tests";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_15";}}i:18;a:11:{s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_17";}s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_17";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_17";}s:18:"<parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_17";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_17";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_17";}s:8:"<number>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_17";}s:5:"<tag>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_17";}s:25:"<square-parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_17";}s:15:"<quoted-string>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_17";}s:12:"<multi-line>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_17";}}i:21;a:11:{s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_23";}s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_23";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_23";}s:18:"<parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_23";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_23";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_23";}s:8:"<number>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_23";}s:5:"<tag>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_23";}s:25:"<square-parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_23";}s:15:"<quoted-string>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_23";}s:12:"<multi-line>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_23";}}i:22;a:11:{s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_24";}s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_24";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_24";}s:18:"<parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_24";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_24";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_24";}s:8:"<number>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_24";}s:5:"<tag>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_24";}s:25:"<square-parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_24";}s:15:"<quoted-string>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_24";}s:12:"<multi-line>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_24";}}i:23;a:11:{s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_25";}s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_25";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_25";}s:18:"<parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_25";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_25";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_25";}s:8:"<number>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_25";}s:5:"<tag>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_25";}s:25:"<square-parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_25";}s:15:"<quoted-string>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_25";}s:12:"<multi-line>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_25";}}i:25;a:11:{s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_27";}s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_27";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_27";}s:18:"<parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_27";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_27";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_27";}s:8:"<number>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_27";}s:5:"<tag>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_27";}s:25:"<square-parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_27";}s:15:"<quoted-string>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_27";}s:12:"<multi-line>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_27";}}i:26;a:12:{s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_30";}s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_30";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_30";}s:18:"<parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_30";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_30";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_30";}s:8:"<number>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_30";}s:5:"<tag>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_30";}s:25:"<square-parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_30";}s:26:"<square-parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_30";}s:15:"<quoted-string>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_30";}s:12:"<multi-line>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_30";}}i:27;a:12:{s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_31";}s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_31";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_31";}s:18:"<parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_31";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_31";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_31";}s:8:"<number>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_31";}s:5:"<tag>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_31";}s:25:"<square-parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_31";}s:26:"<square-parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_31";}s:15:"<quoted-string>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_31";}s:12:"<multi-line>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_31";}}i:28;a:5:{s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_5";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_5";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_5";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_5";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_5";}}i:30;a:5:{s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_8";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_8";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_8";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_8";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_8";}}i:32;a:5:{s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_10";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_10";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_10";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_10";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_10";}}i:33;a:2:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:5:"$args";i:1;s:5:"$test";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_12";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:5:"$args";i:1;s:5:"$test";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_12";}}i:34;a:4:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:5:"$args";i:1;s:6:"$tests";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_13";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:5:"$args";i:1;s:6:"$tests";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_13";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:5:"$args";i:1;s:6:"$tests";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_13";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:5:"$args";i:1;s:6:"$tests";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_13";}}i:35;a:11:{s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_16";}s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_16";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_16";}s:18:"<parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_16";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_16";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_16";}s:8:"<number>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_16";}s:5:"<tag>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_16";}s:25:"<square-parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_16";}s:15:"<quoted-string>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_16";}s:12:"<multi-line>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_16";}}i:36;a:4:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:5:"$args";}s:15:"leftNonTerminal";s:6:"<test>";s:8:"function";s:14:"reduce_rule_18";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:5:"$args";}s:15:"leftNonTerminal";s:6:"<test>";s:8:"function";s:14:"reduce_rule_18";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:5:"$args";}s:15:"leftNonTerminal";s:6:"<test>";s:8:"function";s:14:"reduce_rule_18";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:5:"$args";}s:15:"leftNonTerminal";s:6:"<test>";s:8:"function";s:14:"reduce_rule_18";}}i:40;a:2:{s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:17:"<string-plus-csv>";s:8:"function";s:14:"reduce_rule_28";}s:26:"<square-parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:17:"<string-plus-csv>";s:8:"function";s:14:"reduce_rule_28";}}i:41;a:5:{s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_6";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_6";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_6";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_6";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_6";}}i:42;a:5:{s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:13:"reduce_rule_9";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:13:"reduce_rule_9";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:13:"reduce_rule_9";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:13:"reduce_rule_9";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:13:"reduce_rule_9";}}i:43;a:4:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:6:"$tests";i:2;s:0:"";}s:15:"leftNonTerminal";s:11:"<test-list>";s:8:"function";s:14:"reduce_rule_20";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:6:"$tests";i:2;s:0:"";}s:15:"leftNonTerminal";s:11:"<test-list>";s:8:"function";s:14:"reduce_rule_20";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:6:"$tests";i:2;s:0:"";}s:15:"leftNonTerminal";s:11:"<test-list>";s:8:"function";s:14:"reduce_rule_20";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:6:"$tests";i:2;s:0:"";}s:15:"leftNonTerminal";s:11:"<test-list>";s:8:"function";s:14:"reduce_rule_20";}}i:45;a:11:{s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_26";}s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_26";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_26";}s:18:"<parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_26";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_26";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_26";}s:8:"<number>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_26";}s:5:"<tag>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_26";}s:25:"<square-parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_26";}s:15:"<quoted-string>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_26";}s:12:"<multi-line>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_26";}}i:47;a:1:{s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:5:"$test";i:1;s:0:"";i:2;s:4:"$acc";}s:15:"leftNonTerminal";s:15:"<test-plus-csv>";s:8:"function";s:14:"reduce_rule_22";}}i:48;a:2:{s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:4:"$acc";i:1;s:0:"";i:2;s:4:"$str";}s:15:"leftNonTerminal";s:17:"<string-plus-csv>";s:8:"function";s:14:"reduce_rule_29";}s:26:"<square-parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:4:"$acc";i:1;s:0:"";i:2;s:4:"$str";}s:15:"leftNonTerminal";s:17:"<string-plus-csv>";s:8:"function";s:14:"reduce_rule_29";}}}');
    }
    /* }}} */
    /* reduce_rule_2 {{{ */
    /**
     * Reduction function for rule 2 
     *
     * Rule 2 is:
     * <commands>-><commented-command>
     *
     * @param Text_Tokenizer_Token Token of type '<commented-command>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<commands>' token
     */
    protected function reduce_rule_2($cmd = null)
    {
            if (!isset($acc)) $acc = new \sergiosgc\Text_Tokenizer_Token('<commands>', []);
        array_push($acc->getValue(), $cmd->getValue());
        return $acc;
        return new \sergiosgc\Text_Tokenizer_Token('<commands>', $result);
    }
    /* }}} */
    /* reduce_rule_4 {{{ */
    /**
     * Reduction function for rule 4 
     *
     * Rule 4 is:
     * <commented-command>-><command>
     *
     * @param Text_Tokenizer_Token Token of type '<command>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<commented-command>' token
     */
    protected function reduce_rule_4($command = null)
    {
            if (!isset($comment)) $comment = new \sergiosgc\Text_Tokenizer_Token('<comment>', null);
        $command->getValue()->comment = $comment->getValue();
        return new \sergiosgc\Text_Tokenizer_Token('<commented-command>', $command->getValue());
        return new \sergiosgc\Text_Tokenizer_Token('<commented-command>', $result);
    }
    /* }}} */
    /* reduce_rule_33 {{{ */
    /**
     * Reduction function for rule 33 
     *
     * Rule 33 is:
     * <comment>-><single-comment>
     *
     * @param Text_Tokenizer_Token Token of type '<single-comment>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<comment>' token
     */
    protected function reduce_rule_33($singleComment = null)
    {
            if (isset($comment)) {
            $comment->getValue()->text .= $singleComment->getValue();
            return $comment;
        }
        return new \sergiosgc\Text_Tokenizer_Token(
            '<comment>',
            new \sergiosgc\Sieve_Parser\Script_Comment($singleComment->getValue()));
        return new \sergiosgc\Text_Tokenizer_Token('<comment>', $result);
    }
    /* }}} */
    /* reduce_rule_34 {{{ */
    /**
     * Reduction function for rule 34 
     *
     * Rule 34 is:
     * <single-comment>-><hash-comment>
     *
     * @param Text_Tokenizer_Token Token of type '<hash-comment>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<single-comment>' token
     */
    protected function reduce_rule_34($comment = null)
    {
            return new \sergiosgc\Text_Tokenizer_Token(
            '<single-comment>',
            new \sergiosgc\Sieve_Parser\Script_Comment($comment->getValue()));
        return new \sergiosgc\Text_Tokenizer_Token('<single-comment>', $result);
    }
    /* }}} */
    /* reduce_rule_35 {{{ */
    /**
     * Reduction function for rule 35 
     *
     * Rule 35 is:
     * <single-comment>-><bracket-comment>
     *
     * @param Text_Tokenizer_Token Token of type '<bracket-comment>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<single-comment>' token
     */
    protected function reduce_rule_35($comment = null)
    {
            return new \sergiosgc\Text_Tokenizer_Token(
            '<single-comment>',
            new \sergiosgc\Sieve_Parser\Script_Comment($comment->getValue()));
        return new \sergiosgc\Text_Tokenizer_Token('<single-comment>', $result);
    }
    /* }}} */
    /* reduce_rule_1 {{{ */
    /**
     * Reduction function for rule 1 
     *
     * Rule 1 is:
     * <commands>-><commands><commented-command>
     *
     * @param Text_Tokenizer_Token Token of type '<commands>'
     * @param Text_Tokenizer_Token Token of type '<commented-command>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<commands>' token
     */
    protected function reduce_rule_1($acc = null,$cmd = null)
    {
            if (!isset($acc)) $acc = new \sergiosgc\Text_Tokenizer_Token('<commands>', []);
        array_push($acc->getValue(), $cmd->getValue());
        return $acc;
        return new \sergiosgc\Text_Tokenizer_Token('<commands>', $result);
    }
    /* }}} */
    /* reduce_rule_3 {{{ */
    /**
     * Reduction function for rule 3 
     *
     * Rule 3 is:
     * <commented-command>-><comment><command>
     *
     * @param Text_Tokenizer_Token Token of type '<comment>'
     * @param Text_Tokenizer_Token Token of type '<command>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<commented-command>' token
     */
    protected function reduce_rule_3($comment = null,$command = null)
    {
            if (!isset($comment)) $comment = new \sergiosgc\Text_Tokenizer_Token('<comment>', null);
        $command->getValue()->comment = $comment->getValue();
        return new \sergiosgc\Text_Tokenizer_Token('<commented-command>', $command->getValue());
        return new \sergiosgc\Text_Tokenizer_Token('<commented-command>', $result);
    }
    /* }}} */
    /* reduce_rule_32 {{{ */
    /**
     * Reduction function for rule 32 
     *
     * Rule 32 is:
     * <comment>-><comment><single-comment>
     *
     * @param Text_Tokenizer_Token Token of type '<comment>'
     * @param Text_Tokenizer_Token Token of type '<single-comment>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<comment>' token
     */
    protected function reduce_rule_32($comment = null,$singleComment = null)
    {
            if (isset($comment)) {
            $comment->getValue()->text .= $singleComment->getValue();
            return $comment;
        }
        return new \sergiosgc\Text_Tokenizer_Token(
            '<comment>',
            new \sergiosgc\Sieve_Parser\Script_Comment($singleComment->getValue()));
        return new \sergiosgc\Text_Tokenizer_Token('<comment>', $result);
    }
    /* }}} */
    /* reduce_rule_7 {{{ */
    /**
     * Reduction function for rule 7 
     *
     * Rule 7 is:
     * <command>-><identifier><semicolon>
     *
     * @param Text_Tokenizer_Token Token of type '<identifier>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
     */
    protected function reduce_rule_7($id = null)
    {
            if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments>', [ 'arguments' => [], 'tests' => [] ]);
        if (!isset($block)) $block = new \sergiosgc\Text_Tokenizer_Token('<block>', []);
        return new \sergiosgc\Text_Tokenizer_Token('<command>', 
            new \sergiosgc\Sieve_Parser\Script_Command(
                $id->getValue(),
                $args->getValue()['arguments'],
                $args->getValue()['tests'],
                $block->getValue()));
        return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
    }
    /* }}} */
    /* reduce_rule_11 {{{ */
    /**
     * Reduction function for rule 11 
     *
     * Rule 11 is:
     * <arguments>-><arguments-plus>
     *
     * @param Text_Tokenizer_Token Token of type '<arguments-plus>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<arguments>' token
     */
    protected function reduce_rule_11($args = null)
    {
            if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments-plus>', []);
        if (!isset($tests)) $tests = new \sergiosgc\Text_Tokenizer_Token('<test-list>', []);
        if (isset($test)) array_unshift($tests->getValue(), $test->getValue());
        return new \sergiosgc\Text_Tokenizer_Token('<arguments>', 
            [ 'arguments' => $args->getValue(), 'tests' => $tests->getValue() ]);
        return new \sergiosgc\Text_Tokenizer_Token('<arguments>', $result);
    }
    /* }}} */
    /* reduce_rule_14 {{{ */
    /**
     * Reduction function for rule 14 
     *
     * Rule 14 is:
     * <arguments>-><test>
     *
     * @param Text_Tokenizer_Token Token of type '<test>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<arguments>' token
     */
    protected function reduce_rule_14($test = null)
    {
            if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments-plus>', []);
        if (!isset($tests)) $tests = new \sergiosgc\Text_Tokenizer_Token('<test-list>', []);
        if (isset($test)) array_unshift($tests->getValue(), $test->getValue());
        return new \sergiosgc\Text_Tokenizer_Token('<arguments>', 
            [ 'arguments' => $args->getValue(), 'tests' => $tests->getValue() ]);
        return new \sergiosgc\Text_Tokenizer_Token('<arguments>', $result);
    }
    /* }}} */
    /* reduce_rule_15 {{{ */
    /**
     * Reduction function for rule 15 
     *
     * Rule 15 is:
     * <arguments>-><test-list>
     *
     * @param Text_Tokenizer_Token Token of type '<test-list>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<arguments>' token
     */
    protected function reduce_rule_15($tests = null)
    {
            if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments-plus>', []);
        if (!isset($tests)) $tests = new \sergiosgc\Text_Tokenizer_Token('<test-list>', []);
        if (isset($test)) array_unshift($tests->getValue(), $test->getValue());
        return new \sergiosgc\Text_Tokenizer_Token('<arguments>', 
            [ 'arguments' => $args->getValue(), 'tests' => $tests->getValue() ]);
        return new \sergiosgc\Text_Tokenizer_Token('<arguments>', $result);
    }
    /* }}} */
    /* reduce_rule_17 {{{ */
    /**
     * Reduction function for rule 17 
     *
     * Rule 17 is:
     * <arguments-plus>-><argument>
     *
     * @param Text_Tokenizer_Token Token of type '<argument>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<arguments-plus>' token
     */
    protected function reduce_rule_17($arg = null)
    {
            if (!isset($acc)) $acc = new \sergiosgc\Text_Tokenizer_Token('<arguments-plus>', []);
        array_push($acc->getValue(), $arg->getValue());
        return $acc;
        return new \sergiosgc\Text_Tokenizer_Token('<arguments-plus>', $result);
    }
    /* }}} */
    /* reduce_rule_19 {{{ */
    /**
     * Reduction function for rule 19 
     *
     * Rule 19 is:
     * <test>-><identifier>
     *
     * @param Text_Tokenizer_Token Token of type '<identifier>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<test>' token
     */
    protected function reduce_rule_19($id = null)
    {
            if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments>', []);
        return new \sergiosgc\Sieve_Parser\Script_Test($id->getValue(), $args->getValue());
        return new \sergiosgc\Text_Tokenizer_Token('<test>', $result);
    }
    /* }}} */
    /* reduce_rule_23 {{{ */
    /**
     * Reduction function for rule 23 
     *
     * Rule 23 is:
     * <argument>-><string-list>
     *
     * @param Text_Tokenizer_Token Token of type '<string-list>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<argument>' token
     */
    protected function reduce_rule_23($arg = null)
    {
            if (isset($tag)) return new \sergiosgc\Text_Tokenizer_Token('<argument>', new \sergiosgc\Sieve_Parser\Script_Tag($tag->getValue()));
        return new \sergiosgc\Text_Tokenizer_Token('<argument>', $arg->getValue());
        return new \sergiosgc\Text_Tokenizer_Token('<argument>', $result);
    }
    /* }}} */
    /* reduce_rule_24 {{{ */
    /**
     * Reduction function for rule 24 
     *
     * Rule 24 is:
     * <argument>-><number>
     *
     * @param Text_Tokenizer_Token Token of type '<number>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<argument>' token
     */
    protected function reduce_rule_24($arg = null)
    {
            if (isset($tag)) return new \sergiosgc\Text_Tokenizer_Token('<argument>', new \sergiosgc\Sieve_Parser\Script_Tag($tag->getValue()));
        return new \sergiosgc\Text_Tokenizer_Token('<argument>', $arg->getValue());
        return new \sergiosgc\Text_Tokenizer_Token('<argument>', $result);
    }
    /* }}} */
    /* reduce_rule_25 {{{ */
    /**
     * Reduction function for rule 25 
     *
     * Rule 25 is:
     * <argument>-><tag>
     *
     * @param Text_Tokenizer_Token Token of type '<tag>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<argument>' token
     */
    protected function reduce_rule_25($tag = null)
    {
            if (isset($tag)) return new \sergiosgc\Text_Tokenizer_Token('<argument>', new \sergiosgc\Sieve_Parser\Script_Tag($tag->getValue()));
        return new \sergiosgc\Text_Tokenizer_Token('<argument>', $arg->getValue());
        return new \sergiosgc\Text_Tokenizer_Token('<argument>', $result);
    }
    /* }}} */
    /* reduce_rule_27 {{{ */
    /**
     * Reduction function for rule 27 
     *
     * Rule 27 is:
     * <string-list>-><string>
     *
     * @param Text_Tokenizer_Token Token of type '<string>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<string-list>' token
     */
    protected function reduce_rule_27($str = null)
    {
            if (isset($str)) return new \sergiosgc\Text_Tokenizer_Token('<string-list>', [ $str->getValue() ]);
        return new \sergiosgc\Text_Tokenizer_Token('<string-list>', $strArr->getValue());
        return new \sergiosgc\Text_Tokenizer_Token('<string-list>', $result);
    }
    /* }}} */
    /* reduce_rule_30 {{{ */
    /**
     * Reduction function for rule 30 
     *
     * Rule 30 is:
     * <string>-><quoted-string>
     *
     * @param Text_Tokenizer_Token Token of type '<quoted-string>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<string>' token
     */
    protected function reduce_rule_30($quoted = null)
    {
            return new \sergiosgc\Text_Tokenizer_Token(
            '<string>',
            isset($quoted) ?
                strtr($quoted->getValue(), [ '\\r' => "\r", '\\n' => "\n", '\\\\' => '\\' ]) : # Unquote string
                substr($multiline->getValue(), 0, -3) # Remove .CRLF marker
            );
        return new \sergiosgc\Text_Tokenizer_Token('<string>', $result);
    }
    /* }}} */
    /* reduce_rule_31 {{{ */
    /**
     * Reduction function for rule 31 
     *
     * Rule 31 is:
     * <string>-><multi-line>
     *
     * @param Text_Tokenizer_Token Token of type '<multi-line>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<string>' token
     */
    protected function reduce_rule_31($multiline = null)
    {
            return new \sergiosgc\Text_Tokenizer_Token(
            '<string>',
            isset($quoted) ?
                strtr($quoted->getValue(), [ '\\r' => "\r", '\\n' => "\n", '\\\\' => '\\' ]) : # Unquote string
                substr($multiline->getValue(), 0, -3) # Remove .CRLF marker
            );
        return new \sergiosgc\Text_Tokenizer_Token('<string>', $result);
    }
    /* }}} */
    /* reduce_rule_5 {{{ */
    /**
     * Reduction function for rule 5 
     *
     * Rule 5 is:
     * <command>-><identifier><arguments><semicolon>
     *
     * @param Text_Tokenizer_Token Token of type '<identifier>'
     * @param Text_Tokenizer_Token Token of type '<arguments>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
     */
    protected function reduce_rule_5($id = null,$args = null)
    {
            if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments>', [ 'arguments' => [], 'tests' => [] ]);
        if (!isset($block)) $block = new \sergiosgc\Text_Tokenizer_Token('<block>', []);
        return new \sergiosgc\Text_Tokenizer_Token('<command>', 
            new \sergiosgc\Sieve_Parser\Script_Command(
                $id->getValue(),
                $args->getValue()['arguments'],
                $args->getValue()['tests'],
                $block->getValue()));
        return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
    }
    /* }}} */
    /* reduce_rule_8 {{{ */
    /**
     * Reduction function for rule 8 
     *
     * Rule 8 is:
     * <command>-><identifier><bracket-open><block>
     *
     * @param Text_Tokenizer_Token Token of type '<identifier>'
     * @param Text_Tokenizer_Token Token of type '<block>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
     */
    protected function reduce_rule_8($id = null,$block = null)
    {
            if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments>', [ 'arguments' => [], 'tests' => [] ]);
        if (!isset($block)) $block = new \sergiosgc\Text_Tokenizer_Token('<block>', []);
        return new \sergiosgc\Text_Tokenizer_Token('<command>', 
            new \sergiosgc\Sieve_Parser\Script_Command(
                $id->getValue(),
                $args->getValue()['arguments'],
                $args->getValue()['tests'],
                $block->getValue()));
        return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
    }
    /* }}} */
    /* reduce_rule_10 {{{ */
    /**
     * Reduction function for rule 10 
     *
     * Rule 10 is:
     * <block>-><bracket-close>
     *
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<block>' token
     */
    protected function reduce_rule_10()
    {
            if (!isset($acc)) $acc = new \sergiosgc\Text_Tokenizer_Token('<block>', []);
        if (isset($command)) array_unshift($acc->getValue(), $command->getValue());
        return $acc;
        return new \sergiosgc\Text_Tokenizer_Token('<block>', $result);
    }
    /* }}} */
    /* reduce_rule_12 {{{ */
    /**
     * Reduction function for rule 12 
     *
     * Rule 12 is:
     * <arguments>-><arguments-plus><test>
     *
     * @param Text_Tokenizer_Token Token of type '<arguments-plus>'
     * @param Text_Tokenizer_Token Token of type '<test>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<arguments>' token
     */
    protected function reduce_rule_12($args = null,$test = null)
    {
            if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments-plus>', []);
        if (!isset($tests)) $tests = new \sergiosgc\Text_Tokenizer_Token('<test-list>', []);
        if (isset($test)) array_unshift($tests->getValue(), $test->getValue());
        return new \sergiosgc\Text_Tokenizer_Token('<arguments>', 
            [ 'arguments' => $args->getValue(), 'tests' => $tests->getValue() ]);
        return new \sergiosgc\Text_Tokenizer_Token('<arguments>', $result);
    }
    /* }}} */
    /* reduce_rule_13 {{{ */
    /**
     * Reduction function for rule 13 
     *
     * Rule 13 is:
     * <arguments>-><arguments-plus><test-list>
     *
     * @param Text_Tokenizer_Token Token of type '<arguments-plus>'
     * @param Text_Tokenizer_Token Token of type '<test-list>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<arguments>' token
     */
    protected function reduce_rule_13($args = null,$tests = null)
    {
            if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments-plus>', []);
        if (!isset($tests)) $tests = new \sergiosgc\Text_Tokenizer_Token('<test-list>', []);
        if (isset($test)) array_unshift($tests->getValue(), $test->getValue());
        return new \sergiosgc\Text_Tokenizer_Token('<arguments>', 
            [ 'arguments' => $args->getValue(), 'tests' => $tests->getValue() ]);
        return new \sergiosgc\Text_Tokenizer_Token('<arguments>', $result);
    }
    /* }}} */
    /* reduce_rule_16 {{{ */
    /**
     * Reduction function for rule 16 
     *
     * Rule 16 is:
     * <arguments-plus>-><arguments-plus><argument>
     *
     * @param Text_Tokenizer_Token Token of type '<arguments-plus>'
     * @param Text_Tokenizer_Token Token of type '<argument>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<arguments-plus>' token
     */
    protected function reduce_rule_16($acc = null,$arg = null)
    {
            if (!isset($acc)) $acc = new \sergiosgc\Text_Tokenizer_Token('<arguments-plus>', []);
        array_push($acc->getValue(), $arg->getValue());
        return $acc;
        return new \sergiosgc\Text_Tokenizer_Token('<arguments-plus>', $result);
    }
    /* }}} */
    /* reduce_rule_18 {{{ */
    /**
     * Reduction function for rule 18 
     *
     * Rule 18 is:
     * <test>-><identifier><arguments>
     *
     * @param Text_Tokenizer_Token Token of type '<identifier>'
     * @param Text_Tokenizer_Token Token of type '<arguments>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<test>' token
     */
    protected function reduce_rule_18($id = null,$args = null)
    {
            if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments>', []);
        return new \sergiosgc\Sieve_Parser\Script_Test($id->getValue(), $args->getValue());
        return new \sergiosgc\Text_Tokenizer_Token('<test>', $result);
    }
    /* }}} */
    /* reduce_rule_21 {{{ */
    /**
     * Reduction function for rule 21 
     *
     * Rule 21 is:
     * <test-plus-csv>-><test>
     *
     * @param Text_Tokenizer_Token Token of type '<test>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<test-plus-csv>' token
     */
    protected function reduce_rule_21($test = null)
    {
            if (!isset($acc)) $acc = new \sergiosgc\Text_Tokenizer_Token('<test-plus-csv>', []);
        array_unshift($acc->getValue(), $test->getValue());
        return $acc;
        return new \sergiosgc\Text_Tokenizer_Token('<test-plus-csv>', $result);
    }
    /* }}} */
    /* reduce_rule_28 {{{ */
    /**
     * Reduction function for rule 28 
     *
     * Rule 28 is:
     * <string-plus-csv>-><string>
     *
     * @param Text_Tokenizer_Token Token of type '<string>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<string-plus-csv>' token
     */
    protected function reduce_rule_28($str = null)
    {
            if (!isset($acc)) $acc = new \sergiosgc\Text_Tokenizer_Token('<string-plus-csv>', []);
        array_unshift($acc->getValue(), $str->getValue());
        return $acc;
        return new \sergiosgc\Text_Tokenizer_Token('<string-plus-csv>', $result);
    }
    /* }}} */
    /* reduce_rule_6 {{{ */
    /**
     * Reduction function for rule 6 
     *
     * Rule 6 is:
     * <command>-><identifier><arguments><bracket-open><block>
     *
     * @param Text_Tokenizer_Token Token of type '<identifier>'
     * @param Text_Tokenizer_Token Token of type '<arguments>'
     * @param Text_Tokenizer_Token Token of type '<block>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
     */
    protected function reduce_rule_6($id = null,$args = null,$block = null)
    {
            if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments>', [ 'arguments' => [], 'tests' => [] ]);
        if (!isset($block)) $block = new \sergiosgc\Text_Tokenizer_Token('<block>', []);
        return new \sergiosgc\Text_Tokenizer_Token('<command>', 
            new \sergiosgc\Sieve_Parser\Script_Command(
                $id->getValue(),
                $args->getValue()['arguments'],
                $args->getValue()['tests'],
                $block->getValue()));
        return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
    }
    /* }}} */
    /* reduce_rule_9 {{{ */
    /**
     * Reduction function for rule 9 
     *
     * Rule 9 is:
     * <block>-><command><block>
     *
     * @param Text_Tokenizer_Token Token of type '<command>'
     * @param Text_Tokenizer_Token Token of type '<block>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<block>' token
     */
    protected function reduce_rule_9($command = null,$acc = null)
    {
            if (!isset($acc)) $acc = new \sergiosgc\Text_Tokenizer_Token('<block>', []);
        if (isset($command)) array_unshift($acc->getValue(), $command->getValue());
        return $acc;
        return new \sergiosgc\Text_Tokenizer_Token('<block>', $result);
    }
    /* }}} */
    /* reduce_rule_20 {{{ */
    /**
     * Reduction function for rule 20 
     *
     * Rule 20 is:
     * <test-list>-><parenthesis-open><test-plus-csv><parenthesis-close>
     *
     * @param Text_Tokenizer_Token Token of type '<test-plus-csv>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<test-list>' token
     */
    protected function reduce_rule_20($tests = null)
    {
            return new \sergiosgc\Text_Tokenizer_Token('<test-list>', $tests->getValue());
        return new \sergiosgc\Text_Tokenizer_Token('<test-list>', $result);
    }
    /* }}} */
    /* reduce_rule_26 {{{ */
    /**
     * Reduction function for rule 26 
     *
     * Rule 26 is:
     * <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close>
     *
     * @param Text_Tokenizer_Token Token of type '<string-plus-csv>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<string-list>' token
     */
    protected function reduce_rule_26($strArr = null)
    {
            if (isset($str)) return new \sergiosgc\Text_Tokenizer_Token('<string-list>', [ $str->getValue() ]);
        return new \sergiosgc\Text_Tokenizer_Token('<string-list>', $strArr->getValue());
        return new \sergiosgc\Text_Tokenizer_Token('<string-list>', $result);
    }
    /* }}} */
    /* reduce_rule_22 {{{ */
    /**
     * Reduction function for rule 22 
     *
     * Rule 22 is:
     * <test-plus-csv>-><test><comma><test-plus-csv>
     *
     * @param Text_Tokenizer_Token Token of type '<test>'
     * @param Text_Tokenizer_Token Token of type '<test-plus-csv>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<test-plus-csv>' token
     */
    protected function reduce_rule_22($test = null,$acc = null)
    {
            if (!isset($acc)) $acc = new \sergiosgc\Text_Tokenizer_Token('<test-plus-csv>', []);
        array_unshift($acc->getValue(), $test->getValue());
        return $acc;
        return new \sergiosgc\Text_Tokenizer_Token('<test-plus-csv>', $result);
    }
    /* }}} */
    /* reduce_rule_29 {{{ */
    /**
     * Reduction function for rule 29 
     *
     * Rule 29 is:
     * <string-plus-csv>-><string-plus-csv><comma><string>
     *
     * @param Text_Tokenizer_Token Token of type '<string-plus-csv>'
     * @param Text_Tokenizer_Token Token of type '<string>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<string-plus-csv>' token
     */
    protected function reduce_rule_29($acc = null,$str = null)
    {
            if (!isset($acc)) $acc = new \sergiosgc\Text_Tokenizer_Token('<string-plus-csv>', []);
        array_unshift($acc->getValue(), $str->getValue());
        return $acc;
        return new \sergiosgc\Text_Tokenizer_Token('<string-plus-csv>', $result);
    }
    /* }}} */
}
?>