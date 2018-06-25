--TEST--
Parse sieve grammar
--FILE--
<?php
require_once(__DIR__ . '/../vendor/autoload.php');

$tokenizer = new \sergiosgc\Text_Parser_BNF_Tokenizer(
    file_get_contents(getcwd() . '/inputs/grammar.txt'),
    new \sergiosgc\Text_Tokenizer_Regex_Matcher_Php());

$sieveGrammar = (new \sergiosgc\Text_Parser_BNF($tokenizer))->parse()->getValue();
//$parser->setDebugLevel(10);
$generator = new \sergiosgc\Text_Parser_Generator_LALR($sieveGrammar);
foreach (explode("\n", $generator->generate('TestSieveParser')) as $lineNo => $line) printf("% 5d: %s\n", $lineNo+1, $line);
try {
    eval($generator->generate('TestSieveParser'));
} catch (\sergiosgc\Text_Parser_Generator_ShiftReduceConflictException $ex) {
    print($ex->getMessage());
}

$tokenizer = new \sergiosgc\Sieve_Parser\Tokenizer(
    file_get_contents(__DIR__ . '/inputs/1.txt'),
    new \sergiosgc\Text_Tokenizer_Regex_Matcher_Php());

$parser = new TestSieveParser($tokenizer);
$parser->setDebugLevel(10);
//try {
    var_dump($parser->parse());
//} catch (\sergiosgc\Text_Parser_UnexpectedTokenException $ex) {
//    print($ex->getMessage());
//}
?>
--EXPECT--
    1: /* vim: set expandtab tabstop=4 shiftwidth=4 foldmethod=marker: */
    2: /**
    3:  *
    4:  * This is an automatically generated parser for the following grammar:
    5:  *
    6:  * [0] <start>-><commands>
    7:  * [1] <commands>-><commands><commented-command>
    8:  * [2] <commands>-><commented-command>
    9:  * [3] <commented-command>-><comment><command>
   10:  * [4] <commented-command>-><command>
   11:  * [5] <command>-><identifier><arguments><semicolon>
   12:  * [6] <command>-><identifier><arguments><bracket-open><block>
   13:  * [7] <command>-><identifier><semicolon>
   14:  * [8] <command>-><identifier><bracket-open><block>
   15:  * [9] <block>-><command><block>
   16:  * [10] <block>-><bracket-close>
   17:  * [11] <arguments>-><arguments-plus>
   18:  * [12] <arguments>-><arguments-plus><test>
   19:  * [13] <arguments>-><arguments-plus><test-list>
   20:  * [14] <arguments>-><test>
   21:  * [15] <arguments>-><test-list>
   22:  * [16] <arguments-plus>-><arguments-plus><argument>
   23:  * [17] <arguments-plus>-><argument>
   24:  * [18] <test>-><identifier><arguments>
   25:  * [19] <test>-><identifier>
   26:  * [20] <test-list>-><parenthesis-open><test-plus-csv><parenthesis-close>
   27:  * [21] <test-plus-csv>-><test>
   28:  * [22] <test-plus-csv>-><test><comma><test-plus-csv>
   29:  * [23] <argument>-><string-list>
   30:  * [24] <argument>-><number>
   31:  * [25] <argument>-><tag>
   32:  * [26] <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close>
   33:  * [27] <string-list>-><string>
   34:  * [28] <string-plus-csv>-><string>
   35:  * [29] <string-plus-csv>-><string-plus-csv><comma><string>
   36:  * [30] <string>-><quoted-string>
   37:  * [31] <string>-><multi-line>
   38:  * [32] <comment>-><comment><single-comment>
   39:  * [33] <comment>-><single-comment>
   40:  * [34] <single-comment>-><hash-comment>
   41:  * [35] <single-comment>-><bracket-comment>
   42:  *
   43:  * -- Finite State Automaton States --
   44:  * ----------- 0 -----------
   45:  *   --Itemset--
   46:  *     <start>->•<commands>
   47:  *    +<commands>->•<commands><commented-command>
   48:  *    +<commands>->•<commented-command>
   49:  *    +<commented-command>->•<comment><command>
   50:  *    +<commented-command>->•<command>
   51:  *    +<comment>->•<comment><single-comment>
   52:  *    +<comment>->•<single-comment>
   53:  *    +<command>->•<identifier><arguments><semicolon>
   54:  *    +<command>->•<identifier><arguments><bracket-open><block>
   55:  *    +<command>->•<identifier><semicolon>
   56:  *    +<command>->•<identifier><bracket-open><block>
   57:  *    +<single-comment>->•<hash-comment>
   58:  *    +<single-comment>->•<bracket-comment>
   59:  *   --Transitions--
   60:  *    Goto on <commands> to 1 because of <start>->•<commands>
   61:  *    Goto on <commands> to 1 because of <commands>->•<commands><commented-command>
   62:  *    Goto on <commented-command> to 2 because of <commands>->•<commented-command>
   63:  *    Goto on <comment> to 3 because of <commented-command>->•<comment><command>
   64:  *    Goto on <command> to 4 because of <commented-command>->•<command>
   65:  *    Goto on <comment> to 3 because of <comment>->•<comment><single-comment>
   66:  *    Goto on <single-comment> to 5 because of <comment>->•<single-comment>
   67:  *    Shift on <identifier> to 6 because of <command>->•<identifier><arguments><semicolon> Lookahead = 
   68:  *    Shift on <identifier> to 6 because of <command>->•<identifier><arguments><bracket-open><block> Lookahead = 
   69:  *    Shift on <identifier> to 6 because of <command>->•<identifier><semicolon> Lookahead = 
   70:  *    Shift on <identifier> to 6 because of <command>->•<identifier><bracket-open><block> Lookahead = 
   71:  *    Shift on <hash-comment> to 7 because of <single-comment>->•<hash-comment> Lookahead = 
   72:  *    Shift on <bracket-comment> to 8 because of <single-comment>->•<bracket-comment> Lookahead = 
   73:  * ----------- 1 -----------
   74:  *   --Itemset--
   75:  *     <start>-><commands>•
   76:  *     <commands>-><commands>•<commented-command>
   77:  *    +<commented-command>->•<comment><command>
   78:  *    +<commented-command>->•<command>
   79:  *    +<comment>->•<comment><single-comment>
   80:  *    +<comment>->•<single-comment>
   81:  *    +<command>->•<identifier><arguments><semicolon>
   82:  *    +<command>->•<identifier><arguments><bracket-open><block>
   83:  *    +<command>->•<identifier><semicolon>
   84:  *    +<command>->•<identifier><bracket-open><block>
   85:  *    +<single-comment>->•<hash-comment>
   86:  *    +<single-comment>->•<bracket-comment>
   87:  *   --Transitions--
   88:  *    Accept on  using <start>-><commands>
   89:  *    Goto on <commented-command> to 9 because of <commands>-><commands>•<commented-command>
   90:  *    Goto on <comment> to 3 because of <commented-command>->•<comment><command>
   91:  *    Goto on <command> to 4 because of <commented-command>->•<command>
   92:  *    Goto on <comment> to 3 because of <comment>->•<comment><single-comment>
   93:  *    Goto on <single-comment> to 5 because of <comment>->•<single-comment>
   94:  *    Shift on <identifier> to 6 because of <command>->•<identifier><arguments><semicolon> Lookahead = 
   95:  *    Shift on <identifier> to 6 because of <command>->•<identifier><arguments><bracket-open><block> Lookahead = 
   96:  *    Shift on <identifier> to 6 because of <command>->•<identifier><semicolon> Lookahead = 
   97:  *    Shift on <identifier> to 6 because of <command>->•<identifier><bracket-open><block> Lookahead = 
   98:  *    Shift on <hash-comment> to 7 because of <single-comment>->•<hash-comment> Lookahead = 
   99:  *    Shift on <bracket-comment> to 8 because of <single-comment>->•<bracket-comment> Lookahead = 
  100:  * ----------- 2 -----------
  101:  *   --Itemset--
  102:  *     <commands>-><commented-command>•
  103:  *   --Transitions--
  104:  *    Reduce on <identifier> using <commands>-><commented-command> Lookahead = 
  105:  *    Reduce on <hash-comment> using <commands>-><commented-command> Lookahead = 
  106:  *    Reduce on <bracket-comment> using <commands>-><commented-command> Lookahead = 
  107:  *    Reduce on  using <commands>-><commented-command> Lookahead = 
  108:  * ----------- 3 -----------
  109:  *   --Itemset--
  110:  *     <commented-command>-><comment>•<command>
  111:  *     <comment>-><comment>•<single-comment>
  112:  *    +<command>->•<identifier><arguments><semicolon>
  113:  *    +<command>->•<identifier><arguments><bracket-open><block>
  114:  *    +<command>->•<identifier><semicolon>
  115:  *    +<command>->•<identifier><bracket-open><block>
  116:  *    +<single-comment>->•<hash-comment>
  117:  *    +<single-comment>->•<bracket-comment>
  118:  *   --Transitions--
  119:  *    Goto on <command> to 10 because of <commented-command>-><comment>•<command>
  120:  *    Goto on <single-comment> to 11 because of <comment>-><comment>•<single-comment>
  121:  *    Shift on <identifier> to 6 because of <command>->•<identifier><arguments><semicolon> Lookahead = 
  122:  *    Shift on <identifier> to 6 because of <command>->•<identifier><arguments><bracket-open><block> Lookahead = 
  123:  *    Shift on <identifier> to 6 because of <command>->•<identifier><semicolon> Lookahead = 
  124:  *    Shift on <identifier> to 6 because of <command>->•<identifier><bracket-open><block> Lookahead = 
  125:  *    Shift on <hash-comment> to 7 because of <single-comment>->•<hash-comment> Lookahead = 
  126:  *    Shift on <bracket-comment> to 8 because of <single-comment>->•<bracket-comment> Lookahead = 
  127:  * ----------- 4 -----------
  128:  *   --Itemset--
  129:  *     <commented-command>-><command>•
  130:  *   --Transitions--
  131:  *    Reduce on <identifier> using <commented-command>-><command> Lookahead = 
  132:  *    Reduce on <hash-comment> using <commented-command>-><command> Lookahead = 
  133:  *    Reduce on <bracket-comment> using <commented-command>-><command> Lookahead = 
  134:  *    Reduce on  using <commented-command>-><command> Lookahead = 
  135:  * ----------- 5 -----------
  136:  *   --Itemset--
  137:  *     <comment>-><single-comment>•
  138:  *   --Transitions--
  139:  *    Reduce on <identifier> using <comment>-><single-comment> Lookahead = 
  140:  *    Reduce on <hash-comment> using <comment>-><single-comment> Lookahead = 
  141:  *    Reduce on <bracket-comment> using <comment>-><single-comment> Lookahead = 
  142:  * ----------- 6 -----------
  143:  *   --Itemset--
  144:  *     <command>-><identifier>•<arguments><semicolon>
  145:  *     <command>-><identifier>•<arguments><bracket-open><block>
  146:  *     <command>-><identifier>•<semicolon>
  147:  *     <command>-><identifier>•<bracket-open><block>
  148:  *    +<arguments>->•<arguments-plus>
  149:  *    +<arguments>->•<arguments-plus><test>
  150:  *    +<arguments>->•<arguments-plus><test-list>
  151:  *    +<arguments>->•<test>
  152:  *    +<arguments>->•<test-list>
  153:  *    +<arguments-plus>->•<arguments-plus><argument>
  154:  *    +<arguments-plus>->•<argument>
  155:  *    +<test>->•<identifier><arguments>
  156:  *    +<test>->•<identifier>
  157:  *    +<test-list>->•<parenthesis-open><test-plus-csv><parenthesis-close>
  158:  *    +<argument>->•<string-list>
  159:  *    +<argument>->•<number>
  160:  *    +<argument>->•<tag>
  161:  *    +<string-list>->•<square-parenthesis-open><string-plus-csv><square-parenthesis-close>
  162:  *    +<string-list>->•<string>
  163:  *    +<string>->•<quoted-string>
  164:  *    +<string>->•<multi-line>
  165:  *   --Transitions--
  166:  *    Goto on <arguments> to 12 because of <command>-><identifier>•<arguments><semicolon>
  167:  *    Goto on <arguments> to 12 because of <command>-><identifier>•<arguments><bracket-open><block>
  168:  *    Shift on <semicolon> to 13 because of <command>-><identifier>•<semicolon> Lookahead = 
  169:  *    Shift on <bracket-open> to 14 because of <command>-><identifier>•<bracket-open><block> Lookahead = 
  170:  *    Goto on <arguments-plus> to 15 because of <arguments>->•<arguments-plus>
  171:  *    Goto on <arguments-plus> to 15 because of <arguments>->•<arguments-plus><test>
  172:  *    Goto on <arguments-plus> to 15 because of <arguments>->•<arguments-plus><test-list>
  173:  *    Goto on <test> to 16 because of <arguments>->•<test>
  174:  *    Goto on <test-list> to 17 because of <arguments>->•<test-list>
  175:  *    Goto on <arguments-plus> to 15 because of <arguments-plus>->•<arguments-plus><argument>
  176:  *    Goto on <argument> to 18 because of <arguments-plus>->•<argument>
  177:  *    Shift on <identifier> to 19 because of <test>->•<identifier><arguments> Lookahead = 
  178:  *    Shift on <identifier> to 19 because of <test>->•<identifier> Lookahead = 
  179:  *    Shift on <parenthesis-open> to 20 because of <test-list>->•<parenthesis-open><test-plus-csv><parenthesis-close> Lookahead = 
  180:  *    Goto on <string-list> to 21 because of <argument>->•<string-list>
  181:  *    Shift on <number> to 22 because of <argument>->•<number> Lookahead = 
  182:  *    Shift on <tag> to 23 because of <argument>->•<tag> Lookahead = 
  183:  *    Shift on <square-parenthesis-open> to 24 because of <string-list>->•<square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
  184:  *    Goto on <string> to 25 because of <string-list>->•<string>
  185:  *    Shift on <quoted-string> to 26 because of <string>->•<quoted-string> Lookahead = 
  186:  *    Shift on <multi-line> to 27 because of <string>->•<multi-line> Lookahead = 
  187:  * ----------- 7 -----------
  188:  *   --Itemset--
  189:  *     <single-comment>-><hash-comment>•
  190:  *   --Transitions--
  191:  *    Reduce on <identifier> using <single-comment>-><hash-comment> Lookahead = 
  192:  *    Reduce on <hash-comment> using <single-comment>-><hash-comment> Lookahead = 
  193:  *    Reduce on <bracket-comment> using <single-comment>-><hash-comment> Lookahead = 
  194:  * ----------- 8 -----------
  195:  *   --Itemset--
  196:  *     <single-comment>-><bracket-comment>•
  197:  *   --Transitions--
  198:  *    Reduce on <identifier> using <single-comment>-><bracket-comment> Lookahead = 
  199:  *    Reduce on <hash-comment> using <single-comment>-><bracket-comment> Lookahead = 
  200:  *    Reduce on <bracket-comment> using <single-comment>-><bracket-comment> Lookahead = 
  201:  * ----------- 9 -----------
  202:  *   --Itemset--
  203:  *     <commands>-><commands><commented-command>•
  204:  *   --Transitions--
  205:  *    Reduce on <identifier> using <commands>-><commands><commented-command> Lookahead = 
  206:  *    Reduce on <hash-comment> using <commands>-><commands><commented-command> Lookahead = 
  207:  *    Reduce on <bracket-comment> using <commands>-><commands><commented-command> Lookahead = 
  208:  *    Reduce on  using <commands>-><commands><commented-command> Lookahead = 
  209:  * ----------- 10 -----------
  210:  *   --Itemset--
  211:  *     <commented-command>-><comment><command>•
  212:  *   --Transitions--
  213:  *    Reduce on <identifier> using <commented-command>-><comment><command> Lookahead = 
  214:  *    Reduce on <hash-comment> using <commented-command>-><comment><command> Lookahead = 
  215:  *    Reduce on <bracket-comment> using <commented-command>-><comment><command> Lookahead = 
  216:  *    Reduce on  using <commented-command>-><comment><command> Lookahead = 
  217:  * ----------- 11 -----------
  218:  *   --Itemset--
  219:  *     <comment>-><comment><single-comment>•
  220:  *   --Transitions--
  221:  *    Reduce on <identifier> using <comment>-><comment><single-comment> Lookahead = 
  222:  *    Reduce on <hash-comment> using <comment>-><comment><single-comment> Lookahead = 
  223:  *    Reduce on <bracket-comment> using <comment>-><comment><single-comment> Lookahead = 
  224:  * ----------- 12 -----------
  225:  *   --Itemset--
  226:  *     <command>-><identifier><arguments>•<semicolon>
  227:  *     <command>-><identifier><arguments>•<bracket-open><block>
  228:  *   --Transitions--
  229:  *    Shift on <semicolon> to 28 because of <command>-><identifier><arguments>•<semicolon> Lookahead = 
  230:  *    Shift on <bracket-open> to 29 because of <command>-><identifier><arguments>•<bracket-open><block> Lookahead = 
  231:  * ----------- 13 -----------
  232:  *   --Itemset--
  233:  *     <command>-><identifier><semicolon>•
  234:  *   --Transitions--
  235:  *    Reduce on <identifier> using <command>-><identifier><semicolon> Lookahead = 
  236:  *    Reduce on <bracket-close> using <command>-><identifier><semicolon> Lookahead = 
  237:  *    Reduce on <hash-comment> using <command>-><identifier><semicolon> Lookahead = 
  238:  *    Reduce on <bracket-comment> using <command>-><identifier><semicolon> Lookahead = 
  239:  *    Reduce on  using <command>-><identifier><semicolon> Lookahead = 
  240:  * ----------- 14 -----------
  241:  *   --Itemset--
  242:  *     <command>-><identifier><bracket-open>•<block>
  243:  *    +<block>->•<command><block>
  244:  *    +<block>->•<bracket-close>
  245:  *    +<command>->•<identifier><arguments><semicolon>
  246:  *    +<command>->•<identifier><arguments><bracket-open><block>
  247:  *    +<command>->•<identifier><semicolon>
  248:  *    +<command>->•<identifier><bracket-open><block>
  249:  *   --Transitions--
  250:  *    Goto on <block> to 30 because of <command>-><identifier><bracket-open>•<block>
  251:  *    Goto on <command> to 31 because of <block>->•<command><block>
  252:  *    Shift on <bracket-close> to 32 because of <block>->•<bracket-close> Lookahead = 
  253:  *    Shift on <identifier> to 6 because of <command>->•<identifier><arguments><semicolon> Lookahead = 
  254:  *    Shift on <identifier> to 6 because of <command>->•<identifier><arguments><bracket-open><block> Lookahead = 
  255:  *    Shift on <identifier> to 6 because of <command>->•<identifier><semicolon> Lookahead = 
  256:  *    Shift on <identifier> to 6 because of <command>->•<identifier><bracket-open><block> Lookahead = 
  257:  * ----------- 15 -----------
  258:  *   --Itemset--
  259:  *     <arguments>-><arguments-plus>•
  260:  *     <arguments>-><arguments-plus>•<test>
  261:  *     <arguments>-><arguments-plus>•<test-list>
  262:  *     <arguments-plus>-><arguments-plus>•<argument>
  263:  *    +<test>->•<identifier><arguments>
  264:  *    +<test>->•<identifier>
  265:  *    +<test-list>->•<parenthesis-open><test-plus-csv><parenthesis-close>
  266:  *    +<argument>->•<string-list>
  267:  *    +<argument>->•<number>
  268:  *    +<argument>->•<tag>
  269:  *    +<string-list>->•<square-parenthesis-open><string-plus-csv><square-parenthesis-close>
  270:  *    +<string-list>->•<string>
  271:  *    +<string>->•<quoted-string>
  272:  *    +<string>->•<multi-line>
  273:  *   --Transitions--
  274:  *    Reduce on <semicolon> using <arguments>-><arguments-plus> Lookahead = 
  275:  *    Reduce on <bracket-open> using <arguments>-><arguments-plus> Lookahead = 
  276:  *    Reduce on <parenthesis-close> using <arguments>-><arguments-plus> Lookahead = 
  277:  *    Reduce on <comma> using <arguments>-><arguments-plus> Lookahead = 
  278:  *    Goto on <test> to 33 because of <arguments>-><arguments-plus>•<test>
  279:  *    Goto on <test-list> to 34 because of <arguments>-><arguments-plus>•<test-list>
  280:  *    Goto on <argument> to 35 because of <arguments-plus>-><arguments-plus>•<argument>
  281:  *    Shift on <identifier> to 19 because of <test>->•<identifier><arguments> Lookahead = 
  282:  *    Shift on <identifier> to 19 because of <test>->•<identifier> Lookahead = 
  283:  *    Shift on <parenthesis-open> to 20 because of <test-list>->•<parenthesis-open><test-plus-csv><parenthesis-close> Lookahead = 
  284:  *    Goto on <string-list> to 21 because of <argument>->•<string-list>
  285:  *    Shift on <number> to 22 because of <argument>->•<number> Lookahead = 
  286:  *    Shift on <tag> to 23 because of <argument>->•<tag> Lookahead = 
  287:  *    Shift on <square-parenthesis-open> to 24 because of <string-list>->•<square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
  288:  *    Goto on <string> to 25 because of <string-list>->•<string>
  289:  *    Shift on <quoted-string> to 26 because of <string>->•<quoted-string> Lookahead = 
  290:  *    Shift on <multi-line> to 27 because of <string>->•<multi-line> Lookahead = 
  291:  * ----------- 16 -----------
  292:  *   --Itemset--
  293:  *     <arguments>-><test>•
  294:  *   --Transitions--
  295:  *    Reduce on <semicolon> using <arguments>-><test> Lookahead = 
  296:  *    Reduce on <bracket-open> using <arguments>-><test> Lookahead = 
  297:  * ----------- 17 -----------
  298:  *   --Itemset--
  299:  *     <arguments>-><test-list>•
  300:  *   --Transitions--
  301:  *    Reduce on <semicolon> using <arguments>-><test-list> Lookahead = 
  302:  *    Reduce on <bracket-open> using <arguments>-><test-list> Lookahead = 
  303:  *    Reduce on <parenthesis-close> using <arguments>-><test-list> Lookahead = 
  304:  *    Reduce on <comma> using <arguments>-><test-list> Lookahead = 
  305:  * ----------- 18 -----------
  306:  *   --Itemset--
  307:  *     <arguments-plus>-><argument>•
  308:  *   --Transitions--
  309:  *    Reduce on <identifier> using <arguments-plus>-><argument> Lookahead = 
  310:  *    Reduce on <semicolon> using <arguments-plus>-><argument> Lookahead = 
  311:  *    Reduce on <bracket-open> using <arguments-plus>-><argument> Lookahead = 
  312:  *    Reduce on <parenthesis-open> using <arguments-plus>-><argument> Lookahead = 
  313:  *    Reduce on <parenthesis-close> using <arguments-plus>-><argument> Lookahead = 
  314:  *    Reduce on <comma> using <arguments-plus>-><argument> Lookahead = 
  315:  *    Reduce on <number> using <arguments-plus>-><argument> Lookahead = 
  316:  *    Reduce on <tag> using <arguments-plus>-><argument> Lookahead = 
  317:  *    Reduce on <square-parenthesis-open> using <arguments-plus>-><argument> Lookahead = 
  318:  *    Reduce on <quoted-string> using <arguments-plus>-><argument> Lookahead = 
  319:  *    Reduce on <multi-line> using <arguments-plus>-><argument> Lookahead = 
  320:  * ----------- 19 -----------
  321:  *   --Itemset--
  322:  *     <test>-><identifier>•<arguments>
  323:  *     <test>-><identifier>•
  324:  *    +<arguments>->•<arguments-plus>
  325:  *    +<arguments>->•<arguments-plus><test>
  326:  *    +<arguments>->•<arguments-plus><test-list>
  327:  *    +<arguments>->•<test>
  328:  *    +<arguments>->•<test-list>
  329:  *    +<arguments-plus>->•<arguments-plus><argument>
  330:  *    +<arguments-plus>->•<argument>
  331:  *    +<test>->•<identifier><arguments>
  332:  *    +<test>->•<identifier>
  333:  *    +<test-list>->•<parenthesis-open><test-plus-csv><parenthesis-close>
  334:  *    +<argument>->•<string-list>
  335:  *    +<argument>->•<number>
  336:  *    +<argument>->•<tag>
  337:  *    +<string-list>->•<square-parenthesis-open><string-plus-csv><square-parenthesis-close>
  338:  *    +<string-list>->•<string>
  339:  *    +<string>->•<quoted-string>
  340:  *    +<string>->•<multi-line>
  341:  *   --Transitions--
  342:  *    Goto on <arguments> to 36 because of <test>-><identifier>•<arguments>
  343:  *    Reduce on <semicolon> using <test>-><identifier> Lookahead = 
  344:  *    Reduce on <bracket-open> using <test>-><identifier> Lookahead = 
  345:  *    Reduce on <parenthesis-close> using <test>-><identifier> Lookahead = 
  346:  *    Reduce on <comma> using <test>-><identifier> Lookahead = 
  347:  *    Goto on <arguments-plus> to 15 because of <arguments>->•<arguments-plus>
  348:  *    Goto on <arguments-plus> to 15 because of <arguments>->•<arguments-plus><test>
  349:  *    Goto on <arguments-plus> to 15 because of <arguments>->•<arguments-plus><test-list>
  350:  *    Goto on <test> to 16 because of <arguments>->•<test>
  351:  *    Goto on <test-list> to 17 because of <arguments>->•<test-list>
  352:  *    Goto on <arguments-plus> to 15 because of <arguments-plus>->•<arguments-plus><argument>
  353:  *    Goto on <argument> to 18 because of <arguments-plus>->•<argument>
  354:  *    Shift on <identifier> to 19 because of <test>->•<identifier><arguments> Lookahead = 
  355:  *    Shift on <identifier> to 19 because of <test>->•<identifier> Lookahead = 
  356:  *    Shift on <parenthesis-open> to 20 because of <test-list>->•<parenthesis-open><test-plus-csv><parenthesis-close> Lookahead = 
  357:  *    Goto on <string-list> to 21 because of <argument>->•<string-list>
  358:  *    Shift on <number> to 22 because of <argument>->•<number> Lookahead = 
  359:  *    Shift on <tag> to 23 because of <argument>->•<tag> Lookahead = 
  360:  *    Shift on <square-parenthesis-open> to 24 because of <string-list>->•<square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
  361:  *    Goto on <string> to 25 because of <string-list>->•<string>
  362:  *    Shift on <quoted-string> to 26 because of <string>->•<quoted-string> Lookahead = 
  363:  *    Shift on <multi-line> to 27 because of <string>->•<multi-line> Lookahead = 
  364:  * ----------- 20 -----------
  365:  *   --Itemset--
  366:  *     <test-list>-><parenthesis-open>•<test-plus-csv><parenthesis-close>
  367:  *    +<test-plus-csv>->•<test>
  368:  *    +<test-plus-csv>->•<test><comma><test-plus-csv>
  369:  *    +<test>->•<identifier><arguments>
  370:  *    +<test>->•<identifier>
  371:  *   --Transitions--
  372:  *    Goto on <test-plus-csv> to 37 because of <test-list>-><parenthesis-open>•<test-plus-csv><parenthesis-close>
  373:  *    Goto on <test> to 38 because of <test-plus-csv>->•<test>
  374:  *    Goto on <test> to 38 because of <test-plus-csv>->•<test><comma><test-plus-csv>
  375:  *    Shift on <identifier> to 19 because of <test>->•<identifier><arguments> Lookahead = 
  376:  *    Shift on <identifier> to 19 because of <test>->•<identifier> Lookahead = 
  377:  * ----------- 21 -----------
  378:  *   --Itemset--
  379:  *     <argument>-><string-list>•
  380:  *   --Transitions--
  381:  *    Reduce on <identifier> using <argument>-><string-list> Lookahead = 
  382:  *    Reduce on <semicolon> using <argument>-><string-list> Lookahead = 
  383:  *    Reduce on <bracket-open> using <argument>-><string-list> Lookahead = 
  384:  *    Reduce on <parenthesis-open> using <argument>-><string-list> Lookahead = 
  385:  *    Reduce on <parenthesis-close> using <argument>-><string-list> Lookahead = 
  386:  *    Reduce on <comma> using <argument>-><string-list> Lookahead = 
  387:  *    Reduce on <number> using <argument>-><string-list> Lookahead = 
  388:  *    Reduce on <tag> using <argument>-><string-list> Lookahead = 
  389:  *    Reduce on <square-parenthesis-open> using <argument>-><string-list> Lookahead = 
  390:  *    Reduce on <quoted-string> using <argument>-><string-list> Lookahead = 
  391:  *    Reduce on <multi-line> using <argument>-><string-list> Lookahead = 
  392:  * ----------- 22 -----------
  393:  *   --Itemset--
  394:  *     <argument>-><number>•
  395:  *   --Transitions--
  396:  *    Reduce on <identifier> using <argument>-><number> Lookahead = 
  397:  *    Reduce on <semicolon> using <argument>-><number> Lookahead = 
  398:  *    Reduce on <bracket-open> using <argument>-><number> Lookahead = 
  399:  *    Reduce on <parenthesis-open> using <argument>-><number> Lookahead = 
  400:  *    Reduce on <parenthesis-close> using <argument>-><number> Lookahead = 
  401:  *    Reduce on <comma> using <argument>-><number> Lookahead = 
  402:  *    Reduce on <number> using <argument>-><number> Lookahead = 
  403:  *    Reduce on <tag> using <argument>-><number> Lookahead = 
  404:  *    Reduce on <square-parenthesis-open> using <argument>-><number> Lookahead = 
  405:  *    Reduce on <quoted-string> using <argument>-><number> Lookahead = 
  406:  *    Reduce on <multi-line> using <argument>-><number> Lookahead = 
  407:  * ----------- 23 -----------
  408:  *   --Itemset--
  409:  *     <argument>-><tag>•
  410:  *   --Transitions--
  411:  *    Reduce on <identifier> using <argument>-><tag> Lookahead = 
  412:  *    Reduce on <semicolon> using <argument>-><tag> Lookahead = 
  413:  *    Reduce on <bracket-open> using <argument>-><tag> Lookahead = 
  414:  *    Reduce on <parenthesis-open> using <argument>-><tag> Lookahead = 
  415:  *    Reduce on <parenthesis-close> using <argument>-><tag> Lookahead = 
  416:  *    Reduce on <comma> using <argument>-><tag> Lookahead = 
  417:  *    Reduce on <number> using <argument>-><tag> Lookahead = 
  418:  *    Reduce on <tag> using <argument>-><tag> Lookahead = 
  419:  *    Reduce on <square-parenthesis-open> using <argument>-><tag> Lookahead = 
  420:  *    Reduce on <quoted-string> using <argument>-><tag> Lookahead = 
  421:  *    Reduce on <multi-line> using <argument>-><tag> Lookahead = 
  422:  * ----------- 24 -----------
  423:  *   --Itemset--
  424:  *     <string-list>-><square-parenthesis-open>•<string-plus-csv><square-parenthesis-close>
  425:  *    +<string-plus-csv>->•<string>
  426:  *    +<string-plus-csv>->•<string-plus-csv><comma><string>
  427:  *    +<string>->•<quoted-string>
  428:  *    +<string>->•<multi-line>
  429:  *   --Transitions--
  430:  *    Goto on <string-plus-csv> to 39 because of <string-list>-><square-parenthesis-open>•<string-plus-csv><square-parenthesis-close>
  431:  *    Goto on <string> to 40 because of <string-plus-csv>->•<string>
  432:  *    Goto on <string-plus-csv> to 39 because of <string-plus-csv>->•<string-plus-csv><comma><string>
  433:  *    Shift on <quoted-string> to 26 because of <string>->•<quoted-string> Lookahead = 
  434:  *    Shift on <multi-line> to 27 because of <string>->•<multi-line> Lookahead = 
  435:  * ----------- 25 -----------
  436:  *   --Itemset--
  437:  *     <string-list>-><string>•
  438:  *   --Transitions--
  439:  *    Reduce on <identifier> using <string-list>-><string> Lookahead = 
  440:  *    Reduce on <semicolon> using <string-list>-><string> Lookahead = 
  441:  *    Reduce on <bracket-open> using <string-list>-><string> Lookahead = 
  442:  *    Reduce on <parenthesis-open> using <string-list>-><string> Lookahead = 
  443:  *    Reduce on <parenthesis-close> using <string-list>-><string> Lookahead = 
  444:  *    Reduce on <comma> using <string-list>-><string> Lookahead = 
  445:  *    Reduce on <number> using <string-list>-><string> Lookahead = 
  446:  *    Reduce on <tag> using <string-list>-><string> Lookahead = 
  447:  *    Reduce on <square-parenthesis-open> using <string-list>-><string> Lookahead = 
  448:  *    Reduce on <quoted-string> using <string-list>-><string> Lookahead = 
  449:  *    Reduce on <multi-line> using <string-list>-><string> Lookahead = 
  450:  * ----------- 26 -----------
  451:  *   --Itemset--
  452:  *     <string>-><quoted-string>•
  453:  *   --Transitions--
  454:  *    Reduce on <identifier> using <string>-><quoted-string> Lookahead = 
  455:  *    Reduce on <semicolon> using <string>-><quoted-string> Lookahead = 
  456:  *    Reduce on <bracket-open> using <string>-><quoted-string> Lookahead = 
  457:  *    Reduce on <parenthesis-open> using <string>-><quoted-string> Lookahead = 
  458:  *    Reduce on <parenthesis-close> using <string>-><quoted-string> Lookahead = 
  459:  *    Reduce on <comma> using <string>-><quoted-string> Lookahead = 
  460:  *    Reduce on <number> using <string>-><quoted-string> Lookahead = 
  461:  *    Reduce on <tag> using <string>-><quoted-string> Lookahead = 
  462:  *    Reduce on <square-parenthesis-open> using <string>-><quoted-string> Lookahead = 
  463:  *    Reduce on <square-parenthesis-close> using <string>-><quoted-string> Lookahead = 
  464:  *    Reduce on <quoted-string> using <string>-><quoted-string> Lookahead = 
  465:  *    Reduce on <multi-line> using <string>-><quoted-string> Lookahead = 
  466:  * ----------- 27 -----------
  467:  *   --Itemset--
  468:  *     <string>-><multi-line>•
  469:  *   --Transitions--
  470:  *    Reduce on <identifier> using <string>-><multi-line> Lookahead = 
  471:  *    Reduce on <semicolon> using <string>-><multi-line> Lookahead = 
  472:  *    Reduce on <bracket-open> using <string>-><multi-line> Lookahead = 
  473:  *    Reduce on <parenthesis-open> using <string>-><multi-line> Lookahead = 
  474:  *    Reduce on <parenthesis-close> using <string>-><multi-line> Lookahead = 
  475:  *    Reduce on <comma> using <string>-><multi-line> Lookahead = 
  476:  *    Reduce on <number> using <string>-><multi-line> Lookahead = 
  477:  *    Reduce on <tag> using <string>-><multi-line> Lookahead = 
  478:  *    Reduce on <square-parenthesis-open> using <string>-><multi-line> Lookahead = 
  479:  *    Reduce on <square-parenthesis-close> using <string>-><multi-line> Lookahead = 
  480:  *    Reduce on <quoted-string> using <string>-><multi-line> Lookahead = 
  481:  *    Reduce on <multi-line> using <string>-><multi-line> Lookahead = 
  482:  * ----------- 28 -----------
  483:  *   --Itemset--
  484:  *     <command>-><identifier><arguments><semicolon>•
  485:  *   --Transitions--
  486:  *    Reduce on <identifier> using <command>-><identifier><arguments><semicolon> Lookahead = 
  487:  *    Reduce on <bracket-close> using <command>-><identifier><arguments><semicolon> Lookahead = 
  488:  *    Reduce on <hash-comment> using <command>-><identifier><arguments><semicolon> Lookahead = 
  489:  *    Reduce on <bracket-comment> using <command>-><identifier><arguments><semicolon> Lookahead = 
  490:  *    Reduce on  using <command>-><identifier><arguments><semicolon> Lookahead = 
  491:  * ----------- 29 -----------
  492:  *   --Itemset--
  493:  *     <command>-><identifier><arguments><bracket-open>•<block>
  494:  *    +<block>->•<command><block>
  495:  *    +<block>->•<bracket-close>
  496:  *    +<command>->•<identifier><arguments><semicolon>
  497:  *    +<command>->•<identifier><arguments><bracket-open><block>
  498:  *    +<command>->•<identifier><semicolon>
  499:  *    +<command>->•<identifier><bracket-open><block>
  500:  *   --Transitions--
  501:  *    Goto on <block> to 41 because of <command>-><identifier><arguments><bracket-open>•<block>
  502:  *    Goto on <command> to 31 because of <block>->•<command><block>
  503:  *    Shift on <bracket-close> to 32 because of <block>->•<bracket-close> Lookahead = 
  504:  *    Shift on <identifier> to 6 because of <command>->•<identifier><arguments><semicolon> Lookahead = 
  505:  *    Shift on <identifier> to 6 because of <command>->•<identifier><arguments><bracket-open><block> Lookahead = 
  506:  *    Shift on <identifier> to 6 because of <command>->•<identifier><semicolon> Lookahead = 
  507:  *    Shift on <identifier> to 6 because of <command>->•<identifier><bracket-open><block> Lookahead = 
  508:  * ----------- 30 -----------
  509:  *   --Itemset--
  510:  *     <command>-><identifier><bracket-open><block>•
  511:  *   --Transitions--
  512:  *    Reduce on <identifier> using <command>-><identifier><bracket-open><block> Lookahead = 
  513:  *    Reduce on <bracket-close> using <command>-><identifier><bracket-open><block> Lookahead = 
  514:  *    Reduce on <hash-comment> using <command>-><identifier><bracket-open><block> Lookahead = 
  515:  *    Reduce on <bracket-comment> using <command>-><identifier><bracket-open><block> Lookahead = 
  516:  *    Reduce on  using <command>-><identifier><bracket-open><block> Lookahead = 
  517:  * ----------- 31 -----------
  518:  *   --Itemset--
  519:  *     <block>-><command>•<block>
  520:  *    +<block>->•<command><block>
  521:  *    +<block>->•<bracket-close>
  522:  *    +<command>->•<identifier><arguments><semicolon>
  523:  *    +<command>->•<identifier><arguments><bracket-open><block>
  524:  *    +<command>->•<identifier><semicolon>
  525:  *    +<command>->•<identifier><bracket-open><block>
  526:  *   --Transitions--
  527:  *    Goto on <block> to 42 because of <block>-><command>•<block>
  528:  *    Goto on <command> to 31 because of <block>->•<command><block>
  529:  *    Shift on <bracket-close> to 32 because of <block>->•<bracket-close> Lookahead = 
  530:  *    Shift on <identifier> to 6 because of <command>->•<identifier><arguments><semicolon> Lookahead = 
  531:  *    Shift on <identifier> to 6 because of <command>->•<identifier><arguments><bracket-open><block> Lookahead = 
  532:  *    Shift on <identifier> to 6 because of <command>->•<identifier><semicolon> Lookahead = 
  533:  *    Shift on <identifier> to 6 because of <command>->•<identifier><bracket-open><block> Lookahead = 
  534:  * ----------- 32 -----------
  535:  *   --Itemset--
  536:  *     <block>-><bracket-close>•
  537:  *   --Transitions--
  538:  *    Reduce on <identifier> using <block>-><bracket-close> Lookahead = 
  539:  *    Reduce on <bracket-close> using <block>-><bracket-close> Lookahead = 
  540:  *    Reduce on <hash-comment> using <block>-><bracket-close> Lookahead = 
  541:  *    Reduce on <bracket-comment> using <block>-><bracket-close> Lookahead = 
  542:  *    Reduce on  using <block>-><bracket-close> Lookahead = 
  543:  * ----------- 33 -----------
  544:  *   --Itemset--
  545:  *     <arguments>-><arguments-plus><test>•
  546:  *   --Transitions--
  547:  *    Reduce on <semicolon> using <arguments>-><arguments-plus><test> Lookahead = 
  548:  *    Reduce on <bracket-open> using <arguments>-><arguments-plus><test> Lookahead = 
  549:  * ----------- 34 -----------
  550:  *   --Itemset--
  551:  *     <arguments>-><arguments-plus><test-list>•
  552:  *   --Transitions--
  553:  *    Reduce on <semicolon> using <arguments>-><arguments-plus><test-list> Lookahead = 
  554:  *    Reduce on <bracket-open> using <arguments>-><arguments-plus><test-list> Lookahead = 
  555:  *    Reduce on <parenthesis-close> using <arguments>-><arguments-plus><test-list> Lookahead = 
  556:  *    Reduce on <comma> using <arguments>-><arguments-plus><test-list> Lookahead = 
  557:  * ----------- 35 -----------
  558:  *   --Itemset--
  559:  *     <arguments-plus>-><arguments-plus><argument>•
  560:  *   --Transitions--
  561:  *    Reduce on <identifier> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
  562:  *    Reduce on <semicolon> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
  563:  *    Reduce on <bracket-open> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
  564:  *    Reduce on <parenthesis-open> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
  565:  *    Reduce on <parenthesis-close> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
  566:  *    Reduce on <comma> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
  567:  *    Reduce on <number> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
  568:  *    Reduce on <tag> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
  569:  *    Reduce on <square-parenthesis-open> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
  570:  *    Reduce on <quoted-string> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
  571:  *    Reduce on <multi-line> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
  572:  * ----------- 36 -----------
  573:  *   --Itemset--
  574:  *     <test>-><identifier><arguments>•
  575:  *   --Transitions--
  576:  *    Reduce on <semicolon> using <test>-><identifier><arguments> Lookahead = 
  577:  *    Reduce on <bracket-open> using <test>-><identifier><arguments> Lookahead = 
  578:  *    Reduce on <parenthesis-close> using <test>-><identifier><arguments> Lookahead = 
  579:  *    Reduce on <comma> using <test>-><identifier><arguments> Lookahead = 
  580:  * ----------- 37 -----------
  581:  *   --Itemset--
  582:  *     <test-list>-><parenthesis-open><test-plus-csv>•<parenthesis-close>
  583:  *   --Transitions--
  584:  *    Shift on <parenthesis-close> to 43 because of <test-list>-><parenthesis-open><test-plus-csv>•<parenthesis-close> Lookahead = 
  585:  * ----------- 38 -----------
  586:  *   --Itemset--
  587:  *     <test-plus-csv>-><test>•
  588:  *     <test-plus-csv>-><test>•<comma><test-plus-csv>
  589:  *   --Transitions--
  590:  *    Reduce on <parenthesis-close> using <test-plus-csv>-><test> Lookahead = 
  591:  *    Shift on <comma> to 44 because of <test-plus-csv>-><test>•<comma><test-plus-csv> Lookahead = 
  592:  * ----------- 39 -----------
  593:  *   --Itemset--
  594:  *     <string-list>-><square-parenthesis-open><string-plus-csv>•<square-parenthesis-close>
  595:  *     <string-plus-csv>-><string-plus-csv>•<comma><string>
  596:  *   --Transitions--
  597:  *    Shift on <square-parenthesis-close> to 45 because of <string-list>-><square-parenthesis-open><string-plus-csv>•<square-parenthesis-close> Lookahead = 
  598:  *    Shift on <comma> to 46 because of <string-plus-csv>-><string-plus-csv>•<comma><string> Lookahead = 
  599:  * ----------- 40 -----------
  600:  *   --Itemset--
  601:  *     <string-plus-csv>-><string>•
  602:  *   --Transitions--
  603:  *    Reduce on <comma> using <string-plus-csv>-><string> Lookahead = 
  604:  *    Reduce on <square-parenthesis-close> using <string-plus-csv>-><string> Lookahead = 
  605:  * ----------- 41 -----------
  606:  *   --Itemset--
  607:  *     <command>-><identifier><arguments><bracket-open><block>•
  608:  *   --Transitions--
  609:  *    Reduce on <identifier> using <command>-><identifier><arguments><bracket-open><block> Lookahead = 
  610:  *    Reduce on <bracket-close> using <command>-><identifier><arguments><bracket-open><block> Lookahead = 
  611:  *    Reduce on <hash-comment> using <command>-><identifier><arguments><bracket-open><block> Lookahead = 
  612:  *    Reduce on <bracket-comment> using <command>-><identifier><arguments><bracket-open><block> Lookahead = 
  613:  *    Reduce on  using <command>-><identifier><arguments><bracket-open><block> Lookahead = 
  614:  * ----------- 42 -----------
  615:  *   --Itemset--
  616:  *     <block>-><command><block>•
  617:  *   --Transitions--
  618:  *    Reduce on <identifier> using <block>-><command><block> Lookahead = 
  619:  *    Reduce on <bracket-close> using <block>-><command><block> Lookahead = 
  620:  *    Reduce on <hash-comment> using <block>-><command><block> Lookahead = 
  621:  *    Reduce on <bracket-comment> using <block>-><command><block> Lookahead = 
  622:  *    Reduce on  using <block>-><command><block> Lookahead = 
  623:  * ----------- 43 -----------
  624:  *   --Itemset--
  625:  *     <test-list>-><parenthesis-open><test-plus-csv><parenthesis-close>•
  626:  *   --Transitions--
  627:  *    Reduce on <semicolon> using <test-list>-><parenthesis-open><test-plus-csv><parenthesis-close> Lookahead = 
  628:  *    Reduce on <bracket-open> using <test-list>-><parenthesis-open><test-plus-csv><parenthesis-close> Lookahead = 
  629:  *    Reduce on <parenthesis-close> using <test-list>-><parenthesis-open><test-plus-csv><parenthesis-close> Lookahead = 
  630:  *    Reduce on <comma> using <test-list>-><parenthesis-open><test-plus-csv><parenthesis-close> Lookahead = 
  631:  * ----------- 44 -----------
  632:  *   --Itemset--
  633:  *     <test-plus-csv>-><test><comma>•<test-plus-csv>
  634:  *    +<test-plus-csv>->•<test>
  635:  *    +<test-plus-csv>->•<test><comma><test-plus-csv>
  636:  *    +<test>->•<identifier><arguments>
  637:  *    +<test>->•<identifier>
  638:  *   --Transitions--
  639:  *    Goto on <test-plus-csv> to 47 because of <test-plus-csv>-><test><comma>•<test-plus-csv>
  640:  *    Goto on <test> to 38 because of <test-plus-csv>->•<test>
  641:  *    Goto on <test> to 38 because of <test-plus-csv>->•<test><comma><test-plus-csv>
  642:  *    Shift on <identifier> to 19 because of <test>->•<identifier><arguments> Lookahead = 
  643:  *    Shift on <identifier> to 19 because of <test>->•<identifier> Lookahead = 
  644:  * ----------- 45 -----------
  645:  *   --Itemset--
  646:  *     <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close>•
  647:  *   --Transitions--
  648:  *    Reduce on <identifier> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
  649:  *    Reduce on <semicolon> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
  650:  *    Reduce on <bracket-open> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
  651:  *    Reduce on <parenthesis-open> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
  652:  *    Reduce on <parenthesis-close> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
  653:  *    Reduce on <comma> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
  654:  *    Reduce on <number> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
  655:  *    Reduce on <tag> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
  656:  *    Reduce on <square-parenthesis-open> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
  657:  *    Reduce on <quoted-string> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
  658:  *    Reduce on <multi-line> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
  659:  * ----------- 46 -----------
  660:  *   --Itemset--
  661:  *     <string-plus-csv>-><string-plus-csv><comma>•<string>
  662:  *    +<string>->•<quoted-string>
  663:  *    +<string>->•<multi-line>
  664:  *   --Transitions--
  665:  *    Goto on <string> to 48 because of <string-plus-csv>-><string-plus-csv><comma>•<string>
  666:  *    Shift on <quoted-string> to 26 because of <string>->•<quoted-string> Lookahead = 
  667:  *    Shift on <multi-line> to 27 because of <string>->•<multi-line> Lookahead = 
  668:  * ----------- 47 -----------
  669:  *   --Itemset--
  670:  *     <test-plus-csv>-><test><comma><test-plus-csv>•
  671:  *   --Transitions--
  672:  *    Reduce on <parenthesis-close> using <test-plus-csv>-><test><comma><test-plus-csv> Lookahead = 
  673:  * ----------- 48 -----------
  674:  *   --Itemset--
  675:  *     <string-plus-csv>-><string-plus-csv><comma><string>•
  676:  *   --Transitions--
  677:  *    Reduce on <comma> using <string-plus-csv>-><string-plus-csv><comma><string> Lookahead = 
  678:  *    Reduce on <square-parenthesis-close> using <string-plus-csv>-><string-plus-csv><comma><string> Lookahead =
  679:  *
  680:  */
  681: class TestSieveParser extends \sergiosgc\Text_Parser_LALR
  682: {
  683:     /* Constructor {{{ */
  684:     /**
  685:      * Parser constructor
  686:      * 
  687:      * @param Text_Tokenizer Tokenizer that will feed this parser
  688:      */
  689:     public function __construct(&$tokenizer)
  690:     {
  691:         parent::__construct($tokenizer);
  692:         $this->_gotoTable = unserialize('a:13:{i:0;a:5:{s:10:"<commands>";i:1;s:19:"<commented-command>";i:2;s:9:"<comment>";i:3;s:9:"<command>";i:4;s:16:"<single-comment>";i:5;}i:1;a:4:{s:19:"<commented-command>";i:9;s:9:"<comment>";i:3;s:9:"<command>";i:4;s:16:"<single-comment>";i:5;}i:3;a:2:{s:9:"<command>";i:10;s:16:"<single-comment>";i:11;}i:6;a:7:{s:11:"<arguments>";i:12;s:16:"<arguments-plus>";i:15;s:6:"<test>";i:16;s:11:"<test-list>";i:17;s:10:"<argument>";i:18;s:13:"<string-list>";i:21;s:8:"<string>";i:25;}i:14;a:2:{s:7:"<block>";i:30;s:9:"<command>";i:31;}i:15;a:5:{s:6:"<test>";i:33;s:11:"<test-list>";i:34;s:10:"<argument>";i:35;s:13:"<string-list>";i:21;s:8:"<string>";i:25;}i:19;a:7:{s:11:"<arguments>";i:36;s:16:"<arguments-plus>";i:15;s:6:"<test>";i:16;s:11:"<test-list>";i:17;s:10:"<argument>";i:18;s:13:"<string-list>";i:21;s:8:"<string>";i:25;}i:20;a:2:{s:15:"<test-plus-csv>";i:37;s:6:"<test>";i:38;}i:24;a:2:{s:17:"<string-plus-csv>";i:39;s:8:"<string>";i:40;}i:29;a:2:{s:7:"<block>";i:41;s:9:"<command>";i:31;}i:31;a:2:{s:7:"<block>";i:42;s:9:"<command>";i:31;}i:44;a:2:{s:15:"<test-plus-csv>";i:47;s:6:"<test>";i:38;}i:46;a:1:{s:8:"<string>";i:48;}}');
  693:         $this->_actionTable = unserialize('a:49:{i:1;a:4:{s:0:"";a:1:{s:6:"action";s:6:"accept";}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:6;}s:14:"<hash-comment>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:7;}s:17:"<bracket-comment>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:8;}}i:0;a:3:{s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:6;}s:14:"<hash-comment>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:7;}s:17:"<bracket-comment>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:8;}}i:3;a:3:{s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:6;}s:14:"<hash-comment>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:7;}s:17:"<bracket-comment>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:8;}}i:6;a:9:{s:11:"<semicolon>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:13;}s:14:"<bracket-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:14;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:19;}s:18:"<parenthesis-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:20;}s:8:"<number>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:22;}s:5:"<tag>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:23;}s:25:"<square-parenthesis-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:24;}s:15:"<quoted-string>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:26;}s:12:"<multi-line>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:27;}}i:12;a:2:{s:11:"<semicolon>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:28;}s:14:"<bracket-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:29;}}i:14;a:2:{s:15:"<bracket-close>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:32;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:6;}}i:15;a:11:{s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:19;}s:18:"<parenthesis-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:20;}s:8:"<number>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:22;}s:5:"<tag>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:23;}s:25:"<square-parenthesis-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:24;}s:15:"<quoted-string>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:26;}s:12:"<multi-line>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:27;}s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:5:"$args";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_11";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:5:"$args";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_11";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:5:"$args";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_11";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:5:"$args";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_11";}}i:19;a:11:{s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:19;}s:18:"<parenthesis-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:20;}s:8:"<number>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:22;}s:5:"<tag>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:23;}s:25:"<square-parenthesis-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:24;}s:15:"<quoted-string>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:26;}s:12:"<multi-line>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:27;}s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:3:"$id";}s:15:"leftNonTerminal";s:6:"<test>";s:8:"function";s:14:"reduce_rule_19";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:3:"$id";}s:15:"leftNonTerminal";s:6:"<test>";s:8:"function";s:14:"reduce_rule_19";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:3:"$id";}s:15:"leftNonTerminal";s:6:"<test>";s:8:"function";s:14:"reduce_rule_19";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:3:"$id";}s:15:"leftNonTerminal";s:6:"<test>";s:8:"function";s:14:"reduce_rule_19";}}i:20;a:1:{s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:19;}}i:24;a:2:{s:15:"<quoted-string>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:26;}s:12:"<multi-line>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:27;}}i:29;a:2:{s:15:"<bracket-close>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:32;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:6;}}i:31;a:2:{s:15:"<bracket-close>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:32;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:6;}}i:37;a:1:{s:19:"<parenthesis-close>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:43;}}i:38;a:2:{s:7:"<comma>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:44;}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:5:"$test";}s:15:"leftNonTerminal";s:15:"<test-plus-csv>";s:8:"function";s:14:"reduce_rule_21";}}i:39;a:2:{s:26:"<square-parenthesis-close>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:45;}s:7:"<comma>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:46;}}i:44;a:1:{s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:19;}}i:46;a:2:{s:15:"<quoted-string>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:26;}s:12:"<multi-line>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:27;}}i:2;a:4:{s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_2";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_2";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_2";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_2";}}i:4;a:4:{s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_4";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_4";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_4";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_4";}}i:5;a:3:{s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_33";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_33";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_33";}}i:7;a:3:{s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_34";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_34";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_34";}}i:8;a:3:{s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_35";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_35";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_35";}}i:9;a:4:{s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_1";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_1";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_1";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_1";}}i:10;a:4:{s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_3";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_3";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_3";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_3";}}i:11;a:3:{s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_32";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_32";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_32";}}i:13;a:5:{s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_7";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_7";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_7";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_7";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_7";}}i:16;a:2:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:5:"$test";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_14";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:5:"$test";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_14";}}i:17;a:4:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:6:"$tests";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_15";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:6:"$tests";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_15";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:6:"$tests";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_15";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:6:"$tests";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_15";}}i:18;a:11:{s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_17";}s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_17";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_17";}s:18:"<parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_17";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_17";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_17";}s:8:"<number>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_17";}s:5:"<tag>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_17";}s:25:"<square-parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_17";}s:15:"<quoted-string>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_17";}s:12:"<multi-line>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_17";}}i:21;a:11:{s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_23";}s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_23";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_23";}s:18:"<parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_23";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_23";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_23";}s:8:"<number>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_23";}s:5:"<tag>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_23";}s:25:"<square-parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_23";}s:15:"<quoted-string>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_23";}s:12:"<multi-line>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_23";}}i:22;a:11:{s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_24";}s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_24";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_24";}s:18:"<parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_24";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_24";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_24";}s:8:"<number>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_24";}s:5:"<tag>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_24";}s:25:"<square-parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_24";}s:15:"<quoted-string>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_24";}s:12:"<multi-line>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_24";}}i:23;a:11:{s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_25";}s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_25";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_25";}s:18:"<parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_25";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_25";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_25";}s:8:"<number>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_25";}s:5:"<tag>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_25";}s:25:"<square-parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_25";}s:15:"<quoted-string>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_25";}s:12:"<multi-line>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_25";}}i:25;a:11:{s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_27";}s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_27";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_27";}s:18:"<parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_27";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_27";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_27";}s:8:"<number>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_27";}s:5:"<tag>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_27";}s:25:"<square-parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_27";}s:15:"<quoted-string>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_27";}s:12:"<multi-line>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_27";}}i:26;a:12:{s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_30";}s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_30";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_30";}s:18:"<parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_30";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_30";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_30";}s:8:"<number>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_30";}s:5:"<tag>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_30";}s:25:"<square-parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_30";}s:26:"<square-parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_30";}s:15:"<quoted-string>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_30";}s:12:"<multi-line>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_30";}}i:27;a:12:{s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_31";}s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_31";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_31";}s:18:"<parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_31";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_31";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_31";}s:8:"<number>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_31";}s:5:"<tag>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_31";}s:25:"<square-parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_31";}s:26:"<square-parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_31";}s:15:"<quoted-string>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_31";}s:12:"<multi-line>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_31";}}i:28;a:5:{s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_5";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_5";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_5";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_5";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_5";}}i:30;a:5:{s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_8";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_8";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_8";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_8";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_8";}}i:32;a:5:{s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_10";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_10";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_10";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_10";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_10";}}i:33;a:2:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:5:"$args";i:1;s:5:"$test";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_12";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:5:"$args";i:1;s:5:"$test";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_12";}}i:34;a:4:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:5:"$args";i:1;s:6:"$tests";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_13";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:5:"$args";i:1;s:6:"$tests";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_13";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:5:"$args";i:1;s:6:"$tests";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_13";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:5:"$args";i:1;s:6:"$tests";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_13";}}i:35;a:11:{s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_16";}s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_16";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_16";}s:18:"<parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_16";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_16";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_16";}s:8:"<number>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_16";}s:5:"<tag>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_16";}s:25:"<square-parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_16";}s:15:"<quoted-string>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_16";}s:12:"<multi-line>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_16";}}i:36;a:4:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:5:"$args";}s:15:"leftNonTerminal";s:6:"<test>";s:8:"function";s:14:"reduce_rule_18";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:5:"$args";}s:15:"leftNonTerminal";s:6:"<test>";s:8:"function";s:14:"reduce_rule_18";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:5:"$args";}s:15:"leftNonTerminal";s:6:"<test>";s:8:"function";s:14:"reduce_rule_18";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:5:"$args";}s:15:"leftNonTerminal";s:6:"<test>";s:8:"function";s:14:"reduce_rule_18";}}i:40;a:2:{s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:17:"<string-plus-csv>";s:8:"function";s:14:"reduce_rule_28";}s:26:"<square-parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:17:"<string-plus-csv>";s:8:"function";s:14:"reduce_rule_28";}}i:41;a:5:{s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_6";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_6";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_6";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_6";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_6";}}i:42;a:5:{s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:13:"reduce_rule_9";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:13:"reduce_rule_9";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:13:"reduce_rule_9";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:13:"reduce_rule_9";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:13:"reduce_rule_9";}}i:43;a:4:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:6:"$tests";i:2;s:0:"";}s:15:"leftNonTerminal";s:11:"<test-list>";s:8:"function";s:14:"reduce_rule_20";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:6:"$tests";i:2;s:0:"";}s:15:"leftNonTerminal";s:11:"<test-list>";s:8:"function";s:14:"reduce_rule_20";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:6:"$tests";i:2;s:0:"";}s:15:"leftNonTerminal";s:11:"<test-list>";s:8:"function";s:14:"reduce_rule_20";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:6:"$tests";i:2;s:0:"";}s:15:"leftNonTerminal";s:11:"<test-list>";s:8:"function";s:14:"reduce_rule_20";}}i:45;a:11:{s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_26";}s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_26";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_26";}s:18:"<parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_26";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_26";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_26";}s:8:"<number>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_26";}s:5:"<tag>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_26";}s:25:"<square-parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_26";}s:15:"<quoted-string>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_26";}s:12:"<multi-line>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_26";}}i:47;a:1:{s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:5:"$test";i:1;s:0:"";i:2;s:4:"$acc";}s:15:"leftNonTerminal";s:15:"<test-plus-csv>";s:8:"function";s:14:"reduce_rule_22";}}i:48;a:2:{s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:4:"$acc";i:1;s:0:"";i:2;s:4:"$str";}s:15:"leftNonTerminal";s:17:"<string-plus-csv>";s:8:"function";s:14:"reduce_rule_29";}s:26:"<square-parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:4:"$acc";i:1;s:0:"";i:2;s:4:"$str";}s:15:"leftNonTerminal";s:17:"<string-plus-csv>";s:8:"function";s:14:"reduce_rule_29";}}}');
  694:     }
  695:     /* }}} */
  696:     /* reduce_rule_2 {{{ */
  697:     /**
  698:      * Reduction function for rule 2 
  699:      *
  700:      * Rule 2 is:
  701:      * <commands>-><commented-command>
  702:      *
  703:      * @param Text_Tokenizer_Token Token of type '<commented-command>'
  704:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<commands>' token
  705:      */
  706:     protected function reduce_rule_2($cmd = null)
  707:     {
  708:             if (!isset($acc)) $acc = new \sergiosgc\Text_Tokenizer_Token('<commands>', []);
  709:         array_push($acc->getValue(), $cmd->getValue());
  710:         return $acc;
  711:         return new \sergiosgc\Text_Tokenizer_Token('<commands>', $result);
  712:     }
  713:     /* }}} */
  714:     /* reduce_rule_4 {{{ */
  715:     /**
  716:      * Reduction function for rule 4 
  717:      *
  718:      * Rule 4 is:
  719:      * <commented-command>-><command>
  720:      *
  721:      * @param Text_Tokenizer_Token Token of type '<command>'
  722:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<commented-command>' token
  723:      */
  724:     protected function reduce_rule_4($command = null)
  725:     {
  726:             if (!isset($comment)) $comment = new \sergiosgc\Text_Tokenizer_Token('<comment>', null);
  727:         $command->getValue()->comment = $comment->getValue();
  728:         return new \sergiosgc\Text_Tokenizer_Token('<commented-command>', $command->getValue());
  729:         return new \sergiosgc\Text_Tokenizer_Token('<commented-command>', $result);
  730:     }
  731:     /* }}} */
  732:     /* reduce_rule_33 {{{ */
  733:     /**
  734:      * Reduction function for rule 33 
  735:      *
  736:      * Rule 33 is:
  737:      * <comment>-><single-comment>
  738:      *
  739:      * @param Text_Tokenizer_Token Token of type '<single-comment>'
  740:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<comment>' token
  741:      */
  742:     protected function reduce_rule_33($singleComment = null)
  743:     {
  744:             if (isset($comment)) {
  745:             $comment->getValue()->text .= $singleComment->getValue();
  746:             return $comment;
  747:         }
  748:         return new \sergiosgc\Text_Tokenizer_Token(
  749:             '<comment>',
  750:             new \sergiosgc\Sieve_Parser\Script_Comment($singleComment->getValue()));
  751:         return new \sergiosgc\Text_Tokenizer_Token('<comment>', $result);
  752:     }
  753:     /* }}} */
  754:     /* reduce_rule_34 {{{ */
  755:     /**
  756:      * Reduction function for rule 34 
  757:      *
  758:      * Rule 34 is:
  759:      * <single-comment>-><hash-comment>
  760:      *
  761:      * @param Text_Tokenizer_Token Token of type '<hash-comment>'
  762:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<single-comment>' token
  763:      */
  764:     protected function reduce_rule_34($comment = null)
  765:     {
  766:             return new \sergiosgc\Text_Tokenizer_Token(
  767:             '<single-comment>',
  768:             new \sergiosgc\Sieve_Parser\Script_Comment($comment->getValue()));
  769:         return new \sergiosgc\Text_Tokenizer_Token('<single-comment>', $result);
  770:     }
  771:     /* }}} */
  772:     /* reduce_rule_35 {{{ */
  773:     /**
  774:      * Reduction function for rule 35 
  775:      *
  776:      * Rule 35 is:
  777:      * <single-comment>-><bracket-comment>
  778:      *
  779:      * @param Text_Tokenizer_Token Token of type '<bracket-comment>'
  780:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<single-comment>' token
  781:      */
  782:     protected function reduce_rule_35($comment = null)
  783:     {
  784:             return new \sergiosgc\Text_Tokenizer_Token(
  785:             '<single-comment>',
  786:             new \sergiosgc\Sieve_Parser\Script_Comment($comment->getValue()));
  787:         return new \sergiosgc\Text_Tokenizer_Token('<single-comment>', $result);
  788:     }
  789:     /* }}} */
  790:     /* reduce_rule_1 {{{ */
  791:     /**
  792:      * Reduction function for rule 1 
  793:      *
  794:      * Rule 1 is:
  795:      * <commands>-><commands><commented-command>
  796:      *
  797:      * @param Text_Tokenizer_Token Token of type '<commands>'
  798:      * @param Text_Tokenizer_Token Token of type '<commented-command>'
  799:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<commands>' token
  800:      */
  801:     protected function reduce_rule_1($acc = null,$cmd = null)
  802:     {
  803:             if (!isset($acc)) $acc = new \sergiosgc\Text_Tokenizer_Token('<commands>', []);
  804:         array_push($acc->getValue(), $cmd->getValue());
  805:         return $acc;
  806:         return new \sergiosgc\Text_Tokenizer_Token('<commands>', $result);
  807:     }
  808:     /* }}} */
  809:     /* reduce_rule_3 {{{ */
  810:     /**
  811:      * Reduction function for rule 3 
  812:      *
  813:      * Rule 3 is:
  814:      * <commented-command>-><comment><command>
  815:      *
  816:      * @param Text_Tokenizer_Token Token of type '<comment>'
  817:      * @param Text_Tokenizer_Token Token of type '<command>'
  818:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<commented-command>' token
  819:      */
  820:     protected function reduce_rule_3($comment = null,$command = null)
  821:     {
  822:             if (!isset($comment)) $comment = new \sergiosgc\Text_Tokenizer_Token('<comment>', null);
  823:         $command->getValue()->comment = $comment->getValue();
  824:         return new \sergiosgc\Text_Tokenizer_Token('<commented-command>', $command->getValue());
  825:         return new \sergiosgc\Text_Tokenizer_Token('<commented-command>', $result);
  826:     }
  827:     /* }}} */
  828:     /* reduce_rule_32 {{{ */
  829:     /**
  830:      * Reduction function for rule 32 
  831:      *
  832:      * Rule 32 is:
  833:      * <comment>-><comment><single-comment>
  834:      *
  835:      * @param Text_Tokenizer_Token Token of type '<comment>'
  836:      * @param Text_Tokenizer_Token Token of type '<single-comment>'
  837:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<comment>' token
  838:      */
  839:     protected function reduce_rule_32($comment = null,$singleComment = null)
  840:     {
  841:             if (isset($comment)) {
  842:             $comment->getValue()->text .= $singleComment->getValue();
  843:             return $comment;
  844:         }
  845:         return new \sergiosgc\Text_Tokenizer_Token(
  846:             '<comment>',
  847:             new \sergiosgc\Sieve_Parser\Script_Comment($singleComment->getValue()));
  848:         return new \sergiosgc\Text_Tokenizer_Token('<comment>', $result);
  849:     }
  850:     /* }}} */
  851:     /* reduce_rule_7 {{{ */
  852:     /**
  853:      * Reduction function for rule 7 
  854:      *
  855:      * Rule 7 is:
  856:      * <command>-><identifier><semicolon>
  857:      *
  858:      * @param Text_Tokenizer_Token Token of type '<identifier>'
  859:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
  860:      */
  861:     protected function reduce_rule_7($id = null)
  862:     {
  863:             if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments>', [ 'arguments' => [], 'tests' => [] ]);
  864:         if (!isset($block)) $block = new \sergiosgc\Text_Tokenizer_Token('<block>', []);
  865:         return new \sergiosgc\Text_Tokenizer_Token('<command>', 
  866:             new \sergiosgc\Sieve_Parser\Script_Command(
  867:                 $id->getValue(),
  868:                 $args->getValue()['arguments'],
  869:                 $args->getValue()['tests'],
  870:                 $block->getValue()));
  871:         return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
  872:     }
  873:     /* }}} */
  874:     /* reduce_rule_11 {{{ */
  875:     /**
  876:      * Reduction function for rule 11 
  877:      *
  878:      * Rule 11 is:
  879:      * <arguments>-><arguments-plus>
  880:      *
  881:      * @param Text_Tokenizer_Token Token of type '<arguments-plus>'
  882:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<arguments>' token
  883:      */
  884:     protected function reduce_rule_11($args = null)
  885:     {
  886:             if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments-plus>', []);
  887:         if (!isset($tests)) $tests = new \sergiosgc\Text_Tokenizer_Token('<test-list>', []);
  888:         if (isset($test)) array_unshift($tests->getValue(), $test->getValue());
  889:         return new \sergiosgc\Text_Tokenizer_Token('<arguments>', 
  890:             [ 'arguments' => $args->getValue(), 'tests' => $tests->getValue() ]);
  891:         return new \sergiosgc\Text_Tokenizer_Token('<arguments>', $result);
  892:     }
  893:     /* }}} */
  894:     /* reduce_rule_14 {{{ */
  895:     /**
  896:      * Reduction function for rule 14 
  897:      *
  898:      * Rule 14 is:
  899:      * <arguments>-><test>
  900:      *
  901:      * @param Text_Tokenizer_Token Token of type '<test>'
  902:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<arguments>' token
  903:      */
  904:     protected function reduce_rule_14($test = null)
  905:     {
  906:             if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments-plus>', []);
  907:         if (!isset($tests)) $tests = new \sergiosgc\Text_Tokenizer_Token('<test-list>', []);
  908:         if (isset($test)) array_unshift($tests->getValue(), $test->getValue());
  909:         return new \sergiosgc\Text_Tokenizer_Token('<arguments>', 
  910:             [ 'arguments' => $args->getValue(), 'tests' => $tests->getValue() ]);
  911:         return new \sergiosgc\Text_Tokenizer_Token('<arguments>', $result);
  912:     }
  913:     /* }}} */
  914:     /* reduce_rule_15 {{{ */
  915:     /**
  916:      * Reduction function for rule 15 
  917:      *
  918:      * Rule 15 is:
  919:      * <arguments>-><test-list>
  920:      *
  921:      * @param Text_Tokenizer_Token Token of type '<test-list>'
  922:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<arguments>' token
  923:      */
  924:     protected function reduce_rule_15($tests = null)
  925:     {
  926:             if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments-plus>', []);
  927:         if (!isset($tests)) $tests = new \sergiosgc\Text_Tokenizer_Token('<test-list>', []);
  928:         if (isset($test)) array_unshift($tests->getValue(), $test->getValue());
  929:         return new \sergiosgc\Text_Tokenizer_Token('<arguments>', 
  930:             [ 'arguments' => $args->getValue(), 'tests' => $tests->getValue() ]);
  931:         return new \sergiosgc\Text_Tokenizer_Token('<arguments>', $result);
  932:     }
  933:     /* }}} */
  934:     /* reduce_rule_17 {{{ */
  935:     /**
  936:      * Reduction function for rule 17 
  937:      *
  938:      * Rule 17 is:
  939:      * <arguments-plus>-><argument>
  940:      *
  941:      * @param Text_Tokenizer_Token Token of type '<argument>'
  942:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<arguments-plus>' token
  943:      */
  944:     protected function reduce_rule_17($arg = null)
  945:     {
  946:             if (!isset($acc)) $acc = new \sergiosgc\Text_Tokenizer_Token('<arguments-plus>', []);
  947:         array_push($acc->getValue(), $arg->getValue());
  948:         return $acc;
  949:         return new \sergiosgc\Text_Tokenizer_Token('<arguments-plus>', $result);
  950:     }
  951:     /* }}} */
  952:     /* reduce_rule_19 {{{ */
  953:     /**
  954:      * Reduction function for rule 19 
  955:      *
  956:      * Rule 19 is:
  957:      * <test>-><identifier>
  958:      *
  959:      * @param Text_Tokenizer_Token Token of type '<identifier>'
  960:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<test>' token
  961:      */
  962:     protected function reduce_rule_19($id = null)
  963:     {
  964:             if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments>', []);
  965:         return new \sergiosgc\Sieve_Parser\Script_Test($id->getValue(), $args->getValue());
  966:         return new \sergiosgc\Text_Tokenizer_Token('<test>', $result);
  967:     }
  968:     /* }}} */
  969:     /* reduce_rule_23 {{{ */
  970:     /**
  971:      * Reduction function for rule 23 
  972:      *
  973:      * Rule 23 is:
  974:      * <argument>-><string-list>
  975:      *
  976:      * @param Text_Tokenizer_Token Token of type '<string-list>'
  977:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<argument>' token
  978:      */
  979:     protected function reduce_rule_23($arg = null)
  980:     {
  981:             if (isset($tag)) return new \sergiosgc\Text_Tokenizer_Token('<argument>', new \sergiosgc\Sieve_Parser\Script_Tag($tag->getValue()));
  982:         return new \sergiosgc\Text_Tokenizer_Token('<argument>', $arg->getValue());
  983:         return new \sergiosgc\Text_Tokenizer_Token('<argument>', $result);
  984:     }
  985:     /* }}} */
  986:     /* reduce_rule_24 {{{ */
  987:     /**
  988:      * Reduction function for rule 24 
  989:      *
  990:      * Rule 24 is:
  991:      * <argument>-><number>
  992:      *
  993:      * @param Text_Tokenizer_Token Token of type '<number>'
  994:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<argument>' token
  995:      */
  996:     protected function reduce_rule_24($arg = null)
  997:     {
  998:             if (isset($tag)) return new \sergiosgc\Text_Tokenizer_Token('<argument>', new \sergiosgc\Sieve_Parser\Script_Tag($tag->getValue()));
  999:         return new \sergiosgc\Text_Tokenizer_Token('<argument>', $arg->getValue());
 1000:         return new \sergiosgc\Text_Tokenizer_Token('<argument>', $result);
 1001:     }
 1002:     /* }}} */
 1003:     /* reduce_rule_25 {{{ */
 1004:     /**
 1005:      * Reduction function for rule 25 
 1006:      *
 1007:      * Rule 25 is:
 1008:      * <argument>-><tag>
 1009:      *
 1010:      * @param Text_Tokenizer_Token Token of type '<tag>'
 1011:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<argument>' token
 1012:      */
 1013:     protected function reduce_rule_25($tag = null)
 1014:     {
 1015:             if (isset($tag)) return new \sergiosgc\Text_Tokenizer_Token('<argument>', new \sergiosgc\Sieve_Parser\Script_Tag($tag->getValue()));
 1016:         return new \sergiosgc\Text_Tokenizer_Token('<argument>', $arg->getValue());
 1017:         return new \sergiosgc\Text_Tokenizer_Token('<argument>', $result);
 1018:     }
 1019:     /* }}} */
 1020:     /* reduce_rule_27 {{{ */
 1021:     /**
 1022:      * Reduction function for rule 27 
 1023:      *
 1024:      * Rule 27 is:
 1025:      * <string-list>-><string>
 1026:      *
 1027:      * @param Text_Tokenizer_Token Token of type '<string>'
 1028:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<string-list>' token
 1029:      */
 1030:     protected function reduce_rule_27($str = null)
 1031:     {
 1032:             if (isset($str)) return new \sergiosgc\Text_Tokenizer_Token('<string-list>', [ $str->getValue() ]);
 1033:         return new \sergiosgc\Text_Tokenizer_Token('<string-list>', $strArr->getValue());
 1034:         return new \sergiosgc\Text_Tokenizer_Token('<string-list>', $result);
 1035:     }
 1036:     /* }}} */
 1037:     /* reduce_rule_30 {{{ */
 1038:     /**
 1039:      * Reduction function for rule 30 
 1040:      *
 1041:      * Rule 30 is:
 1042:      * <string>-><quoted-string>
 1043:      *
 1044:      * @param Text_Tokenizer_Token Token of type '<quoted-string>'
 1045:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<string>' token
 1046:      */
 1047:     protected function reduce_rule_30($quoted = null)
 1048:     {
 1049:             return new \sergiosgc\Text_Tokenizer_Token(
 1050:             '<string>',
 1051:             isset($quoted) ?
 1052:                 strtr($quoted->getValue(), [ '\\r' => "\r", '\\n' => "\n", '\\\\' => '\\' ]) : # Unquote string
 1053:                 substr($multiline->getValue(), 0, -3) # Remove .CRLF marker
 1054:             );
 1055:         return new \sergiosgc\Text_Tokenizer_Token('<string>', $result);
 1056:     }
 1057:     /* }}} */
 1058:     /* reduce_rule_31 {{{ */
 1059:     /**
 1060:      * Reduction function for rule 31 
 1061:      *
 1062:      * Rule 31 is:
 1063:      * <string>-><multi-line>
 1064:      *
 1065:      * @param Text_Tokenizer_Token Token of type '<multi-line>'
 1066:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<string>' token
 1067:      */
 1068:     protected function reduce_rule_31($multiline = null)
 1069:     {
 1070:             return new \sergiosgc\Text_Tokenizer_Token(
 1071:             '<string>',
 1072:             isset($quoted) ?
 1073:                 strtr($quoted->getValue(), [ '\\r' => "\r", '\\n' => "\n", '\\\\' => '\\' ]) : # Unquote string
 1074:                 substr($multiline->getValue(), 0, -3) # Remove .CRLF marker
 1075:             );
 1076:         return new \sergiosgc\Text_Tokenizer_Token('<string>', $result);
 1077:     }
 1078:     /* }}} */
 1079:     /* reduce_rule_5 {{{ */
 1080:     /**
 1081:      * Reduction function for rule 5 
 1082:      *
 1083:      * Rule 5 is:
 1084:      * <command>-><identifier><arguments><semicolon>
 1085:      *
 1086:      * @param Text_Tokenizer_Token Token of type '<identifier>'
 1087:      * @param Text_Tokenizer_Token Token of type '<arguments>'
 1088:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
 1089:      */
 1090:     protected function reduce_rule_5($id = null,$args = null)
 1091:     {
 1092:             if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments>', [ 'arguments' => [], 'tests' => [] ]);
 1093:         if (!isset($block)) $block = new \sergiosgc\Text_Tokenizer_Token('<block>', []);
 1094:         return new \sergiosgc\Text_Tokenizer_Token('<command>', 
 1095:             new \sergiosgc\Sieve_Parser\Script_Command(
 1096:                 $id->getValue(),
 1097:                 $args->getValue()['arguments'],
 1098:                 $args->getValue()['tests'],
 1099:                 $block->getValue()));
 1100:         return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
 1101:     }
 1102:     /* }}} */
 1103:     /* reduce_rule_8 {{{ */
 1104:     /**
 1105:      * Reduction function for rule 8 
 1106:      *
 1107:      * Rule 8 is:
 1108:      * <command>-><identifier><bracket-open><block>
 1109:      *
 1110:      * @param Text_Tokenizer_Token Token of type '<identifier>'
 1111:      * @param Text_Tokenizer_Token Token of type '<block>'
 1112:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
 1113:      */
 1114:     protected function reduce_rule_8($id = null,$block = null)
 1115:     {
 1116:             if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments>', [ 'arguments' => [], 'tests' => [] ]);
 1117:         if (!isset($block)) $block = new \sergiosgc\Text_Tokenizer_Token('<block>', []);
 1118:         return new \sergiosgc\Text_Tokenizer_Token('<command>', 
 1119:             new \sergiosgc\Sieve_Parser\Script_Command(
 1120:                 $id->getValue(),
 1121:                 $args->getValue()['arguments'],
 1122:                 $args->getValue()['tests'],
 1123:                 $block->getValue()));
 1124:         return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
 1125:     }
 1126:     /* }}} */
 1127:     /* reduce_rule_10 {{{ */
 1128:     /**
 1129:      * Reduction function for rule 10 
 1130:      *
 1131:      * Rule 10 is:
 1132:      * <block>-><bracket-close>
 1133:      *
 1134:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<block>' token
 1135:      */
 1136:     protected function reduce_rule_10()
 1137:     {
 1138:             if (!isset($acc)) $acc = new \sergiosgc\Text_Tokenizer_Token('<block>', []);
 1139:         if (isset($command)) array_unshift($acc->getValue(), $command->getValue());
 1140:         return $acc;
 1141:         return new \sergiosgc\Text_Tokenizer_Token('<block>', $result);
 1142:     }
 1143:     /* }}} */
 1144:     /* reduce_rule_12 {{{ */
 1145:     /**
 1146:      * Reduction function for rule 12 
 1147:      *
 1148:      * Rule 12 is:
 1149:      * <arguments>-><arguments-plus><test>
 1150:      *
 1151:      * @param Text_Tokenizer_Token Token of type '<arguments-plus>'
 1152:      * @param Text_Tokenizer_Token Token of type '<test>'
 1153:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<arguments>' token
 1154:      */
 1155:     protected function reduce_rule_12($args = null,$test = null)
 1156:     {
 1157:             if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments-plus>', []);
 1158:         if (!isset($tests)) $tests = new \sergiosgc\Text_Tokenizer_Token('<test-list>', []);
 1159:         if (isset($test)) array_unshift($tests->getValue(), $test->getValue());
 1160:         return new \sergiosgc\Text_Tokenizer_Token('<arguments>', 
 1161:             [ 'arguments' => $args->getValue(), 'tests' => $tests->getValue() ]);
 1162:         return new \sergiosgc\Text_Tokenizer_Token('<arguments>', $result);
 1163:     }
 1164:     /* }}} */
 1165:     /* reduce_rule_13 {{{ */
 1166:     /**
 1167:      * Reduction function for rule 13 
 1168:      *
 1169:      * Rule 13 is:
 1170:      * <arguments>-><arguments-plus><test-list>
 1171:      *
 1172:      * @param Text_Tokenizer_Token Token of type '<arguments-plus>'
 1173:      * @param Text_Tokenizer_Token Token of type '<test-list>'
 1174:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<arguments>' token
 1175:      */
 1176:     protected function reduce_rule_13($args = null,$tests = null)
 1177:     {
 1178:             if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments-plus>', []);
 1179:         if (!isset($tests)) $tests = new \sergiosgc\Text_Tokenizer_Token('<test-list>', []);
 1180:         if (isset($test)) array_unshift($tests->getValue(), $test->getValue());
 1181:         return new \sergiosgc\Text_Tokenizer_Token('<arguments>', 
 1182:             [ 'arguments' => $args->getValue(), 'tests' => $tests->getValue() ]);
 1183:         return new \sergiosgc\Text_Tokenizer_Token('<arguments>', $result);
 1184:     }
 1185:     /* }}} */
 1186:     /* reduce_rule_16 {{{ */
 1187:     /**
 1188:      * Reduction function for rule 16 
 1189:      *
 1190:      * Rule 16 is:
 1191:      * <arguments-plus>-><arguments-plus><argument>
 1192:      *
 1193:      * @param Text_Tokenizer_Token Token of type '<arguments-plus>'
 1194:      * @param Text_Tokenizer_Token Token of type '<argument>'
 1195:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<arguments-plus>' token
 1196:      */
 1197:     protected function reduce_rule_16($acc = null,$arg = null)
 1198:     {
 1199:             if (!isset($acc)) $acc = new \sergiosgc\Text_Tokenizer_Token('<arguments-plus>', []);
 1200:         array_push($acc->getValue(), $arg->getValue());
 1201:         return $acc;
 1202:         return new \sergiosgc\Text_Tokenizer_Token('<arguments-plus>', $result);
 1203:     }
 1204:     /* }}} */
 1205:     /* reduce_rule_18 {{{ */
 1206:     /**
 1207:      * Reduction function for rule 18 
 1208:      *
 1209:      * Rule 18 is:
 1210:      * <test>-><identifier><arguments>
 1211:      *
 1212:      * @param Text_Tokenizer_Token Token of type '<identifier>'
 1213:      * @param Text_Tokenizer_Token Token of type '<arguments>'
 1214:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<test>' token
 1215:      */
 1216:     protected function reduce_rule_18($id = null,$args = null)
 1217:     {
 1218:             if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments>', []);
 1219:         return new \sergiosgc\Sieve_Parser\Script_Test($id->getValue(), $args->getValue());
 1220:         return new \sergiosgc\Text_Tokenizer_Token('<test>', $result);
 1221:     }
 1222:     /* }}} */
 1223:     /* reduce_rule_21 {{{ */
 1224:     /**
 1225:      * Reduction function for rule 21 
 1226:      *
 1227:      * Rule 21 is:
 1228:      * <test-plus-csv>-><test>
 1229:      *
 1230:      * @param Text_Tokenizer_Token Token of type '<test>'
 1231:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<test-plus-csv>' token
 1232:      */
 1233:     protected function reduce_rule_21($test = null)
 1234:     {
 1235:             if (!isset($acc)) $acc = new \sergiosgc\Text_Tokenizer_Token('<test-plus-csv>', []);
 1236:         array_unshift($acc->getValue(), $test->getValue());
 1237:         return $acc;
 1238:         return new \sergiosgc\Text_Tokenizer_Token('<test-plus-csv>', $result);
 1239:     }
 1240:     /* }}} */
 1241:     /* reduce_rule_28 {{{ */
 1242:     /**
 1243:      * Reduction function for rule 28 
 1244:      *
 1245:      * Rule 28 is:
 1246:      * <string-plus-csv>-><string>
 1247:      *
 1248:      * @param Text_Tokenizer_Token Token of type '<string>'
 1249:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<string-plus-csv>' token
 1250:      */
 1251:     protected function reduce_rule_28($str = null)
 1252:     {
 1253:             if (!isset($acc)) $acc = new \sergiosgc\Text_Tokenizer_Token('<string-plus-csv>', []);
 1254:         array_unshift($acc->getValue(), $str->getValue());
 1255:         return $acc;
 1256:         return new \sergiosgc\Text_Tokenizer_Token('<string-plus-csv>', $result);
 1257:     }
 1258:     /* }}} */
 1259:     /* reduce_rule_6 {{{ */
 1260:     /**
 1261:      * Reduction function for rule 6 
 1262:      *
 1263:      * Rule 6 is:
 1264:      * <command>-><identifier><arguments><bracket-open><block>
 1265:      *
 1266:      * @param Text_Tokenizer_Token Token of type '<identifier>'
 1267:      * @param Text_Tokenizer_Token Token of type '<arguments>'
 1268:      * @param Text_Tokenizer_Token Token of type '<block>'
 1269:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
 1270:      */
 1271:     protected function reduce_rule_6($id = null,$args = null,$block = null)
 1272:     {
 1273:             if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments>', [ 'arguments' => [], 'tests' => [] ]);
 1274:         if (!isset($block)) $block = new \sergiosgc\Text_Tokenizer_Token('<block>', []);
 1275:         return new \sergiosgc\Text_Tokenizer_Token('<command>', 
 1276:             new \sergiosgc\Sieve_Parser\Script_Command(
 1277:                 $id->getValue(),
 1278:                 $args->getValue()['arguments'],
 1279:                 $args->getValue()['tests'],
 1280:                 $block->getValue()));
 1281:         return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
 1282:     }
 1283:     /* }}} */
 1284:     /* reduce_rule_9 {{{ */
 1285:     /**
 1286:      * Reduction function for rule 9 
 1287:      *
 1288:      * Rule 9 is:
 1289:      * <block>-><command><block>
 1290:      *
 1291:      * @param Text_Tokenizer_Token Token of type '<command>'
 1292:      * @param Text_Tokenizer_Token Token of type '<block>'
 1293:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<block>' token
 1294:      */
 1295:     protected function reduce_rule_9($command = null,$acc = null)
 1296:     {
 1297:             if (!isset($acc)) $acc = new \sergiosgc\Text_Tokenizer_Token('<block>', []);
 1298:         if (isset($command)) array_unshift($acc->getValue(), $command->getValue());
 1299:         return $acc;
 1300:         return new \sergiosgc\Text_Tokenizer_Token('<block>', $result);
 1301:     }
 1302:     /* }}} */
 1303:     /* reduce_rule_20 {{{ */
 1304:     /**
 1305:      * Reduction function for rule 20 
 1306:      *
 1307:      * Rule 20 is:
 1308:      * <test-list>-><parenthesis-open><test-plus-csv><parenthesis-close>
 1309:      *
 1310:      * @param Text_Tokenizer_Token Token of type '<test-plus-csv>'
 1311:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<test-list>' token
 1312:      */
 1313:     protected function reduce_rule_20($tests = null)
 1314:     {
 1315:             return new \sergiosgc\Text_Tokenizer_Token('<test-list>', $tests->getValue());
 1316:         return new \sergiosgc\Text_Tokenizer_Token('<test-list>', $result);
 1317:     }
 1318:     /* }}} */
 1319:     /* reduce_rule_26 {{{ */
 1320:     /**
 1321:      * Reduction function for rule 26 
 1322:      *
 1323:      * Rule 26 is:
 1324:      * <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close>
 1325:      *
 1326:      * @param Text_Tokenizer_Token Token of type '<string-plus-csv>'
 1327:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<string-list>' token
 1328:      */
 1329:     protected function reduce_rule_26($strArr = null)
 1330:     {
 1331:             if (isset($str)) return new \sergiosgc\Text_Tokenizer_Token('<string-list>', [ $str->getValue() ]);
 1332:         return new \sergiosgc\Text_Tokenizer_Token('<string-list>', $strArr->getValue());
 1333:         return new \sergiosgc\Text_Tokenizer_Token('<string-list>', $result);
 1334:     }
 1335:     /* }}} */
 1336:     /* reduce_rule_22 {{{ */
 1337:     /**
 1338:      * Reduction function for rule 22 
 1339:      *
 1340:      * Rule 22 is:
 1341:      * <test-plus-csv>-><test><comma><test-plus-csv>
 1342:      *
 1343:      * @param Text_Tokenizer_Token Token of type '<test>'
 1344:      * @param Text_Tokenizer_Token Token of type '<test-plus-csv>'
 1345:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<test-plus-csv>' token
 1346:      */
 1347:     protected function reduce_rule_22($test = null,$acc = null)
 1348:     {
 1349:             if (!isset($acc)) $acc = new \sergiosgc\Text_Tokenizer_Token('<test-plus-csv>', []);
 1350:         array_unshift($acc->getValue(), $test->getValue());
 1351:         return $acc;
 1352:         return new \sergiosgc\Text_Tokenizer_Token('<test-plus-csv>', $result);
 1353:     }
 1354:     /* }}} */
 1355:     /* reduce_rule_29 {{{ */
 1356:     /**
 1357:      * Reduction function for rule 29 
 1358:      *
 1359:      * Rule 29 is:
 1360:      * <string-plus-csv>-><string-plus-csv><comma><string>
 1361:      *
 1362:      * @param Text_Tokenizer_Token Token of type '<string-plus-csv>'
 1363:      * @param Text_Tokenizer_Token Token of type '<string>'
 1364:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<string-plus-csv>' token
 1365:      */
 1366:     protected function reduce_rule_29($acc = null,$str = null)
 1367:     {
 1368:             if (!isset($acc)) $acc = new \sergiosgc\Text_Tokenizer_Token('<string-plus-csv>', []);
 1369:         array_unshift($acc->getValue(), $str->getValue());
 1370:         return $acc;
 1371:         return new \sergiosgc\Text_Tokenizer_Token('<string-plus-csv>', $result);
 1372:     }
 1373:     /* }}} */
 1374: }
Read token <hash-comment>(# Whitelist addresses
) state []
-Shifting to state 7

Read token <identifier>(if) state [7]
-Reducing using reduce_rule_34 state [7] Result state [5]
-Reducing using reduce_rule_33 state [5] Result state [3]
-Shifting to state 6

Read token <identifier>(address) state [3 6]
-Shifting to state 19

Read token <tag>(:all) state [3 6 19]
-Shifting to state 23

Read token <tag>(:comparator) state [3 6 19 23]
-Reducing using reduce_rule_25 state [3 6 19 23] Result state [3 6 19 18]
-Reducing using reduce_rule_17 state [3 6 19 18] Result state [3 6 19 15]
-Shifting to state 23

Read token <quoted-string>(i;ascii-casemap) state [3 6 19 15 23]
-Reducing using reduce_rule_25 state [3 6 19 15 23] Result state [3 6 19 15 35]
-Reducing using reduce_rule_16 state [3 6 19 15 35] Result state [3 6 19 15]
-Shifting to state 26

Read token <tag>(:is) state [3 6 19 15 26]
-Reducing using reduce_rule_30 state [3 6 19 15 26] Result state [3 6 19 15 25]
-Reducing using reduce_rule_27 state [3 6 19 15 25] Result state [3 6 19 15 21]
-Reducing using reduce_rule_23 state [3 6 19 15 21] Result state [3 6 19 15 35]
-Reducing using reduce_rule_16 state [3 6 19 15 35] Result state [3 6 19 15]
-Shifting to state 23

Read token <square-parenthesis-open>( [) state [3 6 19 15 23]
-Reducing using reduce_rule_25 state [3 6 19 15 23] Result state [3 6 19 15 35]
-Reducing using reduce_rule_16 state [3 6 19 15 35] Result state [3 6 19 15]
-Shifting to state 24

Read token <quoted-string>(From) state [3 6 19 15 24]
-Shifting to state 26

Read token <comma>(,) state [3 6 19 15 24 26]
-Reducing using reduce_rule_30 state [3 6 19 15 24 26] Result state [3 6 19 15 24 40]
-Reducing using reduce_rule_28 state [3 6 19 15 24 40] Result state [3 6 19 15 24 39]
-Shifting to state 46

Read token <quoted-string>(Sender) state [3 6 19 15 24 39 46]
-Shifting to state 26

Read token <comma>(,) state [3 6 19 15 24 39 46 26]
-Reducing using reduce_rule_30 state [3 6 19 15 24 39 46 26] Result state [3 6 19 15 24 39 46 48]
-Reducing using reduce_rule_29 state [3 6 19 15 24 39 46 48] Result state [3 6 19 15 24 39]
-Shifting to state 46

Read token <quoted-string>(Resent-From) state [3 6 19 15 24 39 46]
-Shifting to state 26

Read token <square-parenthesis-close>(]) state [3 6 19 15 24 39 46 26]
-Reducing using reduce_rule_30 state [3 6 19 15 24 39 46 26] Result state [3 6 19 15 24 39 46 48]
-Reducing using reduce_rule_29 state [3 6 19 15 24 39 46 48] Result state [3 6 19 15 24 39]
-Shifting to state 45

Read token <square-parenthesis-open>( [) state [3 6 19 15 24 39 45]
-Reducing using reduce_rule_26 state [3 6 19 15 24 39 45] Result state [3 6 19 15 21]
-Reducing using reduce_rule_23 state [3 6 19 15 21] Result state [3 6 19 15 35]
-Reducing using reduce_rule_16 state [3 6 19 15 35] Result state [3 6 19 15]
-Shifting to state 24

Read token <quoted-string>(example@gmail.com.example.com) state [3 6 19 15 24]
-Shifting to state 26

Read token <comma>(,) state [3 6 19 15 24 26]
-Reducing using reduce_rule_30 state [3 6 19 15 24 26] Result state [3 6 19 15 24 40]
-Reducing using reduce_rule_28 state [3 6 19 15 24 40] Result state [3 6 19 15 24 39]
-Shifting to state 46

Read token <quoted-string>(example2@gmail.com.example.com) state [3 6 19 15 24 39 46]
-Shifting to state 26

Read token <square-parenthesis-close>(]) state [3 6 19 15 24 39 46 26]
-Reducing using reduce_rule_30 state [3 6 19 15 24 39 46 26] Result state [3 6 19 15 24 39 46 48]
-Reducing using reduce_rule_29 state [3 6 19 15 24 39 46 48] Result state [3 6 19 15 24 39]
-Shifting to state 45

Read token <bracket-open>(  {) state [3 6 19 15 24 39 45]
-Reducing using reduce_rule_26 state [3 6 19 15 24 39 45] Result state [3 6 19 15 21]
-Reducing using reduce_rule_23 state [3 6 19 15 21] Result state [3 6 19 15 35]
-Reducing using reduce_rule_16 state [3 6 19 15 35] Result state [3 6 19 15]
-Reducing using reduce_rule_11 state [3 6 19 15] Result state [3 6 19 36]
-Reducing using reduce_rule_18 state [3 6 19 36] Result state [3 6 16]
-Reducing using reduce_rule_14 state [3 6 16] Result state [3 6 12]
-Shifting to state 29

Read token <identifier>(keep) state [3 6 12 29]
-Shifting to state 6

Read token <semicolon>(;) state [3 6 12 29 6]
-Shifting to state 13

Read token <identifier>(stop) state [3 6 12 29 6 13]
-Reducing using reduce_rule_7 state [3 6 12 29 6 13] Result state [3 6 12 29 31]
-Shifting to state 6

Read token <semicolon>(;) state [3 6 12 29 31 6]
-Shifting to state 13

Read token <bracket-close>(
}) state [3 6 12 29 31 6 13]
-Reducing using reduce_rule_7 state [3 6 12 29 31 6 13] Result state [3 6 12 29 31 31]
-Shifting to state 32

Read token <hash-comment>(# Database backup checker
) state [3 6 12 29 31 31 32]
-Reducing using reduce_rule_10 state [3 6 12 29 31 31 32] Result state [3 6 12 29 31 31 42]
-Reducing using reduce_rule_9 state [3 6 12 29 31 31 42] Result state [3 6 12 29 31 42]
-Reducing using reduce_rule_9 state [3 6 12 29 31 42] Result state [3 6 12 29 41]
-Reducing using reduce_rule_6 state [3 6 12 29 41] Result state [3 10]
-Reducing using reduce_rule_3 state [3 10] Result state [2]
-Reducing using reduce_rule_2 state [2] Result state [1]
-Shifting to state 7

Read token <identifier>(if) state [1 7]
-Reducing using reduce_rule_34 state [1 7] Result state [1 5]
-Reducing using reduce_rule_33 state [1 5] Result state [1 3]
-Shifting to state 6

Read token <identifier>(anyof) state [1 3 6]
-Shifting to state 19

Read token <parenthesis-open>( () state [1 3 6 19]
-Shifting to state 20

Read token <identifier>(header) state [1 3 6 19 20]
-Shifting to state 19

Read token <tag>(:comparator) state [1 3 6 19 20 19]
-Shifting to state 23

Read token <quoted-string>(i;ascii-casemap) state [1 3 6 19 20 19 23]
-Reducing using reduce_rule_25 state [1 3 6 19 20 19 23] Result state [1 3 6 19 20 19 18]
-Reducing using reduce_rule_17 state [1 3 6 19 20 19 18] Result state [1 3 6 19 20 19 15]
-Shifting to state 26

Read token <tag>(:contains) state [1 3 6 19 20 19 15 26]
-Reducing using reduce_rule_30 state [1 3 6 19 20 19 15 26] Result state [1 3 6 19 20 19 15 25]
-Reducing using reduce_rule_27 state [1 3 6 19 20 19 15 25] Result state [1 3 6 19 20 19 15 21]
-Reducing using reduce_rule_23 state [1 3 6 19 20 19 15 21] Result state [1 3 6 19 20 19 15 35]
-Reducing using reduce_rule_16 state [1 3 6 19 20 19 15 35] Result state [1 3 6 19 20 19 15]
-Shifting to state 23

Read token <quoted-string>(Subject) state [1 3 6 19 20 19 15 23]
-Reducing using reduce_rule_25 state [1 3 6 19 20 19 15 23] Result state [1 3 6 19 20 19 15 35]
-Reducing using reduce_rule_16 state [1 3 6 19 20 19 15 35] Result state [1 3 6 19 20 19 15]
-Shifting to state 26

Read token <quoted-string>(Database backup incomplete) state [1 3 6 19 20 19 15 26]
-Reducing using reduce_rule_30 state [1 3 6 19 20 19 15 26] Result state [1 3 6 19 20 19 15 25]
-Reducing using reduce_rule_27 state [1 3 6 19 20 19 15 25] Result state [1 3 6 19 20 19 15 21]
-Reducing using reduce_rule_23 state [1 3 6 19 20 19 15 21] Result state [1 3 6 19 20 19 15 35]
-Reducing using reduce_rule_16 state [1 3 6 19 20 19 15 35] Result state [1 3 6 19 20 19 15]
-Shifting to state 26

Read token <comma>(,) state [1 3 6 19 20 19 15 26]
-Reducing using reduce_rule_30 state [1 3 6 19 20 19 15 26] Result state [1 3 6 19 20 19 15 25]
-Reducing using reduce_rule_27 state [1 3 6 19 20 19 15 25] Result state [1 3 6 19 20 19 15 21]
-Reducing using reduce_rule_23 state [1 3 6 19 20 19 15 21] Result state [1 3 6 19 20 19 15 35]
-Reducing using reduce_rule_16 state [1 3 6 19 20 19 15 35] Result state [1 3 6 19 20 19 15]
-Reducing using reduce_rule_11 state [1 3 6 19 20 19 15] Result state [1 3 6 19 20 19 36]
-Reducing using reduce_rule_18 state [1 3 6 19 20 19 36] Result state [1 3 6 19 20 38]
-Shifting to state 44

Read token <identifier>(header) state [1 3 6 19 20 38 44]
-Shifting to state 19

Read token <tag>(:comparator) state [1 3 6 19 20 38 44 19]
-Shifting to state 23

Read token <quoted-string>(i;ascii-casemap) state [1 3 6 19 20 38 44 19 23]
-Reducing using reduce_rule_25 state [1 3 6 19 20 38 44 19 23] Result state [1 3 6 19 20 38 44 19 18]
-Reducing using reduce_rule_17 state [1 3 6 19 20 38 44 19 18] Result state [1 3 6 19 20 38 44 19 15]
-Shifting to state 26

Read token <tag>(:contains) state [1 3 6 19 20 38 44 19 15 26]
-Reducing using reduce_rule_30 state [1 3 6 19 20 38 44 19 15 26] Result state [1 3 6 19 20 38 44 19 15 25]
-Reducing using reduce_rule_27 state [1 3 6 19 20 38 44 19 15 25] Result state [1 3 6 19 20 38 44 19 15 21]
-Reducing using reduce_rule_23 state [1 3 6 19 20 38 44 19 15 21] Result state [1 3 6 19 20 38 44 19 15 35]
-Reducing using reduce_rule_16 state [1 3 6 19 20 38 44 19 15 35] Result state [1 3 6 19 20 38 44 19 15]
-Shifting to state 23

Read token <quoted-string>(Subject) state [1 3 6 19 20 38 44 19 15 23]
-Reducing using reduce_rule_25 state [1 3 6 19 20 38 44 19 15 23] Result state [1 3 6 19 20 38 44 19 15 35]
-Reducing using reduce_rule_16 state [1 3 6 19 20 38 44 19 15 35] Result state [1 3 6 19 20 38 44 19 15]
-Shifting to state 26

Read token <quoted-string>(Database backup missing) state [1 3 6 19 20 38 44 19 15 26]
-Reducing using reduce_rule_30 state [1 3 6 19 20 38 44 19 15 26] Result state [1 3 6 19 20 38 44 19 15 25]
-Reducing using reduce_rule_27 state [1 3 6 19 20 38 44 19 15 25] Result state [1 3 6 19 20 38 44 19 15 21]
-Reducing using reduce_rule_23 state [1 3 6 19 20 38 44 19 15 21] Result state [1 3 6 19 20 38 44 19 15 35]
-Reducing using reduce_rule_16 state [1 3 6 19 20 38 44 19 15 35] Result state [1 3 6 19 20 38 44 19 15]
-Shifting to state 26

Read token <parenthesis-close>( )) state [1 3 6 19 20 38 44 19 15 26]
-Reducing using reduce_rule_30 state [1 3 6 19 20 38 44 19 15 26] Result state [1 3 6 19 20 38 44 19 15 25]
-Reducing using reduce_rule_27 state [1 3 6 19 20 38 44 19 15 25] Result state [1 3 6 19 20 38 44 19 15 21]
-Reducing using reduce_rule_23 state [1 3 6 19 20 38 44 19 15 21] Result state [1 3 6 19 20 38 44 19 15 35]
-Reducing using reduce_rule_16 state [1 3 6 19 20 38 44 19 15 35] Result state [1 3 6 19 20 38 44 19 15]
-Reducing using reduce_rule_11 state [1 3 6 19 20 38 44 19 15] Result state [1 3 6 19 20 38 44 19 36]
-Reducing using reduce_rule_18 state [1 3 6 19 20 38 44 19 36] Result state [1 3 6 19 20 38 44 38]
-Reducing using reduce_rule_21 state [1 3 6 19 20 38 44 38] Result state [1 3 6 19 20 38 44 47]
-Reducing using reduce_rule_22 state [1 3 6 19 20 38 44 47] Result state [1 3 6 19 20 37]
-Shifting to state 43

Read token <bracket-open>( {) state [1 3 6 19 20 37 43]
-Reducing using reduce_rule_20 state [1 3 6 19 20 37 43] Result state [1 3 6 19 17]
-Reducing using reduce_rule_15 state [1 3 6 19 17] Result state [1 3 6 19 36]
-Reducing using reduce_rule_18 state [1 3 6 19 36] Result state [1 3 6 16]
-Reducing using reduce_rule_14 state [1 3 6 16] Result state [1 3 6 12]
-Shifting to state 29

Read token <identifier>(keep) state [1 3 6 12 29]
-Shifting to state 6

Read token <semicolon>(;) state [1 3 6 12 29 6]
-Shifting to state 13

Read token <identifier>(stop) state [1 3 6 12 29 6 13]
-Reducing using reduce_rule_7 state [1 3 6 12 29 6 13] Result state [1 3 6 12 29 31]
-Shifting to state 6

Read token <semicolon>(;) state [1 3 6 12 29 31 6]
-Shifting to state 13

Read token <bracket-close>(
}) state [1 3 6 12 29 31 6 13]
-Reducing using reduce_rule_7 state [1 3 6 12 29 31 6 13] Result state [1 3 6 12 29 31 31]
-Shifting to state 32

Read token <hash-comment>(# Verbose crons
) state [1 3 6 12 29 31 31 32]
-Reducing using reduce_rule_10 state [1 3 6 12 29 31 31 32] Result state [1 3 6 12 29 31 31 42]
-Reducing using reduce_rule_9 state [1 3 6 12 29 31 31 42] Result state [1 3 6 12 29 31 42]
-Reducing using reduce_rule_9 state [1 3 6 12 29 31 42] Result state [1 3 6 12 29 41]
-Reducing using reduce_rule_6 state [1 3 6 12 29 41] Result state [1 3 10]
-Reducing using reduce_rule_3 state [1 3 10] Result state [1 9]
-Reducing using reduce_rule_1 state [1 9] Result state [1]
-Shifting to state 7

Read token <identifier>(if) state [1 7]
-Reducing using reduce_rule_34 state [1 7] Result state [1 5]
-Reducing using reduce_rule_33 state [1 5] Result state [1 3]
-Shifting to state 6

Read token <identifier>(anyof) state [1 3 6]
-Shifting to state 19

Read token <parenthesis-open>( () state [1 3 6 19]
-Shifting to state 20

Read token <identifier>(header) state [1 3 6 19 20]
-Shifting to state 19

Read token <tag>(:comparator) state [1 3 6 19 20 19]
-Shifting to state 23

Read token <quoted-string>(i;octet) state [1 3 6 19 20 19 23]
-Reducing using reduce_rule_25 state [1 3 6 19 20 19 23] Result state [1 3 6 19 20 19 18]
-Reducing using reduce_rule_17 state [1 3 6 19 20 19 18] Result state [1 3 6 19 20 19 15]
-Shifting to state 26

Read token <tag>(:contains) state [1 3 6 19 20 19 15 26]
-Reducing using reduce_rule_30 state [1 3 6 19 20 19 15 26] Result state [1 3 6 19 20 19 15 25]
-Reducing using reduce_rule_27 state [1 3 6 19 20 19 15 25] Result state [1 3 6 19 20 19 15 21]
-Reducing using reduce_rule_23 state [1 3 6 19 20 19 15 21] Result state [1 3 6 19 20 19 15 35]
-Reducing using reduce_rule_16 state [1 3 6 19 20 19 15 35] Result state [1 3 6 19 20 19 15]
-Shifting to state 23

Read token <quoted-string>(Subject) state [1 3 6 19 20 19 15 23]
-Reducing using reduce_rule_25 state [1 3 6 19 20 19 15 23] Result state [1 3 6 19 20 19 15 35]
-Reducing using reduce_rule_16 state [1 3 6 19 20 19 15 35] Result state [1 3 6 19 20 19 15]
-Shifting to state 26

Read token <quoted-string>(cron) state [1 3 6 19 20 19 15 26]
-Reducing using reduce_rule_30 state [1 3 6 19 20 19 15 26] Result state [1 3 6 19 20 19 15 25]
-Reducing using reduce_rule_27 state [1 3 6 19 20 19 15 25] Result state [1 3 6 19 20 19 15 21]
-Reducing using reduce_rule_23 state [1 3 6 19 20 19 15 21] Result state [1 3 6 19 20 19 15 35]
-Reducing using reduce_rule_16 state [1 3 6 19 20 19 15 35] Result state [1 3 6 19 20 19 15]
-Shifting to state 26

Read token <comma>(,) state [1 3 6 19 20 19 15 26]
-Reducing using reduce_rule_30 state [1 3 6 19 20 19 15 26] Result state [1 3 6 19 20 19 15 25]
-Reducing using reduce_rule_27 state [1 3 6 19 20 19 15 25] Result state [1 3 6 19 20 19 15 21]
-Reducing using reduce_rule_23 state [1 3 6 19 20 19 15 21] Result state [1 3 6 19 20 19 15 35]
-Reducing using reduce_rule_16 state [1 3 6 19 20 19 15 35] Result state [1 3 6 19 20 19 15]
-Reducing using reduce_rule_11 state [1 3 6 19 20 19 15] Result state [1 3 6 19 20 19 36]
-Reducing using reduce_rule_18 state [1 3 6 19 20 19 36] Result state [1 3 6 19 20 38]
-Shifting to state 44

Read token <identifier>(header) state [1 3 6 19 20 38 44]
-Shifting to state 19

Read token <tag>(:comparator) state [1 3 6 19 20 38 44 19]
-Shifting to state 23

Read token <quoted-string>(i;ascii-casemap) state [1 3 6 19 20 38 44 19 23]
-Reducing using reduce_rule_25 state [1 3 6 19 20 38 44 19 23] Result state [1 3 6 19 20 38 44 19 18]
-Reducing using reduce_rule_17 state [1 3 6 19 20 38 44 19 18] Result state [1 3 6 19 20 38 44 19 15]
-Shifting to state 26

Read token <tag>(:is) state [1 3 6 19 20 38 44 19 15 26]
-Reducing using reduce_rule_30 state [1 3 6 19 20 38 44 19 15 26] Result state [1 3 6 19 20 38 44 19 15 25]
-Reducing using reduce_rule_27 state [1 3 6 19 20 38 44 19 15 25] Result state [1 3 6 19 20 38 44 19 15 21]
-Reducing using reduce_rule_23 state [1 3 6 19 20 38 44 19 15 21] Result state [1 3 6 19 20 38 44 19 15 35]
-Reducing using reduce_rule_16 state [1 3 6 19 20 38 44 19 15 35] Result state [1 3 6 19 20 38 44 19 15]
-Shifting to state 23

Read token <quoted-string>(Subject) state [1 3 6 19 20 38 44 19 15 23]
-Reducing using reduce_rule_25 state [1 3 6 19 20 38 44 19 15 23] Result state [1 3 6 19 20 38 44 19 15 35]
-Reducing using reduce_rule_16 state [1 3 6 19 20 38 44 19 15 35] Result state [1 3 6 19 20 38 44 19 15]
-Shifting to state 26

Read token <quoted-string>([sometag] Cron <root@example.com>) state [1 3 6 19 20 38 44 19 15 26]
-Reducing using reduce_rule_30 state [1 3 6 19 20 38 44 19 15 26] Result state [1 3 6 19 20 38 44 19 15 25]
-Reducing using reduce_rule_27 state [1 3 6 19 20 38 44 19 15 25] Result state [1 3 6 19 20 38 44 19 15 21]
-Reducing using reduce_rule_23 state [1 3 6 19 20 38 44 19 15 21] Result state [1 3 6 19 20 38 44 19 15 35]
-Reducing using reduce_rule_16 state [1 3 6 19 20 38 44 19 15 35] Result state [1 3 6 19 20 38 44 19 15]
-Shifting to state 26

Read token <parenthesis-close>( )) state [1 3 6 19 20 38 44 19 15 26]
-Reducing using reduce_rule_30 state [1 3 6 19 20 38 44 19 15 26] Result state [1 3 6 19 20 38 44 19 15 25]
-Reducing using reduce_rule_27 state [1 3 6 19 20 38 44 19 15 25] Result state [1 3 6 19 20 38 44 19 15 21]
-Reducing using reduce_rule_23 state [1 3 6 19 20 38 44 19 15 21] Result state [1 3 6 19 20 38 44 19 15 35]
-Reducing using reduce_rule_16 state [1 3 6 19 20 38 44 19 15 35] Result state [1 3 6 19 20 38 44 19 15]
-Reducing using reduce_rule_11 state [1 3 6 19 20 38 44 19 15] Result state [1 3 6 19 20 38 44 19 36]
-Reducing using reduce_rule_18 state [1 3 6 19 20 38 44 19 36] Result state [1 3 6 19 20 38 44 38]
-Reducing using reduce_rule_21 state [1 3 6 19 20 38 44 38] Result state [1 3 6 19 20 38 44 47]
-Reducing using reduce_rule_22 state [1 3 6 19 20 38 44 47] Result state [1 3 6 19 20 37]
-Shifting to state 43

Read token <bracket-open>( {) state [1 3 6 19 20 37 43]
-Reducing using reduce_rule_20 state [1 3 6 19 20 37 43] Result state [1 3 6 19 17]
-Reducing using reduce_rule_15 state [1 3 6 19 17] Result state [1 3 6 19 36]
-Reducing using reduce_rule_18 state [1 3 6 19 36] Result state [1 3 6 16]
-Reducing using reduce_rule_14 state [1 3 6 16] Result state [1 3 6 12]
-Shifting to state 29

Read token <identifier>(discard) state [1 3 6 12 29]
-Shifting to state 6

Read token <semicolon>(;) state [1 3 6 12 29 6]
-Shifting to state 13

Read token <identifier>(stop) state [1 3 6 12 29 6 13]
-Reducing using reduce_rule_7 state [1 3 6 12 29 6 13] Result state [1 3 6 12 29 31]
-Shifting to state 6

Read token <semicolon>(;) state [1 3 6 12 29 31 6]
-Shifting to state 13

Read token <bracket-close>(
}) state [1 3 6 12 29 31 6 13]
-Reducing using reduce_rule_7 state [1 3 6 12 29 31 6 13] Result state [1 3 6 12 29 31 31]
-Shifting to state 32

Read token <hash-comment>(# systemroot
) state [1 3 6 12 29 31 31 32]
-Reducing using reduce_rule_10 state [1 3 6 12 29 31 31 32] Result state [1 3 6 12 29 31 31 42]
-Reducing using reduce_rule_9 state [1 3 6 12 29 31 31 42] Result state [1 3 6 12 29 31 42]
-Reducing using reduce_rule_9 state [1 3 6 12 29 31 42] Result state [1 3 6 12 29 41]
-Reducing using reduce_rule_6 state [1 3 6 12 29 41] Result state [1 3 10]
-Reducing using reduce_rule_3 state [1 3 10] Result state [1 9]
-Reducing using reduce_rule_1 state [1 9] Result state [1]
-Shifting to state 7

Read token <identifier>(if) state [1 7]
-Reducing using reduce_rule_34 state [1 7] Result state [1 5]
-Reducing using reduce_rule_33 state [1 5] Result state [1 3]
-Shifting to state 6

Read token <identifier>(header) state [1 3 6]
-Shifting to state 19

Read token <tag>(:comparator) state [1 3 6 19]
-Shifting to state 23

Read token <quoted-string>(i;ascii-casemap) state [1 3 6 19 23]
-Reducing using reduce_rule_25 state [1 3 6 19 23] Result state [1 3 6 19 18]
-Reducing using reduce_rule_17 state [1 3 6 19 18] Result state [1 3 6 19 15]
-Shifting to state 26

Read token <tag>(:contains) state [1 3 6 19 15 26]
-Reducing using reduce_rule_30 state [1 3 6 19 15 26] Result state [1 3 6 19 15 25]
-Reducing using reduce_rule_27 state [1 3 6 19 15 25] Result state [1 3 6 19 15 21]
-Reducing using reduce_rule_23 state [1 3 6 19 15 21] Result state [1 3 6 19 15 35]
-Reducing using reduce_rule_16 state [1 3 6 19 15 35] Result state [1 3 6 19 15]
-Shifting to state 23

Read token <quoted-string>(Subject) state [1 3 6 19 15 23]
-Reducing using reduce_rule_25 state [1 3 6 19 15 23] Result state [1 3 6 19 15 35]
-Reducing using reduce_rule_16 state [1 3 6 19 15 35] Result state [1 3 6 19 15]
-Shifting to state 26

Read token <quoted-string>([sometag]) state [1 3 6 19 15 26]
-Reducing using reduce_rule_30 state [1 3 6 19 15 26] Result state [1 3 6 19 15 25]
-Reducing using reduce_rule_27 state [1 3 6 19 15 25] Result state [1 3 6 19 15 21]
-Reducing using reduce_rule_23 state [1 3 6 19 15 21] Result state [1 3 6 19 15 35]
-Reducing using reduce_rule_16 state [1 3 6 19 15 35] Result state [1 3 6 19 15]
-Shifting to state 26

Read token <bracket-open>(  {) state [1 3 6 19 15 26]
-Reducing using reduce_rule_30 state [1 3 6 19 15 26] Result state [1 3 6 19 15 25]
-Reducing using reduce_rule_27 state [1 3 6 19 15 25] Result state [1 3 6 19 15 21]
-Reducing using reduce_rule_23 state [1 3 6 19 15 21] Result state [1 3 6 19 15 35]
-Reducing using reduce_rule_16 state [1 3 6 19 15 35] Result state [1 3 6 19 15]
-Reducing using reduce_rule_11 state [1 3 6 19 15] Result state [1 3 6 19 36]
-Reducing using reduce_rule_18 state [1 3 6 19 36] Result state [1 3 6 16]
-Reducing using reduce_rule_14 state [1 3 6 16] Result state [1 3 6 12]
-Shifting to state 29

Read token <identifier>(fileinto) state [1 3 6 12 29]
-Shifting to state 6

Read token <quoted-string>(Servers) state [1 3 6 12 29 6]
-Shifting to state 26

Read token <semicolon>(;) state [1 3 6 12 29 6 26]
-Reducing using reduce_rule_30 state [1 3 6 12 29 6 26] Result state [1 3 6 12 29 6 25]
-Reducing using reduce_rule_27 state [1 3 6 12 29 6 25] Result state [1 3 6 12 29 6 21]
-Reducing using reduce_rule_23 state [1 3 6 12 29 6 21] Result state [1 3 6 12 29 6 18]
-Reducing using reduce_rule_17 state [1 3 6 12 29 6 18] Result state [1 3 6 12 29 6 15]
-Reducing using reduce_rule_11 state [1 3 6 12 29 6 15] Result state [1 3 6 12 29 6 12]
-Shifting to state 28

Read token <identifier>(stop) state [1 3 6 12 29 6 12 28]
-Reducing using reduce_rule_5 state [1 3 6 12 29 6 12 28] Result state [1 3 6 12 29 31]
-Shifting to state 6

Read token <semicolon>(;) state [1 3 6 12 29 31 6]
-Shifting to state 13

Read token <bracket-close>(
}) state [1 3 6 12 29 31 6 13]
-Reducing using reduce_rule_7 state [1 3 6 12 29 31 6 13] Result state [1 3 6 12 29 31 31]
-Shifting to state 32

Read token <hash-comment>(# mxtoolbox 10.0.0.2
) state [1 3 6 12 29 31 31 32]
-Reducing using reduce_rule_10 state [1 3 6 12 29 31 31 32] Result state [1 3 6 12 29 31 31 42]
-Reducing using reduce_rule_9 state [1 3 6 12 29 31 31 42] Result state [1 3 6 12 29 31 42]
-Reducing using reduce_rule_9 state [1 3 6 12 29 31 42] Result state [1 3 6 12 29 41]
-Reducing using reduce_rule_6 state [1 3 6 12 29 41] Result state [1 3 10]
-Reducing using reduce_rule_3 state [1 3 10] Result state [1 9]
-Reducing using reduce_rule_1 state [1 9] Result state [1]
-Shifting to state 7

Read token <identifier>(if) state [1 7]
-Reducing using reduce_rule_34 state [1 7] Result state [1 5]
-Reducing using reduce_rule_33 state [1 5] Result state [1 3]
-Shifting to state 6

Read token <identifier>(anyof) state [1 3 6]
-Shifting to state 19

Read token <parenthesis-open>( () state [1 3 6 19]
-Shifting to state 20

Read token <identifier>(header) state [1 3 6 19 20]
-Shifting to state 19

Read token <tag>(:comparator) state [1 3 6 19 20 19]
-Shifting to state 23

Read token <quoted-string>(i;octet) state [1 3 6 19 20 19 23]
-Reducing using reduce_rule_25 state [1 3 6 19 20 19 23] Result state [1 3 6 19 20 19 18]
-Reducing using reduce_rule_17 state [1 3 6 19 20 19 18] Result state [1 3 6 19 20 19 15]
-Shifting to state 26

Read token <tag>(:contains) state [1 3 6 19 20 19 15 26]
-Reducing using reduce_rule_30 state [1 3 6 19 20 19 15 26] Result state [1 3 6 19 20 19 15 25]
-Reducing using reduce_rule_27 state [1 3 6 19 20 19 15 25] Result state [1 3 6 19 20 19 15 21]
-Reducing using reduce_rule_23 state [1 3 6 19 20 19 15 21] Result state [1 3 6 19 20 19 15 35]
-Reducing using reduce_rule_16 state [1 3 6 19 20 19 15 35] Result state [1 3 6 19 20 19 15]
-Shifting to state 23

Read token <quoted-string>(Subject) state [1 3 6 19 20 19 15 23]
-Reducing using reduce_rule_25 state [1 3 6 19 20 19 15 23] Result state [1 3 6 19 20 19 15 35]
-Reducing using reduce_rule_16 state [1 3 6 19 20 19 15 35] Result state [1 3 6 19 20 19 15]
-Shifting to state 26

Read token <quoted-string>(BLACKLIST - ADDED - 10.0.0.2) state [1 3 6 19 20 19 15 26]
-Reducing using reduce_rule_30 state [1 3 6 19 20 19 15 26] Result state [1 3 6 19 20 19 15 25]
-Reducing using reduce_rule_27 state [1 3 6 19 20 19 15 25] Result state [1 3 6 19 20 19 15 21]
-Reducing using reduce_rule_23 state [1 3 6 19 20 19 15 21] Result state [1 3 6 19 20 19 15 35]
-Reducing using reduce_rule_16 state [1 3 6 19 20 19 15 35] Result state [1 3 6 19 20 19 15]
-Shifting to state 26

Read token <comma>(,) state [1 3 6 19 20 19 15 26]
-Reducing using reduce_rule_30 state [1 3 6 19 20 19 15 26] Result state [1 3 6 19 20 19 15 25]
-Reducing using reduce_rule_27 state [1 3 6 19 20 19 15 25] Result state [1 3 6 19 20 19 15 21]
-Reducing using reduce_rule_23 state [1 3 6 19 20 19 15 21] Result state [1 3 6 19 20 19 15 35]
-Reducing using reduce_rule_16 state [1 3 6 19 20 19 15 35] Result state [1 3 6 19 20 19 15]
-Reducing using reduce_rule_11 state [1 3 6 19 20 19 15] Result state [1 3 6 19 20 19 36]
-Reducing using reduce_rule_18 state [1 3 6 19 20 19 36] Result state [1 3 6 19 20 38]
-Shifting to state 44

Read token <identifier>(header) state [1 3 6 19 20 38 44]
-Shifting to state 19

Read token <tag>(:comparator) state [1 3 6 19 20 38 44 19]
-Shifting to state 23

Read token <quoted-string>(i;octet) state [1 3 6 19 20 38 44 19 23]
-Reducing using reduce_rule_25 state [1 3 6 19 20 38 44 19 23] Result state [1 3 6 19 20 38 44 19 18]
-Reducing using reduce_rule_17 state [1 3 6 19 20 38 44 19 18] Result state [1 3 6 19 20 38 44 19 15]
-Shifting to state 26

Read token <tag>(:contains) state [1 3 6 19 20 38 44 19 15 26]
-Reducing using reduce_rule_30 state [1 3 6 19 20 38 44 19 15 26] Result state [1 3 6 19 20 38 44 19 15 25]
-Reducing using reduce_rule_27 state [1 3 6 19 20 38 44 19 15 25] Result state [1 3 6 19 20 38 44 19 15 21]
-Reducing using reduce_rule_23 state [1 3 6 19 20 38 44 19 15 21] Result state [1 3 6 19 20 38 44 19 15 35]
-Reducing using reduce_rule_16 state [1 3 6 19 20 38 44 19 15 35] Result state [1 3 6 19 20 38 44 19 15]
-Shifting to state 23

Read token <quoted-string>(Subject) state [1 3 6 19 20 38 44 19 15 23]
-Reducing using reduce_rule_25 state [1 3 6 19 20 38 44 19 15 23] Result state [1 3 6 19 20 38 44 19 15 35]
-Reducing using reduce_rule_16 state [1 3 6 19 20 38 44 19 15 35] Result state [1 3 6 19 20 38 44 19 15]
-Shifting to state 26

Read token <quoted-string>(BLACKLIST - REMOVED - 10.0.0.2) state [1 3 6 19 20 38 44 19 15 26]
-Reducing using reduce_rule_30 state [1 3 6 19 20 38 44 19 15 26] Result state [1 3 6 19 20 38 44 19 15 25]
-Reducing using reduce_rule_27 state [1 3 6 19 20 38 44 19 15 25] Result state [1 3 6 19 20 38 44 19 15 21]
-Reducing using reduce_rule_23 state [1 3 6 19 20 38 44 19 15 21] Result state [1 3 6 19 20 38 44 19 15 35]
-Reducing using reduce_rule_16 state [1 3 6 19 20 38 44 19 15 35] Result state [1 3 6 19 20 38 44 19 15]
-Shifting to state 26

Read token <parenthesis-close>( )) state [1 3 6 19 20 38 44 19 15 26]
-Reducing using reduce_rule_30 state [1 3 6 19 20 38 44 19 15 26] Result state [1 3 6 19 20 38 44 19 15 25]
-Reducing using reduce_rule_27 state [1 3 6 19 20 38 44 19 15 25] Result state [1 3 6 19 20 38 44 19 15 21]
-Reducing using reduce_rule_23 state [1 3 6 19 20 38 44 19 15 21] Result state [1 3 6 19 20 38 44 19 15 35]
-Reducing using reduce_rule_16 state [1 3 6 19 20 38 44 19 15 35] Result state [1 3 6 19 20 38 44 19 15]
-Reducing using reduce_rule_11 state [1 3 6 19 20 38 44 19 15] Result state [1 3 6 19 20 38 44 19 36]
-Reducing using reduce_rule_18 state [1 3 6 19 20 38 44 19 36] Result state [1 3 6 19 20 38 44 38]
-Reducing using reduce_rule_21 state [1 3 6 19 20 38 44 38] Result state [1 3 6 19 20 38 44 47]
-Reducing using reduce_rule_22 state [1 3 6 19 20 38 44 47] Result state [1 3 6 19 20 37]
-Shifting to state 43

Read token <bracket-open>( {) state [1 3 6 19 20 37 43]
-Reducing using reduce_rule_20 state [1 3 6 19 20 37 43] Result state [1 3 6 19 17]
-Reducing using reduce_rule_15 state [1 3 6 19 17] Result state [1 3 6 19 36]
-Reducing using reduce_rule_18 state [1 3 6 19 36] Result state [1 3 6 16]
-Reducing using reduce_rule_14 state [1 3 6 16] Result state [1 3 6 12]
-Shifting to state 29

Read token <identifier>(addflag) state [1 3 6 12 29]
-Shifting to state 6

Read token <square-parenthesis-open>( [) state [1 3 6 12 29 6]
-Shifting to state 24

Read token <quoted-string>(\\Seen) state [1 3 6 12 29 6 24]
-Shifting to state 26

Read token <square-parenthesis-close>(]) state [1 3 6 12 29 6 24 26]
-Reducing using reduce_rule_30 state [1 3 6 12 29 6 24 26] Result state [1 3 6 12 29 6 24 40]
-Reducing using reduce_rule_28 state [1 3 6 12 29 6 24 40] Result state [1 3 6 12 29 6 24 39]
-Shifting to state 45

Read token <semicolon>(;) state [1 3 6 12 29 6 24 39 45]
-Reducing using reduce_rule_26 state [1 3 6 12 29 6 24 39 45] Result state [1 3 6 12 29 6 21]
-Reducing using reduce_rule_23 state [1 3 6 12 29 6 21] Result state [1 3 6 12 29 6 18]
-Reducing using reduce_rule_17 state [1 3 6 12 29 6 18] Result state [1 3 6 12 29 6 15]
-Reducing using reduce_rule_11 state [1 3 6 12 29 6 15] Result state [1 3 6 12 29 6 12]
-Shifting to state 28

Read token <identifier>(fileinto) state [1 3 6 12 29 6 12 28]
-Reducing using reduce_rule_5 state [1 3 6 12 29 6 12 28] Result state [1 3 6 12 29 31]
-Shifting to state 6

Read token <quoted-string>(Trash) state [1 3 6 12 29 31 6]
-Shifting to state 26

Read token <semicolon>(;) state [1 3 6 12 29 31 6 26]
-Reducing using reduce_rule_30 state [1 3 6 12 29 31 6 26] Result state [1 3 6 12 29 31 6 25]
-Reducing using reduce_rule_27 state [1 3 6 12 29 31 6 25] Result state [1 3 6 12 29 31 6 21]
-Reducing using reduce_rule_23 state [1 3 6 12 29 31 6 21] Result state [1 3 6 12 29 31 6 18]
-Reducing using reduce_rule_17 state [1 3 6 12 29 31 6 18] Result state [1 3 6 12 29 31 6 15]
-Reducing using reduce_rule_11 state [1 3 6 12 29 31 6 15] Result state [1 3 6 12 29 31 6 12]
-Shifting to state 28

Read token <identifier>(removeflag) state [1 3 6 12 29 31 6 12 28]
-Reducing using reduce_rule_5 state [1 3 6 12 29 31 6 12 28] Result state [1 3 6 12 29 31 31]
-Shifting to state 6

Read token <square-parenthesis-open>( [) state [1 3 6 12 29 31 31 6]
-Shifting to state 24

Read token <quoted-string>(\\Seen) state [1 3 6 12 29 31 31 6 24]
-Shifting to state 26

Read token <square-parenthesis-close>(]) state [1 3 6 12 29 31 31 6 24 26]
-Reducing using reduce_rule_30 state [1 3 6 12 29 31 31 6 24 26] Result state [1 3 6 12 29 31 31 6 24 40]
-Reducing using reduce_rule_28 state [1 3 6 12 29 31 31 6 24 40] Result state [1 3 6 12 29 31 31 6 24 39]
-Shifting to state 45

Read token <semicolon>(;) state [1 3 6 12 29 31 31 6 24 39 45]
-Reducing using reduce_rule_26 state [1 3 6 12 29 31 31 6 24 39 45] Result state [1 3 6 12 29 31 31 6 21]
-Reducing using reduce_rule_23 state [1 3 6 12 29 31 31 6 21] Result state [1 3 6 12 29 31 31 6 18]
-Reducing using reduce_rule_17 state [1 3 6 12 29 31 31 6 18] Result state [1 3 6 12 29 31 31 6 15]
-Reducing using reduce_rule_11 state [1 3 6 12 29 31 31 6 15] Result state [1 3 6 12 29 31 31 6 12]
-Shifting to state 28

Read token <identifier>(stop) state [1 3 6 12 29 31 31 6 12 28]
-Reducing using reduce_rule_5 state [1 3 6 12 29 31 31 6 12 28] Result state [1 3 6 12 29 31 31 31]
-Shifting to state 6

Read token <semicolon>(;) state [1 3 6 12 29 31 31 31 6]
-Shifting to state 13

Read token <bracket-close>(
}) state [1 3 6 12 29 31 31 31 6 13]
-Reducing using reduce_rule_7 state [1 3 6 12 29 31 31 31 6 13] Result state [1 3 6 12 29 31 31 31 31]
-Shifting to state 32

Read token <hash-comment>(# Google My Business
) state [1 3 6 12 29 31 31 31 31 32]
-Reducing using reduce_rule_10 state [1 3 6 12 29 31 31 31 31 32] Result state [1 3 6 12 29 31 31 31 31 42]
-Reducing using reduce_rule_9 state [1 3 6 12 29 31 31 31 31 42] Result state [1 3 6 12 29 31 31 31 42]
-Reducing using reduce_rule_9 state [1 3 6 12 29 31 31 31 42] Result state [1 3 6 12 29 31 31 42]
-Reducing using reduce_rule_9 state [1 3 6 12 29 31 31 42] Result state [1 3 6 12 29 31 42]
-Reducing using reduce_rule_9 state [1 3 6 12 29 31 42] Result state [1 3 6 12 29 41]
-Reducing using reduce_rule_6 state [1 3 6 12 29 41] Result state [1 3 10]
-Reducing using reduce_rule_3 state [1 3 10] Result state [1 9]
-Reducing using reduce_rule_1 state [1 9] Result state [1]
-Shifting to state 7

Read token <identifier>(if) state [1 7]
-Reducing using reduce_rule_34 state [1 7] Result state [1 5]
-Reducing using reduce_rule_33 state [1 5] Result state [1 3]
-Shifting to state 6

Read token <identifier>(allof) state [1 3 6]
-Shifting to state 19

Read token <parenthesis-open>( () state [1 3 6 19]
-Shifting to state 20

Read token <identifier>(address) state [1 3 6 19 20]
-Shifting to state 19

Read token <tag>(:all) state [1 3 6 19 20 19]
-Shifting to state 23

Read token <tag>(:comparator) state [1 3 6 19 20 19 23]
-Reducing using reduce_rule_25 state [1 3 6 19 20 19 23] Result state [1 3 6 19 20 19 18]
-Reducing using reduce_rule_17 state [1 3 6 19 20 19 18] Result state [1 3 6 19 20 19 15]
-Shifting to state 23

Read token <quoted-string>(i;ascii-casemap) state [1 3 6 19 20 19 15 23]
-Reducing using reduce_rule_25 state [1 3 6 19 20 19 15 23] Result state [1 3 6 19 20 19 15 35]
-Reducing using reduce_rule_16 state [1 3 6 19 20 19 15 35] Result state [1 3 6 19 20 19 15]
-Shifting to state 26

Read token <tag>(:is) state [1 3 6 19 20 19 15 26]
-Reducing using reduce_rule_30 state [1 3 6 19 20 19 15 26] Result state [1 3 6 19 20 19 15 25]
-Reducing using reduce_rule_27 state [1 3 6 19 20 19 15 25] Result state [1 3 6 19 20 19 15 21]
-Reducing using reduce_rule_23 state [1 3 6 19 20 19 15 21] Result state [1 3 6 19 20 19 15 35]
-Reducing using reduce_rule_16 state [1 3 6 19 20 19 15 35] Result state [1 3 6 19 20 19 15]
-Shifting to state 23

Read token <quoted-string>(From) state [1 3 6 19 20 19 15 23]
-Reducing using reduce_rule_25 state [1 3 6 19 20 19 15 23] Result state [1 3 6 19 20 19 15 35]
-Reducing using reduce_rule_16 state [1 3 6 19 20 19 15 35] Result state [1 3 6 19 20 19 15]
-Shifting to state 26

Read token <quoted-string>(googlemybusiness-noreply@google.com) state [1 3 6 19 20 19 15 26]
-Reducing using reduce_rule_30 state [1 3 6 19 20 19 15 26] Result state [1 3 6 19 20 19 15 25]
-Reducing using reduce_rule_27 state [1 3 6 19 20 19 15 25] Result state [1 3 6 19 20 19 15 21]
-Reducing using reduce_rule_23 state [1 3 6 19 20 19 15 21] Result state [1 3 6 19 20 19 15 35]
-Reducing using reduce_rule_16 state [1 3 6 19 20 19 15 35] Result state [1 3 6 19 20 19 15]
-Shifting to state 26

Read token <comma>(,) state [1 3 6 19 20 19 15 26]
-Reducing using reduce_rule_30 state [1 3 6 19 20 19 15 26] Result state [1 3 6 19 20 19 15 25]
-Reducing using reduce_rule_27 state [1 3 6 19 20 19 15 25] Result state [1 3 6 19 20 19 15 21]
-Reducing using reduce_rule_23 state [1 3 6 19 20 19 15 21] Result state [1 3 6 19 20 19 15 35]
-Reducing using reduce_rule_16 state [1 3 6 19 20 19 15 35] Result state [1 3 6 19 20 19 15]
-Reducing using reduce_rule_11 state [1 3 6 19 20 19 15] Result state [1 3 6 19 20 19 36]
-Reducing using reduce_rule_18 state [1 3 6 19 20 19 36] Result state [1 3 6 19 20 38]
-Shifting to state 44

Read token <identifier>(address) state [1 3 6 19 20 38 44]
-Shifting to state 19

Read token <tag>(:all) state [1 3 6 19 20 38 44 19]
-Shifting to state 23

Read token <tag>(:comparator) state [1 3 6 19 20 38 44 19 23]
-Reducing using reduce_rule_25 state [1 3 6 19 20 38 44 19 23] Result state [1 3 6 19 20 38 44 19 18]
-Reducing using reduce_rule_17 state [1 3 6 19 20 38 44 19 18] Result state [1 3 6 19 20 38 44 19 15]
-Shifting to state 23

Read token <quoted-string>(i;ascii-casemap) state [1 3 6 19 20 38 44 19 15 23]
-Reducing using reduce_rule_25 state [1 3 6 19 20 38 44 19 15 23] Result state [1 3 6 19 20 38 44 19 15 35]
-Reducing using reduce_rule_16 state [1 3 6 19 20 38 44 19 15 35] Result state [1 3 6 19 20 38 44 19 15]
-Shifting to state 26

Read token <tag>(:is) state [1 3 6 19 20 38 44 19 15 26]
-Reducing using reduce_rule_30 state [1 3 6 19 20 38 44 19 15 26] Result state [1 3 6 19 20 38 44 19 15 25]
-Reducing using reduce_rule_27 state [1 3 6 19 20 38 44 19 15 25] Result state [1 3 6 19 20 38 44 19 15 21]
-Reducing using reduce_rule_23 state [1 3 6 19 20 38 44 19 15 21] Result state [1 3 6 19 20 38 44 19 15 35]
-Reducing using reduce_rule_16 state [1 3 6 19 20 38 44 19 15 35] Result state [1 3 6 19 20 38 44 19 15]
-Shifting to state 23

Read token <quoted-string>(To) state [1 3 6 19 20 38 44 19 15 23]
-Reducing using reduce_rule_25 state [1 3 6 19 20 38 44 19 15 23] Result state [1 3 6 19 20 38 44 19 15 35]
-Reducing using reduce_rule_16 state [1 3 6 19 20 38 44 19 15 35] Result state [1 3 6 19 20 38 44 19 15]
-Shifting to state 26

Read token <quoted-string>(googlemybusiness-noreply@google.com) state [1 3 6 19 20 38 44 19 15 26]
-Reducing using reduce_rule_30 state [1 3 6 19 20 38 44 19 15 26] Result state [1 3 6 19 20 38 44 19 15 25]
-Reducing using reduce_rule_27 state [1 3 6 19 20 38 44 19 15 25] Result state [1 3 6 19 20 38 44 19 15 21]
-Reducing using reduce_rule_23 state [1 3 6 19 20 38 44 19 15 21] Result state [1 3 6 19 20 38 44 19 15 35]
-Reducing using reduce_rule_16 state [1 3 6 19 20 38 44 19 15 35] Result state [1 3 6 19 20 38 44 19 15]
-Shifting to state 26

Read token <parenthesis-close>( )) state [1 3 6 19 20 38 44 19 15 26]
-Reducing using reduce_rule_30 state [1 3 6 19 20 38 44 19 15 26] Result state [1 3 6 19 20 38 44 19 15 25]
-Reducing using reduce_rule_27 state [1 3 6 19 20 38 44 19 15 25] Result state [1 3 6 19 20 38 44 19 15 21]
-Reducing using reduce_rule_23 state [1 3 6 19 20 38 44 19 15 21] Result state [1 3 6 19 20 38 44 19 15 35]
-Reducing using reduce_rule_16 state [1 3 6 19 20 38 44 19 15 35] Result state [1 3 6 19 20 38 44 19 15]
-Reducing using reduce_rule_11 state [1 3 6 19 20 38 44 19 15] Result state [1 3 6 19 20 38 44 19 36]
-Reducing using reduce_rule_18 state [1 3 6 19 20 38 44 19 36] Result state [1 3 6 19 20 38 44 38]
-Reducing using reduce_rule_21 state [1 3 6 19 20 38 44 38] Result state [1 3 6 19 20 38 44 47]
-Reducing using reduce_rule_22 state [1 3 6 19 20 38 44 47] Result state [1 3 6 19 20 37]
-Shifting to state 43

Read token <bracket-open>( {) state [1 3 6 19 20 37 43]
-Reducing using reduce_rule_20 state [1 3 6 19 20 37 43] Result state [1 3 6 19 17]
-Reducing using reduce_rule_15 state [1 3 6 19 17] Result state [1 3 6 19 36]
-Reducing using reduce_rule_18 state [1 3 6 19 36] Result state [1 3 6 16]
-Reducing using reduce_rule_14 state [1 3 6 16] Result state [1 3 6 12]
-Shifting to state 29

Read token <identifier>(discard) state [1 3 6 12 29]
-Shifting to state 6

Read token <semicolon>(;) state [1 3 6 12 29 6]
-Shifting to state 13

Read token <identifier>(stop) state [1 3 6 12 29 6 13]
-Reducing using reduce_rule_7 state [1 3 6 12 29 6 13] Result state [1 3 6 12 29 31]
-Shifting to state 6

Read token <semicolon>(;) state [1 3 6 12 29 31 6]
-Shifting to state 13

Read token <bracket-close>(
}) state [1 3 6 12 29 31 6 13]
-Reducing using reduce_rule_7 state [1 3 6 12 29 31 6 13] Result state [1 3 6 12 29 31 31]
-Shifting to state 32

Read token () state [1 3 6 12 29 31 31 32]
-Reducing using reduce_rule_10 state [1 3 6 12 29 31 31 32] Result state [1 3 6 12 29 31 31 42]
-Reducing using reduce_rule_9 state [1 3 6 12 29 31 31 42] Result state [1 3 6 12 29 31 42]
-Reducing using reduce_rule_9 state [1 3 6 12 29 31 42] Result state [1 3 6 12 29 41]
-Reducing using reduce_rule_6 state [1 3 6 12 29 41] Result state [1 3 10]
-Reducing using reduce_rule_3 state [1 3 10] Result state [1 9]
-Reducing using reduce_rule_1 state [1 9] Result state [1]
-Accepting
object(sergiosgc\Text_Tokenizer_Token)#2372 (2) {
  ["_id":protected]=>
  string(10) "<commands>"
  ["_value":protected]=>
  array(6) {
    [0]=>
    object(sergiosgc\Sieve_Parser\Script_Command)#2367 (5) {
      ["identifier"]=>
      string(2) "if"
      ["arguments"]=>
      array(0) {
      }
      ["tests"]=>
      array(1) {
        [0]=>
        object(sergiosgc\Sieve_Parser\Script_Test)#2379 (2) {
          ["identifier"]=>
          string(7) "address"
          ["arguments"]=>
          array(2) {
            ["arguments"]=>
            array(6) {
              [0]=>
              object(sergiosgc\Sieve_Parser\Script_Tag)#2376 (1) {
                ["tag"]=>
                string(4) ":all"
              }
              [1]=>
              object(sergiosgc\Sieve_Parser\Script_Tag)#2374 (1) {
                ["tag"]=>
                string(11) ":comparator"
              }
              [2]=>
              array(1) {
                [0]=>
                string(15) "i;ascii-casemap"
              }
              [3]=>
              object(sergiosgc\Sieve_Parser\Script_Tag)#2373 (1) {
                ["tag"]=>
                string(3) ":is"
              }
              [4]=>
              array(3) {
                [0]=>
                string(11) "Resent-From"
                [1]=>
                string(6) "Sender"
                [2]=>
                string(4) "From"
              }
              [5]=>
              array(2) {
                [0]=>
                string(30) "example2@gmail.com.example.com"
                [1]=>
                string(29) "example@gmail.com.example.com"
              }
            }
            ["tests"]=>
            array(0) {
            }
          }
        }
      }
      ["subcommands"]=>
      array(2) {
        [0]=>
        object(sergiosgc\Sieve_Parser\Script_Command)#2368 (5) {
          ["identifier"]=>
          string(4) "keep"
          ["arguments"]=>
          array(0) {
          }
          ["tests"]=>
          array(0) {
          }
          ["subcommands"]=>
          array(0) {
          }
          ["comment"]=>
          string(0) ""
        }
        [1]=>
        object(sergiosgc\Sieve_Parser\Script_Command)#2366 (5) {
          ["identifier"]=>
          string(4) "stop"
          ["arguments"]=>
          array(0) {
          }
          ["tests"]=>
          array(0) {
          }
          ["subcommands"]=>
          array(0) {
          }
          ["comment"]=>
          string(0) ""
        }
      }
      ["comment"]=>
      object(sergiosgc\Sieve_Parser\Script_Comment)#2381 (2) {
        ["text"]=>
        object(sergiosgc\Sieve_Parser\Script_Comment)#2383 (2) {
          ["text"]=>
          string(23) "# Whitelist addresses
"
          ["encoding"]=>
          int(1)
        }
        ["encoding"]=>
        int(1)
      }
    }
    [1]=>
    object(sergiosgc\Sieve_Parser\Script_Command)#2341 (5) {
      ["identifier"]=>
      string(2) "if"
      ["arguments"]=>
      array(0) {
      }
      ["tests"]=>
      array(1) {
        [0]=>
        object(sergiosgc\Sieve_Parser\Script_Test)#2371 (2) {
          ["identifier"]=>
          string(5) "anyof"
          ["arguments"]=>
          array(2) {
            ["arguments"]=>
            array(0) {
            }
            ["tests"]=>
            array(2) {
              [0]=>
              object(sergiosgc\Sieve_Parser\Script_Test)#2380 (2) {
                ["identifier"]=>
                string(6) "header"
                ["arguments"]=>
                array(2) {
                  ["arguments"]=>
                  array(5) {
                    [0]=>
                    object(sergiosgc\Sieve_Parser\Script_Tag)#2364 (1) {
                      ["tag"]=>
                      string(11) ":comparator"
                    }
                    [1]=>
                    array(1) {
                      [0]=>
                      string(15) "i;ascii-casemap"
                    }
                    [2]=>
                    object(sergiosgc\Sieve_Parser\Script_Tag)#2362 (1) {
                      ["tag"]=>
                      string(9) ":contains"
                    }
                    [3]=>
                    array(1) {
                      [0]=>
                      string(7) "Subject"
                    }
                    [4]=>
                    array(1) {
                      [0]=>
                      string(26) "Database backup incomplete"
                    }
                  }
                  ["tests"]=>
                  array(0) {
                  }
                }
              }
              [1]=>
              object(sergiosgc\Sieve_Parser\Script_Test)#2359 (2) {
                ["identifier"]=>
                string(6) "header"
                ["arguments"]=>
                array(2) {
                  ["arguments"]=>
                  array(5) {
                    [0]=>
                    object(sergiosgc\Sieve_Parser\Script_Tag)#2369 (1) {
                      ["tag"]=>
                      string(11) ":comparator"
                    }
                    [1]=>
                    array(1) {
                      [0]=>
                      string(15) "i;ascii-casemap"
                    }
                    [2]=>
                    object(sergiosgc\Sieve_Parser\Script_Tag)#2356 (1) {
                      ["tag"]=>
                      string(9) ":contains"
                    }
                    [3]=>
                    array(1) {
                      [0]=>
                      string(7) "Subject"
                    }
                    [4]=>
                    array(1) {
                      [0]=>
                      string(23) "Database backup missing"
                    }
                  }
                  ["tests"]=>
                  array(0) {
                  }
                }
              }
            }
          }
        }
      }
      ["subcommands"]=>
      array(2) {
        [0]=>
        object(sergiosgc\Sieve_Parser\Script_Command)#2342 (5) {
          ["identifier"]=>
          string(4) "keep"
          ["arguments"]=>
          array(0) {
          }
          ["tests"]=>
          array(0) {
          }
          ["subcommands"]=>
          array(0) {
          }
          ["comment"]=>
          string(0) ""
        }
        [1]=>
        object(sergiosgc\Sieve_Parser\Script_Command)#2338 (5) {
          ["identifier"]=>
          string(4) "stop"
          ["arguments"]=>
          array(0) {
          }
          ["tests"]=>
          array(0) {
          }
          ["subcommands"]=>
          array(0) {
          }
          ["comment"]=>
          string(0) ""
        }
      }
      ["comment"]=>
      object(sergiosgc\Sieve_Parser\Script_Comment)#2385 (2) {
        ["text"]=>
        object(sergiosgc\Sieve_Parser\Script_Comment)#2370 (2) {
          ["text"]=>
          string(27) "# Database backup checker
"
          ["encoding"]=>
          int(1)
        }
        ["encoding"]=>
        int(1)
      }
    }
    [2]=>
    object(sergiosgc\Sieve_Parser\Script_Command)#2282 (5) {
      ["identifier"]=>
      string(2) "if"
      ["arguments"]=>
      array(0) {
      }
      ["tests"]=>
      array(1) {
        [0]=>
        object(sergiosgc\Sieve_Parser\Script_Test)#2365 (2) {
          ["identifier"]=>
          string(5) "anyof"
          ["arguments"]=>
          array(2) {
            ["arguments"]=>
            array(0) {
            }
            ["tests"]=>
            array(2) {
              [0]=>
              object(sergiosgc\Sieve_Parser\Script_Test)#2360 (2) {
                ["identifier"]=>
                string(6) "header"
                ["arguments"]=>
                array(2) {
                  ["arguments"]=>
                  array(5) {
                    [0]=>
                    object(sergiosgc\Sieve_Parser\Script_Tag)#2331 (1) {
                      ["tag"]=>
                      string(11) ":comparator"
                    }
                    [1]=>
                    array(1) {
                      [0]=>
                      string(7) "i;octet"
                    }
                    [2]=>
                    object(sergiosgc\Sieve_Parser\Script_Tag)#2292 (1) {
                      ["tag"]=>
                      string(9) ":contains"
                    }
                    [3]=>
                    array(1) {
                      [0]=>
                      string(7) "Subject"
                    }
                    [4]=>
                    array(1) {
                      [0]=>
                      string(4) "cron"
                    }
                  }
                  ["tests"]=>
                  array(0) {
                  }
                }
              }
              [1]=>
              object(sergiosgc\Sieve_Parser\Script_Test)#2290 (2) {
                ["identifier"]=>
                string(6) "header"
                ["arguments"]=>
                array(2) {
                  ["arguments"]=>
                  array(5) {
                    [0]=>
                    object(sergiosgc\Sieve_Parser\Script_Tag)#2357 (1) {
                      ["tag"]=>
                      string(11) ":comparator"
                    }
                    [1]=>
                    array(1) {
                      [0]=>
                      string(15) "i;ascii-casemap"
                    }
                    [2]=>
                    object(sergiosgc\Sieve_Parser\Script_Tag)#2287 (1) {
                      ["tag"]=>
                      string(3) ":is"
                    }
                    [3]=>
                    array(1) {
                      [0]=>
                      string(7) "Subject"
                    }
                    [4]=>
                    array(1) {
                      [0]=>
                      string(33) "[sometag] Cron <root@example.com>"
                    }
                  }
                  ["tests"]=>
                  array(0) {
                  }
                }
              }
            }
          }
        }
      }
      ["subcommands"]=>
      array(2) {
        [0]=>
        object(sergiosgc\Sieve_Parser\Script_Command)#2283 (5) {
          ["identifier"]=>
          string(7) "discard"
          ["arguments"]=>
          array(0) {
          }
          ["tests"]=>
          array(0) {
          }
          ["subcommands"]=>
          array(0) {
          }
          ["comment"]=>
          string(0) ""
        }
        [1]=>
        object(sergiosgc\Sieve_Parser\Script_Command)#2279 (5) {
          ["identifier"]=>
          string(4) "stop"
          ["arguments"]=>
          array(0) {
          }
          ["tests"]=>
          array(0) {
          }
          ["subcommands"]=>
          array(0) {
          }
          ["comment"]=>
          string(0) ""
        }
      }
      ["comment"]=>
      object(sergiosgc\Sieve_Parser\Script_Comment)#2384 (2) {
        ["text"]=>
        object(sergiosgc\Sieve_Parser\Script_Comment)#2377 (2) {
          ["text"]=>
          string(17) "# Verbose crons
"
          ["encoding"]=>
          int(1)
        }
        ["encoding"]=>
        int(1)
      }
    }
    [3]=>
    object(sergiosgc\Sieve_Parser\Script_Command)#2272 (5) {
      ["identifier"]=>
      string(2) "if"
      ["arguments"]=>
      array(0) {
      }
      ["tests"]=>
      array(1) {
        [0]=>
        object(sergiosgc\Sieve_Parser\Script_Test)#2294 (2) {
          ["identifier"]=>
          string(6) "header"
          ["arguments"]=>
          array(2) {
            ["arguments"]=>
            array(5) {
              [0]=>
              object(sergiosgc\Sieve_Parser\Script_Tag)#2291 (1) {
                ["tag"]=>
                string(11) ":comparator"
              }
              [1]=>
              array(1) {
                [0]=>
                string(15) "i;ascii-casemap"
              }
              [2]=>
              object(sergiosgc\Sieve_Parser\Script_Tag)#2275 (1) {
                ["tag"]=>
                string(9) ":contains"
              }
              [3]=>
              array(1) {
                [0]=>
                string(7) "Subject"
              }
              [4]=>
              array(1) {
                [0]=>
                string(9) "[sometag]"
              }
            }
            ["tests"]=>
            array(0) {
            }
          }
        }
      }
      ["subcommands"]=>
      array(2) {
        [0]=>
        object(sergiosgc\Sieve_Parser\Script_Command)#2269 (5) {
          ["identifier"]=>
          string(8) "fileinto"
          ["arguments"]=>
          array(1) {
            [0]=>
            array(1) {
              [0]=>
              string(7) "Servers"
            }
          }
          ["tests"]=>
          array(0) {
          }
          ["subcommands"]=>
          array(0) {
          }
          ["comment"]=>
          string(0) ""
        }
        [1]=>
        object(sergiosgc\Sieve_Parser\Script_Command)#2267 (5) {
          ["identifier"]=>
          string(4) "stop"
          ["arguments"]=>
          array(0) {
          }
          ["tests"]=>
          array(0) {
          }
          ["subcommands"]=>
          array(0) {
          }
          ["comment"]=>
          string(0) ""
        }
      }
      ["comment"]=>
      object(sergiosgc\Sieve_Parser\Script_Comment)#2363 (2) {
        ["text"]=>
        object(sergiosgc\Sieve_Parser\Script_Comment)#2358 (2) {
          ["text"]=>
          string(14) "# systemroot
"
          ["encoding"]=>
          int(1)
        }
        ["encoding"]=>
        int(1)
      }
    }
    [4]=>
    object(sergiosgc\Sieve_Parser\Script_Command)#2253 (5) {
      ["identifier"]=>
      string(2) "if"
      ["arguments"]=>
      array(0) {
      }
      ["tests"]=>
      array(1) {
        [0]=>
        object(sergiosgc\Sieve_Parser\Script_Test)#2375 (2) {
          ["identifier"]=>
          string(5) "anyof"
          ["arguments"]=>
          array(2) {
            ["arguments"]=>
            array(0) {
            }
            ["tests"]=>
            array(2) {
              [0]=>
              object(sergiosgc\Sieve_Parser\Script_Test)#2 (2) {
                ["identifier"]=>
                string(6) "header"
                ["arguments"]=>
                array(2) {
                  ["arguments"]=>
                  array(5) {
                    [0]=>
                    object(sergiosgc\Sieve_Parser\Script_Tag)#2265 (1) {
                      ["tag"]=>
                      string(11) ":comparator"
                    }
                    [1]=>
                    array(1) {
                      [0]=>
                      string(7) "i;octet"
                    }
                    [2]=>
                    object(sergiosgc\Sieve_Parser\Script_Tag)#2259 (1) {
                      ["tag"]=>
                      string(9) ":contains"
                    }
                    [3]=>
                    array(1) {
                      [0]=>
                      string(7) "Subject"
                    }
                    [4]=>
                    array(1) {
                      [0]=>
                      string(28) "BLACKLIST - ADDED - 10.0.0.2"
                    }
                  }
                  ["tests"]=>
                  array(0) {
                  }
                }
              }
              [1]=>
              object(sergiosgc\Sieve_Parser\Script_Test)#2257 (2) {
                ["identifier"]=>
                string(6) "header"
                ["arguments"]=>
                array(2) {
                  ["arguments"]=>
                  array(5) {
                    [0]=>
                    object(sergiosgc\Sieve_Parser\Script_Tag)#2268 (1) {
                      ["tag"]=>
                      string(11) ":comparator"
                    }
                    [1]=>
                    array(1) {
                      [0]=>
                      string(7) "i;octet"
                    }
                    [2]=>
                    object(sergiosgc\Sieve_Parser\Script_Tag)#2254 (1) {
                      ["tag"]=>
                      string(9) ":contains"
                    }
                    [3]=>
                    array(1) {
                      [0]=>
                      string(7) "Subject"
                    }
                    [4]=>
                    array(1) {
                      [0]=>
                      string(30) "BLACKLIST - REMOVED - 10.0.0.2"
                    }
                  }
                  ["tests"]=>
                  array(0) {
                  }
                }
              }
            }
          }
        }
      }
      ["subcommands"]=>
      array(4) {
        [0]=>
        object(sergiosgc\Sieve_Parser\Script_Command)#2252 (5) {
          ["identifier"]=>
          string(7) "addflag"
          ["arguments"]=>
          array(1) {
            [0]=>
            array(1) {
              [0]=>
              string(5) "\Seen"
            }
          }
          ["tests"]=>
          array(0) {
          }
          ["subcommands"]=>
          array(0) {
          }
          ["comment"]=>
          string(0) ""
        }
        [1]=>
        object(sergiosgc\Sieve_Parser\Script_Command)#2249 (5) {
          ["identifier"]=>
          string(8) "fileinto"
          ["arguments"]=>
          array(1) {
            [0]=>
            array(1) {
              [0]=>
              string(5) "Trash"
            }
          }
          ["tests"]=>
          array(0) {
          }
          ["subcommands"]=>
          array(0) {
          }
          ["comment"]=>
          string(0) ""
        }
        [2]=>
        object(sergiosgc\Sieve_Parser\Script_Command)#2251 (5) {
          ["identifier"]=>
          string(10) "removeflag"
          ["arguments"]=>
          array(1) {
            [0]=>
            array(1) {
              [0]=>
              string(5) "\Seen"
            }
          }
          ["tests"]=>
          array(0) {
          }
          ["subcommands"]=>
          array(0) {
          }
          ["comment"]=>
          string(0) ""
        }
        [3]=>
        object(sergiosgc\Sieve_Parser\Script_Command)#2244 (5) {
          ["identifier"]=>
          string(4) "stop"
          ["arguments"]=>
          array(0) {
          }
          ["tests"]=>
          array(0) {
          }
          ["subcommands"]=>
          array(0) {
          }
          ["comment"]=>
          string(0) ""
        }
      }
      ["comment"]=>
      object(sergiosgc\Sieve_Parser\Script_Comment)#2273 (2) {
        ["text"]=>
        object(sergiosgc\Sieve_Parser\Script_Comment)#2289 (2) {
          ["text"]=>
          string(22) "# mxtoolbox 10.0.0.2
"
          ["encoding"]=>
          int(1)
        }
        ["encoding"]=>
        int(1)
      }
    }
    [5]=>
    object(sergiosgc\Sieve_Parser\Script_Command)#2231 (5) {
      ["identifier"]=>
      string(2) "if"
      ["arguments"]=>
      array(0) {
      }
      ["tests"]=>
      array(1) {
        [0]=>
        object(sergiosgc\Sieve_Parser\Script_Test)#2248 (2) {
          ["identifier"]=>
          string(5) "allof"
          ["arguments"]=>
          array(2) {
            ["arguments"]=>
            array(0) {
            }
            ["tests"]=>
            array(2) {
              [0]=>
              object(sergiosgc\Sieve_Parser\Script_Test)#2271 (2) {
                ["identifier"]=>
                string(7) "address"
                ["arguments"]=>
                array(2) {
                  ["arguments"]=>
                  array(6) {
                    [0]=>
                    object(sergiosgc\Sieve_Parser\Script_Tag)#2286 (1) {
                      ["tag"]=>
                      string(4) ":all"
                    }
                    [1]=>
                    object(sergiosgc\Sieve_Parser\Script_Tag)#2243 (1) {
                      ["tag"]=>
                      string(11) ":comparator"
                    }
                    [2]=>
                    array(1) {
                      [0]=>
                      string(15) "i;ascii-casemap"
                    }
                    [3]=>
                    object(sergiosgc\Sieve_Parser\Script_Tag)#2242 (1) {
                      ["tag"]=>
                      string(3) ":is"
                    }
                    [4]=>
                    array(1) {
                      [0]=>
                      string(4) "From"
                    }
                    [5]=>
                    array(1) {
                      [0]=>
                      string(35) "googlemybusiness-noreply@google.com"
                    }
                  }
                  ["tests"]=>
                  array(0) {
                  }
                }
              }
              [1]=>
              object(sergiosgc\Sieve_Parser\Script_Test)#2239 (2) {
                ["identifier"]=>
                string(7) "address"
                ["arguments"]=>
                array(2) {
                  ["arguments"]=>
                  array(6) {
                    [0]=>
                    object(sergiosgc\Sieve_Parser\Script_Tag)#2255 (1) {
                      ["tag"]=>
                      string(4) ":all"
                    }
                    [1]=>
                    object(sergiosgc\Sieve_Parser\Script_Tag)#2235 (1) {
                      ["tag"]=>
                      string(11) ":comparator"
                    }
                    [2]=>
                    array(1) {
                      [0]=>
                      string(15) "i;ascii-casemap"
                    }
                    [3]=>
                    object(sergiosgc\Sieve_Parser\Script_Tag)#2234 (1) {
                      ["tag"]=>
                      string(3) ":is"
                    }
                    [4]=>
                    array(1) {
                      [0]=>
                      string(2) "To"
                    }
                    [5]=>
                    array(1) {
                      [0]=>
                      string(35) "googlemybusiness-noreply@google.com"
                    }
                  }
                  ["tests"]=>
                  array(0) {
                  }
                }
              }
            }
          }
        }
      }
      ["subcommands"]=>
      array(2) {
        [0]=>
        object(sergiosgc\Sieve_Parser\Script_Command)#2232 (5) {
          ["identifier"]=>
          string(7) "discard"
          ["arguments"]=>
          array(0) {
          }
          ["tests"]=>
          array(0) {
          }
          ["subcommands"]=>
          array(0) {
          }
          ["comment"]=>
          string(0) ""
        }
        [1]=>
        object(sergiosgc\Sieve_Parser\Script_Command)#2212 (5) {
          ["identifier"]=>
          string(4) "stop"
          ["arguments"]=>
          array(0) {
          }
          ["tests"]=>
          array(0) {
          }
          ["subcommands"]=>
          array(0) {
          }
          ["comment"]=>
          string(0) ""
        }
      }
      ["comment"]=>
      object(sergiosgc\Sieve_Parser\Script_Comment)#2288 (2) {
        ["text"]=>
        object(sergiosgc\Sieve_Parser\Script_Comment)#2343 (2) {
          ["text"]=>
          string(22) "# Google My Business
"
          ["encoding"]=>
          int(1)
        }
        ["encoding"]=>
        int(1)
      }
    }
  }
}
