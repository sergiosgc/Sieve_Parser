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
 * [5] <command>-><identifier-stop><semicolon>
 * [6] <command>-><identifier-notify><string><semicolon>
 * [7] <command>-><identifier-fileinto><string><semicolon>
 * [8] <command>-><identifier-redirect><string><semicolon>
 * [9] <command>-><identifier-keep><semicolon>
 * [10] <command>-><identifier-discard><semicolon>
 * [11] <command>-><identifier-require><string-list><semicolon>
 * [12] <command>-><identifier-if><test><bracket-open><block>
 * [13] <command>-><identifier-if><test><bracket-open><block><command-elsif>
 * [14] <command>-><identifier-if><test><bracket-open><block><command-else>
 * [15] <command-elsif>-><identifier-elsif><test><bracket-open><block>
 * [16] <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif>
 * [17] <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else>
 * [18] <command-else>-><identifier-else><bracket-open><block>
 * [19] <command>-><identifier><arguments><semicolon>
 * [20] <command>-><identifier><arguments><bracket-open><block>
 * [21] <command>-><identifier><semicolon>
 * [22] <command>-><identifier><bracket-open><block>
 * [23] <block>-><command><block>
 * [24] <block>-><bracket-close>
 * [25] <arguments>-><arguments-plus>
 * [26] <arguments>-><arguments-plus><test>
 * [27] <arguments>-><arguments-plus><test-list>
 * [28] <arguments>-><test>
 * [29] <arguments>-><test-list>
 * [30] <arguments-plus>-><arguments-plus><argument>
 * [31] <arguments-plus>-><argument>
 * [32] <test>-><identifier-not><test>
 * [33] <test>-><identifier><arguments>
 * [34] <test>-><identifier>
 * [35] <test-list>-><parenthesis-open><test-plus-csv><parenthesis-close>
 * [36] <test-plus-csv>-><test>
 * [37] <test-plus-csv>-><test-plus-csv><comma><test>
 * [38] <argument>-><string-list>
 * [39] <argument>-><number>
 * [40] <argument>-><tag>
 * [41] <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close>
 * [42] <string-list>-><string>
 * [43] <string-plus-csv>-><string>
 * [44] <string-plus-csv>-><string-plus-csv><comma><string>
 * [45] <string>-><quoted-string>
 * [46] <string>-><multi-line>
 * [47] <comment>-><comment><single-comment>
 * [48] <comment>-><single-comment>
 * [49] <single-comment>-><hash-comment>
 * [50] <single-comment>-><bracket-comment>
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
 *    +<command>->•<identifier-stop><semicolon>
 *    +<command>->•<identifier-notify><string><semicolon>
 *    +<command>->•<identifier-fileinto><string><semicolon>
 *    +<command>->•<identifier-redirect><string><semicolon>
 *    +<command>->•<identifier-keep><semicolon>
 *    +<command>->•<identifier-discard><semicolon>
 *    +<command>->•<identifier-require><string-list><semicolon>
 *    +<command>->•<identifier-if><test><bracket-open><block>
 *    +<command>->•<identifier-if><test><bracket-open><block><command-elsif>
 *    +<command>->•<identifier-if><test><bracket-open><block><command-else>
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
 *    Shift on <identifier-stop> to 6 because of <command>->•<identifier-stop><semicolon> Lookahead = 
 *    Shift on <identifier-notify> to 7 because of <command>->•<identifier-notify><string><semicolon> Lookahead = 
 *    Shift on <identifier-fileinto> to 8 because of <command>->•<identifier-fileinto><string><semicolon> Lookahead = 
 *    Shift on <identifier-redirect> to 9 because of <command>->•<identifier-redirect><string><semicolon> Lookahead = 
 *    Shift on <identifier-keep> to 10 because of <command>->•<identifier-keep><semicolon> Lookahead = 
 *    Shift on <identifier-discard> to 11 because of <command>->•<identifier-discard><semicolon> Lookahead = 
 *    Shift on <identifier-require> to 12 because of <command>->•<identifier-require><string-list><semicolon> Lookahead = 
 *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block> Lookahead = 
 *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block><command-else> Lookahead = 
 *    Shift on <identifier> to 14 because of <command>->•<identifier><arguments><semicolon> Lookahead = 
 *    Shift on <identifier> to 14 because of <command>->•<identifier><arguments><bracket-open><block> Lookahead = 
 *    Shift on <identifier> to 14 because of <command>->•<identifier><semicolon> Lookahead = 
 *    Shift on <identifier> to 14 because of <command>->•<identifier><bracket-open><block> Lookahead = 
 *    Shift on <hash-comment> to 15 because of <single-comment>->•<hash-comment> Lookahead = 
 *    Shift on <bracket-comment> to 16 because of <single-comment>->•<bracket-comment> Lookahead = 
 * ----------- 1 -----------
 *   --Itemset--
 *     <start>-><commands>•
 *     <commands>-><commands>•<commented-command>
 *    +<commented-command>->•<comment><command>
 *    +<commented-command>->•<command>
 *    +<comment>->•<comment><single-comment>
 *    +<comment>->•<single-comment>
 *    +<command>->•<identifier-stop><semicolon>
 *    +<command>->•<identifier-notify><string><semicolon>
 *    +<command>->•<identifier-fileinto><string><semicolon>
 *    +<command>->•<identifier-redirect><string><semicolon>
 *    +<command>->•<identifier-keep><semicolon>
 *    +<command>->•<identifier-discard><semicolon>
 *    +<command>->•<identifier-require><string-list><semicolon>
 *    +<command>->•<identifier-if><test><bracket-open><block>
 *    +<command>->•<identifier-if><test><bracket-open><block><command-elsif>
 *    +<command>->•<identifier-if><test><bracket-open><block><command-else>
 *    +<command>->•<identifier><arguments><semicolon>
 *    +<command>->•<identifier><arguments><bracket-open><block>
 *    +<command>->•<identifier><semicolon>
 *    +<command>->•<identifier><bracket-open><block>
 *    +<single-comment>->•<hash-comment>
 *    +<single-comment>->•<bracket-comment>
 *   --Transitions--
 *    Accept on  using <start>-><commands>
 *    Goto on <commented-command> to 17 because of <commands>-><commands>•<commented-command>
 *    Goto on <comment> to 3 because of <commented-command>->•<comment><command>
 *    Goto on <command> to 4 because of <commented-command>->•<command>
 *    Goto on <comment> to 3 because of <comment>->•<comment><single-comment>
 *    Goto on <single-comment> to 5 because of <comment>->•<single-comment>
 *    Shift on <identifier-stop> to 6 because of <command>->•<identifier-stop><semicolon> Lookahead = 
 *    Shift on <identifier-notify> to 7 because of <command>->•<identifier-notify><string><semicolon> Lookahead = 
 *    Shift on <identifier-fileinto> to 8 because of <command>->•<identifier-fileinto><string><semicolon> Lookahead = 
 *    Shift on <identifier-redirect> to 9 because of <command>->•<identifier-redirect><string><semicolon> Lookahead = 
 *    Shift on <identifier-keep> to 10 because of <command>->•<identifier-keep><semicolon> Lookahead = 
 *    Shift on <identifier-discard> to 11 because of <command>->•<identifier-discard><semicolon> Lookahead = 
 *    Shift on <identifier-require> to 12 because of <command>->•<identifier-require><string-list><semicolon> Lookahead = 
 *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block> Lookahead = 
 *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block><command-else> Lookahead = 
 *    Shift on <identifier> to 14 because of <command>->•<identifier><arguments><semicolon> Lookahead = 
 *    Shift on <identifier> to 14 because of <command>->•<identifier><arguments><bracket-open><block> Lookahead = 
 *    Shift on <identifier> to 14 because of <command>->•<identifier><semicolon> Lookahead = 
 *    Shift on <identifier> to 14 because of <command>->•<identifier><bracket-open><block> Lookahead = 
 *    Shift on <hash-comment> to 15 because of <single-comment>->•<hash-comment> Lookahead = 
 *    Shift on <bracket-comment> to 16 because of <single-comment>->•<bracket-comment> Lookahead = 
 * ----------- 2 -----------
 *   --Itemset--
 *     <commands>-><commented-command>•
 *   --Transitions--
 *    Reduce on <identifier-stop> using <commands>-><commented-command> Lookahead = 
 *    Reduce on <identifier-notify> using <commands>-><commented-command> Lookahead = 
 *    Reduce on <identifier-fileinto> using <commands>-><commented-command> Lookahead = 
 *    Reduce on <identifier-redirect> using <commands>-><commented-command> Lookahead = 
 *    Reduce on <identifier-keep> using <commands>-><commented-command> Lookahead = 
 *    Reduce on <identifier-discard> using <commands>-><commented-command> Lookahead = 
 *    Reduce on <identifier-require> using <commands>-><commented-command> Lookahead = 
 *    Reduce on <identifier-if> using <commands>-><commented-command> Lookahead = 
 *    Reduce on <identifier> using <commands>-><commented-command> Lookahead = 
 *    Reduce on <hash-comment> using <commands>-><commented-command> Lookahead = 
 *    Reduce on <bracket-comment> using <commands>-><commented-command> Lookahead = 
 *    Reduce on  using <commands>-><commented-command> Lookahead = 
 * ----------- 3 -----------
 *   --Itemset--
 *     <commented-command>-><comment>•<command>
 *     <comment>-><comment>•<single-comment>
 *    +<command>->•<identifier-stop><semicolon>
 *    +<command>->•<identifier-notify><string><semicolon>
 *    +<command>->•<identifier-fileinto><string><semicolon>
 *    +<command>->•<identifier-redirect><string><semicolon>
 *    +<command>->•<identifier-keep><semicolon>
 *    +<command>->•<identifier-discard><semicolon>
 *    +<command>->•<identifier-require><string-list><semicolon>
 *    +<command>->•<identifier-if><test><bracket-open><block>
 *    +<command>->•<identifier-if><test><bracket-open><block><command-elsif>
 *    +<command>->•<identifier-if><test><bracket-open><block><command-else>
 *    +<command>->•<identifier><arguments><semicolon>
 *    +<command>->•<identifier><arguments><bracket-open><block>
 *    +<command>->•<identifier><semicolon>
 *    +<command>->•<identifier><bracket-open><block>
 *    +<single-comment>->•<hash-comment>
 *    +<single-comment>->•<bracket-comment>
 *   --Transitions--
 *    Goto on <command> to 18 because of <commented-command>-><comment>•<command>
 *    Goto on <single-comment> to 19 because of <comment>-><comment>•<single-comment>
 *    Shift on <identifier-stop> to 6 because of <command>->•<identifier-stop><semicolon> Lookahead = 
 *    Shift on <identifier-notify> to 7 because of <command>->•<identifier-notify><string><semicolon> Lookahead = 
 *    Shift on <identifier-fileinto> to 8 because of <command>->•<identifier-fileinto><string><semicolon> Lookahead = 
 *    Shift on <identifier-redirect> to 9 because of <command>->•<identifier-redirect><string><semicolon> Lookahead = 
 *    Shift on <identifier-keep> to 10 because of <command>->•<identifier-keep><semicolon> Lookahead = 
 *    Shift on <identifier-discard> to 11 because of <command>->•<identifier-discard><semicolon> Lookahead = 
 *    Shift on <identifier-require> to 12 because of <command>->•<identifier-require><string-list><semicolon> Lookahead = 
 *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block> Lookahead = 
 *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block><command-else> Lookahead = 
 *    Shift on <identifier> to 14 because of <command>->•<identifier><arguments><semicolon> Lookahead = 
 *    Shift on <identifier> to 14 because of <command>->•<identifier><arguments><bracket-open><block> Lookahead = 
 *    Shift on <identifier> to 14 because of <command>->•<identifier><semicolon> Lookahead = 
 *    Shift on <identifier> to 14 because of <command>->•<identifier><bracket-open><block> Lookahead = 
 *    Shift on <hash-comment> to 15 because of <single-comment>->•<hash-comment> Lookahead = 
 *    Shift on <bracket-comment> to 16 because of <single-comment>->•<bracket-comment> Lookahead = 
 * ----------- 4 -----------
 *   --Itemset--
 *     <commented-command>-><command>•
 *   --Transitions--
 *    Reduce on <identifier-stop> using <commented-command>-><command> Lookahead = 
 *    Reduce on <identifier-notify> using <commented-command>-><command> Lookahead = 
 *    Reduce on <identifier-fileinto> using <commented-command>-><command> Lookahead = 
 *    Reduce on <identifier-redirect> using <commented-command>-><command> Lookahead = 
 *    Reduce on <identifier-keep> using <commented-command>-><command> Lookahead = 
 *    Reduce on <identifier-discard> using <commented-command>-><command> Lookahead = 
 *    Reduce on <identifier-require> using <commented-command>-><command> Lookahead = 
 *    Reduce on <identifier-if> using <commented-command>-><command> Lookahead = 
 *    Reduce on <identifier> using <commented-command>-><command> Lookahead = 
 *    Reduce on <hash-comment> using <commented-command>-><command> Lookahead = 
 *    Reduce on <bracket-comment> using <commented-command>-><command> Lookahead = 
 *    Reduce on  using <commented-command>-><command> Lookahead = 
 * ----------- 5 -----------
 *   --Itemset--
 *     <comment>-><single-comment>•
 *   --Transitions--
 *    Reduce on <identifier-stop> using <comment>-><single-comment> Lookahead = 
 *    Reduce on <identifier-notify> using <comment>-><single-comment> Lookahead = 
 *    Reduce on <identifier-fileinto> using <comment>-><single-comment> Lookahead = 
 *    Reduce on <identifier-redirect> using <comment>-><single-comment> Lookahead = 
 *    Reduce on <identifier-keep> using <comment>-><single-comment> Lookahead = 
 *    Reduce on <identifier-discard> using <comment>-><single-comment> Lookahead = 
 *    Reduce on <identifier-require> using <comment>-><single-comment> Lookahead = 
 *    Reduce on <identifier-if> using <comment>-><single-comment> Lookahead = 
 *    Reduce on <identifier> using <comment>-><single-comment> Lookahead = 
 *    Reduce on <hash-comment> using <comment>-><single-comment> Lookahead = 
 *    Reduce on <bracket-comment> using <comment>-><single-comment> Lookahead = 
 * ----------- 6 -----------
 *   --Itemset--
 *     <command>-><identifier-stop>•<semicolon>
 *   --Transitions--
 *    Shift on <semicolon> to 20 because of <command>-><identifier-stop>•<semicolon> Lookahead = 
 * ----------- 7 -----------
 *   --Itemset--
 *     <command>-><identifier-notify>•<string><semicolon>
 *    +<string>->•<quoted-string>
 *    +<string>->•<multi-line>
 *   --Transitions--
 *    Goto on <string> to 21 because of <command>-><identifier-notify>•<string><semicolon>
 *    Shift on <quoted-string> to 22 because of <string>->•<quoted-string> Lookahead = 
 *    Shift on <multi-line> to 23 because of <string>->•<multi-line> Lookahead = 
 * ----------- 8 -----------
 *   --Itemset--
 *     <command>-><identifier-fileinto>•<string><semicolon>
 *    +<string>->•<quoted-string>
 *    +<string>->•<multi-line>
 *   --Transitions--
 *    Goto on <string> to 24 because of <command>-><identifier-fileinto>•<string><semicolon>
 *    Shift on <quoted-string> to 22 because of <string>->•<quoted-string> Lookahead = 
 *    Shift on <multi-line> to 23 because of <string>->•<multi-line> Lookahead = 
 * ----------- 9 -----------
 *   --Itemset--
 *     <command>-><identifier-redirect>•<string><semicolon>
 *    +<string>->•<quoted-string>
 *    +<string>->•<multi-line>
 *   --Transitions--
 *    Goto on <string> to 25 because of <command>-><identifier-redirect>•<string><semicolon>
 *    Shift on <quoted-string> to 22 because of <string>->•<quoted-string> Lookahead = 
 *    Shift on <multi-line> to 23 because of <string>->•<multi-line> Lookahead = 
 * ----------- 10 -----------
 *   --Itemset--
 *     <command>-><identifier-keep>•<semicolon>
 *   --Transitions--
 *    Shift on <semicolon> to 26 because of <command>-><identifier-keep>•<semicolon> Lookahead = 
 * ----------- 11 -----------
 *   --Itemset--
 *     <command>-><identifier-discard>•<semicolon>
 *   --Transitions--
 *    Shift on <semicolon> to 27 because of <command>-><identifier-discard>•<semicolon> Lookahead = 
 * ----------- 12 -----------
 *   --Itemset--
 *     <command>-><identifier-require>•<string-list><semicolon>
 *    +<string-list>->•<square-parenthesis-open><string-plus-csv><square-parenthesis-close>
 *    +<string-list>->•<string>
 *    +<string>->•<quoted-string>
 *    +<string>->•<multi-line>
 *   --Transitions--
 *    Goto on <string-list> to 28 because of <command>-><identifier-require>•<string-list><semicolon>
 *    Shift on <square-parenthesis-open> to 29 because of <string-list>->•<square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 *    Goto on <string> to 30 because of <string-list>->•<string>
 *    Shift on <quoted-string> to 22 because of <string>->•<quoted-string> Lookahead = 
 *    Shift on <multi-line> to 23 because of <string>->•<multi-line> Lookahead = 
 * ----------- 13 -----------
 *   --Itemset--
 *     <command>-><identifier-if>•<test><bracket-open><block>
 *     <command>-><identifier-if>•<test><bracket-open><block><command-elsif>
 *     <command>-><identifier-if>•<test><bracket-open><block><command-else>
 *    +<test>->•<identifier-not><test>
 *    +<test>->•<identifier><arguments>
 *    +<test>->•<identifier>
 *   --Transitions--
 *    Goto on <test> to 31 because of <command>-><identifier-if>•<test><bracket-open><block>
 *    Goto on <test> to 31 because of <command>-><identifier-if>•<test><bracket-open><block><command-elsif>
 *    Goto on <test> to 31 because of <command>-><identifier-if>•<test><bracket-open><block><command-else>
 *    Shift on <identifier-not> to 32 because of <test>->•<identifier-not><test> Lookahead = 
 *    Shift on <identifier> to 33 because of <test>->•<identifier><arguments> Lookahead = 
 *    Shift on <identifier> to 33 because of <test>->•<identifier> Lookahead = 
 * ----------- 14 -----------
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
 *    +<test>->•<identifier-not><test>
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
 *    Goto on <arguments> to 34 because of <command>-><identifier>•<arguments><semicolon>
 *    Goto on <arguments> to 34 because of <command>-><identifier>•<arguments><bracket-open><block>
 *    Shift on <semicolon> to 35 because of <command>-><identifier>•<semicolon> Lookahead = 
 *    Shift on <bracket-open> to 36 because of <command>-><identifier>•<bracket-open><block> Lookahead = 
 *    Goto on <arguments-plus> to 37 because of <arguments>->•<arguments-plus>
 *    Goto on <arguments-plus> to 37 because of <arguments>->•<arguments-plus><test>
 *    Goto on <arguments-plus> to 37 because of <arguments>->•<arguments-plus><test-list>
 *    Goto on <test> to 38 because of <arguments>->•<test>
 *    Goto on <test-list> to 39 because of <arguments>->•<test-list>
 *    Goto on <arguments-plus> to 37 because of <arguments-plus>->•<arguments-plus><argument>
 *    Goto on <argument> to 40 because of <arguments-plus>->•<argument>
 *    Shift on <identifier-not> to 32 because of <test>->•<identifier-not><test> Lookahead = 
 *    Shift on <identifier> to 33 because of <test>->•<identifier><arguments> Lookahead = 
 *    Shift on <identifier> to 33 because of <test>->•<identifier> Lookahead = 
 *    Shift on <parenthesis-open> to 41 because of <test-list>->•<parenthesis-open><test-plus-csv><parenthesis-close> Lookahead = 
 *    Goto on <string-list> to 42 because of <argument>->•<string-list>
 *    Shift on <number> to 43 because of <argument>->•<number> Lookahead = 
 *    Shift on <tag> to 44 because of <argument>->•<tag> Lookahead = 
 *    Shift on <square-parenthesis-open> to 29 because of <string-list>->•<square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 *    Goto on <string> to 30 because of <string-list>->•<string>
 *    Shift on <quoted-string> to 22 because of <string>->•<quoted-string> Lookahead = 
 *    Shift on <multi-line> to 23 because of <string>->•<multi-line> Lookahead = 
 * ----------- 15 -----------
 *   --Itemset--
 *     <single-comment>-><hash-comment>•
 *   --Transitions--
 *    Reduce on <identifier-stop> using <single-comment>-><hash-comment> Lookahead = 
 *    Reduce on <identifier-notify> using <single-comment>-><hash-comment> Lookahead = 
 *    Reduce on <identifier-fileinto> using <single-comment>-><hash-comment> Lookahead = 
 *    Reduce on <identifier-redirect> using <single-comment>-><hash-comment> Lookahead = 
 *    Reduce on <identifier-keep> using <single-comment>-><hash-comment> Lookahead = 
 *    Reduce on <identifier-discard> using <single-comment>-><hash-comment> Lookahead = 
 *    Reduce on <identifier-require> using <single-comment>-><hash-comment> Lookahead = 
 *    Reduce on <identifier-if> using <single-comment>-><hash-comment> Lookahead = 
 *    Reduce on <identifier> using <single-comment>-><hash-comment> Lookahead = 
 *    Reduce on <hash-comment> using <single-comment>-><hash-comment> Lookahead = 
 *    Reduce on <bracket-comment> using <single-comment>-><hash-comment> Lookahead = 
 * ----------- 16 -----------
 *   --Itemset--
 *     <single-comment>-><bracket-comment>•
 *   --Transitions--
 *    Reduce on <identifier-stop> using <single-comment>-><bracket-comment> Lookahead = 
 *    Reduce on <identifier-notify> using <single-comment>-><bracket-comment> Lookahead = 
 *    Reduce on <identifier-fileinto> using <single-comment>-><bracket-comment> Lookahead = 
 *    Reduce on <identifier-redirect> using <single-comment>-><bracket-comment> Lookahead = 
 *    Reduce on <identifier-keep> using <single-comment>-><bracket-comment> Lookahead = 
 *    Reduce on <identifier-discard> using <single-comment>-><bracket-comment> Lookahead = 
 *    Reduce on <identifier-require> using <single-comment>-><bracket-comment> Lookahead = 
 *    Reduce on <identifier-if> using <single-comment>-><bracket-comment> Lookahead = 
 *    Reduce on <identifier> using <single-comment>-><bracket-comment> Lookahead = 
 *    Reduce on <hash-comment> using <single-comment>-><bracket-comment> Lookahead = 
 *    Reduce on <bracket-comment> using <single-comment>-><bracket-comment> Lookahead = 
 * ----------- 17 -----------
 *   --Itemset--
 *     <commands>-><commands><commented-command>•
 *   --Transitions--
 *    Reduce on <identifier-stop> using <commands>-><commands><commented-command> Lookahead = 
 *    Reduce on <identifier-notify> using <commands>-><commands><commented-command> Lookahead = 
 *    Reduce on <identifier-fileinto> using <commands>-><commands><commented-command> Lookahead = 
 *    Reduce on <identifier-redirect> using <commands>-><commands><commented-command> Lookahead = 
 *    Reduce on <identifier-keep> using <commands>-><commands><commented-command> Lookahead = 
 *    Reduce on <identifier-discard> using <commands>-><commands><commented-command> Lookahead = 
 *    Reduce on <identifier-require> using <commands>-><commands><commented-command> Lookahead = 
 *    Reduce on <identifier-if> using <commands>-><commands><commented-command> Lookahead = 
 *    Reduce on <identifier> using <commands>-><commands><commented-command> Lookahead = 
 *    Reduce on <hash-comment> using <commands>-><commands><commented-command> Lookahead = 
 *    Reduce on <bracket-comment> using <commands>-><commands><commented-command> Lookahead = 
 *    Reduce on  using <commands>-><commands><commented-command> Lookahead = 
 * ----------- 18 -----------
 *   --Itemset--
 *     <commented-command>-><comment><command>•
 *   --Transitions--
 *    Reduce on <identifier-stop> using <commented-command>-><comment><command> Lookahead = 
 *    Reduce on <identifier-notify> using <commented-command>-><comment><command> Lookahead = 
 *    Reduce on <identifier-fileinto> using <commented-command>-><comment><command> Lookahead = 
 *    Reduce on <identifier-redirect> using <commented-command>-><comment><command> Lookahead = 
 *    Reduce on <identifier-keep> using <commented-command>-><comment><command> Lookahead = 
 *    Reduce on <identifier-discard> using <commented-command>-><comment><command> Lookahead = 
 *    Reduce on <identifier-require> using <commented-command>-><comment><command> Lookahead = 
 *    Reduce on <identifier-if> using <commented-command>-><comment><command> Lookahead = 
 *    Reduce on <identifier> using <commented-command>-><comment><command> Lookahead = 
 *    Reduce on <hash-comment> using <commented-command>-><comment><command> Lookahead = 
 *    Reduce on <bracket-comment> using <commented-command>-><comment><command> Lookahead = 
 *    Reduce on  using <commented-command>-><comment><command> Lookahead = 
 * ----------- 19 -----------
 *   --Itemset--
 *     <comment>-><comment><single-comment>•
 *   --Transitions--
 *    Reduce on <identifier-stop> using <comment>-><comment><single-comment> Lookahead = 
 *    Reduce on <identifier-notify> using <comment>-><comment><single-comment> Lookahead = 
 *    Reduce on <identifier-fileinto> using <comment>-><comment><single-comment> Lookahead = 
 *    Reduce on <identifier-redirect> using <comment>-><comment><single-comment> Lookahead = 
 *    Reduce on <identifier-keep> using <comment>-><comment><single-comment> Lookahead = 
 *    Reduce on <identifier-discard> using <comment>-><comment><single-comment> Lookahead = 
 *    Reduce on <identifier-require> using <comment>-><comment><single-comment> Lookahead = 
 *    Reduce on <identifier-if> using <comment>-><comment><single-comment> Lookahead = 
 *    Reduce on <identifier> using <comment>-><comment><single-comment> Lookahead = 
 *    Reduce on <hash-comment> using <comment>-><comment><single-comment> Lookahead = 
 *    Reduce on <bracket-comment> using <comment>-><comment><single-comment> Lookahead = 
 * ----------- 20 -----------
 *   --Itemset--
 *     <command>-><identifier-stop><semicolon>•
 *   --Transitions--
 *    Reduce on <identifier-stop> using <command>-><identifier-stop><semicolon> Lookahead = 
 *    Reduce on <identifier-notify> using <command>-><identifier-stop><semicolon> Lookahead = 
 *    Reduce on <identifier-fileinto> using <command>-><identifier-stop><semicolon> Lookahead = 
 *    Reduce on <identifier-redirect> using <command>-><identifier-stop><semicolon> Lookahead = 
 *    Reduce on <identifier-keep> using <command>-><identifier-stop><semicolon> Lookahead = 
 *    Reduce on <identifier-discard> using <command>-><identifier-stop><semicolon> Lookahead = 
 *    Reduce on <identifier-require> using <command>-><identifier-stop><semicolon> Lookahead = 
 *    Reduce on <identifier-if> using <command>-><identifier-stop><semicolon> Lookahead = 
 *    Reduce on <identifier> using <command>-><identifier-stop><semicolon> Lookahead = 
 *    Reduce on <bracket-close> using <command>-><identifier-stop><semicolon> Lookahead = 
 *    Reduce on <hash-comment> using <command>-><identifier-stop><semicolon> Lookahead = 
 *    Reduce on <bracket-comment> using <command>-><identifier-stop><semicolon> Lookahead = 
 *    Reduce on  using <command>-><identifier-stop><semicolon> Lookahead = 
 * ----------- 21 -----------
 *   --Itemset--
 *     <command>-><identifier-notify><string>•<semicolon>
 *   --Transitions--
 *    Shift on <semicolon> to 45 because of <command>-><identifier-notify><string>•<semicolon> Lookahead = 
 * ----------- 22 -----------
 *   --Itemset--
 *     <string>-><quoted-string>•
 *   --Transitions--
 *    Reduce on <semicolon> using <string>-><quoted-string> Lookahead = 
 *    Reduce on <bracket-open> using <string>-><quoted-string> Lookahead = 
 *    Reduce on <identifier> using <string>-><quoted-string> Lookahead = 
 *    Reduce on <identifier-not> using <string>-><quoted-string> Lookahead = 
 *    Reduce on <parenthesis-open> using <string>-><quoted-string> Lookahead = 
 *    Reduce on <parenthesis-close> using <string>-><quoted-string> Lookahead = 
 *    Reduce on <comma> using <string>-><quoted-string> Lookahead = 
 *    Reduce on <number> using <string>-><quoted-string> Lookahead = 
 *    Reduce on <tag> using <string>-><quoted-string> Lookahead = 
 *    Reduce on <square-parenthesis-open> using <string>-><quoted-string> Lookahead = 
 *    Reduce on <square-parenthesis-close> using <string>-><quoted-string> Lookahead = 
 *    Reduce on <quoted-string> using <string>-><quoted-string> Lookahead = 
 *    Reduce on <multi-line> using <string>-><quoted-string> Lookahead = 
 * ----------- 23 -----------
 *   --Itemset--
 *     <string>-><multi-line>•
 *   --Transitions--
 *    Reduce on <semicolon> using <string>-><multi-line> Lookahead = 
 *    Reduce on <bracket-open> using <string>-><multi-line> Lookahead = 
 *    Reduce on <identifier> using <string>-><multi-line> Lookahead = 
 *    Reduce on <identifier-not> using <string>-><multi-line> Lookahead = 
 *    Reduce on <parenthesis-open> using <string>-><multi-line> Lookahead = 
 *    Reduce on <parenthesis-close> using <string>-><multi-line> Lookahead = 
 *    Reduce on <comma> using <string>-><multi-line> Lookahead = 
 *    Reduce on <number> using <string>-><multi-line> Lookahead = 
 *    Reduce on <tag> using <string>-><multi-line> Lookahead = 
 *    Reduce on <square-parenthesis-open> using <string>-><multi-line> Lookahead = 
 *    Reduce on <square-parenthesis-close> using <string>-><multi-line> Lookahead = 
 *    Reduce on <quoted-string> using <string>-><multi-line> Lookahead = 
 *    Reduce on <multi-line> using <string>-><multi-line> Lookahead = 
 * ----------- 24 -----------
 *   --Itemset--
 *     <command>-><identifier-fileinto><string>•<semicolon>
 *   --Transitions--
 *    Shift on <semicolon> to 46 because of <command>-><identifier-fileinto><string>•<semicolon> Lookahead = 
 * ----------- 25 -----------
 *   --Itemset--
 *     <command>-><identifier-redirect><string>•<semicolon>
 *   --Transitions--
 *    Shift on <semicolon> to 47 because of <command>-><identifier-redirect><string>•<semicolon> Lookahead = 
 * ----------- 26 -----------
 *   --Itemset--
 *     <command>-><identifier-keep><semicolon>•
 *   --Transitions--
 *    Reduce on <identifier-stop> using <command>-><identifier-keep><semicolon> Lookahead = 
 *    Reduce on <identifier-notify> using <command>-><identifier-keep><semicolon> Lookahead = 
 *    Reduce on <identifier-fileinto> using <command>-><identifier-keep><semicolon> Lookahead = 
 *    Reduce on <identifier-redirect> using <command>-><identifier-keep><semicolon> Lookahead = 
 *    Reduce on <identifier-keep> using <command>-><identifier-keep><semicolon> Lookahead = 
 *    Reduce on <identifier-discard> using <command>-><identifier-keep><semicolon> Lookahead = 
 *    Reduce on <identifier-require> using <command>-><identifier-keep><semicolon> Lookahead = 
 *    Reduce on <identifier-if> using <command>-><identifier-keep><semicolon> Lookahead = 
 *    Reduce on <identifier> using <command>-><identifier-keep><semicolon> Lookahead = 
 *    Reduce on <bracket-close> using <command>-><identifier-keep><semicolon> Lookahead = 
 *    Reduce on <hash-comment> using <command>-><identifier-keep><semicolon> Lookahead = 
 *    Reduce on <bracket-comment> using <command>-><identifier-keep><semicolon> Lookahead = 
 *    Reduce on  using <command>-><identifier-keep><semicolon> Lookahead = 
 * ----------- 27 -----------
 *   --Itemset--
 *     <command>-><identifier-discard><semicolon>•
 *   --Transitions--
 *    Reduce on <identifier-stop> using <command>-><identifier-discard><semicolon> Lookahead = 
 *    Reduce on <identifier-notify> using <command>-><identifier-discard><semicolon> Lookahead = 
 *    Reduce on <identifier-fileinto> using <command>-><identifier-discard><semicolon> Lookahead = 
 *    Reduce on <identifier-redirect> using <command>-><identifier-discard><semicolon> Lookahead = 
 *    Reduce on <identifier-keep> using <command>-><identifier-discard><semicolon> Lookahead = 
 *    Reduce on <identifier-discard> using <command>-><identifier-discard><semicolon> Lookahead = 
 *    Reduce on <identifier-require> using <command>-><identifier-discard><semicolon> Lookahead = 
 *    Reduce on <identifier-if> using <command>-><identifier-discard><semicolon> Lookahead = 
 *    Reduce on <identifier> using <command>-><identifier-discard><semicolon> Lookahead = 
 *    Reduce on <bracket-close> using <command>-><identifier-discard><semicolon> Lookahead = 
 *    Reduce on <hash-comment> using <command>-><identifier-discard><semicolon> Lookahead = 
 *    Reduce on <bracket-comment> using <command>-><identifier-discard><semicolon> Lookahead = 
 *    Reduce on  using <command>-><identifier-discard><semicolon> Lookahead = 
 * ----------- 28 -----------
 *   --Itemset--
 *     <command>-><identifier-require><string-list>•<semicolon>
 *   --Transitions--
 *    Shift on <semicolon> to 48 because of <command>-><identifier-require><string-list>•<semicolon> Lookahead = 
 * ----------- 29 -----------
 *   --Itemset--
 *     <string-list>-><square-parenthesis-open>•<string-plus-csv><square-parenthesis-close>
 *    +<string-plus-csv>->•<string>
 *    +<string-plus-csv>->•<string-plus-csv><comma><string>
 *    +<string>->•<quoted-string>
 *    +<string>->•<multi-line>
 *   --Transitions--
 *    Goto on <string-plus-csv> to 49 because of <string-list>-><square-parenthesis-open>•<string-plus-csv><square-parenthesis-close>
 *    Goto on <string> to 50 because of <string-plus-csv>->•<string>
 *    Goto on <string-plus-csv> to 49 because of <string-plus-csv>->•<string-plus-csv><comma><string>
 *    Shift on <quoted-string> to 22 because of <string>->•<quoted-string> Lookahead = 
 *    Shift on <multi-line> to 23 because of <string>->•<multi-line> Lookahead = 
 * ----------- 30 -----------
 *   --Itemset--
 *     <string-list>-><string>•
 *   --Transitions--
 *    Reduce on <semicolon> using <string-list>-><string> Lookahead = 
 *    Reduce on <bracket-open> using <string-list>-><string> Lookahead = 
 *    Reduce on <identifier> using <string-list>-><string> Lookahead = 
 *    Reduce on <identifier-not> using <string-list>-><string> Lookahead = 
 *    Reduce on <parenthesis-open> using <string-list>-><string> Lookahead = 
 *    Reduce on <parenthesis-close> using <string-list>-><string> Lookahead = 
 *    Reduce on <comma> using <string-list>-><string> Lookahead = 
 *    Reduce on <number> using <string-list>-><string> Lookahead = 
 *    Reduce on <tag> using <string-list>-><string> Lookahead = 
 *    Reduce on <square-parenthesis-open> using <string-list>-><string> Lookahead = 
 *    Reduce on <quoted-string> using <string-list>-><string> Lookahead = 
 *    Reduce on <multi-line> using <string-list>-><string> Lookahead = 
 * ----------- 31 -----------
 *   --Itemset--
 *     <command>-><identifier-if><test>•<bracket-open><block>
 *     <command>-><identifier-if><test>•<bracket-open><block><command-elsif>
 *     <command>-><identifier-if><test>•<bracket-open><block><command-else>
 *   --Transitions--
 *    Shift on <bracket-open> to 51 because of <command>-><identifier-if><test>•<bracket-open><block> Lookahead = 
 *    Shift on <bracket-open> to 51 because of <command>-><identifier-if><test>•<bracket-open><block><command-elsif> Lookahead = 
 *    Shift on <bracket-open> to 51 because of <command>-><identifier-if><test>•<bracket-open><block><command-else> Lookahead = 
 * ----------- 32 -----------
 *   --Itemset--
 *     <test>-><identifier-not>•<test>
 *    +<test>->•<identifier-not><test>
 *    +<test>->•<identifier><arguments>
 *    +<test>->•<identifier>
 *   --Transitions--
 *    Goto on <test> to 52 because of <test>-><identifier-not>•<test>
 *    Shift on <identifier-not> to 32 because of <test>->•<identifier-not><test> Lookahead = 
 *    Shift on <identifier> to 33 because of <test>->•<identifier><arguments> Lookahead = 
 *    Shift on <identifier> to 33 because of <test>->•<identifier> Lookahead = 
 * ----------- 33 -----------
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
 *    +<test>->•<identifier-not><test>
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
 *    Goto on <arguments> to 53 because of <test>-><identifier>•<arguments>
 *    Reduce on <semicolon> using <test>-><identifier> Lookahead = 
 *    Reduce on <bracket-open> using <test>-><identifier> Lookahead = 
 *    Reduce on <parenthesis-close> using <test>-><identifier> Lookahead = 
 *    Reduce on <comma> using <test>-><identifier> Lookahead = 
 *    Goto on <arguments-plus> to 37 because of <arguments>->•<arguments-plus>
 *    Goto on <arguments-plus> to 37 because of <arguments>->•<arguments-plus><test>
 *    Goto on <arguments-plus> to 37 because of <arguments>->•<arguments-plus><test-list>
 *    Goto on <test> to 38 because of <arguments>->•<test>
 *    Goto on <test-list> to 39 because of <arguments>->•<test-list>
 *    Goto on <arguments-plus> to 37 because of <arguments-plus>->•<arguments-plus><argument>
 *    Goto on <argument> to 40 because of <arguments-plus>->•<argument>
 *    Shift on <identifier-not> to 32 because of <test>->•<identifier-not><test> Lookahead = 
 *    Shift on <identifier> to 33 because of <test>->•<identifier><arguments> Lookahead = 
 *    Shift on <identifier> to 33 because of <test>->•<identifier> Lookahead = 
 *    Shift on <parenthesis-open> to 41 because of <test-list>->•<parenthesis-open><test-plus-csv><parenthesis-close> Lookahead = 
 *    Goto on <string-list> to 42 because of <argument>->•<string-list>
 *    Shift on <number> to 43 because of <argument>->•<number> Lookahead = 
 *    Shift on <tag> to 44 because of <argument>->•<tag> Lookahead = 
 *    Shift on <square-parenthesis-open> to 29 because of <string-list>->•<square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 *    Goto on <string> to 30 because of <string-list>->•<string>
 *    Shift on <quoted-string> to 22 because of <string>->•<quoted-string> Lookahead = 
 *    Shift on <multi-line> to 23 because of <string>->•<multi-line> Lookahead = 
 * ----------- 34 -----------
 *   --Itemset--
 *     <command>-><identifier><arguments>•<semicolon>
 *     <command>-><identifier><arguments>•<bracket-open><block>
 *   --Transitions--
 *    Shift on <semicolon> to 54 because of <command>-><identifier><arguments>•<semicolon> Lookahead = 
 *    Shift on <bracket-open> to 55 because of <command>-><identifier><arguments>•<bracket-open><block> Lookahead = 
 * ----------- 35 -----------
 *   --Itemset--
 *     <command>-><identifier><semicolon>•
 *   --Transitions--
 *    Reduce on <identifier-stop> using <command>-><identifier><semicolon> Lookahead = 
 *    Reduce on <identifier-notify> using <command>-><identifier><semicolon> Lookahead = 
 *    Reduce on <identifier-fileinto> using <command>-><identifier><semicolon> Lookahead = 
 *    Reduce on <identifier-redirect> using <command>-><identifier><semicolon> Lookahead = 
 *    Reduce on <identifier-keep> using <command>-><identifier><semicolon> Lookahead = 
 *    Reduce on <identifier-discard> using <command>-><identifier><semicolon> Lookahead = 
 *    Reduce on <identifier-require> using <command>-><identifier><semicolon> Lookahead = 
 *    Reduce on <identifier-if> using <command>-><identifier><semicolon> Lookahead = 
 *    Reduce on <identifier> using <command>-><identifier><semicolon> Lookahead = 
 *    Reduce on <bracket-close> using <command>-><identifier><semicolon> Lookahead = 
 *    Reduce on <hash-comment> using <command>-><identifier><semicolon> Lookahead = 
 *    Reduce on <bracket-comment> using <command>-><identifier><semicolon> Lookahead = 
 *    Reduce on  using <command>-><identifier><semicolon> Lookahead = 
 * ----------- 36 -----------
 *   --Itemset--
 *     <command>-><identifier><bracket-open>•<block>
 *    +<block>->•<command><block>
 *    +<block>->•<bracket-close>
 *    +<command>->•<identifier-stop><semicolon>
 *    +<command>->•<identifier-notify><string><semicolon>
 *    +<command>->•<identifier-fileinto><string><semicolon>
 *    +<command>->•<identifier-redirect><string><semicolon>
 *    +<command>->•<identifier-keep><semicolon>
 *    +<command>->•<identifier-discard><semicolon>
 *    +<command>->•<identifier-require><string-list><semicolon>
 *    +<command>->•<identifier-if><test><bracket-open><block>
 *    +<command>->•<identifier-if><test><bracket-open><block><command-elsif>
 *    +<command>->•<identifier-if><test><bracket-open><block><command-else>
 *    +<command>->•<identifier><arguments><semicolon>
 *    +<command>->•<identifier><arguments><bracket-open><block>
 *    +<command>->•<identifier><semicolon>
 *    +<command>->•<identifier><bracket-open><block>
 *   --Transitions--
 *    Goto on <block> to 56 because of <command>-><identifier><bracket-open>•<block>
 *    Goto on <command> to 57 because of <block>->•<command><block>
 *    Shift on <bracket-close> to 58 because of <block>->•<bracket-close> Lookahead = 
 *    Shift on <identifier-stop> to 6 because of <command>->•<identifier-stop><semicolon> Lookahead = 
 *    Shift on <identifier-notify> to 7 because of <command>->•<identifier-notify><string><semicolon> Lookahead = 
 *    Shift on <identifier-fileinto> to 8 because of <command>->•<identifier-fileinto><string><semicolon> Lookahead = 
 *    Shift on <identifier-redirect> to 9 because of <command>->•<identifier-redirect><string><semicolon> Lookahead = 
 *    Shift on <identifier-keep> to 10 because of <command>->•<identifier-keep><semicolon> Lookahead = 
 *    Shift on <identifier-discard> to 11 because of <command>->•<identifier-discard><semicolon> Lookahead = 
 *    Shift on <identifier-require> to 12 because of <command>->•<identifier-require><string-list><semicolon> Lookahead = 
 *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block> Lookahead = 
 *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block><command-else> Lookahead = 
 *    Shift on <identifier> to 14 because of <command>->•<identifier><arguments><semicolon> Lookahead = 
 *    Shift on <identifier> to 14 because of <command>->•<identifier><arguments><bracket-open><block> Lookahead = 
 *    Shift on <identifier> to 14 because of <command>->•<identifier><semicolon> Lookahead = 
 *    Shift on <identifier> to 14 because of <command>->•<identifier><bracket-open><block> Lookahead = 
 * ----------- 37 -----------
 *   --Itemset--
 *     <arguments>-><arguments-plus>•
 *     <arguments>-><arguments-plus>•<test>
 *     <arguments>-><arguments-plus>•<test-list>
 *     <arguments-plus>-><arguments-plus>•<argument>
 *    +<test>->•<identifier-not><test>
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
 *    Goto on <test> to 59 because of <arguments>-><arguments-plus>•<test>
 *    Goto on <test-list> to 60 because of <arguments>-><arguments-plus>•<test-list>
 *    Goto on <argument> to 61 because of <arguments-plus>-><arguments-plus>•<argument>
 *    Shift on <identifier-not> to 32 because of <test>->•<identifier-not><test> Lookahead = 
 *    Shift on <identifier> to 33 because of <test>->•<identifier><arguments> Lookahead = 
 *    Shift on <identifier> to 33 because of <test>->•<identifier> Lookahead = 
 *    Shift on <parenthesis-open> to 41 because of <test-list>->•<parenthesis-open><test-plus-csv><parenthesis-close> Lookahead = 
 *    Goto on <string-list> to 42 because of <argument>->•<string-list>
 *    Shift on <number> to 43 because of <argument>->•<number> Lookahead = 
 *    Shift on <tag> to 44 because of <argument>->•<tag> Lookahead = 
 *    Shift on <square-parenthesis-open> to 29 because of <string-list>->•<square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 *    Goto on <string> to 30 because of <string-list>->•<string>
 *    Shift on <quoted-string> to 22 because of <string>->•<quoted-string> Lookahead = 
 *    Shift on <multi-line> to 23 because of <string>->•<multi-line> Lookahead = 
 * ----------- 38 -----------
 *   --Itemset--
 *     <arguments>-><test>•
 *   --Transitions--
 *    Reduce on <semicolon> using <arguments>-><test> Lookahead = 
 *    Reduce on <bracket-open> using <arguments>-><test> Lookahead = 
 * ----------- 39 -----------
 *   --Itemset--
 *     <arguments>-><test-list>•
 *   --Transitions--
 *    Reduce on <semicolon> using <arguments>-><test-list> Lookahead = 
 *    Reduce on <bracket-open> using <arguments>-><test-list> Lookahead = 
 *    Reduce on <parenthesis-close> using <arguments>-><test-list> Lookahead = 
 *    Reduce on <comma> using <arguments>-><test-list> Lookahead = 
 * ----------- 40 -----------
 *   --Itemset--
 *     <arguments-plus>-><argument>•
 *   --Transitions--
 *    Reduce on <semicolon> using <arguments-plus>-><argument> Lookahead = 
 *    Reduce on <bracket-open> using <arguments-plus>-><argument> Lookahead = 
 *    Reduce on <identifier> using <arguments-plus>-><argument> Lookahead = 
 *    Reduce on <identifier-not> using <arguments-plus>-><argument> Lookahead = 
 *    Reduce on <parenthesis-open> using <arguments-plus>-><argument> Lookahead = 
 *    Reduce on <parenthesis-close> using <arguments-plus>-><argument> Lookahead = 
 *    Reduce on <comma> using <arguments-plus>-><argument> Lookahead = 
 *    Reduce on <number> using <arguments-plus>-><argument> Lookahead = 
 *    Reduce on <tag> using <arguments-plus>-><argument> Lookahead = 
 *    Reduce on <square-parenthesis-open> using <arguments-plus>-><argument> Lookahead = 
 *    Reduce on <quoted-string> using <arguments-plus>-><argument> Lookahead = 
 *    Reduce on <multi-line> using <arguments-plus>-><argument> Lookahead = 
 * ----------- 41 -----------
 *   --Itemset--
 *     <test-list>-><parenthesis-open>•<test-plus-csv><parenthesis-close>
 *    +<test-plus-csv>->•<test>
 *    +<test-plus-csv>->•<test-plus-csv><comma><test>
 *    +<test>->•<identifier-not><test>
 *    +<test>->•<identifier><arguments>
 *    +<test>->•<identifier>
 *   --Transitions--
 *    Goto on <test-plus-csv> to 62 because of <test-list>-><parenthesis-open>•<test-plus-csv><parenthesis-close>
 *    Goto on <test> to 63 because of <test-plus-csv>->•<test>
 *    Goto on <test-plus-csv> to 62 because of <test-plus-csv>->•<test-plus-csv><comma><test>
 *    Shift on <identifier-not> to 32 because of <test>->•<identifier-not><test> Lookahead = 
 *    Shift on <identifier> to 33 because of <test>->•<identifier><arguments> Lookahead = 
 *    Shift on <identifier> to 33 because of <test>->•<identifier> Lookahead = 
 * ----------- 42 -----------
 *   --Itemset--
 *     <argument>-><string-list>•
 *   --Transitions--
 *    Reduce on <semicolon> using <argument>-><string-list> Lookahead = 
 *    Reduce on <bracket-open> using <argument>-><string-list> Lookahead = 
 *    Reduce on <identifier> using <argument>-><string-list> Lookahead = 
 *    Reduce on <identifier-not> using <argument>-><string-list> Lookahead = 
 *    Reduce on <parenthesis-open> using <argument>-><string-list> Lookahead = 
 *    Reduce on <parenthesis-close> using <argument>-><string-list> Lookahead = 
 *    Reduce on <comma> using <argument>-><string-list> Lookahead = 
 *    Reduce on <number> using <argument>-><string-list> Lookahead = 
 *    Reduce on <tag> using <argument>-><string-list> Lookahead = 
 *    Reduce on <square-parenthesis-open> using <argument>-><string-list> Lookahead = 
 *    Reduce on <quoted-string> using <argument>-><string-list> Lookahead = 
 *    Reduce on <multi-line> using <argument>-><string-list> Lookahead = 
 * ----------- 43 -----------
 *   --Itemset--
 *     <argument>-><number>•
 *   --Transitions--
 *    Reduce on <semicolon> using <argument>-><number> Lookahead = 
 *    Reduce on <bracket-open> using <argument>-><number> Lookahead = 
 *    Reduce on <identifier> using <argument>-><number> Lookahead = 
 *    Reduce on <identifier-not> using <argument>-><number> Lookahead = 
 *    Reduce on <parenthesis-open> using <argument>-><number> Lookahead = 
 *    Reduce on <parenthesis-close> using <argument>-><number> Lookahead = 
 *    Reduce on <comma> using <argument>-><number> Lookahead = 
 *    Reduce on <number> using <argument>-><number> Lookahead = 
 *    Reduce on <tag> using <argument>-><number> Lookahead = 
 *    Reduce on <square-parenthesis-open> using <argument>-><number> Lookahead = 
 *    Reduce on <quoted-string> using <argument>-><number> Lookahead = 
 *    Reduce on <multi-line> using <argument>-><number> Lookahead = 
 * ----------- 44 -----------
 *   --Itemset--
 *     <argument>-><tag>•
 *   --Transitions--
 *    Reduce on <semicolon> using <argument>-><tag> Lookahead = 
 *    Reduce on <bracket-open> using <argument>-><tag> Lookahead = 
 *    Reduce on <identifier> using <argument>-><tag> Lookahead = 
 *    Reduce on <identifier-not> using <argument>-><tag> Lookahead = 
 *    Reduce on <parenthesis-open> using <argument>-><tag> Lookahead = 
 *    Reduce on <parenthesis-close> using <argument>-><tag> Lookahead = 
 *    Reduce on <comma> using <argument>-><tag> Lookahead = 
 *    Reduce on <number> using <argument>-><tag> Lookahead = 
 *    Reduce on <tag> using <argument>-><tag> Lookahead = 
 *    Reduce on <square-parenthesis-open> using <argument>-><tag> Lookahead = 
 *    Reduce on <quoted-string> using <argument>-><tag> Lookahead = 
 *    Reduce on <multi-line> using <argument>-><tag> Lookahead = 
 * ----------- 45 -----------
 *   --Itemset--
 *     <command>-><identifier-notify><string><semicolon>•
 *   --Transitions--
 *    Reduce on <identifier-stop> using <command>-><identifier-notify><string><semicolon> Lookahead = 
 *    Reduce on <identifier-notify> using <command>-><identifier-notify><string><semicolon> Lookahead = 
 *    Reduce on <identifier-fileinto> using <command>-><identifier-notify><string><semicolon> Lookahead = 
 *    Reduce on <identifier-redirect> using <command>-><identifier-notify><string><semicolon> Lookahead = 
 *    Reduce on <identifier-keep> using <command>-><identifier-notify><string><semicolon> Lookahead = 
 *    Reduce on <identifier-discard> using <command>-><identifier-notify><string><semicolon> Lookahead = 
 *    Reduce on <identifier-require> using <command>-><identifier-notify><string><semicolon> Lookahead = 
 *    Reduce on <identifier-if> using <command>-><identifier-notify><string><semicolon> Lookahead = 
 *    Reduce on <identifier> using <command>-><identifier-notify><string><semicolon> Lookahead = 
 *    Reduce on <bracket-close> using <command>-><identifier-notify><string><semicolon> Lookahead = 
 *    Reduce on <hash-comment> using <command>-><identifier-notify><string><semicolon> Lookahead = 
 *    Reduce on <bracket-comment> using <command>-><identifier-notify><string><semicolon> Lookahead = 
 *    Reduce on  using <command>-><identifier-notify><string><semicolon> Lookahead = 
 * ----------- 46 -----------
 *   --Itemset--
 *     <command>-><identifier-fileinto><string><semicolon>•
 *   --Transitions--
 *    Reduce on <identifier-stop> using <command>-><identifier-fileinto><string><semicolon> Lookahead = 
 *    Reduce on <identifier-notify> using <command>-><identifier-fileinto><string><semicolon> Lookahead = 
 *    Reduce on <identifier-fileinto> using <command>-><identifier-fileinto><string><semicolon> Lookahead = 
 *    Reduce on <identifier-redirect> using <command>-><identifier-fileinto><string><semicolon> Lookahead = 
 *    Reduce on <identifier-keep> using <command>-><identifier-fileinto><string><semicolon> Lookahead = 
 *    Reduce on <identifier-discard> using <command>-><identifier-fileinto><string><semicolon> Lookahead = 
 *    Reduce on <identifier-require> using <command>-><identifier-fileinto><string><semicolon> Lookahead = 
 *    Reduce on <identifier-if> using <command>-><identifier-fileinto><string><semicolon> Lookahead = 
 *    Reduce on <identifier> using <command>-><identifier-fileinto><string><semicolon> Lookahead = 
 *    Reduce on <bracket-close> using <command>-><identifier-fileinto><string><semicolon> Lookahead = 
 *    Reduce on <hash-comment> using <command>-><identifier-fileinto><string><semicolon> Lookahead = 
 *    Reduce on <bracket-comment> using <command>-><identifier-fileinto><string><semicolon> Lookahead = 
 *    Reduce on  using <command>-><identifier-fileinto><string><semicolon> Lookahead = 
 * ----------- 47 -----------
 *   --Itemset--
 *     <command>-><identifier-redirect><string><semicolon>•
 *   --Transitions--
 *    Reduce on <identifier-stop> using <command>-><identifier-redirect><string><semicolon> Lookahead = 
 *    Reduce on <identifier-notify> using <command>-><identifier-redirect><string><semicolon> Lookahead = 
 *    Reduce on <identifier-fileinto> using <command>-><identifier-redirect><string><semicolon> Lookahead = 
 *    Reduce on <identifier-redirect> using <command>-><identifier-redirect><string><semicolon> Lookahead = 
 *    Reduce on <identifier-keep> using <command>-><identifier-redirect><string><semicolon> Lookahead = 
 *    Reduce on <identifier-discard> using <command>-><identifier-redirect><string><semicolon> Lookahead = 
 *    Reduce on <identifier-require> using <command>-><identifier-redirect><string><semicolon> Lookahead = 
 *    Reduce on <identifier-if> using <command>-><identifier-redirect><string><semicolon> Lookahead = 
 *    Reduce on <identifier> using <command>-><identifier-redirect><string><semicolon> Lookahead = 
 *    Reduce on <bracket-close> using <command>-><identifier-redirect><string><semicolon> Lookahead = 
 *    Reduce on <hash-comment> using <command>-><identifier-redirect><string><semicolon> Lookahead = 
 *    Reduce on <bracket-comment> using <command>-><identifier-redirect><string><semicolon> Lookahead = 
 *    Reduce on  using <command>-><identifier-redirect><string><semicolon> Lookahead = 
 * ----------- 48 -----------
 *   --Itemset--
 *     <command>-><identifier-require><string-list><semicolon>•
 *   --Transitions--
 *    Reduce on <identifier-stop> using <command>-><identifier-require><string-list><semicolon> Lookahead = 
 *    Reduce on <identifier-notify> using <command>-><identifier-require><string-list><semicolon> Lookahead = 
 *    Reduce on <identifier-fileinto> using <command>-><identifier-require><string-list><semicolon> Lookahead = 
 *    Reduce on <identifier-redirect> using <command>-><identifier-require><string-list><semicolon> Lookahead = 
 *    Reduce on <identifier-keep> using <command>-><identifier-require><string-list><semicolon> Lookahead = 
 *    Reduce on <identifier-discard> using <command>-><identifier-require><string-list><semicolon> Lookahead = 
 *    Reduce on <identifier-require> using <command>-><identifier-require><string-list><semicolon> Lookahead = 
 *    Reduce on <identifier-if> using <command>-><identifier-require><string-list><semicolon> Lookahead = 
 *    Reduce on <identifier> using <command>-><identifier-require><string-list><semicolon> Lookahead = 
 *    Reduce on <bracket-close> using <command>-><identifier-require><string-list><semicolon> Lookahead = 
 *    Reduce on <hash-comment> using <command>-><identifier-require><string-list><semicolon> Lookahead = 
 *    Reduce on <bracket-comment> using <command>-><identifier-require><string-list><semicolon> Lookahead = 
 *    Reduce on  using <command>-><identifier-require><string-list><semicolon> Lookahead = 
 * ----------- 49 -----------
 *   --Itemset--
 *     <string-list>-><square-parenthesis-open><string-plus-csv>•<square-parenthesis-close>
 *     <string-plus-csv>-><string-plus-csv>•<comma><string>
 *   --Transitions--
 *    Shift on <square-parenthesis-close> to 64 because of <string-list>-><square-parenthesis-open><string-plus-csv>•<square-parenthesis-close> Lookahead = 
 *    Shift on <comma> to 65 because of <string-plus-csv>-><string-plus-csv>•<comma><string> Lookahead = 
 * ----------- 50 -----------
 *   --Itemset--
 *     <string-plus-csv>-><string>•
 *   --Transitions--
 *    Reduce on <comma> using <string-plus-csv>-><string> Lookahead = 
 *    Reduce on <square-parenthesis-close> using <string-plus-csv>-><string> Lookahead = 
 * ----------- 51 -----------
 *   --Itemset--
 *     <command>-><identifier-if><test><bracket-open>•<block>
 *     <command>-><identifier-if><test><bracket-open>•<block><command-elsif>
 *     <command>-><identifier-if><test><bracket-open>•<block><command-else>
 *    +<block>->•<command><block>
 *    +<block>->•<bracket-close>
 *    +<command>->•<identifier-stop><semicolon>
 *    +<command>->•<identifier-notify><string><semicolon>
 *    +<command>->•<identifier-fileinto><string><semicolon>
 *    +<command>->•<identifier-redirect><string><semicolon>
 *    +<command>->•<identifier-keep><semicolon>
 *    +<command>->•<identifier-discard><semicolon>
 *    +<command>->•<identifier-require><string-list><semicolon>
 *    +<command>->•<identifier-if><test><bracket-open><block>
 *    +<command>->•<identifier-if><test><bracket-open><block><command-elsif>
 *    +<command>->•<identifier-if><test><bracket-open><block><command-else>
 *    +<command>->•<identifier><arguments><semicolon>
 *    +<command>->•<identifier><arguments><bracket-open><block>
 *    +<command>->•<identifier><semicolon>
 *    +<command>->•<identifier><bracket-open><block>
 *   --Transitions--
 *    Goto on <block> to 66 because of <command>-><identifier-if><test><bracket-open>•<block>
 *    Goto on <block> to 66 because of <command>-><identifier-if><test><bracket-open>•<block><command-elsif>
 *    Goto on <block> to 66 because of <command>-><identifier-if><test><bracket-open>•<block><command-else>
 *    Goto on <command> to 57 because of <block>->•<command><block>
 *    Shift on <bracket-close> to 58 because of <block>->•<bracket-close> Lookahead = 
 *    Shift on <identifier-stop> to 6 because of <command>->•<identifier-stop><semicolon> Lookahead = 
 *    Shift on <identifier-notify> to 7 because of <command>->•<identifier-notify><string><semicolon> Lookahead = 
 *    Shift on <identifier-fileinto> to 8 because of <command>->•<identifier-fileinto><string><semicolon> Lookahead = 
 *    Shift on <identifier-redirect> to 9 because of <command>->•<identifier-redirect><string><semicolon> Lookahead = 
 *    Shift on <identifier-keep> to 10 because of <command>->•<identifier-keep><semicolon> Lookahead = 
 *    Shift on <identifier-discard> to 11 because of <command>->•<identifier-discard><semicolon> Lookahead = 
 *    Shift on <identifier-require> to 12 because of <command>->•<identifier-require><string-list><semicolon> Lookahead = 
 *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block> Lookahead = 
 *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block><command-else> Lookahead = 
 *    Shift on <identifier> to 14 because of <command>->•<identifier><arguments><semicolon> Lookahead = 
 *    Shift on <identifier> to 14 because of <command>->•<identifier><arguments><bracket-open><block> Lookahead = 
 *    Shift on <identifier> to 14 because of <command>->•<identifier><semicolon> Lookahead = 
 *    Shift on <identifier> to 14 because of <command>->•<identifier><bracket-open><block> Lookahead = 
 * ----------- 52 -----------
 *   --Itemset--
 *     <test>-><identifier-not><test>•
 *   --Transitions--
 *    Reduce on <semicolon> using <test>-><identifier-not><test> Lookahead = 
 *    Reduce on <bracket-open> using <test>-><identifier-not><test> Lookahead = 
 *    Reduce on <parenthesis-close> using <test>-><identifier-not><test> Lookahead = 
 *    Reduce on <comma> using <test>-><identifier-not><test> Lookahead = 
 * ----------- 53 -----------
 *   --Itemset--
 *     <test>-><identifier><arguments>•
 *   --Transitions--
 *    Reduce on <semicolon> using <test>-><identifier><arguments> Lookahead = 
 *    Reduce on <bracket-open> using <test>-><identifier><arguments> Lookahead = 
 *    Reduce on <parenthesis-close> using <test>-><identifier><arguments> Lookahead = 
 *    Reduce on <comma> using <test>-><identifier><arguments> Lookahead = 
 * ----------- 54 -----------
 *   --Itemset--
 *     <command>-><identifier><arguments><semicolon>•
 *   --Transitions--
 *    Reduce on <identifier-stop> using <command>-><identifier><arguments><semicolon> Lookahead = 
 *    Reduce on <identifier-notify> using <command>-><identifier><arguments><semicolon> Lookahead = 
 *    Reduce on <identifier-fileinto> using <command>-><identifier><arguments><semicolon> Lookahead = 
 *    Reduce on <identifier-redirect> using <command>-><identifier><arguments><semicolon> Lookahead = 
 *    Reduce on <identifier-keep> using <command>-><identifier><arguments><semicolon> Lookahead = 
 *    Reduce on <identifier-discard> using <command>-><identifier><arguments><semicolon> Lookahead = 
 *    Reduce on <identifier-require> using <command>-><identifier><arguments><semicolon> Lookahead = 
 *    Reduce on <identifier-if> using <command>-><identifier><arguments><semicolon> Lookahead = 
 *    Reduce on <identifier> using <command>-><identifier><arguments><semicolon> Lookahead = 
 *    Reduce on <bracket-close> using <command>-><identifier><arguments><semicolon> Lookahead = 
 *    Reduce on <hash-comment> using <command>-><identifier><arguments><semicolon> Lookahead = 
 *    Reduce on <bracket-comment> using <command>-><identifier><arguments><semicolon> Lookahead = 
 *    Reduce on  using <command>-><identifier><arguments><semicolon> Lookahead = 
 * ----------- 55 -----------
 *   --Itemset--
 *     <command>-><identifier><arguments><bracket-open>•<block>
 *    +<block>->•<command><block>
 *    +<block>->•<bracket-close>
 *    +<command>->•<identifier-stop><semicolon>
 *    +<command>->•<identifier-notify><string><semicolon>
 *    +<command>->•<identifier-fileinto><string><semicolon>
 *    +<command>->•<identifier-redirect><string><semicolon>
 *    +<command>->•<identifier-keep><semicolon>
 *    +<command>->•<identifier-discard><semicolon>
 *    +<command>->•<identifier-require><string-list><semicolon>
 *    +<command>->•<identifier-if><test><bracket-open><block>
 *    +<command>->•<identifier-if><test><bracket-open><block><command-elsif>
 *    +<command>->•<identifier-if><test><bracket-open><block><command-else>
 *    +<command>->•<identifier><arguments><semicolon>
 *    +<command>->•<identifier><arguments><bracket-open><block>
 *    +<command>->•<identifier><semicolon>
 *    +<command>->•<identifier><bracket-open><block>
 *   --Transitions--
 *    Goto on <block> to 67 because of <command>-><identifier><arguments><bracket-open>•<block>
 *    Goto on <command> to 57 because of <block>->•<command><block>
 *    Shift on <bracket-close> to 58 because of <block>->•<bracket-close> Lookahead = 
 *    Shift on <identifier-stop> to 6 because of <command>->•<identifier-stop><semicolon> Lookahead = 
 *    Shift on <identifier-notify> to 7 because of <command>->•<identifier-notify><string><semicolon> Lookahead = 
 *    Shift on <identifier-fileinto> to 8 because of <command>->•<identifier-fileinto><string><semicolon> Lookahead = 
 *    Shift on <identifier-redirect> to 9 because of <command>->•<identifier-redirect><string><semicolon> Lookahead = 
 *    Shift on <identifier-keep> to 10 because of <command>->•<identifier-keep><semicolon> Lookahead = 
 *    Shift on <identifier-discard> to 11 because of <command>->•<identifier-discard><semicolon> Lookahead = 
 *    Shift on <identifier-require> to 12 because of <command>->•<identifier-require><string-list><semicolon> Lookahead = 
 *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block> Lookahead = 
 *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block><command-else> Lookahead = 
 *    Shift on <identifier> to 14 because of <command>->•<identifier><arguments><semicolon> Lookahead = 
 *    Shift on <identifier> to 14 because of <command>->•<identifier><arguments><bracket-open><block> Lookahead = 
 *    Shift on <identifier> to 14 because of <command>->•<identifier><semicolon> Lookahead = 
 *    Shift on <identifier> to 14 because of <command>->•<identifier><bracket-open><block> Lookahead = 
 * ----------- 56 -----------
 *   --Itemset--
 *     <command>-><identifier><bracket-open><block>•
 *   --Transitions--
 *    Reduce on <identifier-stop> using <command>-><identifier><bracket-open><block> Lookahead = 
 *    Reduce on <identifier-notify> using <command>-><identifier><bracket-open><block> Lookahead = 
 *    Reduce on <identifier-fileinto> using <command>-><identifier><bracket-open><block> Lookahead = 
 *    Reduce on <identifier-redirect> using <command>-><identifier><bracket-open><block> Lookahead = 
 *    Reduce on <identifier-keep> using <command>-><identifier><bracket-open><block> Lookahead = 
 *    Reduce on <identifier-discard> using <command>-><identifier><bracket-open><block> Lookahead = 
 *    Reduce on <identifier-require> using <command>-><identifier><bracket-open><block> Lookahead = 
 *    Reduce on <identifier-if> using <command>-><identifier><bracket-open><block> Lookahead = 
 *    Reduce on <identifier> using <command>-><identifier><bracket-open><block> Lookahead = 
 *    Reduce on <bracket-close> using <command>-><identifier><bracket-open><block> Lookahead = 
 *    Reduce on <hash-comment> using <command>-><identifier><bracket-open><block> Lookahead = 
 *    Reduce on <bracket-comment> using <command>-><identifier><bracket-open><block> Lookahead = 
 *    Reduce on  using <command>-><identifier><bracket-open><block> Lookahead = 
 * ----------- 57 -----------
 *   --Itemset--
 *     <block>-><command>•<block>
 *    +<block>->•<command><block>
 *    +<block>->•<bracket-close>
 *    +<command>->•<identifier-stop><semicolon>
 *    +<command>->•<identifier-notify><string><semicolon>
 *    +<command>->•<identifier-fileinto><string><semicolon>
 *    +<command>->•<identifier-redirect><string><semicolon>
 *    +<command>->•<identifier-keep><semicolon>
 *    +<command>->•<identifier-discard><semicolon>
 *    +<command>->•<identifier-require><string-list><semicolon>
 *    +<command>->•<identifier-if><test><bracket-open><block>
 *    +<command>->•<identifier-if><test><bracket-open><block><command-elsif>
 *    +<command>->•<identifier-if><test><bracket-open><block><command-else>
 *    +<command>->•<identifier><arguments><semicolon>
 *    +<command>->•<identifier><arguments><bracket-open><block>
 *    +<command>->•<identifier><semicolon>
 *    +<command>->•<identifier><bracket-open><block>
 *   --Transitions--
 *    Goto on <block> to 68 because of <block>-><command>•<block>
 *    Goto on <command> to 57 because of <block>->•<command><block>
 *    Shift on <bracket-close> to 58 because of <block>->•<bracket-close> Lookahead = 
 *    Shift on <identifier-stop> to 6 because of <command>->•<identifier-stop><semicolon> Lookahead = 
 *    Shift on <identifier-notify> to 7 because of <command>->•<identifier-notify><string><semicolon> Lookahead = 
 *    Shift on <identifier-fileinto> to 8 because of <command>->•<identifier-fileinto><string><semicolon> Lookahead = 
 *    Shift on <identifier-redirect> to 9 because of <command>->•<identifier-redirect><string><semicolon> Lookahead = 
 *    Shift on <identifier-keep> to 10 because of <command>->•<identifier-keep><semicolon> Lookahead = 
 *    Shift on <identifier-discard> to 11 because of <command>->•<identifier-discard><semicolon> Lookahead = 
 *    Shift on <identifier-require> to 12 because of <command>->•<identifier-require><string-list><semicolon> Lookahead = 
 *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block> Lookahead = 
 *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block><command-else> Lookahead = 
 *    Shift on <identifier> to 14 because of <command>->•<identifier><arguments><semicolon> Lookahead = 
 *    Shift on <identifier> to 14 because of <command>->•<identifier><arguments><bracket-open><block> Lookahead = 
 *    Shift on <identifier> to 14 because of <command>->•<identifier><semicolon> Lookahead = 
 *    Shift on <identifier> to 14 because of <command>->•<identifier><bracket-open><block> Lookahead = 
 * ----------- 58 -----------
 *   --Itemset--
 *     <block>-><bracket-close>•
 *   --Transitions--
 *    Reduce on <identifier-stop> using <block>-><bracket-close> Lookahead = 
 *    Reduce on <identifier-notify> using <block>-><bracket-close> Lookahead = 
 *    Reduce on <identifier-fileinto> using <block>-><bracket-close> Lookahead = 
 *    Reduce on <identifier-redirect> using <block>-><bracket-close> Lookahead = 
 *    Reduce on <identifier-keep> using <block>-><bracket-close> Lookahead = 
 *    Reduce on <identifier-discard> using <block>-><bracket-close> Lookahead = 
 *    Reduce on <identifier-require> using <block>-><bracket-close> Lookahead = 
 *    Reduce on <identifier-if> using <block>-><bracket-close> Lookahead = 
 *    Reduce on <identifier-elsif> using <block>-><bracket-close> Lookahead = 
 *    Reduce on <identifier-else> using <block>-><bracket-close> Lookahead = 
 *    Reduce on <identifier> using <block>-><bracket-close> Lookahead = 
 *    Reduce on <bracket-close> using <block>-><bracket-close> Lookahead = 
 *    Reduce on <hash-comment> using <block>-><bracket-close> Lookahead = 
 *    Reduce on <bracket-comment> using <block>-><bracket-close> Lookahead = 
 *    Reduce on  using <block>-><bracket-close> Lookahead = 
 * ----------- 59 -----------
 *   --Itemset--
 *     <arguments>-><arguments-plus><test>•
 *   --Transitions--
 *    Reduce on <semicolon> using <arguments>-><arguments-plus><test> Lookahead = 
 *    Reduce on <bracket-open> using <arguments>-><arguments-plus><test> Lookahead = 
 * ----------- 60 -----------
 *   --Itemset--
 *     <arguments>-><arguments-plus><test-list>•
 *   --Transitions--
 *    Reduce on <semicolon> using <arguments>-><arguments-plus><test-list> Lookahead = 
 *    Reduce on <bracket-open> using <arguments>-><arguments-plus><test-list> Lookahead = 
 *    Reduce on <parenthesis-close> using <arguments>-><arguments-plus><test-list> Lookahead = 
 *    Reduce on <comma> using <arguments>-><arguments-plus><test-list> Lookahead = 
 * ----------- 61 -----------
 *   --Itemset--
 *     <arguments-plus>-><arguments-plus><argument>•
 *   --Transitions--
 *    Reduce on <semicolon> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
 *    Reduce on <bracket-open> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
 *    Reduce on <identifier> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
 *    Reduce on <identifier-not> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
 *    Reduce on <parenthesis-open> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
 *    Reduce on <parenthesis-close> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
 *    Reduce on <comma> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
 *    Reduce on <number> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
 *    Reduce on <tag> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
 *    Reduce on <square-parenthesis-open> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
 *    Reduce on <quoted-string> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
 *    Reduce on <multi-line> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
 * ----------- 62 -----------
 *   --Itemset--
 *     <test-list>-><parenthesis-open><test-plus-csv>•<parenthesis-close>
 *     <test-plus-csv>-><test-plus-csv>•<comma><test>
 *   --Transitions--
 *    Shift on <parenthesis-close> to 69 because of <test-list>-><parenthesis-open><test-plus-csv>•<parenthesis-close> Lookahead = 
 *    Shift on <comma> to 70 because of <test-plus-csv>-><test-plus-csv>•<comma><test> Lookahead = 
 * ----------- 63 -----------
 *   --Itemset--
 *     <test-plus-csv>-><test>•
 *   --Transitions--
 *    Reduce on <parenthesis-close> using <test-plus-csv>-><test> Lookahead = 
 *    Reduce on <comma> using <test-plus-csv>-><test> Lookahead = 
 * ----------- 64 -----------
 *   --Itemset--
 *     <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close>•
 *   --Transitions--
 *    Reduce on <semicolon> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 *    Reduce on <bracket-open> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 *    Reduce on <identifier> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 *    Reduce on <identifier-not> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 *    Reduce on <parenthesis-open> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 *    Reduce on <parenthesis-close> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 *    Reduce on <comma> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 *    Reduce on <number> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 *    Reduce on <tag> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 *    Reduce on <square-parenthesis-open> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 *    Reduce on <quoted-string> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 *    Reduce on <multi-line> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 * ----------- 65 -----------
 *   --Itemset--
 *     <string-plus-csv>-><string-plus-csv><comma>•<string>
 *    +<string>->•<quoted-string>
 *    +<string>->•<multi-line>
 *   --Transitions--
 *    Goto on <string> to 71 because of <string-plus-csv>-><string-plus-csv><comma>•<string>
 *    Shift on <quoted-string> to 22 because of <string>->•<quoted-string> Lookahead = 
 *    Shift on <multi-line> to 23 because of <string>->•<multi-line> Lookahead = 
 * ----------- 66 -----------
 *   --Itemset--
 *     <command>-><identifier-if><test><bracket-open><block>•
 *     <command>-><identifier-if><test><bracket-open><block>•<command-elsif>
 *     <command>-><identifier-if><test><bracket-open><block>•<command-else>
 *    +<command-elsif>->•<identifier-elsif><test><bracket-open><block>
 *    +<command-elsif>->•<identifier-elsif><test><bracket-open><block><command-elsif>
 *    +<command-elsif>->•<identifier-elsif><test><bracket-open><block><command-else>
 *    +<command-else>->•<identifier-else><bracket-open><block>
 *   --Transitions--
 *    Reduce on <identifier-stop> using <command>-><identifier-if><test><bracket-open><block> Lookahead = 
 *    Reduce on <identifier-notify> using <command>-><identifier-if><test><bracket-open><block> Lookahead = 
 *    Reduce on <identifier-fileinto> using <command>-><identifier-if><test><bracket-open><block> Lookahead = 
 *    Reduce on <identifier-redirect> using <command>-><identifier-if><test><bracket-open><block> Lookahead = 
 *    Reduce on <identifier-keep> using <command>-><identifier-if><test><bracket-open><block> Lookahead = 
 *    Reduce on <identifier-discard> using <command>-><identifier-if><test><bracket-open><block> Lookahead = 
 *    Reduce on <identifier-require> using <command>-><identifier-if><test><bracket-open><block> Lookahead = 
 *    Reduce on <identifier-if> using <command>-><identifier-if><test><bracket-open><block> Lookahead = 
 *    Reduce on <identifier> using <command>-><identifier-if><test><bracket-open><block> Lookahead = 
 *    Reduce on <bracket-close> using <command>-><identifier-if><test><bracket-open><block> Lookahead = 
 *    Reduce on <hash-comment> using <command>-><identifier-if><test><bracket-open><block> Lookahead = 
 *    Reduce on <bracket-comment> using <command>-><identifier-if><test><bracket-open><block> Lookahead = 
 *    Reduce on  using <command>-><identifier-if><test><bracket-open><block> Lookahead = 
 *    Goto on <command-elsif> to 72 because of <command>-><identifier-if><test><bracket-open><block>•<command-elsif>
 *    Goto on <command-else> to 73 because of <command>-><identifier-if><test><bracket-open><block>•<command-else>
 *    Shift on <identifier-elsif> to 74 because of <command-elsif>->•<identifier-elsif><test><bracket-open><block> Lookahead = 
 *    Shift on <identifier-elsif> to 74 because of <command-elsif>->•<identifier-elsif><test><bracket-open><block><command-elsif> Lookahead = 
 *    Shift on <identifier-elsif> to 74 because of <command-elsif>->•<identifier-elsif><test><bracket-open><block><command-else> Lookahead = 
 *    Shift on <identifier-else> to 75 because of <command-else>->•<identifier-else><bracket-open><block> Lookahead = 
 * ----------- 67 -----------
 *   --Itemset--
 *     <command>-><identifier><arguments><bracket-open><block>•
 *   --Transitions--
 *    Reduce on <identifier-stop> using <command>-><identifier><arguments><bracket-open><block> Lookahead = 
 *    Reduce on <identifier-notify> using <command>-><identifier><arguments><bracket-open><block> Lookahead = 
 *    Reduce on <identifier-fileinto> using <command>-><identifier><arguments><bracket-open><block> Lookahead = 
 *    Reduce on <identifier-redirect> using <command>-><identifier><arguments><bracket-open><block> Lookahead = 
 *    Reduce on <identifier-keep> using <command>-><identifier><arguments><bracket-open><block> Lookahead = 
 *    Reduce on <identifier-discard> using <command>-><identifier><arguments><bracket-open><block> Lookahead = 
 *    Reduce on <identifier-require> using <command>-><identifier><arguments><bracket-open><block> Lookahead = 
 *    Reduce on <identifier-if> using <command>-><identifier><arguments><bracket-open><block> Lookahead = 
 *    Reduce on <identifier> using <command>-><identifier><arguments><bracket-open><block> Lookahead = 
 *    Reduce on <bracket-close> using <command>-><identifier><arguments><bracket-open><block> Lookahead = 
 *    Reduce on <hash-comment> using <command>-><identifier><arguments><bracket-open><block> Lookahead = 
 *    Reduce on <bracket-comment> using <command>-><identifier><arguments><bracket-open><block> Lookahead = 
 *    Reduce on  using <command>-><identifier><arguments><bracket-open><block> Lookahead = 
 * ----------- 68 -----------
 *   --Itemset--
 *     <block>-><command><block>•
 *   --Transitions--
 *    Reduce on <identifier-stop> using <block>-><command><block> Lookahead = 
 *    Reduce on <identifier-notify> using <block>-><command><block> Lookahead = 
 *    Reduce on <identifier-fileinto> using <block>-><command><block> Lookahead = 
 *    Reduce on <identifier-redirect> using <block>-><command><block> Lookahead = 
 *    Reduce on <identifier-keep> using <block>-><command><block> Lookahead = 
 *    Reduce on <identifier-discard> using <block>-><command><block> Lookahead = 
 *    Reduce on <identifier-require> using <block>-><command><block> Lookahead = 
 *    Reduce on <identifier-if> using <block>-><command><block> Lookahead = 
 *    Reduce on <identifier-elsif> using <block>-><command><block> Lookahead = 
 *    Reduce on <identifier-else> using <block>-><command><block> Lookahead = 
 *    Reduce on <identifier> using <block>-><command><block> Lookahead = 
 *    Reduce on <bracket-close> using <block>-><command><block> Lookahead = 
 *    Reduce on <hash-comment> using <block>-><command><block> Lookahead = 
 *    Reduce on <bracket-comment> using <block>-><command><block> Lookahead = 
 *    Reduce on  using <block>-><command><block> Lookahead = 
 * ----------- 69 -----------
 *   --Itemset--
 *     <test-list>-><parenthesis-open><test-plus-csv><parenthesis-close>•
 *   --Transitions--
 *    Reduce on <semicolon> using <test-list>-><parenthesis-open><test-plus-csv><parenthesis-close> Lookahead = 
 *    Reduce on <bracket-open> using <test-list>-><parenthesis-open><test-plus-csv><parenthesis-close> Lookahead = 
 *    Reduce on <parenthesis-close> using <test-list>-><parenthesis-open><test-plus-csv><parenthesis-close> Lookahead = 
 *    Reduce on <comma> using <test-list>-><parenthesis-open><test-plus-csv><parenthesis-close> Lookahead = 
 * ----------- 70 -----------
 *   --Itemset--
 *     <test-plus-csv>-><test-plus-csv><comma>•<test>
 *    +<test>->•<identifier-not><test>
 *    +<test>->•<identifier><arguments>
 *    +<test>->•<identifier>
 *   --Transitions--
 *    Goto on <test> to 76 because of <test-plus-csv>-><test-plus-csv><comma>•<test>
 *    Shift on <identifier-not> to 32 because of <test>->•<identifier-not><test> Lookahead = 
 *    Shift on <identifier> to 33 because of <test>->•<identifier><arguments> Lookahead = 
 *    Shift on <identifier> to 33 because of <test>->•<identifier> Lookahead = 
 * ----------- 71 -----------
 *   --Itemset--
 *     <string-plus-csv>-><string-plus-csv><comma><string>•
 *   --Transitions--
 *    Reduce on <comma> using <string-plus-csv>-><string-plus-csv><comma><string> Lookahead = 
 *    Reduce on <square-parenthesis-close> using <string-plus-csv>-><string-plus-csv><comma><string> Lookahead = 
 * ----------- 72 -----------
 *   --Itemset--
 *     <command>-><identifier-if><test><bracket-open><block><command-elsif>•
 *   --Transitions--
 *    Reduce on <identifier-stop> using <command>-><identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 *    Reduce on <identifier-notify> using <command>-><identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 *    Reduce on <identifier-fileinto> using <command>-><identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 *    Reduce on <identifier-redirect> using <command>-><identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 *    Reduce on <identifier-keep> using <command>-><identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 *    Reduce on <identifier-discard> using <command>-><identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 *    Reduce on <identifier-require> using <command>-><identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 *    Reduce on <identifier-if> using <command>-><identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 *    Reduce on <identifier> using <command>-><identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 *    Reduce on <bracket-close> using <command>-><identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 *    Reduce on <hash-comment> using <command>-><identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 *    Reduce on <bracket-comment> using <command>-><identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 *    Reduce on  using <command>-><identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 * ----------- 73 -----------
 *   --Itemset--
 *     <command>-><identifier-if><test><bracket-open><block><command-else>•
 *   --Transitions--
 *    Reduce on <identifier-stop> using <command>-><identifier-if><test><bracket-open><block><command-else> Lookahead = 
 *    Reduce on <identifier-notify> using <command>-><identifier-if><test><bracket-open><block><command-else> Lookahead = 
 *    Reduce on <identifier-fileinto> using <command>-><identifier-if><test><bracket-open><block><command-else> Lookahead = 
 *    Reduce on <identifier-redirect> using <command>-><identifier-if><test><bracket-open><block><command-else> Lookahead = 
 *    Reduce on <identifier-keep> using <command>-><identifier-if><test><bracket-open><block><command-else> Lookahead = 
 *    Reduce on <identifier-discard> using <command>-><identifier-if><test><bracket-open><block><command-else> Lookahead = 
 *    Reduce on <identifier-require> using <command>-><identifier-if><test><bracket-open><block><command-else> Lookahead = 
 *    Reduce on <identifier-if> using <command>-><identifier-if><test><bracket-open><block><command-else> Lookahead = 
 *    Reduce on <identifier> using <command>-><identifier-if><test><bracket-open><block><command-else> Lookahead = 
 *    Reduce on <bracket-close> using <command>-><identifier-if><test><bracket-open><block><command-else> Lookahead = 
 *    Reduce on <hash-comment> using <command>-><identifier-if><test><bracket-open><block><command-else> Lookahead = 
 *    Reduce on <bracket-comment> using <command>-><identifier-if><test><bracket-open><block><command-else> Lookahead = 
 *    Reduce on  using <command>-><identifier-if><test><bracket-open><block><command-else> Lookahead = 
 * ----------- 74 -----------
 *   --Itemset--
 *     <command-elsif>-><identifier-elsif>•<test><bracket-open><block>
 *     <command-elsif>-><identifier-elsif>•<test><bracket-open><block><command-elsif>
 *     <command-elsif>-><identifier-elsif>•<test><bracket-open><block><command-else>
 *    +<test>->•<identifier-not><test>
 *    +<test>->•<identifier><arguments>
 *    +<test>->•<identifier>
 *   --Transitions--
 *    Goto on <test> to 77 because of <command-elsif>-><identifier-elsif>•<test><bracket-open><block>
 *    Goto on <test> to 77 because of <command-elsif>-><identifier-elsif>•<test><bracket-open><block><command-elsif>
 *    Goto on <test> to 77 because of <command-elsif>-><identifier-elsif>•<test><bracket-open><block><command-else>
 *    Shift on <identifier-not> to 32 because of <test>->•<identifier-not><test> Lookahead = 
 *    Shift on <identifier> to 33 because of <test>->•<identifier><arguments> Lookahead = 
 *    Shift on <identifier> to 33 because of <test>->•<identifier> Lookahead = 
 * ----------- 75 -----------
 *   --Itemset--
 *     <command-else>-><identifier-else>•<bracket-open><block>
 *   --Transitions--
 *    Shift on <bracket-open> to 78 because of <command-else>-><identifier-else>•<bracket-open><block> Lookahead = 
 * ----------- 76 -----------
 *   --Itemset--
 *     <test-plus-csv>-><test-plus-csv><comma><test>•
 *   --Transitions--
 *    Reduce on <parenthesis-close> using <test-plus-csv>-><test-plus-csv><comma><test> Lookahead = 
 *    Reduce on <comma> using <test-plus-csv>-><test-plus-csv><comma><test> Lookahead = 
 * ----------- 77 -----------
 *   --Itemset--
 *     <command-elsif>-><identifier-elsif><test>•<bracket-open><block>
 *     <command-elsif>-><identifier-elsif><test>•<bracket-open><block><command-elsif>
 *     <command-elsif>-><identifier-elsif><test>•<bracket-open><block><command-else>
 *   --Transitions--
 *    Shift on <bracket-open> to 79 because of <command-elsif>-><identifier-elsif><test>•<bracket-open><block> Lookahead = 
 *    Shift on <bracket-open> to 79 because of <command-elsif>-><identifier-elsif><test>•<bracket-open><block><command-elsif> Lookahead = 
 *    Shift on <bracket-open> to 79 because of <command-elsif>-><identifier-elsif><test>•<bracket-open><block><command-else> Lookahead = 
 * ----------- 78 -----------
 *   --Itemset--
 *     <command-else>-><identifier-else><bracket-open>•<block>
 *    +<block>->•<command><block>
 *    +<block>->•<bracket-close>
 *    +<command>->•<identifier-stop><semicolon>
 *    +<command>->•<identifier-notify><string><semicolon>
 *    +<command>->•<identifier-fileinto><string><semicolon>
 *    +<command>->•<identifier-redirect><string><semicolon>
 *    +<command>->•<identifier-keep><semicolon>
 *    +<command>->•<identifier-discard><semicolon>
 *    +<command>->•<identifier-require><string-list><semicolon>
 *    +<command>->•<identifier-if><test><bracket-open><block>
 *    +<command>->•<identifier-if><test><bracket-open><block><command-elsif>
 *    +<command>->•<identifier-if><test><bracket-open><block><command-else>
 *    +<command>->•<identifier><arguments><semicolon>
 *    +<command>->•<identifier><arguments><bracket-open><block>
 *    +<command>->•<identifier><semicolon>
 *    +<command>->•<identifier><bracket-open><block>
 *   --Transitions--
 *    Goto on <block> to 80 because of <command-else>-><identifier-else><bracket-open>•<block>
 *    Goto on <command> to 57 because of <block>->•<command><block>
 *    Shift on <bracket-close> to 58 because of <block>->•<bracket-close> Lookahead = 
 *    Shift on <identifier-stop> to 6 because of <command>->•<identifier-stop><semicolon> Lookahead = 
 *    Shift on <identifier-notify> to 7 because of <command>->•<identifier-notify><string><semicolon> Lookahead = 
 *    Shift on <identifier-fileinto> to 8 because of <command>->•<identifier-fileinto><string><semicolon> Lookahead = 
 *    Shift on <identifier-redirect> to 9 because of <command>->•<identifier-redirect><string><semicolon> Lookahead = 
 *    Shift on <identifier-keep> to 10 because of <command>->•<identifier-keep><semicolon> Lookahead = 
 *    Shift on <identifier-discard> to 11 because of <command>->•<identifier-discard><semicolon> Lookahead = 
 *    Shift on <identifier-require> to 12 because of <command>->•<identifier-require><string-list><semicolon> Lookahead = 
 *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block> Lookahead = 
 *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block><command-else> Lookahead = 
 *    Shift on <identifier> to 14 because of <command>->•<identifier><arguments><semicolon> Lookahead = 
 *    Shift on <identifier> to 14 because of <command>->•<identifier><arguments><bracket-open><block> Lookahead = 
 *    Shift on <identifier> to 14 because of <command>->•<identifier><semicolon> Lookahead = 
 *    Shift on <identifier> to 14 because of <command>->•<identifier><bracket-open><block> Lookahead = 
 * ----------- 79 -----------
 *   --Itemset--
 *     <command-elsif>-><identifier-elsif><test><bracket-open>•<block>
 *     <command-elsif>-><identifier-elsif><test><bracket-open>•<block><command-elsif>
 *     <command-elsif>-><identifier-elsif><test><bracket-open>•<block><command-else>
 *    +<block>->•<command><block>
 *    +<block>->•<bracket-close>
 *    +<command>->•<identifier-stop><semicolon>
 *    +<command>->•<identifier-notify><string><semicolon>
 *    +<command>->•<identifier-fileinto><string><semicolon>
 *    +<command>->•<identifier-redirect><string><semicolon>
 *    +<command>->•<identifier-keep><semicolon>
 *    +<command>->•<identifier-discard><semicolon>
 *    +<command>->•<identifier-require><string-list><semicolon>
 *    +<command>->•<identifier-if><test><bracket-open><block>
 *    +<command>->•<identifier-if><test><bracket-open><block><command-elsif>
 *    +<command>->•<identifier-if><test><bracket-open><block><command-else>
 *    +<command>->•<identifier><arguments><semicolon>
 *    +<command>->•<identifier><arguments><bracket-open><block>
 *    +<command>->•<identifier><semicolon>
 *    +<command>->•<identifier><bracket-open><block>
 *   --Transitions--
 *    Goto on <block> to 81 because of <command-elsif>-><identifier-elsif><test><bracket-open>•<block>
 *    Goto on <block> to 81 because of <command-elsif>-><identifier-elsif><test><bracket-open>•<block><command-elsif>
 *    Goto on <block> to 81 because of <command-elsif>-><identifier-elsif><test><bracket-open>•<block><command-else>
 *    Goto on <command> to 57 because of <block>->•<command><block>
 *    Shift on <bracket-close> to 58 because of <block>->•<bracket-close> Lookahead = 
 *    Shift on <identifier-stop> to 6 because of <command>->•<identifier-stop><semicolon> Lookahead = 
 *    Shift on <identifier-notify> to 7 because of <command>->•<identifier-notify><string><semicolon> Lookahead = 
 *    Shift on <identifier-fileinto> to 8 because of <command>->•<identifier-fileinto><string><semicolon> Lookahead = 
 *    Shift on <identifier-redirect> to 9 because of <command>->•<identifier-redirect><string><semicolon> Lookahead = 
 *    Shift on <identifier-keep> to 10 because of <command>->•<identifier-keep><semicolon> Lookahead = 
 *    Shift on <identifier-discard> to 11 because of <command>->•<identifier-discard><semicolon> Lookahead = 
 *    Shift on <identifier-require> to 12 because of <command>->•<identifier-require><string-list><semicolon> Lookahead = 
 *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block> Lookahead = 
 *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block><command-else> Lookahead = 
 *    Shift on <identifier> to 14 because of <command>->•<identifier><arguments><semicolon> Lookahead = 
 *    Shift on <identifier> to 14 because of <command>->•<identifier><arguments><bracket-open><block> Lookahead = 
 *    Shift on <identifier> to 14 because of <command>->•<identifier><semicolon> Lookahead = 
 *    Shift on <identifier> to 14 because of <command>->•<identifier><bracket-open><block> Lookahead = 
 * ----------- 80 -----------
 *   --Itemset--
 *     <command-else>-><identifier-else><bracket-open><block>•
 *   --Transitions--
 *    Reduce on <identifier-stop> using <command-else>-><identifier-else><bracket-open><block> Lookahead = 
 *    Reduce on <identifier-notify> using <command-else>-><identifier-else><bracket-open><block> Lookahead = 
 *    Reduce on <identifier-fileinto> using <command-else>-><identifier-else><bracket-open><block> Lookahead = 
 *    Reduce on <identifier-redirect> using <command-else>-><identifier-else><bracket-open><block> Lookahead = 
 *    Reduce on <identifier-keep> using <command-else>-><identifier-else><bracket-open><block> Lookahead = 
 *    Reduce on <identifier-discard> using <command-else>-><identifier-else><bracket-open><block> Lookahead = 
 *    Reduce on <identifier-require> using <command-else>-><identifier-else><bracket-open><block> Lookahead = 
 *    Reduce on <identifier-if> using <command-else>-><identifier-else><bracket-open><block> Lookahead = 
 *    Reduce on <identifier> using <command-else>-><identifier-else><bracket-open><block> Lookahead = 
 *    Reduce on <bracket-close> using <command-else>-><identifier-else><bracket-open><block> Lookahead = 
 *    Reduce on <hash-comment> using <command-else>-><identifier-else><bracket-open><block> Lookahead = 
 *    Reduce on <bracket-comment> using <command-else>-><identifier-else><bracket-open><block> Lookahead = 
 *    Reduce on  using <command-else>-><identifier-else><bracket-open><block> Lookahead = 
 * ----------- 81 -----------
 *   --Itemset--
 *     <command-elsif>-><identifier-elsif><test><bracket-open><block>•
 *     <command-elsif>-><identifier-elsif><test><bracket-open><block>•<command-elsif>
 *     <command-elsif>-><identifier-elsif><test><bracket-open><block>•<command-else>
 *    +<command-elsif>->•<identifier-elsif><test><bracket-open><block>
 *    +<command-elsif>->•<identifier-elsif><test><bracket-open><block><command-elsif>
 *    +<command-elsif>->•<identifier-elsif><test><bracket-open><block><command-else>
 *    +<command-else>->•<identifier-else><bracket-open><block>
 *   --Transitions--
 *    Reduce on <identifier-stop> using <command-elsif>-><identifier-elsif><test><bracket-open><block> Lookahead = 
 *    Reduce on <identifier-notify> using <command-elsif>-><identifier-elsif><test><bracket-open><block> Lookahead = 
 *    Reduce on <identifier-fileinto> using <command-elsif>-><identifier-elsif><test><bracket-open><block> Lookahead = 
 *    Reduce on <identifier-redirect> using <command-elsif>-><identifier-elsif><test><bracket-open><block> Lookahead = 
 *    Reduce on <identifier-keep> using <command-elsif>-><identifier-elsif><test><bracket-open><block> Lookahead = 
 *    Reduce on <identifier-discard> using <command-elsif>-><identifier-elsif><test><bracket-open><block> Lookahead = 
 *    Reduce on <identifier-require> using <command-elsif>-><identifier-elsif><test><bracket-open><block> Lookahead = 
 *    Reduce on <identifier-if> using <command-elsif>-><identifier-elsif><test><bracket-open><block> Lookahead = 
 *    Reduce on <identifier> using <command-elsif>-><identifier-elsif><test><bracket-open><block> Lookahead = 
 *    Reduce on <bracket-close> using <command-elsif>-><identifier-elsif><test><bracket-open><block> Lookahead = 
 *    Reduce on <hash-comment> using <command-elsif>-><identifier-elsif><test><bracket-open><block> Lookahead = 
 *    Reduce on <bracket-comment> using <command-elsif>-><identifier-elsif><test><bracket-open><block> Lookahead = 
 *    Reduce on  using <command-elsif>-><identifier-elsif><test><bracket-open><block> Lookahead = 
 *    Goto on <command-elsif> to 82 because of <command-elsif>-><identifier-elsif><test><bracket-open><block>•<command-elsif>
 *    Goto on <command-else> to 83 because of <command-elsif>-><identifier-elsif><test><bracket-open><block>•<command-else>
 *    Shift on <identifier-elsif> to 74 because of <command-elsif>->•<identifier-elsif><test><bracket-open><block> Lookahead = 
 *    Shift on <identifier-elsif> to 74 because of <command-elsif>->•<identifier-elsif><test><bracket-open><block><command-elsif> Lookahead = 
 *    Shift on <identifier-elsif> to 74 because of <command-elsif>->•<identifier-elsif><test><bracket-open><block><command-else> Lookahead = 
 *    Shift on <identifier-else> to 75 because of <command-else>->•<identifier-else><bracket-open><block> Lookahead = 
 * ----------- 82 -----------
 *   --Itemset--
 *     <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif>•
 *   --Transitions--
 *    Reduce on <identifier-stop> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif> Lookahead = 
 *    Reduce on <identifier-notify> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif> Lookahead = 
 *    Reduce on <identifier-fileinto> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif> Lookahead = 
 *    Reduce on <identifier-redirect> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif> Lookahead = 
 *    Reduce on <identifier-keep> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif> Lookahead = 
 *    Reduce on <identifier-discard> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif> Lookahead = 
 *    Reduce on <identifier-require> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif> Lookahead = 
 *    Reduce on <identifier-if> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif> Lookahead = 
 *    Reduce on <identifier> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif> Lookahead = 
 *    Reduce on <bracket-close> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif> Lookahead = 
 *    Reduce on <hash-comment> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif> Lookahead = 
 *    Reduce on <bracket-comment> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif> Lookahead = 
 *    Reduce on  using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif> Lookahead = 
 * ----------- 83 -----------
 *   --Itemset--
 *     <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else>•
 *   --Transitions--
 *    Reduce on <identifier-stop> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else> Lookahead = 
 *    Reduce on <identifier-notify> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else> Lookahead = 
 *    Reduce on <identifier-fileinto> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else> Lookahead = 
 *    Reduce on <identifier-redirect> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else> Lookahead = 
 *    Reduce on <identifier-keep> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else> Lookahead = 
 *    Reduce on <identifier-discard> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else> Lookahead = 
 *    Reduce on <identifier-require> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else> Lookahead = 
 *    Reduce on <identifier-if> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else> Lookahead = 
 *    Reduce on <identifier> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else> Lookahead = 
 *    Reduce on <bracket-close> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else> Lookahead = 
 *    Reduce on <hash-comment> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else> Lookahead = 
 *    Reduce on <bracket-comment> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else> Lookahead = 
 *    Reduce on  using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else> Lookahead =
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
        $this->_gotoTable = unserialize('a:25:{i:0;a:5:{s:10:"<commands>";i:1;s:19:"<commented-command>";i:2;s:9:"<comment>";i:3;s:9:"<command>";i:4;s:16:"<single-comment>";i:5;}i:1;a:4:{s:19:"<commented-command>";i:17;s:9:"<comment>";i:3;s:9:"<command>";i:4;s:16:"<single-comment>";i:5;}i:3;a:2:{s:9:"<command>";i:18;s:16:"<single-comment>";i:19;}i:7;a:1:{s:8:"<string>";i:21;}i:8;a:1:{s:8:"<string>";i:24;}i:9;a:1:{s:8:"<string>";i:25;}i:12;a:2:{s:13:"<string-list>";i:28;s:8:"<string>";i:30;}i:13;a:1:{s:6:"<test>";i:31;}i:14;a:7:{s:11:"<arguments>";i:34;s:16:"<arguments-plus>";i:37;s:6:"<test>";i:38;s:11:"<test-list>";i:39;s:10:"<argument>";i:40;s:13:"<string-list>";i:42;s:8:"<string>";i:30;}i:29;a:2:{s:17:"<string-plus-csv>";i:49;s:8:"<string>";i:50;}i:32;a:1:{s:6:"<test>";i:52;}i:33;a:7:{s:11:"<arguments>";i:53;s:16:"<arguments-plus>";i:37;s:6:"<test>";i:38;s:11:"<test-list>";i:39;s:10:"<argument>";i:40;s:13:"<string-list>";i:42;s:8:"<string>";i:30;}i:36;a:2:{s:7:"<block>";i:56;s:9:"<command>";i:57;}i:37;a:5:{s:6:"<test>";i:59;s:11:"<test-list>";i:60;s:10:"<argument>";i:61;s:13:"<string-list>";i:42;s:8:"<string>";i:30;}i:41;a:2:{s:15:"<test-plus-csv>";i:62;s:6:"<test>";i:63;}i:51;a:2:{s:7:"<block>";i:66;s:9:"<command>";i:57;}i:55;a:2:{s:7:"<block>";i:67;s:9:"<command>";i:57;}i:57;a:2:{s:7:"<block>";i:68;s:9:"<command>";i:57;}i:65;a:1:{s:8:"<string>";i:71;}i:66;a:2:{s:15:"<command-elsif>";i:72;s:14:"<command-else>";i:73;}i:70;a:1:{s:6:"<test>";i:76;}i:74;a:1:{s:6:"<test>";i:77;}i:78;a:2:{s:7:"<block>";i:80;s:9:"<command>";i:57;}i:79;a:2:{s:7:"<block>";i:81;s:9:"<command>";i:57;}i:81;a:2:{s:15:"<command-elsif>";i:82;s:14:"<command-else>";i:83;}}');
        $this->_actionTable = unserialize('a:84:{i:1;a:12:{s:0:"";a:1:{s:6:"action";s:6:"accept";}s:17:"<identifier-stop>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:6;}s:19:"<identifier-notify>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:7;}s:21:"<identifier-fileinto>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:8;}s:21:"<identifier-redirect>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:9;}s:17:"<identifier-keep>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:10;}s:20:"<identifier-discard>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:11;}s:20:"<identifier-require>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:12;}s:15:"<identifier-if>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:13;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:14;}s:14:"<hash-comment>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:15;}s:17:"<bracket-comment>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:16;}}i:0;a:11:{s:17:"<identifier-stop>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:6;}s:19:"<identifier-notify>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:7;}s:21:"<identifier-fileinto>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:8;}s:21:"<identifier-redirect>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:9;}s:17:"<identifier-keep>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:10;}s:20:"<identifier-discard>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:11;}s:20:"<identifier-require>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:12;}s:15:"<identifier-if>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:13;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:14;}s:14:"<hash-comment>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:15;}s:17:"<bracket-comment>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:16;}}i:3;a:11:{s:17:"<identifier-stop>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:6;}s:19:"<identifier-notify>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:7;}s:21:"<identifier-fileinto>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:8;}s:21:"<identifier-redirect>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:9;}s:17:"<identifier-keep>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:10;}s:20:"<identifier-discard>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:11;}s:20:"<identifier-require>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:12;}s:15:"<identifier-if>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:13;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:14;}s:14:"<hash-comment>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:15;}s:17:"<bracket-comment>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:16;}}i:6;a:1:{s:11:"<semicolon>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:20;}}i:7;a:2:{s:15:"<quoted-string>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:22;}s:12:"<multi-line>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:23;}}i:8;a:2:{s:15:"<quoted-string>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:22;}s:12:"<multi-line>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:23;}}i:9;a:2:{s:15:"<quoted-string>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:22;}s:12:"<multi-line>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:23;}}i:10;a:1:{s:11:"<semicolon>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:26;}}i:11;a:1:{s:11:"<semicolon>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:27;}}i:12;a:3:{s:25:"<square-parenthesis-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:29;}s:15:"<quoted-string>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:22;}s:12:"<multi-line>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:23;}}i:13;a:2:{s:16:"<identifier-not>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:32;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:33;}}i:14;a:10:{s:11:"<semicolon>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:35;}s:14:"<bracket-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:36;}s:16:"<identifier-not>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:32;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:33;}s:18:"<parenthesis-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:41;}s:8:"<number>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:43;}s:5:"<tag>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:44;}s:25:"<square-parenthesis-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:29;}s:15:"<quoted-string>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:22;}s:12:"<multi-line>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:23;}}i:21;a:1:{s:11:"<semicolon>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:45;}}i:24;a:1:{s:11:"<semicolon>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:46;}}i:25;a:1:{s:11:"<semicolon>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:47;}}i:28;a:1:{s:11:"<semicolon>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:48;}}i:29;a:2:{s:15:"<quoted-string>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:22;}s:12:"<multi-line>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:23;}}i:31;a:1:{s:14:"<bracket-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:51;}}i:32;a:2:{s:16:"<identifier-not>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:32;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:33;}}i:33;a:12:{s:16:"<identifier-not>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:32;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:33;}s:18:"<parenthesis-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:41;}s:8:"<number>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:43;}s:5:"<tag>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:44;}s:25:"<square-parenthesis-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:29;}s:15:"<quoted-string>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:22;}s:12:"<multi-line>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:23;}s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:3:"$id";}s:15:"leftNonTerminal";s:6:"<test>";s:8:"function";s:14:"reduce_rule_34";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:3:"$id";}s:15:"leftNonTerminal";s:6:"<test>";s:8:"function";s:14:"reduce_rule_34";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:3:"$id";}s:15:"leftNonTerminal";s:6:"<test>";s:8:"function";s:14:"reduce_rule_34";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:3:"$id";}s:15:"leftNonTerminal";s:6:"<test>";s:8:"function";s:14:"reduce_rule_34";}}i:34;a:2:{s:11:"<semicolon>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:54;}s:14:"<bracket-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}}i:36;a:10:{s:15:"<bracket-close>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:58;}s:17:"<identifier-stop>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:6;}s:19:"<identifier-notify>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:7;}s:21:"<identifier-fileinto>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:8;}s:21:"<identifier-redirect>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:9;}s:17:"<identifier-keep>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:10;}s:20:"<identifier-discard>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:11;}s:20:"<identifier-require>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:12;}s:15:"<identifier-if>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:13;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:14;}}i:37;a:12:{s:16:"<identifier-not>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:32;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:33;}s:18:"<parenthesis-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:41;}s:8:"<number>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:43;}s:5:"<tag>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:44;}s:25:"<square-parenthesis-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:29;}s:15:"<quoted-string>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:22;}s:12:"<multi-line>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:23;}s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:5:"$args";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_25";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:5:"$args";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_25";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:5:"$args";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_25";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:5:"$args";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_25";}}i:41;a:2:{s:16:"<identifier-not>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:32;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:33;}}i:49;a:2:{s:26:"<square-parenthesis-close>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:64;}s:7:"<comma>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:65;}}i:51;a:10:{s:15:"<bracket-close>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:58;}s:17:"<identifier-stop>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:6;}s:19:"<identifier-notify>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:7;}s:21:"<identifier-fileinto>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:8;}s:21:"<identifier-redirect>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:9;}s:17:"<identifier-keep>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:10;}s:20:"<identifier-discard>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:11;}s:20:"<identifier-require>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:12;}s:15:"<identifier-if>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:13;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:14;}}i:55;a:10:{s:15:"<bracket-close>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:58;}s:17:"<identifier-stop>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:6;}s:19:"<identifier-notify>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:7;}s:21:"<identifier-fileinto>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:8;}s:21:"<identifier-redirect>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:9;}s:17:"<identifier-keep>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:10;}s:20:"<identifier-discard>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:11;}s:20:"<identifier-require>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:12;}s:15:"<identifier-if>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:13;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:14;}}i:57;a:10:{s:15:"<bracket-close>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:58;}s:17:"<identifier-stop>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:6;}s:19:"<identifier-notify>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:7;}s:21:"<identifier-fileinto>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:8;}s:21:"<identifier-redirect>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:9;}s:17:"<identifier-keep>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:10;}s:20:"<identifier-discard>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:11;}s:20:"<identifier-require>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:12;}s:15:"<identifier-if>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:13;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:14;}}i:62;a:2:{s:19:"<parenthesis-close>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:69;}s:7:"<comma>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:70;}}i:65;a:2:{s:15:"<quoted-string>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:22;}s:12:"<multi-line>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:23;}}i:66;a:15:{s:18:"<identifier-elsif>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:74;}s:17:"<identifier-else>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:75;}s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_12";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_12";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_12";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_12";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_12";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_12";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_12";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_12";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_12";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_12";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_12";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_12";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_12";}}i:70;a:2:{s:16:"<identifier-not>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:32;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:33;}}i:74;a:2:{s:16:"<identifier-not>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:32;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:33;}}i:75;a:1:{s:14:"<bracket-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:78;}}i:77;a:1:{s:14:"<bracket-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:79;}}i:78;a:10:{s:15:"<bracket-close>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:58;}s:17:"<identifier-stop>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:6;}s:19:"<identifier-notify>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:7;}s:21:"<identifier-fileinto>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:8;}s:21:"<identifier-redirect>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:9;}s:17:"<identifier-keep>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:10;}s:20:"<identifier-discard>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:11;}s:20:"<identifier-require>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:12;}s:15:"<identifier-if>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:13;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:14;}}i:79;a:10:{s:15:"<bracket-close>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:58;}s:17:"<identifier-stop>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:6;}s:19:"<identifier-notify>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:7;}s:21:"<identifier-fileinto>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:8;}s:21:"<identifier-redirect>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:9;}s:17:"<identifier-keep>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:10;}s:20:"<identifier-discard>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:11;}s:20:"<identifier-require>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:12;}s:15:"<identifier-if>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:13;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:14;}}i:81;a:15:{s:18:"<identifier-elsif>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:74;}s:17:"<identifier-else>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:75;}s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_15";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_15";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_15";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_15";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_15";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_15";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_15";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_15";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_15";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_15";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_15";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_15";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_15";}}i:2;a:12:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_2";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_2";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_2";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_2";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_2";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_2";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_2";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_2";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_2";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_2";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_2";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_2";}}i:4;a:12:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_4";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_4";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_4";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_4";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_4";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_4";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_4";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_4";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_4";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_4";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_4";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_4";}}i:5;a:11:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_48";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_48";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_48";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_48";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_48";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_48";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_48";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_48";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_48";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_48";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_48";}}i:15;a:11:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_49";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_49";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_49";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_49";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_49";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_49";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_49";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_49";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_49";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_49";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_49";}}i:16;a:11:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_50";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_50";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_50";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_50";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_50";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_50";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_50";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_50";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_50";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_50";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_50";}}i:17;a:12:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_1";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_1";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_1";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_1";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_1";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_1";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_1";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_1";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_1";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_1";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_1";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_1";}}i:18;a:12:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_3";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_3";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_3";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_3";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_3";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_3";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_3";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_3";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_3";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_3";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_3";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_3";}}i:19;a:11:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_47";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_47";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_47";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_47";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_47";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_47";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_47";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_47";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_47";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_47";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_47";}}i:20;a:13:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_5";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_5";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_5";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_5";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_5";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_5";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_5";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_5";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_5";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_5";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_5";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_5";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_5";}}i:22;a:13:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_45";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_45";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_45";}s:16:"<identifier-not>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_45";}s:18:"<parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_45";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_45";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_45";}s:8:"<number>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_45";}s:5:"<tag>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_45";}s:25:"<square-parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_45";}s:26:"<square-parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_45";}s:15:"<quoted-string>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_45";}s:12:"<multi-line>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_45";}}i:23;a:13:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_46";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_46";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_46";}s:16:"<identifier-not>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_46";}s:18:"<parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_46";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_46";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_46";}s:8:"<number>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_46";}s:5:"<tag>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_46";}s:25:"<square-parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_46";}s:26:"<square-parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_46";}s:15:"<quoted-string>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_46";}s:12:"<multi-line>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_46";}}i:26;a:13:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_9";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_9";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_9";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_9";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_9";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_9";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_9";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_9";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_9";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_9";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_9";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_9";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_9";}}i:27;a:13:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_10";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_10";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_10";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_10";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_10";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_10";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_10";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_10";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_10";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_10";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_10";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_10";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_10";}}i:30;a:12:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_42";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_42";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_42";}s:16:"<identifier-not>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_42";}s:18:"<parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_42";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_42";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_42";}s:8:"<number>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_42";}s:5:"<tag>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_42";}s:25:"<square-parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_42";}s:15:"<quoted-string>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_42";}s:12:"<multi-line>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_42";}}i:35;a:13:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_21";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_21";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_21";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_21";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_21";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_21";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_21";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_21";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_21";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_21";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_21";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_21";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_21";}}i:38;a:2:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:5:"$test";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_28";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:5:"$test";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_28";}}i:39;a:4:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:6:"$tests";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_29";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:6:"$tests";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_29";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:6:"$tests";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_29";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:6:"$tests";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_29";}}i:40;a:12:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_31";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_31";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_31";}s:16:"<identifier-not>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_31";}s:18:"<parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_31";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_31";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_31";}s:8:"<number>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_31";}s:5:"<tag>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_31";}s:25:"<square-parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_31";}s:15:"<quoted-string>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_31";}s:12:"<multi-line>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_31";}}i:42;a:12:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_38";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_38";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_38";}s:16:"<identifier-not>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_38";}s:18:"<parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_38";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_38";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_38";}s:8:"<number>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_38";}s:5:"<tag>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_38";}s:25:"<square-parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_38";}s:15:"<quoted-string>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_38";}s:12:"<multi-line>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_38";}}i:43;a:12:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_39";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_39";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_39";}s:16:"<identifier-not>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_39";}s:18:"<parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_39";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_39";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_39";}s:8:"<number>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_39";}s:5:"<tag>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_39";}s:25:"<square-parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_39";}s:15:"<quoted-string>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_39";}s:12:"<multi-line>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_39";}}i:44;a:12:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_40";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_40";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_40";}s:16:"<identifier-not>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_40";}s:18:"<parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_40";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_40";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_40";}s:8:"<number>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_40";}s:5:"<tag>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_40";}s:25:"<square-parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_40";}s:15:"<quoted-string>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_40";}s:12:"<multi-line>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_40";}}i:45;a:13:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:12:"$destination";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_6";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:12:"$destination";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_6";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:12:"$destination";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_6";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:12:"$destination";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_6";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:12:"$destination";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_6";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:12:"$destination";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_6";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:12:"$destination";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_6";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:12:"$destination";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_6";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:12:"$destination";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_6";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:12:"$destination";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_6";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:12:"$destination";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_6";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:12:"$destination";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_6";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:12:"$destination";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_6";}}i:46;a:13:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$mailbox";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_7";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$mailbox";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_7";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$mailbox";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_7";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$mailbox";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_7";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$mailbox";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_7";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$mailbox";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_7";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$mailbox";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_7";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$mailbox";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_7";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$mailbox";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_7";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$mailbox";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_7";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$mailbox";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_7";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$mailbox";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_7";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$mailbox";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_7";}}i:47;a:13:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$address";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_8";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$address";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_8";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$address";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_8";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$address";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_8";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$address";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_8";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$address";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_8";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$address";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_8";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$address";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_8";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$address";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_8";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$address";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_8";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$address";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_8";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$address";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_8";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$address";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_8";}}i:48;a:13:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:13:"$capabilities";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_11";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:13:"$capabilities";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_11";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:13:"$capabilities";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_11";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:13:"$capabilities";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_11";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:13:"$capabilities";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_11";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:13:"$capabilities";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_11";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:13:"$capabilities";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_11";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:13:"$capabilities";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_11";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:13:"$capabilities";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_11";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:13:"$capabilities";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_11";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:13:"$capabilities";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_11";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:13:"$capabilities";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_11";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:13:"$capabilities";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_11";}}i:50;a:2:{s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:17:"<string-plus-csv>";s:8:"function";s:14:"reduce_rule_43";}s:26:"<square-parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:17:"<string-plus-csv>";s:8:"function";s:14:"reduce_rule_43";}}i:52;a:4:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:5:"$test";}s:15:"leftNonTerminal";s:6:"<test>";s:8:"function";s:14:"reduce_rule_32";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:5:"$test";}s:15:"leftNonTerminal";s:6:"<test>";s:8:"function";s:14:"reduce_rule_32";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:5:"$test";}s:15:"leftNonTerminal";s:6:"<test>";s:8:"function";s:14:"reduce_rule_32";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:5:"$test";}s:15:"leftNonTerminal";s:6:"<test>";s:8:"function";s:14:"reduce_rule_32";}}i:53;a:4:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:5:"$args";}s:15:"leftNonTerminal";s:6:"<test>";s:8:"function";s:14:"reduce_rule_33";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:5:"$args";}s:15:"leftNonTerminal";s:6:"<test>";s:8:"function";s:14:"reduce_rule_33";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:5:"$args";}s:15:"leftNonTerminal";s:6:"<test>";s:8:"function";s:14:"reduce_rule_33";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:5:"$args";}s:15:"leftNonTerminal";s:6:"<test>";s:8:"function";s:14:"reduce_rule_33";}}i:54;a:13:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_19";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_19";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_19";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_19";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_19";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_19";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_19";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_19";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_19";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_19";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_19";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_19";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_19";}}i:56;a:13:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_22";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_22";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_22";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_22";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_22";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_22";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_22";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_22";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_22";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_22";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_22";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_22";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_22";}}i:58;a:15:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_24";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_24";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_24";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_24";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_24";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_24";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_24";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_24";}s:18:"<identifier-elsif>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_24";}s:17:"<identifier-else>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_24";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_24";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_24";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_24";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_24";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_24";}}i:59;a:2:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:5:"$args";i:1;s:5:"$test";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_26";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:5:"$args";i:1;s:5:"$test";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_26";}}i:60;a:4:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:5:"$args";i:1;s:6:"$tests";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_27";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:5:"$args";i:1;s:6:"$tests";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_27";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:5:"$args";i:1;s:6:"$tests";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_27";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:5:"$args";i:1;s:6:"$tests";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_27";}}i:61;a:12:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_30";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_30";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_30";}s:16:"<identifier-not>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_30";}s:18:"<parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_30";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_30";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_30";}s:8:"<number>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_30";}s:5:"<tag>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_30";}s:25:"<square-parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_30";}s:15:"<quoted-string>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_30";}s:12:"<multi-line>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_30";}}i:63;a:2:{s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:5:"$test";}s:15:"leftNonTerminal";s:15:"<test-plus-csv>";s:8:"function";s:14:"reduce_rule_36";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:5:"$test";}s:15:"leftNonTerminal";s:15:"<test-plus-csv>";s:8:"function";s:14:"reduce_rule_36";}}i:64;a:12:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_41";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_41";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_41";}s:16:"<identifier-not>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_41";}s:18:"<parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_41";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_41";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_41";}s:8:"<number>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_41";}s:5:"<tag>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_41";}s:25:"<square-parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_41";}s:15:"<quoted-string>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_41";}s:12:"<multi-line>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_41";}}i:67;a:13:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_20";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_20";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_20";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_20";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_20";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_20";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_20";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_20";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_20";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_20";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_20";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_20";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_20";}}i:68;a:15:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_23";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_23";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_23";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_23";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_23";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_23";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_23";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_23";}s:18:"<identifier-elsif>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_23";}s:17:"<identifier-else>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_23";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_23";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_23";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_23";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_23";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_23";}}i:69;a:4:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:6:"$tests";i:2;s:0:"";}s:15:"leftNonTerminal";s:11:"<test-list>";s:8:"function";s:14:"reduce_rule_35";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:6:"$tests";i:2;s:0:"";}s:15:"leftNonTerminal";s:11:"<test-list>";s:8:"function";s:14:"reduce_rule_35";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:6:"$tests";i:2;s:0:"";}s:15:"leftNonTerminal";s:11:"<test-list>";s:8:"function";s:14:"reduce_rule_35";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:6:"$tests";i:2;s:0:"";}s:15:"leftNonTerminal";s:11:"<test-list>";s:8:"function";s:14:"reduce_rule_35";}}i:71;a:2:{s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:4:"$acc";i:1;s:0:"";i:2;s:4:"$str";}s:15:"leftNonTerminal";s:17:"<string-plus-csv>";s:8:"function";s:14:"reduce_rule_44";}s:26:"<square-parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:4:"$acc";i:1;s:0:"";i:2;s:4:"$str";}s:15:"leftNonTerminal";s:17:"<string-plus-csv>";s:8:"function";s:14:"reduce_rule_44";}}i:72;a:13:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_13";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_13";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_13";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_13";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_13";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_13";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_13";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_13";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_13";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_13";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_13";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_13";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_13";}}i:73;a:13:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_14";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_14";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_14";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_14";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_14";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_14";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_14";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_14";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_14";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_14";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_14";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_14";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_14";}}i:76;a:2:{s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:4:"$acc";i:1;s:0:"";i:2;s:5:"$test";}s:15:"leftNonTerminal";s:15:"<test-plus-csv>";s:8:"function";s:14:"reduce_rule_37";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:4:"$acc";i:1;s:0:"";i:2;s:5:"$test";}s:15:"leftNonTerminal";s:15:"<test-plus-csv>";s:8:"function";s:14:"reduce_rule_37";}}i:80;a:13:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:14:"<command-else>";s:8:"function";s:14:"reduce_rule_18";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:14:"<command-else>";s:8:"function";s:14:"reduce_rule_18";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:14:"<command-else>";s:8:"function";s:14:"reduce_rule_18";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:14:"<command-else>";s:8:"function";s:14:"reduce_rule_18";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:14:"<command-else>";s:8:"function";s:14:"reduce_rule_18";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:14:"<command-else>";s:8:"function";s:14:"reduce_rule_18";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:14:"<command-else>";s:8:"function";s:14:"reduce_rule_18";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:14:"<command-else>";s:8:"function";s:14:"reduce_rule_18";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:14:"<command-else>";s:8:"function";s:14:"reduce_rule_18";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:14:"<command-else>";s:8:"function";s:14:"reduce_rule_18";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:14:"<command-else>";s:8:"function";s:14:"reduce_rule_18";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:14:"<command-else>";s:8:"function";s:14:"reduce_rule_18";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:14:"<command-else>";s:8:"function";s:14:"reduce_rule_18";}}i:82;a:13:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_16";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_16";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_16";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_16";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_16";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_16";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_16";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_16";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_16";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_16";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_16";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_16";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_16";}}i:83;a:13:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_17";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_17";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_17";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_17";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_17";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_17";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_17";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_17";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_17";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_17";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_17";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_17";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_17";}}}');
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
        $command->getValue()->setComment($comment->getValue());
        return new \sergiosgc\Text_Tokenizer_Token('<commented-command>', $command->getValue());
        return new \sergiosgc\Text_Tokenizer_Token('<commented-command>', $result);
    }
    /* }}} */
    /* reduce_rule_48 {{{ */
    /**
     * Reduction function for rule 48 
     *
     * Rule 48 is:
     * <comment>-><single-comment>
     *
     * @param Text_Tokenizer_Token Token of type '<single-comment>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<comment>' token
     */
    protected function reduce_rule_48($singleComment = null)
    {
            if (isset($comment)) {
            $comment->getValue()->text .= $singleComment->getValue();
            return $comment;
        }
        $result = new \sergiosgc\Sieve_Parser\Script_Comment($singleComment->getValue());
        return new \sergiosgc\Text_Tokenizer_Token('<comment>', $result);
    }
    /* }}} */
    /* reduce_rule_49 {{{ */
    /**
     * Reduction function for rule 49 
     *
     * Rule 49 is:
     * <single-comment>-><hash-comment>
     *
     * @param Text_Tokenizer_Token Token of type '<hash-comment>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<single-comment>' token
     */
    protected function reduce_rule_49($comment = null)
    {
            $result = $comment->getValue();
        return new \sergiosgc\Text_Tokenizer_Token('<single-comment>', $result);
    }
    /* }}} */
    /* reduce_rule_50 {{{ */
    /**
     * Reduction function for rule 50 
     *
     * Rule 50 is:
     * <single-comment>-><bracket-comment>
     *
     * @param Text_Tokenizer_Token Token of type '<bracket-comment>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<single-comment>' token
     */
    protected function reduce_rule_50($comment = null)
    {
            $result = $comment->getValue();
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
        $command->getValue()->setComment($comment->getValue());
        return new \sergiosgc\Text_Tokenizer_Token('<commented-command>', $command->getValue());
        return new \sergiosgc\Text_Tokenizer_Token('<commented-command>', $result);
    }
    /* }}} */
    /* reduce_rule_47 {{{ */
    /**
     * Reduction function for rule 47 
     *
     * Rule 47 is:
     * <comment>-><comment><single-comment>
     *
     * @param Text_Tokenizer_Token Token of type '<comment>'
     * @param Text_Tokenizer_Token Token of type '<single-comment>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<comment>' token
     */
    protected function reduce_rule_47($comment = null,$singleComment = null)
    {
            if (isset($comment)) {
            $comment->getValue()->text .= $singleComment->getValue();
            return $comment;
        }
        $result = new \sergiosgc\Sieve_Parser\Script_Comment($singleComment->getValue());
        return new \sergiosgc\Text_Tokenizer_Token('<comment>', $result);
    }
    /* }}} */
    /* reduce_rule_5 {{{ */
    /**
     * Reduction function for rule 5 
     *
     * Rule 5 is:
     * <command>-><identifier-stop><semicolon>
     *
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
     */
    protected function reduce_rule_5()
    {
            $result = new \sergiosgc\Sieve_Parser\Script_Command_Stop();
        return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
    }
    /* }}} */
    /* reduce_rule_45 {{{ */
    /**
     * Reduction function for rule 45 
     *
     * Rule 45 is:
     * <string>-><quoted-string>
     *
     * @param Text_Tokenizer_Token Token of type '<quoted-string>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<string>' token
     */
    protected function reduce_rule_45($quoted = null)
    {
            $result = isset($quoted) ?
            strtr($quoted->getValue(), [ '\\r' => "\r", '\\n' => "\n", '\\\\' => '\\' ]) : # Unquote string
            substr($multiline->getValue(), 0, -3); # Remove .CRLF marker
        return new \sergiosgc\Text_Tokenizer_Token('<string>', $result);
    }
    /* }}} */
    /* reduce_rule_46 {{{ */
    /**
     * Reduction function for rule 46 
     *
     * Rule 46 is:
     * <string>-><multi-line>
     *
     * @param Text_Tokenizer_Token Token of type '<multi-line>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<string>' token
     */
    protected function reduce_rule_46($multiline = null)
    {
            $result = isset($quoted) ?
            strtr($quoted->getValue(), [ '\\r' => "\r", '\\n' => "\n", '\\\\' => '\\' ]) : # Unquote string
            substr($multiline->getValue(), 0, -3); # Remove .CRLF marker
        return new \sergiosgc\Text_Tokenizer_Token('<string>', $result);
    }
    /* }}} */
    /* reduce_rule_9 {{{ */
    /**
     * Reduction function for rule 9 
     *
     * Rule 9 is:
     * <command>-><identifier-keep><semicolon>
     *
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
     */
    protected function reduce_rule_9()
    {
            $result = new \sergiosgc\Sieve_Parser\Script_Command_Keep();
        return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
    }
    /* }}} */
    /* reduce_rule_10 {{{ */
    /**
     * Reduction function for rule 10 
     *
     * Rule 10 is:
     * <command>-><identifier-discard><semicolon>
     *
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
     */
    protected function reduce_rule_10()
    {
            $result = new \sergiosgc\Sieve_Parser\Script_Command_Discard();
        return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
    }
    /* }}} */
    /* reduce_rule_42 {{{ */
    /**
     * Reduction function for rule 42 
     *
     * Rule 42 is:
     * <string-list>-><string>
     *
     * @param Text_Tokenizer_Token Token of type '<string>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<string-list>' token
     */
    protected function reduce_rule_42($str = null)
    {
            if (isset($str)) return new \sergiosgc\Text_Tokenizer_Token('<string-list>', $str->getValue());
        return new \sergiosgc\Text_Tokenizer_Token('<string-list>', $strArr->getValue());
        return new \sergiosgc\Text_Tokenizer_Token('<string-list>', $result);
    }
    /* }}} */
    /* reduce_rule_34 {{{ */
    /**
     * Reduction function for rule 34 
     *
     * Rule 34 is:
     * <test>-><identifier>
     *
     * @param Text_Tokenizer_Token Token of type '<identifier>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<test>' token
     */
    protected function reduce_rule_34($id = null)
    {
            if (isset($args)) {
            $result = new \sergiosgc\Sieve_Parser\Script_Test($id->getValue(), array_merge($args->getValue()['arguments'], $args->getValue()['tests']));
        } else {
            $result = new \sergiosgc\Sieve_Parser\Script_Test($id->getValue(), []);
        }
        return new \sergiosgc\Text_Tokenizer_Token('<test>', $result);
    }
    /* }}} */
    /* reduce_rule_21 {{{ */
    /**
     * Reduction function for rule 21 
     *
     * Rule 21 is:
     * <command>-><identifier><semicolon>
     *
     * @param Text_Tokenizer_Token Token of type '<identifier>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
     */
    protected function reduce_rule_21($id = null)
    {
            if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments>', [ 'arguments' => [], 'tests' => [] ]);
        if (!isset($block)) $block = new \sergiosgc\Text_Tokenizer_Token('<block>', []);
        $result = new \sergiosgc\Sieve_Parser\Script_Command_Generic(
            $id->getValue(),
            array_merge($args->getValue()['arguments'], $args->getValue()['tests']),
            $block->getValue());
        return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
    }
    /* }}} */
    /* reduce_rule_25 {{{ */
    /**
     * Reduction function for rule 25 
     *
     * Rule 25 is:
     * <arguments>-><arguments-plus>
     *
     * @param Text_Tokenizer_Token Token of type '<arguments-plus>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<arguments>' token
     */
    protected function reduce_rule_25($args = null)
    {
            if (isset($tests)) $debug = true;
        if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments-plus>', []);
        if (!isset($tests)) $tests = new \sergiosgc\Text_Tokenizer_Token('<test-list>', []);
        if (isset($test)) array_unshift($tests->getValue(), $test->getValue());
        $result = [ 'arguments' => $args->getValue(), 'tests' => $tests->getValue() ];
        return new \sergiosgc\Text_Tokenizer_Token('<arguments>', $result);
    }
    /* }}} */
    /* reduce_rule_28 {{{ */
    /**
     * Reduction function for rule 28 
     *
     * Rule 28 is:
     * <arguments>-><test>
     *
     * @param Text_Tokenizer_Token Token of type '<test>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<arguments>' token
     */
    protected function reduce_rule_28($test = null)
    {
            if (isset($tests)) $debug = true;
        if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments-plus>', []);
        if (!isset($tests)) $tests = new \sergiosgc\Text_Tokenizer_Token('<test-list>', []);
        if (isset($test)) array_unshift($tests->getValue(), $test->getValue());
        $result = [ 'arguments' => $args->getValue(), 'tests' => $tests->getValue() ];
        return new \sergiosgc\Text_Tokenizer_Token('<arguments>', $result);
    }
    /* }}} */
    /* reduce_rule_29 {{{ */
    /**
     * Reduction function for rule 29 
     *
     * Rule 29 is:
     * <arguments>-><test-list>
     *
     * @param Text_Tokenizer_Token Token of type '<test-list>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<arguments>' token
     */
    protected function reduce_rule_29($tests = null)
    {
            if (isset($tests)) $debug = true;
        if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments-plus>', []);
        if (!isset($tests)) $tests = new \sergiosgc\Text_Tokenizer_Token('<test-list>', []);
        if (isset($test)) array_unshift($tests->getValue(), $test->getValue());
        $result = [ 'arguments' => $args->getValue(), 'tests' => $tests->getValue() ];
        return new \sergiosgc\Text_Tokenizer_Token('<arguments>', $result);
    }
    /* }}} */
    /* reduce_rule_31 {{{ */
    /**
     * Reduction function for rule 31 
     *
     * Rule 31 is:
     * <arguments-plus>-><argument>
     *
     * @param Text_Tokenizer_Token Token of type '<argument>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<arguments-plus>' token
     */
    protected function reduce_rule_31($arg = null)
    {
            if (!isset($acc)) $acc = new \sergiosgc\Text_Tokenizer_Token('<arguments-plus>', []);
        array_push($acc->getValue(), $arg->getValue());
        return $acc;
        return new \sergiosgc\Text_Tokenizer_Token('<arguments-plus>', $result);
    }
    /* }}} */
    /* reduce_rule_38 {{{ */
    /**
     * Reduction function for rule 38 
     *
     * Rule 38 is:
     * <argument>-><string-list>
     *
     * @param Text_Tokenizer_Token Token of type '<string-list>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<argument>' token
     */
    protected function reduce_rule_38($arg = null)
    {
            if (isset($tag)) return new \sergiosgc\Text_Tokenizer_Token('<argument>', new \sergiosgc\Sieve_Parser\Script_Tag($tag->getValue()));
        $result = $arg->getValue();
        return new \sergiosgc\Text_Tokenizer_Token('<argument>', $result);
    }
    /* }}} */
    /* reduce_rule_39 {{{ */
    /**
     * Reduction function for rule 39 
     *
     * Rule 39 is:
     * <argument>-><number>
     *
     * @param Text_Tokenizer_Token Token of type '<number>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<argument>' token
     */
    protected function reduce_rule_39($arg = null)
    {
            if (isset($tag)) return new \sergiosgc\Text_Tokenizer_Token('<argument>', new \sergiosgc\Sieve_Parser\Script_Tag($tag->getValue()));
        $result = $arg->getValue();
        return new \sergiosgc\Text_Tokenizer_Token('<argument>', $result);
    }
    /* }}} */
    /* reduce_rule_40 {{{ */
    /**
     * Reduction function for rule 40 
     *
     * Rule 40 is:
     * <argument>-><tag>
     *
     * @param Text_Tokenizer_Token Token of type '<tag>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<argument>' token
     */
    protected function reduce_rule_40($tag = null)
    {
            if (isset($tag)) return new \sergiosgc\Text_Tokenizer_Token('<argument>', new \sergiosgc\Sieve_Parser\Script_Tag($tag->getValue()));
        $result = $arg->getValue();
        return new \sergiosgc\Text_Tokenizer_Token('<argument>', $result);
    }
    /* }}} */
    /* reduce_rule_6 {{{ */
    /**
     * Reduction function for rule 6 
     *
     * Rule 6 is:
     * <command>-><identifier-notify><string><semicolon>
     *
     * @param Text_Tokenizer_Token Token of type '<string>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
     */
    protected function reduce_rule_6($destination = null)
    {
            $result = new \sergiosgc\Sieve_Parser\Script_Command_Generic('notify', [$destination->getValue()]);
        return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
    }
    /* }}} */
    /* reduce_rule_7 {{{ */
    /**
     * Reduction function for rule 7 
     *
     * Rule 7 is:
     * <command>-><identifier-fileinto><string><semicolon>
     *
     * @param Text_Tokenizer_Token Token of type '<string>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
     */
    protected function reduce_rule_7($mailbox = null)
    {
            $result = new \sergiosgc\Sieve_Parser\Script_Command_Fileinto($mailbox->getValue());
        return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
    }
    /* }}} */
    /* reduce_rule_8 {{{ */
    /**
     * Reduction function for rule 8 
     *
     * Rule 8 is:
     * <command>-><identifier-redirect><string><semicolon>
     *
     * @param Text_Tokenizer_Token Token of type '<string>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
     */
    protected function reduce_rule_8($address = null)
    {
            $result = new \sergiosgc\Sieve_Parser\Script_Command_Redirect($address->getValue());
        return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
    }
    /* }}} */
    /* reduce_rule_11 {{{ */
    /**
     * Reduction function for rule 11 
     *
     * Rule 11 is:
     * <command>-><identifier-require><string-list><semicolon>
     *
     * @param Text_Tokenizer_Token Token of type '<string-list>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
     */
    protected function reduce_rule_11($capabilities = null)
    {
            $result = new \sergiosgc\Sieve_Parser\Script_Command_Require($capabilities->getValue());
        return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
    }
    /* }}} */
    /* reduce_rule_43 {{{ */
    /**
     * Reduction function for rule 43 
     *
     * Rule 43 is:
     * <string-plus-csv>-><string>
     *
     * @param Text_Tokenizer_Token Token of type '<string>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<string-plus-csv>' token
     */
    protected function reduce_rule_43($str = null)
    {
            if (!isset($acc)) $acc = new \sergiosgc\Text_Tokenizer_Token('<string-plus-csv>', []);
        array_push($acc->getValue(), $str->getValue());
        return $acc;
        return new \sergiosgc\Text_Tokenizer_Token('<string-plus-csv>', $result);
    }
    /* }}} */
    /* reduce_rule_32 {{{ */
    /**
     * Reduction function for rule 32 
     *
     * Rule 32 is:
     * <test>-><identifier-not><test>
     *
     * @param Text_Tokenizer_Token Token of type '<test>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<test>' token
     */
    protected function reduce_rule_32($test = null)
    {
            $result = new \sergiosgc\Sieve_Parser\Script_Test('not', [ $test->getValue() ]);
        return new \sergiosgc\Text_Tokenizer_Token('<test>', $result);
    }
    /* }}} */
    /* reduce_rule_33 {{{ */
    /**
     * Reduction function for rule 33 
     *
     * Rule 33 is:
     * <test>-><identifier><arguments>
     *
     * @param Text_Tokenizer_Token Token of type '<identifier>'
     * @param Text_Tokenizer_Token Token of type '<arguments>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<test>' token
     */
    protected function reduce_rule_33($id = null,$args = null)
    {
            if (isset($args)) {
            $result = new \sergiosgc\Sieve_Parser\Script_Test($id->getValue(), array_merge($args->getValue()['arguments'], $args->getValue()['tests']));
        } else {
            $result = new \sergiosgc\Sieve_Parser\Script_Test($id->getValue(), []);
        }
        return new \sergiosgc\Text_Tokenizer_Token('<test>', $result);
    }
    /* }}} */
    /* reduce_rule_19 {{{ */
    /**
     * Reduction function for rule 19 
     *
     * Rule 19 is:
     * <command>-><identifier><arguments><semicolon>
     *
     * @param Text_Tokenizer_Token Token of type '<identifier>'
     * @param Text_Tokenizer_Token Token of type '<arguments>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
     */
    protected function reduce_rule_19($id = null,$args = null)
    {
            if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments>', [ 'arguments' => [], 'tests' => [] ]);
        if (!isset($block)) $block = new \sergiosgc\Text_Tokenizer_Token('<block>', []);
        $result = new \sergiosgc\Sieve_Parser\Script_Command_Generic(
            $id->getValue(),
            array_merge($args->getValue()['arguments'], $args->getValue()['tests']),
            $block->getValue());
        return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
    }
    /* }}} */
    /* reduce_rule_22 {{{ */
    /**
     * Reduction function for rule 22 
     *
     * Rule 22 is:
     * <command>-><identifier><bracket-open><block>
     *
     * @param Text_Tokenizer_Token Token of type '<identifier>'
     * @param Text_Tokenizer_Token Token of type '<block>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
     */
    protected function reduce_rule_22($id = null,$block = null)
    {
            if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments>', [ 'arguments' => [], 'tests' => [] ]);
        if (!isset($block)) $block = new \sergiosgc\Text_Tokenizer_Token('<block>', []);
        $result = new \sergiosgc\Sieve_Parser\Script_Command_Generic(
            $id->getValue(),
            array_merge($args->getValue()['arguments'], $args->getValue()['tests']),
            $block->getValue());
        return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
    }
    /* }}} */
    /* reduce_rule_24 {{{ */
    /**
     * Reduction function for rule 24 
     *
     * Rule 24 is:
     * <block>-><bracket-close>
     *
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<block>' token
     */
    protected function reduce_rule_24()
    {
            if (!isset($acc)) $acc = new \sergiosgc\Text_Tokenizer_Token('<block>', []);
        if (isset($command)) array_unshift($acc->getValue(), $command->getValue());
        return $acc;
        return new \sergiosgc\Text_Tokenizer_Token('<block>', $result);
    }
    /* }}} */
    /* reduce_rule_26 {{{ */
    /**
     * Reduction function for rule 26 
     *
     * Rule 26 is:
     * <arguments>-><arguments-plus><test>
     *
     * @param Text_Tokenizer_Token Token of type '<arguments-plus>'
     * @param Text_Tokenizer_Token Token of type '<test>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<arguments>' token
     */
    protected function reduce_rule_26($args = null,$test = null)
    {
            if (isset($tests)) $debug = true;
        if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments-plus>', []);
        if (!isset($tests)) $tests = new \sergiosgc\Text_Tokenizer_Token('<test-list>', []);
        if (isset($test)) array_unshift($tests->getValue(), $test->getValue());
        $result = [ 'arguments' => $args->getValue(), 'tests' => $tests->getValue() ];
        return new \sergiosgc\Text_Tokenizer_Token('<arguments>', $result);
    }
    /* }}} */
    /* reduce_rule_27 {{{ */
    /**
     * Reduction function for rule 27 
     *
     * Rule 27 is:
     * <arguments>-><arguments-plus><test-list>
     *
     * @param Text_Tokenizer_Token Token of type '<arguments-plus>'
     * @param Text_Tokenizer_Token Token of type '<test-list>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<arguments>' token
     */
    protected function reduce_rule_27($args = null,$tests = null)
    {
            if (isset($tests)) $debug = true;
        if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments-plus>', []);
        if (!isset($tests)) $tests = new \sergiosgc\Text_Tokenizer_Token('<test-list>', []);
        if (isset($test)) array_unshift($tests->getValue(), $test->getValue());
        $result = [ 'arguments' => $args->getValue(), 'tests' => $tests->getValue() ];
        return new \sergiosgc\Text_Tokenizer_Token('<arguments>', $result);
    }
    /* }}} */
    /* reduce_rule_30 {{{ */
    /**
     * Reduction function for rule 30 
     *
     * Rule 30 is:
     * <arguments-plus>-><arguments-plus><argument>
     *
     * @param Text_Tokenizer_Token Token of type '<arguments-plus>'
     * @param Text_Tokenizer_Token Token of type '<argument>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<arguments-plus>' token
     */
    protected function reduce_rule_30($acc = null,$arg = null)
    {
            if (!isset($acc)) $acc = new \sergiosgc\Text_Tokenizer_Token('<arguments-plus>', []);
        array_push($acc->getValue(), $arg->getValue());
        return $acc;
        return new \sergiosgc\Text_Tokenizer_Token('<arguments-plus>', $result);
    }
    /* }}} */
    /* reduce_rule_36 {{{ */
    /**
     * Reduction function for rule 36 
     *
     * Rule 36 is:
     * <test-plus-csv>-><test>
     *
     * @param Text_Tokenizer_Token Token of type '<test>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<test-plus-csv>' token
     */
    protected function reduce_rule_36($test = null)
    {
            if (!isset($acc)) $acc = new \sergiosgc\Text_Tokenizer_Token('<test-plus-csv>', []);
        array_unshift($acc->getValue(), $test->getValue());
        return $acc;
        return new \sergiosgc\Text_Tokenizer_Token('<test-plus-csv>', $result);
    }
    /* }}} */
    /* reduce_rule_41 {{{ */
    /**
     * Reduction function for rule 41 
     *
     * Rule 41 is:
     * <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close>
     *
     * @param Text_Tokenizer_Token Token of type '<string-plus-csv>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<string-list>' token
     */
    protected function reduce_rule_41($strArr = null)
    {
            if (isset($str)) return new \sergiosgc\Text_Tokenizer_Token('<string-list>', $str->getValue());
        return new \sergiosgc\Text_Tokenizer_Token('<string-list>', $strArr->getValue());
        return new \sergiosgc\Text_Tokenizer_Token('<string-list>', $result);
    }
    /* }}} */
    /* reduce_rule_12 {{{ */
    /**
     * Reduction function for rule 12 
     *
     * Rule 12 is:
     * <command>-><identifier-if><test><bracket-open><block>
     *
     * @param Text_Tokenizer_Token Token of type '<test>'
     * @param Text_Tokenizer_Token Token of type '<block>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
     */
    protected function reduce_rule_12($test = null,$block = null)
    {
            $result = new \sergiosgc\Sieve_Parser\Script_Command_If('if', $test->getValue(), $block->getValue(), isset($else) ? $else->getValue() : null);
        return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
    }
    /* }}} */
    /* reduce_rule_20 {{{ */
    /**
     * Reduction function for rule 20 
     *
     * Rule 20 is:
     * <command>-><identifier><arguments><bracket-open><block>
     *
     * @param Text_Tokenizer_Token Token of type '<identifier>'
     * @param Text_Tokenizer_Token Token of type '<arguments>'
     * @param Text_Tokenizer_Token Token of type '<block>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
     */
    protected function reduce_rule_20($id = null,$args = null,$block = null)
    {
            if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments>', [ 'arguments' => [], 'tests' => [] ]);
        if (!isset($block)) $block = new \sergiosgc\Text_Tokenizer_Token('<block>', []);
        $result = new \sergiosgc\Sieve_Parser\Script_Command_Generic(
            $id->getValue(),
            array_merge($args->getValue()['arguments'], $args->getValue()['tests']),
            $block->getValue());
        return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
    }
    /* }}} */
    /* reduce_rule_23 {{{ */
    /**
     * Reduction function for rule 23 
     *
     * Rule 23 is:
     * <block>-><command><block>
     *
     * @param Text_Tokenizer_Token Token of type '<command>'
     * @param Text_Tokenizer_Token Token of type '<block>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<block>' token
     */
    protected function reduce_rule_23($command = null,$acc = null)
    {
            if (!isset($acc)) $acc = new \sergiosgc\Text_Tokenizer_Token('<block>', []);
        if (isset($command)) array_unshift($acc->getValue(), $command->getValue());
        return $acc;
        return new \sergiosgc\Text_Tokenizer_Token('<block>', $result);
    }
    /* }}} */
    /* reduce_rule_35 {{{ */
    /**
     * Reduction function for rule 35 
     *
     * Rule 35 is:
     * <test-list>-><parenthesis-open><test-plus-csv><parenthesis-close>
     *
     * @param Text_Tokenizer_Token Token of type '<test-plus-csv>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<test-list>' token
     */
    protected function reduce_rule_35($tests = null)
    {
            $result = $tests->getValue();
        return new \sergiosgc\Text_Tokenizer_Token('<test-list>', $result);
    }
    /* }}} */
    /* reduce_rule_44 {{{ */
    /**
     * Reduction function for rule 44 
     *
     * Rule 44 is:
     * <string-plus-csv>-><string-plus-csv><comma><string>
     *
     * @param Text_Tokenizer_Token Token of type '<string-plus-csv>'
     * @param Text_Tokenizer_Token Token of type '<string>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<string-plus-csv>' token
     */
    protected function reduce_rule_44($acc = null,$str = null)
    {
            if (!isset($acc)) $acc = new \sergiosgc\Text_Tokenizer_Token('<string-plus-csv>', []);
        array_push($acc->getValue(), $str->getValue());
        return $acc;
        return new \sergiosgc\Text_Tokenizer_Token('<string-plus-csv>', $result);
    }
    /* }}} */
    /* reduce_rule_13 {{{ */
    /**
     * Reduction function for rule 13 
     *
     * Rule 13 is:
     * <command>-><identifier-if><test><bracket-open><block><command-elsif>
     *
     * @param Text_Tokenizer_Token Token of type '<test>'
     * @param Text_Tokenizer_Token Token of type '<block>'
     * @param Text_Tokenizer_Token Token of type '<command-elsif>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
     */
    protected function reduce_rule_13($test = null,$block = null,$else = null)
    {
            $result = new \sergiosgc\Sieve_Parser\Script_Command_If('if', $test->getValue(), $block->getValue(), isset($else) ? $else->getValue() : null);
        return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
    }
    /* }}} */
    /* reduce_rule_14 {{{ */
    /**
     * Reduction function for rule 14 
     *
     * Rule 14 is:
     * <command>-><identifier-if><test><bracket-open><block><command-else>
     *
     * @param Text_Tokenizer_Token Token of type '<test>'
     * @param Text_Tokenizer_Token Token of type '<block>'
     * @param Text_Tokenizer_Token Token of type '<command-else>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
     */
    protected function reduce_rule_14($test = null,$block = null,$else = null)
    {
            $result = new \sergiosgc\Sieve_Parser\Script_Command_If('if', $test->getValue(), $block->getValue(), isset($else) ? $else->getValue() : null);
        return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
    }
    /* }}} */
    /* reduce_rule_37 {{{ */
    /**
     * Reduction function for rule 37 
     *
     * Rule 37 is:
     * <test-plus-csv>-><test-plus-csv><comma><test>
     *
     * @param Text_Tokenizer_Token Token of type '<test-plus-csv>'
     * @param Text_Tokenizer_Token Token of type '<test>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<test-plus-csv>' token
     */
    protected function reduce_rule_37($acc = null,$test = null)
    {
            if (!isset($acc)) $acc = new \sergiosgc\Text_Tokenizer_Token('<test-plus-csv>', []);
        array_unshift($acc->getValue(), $test->getValue());
        return $acc;
        return new \sergiosgc\Text_Tokenizer_Token('<test-plus-csv>', $result);
    }
    /* }}} */
    /* reduce_rule_18 {{{ */
    /**
     * Reduction function for rule 18 
     *
     * Rule 18 is:
     * <command-else>-><identifier-else><bracket-open><block>
     *
     * @param Text_Tokenizer_Token Token of type '<block>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command-else>' token
     */
    protected function reduce_rule_18($block = null)
    {
            $result = new \sergiosgc\Sieve_Parser\Script_Command_If('else', null, $block->getValue());
        return new \sergiosgc\Text_Tokenizer_Token('<command-else>', $result);
    }
    /* }}} */
    /* reduce_rule_15 {{{ */
    /**
     * Reduction function for rule 15 
     *
     * Rule 15 is:
     * <command-elsif>-><identifier-elsif><test><bracket-open><block>
     *
     * @param Text_Tokenizer_Token Token of type '<test>'
     * @param Text_Tokenizer_Token Token of type '<block>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command-elsif>' token
     */
    protected function reduce_rule_15($test = null,$block = null)
    {
            $result = new \sergiosgc\Sieve_Parser\Script_Command_If('elsif', $test->getValue(), $block->getValue(), isset($else) ? $else->getValue() : null);
        return new \sergiosgc\Text_Tokenizer_Token('<command-elsif>', $result);
    }
    /* }}} */
    /* reduce_rule_16 {{{ */
    /**
     * Reduction function for rule 16 
     *
     * Rule 16 is:
     * <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif>
     *
     * @param Text_Tokenizer_Token Token of type '<test>'
     * @param Text_Tokenizer_Token Token of type '<block>'
     * @param Text_Tokenizer_Token Token of type '<command-elsif>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command-elsif>' token
     */
    protected function reduce_rule_16($test = null,$block = null,$else = null)
    {
            $result = new \sergiosgc\Sieve_Parser\Script_Command_If('elsif', $test->getValue(), $block->getValue(), isset($else) ? $else->getValue() : null);
        return new \sergiosgc\Text_Tokenizer_Token('<command-elsif>', $result);
    }
    /* }}} */
    /* reduce_rule_17 {{{ */
    /**
     * Reduction function for rule 17 
     *
     * Rule 17 is:
     * <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else>
     *
     * @param Text_Tokenizer_Token Token of type '<test>'
     * @param Text_Tokenizer_Token Token of type '<block>'
     * @param Text_Tokenizer_Token Token of type '<command-else>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command-elsif>' token
     */
    protected function reduce_rule_17($test = null,$block = null,$else = null)
    {
            $result = new \sergiosgc\Sieve_Parser\Script_Command_If('elsif', $test->getValue(), $block->getValue(), isset($else) ? $else->getValue() : null);
        return new \sergiosgc\Text_Tokenizer_Token('<command-elsif>', $result);
    }
    /* }}} */
}
?>