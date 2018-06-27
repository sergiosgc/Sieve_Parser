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
   11:  * [5] <command>-><identifier-stop><semicolon>
   12:  * [6] <command>-><identifier-fileinto><string><semicolon>
   13:  * [7] <command>-><identifier-redirect><string><semicolon>
   14:  * [8] <command>-><identifier-keep><semicolon>
   15:  * [9] <command>-><identifier-discard><semicolon>
   16:  * [10] <command>-><identifier-require><string-list><semicolon>
   17:  * [11] <command>-><identifier-if><test><bracket-open><block>
   18:  * [12] <command>-><identifier-if><test><bracket-open><block><command-elsif>
   19:  * [13] <command>-><identifier-if><test><bracket-open><block><command-else>
   20:  * [14] <command-elsif>-><identifier-elsif><test><bracket-open><block>
   21:  * [15] <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif>
   22:  * [16] <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else>
   23:  * [17] <command-else>-><identifier-else><bracket-open><block>
   24:  * [18] <command>-><identifier><arguments><semicolon>
   25:  * [19] <command>-><identifier><arguments><bracket-open><block>
   26:  * [20] <command>-><identifier><semicolon>
   27:  * [21] <command>-><identifier><bracket-open><block>
   28:  * [22] <block>-><command><block>
   29:  * [23] <block>-><bracket-close>
   30:  * [24] <arguments>-><arguments-plus>
   31:  * [25] <arguments>-><arguments-plus><test>
   32:  * [26] <arguments>-><arguments-plus><test-list>
   33:  * [27] <arguments>-><test>
   34:  * [28] <arguments>-><test-list>
   35:  * [29] <arguments-plus>-><arguments-plus><argument>
   36:  * [30] <arguments-plus>-><argument>
   37:  * [31] <test>-><identifier><arguments>
   38:  * [32] <test>-><identifier>
   39:  * [33] <test-list>-><parenthesis-open><test-plus-csv><parenthesis-close>
   40:  * [34] <test-plus-csv>-><test>
   41:  * [35] <test-plus-csv>-><test><comma><test-plus-csv>
   42:  * [36] <argument>-><string-list>
   43:  * [37] <argument>-><number>
   44:  * [38] <argument>-><tag>
   45:  * [39] <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close>
   46:  * [40] <string-list>-><string>
   47:  * [41] <string-plus-csv>-><string>
   48:  * [42] <string-plus-csv>-><string-plus-csv><comma><string>
   49:  * [43] <string>-><quoted-string>
   50:  * [44] <string>-><multi-line>
   51:  * [45] <comment>-><comment><single-comment>
   52:  * [46] <comment>-><single-comment>
   53:  * [47] <single-comment>-><hash-comment>
   54:  * [48] <single-comment>-><bracket-comment>
   55:  *
   56:  * -- Finite State Automaton States --
   57:  * ----------- 0 -----------
   58:  *   --Itemset--
   59:  *     <start>->•<commands>
   60:  *    +<commands>->•<commands><commented-command>
   61:  *    +<commands>->•<commented-command>
   62:  *    +<commented-command>->•<comment><command>
   63:  *    +<commented-command>->•<command>
   64:  *    +<comment>->•<comment><single-comment>
   65:  *    +<comment>->•<single-comment>
   66:  *    +<command>->•<identifier-stop><semicolon>
   67:  *    +<command>->•<identifier-fileinto><string><semicolon>
   68:  *    +<command>->•<identifier-redirect><string><semicolon>
   69:  *    +<command>->•<identifier-keep><semicolon>
   70:  *    +<command>->•<identifier-discard><semicolon>
   71:  *    +<command>->•<identifier-require><string-list><semicolon>
   72:  *    +<command>->•<identifier-if><test><bracket-open><block>
   73:  *    +<command>->•<identifier-if><test><bracket-open><block><command-elsif>
   74:  *    +<command>->•<identifier-if><test><bracket-open><block><command-else>
   75:  *    +<command>->•<identifier><arguments><semicolon>
   76:  *    +<command>->•<identifier><arguments><bracket-open><block>
   77:  *    +<command>->•<identifier><semicolon>
   78:  *    +<command>->•<identifier><bracket-open><block>
   79:  *    +<single-comment>->•<hash-comment>
   80:  *    +<single-comment>->•<bracket-comment>
   81:  *   --Transitions--
   82:  *    Goto on <commands> to 1 because of <start>->•<commands>
   83:  *    Goto on <commands> to 1 because of <commands>->•<commands><commented-command>
   84:  *    Goto on <commented-command> to 2 because of <commands>->•<commented-command>
   85:  *    Goto on <comment> to 3 because of <commented-command>->•<comment><command>
   86:  *    Goto on <command> to 4 because of <commented-command>->•<command>
   87:  *    Goto on <comment> to 3 because of <comment>->•<comment><single-comment>
   88:  *    Goto on <single-comment> to 5 because of <comment>->•<single-comment>
   89:  *    Shift on <identifier-stop> to 6 because of <command>->•<identifier-stop><semicolon> Lookahead = 
   90:  *    Shift on <identifier-fileinto> to 7 because of <command>->•<identifier-fileinto><string><semicolon> Lookahead = 
   91:  *    Shift on <identifier-redirect> to 8 because of <command>->•<identifier-redirect><string><semicolon> Lookahead = 
   92:  *    Shift on <identifier-keep> to 9 because of <command>->•<identifier-keep><semicolon> Lookahead = 
   93:  *    Shift on <identifier-discard> to 10 because of <command>->•<identifier-discard><semicolon> Lookahead = 
   94:  *    Shift on <identifier-require> to 11 because of <command>->•<identifier-require><string-list><semicolon> Lookahead = 
   95:  *    Shift on <identifier-if> to 12 because of <command>->•<identifier-if><test><bracket-open><block> Lookahead = 
   96:  *    Shift on <identifier-if> to 12 because of <command>->•<identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
   97:  *    Shift on <identifier-if> to 12 because of <command>->•<identifier-if><test><bracket-open><block><command-else> Lookahead = 
   98:  *    Shift on <identifier> to 13 because of <command>->•<identifier><arguments><semicolon> Lookahead = 
   99:  *    Shift on <identifier> to 13 because of <command>->•<identifier><arguments><bracket-open><block> Lookahead = 
  100:  *    Shift on <identifier> to 13 because of <command>->•<identifier><semicolon> Lookahead = 
  101:  *    Shift on <identifier> to 13 because of <command>->•<identifier><bracket-open><block> Lookahead = 
  102:  *    Shift on <hash-comment> to 14 because of <single-comment>->•<hash-comment> Lookahead = 
  103:  *    Shift on <bracket-comment> to 15 because of <single-comment>->•<bracket-comment> Lookahead = 
  104:  * ----------- 1 -----------
  105:  *   --Itemset--
  106:  *     <start>-><commands>•
  107:  *     <commands>-><commands>•<commented-command>
  108:  *    +<commented-command>->•<comment><command>
  109:  *    +<commented-command>->•<command>
  110:  *    +<comment>->•<comment><single-comment>
  111:  *    +<comment>->•<single-comment>
  112:  *    +<command>->•<identifier-stop><semicolon>
  113:  *    +<command>->•<identifier-fileinto><string><semicolon>
  114:  *    +<command>->•<identifier-redirect><string><semicolon>
  115:  *    +<command>->•<identifier-keep><semicolon>
  116:  *    +<command>->•<identifier-discard><semicolon>
  117:  *    +<command>->•<identifier-require><string-list><semicolon>
  118:  *    +<command>->•<identifier-if><test><bracket-open><block>
  119:  *    +<command>->•<identifier-if><test><bracket-open><block><command-elsif>
  120:  *    +<command>->•<identifier-if><test><bracket-open><block><command-else>
  121:  *    +<command>->•<identifier><arguments><semicolon>
  122:  *    +<command>->•<identifier><arguments><bracket-open><block>
  123:  *    +<command>->•<identifier><semicolon>
  124:  *    +<command>->•<identifier><bracket-open><block>
  125:  *    +<single-comment>->•<hash-comment>
  126:  *    +<single-comment>->•<bracket-comment>
  127:  *   --Transitions--
  128:  *    Accept on  using <start>-><commands>
  129:  *    Goto on <commented-command> to 16 because of <commands>-><commands>•<commented-command>
  130:  *    Goto on <comment> to 3 because of <commented-command>->•<comment><command>
  131:  *    Goto on <command> to 4 because of <commented-command>->•<command>
  132:  *    Goto on <comment> to 3 because of <comment>->•<comment><single-comment>
  133:  *    Goto on <single-comment> to 5 because of <comment>->•<single-comment>
  134:  *    Shift on <identifier-stop> to 6 because of <command>->•<identifier-stop><semicolon> Lookahead = 
  135:  *    Shift on <identifier-fileinto> to 7 because of <command>->•<identifier-fileinto><string><semicolon> Lookahead = 
  136:  *    Shift on <identifier-redirect> to 8 because of <command>->•<identifier-redirect><string><semicolon> Lookahead = 
  137:  *    Shift on <identifier-keep> to 9 because of <command>->•<identifier-keep><semicolon> Lookahead = 
  138:  *    Shift on <identifier-discard> to 10 because of <command>->•<identifier-discard><semicolon> Lookahead = 
  139:  *    Shift on <identifier-require> to 11 because of <command>->•<identifier-require><string-list><semicolon> Lookahead = 
  140:  *    Shift on <identifier-if> to 12 because of <command>->•<identifier-if><test><bracket-open><block> Lookahead = 
  141:  *    Shift on <identifier-if> to 12 because of <command>->•<identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
  142:  *    Shift on <identifier-if> to 12 because of <command>->•<identifier-if><test><bracket-open><block><command-else> Lookahead = 
  143:  *    Shift on <identifier> to 13 because of <command>->•<identifier><arguments><semicolon> Lookahead = 
  144:  *    Shift on <identifier> to 13 because of <command>->•<identifier><arguments><bracket-open><block> Lookahead = 
  145:  *    Shift on <identifier> to 13 because of <command>->•<identifier><semicolon> Lookahead = 
  146:  *    Shift on <identifier> to 13 because of <command>->•<identifier><bracket-open><block> Lookahead = 
  147:  *    Shift on <hash-comment> to 14 because of <single-comment>->•<hash-comment> Lookahead = 
  148:  *    Shift on <bracket-comment> to 15 because of <single-comment>->•<bracket-comment> Lookahead = 
  149:  * ----------- 2 -----------
  150:  *   --Itemset--
  151:  *     <commands>-><commented-command>•
  152:  *   --Transitions--
  153:  *    Reduce on <identifier-stop> using <commands>-><commented-command> Lookahead = 
  154:  *    Reduce on <identifier-fileinto> using <commands>-><commented-command> Lookahead = 
  155:  *    Reduce on <identifier-redirect> using <commands>-><commented-command> Lookahead = 
  156:  *    Reduce on <identifier-keep> using <commands>-><commented-command> Lookahead = 
  157:  *    Reduce on <identifier-discard> using <commands>-><commented-command> Lookahead = 
  158:  *    Reduce on <identifier-require> using <commands>-><commented-command> Lookahead = 
  159:  *    Reduce on <identifier-if> using <commands>-><commented-command> Lookahead = 
  160:  *    Reduce on <identifier> using <commands>-><commented-command> Lookahead = 
  161:  *    Reduce on <hash-comment> using <commands>-><commented-command> Lookahead = 
  162:  *    Reduce on <bracket-comment> using <commands>-><commented-command> Lookahead = 
  163:  *    Reduce on  using <commands>-><commented-command> Lookahead = 
  164:  * ----------- 3 -----------
  165:  *   --Itemset--
  166:  *     <commented-command>-><comment>•<command>
  167:  *     <comment>-><comment>•<single-comment>
  168:  *    +<command>->•<identifier-stop><semicolon>
  169:  *    +<command>->•<identifier-fileinto><string><semicolon>
  170:  *    +<command>->•<identifier-redirect><string><semicolon>
  171:  *    +<command>->•<identifier-keep><semicolon>
  172:  *    +<command>->•<identifier-discard><semicolon>
  173:  *    +<command>->•<identifier-require><string-list><semicolon>
  174:  *    +<command>->•<identifier-if><test><bracket-open><block>
  175:  *    +<command>->•<identifier-if><test><bracket-open><block><command-elsif>
  176:  *    +<command>->•<identifier-if><test><bracket-open><block><command-else>
  177:  *    +<command>->•<identifier><arguments><semicolon>
  178:  *    +<command>->•<identifier><arguments><bracket-open><block>
  179:  *    +<command>->•<identifier><semicolon>
  180:  *    +<command>->•<identifier><bracket-open><block>
  181:  *    +<single-comment>->•<hash-comment>
  182:  *    +<single-comment>->•<bracket-comment>
  183:  *   --Transitions--
  184:  *    Goto on <command> to 17 because of <commented-command>-><comment>•<command>
  185:  *    Goto on <single-comment> to 18 because of <comment>-><comment>•<single-comment>
  186:  *    Shift on <identifier-stop> to 6 because of <command>->•<identifier-stop><semicolon> Lookahead = 
  187:  *    Shift on <identifier-fileinto> to 7 because of <command>->•<identifier-fileinto><string><semicolon> Lookahead = 
  188:  *    Shift on <identifier-redirect> to 8 because of <command>->•<identifier-redirect><string><semicolon> Lookahead = 
  189:  *    Shift on <identifier-keep> to 9 because of <command>->•<identifier-keep><semicolon> Lookahead = 
  190:  *    Shift on <identifier-discard> to 10 because of <command>->•<identifier-discard><semicolon> Lookahead = 
  191:  *    Shift on <identifier-require> to 11 because of <command>->•<identifier-require><string-list><semicolon> Lookahead = 
  192:  *    Shift on <identifier-if> to 12 because of <command>->•<identifier-if><test><bracket-open><block> Lookahead = 
  193:  *    Shift on <identifier-if> to 12 because of <command>->•<identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
  194:  *    Shift on <identifier-if> to 12 because of <command>->•<identifier-if><test><bracket-open><block><command-else> Lookahead = 
  195:  *    Shift on <identifier> to 13 because of <command>->•<identifier><arguments><semicolon> Lookahead = 
  196:  *    Shift on <identifier> to 13 because of <command>->•<identifier><arguments><bracket-open><block> Lookahead = 
  197:  *    Shift on <identifier> to 13 because of <command>->•<identifier><semicolon> Lookahead = 
  198:  *    Shift on <identifier> to 13 because of <command>->•<identifier><bracket-open><block> Lookahead = 
  199:  *    Shift on <hash-comment> to 14 because of <single-comment>->•<hash-comment> Lookahead = 
  200:  *    Shift on <bracket-comment> to 15 because of <single-comment>->•<bracket-comment> Lookahead = 
  201:  * ----------- 4 -----------
  202:  *   --Itemset--
  203:  *     <commented-command>-><command>•
  204:  *   --Transitions--
  205:  *    Reduce on <identifier-stop> using <commented-command>-><command> Lookahead = 
  206:  *    Reduce on <identifier-fileinto> using <commented-command>-><command> Lookahead = 
  207:  *    Reduce on <identifier-redirect> using <commented-command>-><command> Lookahead = 
  208:  *    Reduce on <identifier-keep> using <commented-command>-><command> Lookahead = 
  209:  *    Reduce on <identifier-discard> using <commented-command>-><command> Lookahead = 
  210:  *    Reduce on <identifier-require> using <commented-command>-><command> Lookahead = 
  211:  *    Reduce on <identifier-if> using <commented-command>-><command> Lookahead = 
  212:  *    Reduce on <identifier> using <commented-command>-><command> Lookahead = 
  213:  *    Reduce on <hash-comment> using <commented-command>-><command> Lookahead = 
  214:  *    Reduce on <bracket-comment> using <commented-command>-><command> Lookahead = 
  215:  *    Reduce on  using <commented-command>-><command> Lookahead = 
  216:  * ----------- 5 -----------
  217:  *   --Itemset--
  218:  *     <comment>-><single-comment>•
  219:  *   --Transitions--
  220:  *    Reduce on <identifier-stop> using <comment>-><single-comment> Lookahead = 
  221:  *    Reduce on <identifier-fileinto> using <comment>-><single-comment> Lookahead = 
  222:  *    Reduce on <identifier-redirect> using <comment>-><single-comment> Lookahead = 
  223:  *    Reduce on <identifier-keep> using <comment>-><single-comment> Lookahead = 
  224:  *    Reduce on <identifier-discard> using <comment>-><single-comment> Lookahead = 
  225:  *    Reduce on <identifier-require> using <comment>-><single-comment> Lookahead = 
  226:  *    Reduce on <identifier-if> using <comment>-><single-comment> Lookahead = 
  227:  *    Reduce on <identifier> using <comment>-><single-comment> Lookahead = 
  228:  *    Reduce on <hash-comment> using <comment>-><single-comment> Lookahead = 
  229:  *    Reduce on <bracket-comment> using <comment>-><single-comment> Lookahead = 
  230:  * ----------- 6 -----------
  231:  *   --Itemset--
  232:  *     <command>-><identifier-stop>•<semicolon>
  233:  *   --Transitions--
  234:  *    Shift on <semicolon> to 19 because of <command>-><identifier-stop>•<semicolon> Lookahead = 
  235:  * ----------- 7 -----------
  236:  *   --Itemset--
  237:  *     <command>-><identifier-fileinto>•<string><semicolon>
  238:  *    +<string>->•<quoted-string>
  239:  *    +<string>->•<multi-line>
  240:  *   --Transitions--
  241:  *    Goto on <string> to 20 because of <command>-><identifier-fileinto>•<string><semicolon>
  242:  *    Shift on <quoted-string> to 21 because of <string>->•<quoted-string> Lookahead = 
  243:  *    Shift on <multi-line> to 22 because of <string>->•<multi-line> Lookahead = 
  244:  * ----------- 8 -----------
  245:  *   --Itemset--
  246:  *     <command>-><identifier-redirect>•<string><semicolon>
  247:  *    +<string>->•<quoted-string>
  248:  *    +<string>->•<multi-line>
  249:  *   --Transitions--
  250:  *    Goto on <string> to 23 because of <command>-><identifier-redirect>•<string><semicolon>
  251:  *    Shift on <quoted-string> to 21 because of <string>->•<quoted-string> Lookahead = 
  252:  *    Shift on <multi-line> to 22 because of <string>->•<multi-line> Lookahead = 
  253:  * ----------- 9 -----------
  254:  *   --Itemset--
  255:  *     <command>-><identifier-keep>•<semicolon>
  256:  *   --Transitions--
  257:  *    Shift on <semicolon> to 24 because of <command>-><identifier-keep>•<semicolon> Lookahead = 
  258:  * ----------- 10 -----------
  259:  *   --Itemset--
  260:  *     <command>-><identifier-discard>•<semicolon>
  261:  *   --Transitions--
  262:  *    Shift on <semicolon> to 25 because of <command>-><identifier-discard>•<semicolon> Lookahead = 
  263:  * ----------- 11 -----------
  264:  *   --Itemset--
  265:  *     <command>-><identifier-require>•<string-list><semicolon>
  266:  *    +<string-list>->•<square-parenthesis-open><string-plus-csv><square-parenthesis-close>
  267:  *    +<string-list>->•<string>
  268:  *    +<string>->•<quoted-string>
  269:  *    +<string>->•<multi-line>
  270:  *   --Transitions--
  271:  *    Goto on <string-list> to 26 because of <command>-><identifier-require>•<string-list><semicolon>
  272:  *    Shift on <square-parenthesis-open> to 27 because of <string-list>->•<square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
  273:  *    Goto on <string> to 28 because of <string-list>->•<string>
  274:  *    Shift on <quoted-string> to 21 because of <string>->•<quoted-string> Lookahead = 
  275:  *    Shift on <multi-line> to 22 because of <string>->•<multi-line> Lookahead = 
  276:  * ----------- 12 -----------
  277:  *   --Itemset--
  278:  *     <command>-><identifier-if>•<test><bracket-open><block>
  279:  *     <command>-><identifier-if>•<test><bracket-open><block><command-elsif>
  280:  *     <command>-><identifier-if>•<test><bracket-open><block><command-else>
  281:  *    +<test>->•<identifier><arguments>
  282:  *    +<test>->•<identifier>
  283:  *   --Transitions--
  284:  *    Goto on <test> to 29 because of <command>-><identifier-if>•<test><bracket-open><block>
  285:  *    Goto on <test> to 29 because of <command>-><identifier-if>•<test><bracket-open><block><command-elsif>
  286:  *    Goto on <test> to 29 because of <command>-><identifier-if>•<test><bracket-open><block><command-else>
  287:  *    Shift on <identifier> to 30 because of <test>->•<identifier><arguments> Lookahead = 
  288:  *    Shift on <identifier> to 30 because of <test>->•<identifier> Lookahead = 
  289:  * ----------- 13 -----------
  290:  *   --Itemset--
  291:  *     <command>-><identifier>•<arguments><semicolon>
  292:  *     <command>-><identifier>•<arguments><bracket-open><block>
  293:  *     <command>-><identifier>•<semicolon>
  294:  *     <command>-><identifier>•<bracket-open><block>
  295:  *    +<arguments>->•<arguments-plus>
  296:  *    +<arguments>->•<arguments-plus><test>
  297:  *    +<arguments>->•<arguments-plus><test-list>
  298:  *    +<arguments>->•<test>
  299:  *    +<arguments>->•<test-list>
  300:  *    +<arguments-plus>->•<arguments-plus><argument>
  301:  *    +<arguments-plus>->•<argument>
  302:  *    +<test>->•<identifier><arguments>
  303:  *    +<test>->•<identifier>
  304:  *    +<test-list>->•<parenthesis-open><test-plus-csv><parenthesis-close>
  305:  *    +<argument>->•<string-list>
  306:  *    +<argument>->•<number>
  307:  *    +<argument>->•<tag>
  308:  *    +<string-list>->•<square-parenthesis-open><string-plus-csv><square-parenthesis-close>
  309:  *    +<string-list>->•<string>
  310:  *    +<string>->•<quoted-string>
  311:  *    +<string>->•<multi-line>
  312:  *   --Transitions--
  313:  *    Goto on <arguments> to 31 because of <command>-><identifier>•<arguments><semicolon>
  314:  *    Goto on <arguments> to 31 because of <command>-><identifier>•<arguments><bracket-open><block>
  315:  *    Shift on <semicolon> to 32 because of <command>-><identifier>•<semicolon> Lookahead = 
  316:  *    Shift on <bracket-open> to 33 because of <command>-><identifier>•<bracket-open><block> Lookahead = 
  317:  *    Goto on <arguments-plus> to 34 because of <arguments>->•<arguments-plus>
  318:  *    Goto on <arguments-plus> to 34 because of <arguments>->•<arguments-plus><test>
  319:  *    Goto on <arguments-plus> to 34 because of <arguments>->•<arguments-plus><test-list>
  320:  *    Goto on <test> to 35 because of <arguments>->•<test>
  321:  *    Goto on <test-list> to 36 because of <arguments>->•<test-list>
  322:  *    Goto on <arguments-plus> to 34 because of <arguments-plus>->•<arguments-plus><argument>
  323:  *    Goto on <argument> to 37 because of <arguments-plus>->•<argument>
  324:  *    Shift on <identifier> to 30 because of <test>->•<identifier><arguments> Lookahead = 
  325:  *    Shift on <identifier> to 30 because of <test>->•<identifier> Lookahead = 
  326:  *    Shift on <parenthesis-open> to 38 because of <test-list>->•<parenthesis-open><test-plus-csv><parenthesis-close> Lookahead = 
  327:  *    Goto on <string-list> to 39 because of <argument>->•<string-list>
  328:  *    Shift on <number> to 40 because of <argument>->•<number> Lookahead = 
  329:  *    Shift on <tag> to 41 because of <argument>->•<tag> Lookahead = 
  330:  *    Shift on <square-parenthesis-open> to 27 because of <string-list>->•<square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
  331:  *    Goto on <string> to 28 because of <string-list>->•<string>
  332:  *    Shift on <quoted-string> to 21 because of <string>->•<quoted-string> Lookahead = 
  333:  *    Shift on <multi-line> to 22 because of <string>->•<multi-line> Lookahead = 
  334:  * ----------- 14 -----------
  335:  *   --Itemset--
  336:  *     <single-comment>-><hash-comment>•
  337:  *   --Transitions--
  338:  *    Reduce on <identifier-stop> using <single-comment>-><hash-comment> Lookahead = 
  339:  *    Reduce on <identifier-fileinto> using <single-comment>-><hash-comment> Lookahead = 
  340:  *    Reduce on <identifier-redirect> using <single-comment>-><hash-comment> Lookahead = 
  341:  *    Reduce on <identifier-keep> using <single-comment>-><hash-comment> Lookahead = 
  342:  *    Reduce on <identifier-discard> using <single-comment>-><hash-comment> Lookahead = 
  343:  *    Reduce on <identifier-require> using <single-comment>-><hash-comment> Lookahead = 
  344:  *    Reduce on <identifier-if> using <single-comment>-><hash-comment> Lookahead = 
  345:  *    Reduce on <identifier> using <single-comment>-><hash-comment> Lookahead = 
  346:  *    Reduce on <hash-comment> using <single-comment>-><hash-comment> Lookahead = 
  347:  *    Reduce on <bracket-comment> using <single-comment>-><hash-comment> Lookahead = 
  348:  * ----------- 15 -----------
  349:  *   --Itemset--
  350:  *     <single-comment>-><bracket-comment>•
  351:  *   --Transitions--
  352:  *    Reduce on <identifier-stop> using <single-comment>-><bracket-comment> Lookahead = 
  353:  *    Reduce on <identifier-fileinto> using <single-comment>-><bracket-comment> Lookahead = 
  354:  *    Reduce on <identifier-redirect> using <single-comment>-><bracket-comment> Lookahead = 
  355:  *    Reduce on <identifier-keep> using <single-comment>-><bracket-comment> Lookahead = 
  356:  *    Reduce on <identifier-discard> using <single-comment>-><bracket-comment> Lookahead = 
  357:  *    Reduce on <identifier-require> using <single-comment>-><bracket-comment> Lookahead = 
  358:  *    Reduce on <identifier-if> using <single-comment>-><bracket-comment> Lookahead = 
  359:  *    Reduce on <identifier> using <single-comment>-><bracket-comment> Lookahead = 
  360:  *    Reduce on <hash-comment> using <single-comment>-><bracket-comment> Lookahead = 
  361:  *    Reduce on <bracket-comment> using <single-comment>-><bracket-comment> Lookahead = 
  362:  * ----------- 16 -----------
  363:  *   --Itemset--
  364:  *     <commands>-><commands><commented-command>•
  365:  *   --Transitions--
  366:  *    Reduce on <identifier-stop> using <commands>-><commands><commented-command> Lookahead = 
  367:  *    Reduce on <identifier-fileinto> using <commands>-><commands><commented-command> Lookahead = 
  368:  *    Reduce on <identifier-redirect> using <commands>-><commands><commented-command> Lookahead = 
  369:  *    Reduce on <identifier-keep> using <commands>-><commands><commented-command> Lookahead = 
  370:  *    Reduce on <identifier-discard> using <commands>-><commands><commented-command> Lookahead = 
  371:  *    Reduce on <identifier-require> using <commands>-><commands><commented-command> Lookahead = 
  372:  *    Reduce on <identifier-if> using <commands>-><commands><commented-command> Lookahead = 
  373:  *    Reduce on <identifier> using <commands>-><commands><commented-command> Lookahead = 
  374:  *    Reduce on <hash-comment> using <commands>-><commands><commented-command> Lookahead = 
  375:  *    Reduce on <bracket-comment> using <commands>-><commands><commented-command> Lookahead = 
  376:  *    Reduce on  using <commands>-><commands><commented-command> Lookahead = 
  377:  * ----------- 17 -----------
  378:  *   --Itemset--
  379:  *     <commented-command>-><comment><command>•
  380:  *   --Transitions--
  381:  *    Reduce on <identifier-stop> using <commented-command>-><comment><command> Lookahead = 
  382:  *    Reduce on <identifier-fileinto> using <commented-command>-><comment><command> Lookahead = 
  383:  *    Reduce on <identifier-redirect> using <commented-command>-><comment><command> Lookahead = 
  384:  *    Reduce on <identifier-keep> using <commented-command>-><comment><command> Lookahead = 
  385:  *    Reduce on <identifier-discard> using <commented-command>-><comment><command> Lookahead = 
  386:  *    Reduce on <identifier-require> using <commented-command>-><comment><command> Lookahead = 
  387:  *    Reduce on <identifier-if> using <commented-command>-><comment><command> Lookahead = 
  388:  *    Reduce on <identifier> using <commented-command>-><comment><command> Lookahead = 
  389:  *    Reduce on <hash-comment> using <commented-command>-><comment><command> Lookahead = 
  390:  *    Reduce on <bracket-comment> using <commented-command>-><comment><command> Lookahead = 
  391:  *    Reduce on  using <commented-command>-><comment><command> Lookahead = 
  392:  * ----------- 18 -----------
  393:  *   --Itemset--
  394:  *     <comment>-><comment><single-comment>•
  395:  *   --Transitions--
  396:  *    Reduce on <identifier-stop> using <comment>-><comment><single-comment> Lookahead = 
  397:  *    Reduce on <identifier-fileinto> using <comment>-><comment><single-comment> Lookahead = 
  398:  *    Reduce on <identifier-redirect> using <comment>-><comment><single-comment> Lookahead = 
  399:  *    Reduce on <identifier-keep> using <comment>-><comment><single-comment> Lookahead = 
  400:  *    Reduce on <identifier-discard> using <comment>-><comment><single-comment> Lookahead = 
  401:  *    Reduce on <identifier-require> using <comment>-><comment><single-comment> Lookahead = 
  402:  *    Reduce on <identifier-if> using <comment>-><comment><single-comment> Lookahead = 
  403:  *    Reduce on <identifier> using <comment>-><comment><single-comment> Lookahead = 
  404:  *    Reduce on <hash-comment> using <comment>-><comment><single-comment> Lookahead = 
  405:  *    Reduce on <bracket-comment> using <comment>-><comment><single-comment> Lookahead = 
  406:  * ----------- 19 -----------
  407:  *   --Itemset--
  408:  *     <command>-><identifier-stop><semicolon>•
  409:  *   --Transitions--
  410:  *    Reduce on <identifier-stop> using <command>-><identifier-stop><semicolon> Lookahead = 
  411:  *    Reduce on <identifier-fileinto> using <command>-><identifier-stop><semicolon> Lookahead = 
  412:  *    Reduce on <identifier-redirect> using <command>-><identifier-stop><semicolon> Lookahead = 
  413:  *    Reduce on <identifier-keep> using <command>-><identifier-stop><semicolon> Lookahead = 
  414:  *    Reduce on <identifier-discard> using <command>-><identifier-stop><semicolon> Lookahead = 
  415:  *    Reduce on <identifier-require> using <command>-><identifier-stop><semicolon> Lookahead = 
  416:  *    Reduce on <identifier-if> using <command>-><identifier-stop><semicolon> Lookahead = 
  417:  *    Reduce on <identifier> using <command>-><identifier-stop><semicolon> Lookahead = 
  418:  *    Reduce on <bracket-close> using <command>-><identifier-stop><semicolon> Lookahead = 
  419:  *    Reduce on <hash-comment> using <command>-><identifier-stop><semicolon> Lookahead = 
  420:  *    Reduce on <bracket-comment> using <command>-><identifier-stop><semicolon> Lookahead = 
  421:  *    Reduce on  using <command>-><identifier-stop><semicolon> Lookahead = 
  422:  * ----------- 20 -----------
  423:  *   --Itemset--
  424:  *     <command>-><identifier-fileinto><string>•<semicolon>
  425:  *   --Transitions--
  426:  *    Shift on <semicolon> to 42 because of <command>-><identifier-fileinto><string>•<semicolon> Lookahead = 
  427:  * ----------- 21 -----------
  428:  *   --Itemset--
  429:  *     <string>-><quoted-string>•
  430:  *   --Transitions--
  431:  *    Reduce on <semicolon> using <string>-><quoted-string> Lookahead = 
  432:  *    Reduce on <bracket-open> using <string>-><quoted-string> Lookahead = 
  433:  *    Reduce on <identifier> using <string>-><quoted-string> Lookahead = 
  434:  *    Reduce on <parenthesis-open> using <string>-><quoted-string> Lookahead = 
  435:  *    Reduce on <parenthesis-close> using <string>-><quoted-string> Lookahead = 
  436:  *    Reduce on <comma> using <string>-><quoted-string> Lookahead = 
  437:  *    Reduce on <number> using <string>-><quoted-string> Lookahead = 
  438:  *    Reduce on <tag> using <string>-><quoted-string> Lookahead = 
  439:  *    Reduce on <square-parenthesis-open> using <string>-><quoted-string> Lookahead = 
  440:  *    Reduce on <square-parenthesis-close> using <string>-><quoted-string> Lookahead = 
  441:  *    Reduce on <quoted-string> using <string>-><quoted-string> Lookahead = 
  442:  *    Reduce on <multi-line> using <string>-><quoted-string> Lookahead = 
  443:  * ----------- 22 -----------
  444:  *   --Itemset--
  445:  *     <string>-><multi-line>•
  446:  *   --Transitions--
  447:  *    Reduce on <semicolon> using <string>-><multi-line> Lookahead = 
  448:  *    Reduce on <bracket-open> using <string>-><multi-line> Lookahead = 
  449:  *    Reduce on <identifier> using <string>-><multi-line> Lookahead = 
  450:  *    Reduce on <parenthesis-open> using <string>-><multi-line> Lookahead = 
  451:  *    Reduce on <parenthesis-close> using <string>-><multi-line> Lookahead = 
  452:  *    Reduce on <comma> using <string>-><multi-line> Lookahead = 
  453:  *    Reduce on <number> using <string>-><multi-line> Lookahead = 
  454:  *    Reduce on <tag> using <string>-><multi-line> Lookahead = 
  455:  *    Reduce on <square-parenthesis-open> using <string>-><multi-line> Lookahead = 
  456:  *    Reduce on <square-parenthesis-close> using <string>-><multi-line> Lookahead = 
  457:  *    Reduce on <quoted-string> using <string>-><multi-line> Lookahead = 
  458:  *    Reduce on <multi-line> using <string>-><multi-line> Lookahead = 
  459:  * ----------- 23 -----------
  460:  *   --Itemset--
  461:  *     <command>-><identifier-redirect><string>•<semicolon>
  462:  *   --Transitions--
  463:  *    Shift on <semicolon> to 43 because of <command>-><identifier-redirect><string>•<semicolon> Lookahead = 
  464:  * ----------- 24 -----------
  465:  *   --Itemset--
  466:  *     <command>-><identifier-keep><semicolon>•
  467:  *   --Transitions--
  468:  *    Reduce on <identifier-stop> using <command>-><identifier-keep><semicolon> Lookahead = 
  469:  *    Reduce on <identifier-fileinto> using <command>-><identifier-keep><semicolon> Lookahead = 
  470:  *    Reduce on <identifier-redirect> using <command>-><identifier-keep><semicolon> Lookahead = 
  471:  *    Reduce on <identifier-keep> using <command>-><identifier-keep><semicolon> Lookahead = 
  472:  *    Reduce on <identifier-discard> using <command>-><identifier-keep><semicolon> Lookahead = 
  473:  *    Reduce on <identifier-require> using <command>-><identifier-keep><semicolon> Lookahead = 
  474:  *    Reduce on <identifier-if> using <command>-><identifier-keep><semicolon> Lookahead = 
  475:  *    Reduce on <identifier> using <command>-><identifier-keep><semicolon> Lookahead = 
  476:  *    Reduce on <bracket-close> using <command>-><identifier-keep><semicolon> Lookahead = 
  477:  *    Reduce on <hash-comment> using <command>-><identifier-keep><semicolon> Lookahead = 
  478:  *    Reduce on <bracket-comment> using <command>-><identifier-keep><semicolon> Lookahead = 
  479:  *    Reduce on  using <command>-><identifier-keep><semicolon> Lookahead = 
  480:  * ----------- 25 -----------
  481:  *   --Itemset--
  482:  *     <command>-><identifier-discard><semicolon>•
  483:  *   --Transitions--
  484:  *    Reduce on <identifier-stop> using <command>-><identifier-discard><semicolon> Lookahead = 
  485:  *    Reduce on <identifier-fileinto> using <command>-><identifier-discard><semicolon> Lookahead = 
  486:  *    Reduce on <identifier-redirect> using <command>-><identifier-discard><semicolon> Lookahead = 
  487:  *    Reduce on <identifier-keep> using <command>-><identifier-discard><semicolon> Lookahead = 
  488:  *    Reduce on <identifier-discard> using <command>-><identifier-discard><semicolon> Lookahead = 
  489:  *    Reduce on <identifier-require> using <command>-><identifier-discard><semicolon> Lookahead = 
  490:  *    Reduce on <identifier-if> using <command>-><identifier-discard><semicolon> Lookahead = 
  491:  *    Reduce on <identifier> using <command>-><identifier-discard><semicolon> Lookahead = 
  492:  *    Reduce on <bracket-close> using <command>-><identifier-discard><semicolon> Lookahead = 
  493:  *    Reduce on <hash-comment> using <command>-><identifier-discard><semicolon> Lookahead = 
  494:  *    Reduce on <bracket-comment> using <command>-><identifier-discard><semicolon> Lookahead = 
  495:  *    Reduce on  using <command>-><identifier-discard><semicolon> Lookahead = 
  496:  * ----------- 26 -----------
  497:  *   --Itemset--
  498:  *     <command>-><identifier-require><string-list>•<semicolon>
  499:  *   --Transitions--
  500:  *    Shift on <semicolon> to 44 because of <command>-><identifier-require><string-list>•<semicolon> Lookahead = 
  501:  * ----------- 27 -----------
  502:  *   --Itemset--
  503:  *     <string-list>-><square-parenthesis-open>•<string-plus-csv><square-parenthesis-close>
  504:  *    +<string-plus-csv>->•<string>
  505:  *    +<string-plus-csv>->•<string-plus-csv><comma><string>
  506:  *    +<string>->•<quoted-string>
  507:  *    +<string>->•<multi-line>
  508:  *   --Transitions--
  509:  *    Goto on <string-plus-csv> to 45 because of <string-list>-><square-parenthesis-open>•<string-plus-csv><square-parenthesis-close>
  510:  *    Goto on <string> to 46 because of <string-plus-csv>->•<string>
  511:  *    Goto on <string-plus-csv> to 45 because of <string-plus-csv>->•<string-plus-csv><comma><string>
  512:  *    Shift on <quoted-string> to 21 because of <string>->•<quoted-string> Lookahead = 
  513:  *    Shift on <multi-line> to 22 because of <string>->•<multi-line> Lookahead = 
  514:  * ----------- 28 -----------
  515:  *   --Itemset--
  516:  *     <string-list>-><string>•
  517:  *   --Transitions--
  518:  *    Reduce on <semicolon> using <string-list>-><string> Lookahead = 
  519:  *    Reduce on <bracket-open> using <string-list>-><string> Lookahead = 
  520:  *    Reduce on <identifier> using <string-list>-><string> Lookahead = 
  521:  *    Reduce on <parenthesis-open> using <string-list>-><string> Lookahead = 
  522:  *    Reduce on <parenthesis-close> using <string-list>-><string> Lookahead = 
  523:  *    Reduce on <comma> using <string-list>-><string> Lookahead = 
  524:  *    Reduce on <number> using <string-list>-><string> Lookahead = 
  525:  *    Reduce on <tag> using <string-list>-><string> Lookahead = 
  526:  *    Reduce on <square-parenthesis-open> using <string-list>-><string> Lookahead = 
  527:  *    Reduce on <quoted-string> using <string-list>-><string> Lookahead = 
  528:  *    Reduce on <multi-line> using <string-list>-><string> Lookahead = 
  529:  * ----------- 29 -----------
  530:  *   --Itemset--
  531:  *     <command>-><identifier-if><test>•<bracket-open><block>
  532:  *     <command>-><identifier-if><test>•<bracket-open><block><command-elsif>
  533:  *     <command>-><identifier-if><test>•<bracket-open><block><command-else>
  534:  *   --Transitions--
  535:  *    Shift on <bracket-open> to 47 because of <command>-><identifier-if><test>•<bracket-open><block> Lookahead = 
  536:  *    Shift on <bracket-open> to 47 because of <command>-><identifier-if><test>•<bracket-open><block><command-elsif> Lookahead = 
  537:  *    Shift on <bracket-open> to 47 because of <command>-><identifier-if><test>•<bracket-open><block><command-else> Lookahead = 
  538:  * ----------- 30 -----------
  539:  *   --Itemset--
  540:  *     <test>-><identifier>•<arguments>
  541:  *     <test>-><identifier>•
  542:  *    +<arguments>->•<arguments-plus>
  543:  *    +<arguments>->•<arguments-plus><test>
  544:  *    +<arguments>->•<arguments-plus><test-list>
  545:  *    +<arguments>->•<test>
  546:  *    +<arguments>->•<test-list>
  547:  *    +<arguments-plus>->•<arguments-plus><argument>
  548:  *    +<arguments-plus>->•<argument>
  549:  *    +<test>->•<identifier><arguments>
  550:  *    +<test>->•<identifier>
  551:  *    +<test-list>->•<parenthesis-open><test-plus-csv><parenthesis-close>
  552:  *    +<argument>->•<string-list>
  553:  *    +<argument>->•<number>
  554:  *    +<argument>->•<tag>
  555:  *    +<string-list>->•<square-parenthesis-open><string-plus-csv><square-parenthesis-close>
  556:  *    +<string-list>->•<string>
  557:  *    +<string>->•<quoted-string>
  558:  *    +<string>->•<multi-line>
  559:  *   --Transitions--
  560:  *    Goto on <arguments> to 48 because of <test>-><identifier>•<arguments>
  561:  *    Reduce on <semicolon> using <test>-><identifier> Lookahead = 
  562:  *    Reduce on <bracket-open> using <test>-><identifier> Lookahead = 
  563:  *    Reduce on <parenthesis-close> using <test>-><identifier> Lookahead = 
  564:  *    Reduce on <comma> using <test>-><identifier> Lookahead = 
  565:  *    Goto on <arguments-plus> to 34 because of <arguments>->•<arguments-plus>
  566:  *    Goto on <arguments-plus> to 34 because of <arguments>->•<arguments-plus><test>
  567:  *    Goto on <arguments-plus> to 34 because of <arguments>->•<arguments-plus><test-list>
  568:  *    Goto on <test> to 35 because of <arguments>->•<test>
  569:  *    Goto on <test-list> to 36 because of <arguments>->•<test-list>
  570:  *    Goto on <arguments-plus> to 34 because of <arguments-plus>->•<arguments-plus><argument>
  571:  *    Goto on <argument> to 37 because of <arguments-plus>->•<argument>
  572:  *    Shift on <identifier> to 30 because of <test>->•<identifier><arguments> Lookahead = 
  573:  *    Shift on <identifier> to 30 because of <test>->•<identifier> Lookahead = 
  574:  *    Shift on <parenthesis-open> to 38 because of <test-list>->•<parenthesis-open><test-plus-csv><parenthesis-close> Lookahead = 
  575:  *    Goto on <string-list> to 39 because of <argument>->•<string-list>
  576:  *    Shift on <number> to 40 because of <argument>->•<number> Lookahead = 
  577:  *    Shift on <tag> to 41 because of <argument>->•<tag> Lookahead = 
  578:  *    Shift on <square-parenthesis-open> to 27 because of <string-list>->•<square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
  579:  *    Goto on <string> to 28 because of <string-list>->•<string>
  580:  *    Shift on <quoted-string> to 21 because of <string>->•<quoted-string> Lookahead = 
  581:  *    Shift on <multi-line> to 22 because of <string>->•<multi-line> Lookahead = 
  582:  * ----------- 31 -----------
  583:  *   --Itemset--
  584:  *     <command>-><identifier><arguments>•<semicolon>
  585:  *     <command>-><identifier><arguments>•<bracket-open><block>
  586:  *   --Transitions--
  587:  *    Shift on <semicolon> to 49 because of <command>-><identifier><arguments>•<semicolon> Lookahead = 
  588:  *    Shift on <bracket-open> to 50 because of <command>-><identifier><arguments>•<bracket-open><block> Lookahead = 
  589:  * ----------- 32 -----------
  590:  *   --Itemset--
  591:  *     <command>-><identifier><semicolon>•
  592:  *   --Transitions--
  593:  *    Reduce on <identifier-stop> using <command>-><identifier><semicolon> Lookahead = 
  594:  *    Reduce on <identifier-fileinto> using <command>-><identifier><semicolon> Lookahead = 
  595:  *    Reduce on <identifier-redirect> using <command>-><identifier><semicolon> Lookahead = 
  596:  *    Reduce on <identifier-keep> using <command>-><identifier><semicolon> Lookahead = 
  597:  *    Reduce on <identifier-discard> using <command>-><identifier><semicolon> Lookahead = 
  598:  *    Reduce on <identifier-require> using <command>-><identifier><semicolon> Lookahead = 
  599:  *    Reduce on <identifier-if> using <command>-><identifier><semicolon> Lookahead = 
  600:  *    Reduce on <identifier> using <command>-><identifier><semicolon> Lookahead = 
  601:  *    Reduce on <bracket-close> using <command>-><identifier><semicolon> Lookahead = 
  602:  *    Reduce on <hash-comment> using <command>-><identifier><semicolon> Lookahead = 
  603:  *    Reduce on <bracket-comment> using <command>-><identifier><semicolon> Lookahead = 
  604:  *    Reduce on  using <command>-><identifier><semicolon> Lookahead = 
  605:  * ----------- 33 -----------
  606:  *   --Itemset--
  607:  *     <command>-><identifier><bracket-open>•<block>
  608:  *    +<block>->•<command><block>
  609:  *    +<block>->•<bracket-close>
  610:  *    +<command>->•<identifier-stop><semicolon>
  611:  *    +<command>->•<identifier-fileinto><string><semicolon>
  612:  *    +<command>->•<identifier-redirect><string><semicolon>
  613:  *    +<command>->•<identifier-keep><semicolon>
  614:  *    +<command>->•<identifier-discard><semicolon>
  615:  *    +<command>->•<identifier-require><string-list><semicolon>
  616:  *    +<command>->•<identifier-if><test><bracket-open><block>
  617:  *    +<command>->•<identifier-if><test><bracket-open><block><command-elsif>
  618:  *    +<command>->•<identifier-if><test><bracket-open><block><command-else>
  619:  *    +<command>->•<identifier><arguments><semicolon>
  620:  *    +<command>->•<identifier><arguments><bracket-open><block>
  621:  *    +<command>->•<identifier><semicolon>
  622:  *    +<command>->•<identifier><bracket-open><block>
  623:  *   --Transitions--
  624:  *    Goto on <block> to 51 because of <command>-><identifier><bracket-open>•<block>
  625:  *    Goto on <command> to 52 because of <block>->•<command><block>
  626:  *    Shift on <bracket-close> to 53 because of <block>->•<bracket-close> Lookahead = 
  627:  *    Shift on <identifier-stop> to 6 because of <command>->•<identifier-stop><semicolon> Lookahead = 
  628:  *    Shift on <identifier-fileinto> to 7 because of <command>->•<identifier-fileinto><string><semicolon> Lookahead = 
  629:  *    Shift on <identifier-redirect> to 8 because of <command>->•<identifier-redirect><string><semicolon> Lookahead = 
  630:  *    Shift on <identifier-keep> to 9 because of <command>->•<identifier-keep><semicolon> Lookahead = 
  631:  *    Shift on <identifier-discard> to 10 because of <command>->•<identifier-discard><semicolon> Lookahead = 
  632:  *    Shift on <identifier-require> to 11 because of <command>->•<identifier-require><string-list><semicolon> Lookahead = 
  633:  *    Shift on <identifier-if> to 12 because of <command>->•<identifier-if><test><bracket-open><block> Lookahead = 
  634:  *    Shift on <identifier-if> to 12 because of <command>->•<identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
  635:  *    Shift on <identifier-if> to 12 because of <command>->•<identifier-if><test><bracket-open><block><command-else> Lookahead = 
  636:  *    Shift on <identifier> to 13 because of <command>->•<identifier><arguments><semicolon> Lookahead = 
  637:  *    Shift on <identifier> to 13 because of <command>->•<identifier><arguments><bracket-open><block> Lookahead = 
  638:  *    Shift on <identifier> to 13 because of <command>->•<identifier><semicolon> Lookahead = 
  639:  *    Shift on <identifier> to 13 because of <command>->•<identifier><bracket-open><block> Lookahead = 
  640:  * ----------- 34 -----------
  641:  *   --Itemset--
  642:  *     <arguments>-><arguments-plus>•
  643:  *     <arguments>-><arguments-plus>•<test>
  644:  *     <arguments>-><arguments-plus>•<test-list>
  645:  *     <arguments-plus>-><arguments-plus>•<argument>
  646:  *    +<test>->•<identifier><arguments>
  647:  *    +<test>->•<identifier>
  648:  *    +<test-list>->•<parenthesis-open><test-plus-csv><parenthesis-close>
  649:  *    +<argument>->•<string-list>
  650:  *    +<argument>->•<number>
  651:  *    +<argument>->•<tag>
  652:  *    +<string-list>->•<square-parenthesis-open><string-plus-csv><square-parenthesis-close>
  653:  *    +<string-list>->•<string>
  654:  *    +<string>->•<quoted-string>
  655:  *    +<string>->•<multi-line>
  656:  *   --Transitions--
  657:  *    Reduce on <semicolon> using <arguments>-><arguments-plus> Lookahead = 
  658:  *    Reduce on <bracket-open> using <arguments>-><arguments-plus> Lookahead = 
  659:  *    Reduce on <parenthesis-close> using <arguments>-><arguments-plus> Lookahead = 
  660:  *    Reduce on <comma> using <arguments>-><arguments-plus> Lookahead = 
  661:  *    Goto on <test> to 54 because of <arguments>-><arguments-plus>•<test>
  662:  *    Goto on <test-list> to 55 because of <arguments>-><arguments-plus>•<test-list>
  663:  *    Goto on <argument> to 56 because of <arguments-plus>-><arguments-plus>•<argument>
  664:  *    Shift on <identifier> to 30 because of <test>->•<identifier><arguments> Lookahead = 
  665:  *    Shift on <identifier> to 30 because of <test>->•<identifier> Lookahead = 
  666:  *    Shift on <parenthesis-open> to 38 because of <test-list>->•<parenthesis-open><test-plus-csv><parenthesis-close> Lookahead = 
  667:  *    Goto on <string-list> to 39 because of <argument>->•<string-list>
  668:  *    Shift on <number> to 40 because of <argument>->•<number> Lookahead = 
  669:  *    Shift on <tag> to 41 because of <argument>->•<tag> Lookahead = 
  670:  *    Shift on <square-parenthesis-open> to 27 because of <string-list>->•<square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
  671:  *    Goto on <string> to 28 because of <string-list>->•<string>
  672:  *    Shift on <quoted-string> to 21 because of <string>->•<quoted-string> Lookahead = 
  673:  *    Shift on <multi-line> to 22 because of <string>->•<multi-line> Lookahead = 
  674:  * ----------- 35 -----------
  675:  *   --Itemset--
  676:  *     <arguments>-><test>•
  677:  *   --Transitions--
  678:  *    Reduce on <semicolon> using <arguments>-><test> Lookahead = 
  679:  *    Reduce on <bracket-open> using <arguments>-><test> Lookahead = 
  680:  * ----------- 36 -----------
  681:  *   --Itemset--
  682:  *     <arguments>-><test-list>•
  683:  *   --Transitions--
  684:  *    Reduce on <semicolon> using <arguments>-><test-list> Lookahead = 
  685:  *    Reduce on <bracket-open> using <arguments>-><test-list> Lookahead = 
  686:  *    Reduce on <parenthesis-close> using <arguments>-><test-list> Lookahead = 
  687:  *    Reduce on <comma> using <arguments>-><test-list> Lookahead = 
  688:  * ----------- 37 -----------
  689:  *   --Itemset--
  690:  *     <arguments-plus>-><argument>•
  691:  *   --Transitions--
  692:  *    Reduce on <semicolon> using <arguments-plus>-><argument> Lookahead = 
  693:  *    Reduce on <bracket-open> using <arguments-plus>-><argument> Lookahead = 
  694:  *    Reduce on <identifier> using <arguments-plus>-><argument> Lookahead = 
  695:  *    Reduce on <parenthesis-open> using <arguments-plus>-><argument> Lookahead = 
  696:  *    Reduce on <parenthesis-close> using <arguments-plus>-><argument> Lookahead = 
  697:  *    Reduce on <comma> using <arguments-plus>-><argument> Lookahead = 
  698:  *    Reduce on <number> using <arguments-plus>-><argument> Lookahead = 
  699:  *    Reduce on <tag> using <arguments-plus>-><argument> Lookahead = 
  700:  *    Reduce on <square-parenthesis-open> using <arguments-plus>-><argument> Lookahead = 
  701:  *    Reduce on <quoted-string> using <arguments-plus>-><argument> Lookahead = 
  702:  *    Reduce on <multi-line> using <arguments-plus>-><argument> Lookahead = 
  703:  * ----------- 38 -----------
  704:  *   --Itemset--
  705:  *     <test-list>-><parenthesis-open>•<test-plus-csv><parenthesis-close>
  706:  *    +<test-plus-csv>->•<test>
  707:  *    +<test-plus-csv>->•<test><comma><test-plus-csv>
  708:  *    +<test>->•<identifier><arguments>
  709:  *    +<test>->•<identifier>
  710:  *   --Transitions--
  711:  *    Goto on <test-plus-csv> to 57 because of <test-list>-><parenthesis-open>•<test-plus-csv><parenthesis-close>
  712:  *    Goto on <test> to 58 because of <test-plus-csv>->•<test>
  713:  *    Goto on <test> to 58 because of <test-plus-csv>->•<test><comma><test-plus-csv>
  714:  *    Shift on <identifier> to 30 because of <test>->•<identifier><arguments> Lookahead = 
  715:  *    Shift on <identifier> to 30 because of <test>->•<identifier> Lookahead = 
  716:  * ----------- 39 -----------
  717:  *   --Itemset--
  718:  *     <argument>-><string-list>•
  719:  *   --Transitions--
  720:  *    Reduce on <semicolon> using <argument>-><string-list> Lookahead = 
  721:  *    Reduce on <bracket-open> using <argument>-><string-list> Lookahead = 
  722:  *    Reduce on <identifier> using <argument>-><string-list> Lookahead = 
  723:  *    Reduce on <parenthesis-open> using <argument>-><string-list> Lookahead = 
  724:  *    Reduce on <parenthesis-close> using <argument>-><string-list> Lookahead = 
  725:  *    Reduce on <comma> using <argument>-><string-list> Lookahead = 
  726:  *    Reduce on <number> using <argument>-><string-list> Lookahead = 
  727:  *    Reduce on <tag> using <argument>-><string-list> Lookahead = 
  728:  *    Reduce on <square-parenthesis-open> using <argument>-><string-list> Lookahead = 
  729:  *    Reduce on <quoted-string> using <argument>-><string-list> Lookahead = 
  730:  *    Reduce on <multi-line> using <argument>-><string-list> Lookahead = 
  731:  * ----------- 40 -----------
  732:  *   --Itemset--
  733:  *     <argument>-><number>•
  734:  *   --Transitions--
  735:  *    Reduce on <semicolon> using <argument>-><number> Lookahead = 
  736:  *    Reduce on <bracket-open> using <argument>-><number> Lookahead = 
  737:  *    Reduce on <identifier> using <argument>-><number> Lookahead = 
  738:  *    Reduce on <parenthesis-open> using <argument>-><number> Lookahead = 
  739:  *    Reduce on <parenthesis-close> using <argument>-><number> Lookahead = 
  740:  *    Reduce on <comma> using <argument>-><number> Lookahead = 
  741:  *    Reduce on <number> using <argument>-><number> Lookahead = 
  742:  *    Reduce on <tag> using <argument>-><number> Lookahead = 
  743:  *    Reduce on <square-parenthesis-open> using <argument>-><number> Lookahead = 
  744:  *    Reduce on <quoted-string> using <argument>-><number> Lookahead = 
  745:  *    Reduce on <multi-line> using <argument>-><number> Lookahead = 
  746:  * ----------- 41 -----------
  747:  *   --Itemset--
  748:  *     <argument>-><tag>•
  749:  *   --Transitions--
  750:  *    Reduce on <semicolon> using <argument>-><tag> Lookahead = 
  751:  *    Reduce on <bracket-open> using <argument>-><tag> Lookahead = 
  752:  *    Reduce on <identifier> using <argument>-><tag> Lookahead = 
  753:  *    Reduce on <parenthesis-open> using <argument>-><tag> Lookahead = 
  754:  *    Reduce on <parenthesis-close> using <argument>-><tag> Lookahead = 
  755:  *    Reduce on <comma> using <argument>-><tag> Lookahead = 
  756:  *    Reduce on <number> using <argument>-><tag> Lookahead = 
  757:  *    Reduce on <tag> using <argument>-><tag> Lookahead = 
  758:  *    Reduce on <square-parenthesis-open> using <argument>-><tag> Lookahead = 
  759:  *    Reduce on <quoted-string> using <argument>-><tag> Lookahead = 
  760:  *    Reduce on <multi-line> using <argument>-><tag> Lookahead = 
  761:  * ----------- 42 -----------
  762:  *   --Itemset--
  763:  *     <command>-><identifier-fileinto><string><semicolon>•
  764:  *   --Transitions--
  765:  *    Reduce on <identifier-stop> using <command>-><identifier-fileinto><string><semicolon> Lookahead = 
  766:  *    Reduce on <identifier-fileinto> using <command>-><identifier-fileinto><string><semicolon> Lookahead = 
  767:  *    Reduce on <identifier-redirect> using <command>-><identifier-fileinto><string><semicolon> Lookahead = 
  768:  *    Reduce on <identifier-keep> using <command>-><identifier-fileinto><string><semicolon> Lookahead = 
  769:  *    Reduce on <identifier-discard> using <command>-><identifier-fileinto><string><semicolon> Lookahead = 
  770:  *    Reduce on <identifier-require> using <command>-><identifier-fileinto><string><semicolon> Lookahead = 
  771:  *    Reduce on <identifier-if> using <command>-><identifier-fileinto><string><semicolon> Lookahead = 
  772:  *    Reduce on <identifier> using <command>-><identifier-fileinto><string><semicolon> Lookahead = 
  773:  *    Reduce on <bracket-close> using <command>-><identifier-fileinto><string><semicolon> Lookahead = 
  774:  *    Reduce on <hash-comment> using <command>-><identifier-fileinto><string><semicolon> Lookahead = 
  775:  *    Reduce on <bracket-comment> using <command>-><identifier-fileinto><string><semicolon> Lookahead = 
  776:  *    Reduce on  using <command>-><identifier-fileinto><string><semicolon> Lookahead = 
  777:  * ----------- 43 -----------
  778:  *   --Itemset--
  779:  *     <command>-><identifier-redirect><string><semicolon>•
  780:  *   --Transitions--
  781:  *    Reduce on <identifier-stop> using <command>-><identifier-redirect><string><semicolon> Lookahead = 
  782:  *    Reduce on <identifier-fileinto> using <command>-><identifier-redirect><string><semicolon> Lookahead = 
  783:  *    Reduce on <identifier-redirect> using <command>-><identifier-redirect><string><semicolon> Lookahead = 
  784:  *    Reduce on <identifier-keep> using <command>-><identifier-redirect><string><semicolon> Lookahead = 
  785:  *    Reduce on <identifier-discard> using <command>-><identifier-redirect><string><semicolon> Lookahead = 
  786:  *    Reduce on <identifier-require> using <command>-><identifier-redirect><string><semicolon> Lookahead = 
  787:  *    Reduce on <identifier-if> using <command>-><identifier-redirect><string><semicolon> Lookahead = 
  788:  *    Reduce on <identifier> using <command>-><identifier-redirect><string><semicolon> Lookahead = 
  789:  *    Reduce on <bracket-close> using <command>-><identifier-redirect><string><semicolon> Lookahead = 
  790:  *    Reduce on <hash-comment> using <command>-><identifier-redirect><string><semicolon> Lookahead = 
  791:  *    Reduce on <bracket-comment> using <command>-><identifier-redirect><string><semicolon> Lookahead = 
  792:  *    Reduce on  using <command>-><identifier-redirect><string><semicolon> Lookahead = 
  793:  * ----------- 44 -----------
  794:  *   --Itemset--
  795:  *     <command>-><identifier-require><string-list><semicolon>•
  796:  *   --Transitions--
  797:  *    Reduce on <identifier-stop> using <command>-><identifier-require><string-list><semicolon> Lookahead = 
  798:  *    Reduce on <identifier-fileinto> using <command>-><identifier-require><string-list><semicolon> Lookahead = 
  799:  *    Reduce on <identifier-redirect> using <command>-><identifier-require><string-list><semicolon> Lookahead = 
  800:  *    Reduce on <identifier-keep> using <command>-><identifier-require><string-list><semicolon> Lookahead = 
  801:  *    Reduce on <identifier-discard> using <command>-><identifier-require><string-list><semicolon> Lookahead = 
  802:  *    Reduce on <identifier-require> using <command>-><identifier-require><string-list><semicolon> Lookahead = 
  803:  *    Reduce on <identifier-if> using <command>-><identifier-require><string-list><semicolon> Lookahead = 
  804:  *    Reduce on <identifier> using <command>-><identifier-require><string-list><semicolon> Lookahead = 
  805:  *    Reduce on <bracket-close> using <command>-><identifier-require><string-list><semicolon> Lookahead = 
  806:  *    Reduce on <hash-comment> using <command>-><identifier-require><string-list><semicolon> Lookahead = 
  807:  *    Reduce on <bracket-comment> using <command>-><identifier-require><string-list><semicolon> Lookahead = 
  808:  *    Reduce on  using <command>-><identifier-require><string-list><semicolon> Lookahead = 
  809:  * ----------- 45 -----------
  810:  *   --Itemset--
  811:  *     <string-list>-><square-parenthesis-open><string-plus-csv>•<square-parenthesis-close>
  812:  *     <string-plus-csv>-><string-plus-csv>•<comma><string>
  813:  *   --Transitions--
  814:  *    Shift on <square-parenthesis-close> to 59 because of <string-list>-><square-parenthesis-open><string-plus-csv>•<square-parenthesis-close> Lookahead = 
  815:  *    Shift on <comma> to 60 because of <string-plus-csv>-><string-plus-csv>•<comma><string> Lookahead = 
  816:  * ----------- 46 -----------
  817:  *   --Itemset--
  818:  *     <string-plus-csv>-><string>•
  819:  *   --Transitions--
  820:  *    Reduce on <comma> using <string-plus-csv>-><string> Lookahead = 
  821:  *    Reduce on <square-parenthesis-close> using <string-plus-csv>-><string> Lookahead = 
  822:  * ----------- 47 -----------
  823:  *   --Itemset--
  824:  *     <command>-><identifier-if><test><bracket-open>•<block>
  825:  *     <command>-><identifier-if><test><bracket-open>•<block><command-elsif>
  826:  *     <command>-><identifier-if><test><bracket-open>•<block><command-else>
  827:  *    +<block>->•<command><block>
  828:  *    +<block>->•<bracket-close>
  829:  *    +<command>->•<identifier-stop><semicolon>
  830:  *    +<command>->•<identifier-fileinto><string><semicolon>
  831:  *    +<command>->•<identifier-redirect><string><semicolon>
  832:  *    +<command>->•<identifier-keep><semicolon>
  833:  *    +<command>->•<identifier-discard><semicolon>
  834:  *    +<command>->•<identifier-require><string-list><semicolon>
  835:  *    +<command>->•<identifier-if><test><bracket-open><block>
  836:  *    +<command>->•<identifier-if><test><bracket-open><block><command-elsif>
  837:  *    +<command>->•<identifier-if><test><bracket-open><block><command-else>
  838:  *    +<command>->•<identifier><arguments><semicolon>
  839:  *    +<command>->•<identifier><arguments><bracket-open><block>
  840:  *    +<command>->•<identifier><semicolon>
  841:  *    +<command>->•<identifier><bracket-open><block>
  842:  *   --Transitions--
  843:  *    Goto on <block> to 61 because of <command>-><identifier-if><test><bracket-open>•<block>
  844:  *    Goto on <block> to 61 because of <command>-><identifier-if><test><bracket-open>•<block><command-elsif>
  845:  *    Goto on <block> to 61 because of <command>-><identifier-if><test><bracket-open>•<block><command-else>
  846:  *    Goto on <command> to 52 because of <block>->•<command><block>
  847:  *    Shift on <bracket-close> to 53 because of <block>->•<bracket-close> Lookahead = 
  848:  *    Shift on <identifier-stop> to 6 because of <command>->•<identifier-stop><semicolon> Lookahead = 
  849:  *    Shift on <identifier-fileinto> to 7 because of <command>->•<identifier-fileinto><string><semicolon> Lookahead = 
  850:  *    Shift on <identifier-redirect> to 8 because of <command>->•<identifier-redirect><string><semicolon> Lookahead = 
  851:  *    Shift on <identifier-keep> to 9 because of <command>->•<identifier-keep><semicolon> Lookahead = 
  852:  *    Shift on <identifier-discard> to 10 because of <command>->•<identifier-discard><semicolon> Lookahead = 
  853:  *    Shift on <identifier-require> to 11 because of <command>->•<identifier-require><string-list><semicolon> Lookahead = 
  854:  *    Shift on <identifier-if> to 12 because of <command>->•<identifier-if><test><bracket-open><block> Lookahead = 
  855:  *    Shift on <identifier-if> to 12 because of <command>->•<identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
  856:  *    Shift on <identifier-if> to 12 because of <command>->•<identifier-if><test><bracket-open><block><command-else> Lookahead = 
  857:  *    Shift on <identifier> to 13 because of <command>->•<identifier><arguments><semicolon> Lookahead = 
  858:  *    Shift on <identifier> to 13 because of <command>->•<identifier><arguments><bracket-open><block> Lookahead = 
  859:  *    Shift on <identifier> to 13 because of <command>->•<identifier><semicolon> Lookahead = 
  860:  *    Shift on <identifier> to 13 because of <command>->•<identifier><bracket-open><block> Lookahead = 
  861:  * ----------- 48 -----------
  862:  *   --Itemset--
  863:  *     <test>-><identifier><arguments>•
  864:  *   --Transitions--
  865:  *    Reduce on <semicolon> using <test>-><identifier><arguments> Lookahead = 
  866:  *    Reduce on <bracket-open> using <test>-><identifier><arguments> Lookahead = 
  867:  *    Reduce on <parenthesis-close> using <test>-><identifier><arguments> Lookahead = 
  868:  *    Reduce on <comma> using <test>-><identifier><arguments> Lookahead = 
  869:  * ----------- 49 -----------
  870:  *   --Itemset--
  871:  *     <command>-><identifier><arguments><semicolon>•
  872:  *   --Transitions--
  873:  *    Reduce on <identifier-stop> using <command>-><identifier><arguments><semicolon> Lookahead = 
  874:  *    Reduce on <identifier-fileinto> using <command>-><identifier><arguments><semicolon> Lookahead = 
  875:  *    Reduce on <identifier-redirect> using <command>-><identifier><arguments><semicolon> Lookahead = 
  876:  *    Reduce on <identifier-keep> using <command>-><identifier><arguments><semicolon> Lookahead = 
  877:  *    Reduce on <identifier-discard> using <command>-><identifier><arguments><semicolon> Lookahead = 
  878:  *    Reduce on <identifier-require> using <command>-><identifier><arguments><semicolon> Lookahead = 
  879:  *    Reduce on <identifier-if> using <command>-><identifier><arguments><semicolon> Lookahead = 
  880:  *    Reduce on <identifier> using <command>-><identifier><arguments><semicolon> Lookahead = 
  881:  *    Reduce on <bracket-close> using <command>-><identifier><arguments><semicolon> Lookahead = 
  882:  *    Reduce on <hash-comment> using <command>-><identifier><arguments><semicolon> Lookahead = 
  883:  *    Reduce on <bracket-comment> using <command>-><identifier><arguments><semicolon> Lookahead = 
  884:  *    Reduce on  using <command>-><identifier><arguments><semicolon> Lookahead = 
  885:  * ----------- 50 -----------
  886:  *   --Itemset--
  887:  *     <command>-><identifier><arguments><bracket-open>•<block>
  888:  *    +<block>->•<command><block>
  889:  *    +<block>->•<bracket-close>
  890:  *    +<command>->•<identifier-stop><semicolon>
  891:  *    +<command>->•<identifier-fileinto><string><semicolon>
  892:  *    +<command>->•<identifier-redirect><string><semicolon>
  893:  *    +<command>->•<identifier-keep><semicolon>
  894:  *    +<command>->•<identifier-discard><semicolon>
  895:  *    +<command>->•<identifier-require><string-list><semicolon>
  896:  *    +<command>->•<identifier-if><test><bracket-open><block>
  897:  *    +<command>->•<identifier-if><test><bracket-open><block><command-elsif>
  898:  *    +<command>->•<identifier-if><test><bracket-open><block><command-else>
  899:  *    +<command>->•<identifier><arguments><semicolon>
  900:  *    +<command>->•<identifier><arguments><bracket-open><block>
  901:  *    +<command>->•<identifier><semicolon>
  902:  *    +<command>->•<identifier><bracket-open><block>
  903:  *   --Transitions--
  904:  *    Goto on <block> to 62 because of <command>-><identifier><arguments><bracket-open>•<block>
  905:  *    Goto on <command> to 52 because of <block>->•<command><block>
  906:  *    Shift on <bracket-close> to 53 because of <block>->•<bracket-close> Lookahead = 
  907:  *    Shift on <identifier-stop> to 6 because of <command>->•<identifier-stop><semicolon> Lookahead = 
  908:  *    Shift on <identifier-fileinto> to 7 because of <command>->•<identifier-fileinto><string><semicolon> Lookahead = 
  909:  *    Shift on <identifier-redirect> to 8 because of <command>->•<identifier-redirect><string><semicolon> Lookahead = 
  910:  *    Shift on <identifier-keep> to 9 because of <command>->•<identifier-keep><semicolon> Lookahead = 
  911:  *    Shift on <identifier-discard> to 10 because of <command>->•<identifier-discard><semicolon> Lookahead = 
  912:  *    Shift on <identifier-require> to 11 because of <command>->•<identifier-require><string-list><semicolon> Lookahead = 
  913:  *    Shift on <identifier-if> to 12 because of <command>->•<identifier-if><test><bracket-open><block> Lookahead = 
  914:  *    Shift on <identifier-if> to 12 because of <command>->•<identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
  915:  *    Shift on <identifier-if> to 12 because of <command>->•<identifier-if><test><bracket-open><block><command-else> Lookahead = 
  916:  *    Shift on <identifier> to 13 because of <command>->•<identifier><arguments><semicolon> Lookahead = 
  917:  *    Shift on <identifier> to 13 because of <command>->•<identifier><arguments><bracket-open><block> Lookahead = 
  918:  *    Shift on <identifier> to 13 because of <command>->•<identifier><semicolon> Lookahead = 
  919:  *    Shift on <identifier> to 13 because of <command>->•<identifier><bracket-open><block> Lookahead = 
  920:  * ----------- 51 -----------
  921:  *   --Itemset--
  922:  *     <command>-><identifier><bracket-open><block>•
  923:  *   --Transitions--
  924:  *    Reduce on <identifier-stop> using <command>-><identifier><bracket-open><block> Lookahead = 
  925:  *    Reduce on <identifier-fileinto> using <command>-><identifier><bracket-open><block> Lookahead = 
  926:  *    Reduce on <identifier-redirect> using <command>-><identifier><bracket-open><block> Lookahead = 
  927:  *    Reduce on <identifier-keep> using <command>-><identifier><bracket-open><block> Lookahead = 
  928:  *    Reduce on <identifier-discard> using <command>-><identifier><bracket-open><block> Lookahead = 
  929:  *    Reduce on <identifier-require> using <command>-><identifier><bracket-open><block> Lookahead = 
  930:  *    Reduce on <identifier-if> using <command>-><identifier><bracket-open><block> Lookahead = 
  931:  *    Reduce on <identifier> using <command>-><identifier><bracket-open><block> Lookahead = 
  932:  *    Reduce on <bracket-close> using <command>-><identifier><bracket-open><block> Lookahead = 
  933:  *    Reduce on <hash-comment> using <command>-><identifier><bracket-open><block> Lookahead = 
  934:  *    Reduce on <bracket-comment> using <command>-><identifier><bracket-open><block> Lookahead = 
  935:  *    Reduce on  using <command>-><identifier><bracket-open><block> Lookahead = 
  936:  * ----------- 52 -----------
  937:  *   --Itemset--
  938:  *     <block>-><command>•<block>
  939:  *    +<block>->•<command><block>
  940:  *    +<block>->•<bracket-close>
  941:  *    +<command>->•<identifier-stop><semicolon>
  942:  *    +<command>->•<identifier-fileinto><string><semicolon>
  943:  *    +<command>->•<identifier-redirect><string><semicolon>
  944:  *    +<command>->•<identifier-keep><semicolon>
  945:  *    +<command>->•<identifier-discard><semicolon>
  946:  *    +<command>->•<identifier-require><string-list><semicolon>
  947:  *    +<command>->•<identifier-if><test><bracket-open><block>
  948:  *    +<command>->•<identifier-if><test><bracket-open><block><command-elsif>
  949:  *    +<command>->•<identifier-if><test><bracket-open><block><command-else>
  950:  *    +<command>->•<identifier><arguments><semicolon>
  951:  *    +<command>->•<identifier><arguments><bracket-open><block>
  952:  *    +<command>->•<identifier><semicolon>
  953:  *    +<command>->•<identifier><bracket-open><block>
  954:  *   --Transitions--
  955:  *    Goto on <block> to 63 because of <block>-><command>•<block>
  956:  *    Goto on <command> to 52 because of <block>->•<command><block>
  957:  *    Shift on <bracket-close> to 53 because of <block>->•<bracket-close> Lookahead = 
  958:  *    Shift on <identifier-stop> to 6 because of <command>->•<identifier-stop><semicolon> Lookahead = 
  959:  *    Shift on <identifier-fileinto> to 7 because of <command>->•<identifier-fileinto><string><semicolon> Lookahead = 
  960:  *    Shift on <identifier-redirect> to 8 because of <command>->•<identifier-redirect><string><semicolon> Lookahead = 
  961:  *    Shift on <identifier-keep> to 9 because of <command>->•<identifier-keep><semicolon> Lookahead = 
  962:  *    Shift on <identifier-discard> to 10 because of <command>->•<identifier-discard><semicolon> Lookahead = 
  963:  *    Shift on <identifier-require> to 11 because of <command>->•<identifier-require><string-list><semicolon> Lookahead = 
  964:  *    Shift on <identifier-if> to 12 because of <command>->•<identifier-if><test><bracket-open><block> Lookahead = 
  965:  *    Shift on <identifier-if> to 12 because of <command>->•<identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
  966:  *    Shift on <identifier-if> to 12 because of <command>->•<identifier-if><test><bracket-open><block><command-else> Lookahead = 
  967:  *    Shift on <identifier> to 13 because of <command>->•<identifier><arguments><semicolon> Lookahead = 
  968:  *    Shift on <identifier> to 13 because of <command>->•<identifier><arguments><bracket-open><block> Lookahead = 
  969:  *    Shift on <identifier> to 13 because of <command>->•<identifier><semicolon> Lookahead = 
  970:  *    Shift on <identifier> to 13 because of <command>->•<identifier><bracket-open><block> Lookahead = 
  971:  * ----------- 53 -----------
  972:  *   --Itemset--
  973:  *     <block>-><bracket-close>•
  974:  *   --Transitions--
  975:  *    Reduce on <identifier-stop> using <block>-><bracket-close> Lookahead = 
  976:  *    Reduce on <identifier-fileinto> using <block>-><bracket-close> Lookahead = 
  977:  *    Reduce on <identifier-redirect> using <block>-><bracket-close> Lookahead = 
  978:  *    Reduce on <identifier-keep> using <block>-><bracket-close> Lookahead = 
  979:  *    Reduce on <identifier-discard> using <block>-><bracket-close> Lookahead = 
  980:  *    Reduce on <identifier-require> using <block>-><bracket-close> Lookahead = 
  981:  *    Reduce on <identifier-if> using <block>-><bracket-close> Lookahead = 
  982:  *    Reduce on <identifier-elsif> using <block>-><bracket-close> Lookahead = 
  983:  *    Reduce on <identifier-else> using <block>-><bracket-close> Lookahead = 
  984:  *    Reduce on <identifier> using <block>-><bracket-close> Lookahead = 
  985:  *    Reduce on <bracket-close> using <block>-><bracket-close> Lookahead = 
  986:  *    Reduce on <hash-comment> using <block>-><bracket-close> Lookahead = 
  987:  *    Reduce on <bracket-comment> using <block>-><bracket-close> Lookahead = 
  988:  *    Reduce on  using <block>-><bracket-close> Lookahead = 
  989:  * ----------- 54 -----------
  990:  *   --Itemset--
  991:  *     <arguments>-><arguments-plus><test>•
  992:  *   --Transitions--
  993:  *    Reduce on <semicolon> using <arguments>-><arguments-plus><test> Lookahead = 
  994:  *    Reduce on <bracket-open> using <arguments>-><arguments-plus><test> Lookahead = 
  995:  * ----------- 55 -----------
  996:  *   --Itemset--
  997:  *     <arguments>-><arguments-plus><test-list>•
  998:  *   --Transitions--
  999:  *    Reduce on <semicolon> using <arguments>-><arguments-plus><test-list> Lookahead = 
 1000:  *    Reduce on <bracket-open> using <arguments>-><arguments-plus><test-list> Lookahead = 
 1001:  *    Reduce on <parenthesis-close> using <arguments>-><arguments-plus><test-list> Lookahead = 
 1002:  *    Reduce on <comma> using <arguments>-><arguments-plus><test-list> Lookahead = 
 1003:  * ----------- 56 -----------
 1004:  *   --Itemset--
 1005:  *     <arguments-plus>-><arguments-plus><argument>•
 1006:  *   --Transitions--
 1007:  *    Reduce on <semicolon> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
 1008:  *    Reduce on <bracket-open> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
 1009:  *    Reduce on <identifier> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
 1010:  *    Reduce on <parenthesis-open> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
 1011:  *    Reduce on <parenthesis-close> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
 1012:  *    Reduce on <comma> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
 1013:  *    Reduce on <number> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
 1014:  *    Reduce on <tag> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
 1015:  *    Reduce on <square-parenthesis-open> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
 1016:  *    Reduce on <quoted-string> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
 1017:  *    Reduce on <multi-line> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
 1018:  * ----------- 57 -----------
 1019:  *   --Itemset--
 1020:  *     <test-list>-><parenthesis-open><test-plus-csv>•<parenthesis-close>
 1021:  *   --Transitions--
 1022:  *    Shift on <parenthesis-close> to 64 because of <test-list>-><parenthesis-open><test-plus-csv>•<parenthesis-close> Lookahead = 
 1023:  * ----------- 58 -----------
 1024:  *   --Itemset--
 1025:  *     <test-plus-csv>-><test>•
 1026:  *     <test-plus-csv>-><test>•<comma><test-plus-csv>
 1027:  *   --Transitions--
 1028:  *    Reduce on <parenthesis-close> using <test-plus-csv>-><test> Lookahead = 
 1029:  *    Shift on <comma> to 65 because of <test-plus-csv>-><test>•<comma><test-plus-csv> Lookahead = 
 1030:  * ----------- 59 -----------
 1031:  *   --Itemset--
 1032:  *     <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close>•
 1033:  *   --Transitions--
 1034:  *    Reduce on <semicolon> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 1035:  *    Reduce on <bracket-open> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 1036:  *    Reduce on <identifier> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 1037:  *    Reduce on <parenthesis-open> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 1038:  *    Reduce on <parenthesis-close> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 1039:  *    Reduce on <comma> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 1040:  *    Reduce on <number> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 1041:  *    Reduce on <tag> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 1042:  *    Reduce on <square-parenthesis-open> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 1043:  *    Reduce on <quoted-string> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 1044:  *    Reduce on <multi-line> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 1045:  * ----------- 60 -----------
 1046:  *   --Itemset--
 1047:  *     <string-plus-csv>-><string-plus-csv><comma>•<string>
 1048:  *    +<string>->•<quoted-string>
 1049:  *    +<string>->•<multi-line>
 1050:  *   --Transitions--
 1051:  *    Goto on <string> to 66 because of <string-plus-csv>-><string-plus-csv><comma>•<string>
 1052:  *    Shift on <quoted-string> to 21 because of <string>->•<quoted-string> Lookahead = 
 1053:  *    Shift on <multi-line> to 22 because of <string>->•<multi-line> Lookahead = 
 1054:  * ----------- 61 -----------
 1055:  *   --Itemset--
 1056:  *     <command>-><identifier-if><test><bracket-open><block>•
 1057:  *     <command>-><identifier-if><test><bracket-open><block>•<command-elsif>
 1058:  *     <command>-><identifier-if><test><bracket-open><block>•<command-else>
 1059:  *    +<command-elsif>->•<identifier-elsif><test><bracket-open><block>
 1060:  *    +<command-elsif>->•<identifier-elsif><test><bracket-open><block><command-elsif>
 1061:  *    +<command-elsif>->•<identifier-elsif><test><bracket-open><block><command-else>
 1062:  *    +<command-else>->•<identifier-else><bracket-open><block>
 1063:  *   --Transitions--
 1064:  *    Reduce on <identifier-stop> using <command>-><identifier-if><test><bracket-open><block> Lookahead = 
 1065:  *    Reduce on <identifier-fileinto> using <command>-><identifier-if><test><bracket-open><block> Lookahead = 
 1066:  *    Reduce on <identifier-redirect> using <command>-><identifier-if><test><bracket-open><block> Lookahead = 
 1067:  *    Reduce on <identifier-keep> using <command>-><identifier-if><test><bracket-open><block> Lookahead = 
 1068:  *    Reduce on <identifier-discard> using <command>-><identifier-if><test><bracket-open><block> Lookahead = 
 1069:  *    Reduce on <identifier-require> using <command>-><identifier-if><test><bracket-open><block> Lookahead = 
 1070:  *    Reduce on <identifier-if> using <command>-><identifier-if><test><bracket-open><block> Lookahead = 
 1071:  *    Reduce on <identifier> using <command>-><identifier-if><test><bracket-open><block> Lookahead = 
 1072:  *    Reduce on <bracket-close> using <command>-><identifier-if><test><bracket-open><block> Lookahead = 
 1073:  *    Reduce on <hash-comment> using <command>-><identifier-if><test><bracket-open><block> Lookahead = 
 1074:  *    Reduce on <bracket-comment> using <command>-><identifier-if><test><bracket-open><block> Lookahead = 
 1075:  *    Reduce on  using <command>-><identifier-if><test><bracket-open><block> Lookahead = 
 1076:  *    Goto on <command-elsif> to 67 because of <command>-><identifier-if><test><bracket-open><block>•<command-elsif>
 1077:  *    Goto on <command-else> to 68 because of <command>-><identifier-if><test><bracket-open><block>•<command-else>
 1078:  *    Shift on <identifier-elsif> to 69 because of <command-elsif>->•<identifier-elsif><test><bracket-open><block> Lookahead = 
 1079:  *    Shift on <identifier-elsif> to 69 because of <command-elsif>->•<identifier-elsif><test><bracket-open><block><command-elsif> Lookahead = 
 1080:  *    Shift on <identifier-elsif> to 69 because of <command-elsif>->•<identifier-elsif><test><bracket-open><block><command-else> Lookahead = 
 1081:  *    Shift on <identifier-else> to 70 because of <command-else>->•<identifier-else><bracket-open><block> Lookahead = 
 1082:  * ----------- 62 -----------
 1083:  *   --Itemset--
 1084:  *     <command>-><identifier><arguments><bracket-open><block>•
 1085:  *   --Transitions--
 1086:  *    Reduce on <identifier-stop> using <command>-><identifier><arguments><bracket-open><block> Lookahead = 
 1087:  *    Reduce on <identifier-fileinto> using <command>-><identifier><arguments><bracket-open><block> Lookahead = 
 1088:  *    Reduce on <identifier-redirect> using <command>-><identifier><arguments><bracket-open><block> Lookahead = 
 1089:  *    Reduce on <identifier-keep> using <command>-><identifier><arguments><bracket-open><block> Lookahead = 
 1090:  *    Reduce on <identifier-discard> using <command>-><identifier><arguments><bracket-open><block> Lookahead = 
 1091:  *    Reduce on <identifier-require> using <command>-><identifier><arguments><bracket-open><block> Lookahead = 
 1092:  *    Reduce on <identifier-if> using <command>-><identifier><arguments><bracket-open><block> Lookahead = 
 1093:  *    Reduce on <identifier> using <command>-><identifier><arguments><bracket-open><block> Lookahead = 
 1094:  *    Reduce on <bracket-close> using <command>-><identifier><arguments><bracket-open><block> Lookahead = 
 1095:  *    Reduce on <hash-comment> using <command>-><identifier><arguments><bracket-open><block> Lookahead = 
 1096:  *    Reduce on <bracket-comment> using <command>-><identifier><arguments><bracket-open><block> Lookahead = 
 1097:  *    Reduce on  using <command>-><identifier><arguments><bracket-open><block> Lookahead = 
 1098:  * ----------- 63 -----------
 1099:  *   --Itemset--
 1100:  *     <block>-><command><block>•
 1101:  *   --Transitions--
 1102:  *    Reduce on <identifier-stop> using <block>-><command><block> Lookahead = 
 1103:  *    Reduce on <identifier-fileinto> using <block>-><command><block> Lookahead = 
 1104:  *    Reduce on <identifier-redirect> using <block>-><command><block> Lookahead = 
 1105:  *    Reduce on <identifier-keep> using <block>-><command><block> Lookahead = 
 1106:  *    Reduce on <identifier-discard> using <block>-><command><block> Lookahead = 
 1107:  *    Reduce on <identifier-require> using <block>-><command><block> Lookahead = 
 1108:  *    Reduce on <identifier-if> using <block>-><command><block> Lookahead = 
 1109:  *    Reduce on <identifier-elsif> using <block>-><command><block> Lookahead = 
 1110:  *    Reduce on <identifier-else> using <block>-><command><block> Lookahead = 
 1111:  *    Reduce on <identifier> using <block>-><command><block> Lookahead = 
 1112:  *    Reduce on <bracket-close> using <block>-><command><block> Lookahead = 
 1113:  *    Reduce on <hash-comment> using <block>-><command><block> Lookahead = 
 1114:  *    Reduce on <bracket-comment> using <block>-><command><block> Lookahead = 
 1115:  *    Reduce on  using <block>-><command><block> Lookahead = 
 1116:  * ----------- 64 -----------
 1117:  *   --Itemset--
 1118:  *     <test-list>-><parenthesis-open><test-plus-csv><parenthesis-close>•
 1119:  *   --Transitions--
 1120:  *    Reduce on <semicolon> using <test-list>-><parenthesis-open><test-plus-csv><parenthesis-close> Lookahead = 
 1121:  *    Reduce on <bracket-open> using <test-list>-><parenthesis-open><test-plus-csv><parenthesis-close> Lookahead = 
 1122:  *    Reduce on <parenthesis-close> using <test-list>-><parenthesis-open><test-plus-csv><parenthesis-close> Lookahead = 
 1123:  *    Reduce on <comma> using <test-list>-><parenthesis-open><test-plus-csv><parenthesis-close> Lookahead = 
 1124:  * ----------- 65 -----------
 1125:  *   --Itemset--
 1126:  *     <test-plus-csv>-><test><comma>•<test-plus-csv>
 1127:  *    +<test-plus-csv>->•<test>
 1128:  *    +<test-plus-csv>->•<test><comma><test-plus-csv>
 1129:  *    +<test>->•<identifier><arguments>
 1130:  *    +<test>->•<identifier>
 1131:  *   --Transitions--
 1132:  *    Goto on <test-plus-csv> to 71 because of <test-plus-csv>-><test><comma>•<test-plus-csv>
 1133:  *    Goto on <test> to 58 because of <test-plus-csv>->•<test>
 1134:  *    Goto on <test> to 58 because of <test-plus-csv>->•<test><comma><test-plus-csv>
 1135:  *    Shift on <identifier> to 30 because of <test>->•<identifier><arguments> Lookahead = 
 1136:  *    Shift on <identifier> to 30 because of <test>->•<identifier> Lookahead = 
 1137:  * ----------- 66 -----------
 1138:  *   --Itemset--
 1139:  *     <string-plus-csv>-><string-plus-csv><comma><string>•
 1140:  *   --Transitions--
 1141:  *    Reduce on <comma> using <string-plus-csv>-><string-plus-csv><comma><string> Lookahead = 
 1142:  *    Reduce on <square-parenthesis-close> using <string-plus-csv>-><string-plus-csv><comma><string> Lookahead = 
 1143:  * ----------- 67 -----------
 1144:  *   --Itemset--
 1145:  *     <command>-><identifier-if><test><bracket-open><block><command-elsif>•
 1146:  *   --Transitions--
 1147:  *    Reduce on <identifier-stop> using <command>-><identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 1148:  *    Reduce on <identifier-fileinto> using <command>-><identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 1149:  *    Reduce on <identifier-redirect> using <command>-><identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 1150:  *    Reduce on <identifier-keep> using <command>-><identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 1151:  *    Reduce on <identifier-discard> using <command>-><identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 1152:  *    Reduce on <identifier-require> using <command>-><identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 1153:  *    Reduce on <identifier-if> using <command>-><identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 1154:  *    Reduce on <identifier> using <command>-><identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 1155:  *    Reduce on <bracket-close> using <command>-><identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 1156:  *    Reduce on <hash-comment> using <command>-><identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 1157:  *    Reduce on <bracket-comment> using <command>-><identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 1158:  *    Reduce on  using <command>-><identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 1159:  * ----------- 68 -----------
 1160:  *   --Itemset--
 1161:  *     <command>-><identifier-if><test><bracket-open><block><command-else>•
 1162:  *   --Transitions--
 1163:  *    Reduce on <identifier-stop> using <command>-><identifier-if><test><bracket-open><block><command-else> Lookahead = 
 1164:  *    Reduce on <identifier-fileinto> using <command>-><identifier-if><test><bracket-open><block><command-else> Lookahead = 
 1165:  *    Reduce on <identifier-redirect> using <command>-><identifier-if><test><bracket-open><block><command-else> Lookahead = 
 1166:  *    Reduce on <identifier-keep> using <command>-><identifier-if><test><bracket-open><block><command-else> Lookahead = 
 1167:  *    Reduce on <identifier-discard> using <command>-><identifier-if><test><bracket-open><block><command-else> Lookahead = 
 1168:  *    Reduce on <identifier-require> using <command>-><identifier-if><test><bracket-open><block><command-else> Lookahead = 
 1169:  *    Reduce on <identifier-if> using <command>-><identifier-if><test><bracket-open><block><command-else> Lookahead = 
 1170:  *    Reduce on <identifier> using <command>-><identifier-if><test><bracket-open><block><command-else> Lookahead = 
 1171:  *    Reduce on <bracket-close> using <command>-><identifier-if><test><bracket-open><block><command-else> Lookahead = 
 1172:  *    Reduce on <hash-comment> using <command>-><identifier-if><test><bracket-open><block><command-else> Lookahead = 
 1173:  *    Reduce on <bracket-comment> using <command>-><identifier-if><test><bracket-open><block><command-else> Lookahead = 
 1174:  *    Reduce on  using <command>-><identifier-if><test><bracket-open><block><command-else> Lookahead = 
 1175:  * ----------- 69 -----------
 1176:  *   --Itemset--
 1177:  *     <command-elsif>-><identifier-elsif>•<test><bracket-open><block>
 1178:  *     <command-elsif>-><identifier-elsif>•<test><bracket-open><block><command-elsif>
 1179:  *     <command-elsif>-><identifier-elsif>•<test><bracket-open><block><command-else>
 1180:  *    +<test>->•<identifier><arguments>
 1181:  *    +<test>->•<identifier>
 1182:  *   --Transitions--
 1183:  *    Goto on <test> to 72 because of <command-elsif>-><identifier-elsif>•<test><bracket-open><block>
 1184:  *    Goto on <test> to 72 because of <command-elsif>-><identifier-elsif>•<test><bracket-open><block><command-elsif>
 1185:  *    Goto on <test> to 72 because of <command-elsif>-><identifier-elsif>•<test><bracket-open><block><command-else>
 1186:  *    Shift on <identifier> to 30 because of <test>->•<identifier><arguments> Lookahead = 
 1187:  *    Shift on <identifier> to 30 because of <test>->•<identifier> Lookahead = 
 1188:  * ----------- 70 -----------
 1189:  *   --Itemset--
 1190:  *     <command-else>-><identifier-else>•<bracket-open><block>
 1191:  *   --Transitions--
 1192:  *    Shift on <bracket-open> to 73 because of <command-else>-><identifier-else>•<bracket-open><block> Lookahead = 
 1193:  * ----------- 71 -----------
 1194:  *   --Itemset--
 1195:  *     <test-plus-csv>-><test><comma><test-plus-csv>•
 1196:  *   --Transitions--
 1197:  *    Reduce on <parenthesis-close> using <test-plus-csv>-><test><comma><test-plus-csv> Lookahead = 
 1198:  * ----------- 72 -----------
 1199:  *   --Itemset--
 1200:  *     <command-elsif>-><identifier-elsif><test>•<bracket-open><block>
 1201:  *     <command-elsif>-><identifier-elsif><test>•<bracket-open><block><command-elsif>
 1202:  *     <command-elsif>-><identifier-elsif><test>•<bracket-open><block><command-else>
 1203:  *   --Transitions--
 1204:  *    Shift on <bracket-open> to 74 because of <command-elsif>-><identifier-elsif><test>•<bracket-open><block> Lookahead = 
 1205:  *    Shift on <bracket-open> to 74 because of <command-elsif>-><identifier-elsif><test>•<bracket-open><block><command-elsif> Lookahead = 
 1206:  *    Shift on <bracket-open> to 74 because of <command-elsif>-><identifier-elsif><test>•<bracket-open><block><command-else> Lookahead = 
 1207:  * ----------- 73 -----------
 1208:  *   --Itemset--
 1209:  *     <command-else>-><identifier-else><bracket-open>•<block>
 1210:  *    +<block>->•<command><block>
 1211:  *    +<block>->•<bracket-close>
 1212:  *    +<command>->•<identifier-stop><semicolon>
 1213:  *    +<command>->•<identifier-fileinto><string><semicolon>
 1214:  *    +<command>->•<identifier-redirect><string><semicolon>
 1215:  *    +<command>->•<identifier-keep><semicolon>
 1216:  *    +<command>->•<identifier-discard><semicolon>
 1217:  *    +<command>->•<identifier-require><string-list><semicolon>
 1218:  *    +<command>->•<identifier-if><test><bracket-open><block>
 1219:  *    +<command>->•<identifier-if><test><bracket-open><block><command-elsif>
 1220:  *    +<command>->•<identifier-if><test><bracket-open><block><command-else>
 1221:  *    +<command>->•<identifier><arguments><semicolon>
 1222:  *    +<command>->•<identifier><arguments><bracket-open><block>
 1223:  *    +<command>->•<identifier><semicolon>
 1224:  *    +<command>->•<identifier><bracket-open><block>
 1225:  *   --Transitions--
 1226:  *    Goto on <block> to 75 because of <command-else>-><identifier-else><bracket-open>•<block>
 1227:  *    Goto on <command> to 52 because of <block>->•<command><block>
 1228:  *    Shift on <bracket-close> to 53 because of <block>->•<bracket-close> Lookahead = 
 1229:  *    Shift on <identifier-stop> to 6 because of <command>->•<identifier-stop><semicolon> Lookahead = 
 1230:  *    Shift on <identifier-fileinto> to 7 because of <command>->•<identifier-fileinto><string><semicolon> Lookahead = 
 1231:  *    Shift on <identifier-redirect> to 8 because of <command>->•<identifier-redirect><string><semicolon> Lookahead = 
 1232:  *    Shift on <identifier-keep> to 9 because of <command>->•<identifier-keep><semicolon> Lookahead = 
 1233:  *    Shift on <identifier-discard> to 10 because of <command>->•<identifier-discard><semicolon> Lookahead = 
 1234:  *    Shift on <identifier-require> to 11 because of <command>->•<identifier-require><string-list><semicolon> Lookahead = 
 1235:  *    Shift on <identifier-if> to 12 because of <command>->•<identifier-if><test><bracket-open><block> Lookahead = 
 1236:  *    Shift on <identifier-if> to 12 because of <command>->•<identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 1237:  *    Shift on <identifier-if> to 12 because of <command>->•<identifier-if><test><bracket-open><block><command-else> Lookahead = 
 1238:  *    Shift on <identifier> to 13 because of <command>->•<identifier><arguments><semicolon> Lookahead = 
 1239:  *    Shift on <identifier> to 13 because of <command>->•<identifier><arguments><bracket-open><block> Lookahead = 
 1240:  *    Shift on <identifier> to 13 because of <command>->•<identifier><semicolon> Lookahead = 
 1241:  *    Shift on <identifier> to 13 because of <command>->•<identifier><bracket-open><block> Lookahead = 
 1242:  * ----------- 74 -----------
 1243:  *   --Itemset--
 1244:  *     <command-elsif>-><identifier-elsif><test><bracket-open>•<block>
 1245:  *     <command-elsif>-><identifier-elsif><test><bracket-open>•<block><command-elsif>
 1246:  *     <command-elsif>-><identifier-elsif><test><bracket-open>•<block><command-else>
 1247:  *    +<block>->•<command><block>
 1248:  *    +<block>->•<bracket-close>
 1249:  *    +<command>->•<identifier-stop><semicolon>
 1250:  *    +<command>->•<identifier-fileinto><string><semicolon>
 1251:  *    +<command>->•<identifier-redirect><string><semicolon>
 1252:  *    +<command>->•<identifier-keep><semicolon>
 1253:  *    +<command>->•<identifier-discard><semicolon>
 1254:  *    +<command>->•<identifier-require><string-list><semicolon>
 1255:  *    +<command>->•<identifier-if><test><bracket-open><block>
 1256:  *    +<command>->•<identifier-if><test><bracket-open><block><command-elsif>
 1257:  *    +<command>->•<identifier-if><test><bracket-open><block><command-else>
 1258:  *    +<command>->•<identifier><arguments><semicolon>
 1259:  *    +<command>->•<identifier><arguments><bracket-open><block>
 1260:  *    +<command>->•<identifier><semicolon>
 1261:  *    +<command>->•<identifier><bracket-open><block>
 1262:  *   --Transitions--
 1263:  *    Goto on <block> to 76 because of <command-elsif>-><identifier-elsif><test><bracket-open>•<block>
 1264:  *    Goto on <block> to 76 because of <command-elsif>-><identifier-elsif><test><bracket-open>•<block><command-elsif>
 1265:  *    Goto on <block> to 76 because of <command-elsif>-><identifier-elsif><test><bracket-open>•<block><command-else>
 1266:  *    Goto on <command> to 52 because of <block>->•<command><block>
 1267:  *    Shift on <bracket-close> to 53 because of <block>->•<bracket-close> Lookahead = 
 1268:  *    Shift on <identifier-stop> to 6 because of <command>->•<identifier-stop><semicolon> Lookahead = 
 1269:  *    Shift on <identifier-fileinto> to 7 because of <command>->•<identifier-fileinto><string><semicolon> Lookahead = 
 1270:  *    Shift on <identifier-redirect> to 8 because of <command>->•<identifier-redirect><string><semicolon> Lookahead = 
 1271:  *    Shift on <identifier-keep> to 9 because of <command>->•<identifier-keep><semicolon> Lookahead = 
 1272:  *    Shift on <identifier-discard> to 10 because of <command>->•<identifier-discard><semicolon> Lookahead = 
 1273:  *    Shift on <identifier-require> to 11 because of <command>->•<identifier-require><string-list><semicolon> Lookahead = 
 1274:  *    Shift on <identifier-if> to 12 because of <command>->•<identifier-if><test><bracket-open><block> Lookahead = 
 1275:  *    Shift on <identifier-if> to 12 because of <command>->•<identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 1276:  *    Shift on <identifier-if> to 12 because of <command>->•<identifier-if><test><bracket-open><block><command-else> Lookahead = 
 1277:  *    Shift on <identifier> to 13 because of <command>->•<identifier><arguments><semicolon> Lookahead = 
 1278:  *    Shift on <identifier> to 13 because of <command>->•<identifier><arguments><bracket-open><block> Lookahead = 
 1279:  *    Shift on <identifier> to 13 because of <command>->•<identifier><semicolon> Lookahead = 
 1280:  *    Shift on <identifier> to 13 because of <command>->•<identifier><bracket-open><block> Lookahead = 
 1281:  * ----------- 75 -----------
 1282:  *   --Itemset--
 1283:  *     <command-else>-><identifier-else><bracket-open><block>•
 1284:  *   --Transitions--
 1285:  *    Reduce on <identifier-stop> using <command-else>-><identifier-else><bracket-open><block> Lookahead = 
 1286:  *    Reduce on <identifier-fileinto> using <command-else>-><identifier-else><bracket-open><block> Lookahead = 
 1287:  *    Reduce on <identifier-redirect> using <command-else>-><identifier-else><bracket-open><block> Lookahead = 
 1288:  *    Reduce on <identifier-keep> using <command-else>-><identifier-else><bracket-open><block> Lookahead = 
 1289:  *    Reduce on <identifier-discard> using <command-else>-><identifier-else><bracket-open><block> Lookahead = 
 1290:  *    Reduce on <identifier-require> using <command-else>-><identifier-else><bracket-open><block> Lookahead = 
 1291:  *    Reduce on <identifier-if> using <command-else>-><identifier-else><bracket-open><block> Lookahead = 
 1292:  *    Reduce on <identifier> using <command-else>-><identifier-else><bracket-open><block> Lookahead = 
 1293:  *    Reduce on <bracket-close> using <command-else>-><identifier-else><bracket-open><block> Lookahead = 
 1294:  *    Reduce on <hash-comment> using <command-else>-><identifier-else><bracket-open><block> Lookahead = 
 1295:  *    Reduce on <bracket-comment> using <command-else>-><identifier-else><bracket-open><block> Lookahead = 
 1296:  *    Reduce on  using <command-else>-><identifier-else><bracket-open><block> Lookahead = 
 1297:  * ----------- 76 -----------
 1298:  *   --Itemset--
 1299:  *     <command-elsif>-><identifier-elsif><test><bracket-open><block>•
 1300:  *     <command-elsif>-><identifier-elsif><test><bracket-open><block>•<command-elsif>
 1301:  *     <command-elsif>-><identifier-elsif><test><bracket-open><block>•<command-else>
 1302:  *    +<command-elsif>->•<identifier-elsif><test><bracket-open><block>
 1303:  *    +<command-elsif>->•<identifier-elsif><test><bracket-open><block><command-elsif>
 1304:  *    +<command-elsif>->•<identifier-elsif><test><bracket-open><block><command-else>
 1305:  *    +<command-else>->•<identifier-else><bracket-open><block>
 1306:  *   --Transitions--
 1307:  *    Reduce on <identifier-stop> using <command-elsif>-><identifier-elsif><test><bracket-open><block> Lookahead = 
 1308:  *    Reduce on <identifier-fileinto> using <command-elsif>-><identifier-elsif><test><bracket-open><block> Lookahead = 
 1309:  *    Reduce on <identifier-redirect> using <command-elsif>-><identifier-elsif><test><bracket-open><block> Lookahead = 
 1310:  *    Reduce on <identifier-keep> using <command-elsif>-><identifier-elsif><test><bracket-open><block> Lookahead = 
 1311:  *    Reduce on <identifier-discard> using <command-elsif>-><identifier-elsif><test><bracket-open><block> Lookahead = 
 1312:  *    Reduce on <identifier-require> using <command-elsif>-><identifier-elsif><test><bracket-open><block> Lookahead = 
 1313:  *    Reduce on <identifier-if> using <command-elsif>-><identifier-elsif><test><bracket-open><block> Lookahead = 
 1314:  *    Reduce on <identifier> using <command-elsif>-><identifier-elsif><test><bracket-open><block> Lookahead = 
 1315:  *    Reduce on <bracket-close> using <command-elsif>-><identifier-elsif><test><bracket-open><block> Lookahead = 
 1316:  *    Reduce on <hash-comment> using <command-elsif>-><identifier-elsif><test><bracket-open><block> Lookahead = 
 1317:  *    Reduce on <bracket-comment> using <command-elsif>-><identifier-elsif><test><bracket-open><block> Lookahead = 
 1318:  *    Reduce on  using <command-elsif>-><identifier-elsif><test><bracket-open><block> Lookahead = 
 1319:  *    Goto on <command-elsif> to 77 because of <command-elsif>-><identifier-elsif><test><bracket-open><block>•<command-elsif>
 1320:  *    Goto on <command-else> to 78 because of <command-elsif>-><identifier-elsif><test><bracket-open><block>•<command-else>
 1321:  *    Shift on <identifier-elsif> to 69 because of <command-elsif>->•<identifier-elsif><test><bracket-open><block> Lookahead = 
 1322:  *    Shift on <identifier-elsif> to 69 because of <command-elsif>->•<identifier-elsif><test><bracket-open><block><command-elsif> Lookahead = 
 1323:  *    Shift on <identifier-elsif> to 69 because of <command-elsif>->•<identifier-elsif><test><bracket-open><block><command-else> Lookahead = 
 1324:  *    Shift on <identifier-else> to 70 because of <command-else>->•<identifier-else><bracket-open><block> Lookahead = 
 1325:  * ----------- 77 -----------
 1326:  *   --Itemset--
 1327:  *     <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif>•
 1328:  *   --Transitions--
 1329:  *    Reduce on <identifier-stop> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif> Lookahead = 
 1330:  *    Reduce on <identifier-fileinto> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif> Lookahead = 
 1331:  *    Reduce on <identifier-redirect> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif> Lookahead = 
 1332:  *    Reduce on <identifier-keep> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif> Lookahead = 
 1333:  *    Reduce on <identifier-discard> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif> Lookahead = 
 1334:  *    Reduce on <identifier-require> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif> Lookahead = 
 1335:  *    Reduce on <identifier-if> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif> Lookahead = 
 1336:  *    Reduce on <identifier> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif> Lookahead = 
 1337:  *    Reduce on <bracket-close> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif> Lookahead = 
 1338:  *    Reduce on <hash-comment> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif> Lookahead = 
 1339:  *    Reduce on <bracket-comment> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif> Lookahead = 
 1340:  *    Reduce on  using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif> Lookahead = 
 1341:  * ----------- 78 -----------
 1342:  *   --Itemset--
 1343:  *     <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else>•
 1344:  *   --Transitions--
 1345:  *    Reduce on <identifier-stop> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else> Lookahead = 
 1346:  *    Reduce on <identifier-fileinto> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else> Lookahead = 
 1347:  *    Reduce on <identifier-redirect> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else> Lookahead = 
 1348:  *    Reduce on <identifier-keep> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else> Lookahead = 
 1349:  *    Reduce on <identifier-discard> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else> Lookahead = 
 1350:  *    Reduce on <identifier-require> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else> Lookahead = 
 1351:  *    Reduce on <identifier-if> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else> Lookahead = 
 1352:  *    Reduce on <identifier> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else> Lookahead = 
 1353:  *    Reduce on <bracket-close> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else> Lookahead = 
 1354:  *    Reduce on <hash-comment> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else> Lookahead = 
 1355:  *    Reduce on <bracket-comment> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else> Lookahead = 
 1356:  *    Reduce on  using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else> Lookahead =
 1357:  *
 1358:  */
 1359: class TestSieveParser extends \sergiosgc\Text_Parser_LALR
 1360: {
 1361:     /* Constructor {{{ */
 1362:     /**
 1363:      * Parser constructor
 1364:      * 
 1365:      * @param Text_Tokenizer Tokenizer that will feed this parser
 1366:      */
 1367:     public function __construct(&$tokenizer)
 1368:     {
 1369:         parent::__construct($tokenizer);
 1370:         $this->_gotoTable = unserialize('a:23:{i:0;a:5:{s:10:"<commands>";i:1;s:19:"<commented-command>";i:2;s:9:"<comment>";i:3;s:9:"<command>";i:4;s:16:"<single-comment>";i:5;}i:1;a:4:{s:19:"<commented-command>";i:16;s:9:"<comment>";i:3;s:9:"<command>";i:4;s:16:"<single-comment>";i:5;}i:3;a:2:{s:9:"<command>";i:17;s:16:"<single-comment>";i:18;}i:7;a:1:{s:8:"<string>";i:20;}i:8;a:1:{s:8:"<string>";i:23;}i:11;a:2:{s:13:"<string-list>";i:26;s:8:"<string>";i:28;}i:12;a:1:{s:6:"<test>";i:29;}i:13;a:7:{s:11:"<arguments>";i:31;s:16:"<arguments-plus>";i:34;s:6:"<test>";i:35;s:11:"<test-list>";i:36;s:10:"<argument>";i:37;s:13:"<string-list>";i:39;s:8:"<string>";i:28;}i:27;a:2:{s:17:"<string-plus-csv>";i:45;s:8:"<string>";i:46;}i:30;a:7:{s:11:"<arguments>";i:48;s:16:"<arguments-plus>";i:34;s:6:"<test>";i:35;s:11:"<test-list>";i:36;s:10:"<argument>";i:37;s:13:"<string-list>";i:39;s:8:"<string>";i:28;}i:33;a:2:{s:7:"<block>";i:51;s:9:"<command>";i:52;}i:34;a:5:{s:6:"<test>";i:54;s:11:"<test-list>";i:55;s:10:"<argument>";i:56;s:13:"<string-list>";i:39;s:8:"<string>";i:28;}i:38;a:2:{s:15:"<test-plus-csv>";i:57;s:6:"<test>";i:58;}i:47;a:2:{s:7:"<block>";i:61;s:9:"<command>";i:52;}i:50;a:2:{s:7:"<block>";i:62;s:9:"<command>";i:52;}i:52;a:2:{s:7:"<block>";i:63;s:9:"<command>";i:52;}i:60;a:1:{s:8:"<string>";i:66;}i:61;a:2:{s:15:"<command-elsif>";i:67;s:14:"<command-else>";i:68;}i:65;a:2:{s:15:"<test-plus-csv>";i:71;s:6:"<test>";i:58;}i:69;a:1:{s:6:"<test>";i:72;}i:73;a:2:{s:7:"<block>";i:75;s:9:"<command>";i:52;}i:74;a:2:{s:7:"<block>";i:76;s:9:"<command>";i:52;}i:76;a:2:{s:15:"<command-elsif>";i:77;s:14:"<command-else>";i:78;}}');
 1371:         $this->_actionTable = unserialize('a:79:{i:1;a:11:{s:0:"";a:1:{s:6:"action";s:6:"accept";}s:17:"<identifier-stop>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:6;}s:21:"<identifier-fileinto>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:7;}s:21:"<identifier-redirect>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:8;}s:17:"<identifier-keep>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:9;}s:20:"<identifier-discard>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:10;}s:20:"<identifier-require>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:11;}s:15:"<identifier-if>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:12;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:13;}s:14:"<hash-comment>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:14;}s:17:"<bracket-comment>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:15;}}i:0;a:10:{s:17:"<identifier-stop>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:6;}s:21:"<identifier-fileinto>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:7;}s:21:"<identifier-redirect>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:8;}s:17:"<identifier-keep>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:9;}s:20:"<identifier-discard>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:10;}s:20:"<identifier-require>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:11;}s:15:"<identifier-if>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:12;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:13;}s:14:"<hash-comment>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:14;}s:17:"<bracket-comment>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:15;}}i:3;a:10:{s:17:"<identifier-stop>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:6;}s:21:"<identifier-fileinto>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:7;}s:21:"<identifier-redirect>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:8;}s:17:"<identifier-keep>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:9;}s:20:"<identifier-discard>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:10;}s:20:"<identifier-require>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:11;}s:15:"<identifier-if>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:12;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:13;}s:14:"<hash-comment>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:14;}s:17:"<bracket-comment>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:15;}}i:6;a:1:{s:11:"<semicolon>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:19;}}i:7;a:2:{s:15:"<quoted-string>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:21;}s:12:"<multi-line>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:22;}}i:8;a:2:{s:15:"<quoted-string>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:21;}s:12:"<multi-line>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:22;}}i:9;a:1:{s:11:"<semicolon>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:24;}}i:10;a:1:{s:11:"<semicolon>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:25;}}i:11;a:3:{s:25:"<square-parenthesis-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:27;}s:15:"<quoted-string>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:21;}s:12:"<multi-line>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:22;}}i:12;a:1:{s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:30;}}i:13;a:9:{s:11:"<semicolon>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:32;}s:14:"<bracket-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:33;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:30;}s:18:"<parenthesis-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:38;}s:8:"<number>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:40;}s:5:"<tag>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:41;}s:25:"<square-parenthesis-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:27;}s:15:"<quoted-string>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:21;}s:12:"<multi-line>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:22;}}i:20;a:1:{s:11:"<semicolon>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:42;}}i:23;a:1:{s:11:"<semicolon>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:43;}}i:26;a:1:{s:11:"<semicolon>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:44;}}i:27;a:2:{s:15:"<quoted-string>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:21;}s:12:"<multi-line>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:22;}}i:29;a:1:{s:14:"<bracket-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:47;}}i:30;a:11:{s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:30;}s:18:"<parenthesis-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:38;}s:8:"<number>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:40;}s:5:"<tag>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:41;}s:25:"<square-parenthesis-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:27;}s:15:"<quoted-string>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:21;}s:12:"<multi-line>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:22;}s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:3:"$id";}s:15:"leftNonTerminal";s:6:"<test>";s:8:"function";s:14:"reduce_rule_32";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:3:"$id";}s:15:"leftNonTerminal";s:6:"<test>";s:8:"function";s:14:"reduce_rule_32";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:3:"$id";}s:15:"leftNonTerminal";s:6:"<test>";s:8:"function";s:14:"reduce_rule_32";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:3:"$id";}s:15:"leftNonTerminal";s:6:"<test>";s:8:"function";s:14:"reduce_rule_32";}}i:31;a:2:{s:11:"<semicolon>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:49;}s:14:"<bracket-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:50;}}i:33;a:9:{s:15:"<bracket-close>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:53;}s:17:"<identifier-stop>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:6;}s:21:"<identifier-fileinto>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:7;}s:21:"<identifier-redirect>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:8;}s:17:"<identifier-keep>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:9;}s:20:"<identifier-discard>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:10;}s:20:"<identifier-require>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:11;}s:15:"<identifier-if>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:12;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:13;}}i:34;a:11:{s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:30;}s:18:"<parenthesis-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:38;}s:8:"<number>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:40;}s:5:"<tag>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:41;}s:25:"<square-parenthesis-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:27;}s:15:"<quoted-string>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:21;}s:12:"<multi-line>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:22;}s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:5:"$args";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_24";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:5:"$args";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_24";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:5:"$args";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_24";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:5:"$args";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_24";}}i:38;a:1:{s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:30;}}i:45;a:2:{s:26:"<square-parenthesis-close>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:59;}s:7:"<comma>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:60;}}i:47;a:9:{s:15:"<bracket-close>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:53;}s:17:"<identifier-stop>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:6;}s:21:"<identifier-fileinto>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:7;}s:21:"<identifier-redirect>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:8;}s:17:"<identifier-keep>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:9;}s:20:"<identifier-discard>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:10;}s:20:"<identifier-require>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:11;}s:15:"<identifier-if>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:12;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:13;}}i:50;a:9:{s:15:"<bracket-close>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:53;}s:17:"<identifier-stop>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:6;}s:21:"<identifier-fileinto>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:7;}s:21:"<identifier-redirect>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:8;}s:17:"<identifier-keep>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:9;}s:20:"<identifier-discard>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:10;}s:20:"<identifier-require>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:11;}s:15:"<identifier-if>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:12;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:13;}}i:52;a:9:{s:15:"<bracket-close>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:53;}s:17:"<identifier-stop>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:6;}s:21:"<identifier-fileinto>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:7;}s:21:"<identifier-redirect>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:8;}s:17:"<identifier-keep>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:9;}s:20:"<identifier-discard>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:10;}s:20:"<identifier-require>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:11;}s:15:"<identifier-if>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:12;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:13;}}i:57;a:1:{s:19:"<parenthesis-close>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:64;}}i:58;a:2:{s:7:"<comma>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:65;}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:5:"$test";}s:15:"leftNonTerminal";s:15:"<test-plus-csv>";s:8:"function";s:14:"reduce_rule_34";}}i:60;a:2:{s:15:"<quoted-string>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:21;}s:12:"<multi-line>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:22;}}i:61;a:14:{s:18:"<identifier-elsif>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:69;}s:17:"<identifier-else>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:70;}s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_11";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_11";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_11";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_11";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_11";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_11";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_11";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_11";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_11";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_11";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_11";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_11";}}i:65;a:1:{s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:30;}}i:69;a:1:{s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:30;}}i:70;a:1:{s:14:"<bracket-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:73;}}i:72;a:1:{s:14:"<bracket-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:74;}}i:73;a:9:{s:15:"<bracket-close>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:53;}s:17:"<identifier-stop>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:6;}s:21:"<identifier-fileinto>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:7;}s:21:"<identifier-redirect>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:8;}s:17:"<identifier-keep>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:9;}s:20:"<identifier-discard>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:10;}s:20:"<identifier-require>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:11;}s:15:"<identifier-if>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:12;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:13;}}i:74;a:9:{s:15:"<bracket-close>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:53;}s:17:"<identifier-stop>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:6;}s:21:"<identifier-fileinto>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:7;}s:21:"<identifier-redirect>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:8;}s:17:"<identifier-keep>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:9;}s:20:"<identifier-discard>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:10;}s:20:"<identifier-require>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:11;}s:15:"<identifier-if>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:12;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:13;}}i:76;a:14:{s:18:"<identifier-elsif>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:69;}s:17:"<identifier-else>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:70;}s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_14";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_14";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_14";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_14";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_14";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_14";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_14";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_14";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_14";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_14";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_14";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_14";}}i:2;a:11:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_2";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_2";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_2";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_2";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_2";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_2";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_2";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_2";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_2";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_2";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_2";}}i:4;a:11:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_4";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_4";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_4";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_4";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_4";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_4";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_4";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_4";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_4";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_4";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_4";}}i:5;a:10:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_46";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_46";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_46";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_46";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_46";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_46";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_46";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_46";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_46";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_46";}}i:14;a:10:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_47";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_47";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_47";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_47";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_47";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_47";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_47";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_47";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_47";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_47";}}i:15;a:10:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_48";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_48";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_48";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_48";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_48";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_48";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_48";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_48";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_48";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_48";}}i:16;a:11:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_1";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_1";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_1";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_1";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_1";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_1";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_1";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_1";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_1";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_1";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_1";}}i:17;a:11:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_3";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_3";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_3";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_3";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_3";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_3";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_3";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_3";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_3";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_3";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_3";}}i:18;a:10:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_45";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_45";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_45";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_45";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_45";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_45";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_45";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_45";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_45";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_45";}}i:19;a:12:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_5";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_5";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_5";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_5";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_5";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_5";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_5";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_5";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_5";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_5";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_5";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_5";}}i:21;a:12:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_43";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_43";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_43";}s:18:"<parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_43";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_43";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_43";}s:8:"<number>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_43";}s:5:"<tag>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_43";}s:25:"<square-parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_43";}s:26:"<square-parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_43";}s:15:"<quoted-string>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_43";}s:12:"<multi-line>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_43";}}i:22;a:12:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_44";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_44";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_44";}s:18:"<parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_44";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_44";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_44";}s:8:"<number>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_44";}s:5:"<tag>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_44";}s:25:"<square-parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_44";}s:26:"<square-parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_44";}s:15:"<quoted-string>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_44";}s:12:"<multi-line>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_44";}}i:24;a:12:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_8";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_8";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_8";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_8";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_8";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_8";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_8";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_8";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_8";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_8";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_8";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_8";}}i:25;a:12:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_9";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_9";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_9";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_9";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_9";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_9";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_9";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_9";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_9";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_9";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_9";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_9";}}i:28;a:11:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_40";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_40";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_40";}s:18:"<parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_40";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_40";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_40";}s:8:"<number>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_40";}s:5:"<tag>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_40";}s:25:"<square-parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_40";}s:15:"<quoted-string>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_40";}s:12:"<multi-line>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_40";}}i:32;a:12:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_20";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_20";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_20";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_20";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_20";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_20";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_20";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_20";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_20";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_20";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_20";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_20";}}i:35;a:2:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:5:"$test";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_27";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:5:"$test";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_27";}}i:36;a:4:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:6:"$tests";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_28";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:6:"$tests";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_28";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:6:"$tests";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_28";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:6:"$tests";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_28";}}i:37;a:11:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_30";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_30";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_30";}s:18:"<parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_30";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_30";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_30";}s:8:"<number>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_30";}s:5:"<tag>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_30";}s:25:"<square-parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_30";}s:15:"<quoted-string>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_30";}s:12:"<multi-line>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_30";}}i:39;a:11:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_36";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_36";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_36";}s:18:"<parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_36";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_36";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_36";}s:8:"<number>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_36";}s:5:"<tag>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_36";}s:25:"<square-parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_36";}s:15:"<quoted-string>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_36";}s:12:"<multi-line>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_36";}}i:40;a:11:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_37";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_37";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_37";}s:18:"<parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_37";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_37";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_37";}s:8:"<number>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_37";}s:5:"<tag>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_37";}s:25:"<square-parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_37";}s:15:"<quoted-string>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_37";}s:12:"<multi-line>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_37";}}i:41;a:11:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_38";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_38";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_38";}s:18:"<parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_38";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_38";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_38";}s:8:"<number>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_38";}s:5:"<tag>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_38";}s:25:"<square-parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_38";}s:15:"<quoted-string>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_38";}s:12:"<multi-line>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_38";}}i:42;a:12:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$mailbox";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_6";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$mailbox";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_6";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$mailbox";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_6";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$mailbox";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_6";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$mailbox";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_6";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$mailbox";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_6";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$mailbox";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_6";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$mailbox";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_6";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$mailbox";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_6";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$mailbox";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_6";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$mailbox";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_6";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$mailbox";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_6";}}i:43;a:12:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$address";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_7";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$address";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_7";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$address";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_7";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$address";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_7";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$address";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_7";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$address";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_7";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$address";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_7";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$address";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_7";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$address";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_7";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$address";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_7";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$address";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_7";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$address";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_7";}}i:44;a:12:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:13:"$capabilities";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_10";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:13:"$capabilities";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_10";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:13:"$capabilities";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_10";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:13:"$capabilities";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_10";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:13:"$capabilities";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_10";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:13:"$capabilities";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_10";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:13:"$capabilities";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_10";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:13:"$capabilities";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_10";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:13:"$capabilities";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_10";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:13:"$capabilities";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_10";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:13:"$capabilities";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_10";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:13:"$capabilities";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_10";}}i:46;a:2:{s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:17:"<string-plus-csv>";s:8:"function";s:14:"reduce_rule_41";}s:26:"<square-parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:17:"<string-plus-csv>";s:8:"function";s:14:"reduce_rule_41";}}i:48;a:4:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:5:"$args";}s:15:"leftNonTerminal";s:6:"<test>";s:8:"function";s:14:"reduce_rule_31";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:5:"$args";}s:15:"leftNonTerminal";s:6:"<test>";s:8:"function";s:14:"reduce_rule_31";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:5:"$args";}s:15:"leftNonTerminal";s:6:"<test>";s:8:"function";s:14:"reduce_rule_31";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:5:"$args";}s:15:"leftNonTerminal";s:6:"<test>";s:8:"function";s:14:"reduce_rule_31";}}i:49;a:12:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_18";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_18";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_18";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_18";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_18";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_18";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_18";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_18";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_18";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_18";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_18";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_18";}}i:51;a:12:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_21";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_21";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_21";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_21";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_21";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_21";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_21";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_21";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_21";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_21";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_21";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_21";}}i:53;a:14:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_23";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_23";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_23";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_23";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_23";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_23";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_23";}s:18:"<identifier-elsif>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_23";}s:17:"<identifier-else>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_23";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_23";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_23";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_23";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_23";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_23";}}i:54;a:2:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:5:"$args";i:1;s:5:"$test";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_25";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:5:"$args";i:1;s:5:"$test";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_25";}}i:55;a:4:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:5:"$args";i:1;s:6:"$tests";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_26";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:5:"$args";i:1;s:6:"$tests";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_26";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:5:"$args";i:1;s:6:"$tests";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_26";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:5:"$args";i:1;s:6:"$tests";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_26";}}i:56;a:11:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_29";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_29";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_29";}s:18:"<parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_29";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_29";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_29";}s:8:"<number>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_29";}s:5:"<tag>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_29";}s:25:"<square-parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_29";}s:15:"<quoted-string>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_29";}s:12:"<multi-line>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_29";}}i:59;a:11:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_39";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_39";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_39";}s:18:"<parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_39";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_39";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_39";}s:8:"<number>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_39";}s:5:"<tag>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_39";}s:25:"<square-parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_39";}s:15:"<quoted-string>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_39";}s:12:"<multi-line>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_39";}}i:62;a:12:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_19";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_19";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_19";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_19";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_19";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_19";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_19";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_19";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_19";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_19";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_19";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_19";}}i:63;a:14:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_22";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_22";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_22";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_22";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_22";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_22";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_22";}s:18:"<identifier-elsif>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_22";}s:17:"<identifier-else>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_22";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_22";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_22";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_22";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_22";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_22";}}i:64;a:4:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:6:"$tests";i:2;s:0:"";}s:15:"leftNonTerminal";s:11:"<test-list>";s:8:"function";s:14:"reduce_rule_33";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:6:"$tests";i:2;s:0:"";}s:15:"leftNonTerminal";s:11:"<test-list>";s:8:"function";s:14:"reduce_rule_33";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:6:"$tests";i:2;s:0:"";}s:15:"leftNonTerminal";s:11:"<test-list>";s:8:"function";s:14:"reduce_rule_33";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:6:"$tests";i:2;s:0:"";}s:15:"leftNonTerminal";s:11:"<test-list>";s:8:"function";s:14:"reduce_rule_33";}}i:66;a:2:{s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:4:"$acc";i:1;s:0:"";i:2;s:4:"$str";}s:15:"leftNonTerminal";s:17:"<string-plus-csv>";s:8:"function";s:14:"reduce_rule_42";}s:26:"<square-parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:4:"$acc";i:1;s:0:"";i:2;s:4:"$str";}s:15:"leftNonTerminal";s:17:"<string-plus-csv>";s:8:"function";s:14:"reduce_rule_42";}}i:67;a:12:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_12";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_12";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_12";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_12";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_12";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_12";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_12";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_12";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_12";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_12";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_12";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_12";}}i:68;a:12:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_13";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_13";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_13";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_13";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_13";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_13";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_13";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_13";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_13";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_13";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_13";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_13";}}i:71;a:1:{s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:5:"$test";i:1;s:0:"";i:2;s:4:"$acc";}s:15:"leftNonTerminal";s:15:"<test-plus-csv>";s:8:"function";s:14:"reduce_rule_35";}}i:75;a:12:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:14:"<command-else>";s:8:"function";s:14:"reduce_rule_17";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:14:"<command-else>";s:8:"function";s:14:"reduce_rule_17";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:14:"<command-else>";s:8:"function";s:14:"reduce_rule_17";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:14:"<command-else>";s:8:"function";s:14:"reduce_rule_17";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:14:"<command-else>";s:8:"function";s:14:"reduce_rule_17";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:14:"<command-else>";s:8:"function";s:14:"reduce_rule_17";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:14:"<command-else>";s:8:"function";s:14:"reduce_rule_17";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:14:"<command-else>";s:8:"function";s:14:"reduce_rule_17";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:14:"<command-else>";s:8:"function";s:14:"reduce_rule_17";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:14:"<command-else>";s:8:"function";s:14:"reduce_rule_17";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:14:"<command-else>";s:8:"function";s:14:"reduce_rule_17";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:14:"<command-else>";s:8:"function";s:14:"reduce_rule_17";}}i:77;a:12:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_15";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_15";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_15";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_15";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_15";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_15";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_15";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_15";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_15";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_15";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_15";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_15";}}i:78;a:12:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_16";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_16";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_16";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_16";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_16";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_16";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_16";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_16";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_16";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_16";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_16";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_16";}}}');
 1372:     }
 1373:     /* }}} */
 1374:     /* reduce_rule_2 {{{ */
 1375:     /**
 1376:      * Reduction function for rule 2 
 1377:      *
 1378:      * Rule 2 is:
 1379:      * <commands>-><commented-command>
 1380:      *
 1381:      * @param Text_Tokenizer_Token Token of type '<commented-command>'
 1382:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<commands>' token
 1383:      */
 1384:     protected function reduce_rule_2($cmd = null)
 1385:     {
 1386:             if (!isset($acc)) $acc = new \sergiosgc\Text_Tokenizer_Token('<commands>', []);
 1387:         array_push($acc->getValue(), $cmd->getValue());
 1388:         return $acc;
 1389:         return new \sergiosgc\Text_Tokenizer_Token('<commands>', $result);
 1390:     }
 1391:     /* }}} */
 1392:     /* reduce_rule_4 {{{ */
 1393:     /**
 1394:      * Reduction function for rule 4 
 1395:      *
 1396:      * Rule 4 is:
 1397:      * <commented-command>-><command>
 1398:      *
 1399:      * @param Text_Tokenizer_Token Token of type '<command>'
 1400:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<commented-command>' token
 1401:      */
 1402:     protected function reduce_rule_4($command = null)
 1403:     {
 1404:             if (!isset($comment)) $comment = new \sergiosgc\Text_Tokenizer_Token('<comment>', null);
 1405:         $command->getValue()->comment = $comment->getValue();
 1406:         return new \sergiosgc\Text_Tokenizer_Token('<commented-command>', $command->getValue());
 1407:         return new \sergiosgc\Text_Tokenizer_Token('<commented-command>', $result);
 1408:     }
 1409:     /* }}} */
 1410:     /* reduce_rule_46 {{{ */
 1411:     /**
 1412:      * Reduction function for rule 46 
 1413:      *
 1414:      * Rule 46 is:
 1415:      * <comment>-><single-comment>
 1416:      *
 1417:      * @param Text_Tokenizer_Token Token of type '<single-comment>'
 1418:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<comment>' token
 1419:      */
 1420:     protected function reduce_rule_46($singleComment = null)
 1421:     {
 1422:             if (isset($comment)) {
 1423:             $comment->getValue()->text .= $singleComment->getValue();
 1424:             return $comment;
 1425:         }
 1426:         $result = new \sergiosgc\Sieve_Parser\Script_Comment($singleComment->getValue());
 1427:         return new \sergiosgc\Text_Tokenizer_Token('<comment>', $result);
 1428:     }
 1429:     /* }}} */
 1430:     /* reduce_rule_47 {{{ */
 1431:     /**
 1432:      * Reduction function for rule 47 
 1433:      *
 1434:      * Rule 47 is:
 1435:      * <single-comment>-><hash-comment>
 1436:      *
 1437:      * @param Text_Tokenizer_Token Token of type '<hash-comment>'
 1438:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<single-comment>' token
 1439:      */
 1440:     protected function reduce_rule_47($comment = null)
 1441:     {
 1442:             $result = $comment->getValue();
 1443:         return new \sergiosgc\Text_Tokenizer_Token('<single-comment>', $result);
 1444:     }
 1445:     /* }}} */
 1446:     /* reduce_rule_48 {{{ */
 1447:     /**
 1448:      * Reduction function for rule 48 
 1449:      *
 1450:      * Rule 48 is:
 1451:      * <single-comment>-><bracket-comment>
 1452:      *
 1453:      * @param Text_Tokenizer_Token Token of type '<bracket-comment>'
 1454:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<single-comment>' token
 1455:      */
 1456:     protected function reduce_rule_48($comment = null)
 1457:     {
 1458:             $result = $comment->getValue();
 1459:         return new \sergiosgc\Text_Tokenizer_Token('<single-comment>', $result);
 1460:     }
 1461:     /* }}} */
 1462:     /* reduce_rule_1 {{{ */
 1463:     /**
 1464:      * Reduction function for rule 1 
 1465:      *
 1466:      * Rule 1 is:
 1467:      * <commands>-><commands><commented-command>
 1468:      *
 1469:      * @param Text_Tokenizer_Token Token of type '<commands>'
 1470:      * @param Text_Tokenizer_Token Token of type '<commented-command>'
 1471:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<commands>' token
 1472:      */
 1473:     protected function reduce_rule_1($acc = null,$cmd = null)
 1474:     {
 1475:             if (!isset($acc)) $acc = new \sergiosgc\Text_Tokenizer_Token('<commands>', []);
 1476:         array_push($acc->getValue(), $cmd->getValue());
 1477:         return $acc;
 1478:         return new \sergiosgc\Text_Tokenizer_Token('<commands>', $result);
 1479:     }
 1480:     /* }}} */
 1481:     /* reduce_rule_3 {{{ */
 1482:     /**
 1483:      * Reduction function for rule 3 
 1484:      *
 1485:      * Rule 3 is:
 1486:      * <commented-command>-><comment><command>
 1487:      *
 1488:      * @param Text_Tokenizer_Token Token of type '<comment>'
 1489:      * @param Text_Tokenizer_Token Token of type '<command>'
 1490:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<commented-command>' token
 1491:      */
 1492:     protected function reduce_rule_3($comment = null,$command = null)
 1493:     {
 1494:             if (!isset($comment)) $comment = new \sergiosgc\Text_Tokenizer_Token('<comment>', null);
 1495:         $command->getValue()->comment = $comment->getValue();
 1496:         return new \sergiosgc\Text_Tokenizer_Token('<commented-command>', $command->getValue());
 1497:         return new \sergiosgc\Text_Tokenizer_Token('<commented-command>', $result);
 1498:     }
 1499:     /* }}} */
 1500:     /* reduce_rule_45 {{{ */
 1501:     /**
 1502:      * Reduction function for rule 45 
 1503:      *
 1504:      * Rule 45 is:
 1505:      * <comment>-><comment><single-comment>
 1506:      *
 1507:      * @param Text_Tokenizer_Token Token of type '<comment>'
 1508:      * @param Text_Tokenizer_Token Token of type '<single-comment>'
 1509:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<comment>' token
 1510:      */
 1511:     protected function reduce_rule_45($comment = null,$singleComment = null)
 1512:     {
 1513:             if (isset($comment)) {
 1514:             $comment->getValue()->text .= $singleComment->getValue();
 1515:             return $comment;
 1516:         }
 1517:         $result = new \sergiosgc\Sieve_Parser\Script_Comment($singleComment->getValue());
 1518:         return new \sergiosgc\Text_Tokenizer_Token('<comment>', $result);
 1519:     }
 1520:     /* }}} */
 1521:     /* reduce_rule_5 {{{ */
 1522:     /**
 1523:      * Reduction function for rule 5 
 1524:      *
 1525:      * Rule 5 is:
 1526:      * <command>-><identifier-stop><semicolon>
 1527:      *
 1528:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
 1529:      */
 1530:     protected function reduce_rule_5()
 1531:     {
 1532:             $result = new \sergiosgc\Sieve_Parser\Script_Command_Stop();
 1533:         return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
 1534:     }
 1535:     /* }}} */
 1536:     /* reduce_rule_43 {{{ */
 1537:     /**
 1538:      * Reduction function for rule 43 
 1539:      *
 1540:      * Rule 43 is:
 1541:      * <string>-><quoted-string>
 1542:      *
 1543:      * @param Text_Tokenizer_Token Token of type '<quoted-string>'
 1544:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<string>' token
 1545:      */
 1546:     protected function reduce_rule_43($quoted = null)
 1547:     {
 1548:             $result = isset($quoted) ?
 1549:             strtr($quoted->getValue(), [ '\\r' => "\r", '\\n' => "\n", '\\\\' => '\\' ]) : # Unquote string
 1550:             substr($multiline->getValue(), 0, -3); # Remove .CRLF marker
 1551:         return new \sergiosgc\Text_Tokenizer_Token('<string>', $result);
 1552:     }
 1553:     /* }}} */
 1554:     /* reduce_rule_44 {{{ */
 1555:     /**
 1556:      * Reduction function for rule 44 
 1557:      *
 1558:      * Rule 44 is:
 1559:      * <string>-><multi-line>
 1560:      *
 1561:      * @param Text_Tokenizer_Token Token of type '<multi-line>'
 1562:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<string>' token
 1563:      */
 1564:     protected function reduce_rule_44($multiline = null)
 1565:     {
 1566:             $result = isset($quoted) ?
 1567:             strtr($quoted->getValue(), [ '\\r' => "\r", '\\n' => "\n", '\\\\' => '\\' ]) : # Unquote string
 1568:             substr($multiline->getValue(), 0, -3); # Remove .CRLF marker
 1569:         return new \sergiosgc\Text_Tokenizer_Token('<string>', $result);
 1570:     }
 1571:     /* }}} */
 1572:     /* reduce_rule_8 {{{ */
 1573:     /**
 1574:      * Reduction function for rule 8 
 1575:      *
 1576:      * Rule 8 is:
 1577:      * <command>-><identifier-keep><semicolon>
 1578:      *
 1579:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
 1580:      */
 1581:     protected function reduce_rule_8()
 1582:     {
 1583:             $result = new \sergiosgc\Sieve_Parser\Script_Command_Keep();
 1584:         return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
 1585:     }
 1586:     /* }}} */
 1587:     /* reduce_rule_9 {{{ */
 1588:     /**
 1589:      * Reduction function for rule 9 
 1590:      *
 1591:      * Rule 9 is:
 1592:      * <command>-><identifier-discard><semicolon>
 1593:      *
 1594:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
 1595:      */
 1596:     protected function reduce_rule_9()
 1597:     {
 1598:             $result = new \sergiosgc\Sieve_Parser\Script_Command_Discard();
 1599:         return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
 1600:     }
 1601:     /* }}} */
 1602:     /* reduce_rule_40 {{{ */
 1603:     /**
 1604:      * Reduction function for rule 40 
 1605:      *
 1606:      * Rule 40 is:
 1607:      * <string-list>-><string>
 1608:      *
 1609:      * @param Text_Tokenizer_Token Token of type '<string>'
 1610:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<string-list>' token
 1611:      */
 1612:     protected function reduce_rule_40($str = null)
 1613:     {
 1614:             if (isset($str)) return new \sergiosgc\Text_Tokenizer_Token('<string-list>', $str->getValue());
 1615:         return new \sergiosgc\Text_Tokenizer_Token('<string-list>', $strArr->getValue());
 1616:         return new \sergiosgc\Text_Tokenizer_Token('<string-list>', $result);
 1617:     }
 1618:     /* }}} */
 1619:     /* reduce_rule_32 {{{ */
 1620:     /**
 1621:      * Reduction function for rule 32 
 1622:      *
 1623:      * Rule 32 is:
 1624:      * <test>-><identifier>
 1625:      *
 1626:      * @param Text_Tokenizer_Token Token of type '<identifier>'
 1627:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<test>' token
 1628:      */
 1629:     protected function reduce_rule_32($id = null)
 1630:     {
 1631:             if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments>', []);
 1632:         $result = new \sergiosgc\Sieve_Parser\Script_Test($id->getValue(), $args->getValue()['arguments']);
 1633:         return new \sergiosgc\Text_Tokenizer_Token('<test>', $result);
 1634:     }
 1635:     /* }}} */
 1636:     /* reduce_rule_20 {{{ */
 1637:     /**
 1638:      * Reduction function for rule 20 
 1639:      *
 1640:      * Rule 20 is:
 1641:      * <command>-><identifier><semicolon>
 1642:      *
 1643:      * @param Text_Tokenizer_Token Token of type '<identifier>'
 1644:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
 1645:      */
 1646:     protected function reduce_rule_20($id = null)
 1647:     {
 1648:             if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments>', [ 'arguments' => [], 'tests' => [] ]);
 1649:         if (!isset($block)) $block = new \sergiosgc\Text_Tokenizer_Token('<block>', []);
 1650:         $result = new \sergiosgc\Sieve_Parser\Script_Command(
 1651:             $id->getValue(),
 1652:             $args->getValue()['arguments'],
 1653:             $args->getValue()['tests'],
 1654:             $block->getValue());
 1655:         return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
 1656:     }
 1657:     /* }}} */
 1658:     /* reduce_rule_24 {{{ */
 1659:     /**
 1660:      * Reduction function for rule 24 
 1661:      *
 1662:      * Rule 24 is:
 1663:      * <arguments>-><arguments-plus>
 1664:      *
 1665:      * @param Text_Tokenizer_Token Token of type '<arguments-plus>'
 1666:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<arguments>' token
 1667:      */
 1668:     protected function reduce_rule_24($args = null)
 1669:     {
 1670:             if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments-plus>', []);
 1671:         if (!isset($tests)) $tests = new \sergiosgc\Text_Tokenizer_Token('<test-list>', []);
 1672:         if (isset($test)) array_unshift($tests->getValue(), $test->getValue());
 1673:         $result = [ 'arguments' => $args->getValue(), 'tests' => $tests->getValue() ];
 1674:         return new \sergiosgc\Text_Tokenizer_Token('<arguments>', $result);
 1675:     }
 1676:     /* }}} */
 1677:     /* reduce_rule_27 {{{ */
 1678:     /**
 1679:      * Reduction function for rule 27 
 1680:      *
 1681:      * Rule 27 is:
 1682:      * <arguments>-><test>
 1683:      *
 1684:      * @param Text_Tokenizer_Token Token of type '<test>'
 1685:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<arguments>' token
 1686:      */
 1687:     protected function reduce_rule_27($test = null)
 1688:     {
 1689:             if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments-plus>', []);
 1690:         if (!isset($tests)) $tests = new \sergiosgc\Text_Tokenizer_Token('<test-list>', []);
 1691:         if (isset($test)) array_unshift($tests->getValue(), $test->getValue());
 1692:         $result = [ 'arguments' => $args->getValue(), 'tests' => $tests->getValue() ];
 1693:         return new \sergiosgc\Text_Tokenizer_Token('<arguments>', $result);
 1694:     }
 1695:     /* }}} */
 1696:     /* reduce_rule_28 {{{ */
 1697:     /**
 1698:      * Reduction function for rule 28 
 1699:      *
 1700:      * Rule 28 is:
 1701:      * <arguments>-><test-list>
 1702:      *
 1703:      * @param Text_Tokenizer_Token Token of type '<test-list>'
 1704:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<arguments>' token
 1705:      */
 1706:     protected function reduce_rule_28($tests = null)
 1707:     {
 1708:             if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments-plus>', []);
 1709:         if (!isset($tests)) $tests = new \sergiosgc\Text_Tokenizer_Token('<test-list>', []);
 1710:         if (isset($test)) array_unshift($tests->getValue(), $test->getValue());
 1711:         $result = [ 'arguments' => $args->getValue(), 'tests' => $tests->getValue() ];
 1712:         return new \sergiosgc\Text_Tokenizer_Token('<arguments>', $result);
 1713:     }
 1714:     /* }}} */
 1715:     /* reduce_rule_30 {{{ */
 1716:     /**
 1717:      * Reduction function for rule 30 
 1718:      *
 1719:      * Rule 30 is:
 1720:      * <arguments-plus>-><argument>
 1721:      *
 1722:      * @param Text_Tokenizer_Token Token of type '<argument>'
 1723:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<arguments-plus>' token
 1724:      */
 1725:     protected function reduce_rule_30($arg = null)
 1726:     {
 1727:             if (!isset($acc)) $acc = new \sergiosgc\Text_Tokenizer_Token('<arguments-plus>', []);
 1728:         array_push($acc->getValue(), $arg->getValue());
 1729:         return $acc;
 1730:         return new \sergiosgc\Text_Tokenizer_Token('<arguments-plus>', $result);
 1731:     }
 1732:     /* }}} */
 1733:     /* reduce_rule_36 {{{ */
 1734:     /**
 1735:      * Reduction function for rule 36 
 1736:      *
 1737:      * Rule 36 is:
 1738:      * <argument>-><string-list>
 1739:      *
 1740:      * @param Text_Tokenizer_Token Token of type '<string-list>'
 1741:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<argument>' token
 1742:      */
 1743:     protected function reduce_rule_36($arg = null)
 1744:     {
 1745:             if (isset($tag)) return new \sergiosgc\Text_Tokenizer_Token('<argument>', new \sergiosgc\Sieve_Parser\Script_Tag($tag->getValue()));
 1746:         $result = $arg->getValue();
 1747:         return new \sergiosgc\Text_Tokenizer_Token('<argument>', $result);
 1748:     }
 1749:     /* }}} */
 1750:     /* reduce_rule_37 {{{ */
 1751:     /**
 1752:      * Reduction function for rule 37 
 1753:      *
 1754:      * Rule 37 is:
 1755:      * <argument>-><number>
 1756:      *
 1757:      * @param Text_Tokenizer_Token Token of type '<number>'
 1758:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<argument>' token
 1759:      */
 1760:     protected function reduce_rule_37($arg = null)
 1761:     {
 1762:             if (isset($tag)) return new \sergiosgc\Text_Tokenizer_Token('<argument>', new \sergiosgc\Sieve_Parser\Script_Tag($tag->getValue()));
 1763:         $result = $arg->getValue();
 1764:         return new \sergiosgc\Text_Tokenizer_Token('<argument>', $result);
 1765:     }
 1766:     /* }}} */
 1767:     /* reduce_rule_38 {{{ */
 1768:     /**
 1769:      * Reduction function for rule 38 
 1770:      *
 1771:      * Rule 38 is:
 1772:      * <argument>-><tag>
 1773:      *
 1774:      * @param Text_Tokenizer_Token Token of type '<tag>'
 1775:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<argument>' token
 1776:      */
 1777:     protected function reduce_rule_38($tag = null)
 1778:     {
 1779:             if (isset($tag)) return new \sergiosgc\Text_Tokenizer_Token('<argument>', new \sergiosgc\Sieve_Parser\Script_Tag($tag->getValue()));
 1780:         $result = $arg->getValue();
 1781:         return new \sergiosgc\Text_Tokenizer_Token('<argument>', $result);
 1782:     }
 1783:     /* }}} */
 1784:     /* reduce_rule_6 {{{ */
 1785:     /**
 1786:      * Reduction function for rule 6 
 1787:      *
 1788:      * Rule 6 is:
 1789:      * <command>-><identifier-fileinto><string><semicolon>
 1790:      *
 1791:      * @param Text_Tokenizer_Token Token of type '<string>'
 1792:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
 1793:      */
 1794:     protected function reduce_rule_6($mailbox = null)
 1795:     {
 1796:             $result = new \sergiosgc\Sieve_Parser\Script_Command_Fileinto($mailbox->getValue());
 1797:         return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
 1798:     }
 1799:     /* }}} */
 1800:     /* reduce_rule_7 {{{ */
 1801:     /**
 1802:      * Reduction function for rule 7 
 1803:      *
 1804:      * Rule 7 is:
 1805:      * <command>-><identifier-redirect><string><semicolon>
 1806:      *
 1807:      * @param Text_Tokenizer_Token Token of type '<string>'
 1808:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
 1809:      */
 1810:     protected function reduce_rule_7($address = null)
 1811:     {
 1812:             $result = new \sergiosgc\Sieve_Parser\Script_Command_Redirect($address->getValue());
 1813:         return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
 1814:     }
 1815:     /* }}} */
 1816:     /* reduce_rule_10 {{{ */
 1817:     /**
 1818:      * Reduction function for rule 10 
 1819:      *
 1820:      * Rule 10 is:
 1821:      * <command>-><identifier-require><string-list><semicolon>
 1822:      *
 1823:      * @param Text_Tokenizer_Token Token of type '<string-list>'
 1824:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
 1825:      */
 1826:     protected function reduce_rule_10($capabilities = null)
 1827:     {
 1828:             $result = new \sergiosgc\Sieve_Parser\Script_Command_Require($capabilities->getValue());
 1829:         return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
 1830:     }
 1831:     /* }}} */
 1832:     /* reduce_rule_41 {{{ */
 1833:     /**
 1834:      * Reduction function for rule 41 
 1835:      *
 1836:      * Rule 41 is:
 1837:      * <string-plus-csv>-><string>
 1838:      *
 1839:      * @param Text_Tokenizer_Token Token of type '<string>'
 1840:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<string-plus-csv>' token
 1841:      */
 1842:     protected function reduce_rule_41($str = null)
 1843:     {
 1844:             if (!isset($acc)) $acc = new \sergiosgc\Text_Tokenizer_Token('<string-plus-csv>', []);
 1845:         array_unshift($acc->getValue(), $str->getValue());
 1846:         return $acc;
 1847:         return new \sergiosgc\Text_Tokenizer_Token('<string-plus-csv>', $result);
 1848:     }
 1849:     /* }}} */
 1850:     /* reduce_rule_31 {{{ */
 1851:     /**
 1852:      * Reduction function for rule 31 
 1853:      *
 1854:      * Rule 31 is:
 1855:      * <test>-><identifier><arguments>
 1856:      *
 1857:      * @param Text_Tokenizer_Token Token of type '<identifier>'
 1858:      * @param Text_Tokenizer_Token Token of type '<arguments>'
 1859:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<test>' token
 1860:      */
 1861:     protected function reduce_rule_31($id = null,$args = null)
 1862:     {
 1863:             if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments>', []);
 1864:         $result = new \sergiosgc\Sieve_Parser\Script_Test($id->getValue(), $args->getValue()['arguments']);
 1865:         return new \sergiosgc\Text_Tokenizer_Token('<test>', $result);
 1866:     }
 1867:     /* }}} */
 1868:     /* reduce_rule_18 {{{ */
 1869:     /**
 1870:      * Reduction function for rule 18 
 1871:      *
 1872:      * Rule 18 is:
 1873:      * <command>-><identifier><arguments><semicolon>
 1874:      *
 1875:      * @param Text_Tokenizer_Token Token of type '<identifier>'
 1876:      * @param Text_Tokenizer_Token Token of type '<arguments>'
 1877:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
 1878:      */
 1879:     protected function reduce_rule_18($id = null,$args = null)
 1880:     {
 1881:             if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments>', [ 'arguments' => [], 'tests' => [] ]);
 1882:         if (!isset($block)) $block = new \sergiosgc\Text_Tokenizer_Token('<block>', []);
 1883:         $result = new \sergiosgc\Sieve_Parser\Script_Command(
 1884:             $id->getValue(),
 1885:             $args->getValue()['arguments'],
 1886:             $args->getValue()['tests'],
 1887:             $block->getValue());
 1888:         return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
 1889:     }
 1890:     /* }}} */
 1891:     /* reduce_rule_21 {{{ */
 1892:     /**
 1893:      * Reduction function for rule 21 
 1894:      *
 1895:      * Rule 21 is:
 1896:      * <command>-><identifier><bracket-open><block>
 1897:      *
 1898:      * @param Text_Tokenizer_Token Token of type '<identifier>'
 1899:      * @param Text_Tokenizer_Token Token of type '<block>'
 1900:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
 1901:      */
 1902:     protected function reduce_rule_21($id = null,$block = null)
 1903:     {
 1904:             if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments>', [ 'arguments' => [], 'tests' => [] ]);
 1905:         if (!isset($block)) $block = new \sergiosgc\Text_Tokenizer_Token('<block>', []);
 1906:         $result = new \sergiosgc\Sieve_Parser\Script_Command(
 1907:             $id->getValue(),
 1908:             $args->getValue()['arguments'],
 1909:             $args->getValue()['tests'],
 1910:             $block->getValue());
 1911:         return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
 1912:     }
 1913:     /* }}} */
 1914:     /* reduce_rule_23 {{{ */
 1915:     /**
 1916:      * Reduction function for rule 23 
 1917:      *
 1918:      * Rule 23 is:
 1919:      * <block>-><bracket-close>
 1920:      *
 1921:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<block>' token
 1922:      */
 1923:     protected function reduce_rule_23()
 1924:     {
 1925:             if (!isset($acc)) $acc = new \sergiosgc\Text_Tokenizer_Token('<block>', []);
 1926:         if (isset($command)) array_unshift($acc->getValue(), $command->getValue());
 1927:         return $acc;
 1928:         return new \sergiosgc\Text_Tokenizer_Token('<block>', $result);
 1929:     }
 1930:     /* }}} */
 1931:     /* reduce_rule_25 {{{ */
 1932:     /**
 1933:      * Reduction function for rule 25 
 1934:      *
 1935:      * Rule 25 is:
 1936:      * <arguments>-><arguments-plus><test>
 1937:      *
 1938:      * @param Text_Tokenizer_Token Token of type '<arguments-plus>'
 1939:      * @param Text_Tokenizer_Token Token of type '<test>'
 1940:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<arguments>' token
 1941:      */
 1942:     protected function reduce_rule_25($args = null,$test = null)
 1943:     {
 1944:             if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments-plus>', []);
 1945:         if (!isset($tests)) $tests = new \sergiosgc\Text_Tokenizer_Token('<test-list>', []);
 1946:         if (isset($test)) array_unshift($tests->getValue(), $test->getValue());
 1947:         $result = [ 'arguments' => $args->getValue(), 'tests' => $tests->getValue() ];
 1948:         return new \sergiosgc\Text_Tokenizer_Token('<arguments>', $result);
 1949:     }
 1950:     /* }}} */
 1951:     /* reduce_rule_26 {{{ */
 1952:     /**
 1953:      * Reduction function for rule 26 
 1954:      *
 1955:      * Rule 26 is:
 1956:      * <arguments>-><arguments-plus><test-list>
 1957:      *
 1958:      * @param Text_Tokenizer_Token Token of type '<arguments-plus>'
 1959:      * @param Text_Tokenizer_Token Token of type '<test-list>'
 1960:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<arguments>' token
 1961:      */
 1962:     protected function reduce_rule_26($args = null,$tests = null)
 1963:     {
 1964:             if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments-plus>', []);
 1965:         if (!isset($tests)) $tests = new \sergiosgc\Text_Tokenizer_Token('<test-list>', []);
 1966:         if (isset($test)) array_unshift($tests->getValue(), $test->getValue());
 1967:         $result = [ 'arguments' => $args->getValue(), 'tests' => $tests->getValue() ];
 1968:         return new \sergiosgc\Text_Tokenizer_Token('<arguments>', $result);
 1969:     }
 1970:     /* }}} */
 1971:     /* reduce_rule_29 {{{ */
 1972:     /**
 1973:      * Reduction function for rule 29 
 1974:      *
 1975:      * Rule 29 is:
 1976:      * <arguments-plus>-><arguments-plus><argument>
 1977:      *
 1978:      * @param Text_Tokenizer_Token Token of type '<arguments-plus>'
 1979:      * @param Text_Tokenizer_Token Token of type '<argument>'
 1980:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<arguments-plus>' token
 1981:      */
 1982:     protected function reduce_rule_29($acc = null,$arg = null)
 1983:     {
 1984:             if (!isset($acc)) $acc = new \sergiosgc\Text_Tokenizer_Token('<arguments-plus>', []);
 1985:         array_push($acc->getValue(), $arg->getValue());
 1986:         return $acc;
 1987:         return new \sergiosgc\Text_Tokenizer_Token('<arguments-plus>', $result);
 1988:     }
 1989:     /* }}} */
 1990:     /* reduce_rule_34 {{{ */
 1991:     /**
 1992:      * Reduction function for rule 34 
 1993:      *
 1994:      * Rule 34 is:
 1995:      * <test-plus-csv>-><test>
 1996:      *
 1997:      * @param Text_Tokenizer_Token Token of type '<test>'
 1998:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<test-plus-csv>' token
 1999:      */
 2000:     protected function reduce_rule_34($test = null)
 2001:     {
 2002:             if (!isset($acc)) $acc = new \sergiosgc\Text_Tokenizer_Token('<test-plus-csv>', []);
 2003:         array_unshift($acc->getValue(), $test->getValue());
 2004:         return $acc;
 2005:         return new \sergiosgc\Text_Tokenizer_Token('<test-plus-csv>', $result);
 2006:     }
 2007:     /* }}} */
 2008:     /* reduce_rule_39 {{{ */
 2009:     /**
 2010:      * Reduction function for rule 39 
 2011:      *
 2012:      * Rule 39 is:
 2013:      * <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close>
 2014:      *
 2015:      * @param Text_Tokenizer_Token Token of type '<string-plus-csv>'
 2016:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<string-list>' token
 2017:      */
 2018:     protected function reduce_rule_39($strArr = null)
 2019:     {
 2020:             if (isset($str)) return new \sergiosgc\Text_Tokenizer_Token('<string-list>', $str->getValue());
 2021:         return new \sergiosgc\Text_Tokenizer_Token('<string-list>', $strArr->getValue());
 2022:         return new \sergiosgc\Text_Tokenizer_Token('<string-list>', $result);
 2023:     }
 2024:     /* }}} */
 2025:     /* reduce_rule_11 {{{ */
 2026:     /**
 2027:      * Reduction function for rule 11 
 2028:      *
 2029:      * Rule 11 is:
 2030:      * <command>-><identifier-if><test><bracket-open><block>
 2031:      *
 2032:      * @param Text_Tokenizer_Token Token of type '<test>'
 2033:      * @param Text_Tokenizer_Token Token of type '<block>'
 2034:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
 2035:      */
 2036:     protected function reduce_rule_11($test = null,$block = null)
 2037:     {
 2038:             $result = isset($else) ? $else->getValue() : [];
 2039:         array_unshift($result, [ 'test' => $test->getValue(), 'commands' => $block->getValue() ]);
 2040:         $result = new \sergiosgc\Sieve_Parser\Script_Command_If($result);
 2041:         return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
 2042:     }
 2043:     /* }}} */
 2044:     /* reduce_rule_19 {{{ */
 2045:     /**
 2046:      * Reduction function for rule 19 
 2047:      *
 2048:      * Rule 19 is:
 2049:      * <command>-><identifier><arguments><bracket-open><block>
 2050:      *
 2051:      * @param Text_Tokenizer_Token Token of type '<identifier>'
 2052:      * @param Text_Tokenizer_Token Token of type '<arguments>'
 2053:      * @param Text_Tokenizer_Token Token of type '<block>'
 2054:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
 2055:      */
 2056:     protected function reduce_rule_19($id = null,$args = null,$block = null)
 2057:     {
 2058:             if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments>', [ 'arguments' => [], 'tests' => [] ]);
 2059:         if (!isset($block)) $block = new \sergiosgc\Text_Tokenizer_Token('<block>', []);
 2060:         $result = new \sergiosgc\Sieve_Parser\Script_Command(
 2061:             $id->getValue(),
 2062:             $args->getValue()['arguments'],
 2063:             $args->getValue()['tests'],
 2064:             $block->getValue());
 2065:         return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
 2066:     }
 2067:     /* }}} */
 2068:     /* reduce_rule_22 {{{ */
 2069:     /**
 2070:      * Reduction function for rule 22 
 2071:      *
 2072:      * Rule 22 is:
 2073:      * <block>-><command><block>
 2074:      *
 2075:      * @param Text_Tokenizer_Token Token of type '<command>'
 2076:      * @param Text_Tokenizer_Token Token of type '<block>'
 2077:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<block>' token
 2078:      */
 2079:     protected function reduce_rule_22($command = null,$acc = null)
 2080:     {
 2081:             if (!isset($acc)) $acc = new \sergiosgc\Text_Tokenizer_Token('<block>', []);
 2082:         if (isset($command)) array_unshift($acc->getValue(), $command->getValue());
 2083:         return $acc;
 2084:         return new \sergiosgc\Text_Tokenizer_Token('<block>', $result);
 2085:     }
 2086:     /* }}} */
 2087:     /* reduce_rule_33 {{{ */
 2088:     /**
 2089:      * Reduction function for rule 33 
 2090:      *
 2091:      * Rule 33 is:
 2092:      * <test-list>-><parenthesis-open><test-plus-csv><parenthesis-close>
 2093:      *
 2094:      * @param Text_Tokenizer_Token Token of type '<test-plus-csv>'
 2095:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<test-list>' token
 2096:      */
 2097:     protected function reduce_rule_33($tests = null)
 2098:     {
 2099:             $result = $tests->getValue();
 2100:         return new \sergiosgc\Text_Tokenizer_Token('<test-list>', $result);
 2101:     }
 2102:     /* }}} */
 2103:     /* reduce_rule_42 {{{ */
 2104:     /**
 2105:      * Reduction function for rule 42 
 2106:      *
 2107:      * Rule 42 is:
 2108:      * <string-plus-csv>-><string-plus-csv><comma><string>
 2109:      *
 2110:      * @param Text_Tokenizer_Token Token of type '<string-plus-csv>'
 2111:      * @param Text_Tokenizer_Token Token of type '<string>'
 2112:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<string-plus-csv>' token
 2113:      */
 2114:     protected function reduce_rule_42($acc = null,$str = null)
 2115:     {
 2116:             if (!isset($acc)) $acc = new \sergiosgc\Text_Tokenizer_Token('<string-plus-csv>', []);
 2117:         array_unshift($acc->getValue(), $str->getValue());
 2118:         return $acc;
 2119:         return new \sergiosgc\Text_Tokenizer_Token('<string-plus-csv>', $result);
 2120:     }
 2121:     /* }}} */
 2122:     /* reduce_rule_12 {{{ */
 2123:     /**
 2124:      * Reduction function for rule 12 
 2125:      *
 2126:      * Rule 12 is:
 2127:      * <command>-><identifier-if><test><bracket-open><block><command-elsif>
 2128:      *
 2129:      * @param Text_Tokenizer_Token Token of type '<test>'
 2130:      * @param Text_Tokenizer_Token Token of type '<block>'
 2131:      * @param Text_Tokenizer_Token Token of type '<command-elsif>'
 2132:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
 2133:      */
 2134:     protected function reduce_rule_12($test = null,$block = null,$else = null)
 2135:     {
 2136:             $result = isset($else) ? $else->getValue() : [];
 2137:         array_unshift($result, [ 'test' => $test->getValue(), 'commands' => $block->getValue() ]);
 2138:         $result = new \sergiosgc\Sieve_Parser\Script_Command_If($result);
 2139:         return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
 2140:     }
 2141:     /* }}} */
 2142:     /* reduce_rule_13 {{{ */
 2143:     /**
 2144:      * Reduction function for rule 13 
 2145:      *
 2146:      * Rule 13 is:
 2147:      * <command>-><identifier-if><test><bracket-open><block><command-else>
 2148:      *
 2149:      * @param Text_Tokenizer_Token Token of type '<test>'
 2150:      * @param Text_Tokenizer_Token Token of type '<block>'
 2151:      * @param Text_Tokenizer_Token Token of type '<command-else>'
 2152:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
 2153:      */
 2154:     protected function reduce_rule_13($test = null,$block = null,$else = null)
 2155:     {
 2156:             $result = isset($else) ? $else->getValue() : [];
 2157:         array_unshift($result, [ 'test' => $test->getValue(), 'commands' => $block->getValue() ]);
 2158:         $result = new \sergiosgc\Sieve_Parser\Script_Command_If($result);
 2159:         return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
 2160:     }
 2161:     /* }}} */
 2162:     /* reduce_rule_35 {{{ */
 2163:     /**
 2164:      * Reduction function for rule 35 
 2165:      *
 2166:      * Rule 35 is:
 2167:      * <test-plus-csv>-><test><comma><test-plus-csv>
 2168:      *
 2169:      * @param Text_Tokenizer_Token Token of type '<test>'
 2170:      * @param Text_Tokenizer_Token Token of type '<test-plus-csv>'
 2171:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<test-plus-csv>' token
 2172:      */
 2173:     protected function reduce_rule_35($test = null,$acc = null)
 2174:     {
 2175:             if (!isset($acc)) $acc = new \sergiosgc\Text_Tokenizer_Token('<test-plus-csv>', []);
 2176:         array_unshift($acc->getValue(), $test->getValue());
 2177:         return $acc;
 2178:         return new \sergiosgc\Text_Tokenizer_Token('<test-plus-csv>', $result);
 2179:     }
 2180:     /* }}} */
 2181:     /* reduce_rule_17 {{{ */
 2182:     /**
 2183:      * Reduction function for rule 17 
 2184:      *
 2185:      * Rule 17 is:
 2186:      * <command-else>-><identifier-else><bracket-open><block>
 2187:      *
 2188:      * @param Text_Tokenizer_Token Token of type '<block>'
 2189:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command-else>' token
 2190:      */
 2191:     protected function reduce_rule_17($block = null)
 2192:     {
 2193:             $result = [[ 'test' => null, 'commands' => $block->getValue() ]];
 2194:         return new \sergiosgc\Text_Tokenizer_Token('<command-else>', $result);
 2195:     }
 2196:     /* }}} */
 2197:     /* reduce_rule_14 {{{ */
 2198:     /**
 2199:      * Reduction function for rule 14 
 2200:      *
 2201:      * Rule 14 is:
 2202:      * <command-elsif>-><identifier-elsif><test><bracket-open><block>
 2203:      *
 2204:      * @param Text_Tokenizer_Token Token of type '<test>'
 2205:      * @param Text_Tokenizer_Token Token of type '<block>'
 2206:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command-elsif>' token
 2207:      */
 2208:     protected function reduce_rule_14($test = null,$block = null)
 2209:     {
 2210:             $result = isset($else) ? $else->getValue() : [];
 2211:         array_unshift($result, [ 'test' => $test->getValue(), 'commands' => $block->getValue() ]);
 2212:         return new \sergiosgc\Text_Tokenizer_Token('<command-elsif>', $result);
 2213:     }
 2214:     /* }}} */
 2215:     /* reduce_rule_15 {{{ */
 2216:     /**
 2217:      * Reduction function for rule 15 
 2218:      *
 2219:      * Rule 15 is:
 2220:      * <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif>
 2221:      *
 2222:      * @param Text_Tokenizer_Token Token of type '<test>'
 2223:      * @param Text_Tokenizer_Token Token of type '<block>'
 2224:      * @param Text_Tokenizer_Token Token of type '<command-elsif>'
 2225:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command-elsif>' token
 2226:      */
 2227:     protected function reduce_rule_15($test = null,$block = null,$else = null)
 2228:     {
 2229:             $result = isset($else) ? $else->getValue() : [];
 2230:         array_unshift($result, [ 'test' => $test->getValue(), 'commands' => $block->getValue() ]);
 2231:         return new \sergiosgc\Text_Tokenizer_Token('<command-elsif>', $result);
 2232:     }
 2233:     /* }}} */
 2234:     /* reduce_rule_16 {{{ */
 2235:     /**
 2236:      * Reduction function for rule 16 
 2237:      *
 2238:      * Rule 16 is:
 2239:      * <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else>
 2240:      *
 2241:      * @param Text_Tokenizer_Token Token of type '<test>'
 2242:      * @param Text_Tokenizer_Token Token of type '<block>'
 2243:      * @param Text_Tokenizer_Token Token of type '<command-else>'
 2244:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command-elsif>' token
 2245:      */
 2246:     protected function reduce_rule_16($test = null,$block = null,$else = null)
 2247:     {
 2248:             $result = isset($else) ? $else->getValue() : [];
 2249:         array_unshift($result, [ 'test' => $test->getValue(), 'commands' => $block->getValue() ]);
 2250:         return new \sergiosgc\Text_Tokenizer_Token('<command-elsif>', $result);
 2251:     }
 2252:     /* }}} */
 2253: }
Read token <hash-comment>( A line
) state []
-Shifting to state 14

Read token <hash-comment>( Requires
) state [14]
-Reducing using reduce_rule_47 state [14] Result state [5]
-Reducing using reduce_rule_46 state [5] Result state [3]
-Shifting to state 14

Read token <identifier-require>(require) state [3 14]
-Reducing using reduce_rule_47 state [3 14] Result state [3 18]
-Reducing using reduce_rule_45 state [3 18] Result state [3]
-Shifting to state 11

Read token <square-parenthesis-open>( [) state [3 11]
-Shifting to state 27

Read token <quoted-string>(fileinto) state [3 11 27]
-Shifting to state 21

Read token <comma>(,) state [3 11 27 21]
-Reducing using reduce_rule_43 state [3 11 27 21] Result state [3 11 27 46]
-Reducing using reduce_rule_41 state [3 11 27 46] Result state [3 11 27 45]
-Shifting to state 60

Read token <quoted-string>(imap4flags) state [3 11 27 45 60]
-Shifting to state 21

Read token <square-parenthesis-close>(]) state [3 11 27 45 60 21]
-Reducing using reduce_rule_43 state [3 11 27 45 60 21] Result state [3 11 27 45 60 66]
-Reducing using reduce_rule_42 state [3 11 27 45 60 66] Result state [3 11 27 45]
-Shifting to state 59

Read token <semicolon>(;) state [3 11 27 45 59]
-Reducing using reduce_rule_39 state [3 11 27 45 59] Result state [3 11 26]
-Shifting to state 44

Read token <hash-comment>( Whitelist addresses
) state [3 11 26 44]
-Reducing using reduce_rule_10 state [3 11 26 44] Result state [3 17]
-Reducing using reduce_rule_3 state [3 17] Result state [2]
-Reducing using reduce_rule_2 state [2] Result state [1]
-Shifting to state 14

Read token <identifier-if>(if) state [1 14]
-Reducing using reduce_rule_47 state [1 14] Result state [1 5]
-Reducing using reduce_rule_46 state [1 5] Result state [1 3]
-Shifting to state 12

Read token <identifier>(address) state [1 3 12]
-Shifting to state 30

Read token <tag>(all) state [1 3 12 30]
-Shifting to state 41

Read token <tag>(comparator) state [1 3 12 30 41]
-Reducing using reduce_rule_38 state [1 3 12 30 41] Result state [1 3 12 30 37]
-Reducing using reduce_rule_30 state [1 3 12 30 37] Result state [1 3 12 30 34]
-Shifting to state 41

Read token <quoted-string>(i;ascii-casemap) state [1 3 12 30 34 41]
-Reducing using reduce_rule_38 state [1 3 12 30 34 41] Result state [1 3 12 30 34 56]
-Reducing using reduce_rule_29 state [1 3 12 30 34 56] Result state [1 3 12 30 34]
-Shifting to state 21

Read token <tag>(is) state [1 3 12 30 34 21]
-Reducing using reduce_rule_43 state [1 3 12 30 34 21] Result state [1 3 12 30 34 28]
-Reducing using reduce_rule_40 state [1 3 12 30 34 28] Result state [1 3 12 30 34 39]
-Reducing using reduce_rule_36 state [1 3 12 30 34 39] Result state [1 3 12 30 34 56]
-Reducing using reduce_rule_29 state [1 3 12 30 34 56] Result state [1 3 12 30 34]
-Shifting to state 41

Read token <square-parenthesis-open>( [) state [1 3 12 30 34 41]
-Reducing using reduce_rule_38 state [1 3 12 30 34 41] Result state [1 3 12 30 34 56]
-Reducing using reduce_rule_29 state [1 3 12 30 34 56] Result state [1 3 12 30 34]
-Shifting to state 27

Read token <quoted-string>(From) state [1 3 12 30 34 27]
-Shifting to state 21

Read token <comma>(,) state [1 3 12 30 34 27 21]
-Reducing using reduce_rule_43 state [1 3 12 30 34 27 21] Result state [1 3 12 30 34 27 46]
-Reducing using reduce_rule_41 state [1 3 12 30 34 27 46] Result state [1 3 12 30 34 27 45]
-Shifting to state 60

Read token <quoted-string>(Sender) state [1 3 12 30 34 27 45 60]
-Shifting to state 21

Read token <comma>(,) state [1 3 12 30 34 27 45 60 21]
-Reducing using reduce_rule_43 state [1 3 12 30 34 27 45 60 21] Result state [1 3 12 30 34 27 45 60 66]
-Reducing using reduce_rule_42 state [1 3 12 30 34 27 45 60 66] Result state [1 3 12 30 34 27 45]
-Shifting to state 60

Read token <quoted-string>(Resent-From) state [1 3 12 30 34 27 45 60]
-Shifting to state 21

Read token <square-parenthesis-close>(]) state [1 3 12 30 34 27 45 60 21]
-Reducing using reduce_rule_43 state [1 3 12 30 34 27 45 60 21] Result state [1 3 12 30 34 27 45 60 66]
-Reducing using reduce_rule_42 state [1 3 12 30 34 27 45 60 66] Result state [1 3 12 30 34 27 45]
-Shifting to state 59

Read token <square-parenthesis-open>( [) state [1 3 12 30 34 27 45 59]
-Reducing using reduce_rule_39 state [1 3 12 30 34 27 45 59] Result state [1 3 12 30 34 39]
-Reducing using reduce_rule_36 state [1 3 12 30 34 39] Result state [1 3 12 30 34 56]
-Reducing using reduce_rule_29 state [1 3 12 30 34 56] Result state [1 3 12 30 34]
-Shifting to state 27

Read token <quoted-string>(example@gmail.com.example.com) state [1 3 12 30 34 27]
-Shifting to state 21

Read token <comma>(,) state [1 3 12 30 34 27 21]
-Reducing using reduce_rule_43 state [1 3 12 30 34 27 21] Result state [1 3 12 30 34 27 46]
-Reducing using reduce_rule_41 state [1 3 12 30 34 27 46] Result state [1 3 12 30 34 27 45]
-Shifting to state 60

Read token <quoted-string>(example2@gmail.com.example.com) state [1 3 12 30 34 27 45 60]
-Shifting to state 21

Read token <square-parenthesis-close>(]) state [1 3 12 30 34 27 45 60 21]
-Reducing using reduce_rule_43 state [1 3 12 30 34 27 45 60 21] Result state [1 3 12 30 34 27 45 60 66]
-Reducing using reduce_rule_42 state [1 3 12 30 34 27 45 60 66] Result state [1 3 12 30 34 27 45]
-Shifting to state 59

Read token <bracket-open>(  {) state [1 3 12 30 34 27 45 59]
-Reducing using reduce_rule_39 state [1 3 12 30 34 27 45 59] Result state [1 3 12 30 34 39]
-Reducing using reduce_rule_36 state [1 3 12 30 34 39] Result state [1 3 12 30 34 56]
-Reducing using reduce_rule_29 state [1 3 12 30 34 56] Result state [1 3 12 30 34]
-Reducing using reduce_rule_24 state [1 3 12 30 34] Result state [1 3 12 30 48]
-Reducing using reduce_rule_31 state [1 3 12 30 48] Result state [1 3 12 29]
-Shifting to state 47

Read token <identifier-keep>(keep) state [1 3 12 29 47]
-Shifting to state 9

Read token <semicolon>(;) state [1 3 12 29 47 9]
-Shifting to state 24

Read token <identifier-stop>(stop) state [1 3 12 29 47 9 24]
-Reducing using reduce_rule_8 state [1 3 12 29 47 9 24] Result state [1 3 12 29 47 52]
-Shifting to state 6

Read token <semicolon>(;) state [1 3 12 29 47 52 6]
-Shifting to state 19

Read token <bracket-close>(
}) state [1 3 12 29 47 52 6 19]
-Reducing using reduce_rule_5 state [1 3 12 29 47 52 6 19] Result state [1 3 12 29 47 52 52]
-Shifting to state 53

Read token <hash-comment>( Database backup checker
) state [1 3 12 29 47 52 52 53]
-Reducing using reduce_rule_23 state [1 3 12 29 47 52 52 53] Result state [1 3 12 29 47 52 52 63]
-Reducing using reduce_rule_22 state [1 3 12 29 47 52 52 63] Result state [1 3 12 29 47 52 63]
-Reducing using reduce_rule_22 state [1 3 12 29 47 52 63] Result state [1 3 12 29 47 61]
-Reducing using reduce_rule_11 state [1 3 12 29 47 61] Result state [1 3 17]
-Reducing using reduce_rule_3 state [1 3 17] Result state [1 16]
-Reducing using reduce_rule_1 state [1 16] Result state [1]
-Shifting to state 14

Read token <identifier-if>(if) state [1 14]
-Reducing using reduce_rule_47 state [1 14] Result state [1 5]
-Reducing using reduce_rule_46 state [1 5] Result state [1 3]
-Shifting to state 12

Read token <identifier>(anyof) state [1 3 12]
-Shifting to state 30

Read token <parenthesis-open>( () state [1 3 12 30]
-Shifting to state 38

Read token <identifier>(header) state [1 3 12 30 38]
-Shifting to state 30

Read token <tag>(comparator) state [1 3 12 30 38 30]
-Shifting to state 41

Read token <quoted-string>(i;ascii-casemap) state [1 3 12 30 38 30 41]
-Reducing using reduce_rule_38 state [1 3 12 30 38 30 41] Result state [1 3 12 30 38 30 37]
-Reducing using reduce_rule_30 state [1 3 12 30 38 30 37] Result state [1 3 12 30 38 30 34]
-Shifting to state 21

Read token <tag>(contains) state [1 3 12 30 38 30 34 21]
-Reducing using reduce_rule_43 state [1 3 12 30 38 30 34 21] Result state [1 3 12 30 38 30 34 28]
-Reducing using reduce_rule_40 state [1 3 12 30 38 30 34 28] Result state [1 3 12 30 38 30 34 39]
-Reducing using reduce_rule_36 state [1 3 12 30 38 30 34 39] Result state [1 3 12 30 38 30 34 56]
-Reducing using reduce_rule_29 state [1 3 12 30 38 30 34 56] Result state [1 3 12 30 38 30 34]
-Shifting to state 41

Read token <quoted-string>(Subject) state [1 3 12 30 38 30 34 41]
-Reducing using reduce_rule_38 state [1 3 12 30 38 30 34 41] Result state [1 3 12 30 38 30 34 56]
-Reducing using reduce_rule_29 state [1 3 12 30 38 30 34 56] Result state [1 3 12 30 38 30 34]
-Shifting to state 21

Read token <quoted-string>(Database backup incomplete) state [1 3 12 30 38 30 34 21]
-Reducing using reduce_rule_43 state [1 3 12 30 38 30 34 21] Result state [1 3 12 30 38 30 34 28]
-Reducing using reduce_rule_40 state [1 3 12 30 38 30 34 28] Result state [1 3 12 30 38 30 34 39]
-Reducing using reduce_rule_36 state [1 3 12 30 38 30 34 39] Result state [1 3 12 30 38 30 34 56]
-Reducing using reduce_rule_29 state [1 3 12 30 38 30 34 56] Result state [1 3 12 30 38 30 34]
-Shifting to state 21

Read token <comma>(,) state [1 3 12 30 38 30 34 21]
-Reducing using reduce_rule_43 state [1 3 12 30 38 30 34 21] Result state [1 3 12 30 38 30 34 28]
-Reducing using reduce_rule_40 state [1 3 12 30 38 30 34 28] Result state [1 3 12 30 38 30 34 39]
-Reducing using reduce_rule_36 state [1 3 12 30 38 30 34 39] Result state [1 3 12 30 38 30 34 56]
-Reducing using reduce_rule_29 state [1 3 12 30 38 30 34 56] Result state [1 3 12 30 38 30 34]
-Reducing using reduce_rule_24 state [1 3 12 30 38 30 34] Result state [1 3 12 30 38 30 48]
-Reducing using reduce_rule_31 state [1 3 12 30 38 30 48] Result state [1 3 12 30 38 58]
-Shifting to state 65

Read token <identifier>(header) state [1 3 12 30 38 58 65]
-Shifting to state 30

Read token <tag>(comparator) state [1 3 12 30 38 58 65 30]
-Shifting to state 41

Read token <quoted-string>(i;ascii-casemap) state [1 3 12 30 38 58 65 30 41]
-Reducing using reduce_rule_38 state [1 3 12 30 38 58 65 30 41] Result state [1 3 12 30 38 58 65 30 37]
-Reducing using reduce_rule_30 state [1 3 12 30 38 58 65 30 37] Result state [1 3 12 30 38 58 65 30 34]
-Shifting to state 21

Read token <tag>(contains) state [1 3 12 30 38 58 65 30 34 21]
-Reducing using reduce_rule_43 state [1 3 12 30 38 58 65 30 34 21] Result state [1 3 12 30 38 58 65 30 34 28]
-Reducing using reduce_rule_40 state [1 3 12 30 38 58 65 30 34 28] Result state [1 3 12 30 38 58 65 30 34 39]
-Reducing using reduce_rule_36 state [1 3 12 30 38 58 65 30 34 39] Result state [1 3 12 30 38 58 65 30 34 56]
-Reducing using reduce_rule_29 state [1 3 12 30 38 58 65 30 34 56] Result state [1 3 12 30 38 58 65 30 34]
-Shifting to state 41

Read token <quoted-string>(Subject) state [1 3 12 30 38 58 65 30 34 41]
-Reducing using reduce_rule_38 state [1 3 12 30 38 58 65 30 34 41] Result state [1 3 12 30 38 58 65 30 34 56]
-Reducing using reduce_rule_29 state [1 3 12 30 38 58 65 30 34 56] Result state [1 3 12 30 38 58 65 30 34]
-Shifting to state 21

Read token <quoted-string>(Database backup missing) state [1 3 12 30 38 58 65 30 34 21]
-Reducing using reduce_rule_43 state [1 3 12 30 38 58 65 30 34 21] Result state [1 3 12 30 38 58 65 30 34 28]
-Reducing using reduce_rule_40 state [1 3 12 30 38 58 65 30 34 28] Result state [1 3 12 30 38 58 65 30 34 39]
-Reducing using reduce_rule_36 state [1 3 12 30 38 58 65 30 34 39] Result state [1 3 12 30 38 58 65 30 34 56]
-Reducing using reduce_rule_29 state [1 3 12 30 38 58 65 30 34 56] Result state [1 3 12 30 38 58 65 30 34]
-Shifting to state 21

Read token <parenthesis-close>( )) state [1 3 12 30 38 58 65 30 34 21]
-Reducing using reduce_rule_43 state [1 3 12 30 38 58 65 30 34 21] Result state [1 3 12 30 38 58 65 30 34 28]
-Reducing using reduce_rule_40 state [1 3 12 30 38 58 65 30 34 28] Result state [1 3 12 30 38 58 65 30 34 39]
-Reducing using reduce_rule_36 state [1 3 12 30 38 58 65 30 34 39] Result state [1 3 12 30 38 58 65 30 34 56]
-Reducing using reduce_rule_29 state [1 3 12 30 38 58 65 30 34 56] Result state [1 3 12 30 38 58 65 30 34]
-Reducing using reduce_rule_24 state [1 3 12 30 38 58 65 30 34] Result state [1 3 12 30 38 58 65 30 48]
-Reducing using reduce_rule_31 state [1 3 12 30 38 58 65 30 48] Result state [1 3 12 30 38 58 65 58]
-Reducing using reduce_rule_34 state [1 3 12 30 38 58 65 58] Result state [1 3 12 30 38 58 65 71]
-Reducing using reduce_rule_35 state [1 3 12 30 38 58 65 71] Result state [1 3 12 30 38 57]
-Shifting to state 64

Read token <bracket-open>( {) state [1 3 12 30 38 57 64]
-Reducing using reduce_rule_33 state [1 3 12 30 38 57 64] Result state [1 3 12 30 36]
-Reducing using reduce_rule_28 state [1 3 12 30 36] Result state [1 3 12 30 48]
-Reducing using reduce_rule_31 state [1 3 12 30 48] Result state [1 3 12 29]
-Shifting to state 47

Read token <identifier-keep>(keep) state [1 3 12 29 47]
-Shifting to state 9

Read token <semicolon>(;) state [1 3 12 29 47 9]
-Shifting to state 24

Read token <identifier-stop>(stop) state [1 3 12 29 47 9 24]
-Reducing using reduce_rule_8 state [1 3 12 29 47 9 24] Result state [1 3 12 29 47 52]
-Shifting to state 6

Read token <semicolon>(;) state [1 3 12 29 47 52 6]
-Shifting to state 19

Read token <bracket-close>(
}) state [1 3 12 29 47 52 6 19]
-Reducing using reduce_rule_5 state [1 3 12 29 47 52 6 19] Result state [1 3 12 29 47 52 52]
-Shifting to state 53

Read token <hash-comment>( Verbose crons
) state [1 3 12 29 47 52 52 53]
-Reducing using reduce_rule_23 state [1 3 12 29 47 52 52 53] Result state [1 3 12 29 47 52 52 63]
-Reducing using reduce_rule_22 state [1 3 12 29 47 52 52 63] Result state [1 3 12 29 47 52 63]
-Reducing using reduce_rule_22 state [1 3 12 29 47 52 63] Result state [1 3 12 29 47 61]
-Reducing using reduce_rule_11 state [1 3 12 29 47 61] Result state [1 3 17]
-Reducing using reduce_rule_3 state [1 3 17] Result state [1 16]
-Reducing using reduce_rule_1 state [1 16] Result state [1]
-Shifting to state 14

Read token <identifier-if>(if) state [1 14]
-Reducing using reduce_rule_47 state [1 14] Result state [1 5]
-Reducing using reduce_rule_46 state [1 5] Result state [1 3]
-Shifting to state 12

Read token <identifier>(anyof) state [1 3 12]
-Shifting to state 30

Read token <parenthesis-open>( () state [1 3 12 30]
-Shifting to state 38

Read token <identifier>(header) state [1 3 12 30 38]
-Shifting to state 30

Read token <tag>(comparator) state [1 3 12 30 38 30]
-Shifting to state 41

Read token <quoted-string>(i;octet) state [1 3 12 30 38 30 41]
-Reducing using reduce_rule_38 state [1 3 12 30 38 30 41] Result state [1 3 12 30 38 30 37]
-Reducing using reduce_rule_30 state [1 3 12 30 38 30 37] Result state [1 3 12 30 38 30 34]
-Shifting to state 21

Read token <tag>(contains) state [1 3 12 30 38 30 34 21]
-Reducing using reduce_rule_43 state [1 3 12 30 38 30 34 21] Result state [1 3 12 30 38 30 34 28]
-Reducing using reduce_rule_40 state [1 3 12 30 38 30 34 28] Result state [1 3 12 30 38 30 34 39]
-Reducing using reduce_rule_36 state [1 3 12 30 38 30 34 39] Result state [1 3 12 30 38 30 34 56]
-Reducing using reduce_rule_29 state [1 3 12 30 38 30 34 56] Result state [1 3 12 30 38 30 34]
-Shifting to state 41

Read token <quoted-string>(Subject) state [1 3 12 30 38 30 34 41]
-Reducing using reduce_rule_38 state [1 3 12 30 38 30 34 41] Result state [1 3 12 30 38 30 34 56]
-Reducing using reduce_rule_29 state [1 3 12 30 38 30 34 56] Result state [1 3 12 30 38 30 34]
-Shifting to state 21

Read token <quoted-string>(cron) state [1 3 12 30 38 30 34 21]
-Reducing using reduce_rule_43 state [1 3 12 30 38 30 34 21] Result state [1 3 12 30 38 30 34 28]
-Reducing using reduce_rule_40 state [1 3 12 30 38 30 34 28] Result state [1 3 12 30 38 30 34 39]
-Reducing using reduce_rule_36 state [1 3 12 30 38 30 34 39] Result state [1 3 12 30 38 30 34 56]
-Reducing using reduce_rule_29 state [1 3 12 30 38 30 34 56] Result state [1 3 12 30 38 30 34]
-Shifting to state 21

Read token <comma>(,) state [1 3 12 30 38 30 34 21]
-Reducing using reduce_rule_43 state [1 3 12 30 38 30 34 21] Result state [1 3 12 30 38 30 34 28]
-Reducing using reduce_rule_40 state [1 3 12 30 38 30 34 28] Result state [1 3 12 30 38 30 34 39]
-Reducing using reduce_rule_36 state [1 3 12 30 38 30 34 39] Result state [1 3 12 30 38 30 34 56]
-Reducing using reduce_rule_29 state [1 3 12 30 38 30 34 56] Result state [1 3 12 30 38 30 34]
-Reducing using reduce_rule_24 state [1 3 12 30 38 30 34] Result state [1 3 12 30 38 30 48]
-Reducing using reduce_rule_31 state [1 3 12 30 38 30 48] Result state [1 3 12 30 38 58]
-Shifting to state 65

Read token <identifier>(header) state [1 3 12 30 38 58 65]
-Shifting to state 30

Read token <tag>(comparator) state [1 3 12 30 38 58 65 30]
-Shifting to state 41

Read token <quoted-string>(i;ascii-casemap) state [1 3 12 30 38 58 65 30 41]
-Reducing using reduce_rule_38 state [1 3 12 30 38 58 65 30 41] Result state [1 3 12 30 38 58 65 30 37]
-Reducing using reduce_rule_30 state [1 3 12 30 38 58 65 30 37] Result state [1 3 12 30 38 58 65 30 34]
-Shifting to state 21

Read token <tag>(is) state [1 3 12 30 38 58 65 30 34 21]
-Reducing using reduce_rule_43 state [1 3 12 30 38 58 65 30 34 21] Result state [1 3 12 30 38 58 65 30 34 28]
-Reducing using reduce_rule_40 state [1 3 12 30 38 58 65 30 34 28] Result state [1 3 12 30 38 58 65 30 34 39]
-Reducing using reduce_rule_36 state [1 3 12 30 38 58 65 30 34 39] Result state [1 3 12 30 38 58 65 30 34 56]
-Reducing using reduce_rule_29 state [1 3 12 30 38 58 65 30 34 56] Result state [1 3 12 30 38 58 65 30 34]
-Shifting to state 41

Read token <quoted-string>(Subject) state [1 3 12 30 38 58 65 30 34 41]
-Reducing using reduce_rule_38 state [1 3 12 30 38 58 65 30 34 41] Result state [1 3 12 30 38 58 65 30 34 56]
-Reducing using reduce_rule_29 state [1 3 12 30 38 58 65 30 34 56] Result state [1 3 12 30 38 58 65 30 34]
-Shifting to state 21

Read token <quoted-string>([sometag] Cron <root@example.com>) state [1 3 12 30 38 58 65 30 34 21]
-Reducing using reduce_rule_43 state [1 3 12 30 38 58 65 30 34 21] Result state [1 3 12 30 38 58 65 30 34 28]
-Reducing using reduce_rule_40 state [1 3 12 30 38 58 65 30 34 28] Result state [1 3 12 30 38 58 65 30 34 39]
-Reducing using reduce_rule_36 state [1 3 12 30 38 58 65 30 34 39] Result state [1 3 12 30 38 58 65 30 34 56]
-Reducing using reduce_rule_29 state [1 3 12 30 38 58 65 30 34 56] Result state [1 3 12 30 38 58 65 30 34]
-Shifting to state 21

Read token <parenthesis-close>( )) state [1 3 12 30 38 58 65 30 34 21]
-Reducing using reduce_rule_43 state [1 3 12 30 38 58 65 30 34 21] Result state [1 3 12 30 38 58 65 30 34 28]
-Reducing using reduce_rule_40 state [1 3 12 30 38 58 65 30 34 28] Result state [1 3 12 30 38 58 65 30 34 39]
-Reducing using reduce_rule_36 state [1 3 12 30 38 58 65 30 34 39] Result state [1 3 12 30 38 58 65 30 34 56]
-Reducing using reduce_rule_29 state [1 3 12 30 38 58 65 30 34 56] Result state [1 3 12 30 38 58 65 30 34]
-Reducing using reduce_rule_24 state [1 3 12 30 38 58 65 30 34] Result state [1 3 12 30 38 58 65 30 48]
-Reducing using reduce_rule_31 state [1 3 12 30 38 58 65 30 48] Result state [1 3 12 30 38 58 65 58]
-Reducing using reduce_rule_34 state [1 3 12 30 38 58 65 58] Result state [1 3 12 30 38 58 65 71]
-Reducing using reduce_rule_35 state [1 3 12 30 38 58 65 71] Result state [1 3 12 30 38 57]
-Shifting to state 64

Read token <bracket-open>( {) state [1 3 12 30 38 57 64]
-Reducing using reduce_rule_33 state [1 3 12 30 38 57 64] Result state [1 3 12 30 36]
-Reducing using reduce_rule_28 state [1 3 12 30 36] Result state [1 3 12 30 48]
-Reducing using reduce_rule_31 state [1 3 12 30 48] Result state [1 3 12 29]
-Shifting to state 47

Read token <identifier-discard>(discard) state [1 3 12 29 47]
-Shifting to state 10

Read token <semicolon>(;) state [1 3 12 29 47 10]
-Shifting to state 25

Read token <identifier-stop>(stop) state [1 3 12 29 47 10 25]
-Reducing using reduce_rule_9 state [1 3 12 29 47 10 25] Result state [1 3 12 29 47 52]
-Shifting to state 6

Read token <semicolon>(;) state [1 3 12 29 47 52 6]
-Shifting to state 19

Read token <bracket-close>(
}) state [1 3 12 29 47 52 6 19]
-Reducing using reduce_rule_5 state [1 3 12 29 47 52 6 19] Result state [1 3 12 29 47 52 52]
-Shifting to state 53

Read token <hash-comment>( systemroot
) state [1 3 12 29 47 52 52 53]
-Reducing using reduce_rule_23 state [1 3 12 29 47 52 52 53] Result state [1 3 12 29 47 52 52 63]
-Reducing using reduce_rule_22 state [1 3 12 29 47 52 52 63] Result state [1 3 12 29 47 52 63]
-Reducing using reduce_rule_22 state [1 3 12 29 47 52 63] Result state [1 3 12 29 47 61]
-Reducing using reduce_rule_11 state [1 3 12 29 47 61] Result state [1 3 17]
-Reducing using reduce_rule_3 state [1 3 17] Result state [1 16]
-Reducing using reduce_rule_1 state [1 16] Result state [1]
-Shifting to state 14

Read token <identifier-if>(if) state [1 14]
-Reducing using reduce_rule_47 state [1 14] Result state [1 5]
-Reducing using reduce_rule_46 state [1 5] Result state [1 3]
-Shifting to state 12

Read token <identifier>(header) state [1 3 12]
-Shifting to state 30

Read token <tag>(comparator) state [1 3 12 30]
-Shifting to state 41

Read token <quoted-string>(i;ascii-casemap) state [1 3 12 30 41]
-Reducing using reduce_rule_38 state [1 3 12 30 41] Result state [1 3 12 30 37]
-Reducing using reduce_rule_30 state [1 3 12 30 37] Result state [1 3 12 30 34]
-Shifting to state 21

Read token <tag>(contains) state [1 3 12 30 34 21]
-Reducing using reduce_rule_43 state [1 3 12 30 34 21] Result state [1 3 12 30 34 28]
-Reducing using reduce_rule_40 state [1 3 12 30 34 28] Result state [1 3 12 30 34 39]
-Reducing using reduce_rule_36 state [1 3 12 30 34 39] Result state [1 3 12 30 34 56]
-Reducing using reduce_rule_29 state [1 3 12 30 34 56] Result state [1 3 12 30 34]
-Shifting to state 41

Read token <quoted-string>(Subject) state [1 3 12 30 34 41]
-Reducing using reduce_rule_38 state [1 3 12 30 34 41] Result state [1 3 12 30 34 56]
-Reducing using reduce_rule_29 state [1 3 12 30 34 56] Result state [1 3 12 30 34]
-Shifting to state 21

Read token <quoted-string>([sometag]) state [1 3 12 30 34 21]
-Reducing using reduce_rule_43 state [1 3 12 30 34 21] Result state [1 3 12 30 34 28]
-Reducing using reduce_rule_40 state [1 3 12 30 34 28] Result state [1 3 12 30 34 39]
-Reducing using reduce_rule_36 state [1 3 12 30 34 39] Result state [1 3 12 30 34 56]
-Reducing using reduce_rule_29 state [1 3 12 30 34 56] Result state [1 3 12 30 34]
-Shifting to state 21

Read token <bracket-open>(  {) state [1 3 12 30 34 21]
-Reducing using reduce_rule_43 state [1 3 12 30 34 21] Result state [1 3 12 30 34 28]
-Reducing using reduce_rule_40 state [1 3 12 30 34 28] Result state [1 3 12 30 34 39]
-Reducing using reduce_rule_36 state [1 3 12 30 34 39] Result state [1 3 12 30 34 56]
-Reducing using reduce_rule_29 state [1 3 12 30 34 56] Result state [1 3 12 30 34]
-Reducing using reduce_rule_24 state [1 3 12 30 34] Result state [1 3 12 30 48]
-Reducing using reduce_rule_31 state [1 3 12 30 48] Result state [1 3 12 29]
-Shifting to state 47

Read token <identifier-fileinto>(fileinto) state [1 3 12 29 47]
-Shifting to state 7

Read token <quoted-string>(Servers) state [1 3 12 29 47 7]
-Shifting to state 21

Read token <semicolon>(;) state [1 3 12 29 47 7 21]
-Reducing using reduce_rule_43 state [1 3 12 29 47 7 21] Result state [1 3 12 29 47 7 20]
-Shifting to state 42

Read token <identifier-stop>(stop) state [1 3 12 29 47 7 20 42]
-Reducing using reduce_rule_6 state [1 3 12 29 47 7 20 42] Result state [1 3 12 29 47 52]
-Shifting to state 6

Read token <semicolon>(;) state [1 3 12 29 47 52 6]
-Shifting to state 19

Read token <bracket-close>(
}) state [1 3 12 29 47 52 6 19]
-Reducing using reduce_rule_5 state [1 3 12 29 47 52 6 19] Result state [1 3 12 29 47 52 52]
-Shifting to state 53

Read token <hash-comment>( mxtoolbox 10.0.0.2
) state [1 3 12 29 47 52 52 53]
-Reducing using reduce_rule_23 state [1 3 12 29 47 52 52 53] Result state [1 3 12 29 47 52 52 63]
-Reducing using reduce_rule_22 state [1 3 12 29 47 52 52 63] Result state [1 3 12 29 47 52 63]
-Reducing using reduce_rule_22 state [1 3 12 29 47 52 63] Result state [1 3 12 29 47 61]
-Reducing using reduce_rule_11 state [1 3 12 29 47 61] Result state [1 3 17]
-Reducing using reduce_rule_3 state [1 3 17] Result state [1 16]
-Reducing using reduce_rule_1 state [1 16] Result state [1]
-Shifting to state 14

Read token <identifier-if>(if) state [1 14]
-Reducing using reduce_rule_47 state [1 14] Result state [1 5]
-Reducing using reduce_rule_46 state [1 5] Result state [1 3]
-Shifting to state 12

Read token <identifier>(anyof) state [1 3 12]
-Shifting to state 30

Read token <parenthesis-open>( () state [1 3 12 30]
-Shifting to state 38

Read token <identifier>(header) state [1 3 12 30 38]
-Shifting to state 30

Read token <tag>(comparator) state [1 3 12 30 38 30]
-Shifting to state 41

Read token <quoted-string>(i;octet) state [1 3 12 30 38 30 41]
-Reducing using reduce_rule_38 state [1 3 12 30 38 30 41] Result state [1 3 12 30 38 30 37]
-Reducing using reduce_rule_30 state [1 3 12 30 38 30 37] Result state [1 3 12 30 38 30 34]
-Shifting to state 21

Read token <tag>(contains) state [1 3 12 30 38 30 34 21]
-Reducing using reduce_rule_43 state [1 3 12 30 38 30 34 21] Result state [1 3 12 30 38 30 34 28]
-Reducing using reduce_rule_40 state [1 3 12 30 38 30 34 28] Result state [1 3 12 30 38 30 34 39]
-Reducing using reduce_rule_36 state [1 3 12 30 38 30 34 39] Result state [1 3 12 30 38 30 34 56]
-Reducing using reduce_rule_29 state [1 3 12 30 38 30 34 56] Result state [1 3 12 30 38 30 34]
-Shifting to state 41

Read token <quoted-string>(Subject) state [1 3 12 30 38 30 34 41]
-Reducing using reduce_rule_38 state [1 3 12 30 38 30 34 41] Result state [1 3 12 30 38 30 34 56]
-Reducing using reduce_rule_29 state [1 3 12 30 38 30 34 56] Result state [1 3 12 30 38 30 34]
-Shifting to state 21

Read token <quoted-string>(BLACKLIST - ADDED - 10.0.0.2) state [1 3 12 30 38 30 34 21]
-Reducing using reduce_rule_43 state [1 3 12 30 38 30 34 21] Result state [1 3 12 30 38 30 34 28]
-Reducing using reduce_rule_40 state [1 3 12 30 38 30 34 28] Result state [1 3 12 30 38 30 34 39]
-Reducing using reduce_rule_36 state [1 3 12 30 38 30 34 39] Result state [1 3 12 30 38 30 34 56]
-Reducing using reduce_rule_29 state [1 3 12 30 38 30 34 56] Result state [1 3 12 30 38 30 34]
-Shifting to state 21

Read token <comma>(,) state [1 3 12 30 38 30 34 21]
-Reducing using reduce_rule_43 state [1 3 12 30 38 30 34 21] Result state [1 3 12 30 38 30 34 28]
-Reducing using reduce_rule_40 state [1 3 12 30 38 30 34 28] Result state [1 3 12 30 38 30 34 39]
-Reducing using reduce_rule_36 state [1 3 12 30 38 30 34 39] Result state [1 3 12 30 38 30 34 56]
-Reducing using reduce_rule_29 state [1 3 12 30 38 30 34 56] Result state [1 3 12 30 38 30 34]
-Reducing using reduce_rule_24 state [1 3 12 30 38 30 34] Result state [1 3 12 30 38 30 48]
-Reducing using reduce_rule_31 state [1 3 12 30 38 30 48] Result state [1 3 12 30 38 58]
-Shifting to state 65

Read token <identifier>(header) state [1 3 12 30 38 58 65]
-Shifting to state 30

Read token <tag>(comparator) state [1 3 12 30 38 58 65 30]
-Shifting to state 41

Read token <quoted-string>(i;octet) state [1 3 12 30 38 58 65 30 41]
-Reducing using reduce_rule_38 state [1 3 12 30 38 58 65 30 41] Result state [1 3 12 30 38 58 65 30 37]
-Reducing using reduce_rule_30 state [1 3 12 30 38 58 65 30 37] Result state [1 3 12 30 38 58 65 30 34]
-Shifting to state 21

Read token <tag>(contains) state [1 3 12 30 38 58 65 30 34 21]
-Reducing using reduce_rule_43 state [1 3 12 30 38 58 65 30 34 21] Result state [1 3 12 30 38 58 65 30 34 28]
-Reducing using reduce_rule_40 state [1 3 12 30 38 58 65 30 34 28] Result state [1 3 12 30 38 58 65 30 34 39]
-Reducing using reduce_rule_36 state [1 3 12 30 38 58 65 30 34 39] Result state [1 3 12 30 38 58 65 30 34 56]
-Reducing using reduce_rule_29 state [1 3 12 30 38 58 65 30 34 56] Result state [1 3 12 30 38 58 65 30 34]
-Shifting to state 41

Read token <quoted-string>(Subject) state [1 3 12 30 38 58 65 30 34 41]
-Reducing using reduce_rule_38 state [1 3 12 30 38 58 65 30 34 41] Result state [1 3 12 30 38 58 65 30 34 56]
-Reducing using reduce_rule_29 state [1 3 12 30 38 58 65 30 34 56] Result state [1 3 12 30 38 58 65 30 34]
-Shifting to state 21

Read token <quoted-string>(BLACKLIST - REMOVED - 10.0.0.2) state [1 3 12 30 38 58 65 30 34 21]
-Reducing using reduce_rule_43 state [1 3 12 30 38 58 65 30 34 21] Result state [1 3 12 30 38 58 65 30 34 28]
-Reducing using reduce_rule_40 state [1 3 12 30 38 58 65 30 34 28] Result state [1 3 12 30 38 58 65 30 34 39]
-Reducing using reduce_rule_36 state [1 3 12 30 38 58 65 30 34 39] Result state [1 3 12 30 38 58 65 30 34 56]
-Reducing using reduce_rule_29 state [1 3 12 30 38 58 65 30 34 56] Result state [1 3 12 30 38 58 65 30 34]
-Shifting to state 21

Read token <parenthesis-close>( )) state [1 3 12 30 38 58 65 30 34 21]
-Reducing using reduce_rule_43 state [1 3 12 30 38 58 65 30 34 21] Result state [1 3 12 30 38 58 65 30 34 28]
-Reducing using reduce_rule_40 state [1 3 12 30 38 58 65 30 34 28] Result state [1 3 12 30 38 58 65 30 34 39]
-Reducing using reduce_rule_36 state [1 3 12 30 38 58 65 30 34 39] Result state [1 3 12 30 38 58 65 30 34 56]
-Reducing using reduce_rule_29 state [1 3 12 30 38 58 65 30 34 56] Result state [1 3 12 30 38 58 65 30 34]
-Reducing using reduce_rule_24 state [1 3 12 30 38 58 65 30 34] Result state [1 3 12 30 38 58 65 30 48]
-Reducing using reduce_rule_31 state [1 3 12 30 38 58 65 30 48] Result state [1 3 12 30 38 58 65 58]
-Reducing using reduce_rule_34 state [1 3 12 30 38 58 65 58] Result state [1 3 12 30 38 58 65 71]
-Reducing using reduce_rule_35 state [1 3 12 30 38 58 65 71] Result state [1 3 12 30 38 57]
-Shifting to state 64

Read token <bracket-open>( {) state [1 3 12 30 38 57 64]
-Reducing using reduce_rule_33 state [1 3 12 30 38 57 64] Result state [1 3 12 30 36]
-Reducing using reduce_rule_28 state [1 3 12 30 36] Result state [1 3 12 30 48]
-Reducing using reduce_rule_31 state [1 3 12 30 48] Result state [1 3 12 29]
-Shifting to state 47

Read token <identifier>(addflag) state [1 3 12 29 47]
-Shifting to state 13

Read token <square-parenthesis-open>( [) state [1 3 12 29 47 13]
-Shifting to state 27

Read token <quoted-string>(\\Seen) state [1 3 12 29 47 13 27]
-Shifting to state 21

Read token <square-parenthesis-close>(]) state [1 3 12 29 47 13 27 21]
-Reducing using reduce_rule_43 state [1 3 12 29 47 13 27 21] Result state [1 3 12 29 47 13 27 46]
-Reducing using reduce_rule_41 state [1 3 12 29 47 13 27 46] Result state [1 3 12 29 47 13 27 45]
-Shifting to state 59

Read token <semicolon>(;) state [1 3 12 29 47 13 27 45 59]
-Reducing using reduce_rule_39 state [1 3 12 29 47 13 27 45 59] Result state [1 3 12 29 47 13 39]
-Reducing using reduce_rule_36 state [1 3 12 29 47 13 39] Result state [1 3 12 29 47 13 37]
-Reducing using reduce_rule_30 state [1 3 12 29 47 13 37] Result state [1 3 12 29 47 13 34]
-Reducing using reduce_rule_24 state [1 3 12 29 47 13 34] Result state [1 3 12 29 47 13 31]
-Shifting to state 49

Read token <identifier-fileinto>(fileinto) state [1 3 12 29 47 13 31 49]
-Reducing using reduce_rule_18 state [1 3 12 29 47 13 31 49] Result state [1 3 12 29 47 52]
-Shifting to state 7

Read token <quoted-string>(Trash) state [1 3 12 29 47 52 7]
-Shifting to state 21

Read token <semicolon>(;) state [1 3 12 29 47 52 7 21]
-Reducing using reduce_rule_43 state [1 3 12 29 47 52 7 21] Result state [1 3 12 29 47 52 7 20]
-Shifting to state 42

Read token <identifier>(removeflag) state [1 3 12 29 47 52 7 20 42]
-Reducing using reduce_rule_6 state [1 3 12 29 47 52 7 20 42] Result state [1 3 12 29 47 52 52]
-Shifting to state 13

Read token <square-parenthesis-open>( [) state [1 3 12 29 47 52 52 13]
-Shifting to state 27

Read token <quoted-string>(\\Seen) state [1 3 12 29 47 52 52 13 27]
-Shifting to state 21

Read token <square-parenthesis-close>(]) state [1 3 12 29 47 52 52 13 27 21]
-Reducing using reduce_rule_43 state [1 3 12 29 47 52 52 13 27 21] Result state [1 3 12 29 47 52 52 13 27 46]
-Reducing using reduce_rule_41 state [1 3 12 29 47 52 52 13 27 46] Result state [1 3 12 29 47 52 52 13 27 45]
-Shifting to state 59

Read token <semicolon>(;) state [1 3 12 29 47 52 52 13 27 45 59]
-Reducing using reduce_rule_39 state [1 3 12 29 47 52 52 13 27 45 59] Result state [1 3 12 29 47 52 52 13 39]
-Reducing using reduce_rule_36 state [1 3 12 29 47 52 52 13 39] Result state [1 3 12 29 47 52 52 13 37]
-Reducing using reduce_rule_30 state [1 3 12 29 47 52 52 13 37] Result state [1 3 12 29 47 52 52 13 34]
-Reducing using reduce_rule_24 state [1 3 12 29 47 52 52 13 34] Result state [1 3 12 29 47 52 52 13 31]
-Shifting to state 49

Read token <identifier-stop>(stop) state [1 3 12 29 47 52 52 13 31 49]
-Reducing using reduce_rule_18 state [1 3 12 29 47 52 52 13 31 49] Result state [1 3 12 29 47 52 52 52]
-Shifting to state 6

Read token <semicolon>(;) state [1 3 12 29 47 52 52 52 6]
-Shifting to state 19

Read token <bracket-close>(
}) state [1 3 12 29 47 52 52 52 6 19]
-Reducing using reduce_rule_5 state [1 3 12 29 47 52 52 52 6 19] Result state [1 3 12 29 47 52 52 52 52]
-Shifting to state 53

Read token <hash-comment>( Google My Business
) state [1 3 12 29 47 52 52 52 52 53]
-Reducing using reduce_rule_23 state [1 3 12 29 47 52 52 52 52 53] Result state [1 3 12 29 47 52 52 52 52 63]
-Reducing using reduce_rule_22 state [1 3 12 29 47 52 52 52 52 63] Result state [1 3 12 29 47 52 52 52 63]
-Reducing using reduce_rule_22 state [1 3 12 29 47 52 52 52 63] Result state [1 3 12 29 47 52 52 63]
-Reducing using reduce_rule_22 state [1 3 12 29 47 52 52 63] Result state [1 3 12 29 47 52 63]
-Reducing using reduce_rule_22 state [1 3 12 29 47 52 63] Result state [1 3 12 29 47 61]
-Reducing using reduce_rule_11 state [1 3 12 29 47 61] Result state [1 3 17]
-Reducing using reduce_rule_3 state [1 3 17] Result state [1 16]
-Reducing using reduce_rule_1 state [1 16] Result state [1]
-Shifting to state 14

Read token <identifier-if>(if) state [1 14]
-Reducing using reduce_rule_47 state [1 14] Result state [1 5]
-Reducing using reduce_rule_46 state [1 5] Result state [1 3]
-Shifting to state 12

Read token <identifier>(allof) state [1 3 12]
-Shifting to state 30

Read token <parenthesis-open>( () state [1 3 12 30]
-Shifting to state 38

Read token <identifier>(address) state [1 3 12 30 38]
-Shifting to state 30

Read token <tag>(all) state [1 3 12 30 38 30]
-Shifting to state 41

Read token <tag>(comparator) state [1 3 12 30 38 30 41]
-Reducing using reduce_rule_38 state [1 3 12 30 38 30 41] Result state [1 3 12 30 38 30 37]
-Reducing using reduce_rule_30 state [1 3 12 30 38 30 37] Result state [1 3 12 30 38 30 34]
-Shifting to state 41

Read token <quoted-string>(i;ascii-casemap) state [1 3 12 30 38 30 34 41]
-Reducing using reduce_rule_38 state [1 3 12 30 38 30 34 41] Result state [1 3 12 30 38 30 34 56]
-Reducing using reduce_rule_29 state [1 3 12 30 38 30 34 56] Result state [1 3 12 30 38 30 34]
-Shifting to state 21

Read token <tag>(is) state [1 3 12 30 38 30 34 21]
-Reducing using reduce_rule_43 state [1 3 12 30 38 30 34 21] Result state [1 3 12 30 38 30 34 28]
-Reducing using reduce_rule_40 state [1 3 12 30 38 30 34 28] Result state [1 3 12 30 38 30 34 39]
-Reducing using reduce_rule_36 state [1 3 12 30 38 30 34 39] Result state [1 3 12 30 38 30 34 56]
-Reducing using reduce_rule_29 state [1 3 12 30 38 30 34 56] Result state [1 3 12 30 38 30 34]
-Shifting to state 41

Read token <quoted-string>(From) state [1 3 12 30 38 30 34 41]
-Reducing using reduce_rule_38 state [1 3 12 30 38 30 34 41] Result state [1 3 12 30 38 30 34 56]
-Reducing using reduce_rule_29 state [1 3 12 30 38 30 34 56] Result state [1 3 12 30 38 30 34]
-Shifting to state 21

Read token <quoted-string>(googlemybusiness-noreply@google.com) state [1 3 12 30 38 30 34 21]
-Reducing using reduce_rule_43 state [1 3 12 30 38 30 34 21] Result state [1 3 12 30 38 30 34 28]
-Reducing using reduce_rule_40 state [1 3 12 30 38 30 34 28] Result state [1 3 12 30 38 30 34 39]
-Reducing using reduce_rule_36 state [1 3 12 30 38 30 34 39] Result state [1 3 12 30 38 30 34 56]
-Reducing using reduce_rule_29 state [1 3 12 30 38 30 34 56] Result state [1 3 12 30 38 30 34]
-Shifting to state 21

Read token <comma>(,) state [1 3 12 30 38 30 34 21]
-Reducing using reduce_rule_43 state [1 3 12 30 38 30 34 21] Result state [1 3 12 30 38 30 34 28]
-Reducing using reduce_rule_40 state [1 3 12 30 38 30 34 28] Result state [1 3 12 30 38 30 34 39]
-Reducing using reduce_rule_36 state [1 3 12 30 38 30 34 39] Result state [1 3 12 30 38 30 34 56]
-Reducing using reduce_rule_29 state [1 3 12 30 38 30 34 56] Result state [1 3 12 30 38 30 34]
-Reducing using reduce_rule_24 state [1 3 12 30 38 30 34] Result state [1 3 12 30 38 30 48]
-Reducing using reduce_rule_31 state [1 3 12 30 38 30 48] Result state [1 3 12 30 38 58]
-Shifting to state 65

Read token <identifier>(address) state [1 3 12 30 38 58 65]
-Shifting to state 30

Read token <tag>(all) state [1 3 12 30 38 58 65 30]
-Shifting to state 41

Read token <tag>(comparator) state [1 3 12 30 38 58 65 30 41]
-Reducing using reduce_rule_38 state [1 3 12 30 38 58 65 30 41] Result state [1 3 12 30 38 58 65 30 37]
-Reducing using reduce_rule_30 state [1 3 12 30 38 58 65 30 37] Result state [1 3 12 30 38 58 65 30 34]
-Shifting to state 41

Read token <quoted-string>(i;ascii-casemap) state [1 3 12 30 38 58 65 30 34 41]
-Reducing using reduce_rule_38 state [1 3 12 30 38 58 65 30 34 41] Result state [1 3 12 30 38 58 65 30 34 56]
-Reducing using reduce_rule_29 state [1 3 12 30 38 58 65 30 34 56] Result state [1 3 12 30 38 58 65 30 34]
-Shifting to state 21

Read token <tag>(is) state [1 3 12 30 38 58 65 30 34 21]
-Reducing using reduce_rule_43 state [1 3 12 30 38 58 65 30 34 21] Result state [1 3 12 30 38 58 65 30 34 28]
-Reducing using reduce_rule_40 state [1 3 12 30 38 58 65 30 34 28] Result state [1 3 12 30 38 58 65 30 34 39]
-Reducing using reduce_rule_36 state [1 3 12 30 38 58 65 30 34 39] Result state [1 3 12 30 38 58 65 30 34 56]
-Reducing using reduce_rule_29 state [1 3 12 30 38 58 65 30 34 56] Result state [1 3 12 30 38 58 65 30 34]
-Shifting to state 41

Read token <quoted-string>(To) state [1 3 12 30 38 58 65 30 34 41]
-Reducing using reduce_rule_38 state [1 3 12 30 38 58 65 30 34 41] Result state [1 3 12 30 38 58 65 30 34 56]
-Reducing using reduce_rule_29 state [1 3 12 30 38 58 65 30 34 56] Result state [1 3 12 30 38 58 65 30 34]
-Shifting to state 21

Read token <quoted-string>(googlemybusiness-noreply@google.com) state [1 3 12 30 38 58 65 30 34 21]
-Reducing using reduce_rule_43 state [1 3 12 30 38 58 65 30 34 21] Result state [1 3 12 30 38 58 65 30 34 28]
-Reducing using reduce_rule_40 state [1 3 12 30 38 58 65 30 34 28] Result state [1 3 12 30 38 58 65 30 34 39]
-Reducing using reduce_rule_36 state [1 3 12 30 38 58 65 30 34 39] Result state [1 3 12 30 38 58 65 30 34 56]
-Reducing using reduce_rule_29 state [1 3 12 30 38 58 65 30 34 56] Result state [1 3 12 30 38 58 65 30 34]
-Shifting to state 21

Read token <parenthesis-close>( )) state [1 3 12 30 38 58 65 30 34 21]
-Reducing using reduce_rule_43 state [1 3 12 30 38 58 65 30 34 21] Result state [1 3 12 30 38 58 65 30 34 28]
-Reducing using reduce_rule_40 state [1 3 12 30 38 58 65 30 34 28] Result state [1 3 12 30 38 58 65 30 34 39]
-Reducing using reduce_rule_36 state [1 3 12 30 38 58 65 30 34 39] Result state [1 3 12 30 38 58 65 30 34 56]
-Reducing using reduce_rule_29 state [1 3 12 30 38 58 65 30 34 56] Result state [1 3 12 30 38 58 65 30 34]
-Reducing using reduce_rule_24 state [1 3 12 30 38 58 65 30 34] Result state [1 3 12 30 38 58 65 30 48]
-Reducing using reduce_rule_31 state [1 3 12 30 38 58 65 30 48] Result state [1 3 12 30 38 58 65 58]
-Reducing using reduce_rule_34 state [1 3 12 30 38 58 65 58] Result state [1 3 12 30 38 58 65 71]
-Reducing using reduce_rule_35 state [1 3 12 30 38 58 65 71] Result state [1 3 12 30 38 57]
-Shifting to state 64

Read token <bracket-open>( {) state [1 3 12 30 38 57 64]
-Reducing using reduce_rule_33 state [1 3 12 30 38 57 64] Result state [1 3 12 30 36]
-Reducing using reduce_rule_28 state [1 3 12 30 36] Result state [1 3 12 30 48]
-Reducing using reduce_rule_31 state [1 3 12 30 48] Result state [1 3 12 29]
-Shifting to state 47

Read token <identifier-discard>(discard) state [1 3 12 29 47]
-Shifting to state 10

Read token <semicolon>(;) state [1 3 12 29 47 10]
-Shifting to state 25

Read token <identifier-stop>(stop) state [1 3 12 29 47 10 25]
-Reducing using reduce_rule_9 state [1 3 12 29 47 10 25] Result state [1 3 12 29 47 52]
-Shifting to state 6

Read token <semicolon>(;) state [1 3 12 29 47 52 6]
-Shifting to state 19

Read token <bracket-close>(
}) state [1 3 12 29 47 52 6 19]
-Reducing using reduce_rule_5 state [1 3 12 29 47 52 6 19] Result state [1 3 12 29 47 52 52]
-Shifting to state 53

Read token () state [1 3 12 29 47 52 52 53]
-Reducing using reduce_rule_23 state [1 3 12 29 47 52 52 53] Result state [1 3 12 29 47 52 52 63]
-Reducing using reduce_rule_22 state [1 3 12 29 47 52 52 63] Result state [1 3 12 29 47 52 63]
-Reducing using reduce_rule_22 state [1 3 12 29 47 52 63] Result state [1 3 12 29 47 61]
-Reducing using reduce_rule_11 state [1 3 12 29 47 61] Result state [1 3 17]
-Reducing using reduce_rule_3 state [1 3 17] Result state [1 16]
-Reducing using reduce_rule_1 state [1 16] Result state [1]
-Accepting
object(sergiosgc\Text_Tokenizer_Token)#5083 (2) {
  ["_id":protected]=>
  string(10) "<commands>"
  ["_value":protected]=>
  array(7) {
    [0]=>
    object(sergiosgc\Sieve_Parser\Script_Command_Require)#5088 (6) {
      ["identifier"]=>
      string(7) "require"
      ["comment"]=>
      object(sergiosgc\Sieve_Parser\Script_Comment)#2 (2) {
        ["text"]=>
        string(20) " A line
 Requires
"
        ["encoding"]=>
        int(0)
      }
      ["capabilities"]=>
      array(2) {
        [0]=>
        string(10) "imap4flags"
        [1]=>
        string(8) "fileinto"
      }
      ["arguments"]=>
      array(0) {
      }
      ["tests"]=>
      array(0) {
      }
      ["subcommands"]=>
      array(0) {
      }
    }
    [1]=>
    object(sergiosgc\Sieve_Parser\Script_Command_If)#5089 (6) {
      ["identifier"]=>
      string(2) "if"
      ["comment"]=>
      object(sergiosgc\Sieve_Parser\Script_Comment)#5087 (2) {
        ["text"]=>
        string(22) " Whitelist addresses
"
        ["encoding"]=>
        int(0)
      }
      ["testsAndCommands"]=>
      array(1) {
        [0]=>
        array(2) {
          ["test"]=>
          object(sergiosgc\Sieve_Parser\Script_Test)#5092 (2) {
            ["identifier"]=>
            string(7) "address"
            ["arguments"]=>
            array(6) {
              [0]=>
              object(sergiosgc\Sieve_Parser\Script_Tag)#5081 (1) {
                ["tag"]=>
                string(3) "all"
              }
              [1]=>
              object(sergiosgc\Sieve_Parser\Script_Tag)#5069 (1) {
                ["tag"]=>
                string(10) "comparator"
              }
              [2]=>
              string(15) "i;ascii-casemap"
              [3]=>
              object(sergiosgc\Sieve_Parser\Script_Tag)#5068 (1) {
                ["tag"]=>
                string(2) "is"
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
          }
          ["commands"]=>
          array(2) {
            [0]=>
            object(sergiosgc\Sieve_Parser\Script_Command_Keep)#5082 (5) {
              ["identifier"]=>
              string(4) "keep"
              ["comment"]=>
              string(0) ""
              ["arguments"]=>
              array(0) {
              }
              ["tests"]=>
              array(0) {
              }
              ["subcommands"]=>
              array(0) {
              }
            }
            [1]=>
            object(sergiosgc\Sieve_Parser\Script_Command_Stop)#5066 (5) {
              ["identifier"]=>
              string(4) "stop"
              ["comment"]=>
              string(0) ""
              ["arguments"]=>
              array(0) {
              }
              ["tests"]=>
              array(0) {
              }
              ["subcommands"]=>
              array(0) {
              }
            }
          }
        }
      }
      ["arguments"]=>
      array(0) {
      }
      ["tests"]=>
      array(0) {
      }
      ["subcommands"]=>
      array(0) {
      }
    }
    [2]=>
    object(sergiosgc\Sieve_Parser\Script_Command_If)#5049 (6) {
      ["identifier"]=>
      string(2) "if"
      ["comment"]=>
      object(sergiosgc\Sieve_Parser\Script_Comment)#5062 (2) {
        ["text"]=>
        string(26) " Database backup checker
"
        ["encoding"]=>
        int(0)
      }
      ["testsAndCommands"]=>
      array(1) {
        [0]=>
        array(2) {
          ["test"]=>
          object(sergiosgc\Sieve_Parser\Script_Test)#5067 (2) {
            ["identifier"]=>
            string(5) "anyof"
            ["arguments"]=>
            array(0) {
            }
          }
          ["commands"]=>
          array(2) {
            [0]=>
            object(sergiosgc\Sieve_Parser\Script_Command_Keep)#5022 (5) {
              ["identifier"]=>
              string(4) "keep"
              ["comment"]=>
              string(0) ""
              ["arguments"]=>
              array(0) {
              }
              ["tests"]=>
              array(0) {
              }
              ["subcommands"]=>
              array(0) {
              }
            }
            [1]=>
            object(sergiosgc\Sieve_Parser\Script_Command_Stop)#5064 (5) {
              ["identifier"]=>
              string(4) "stop"
              ["comment"]=>
              string(0) ""
              ["arguments"]=>
              array(0) {
              }
              ["tests"]=>
              array(0) {
              }
              ["subcommands"]=>
              array(0) {
              }
            }
          }
        }
      }
      ["arguments"]=>
      array(0) {
      }
      ["tests"]=>
      array(0) {
      }
      ["subcommands"]=>
      array(0) {
      }
    }
    [3]=>
    object(sergiosgc\Sieve_Parser\Script_Command_If)#5018 (6) {
      ["identifier"]=>
      string(2) "if"
      ["comment"]=>
      object(sergiosgc\Sieve_Parser\Script_Comment)#5063 (2) {
        ["text"]=>
        string(16) " Verbose crons
"
        ["encoding"]=>
        int(0)
      }
      ["testsAndCommands"]=>
      array(1) {
        [0]=>
        array(2) {
          ["test"]=>
          object(sergiosgc\Sieve_Parser\Script_Test)#5020 (2) {
            ["identifier"]=>
            string(5) "anyof"
            ["arguments"]=>
            array(0) {
            }
          }
          ["commands"]=>
          array(2) {
            [0]=>
            object(sergiosgc\Sieve_Parser\Script_Command_Discard)#5017 (5) {
              ["identifier"]=>
              string(7) "discard"
              ["comment"]=>
              string(0) ""
              ["arguments"]=>
              array(0) {
              }
              ["tests"]=>
              array(0) {
              }
              ["subcommands"]=>
              array(0) {
              }
            }
            [1]=>
            object(sergiosgc\Sieve_Parser\Script_Command_Stop)#5056 (5) {
              ["identifier"]=>
              string(4) "stop"
              ["comment"]=>
              string(0) ""
              ["arguments"]=>
              array(0) {
              }
              ["tests"]=>
              array(0) {
              }
              ["subcommands"]=>
              array(0) {
              }
            }
          }
        }
      }
      ["arguments"]=>
      array(0) {
      }
      ["tests"]=>
      array(0) {
      }
      ["subcommands"]=>
      array(0) {
      }
    }
    [4]=>
    object(sergiosgc\Sieve_Parser\Script_Command_If)#5011 (6) {
      ["identifier"]=>
      string(2) "if"
      ["comment"]=>
      object(sergiosgc\Sieve_Parser\Script_Comment)#5090 (2) {
        ["text"]=>
        string(13) " systemroot
"
        ["encoding"]=>
        int(0)
      }
      ["testsAndCommands"]=>
      array(1) {
        [0]=>
        array(2) {
          ["test"]=>
          object(sergiosgc\Sieve_Parser\Script_Test)#5061 (2) {
            ["identifier"]=>
            string(6) "header"
            ["arguments"]=>
            array(5) {
              [0]=>
              object(sergiosgc\Sieve_Parser\Script_Tag)#5065 (1) {
                ["tag"]=>
                string(10) "comparator"
              }
              [1]=>
              string(15) "i;ascii-casemap"
              [2]=>
              object(sergiosgc\Sieve_Parser\Script_Tag)#5091 (1) {
                ["tag"]=>
                string(8) "contains"
              }
              [3]=>
              string(7) "Subject"
              [4]=>
              string(9) "[sometag]"
            }
          }
          ["commands"]=>
          array(2) {
            [0]=>
            object(sergiosgc\Sieve_Parser\Script_Command_Fileinto)#5021 (6) {
              ["identifier"]=>
              string(8) "fileinto"
              ["mailbox"]=>
              string(7) "Servers"
              ["comment"]=>
              string(0) ""
              ["arguments"]=>
              array(0) {
              }
              ["tests"]=>
              array(0) {
              }
              ["subcommands"]=>
              array(0) {
              }
            }
            [1]=>
            object(sergiosgc\Sieve_Parser\Script_Command_Stop)#5019 (5) {
              ["identifier"]=>
              string(4) "stop"
              ["comment"]=>
              string(0) ""
              ["arguments"]=>
              array(0) {
              }
              ["tests"]=>
              array(0) {
              }
              ["subcommands"]=>
              array(0) {
              }
            }
          }
        }
      }
      ["arguments"]=>
      array(0) {
      }
      ["tests"]=>
      array(0) {
      }
      ["subcommands"]=>
      array(0) {
      }
    }
    [5]=>
    object(sergiosgc\Sieve_Parser\Script_Command_If)#4991 (6) {
      ["identifier"]=>
      string(2) "if"
      ["comment"]=>
      object(sergiosgc\Sieve_Parser\Script_Comment)#5057 (2) {
        ["text"]=>
        string(21) " mxtoolbox 10.0.0.2
"
        ["encoding"]=>
        int(0)
      }
      ["testsAndCommands"]=>
      array(1) {
        [0]=>
        array(2) {
          ["test"]=>
          object(sergiosgc\Sieve_Parser\Script_Test)#5010 (2) {
            ["identifier"]=>
            string(5) "anyof"
            ["arguments"]=>
            array(0) {
            }
          }
          ["commands"]=>
          array(4) {
            [0]=>
            object(sergiosgc\Sieve_Parser\Script_Command)#5016 (5) {
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
            object(sergiosgc\Sieve_Parser\Script_Command_Fileinto)#4993 (6) {
              ["identifier"]=>
              string(8) "fileinto"
              ["mailbox"]=>
              string(5) "Trash"
              ["comment"]=>
              string(0) ""
              ["arguments"]=>
              array(0) {
              }
              ["tests"]=>
              array(0) {
              }
              ["subcommands"]=>
              array(0) {
              }
            }
            [2]=>
            object(sergiosgc\Sieve_Parser\Script_Command)#5009 (5) {
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
            object(sergiosgc\Sieve_Parser\Script_Command_Stop)#5002 (5) {
              ["identifier"]=>
              string(4) "stop"
              ["comment"]=>
              string(0) ""
              ["arguments"]=>
              array(0) {
              }
              ["tests"]=>
              array(0) {
              }
              ["subcommands"]=>
              array(0) {
              }
            }
          }
        }
      }
      ["arguments"]=>
      array(0) {
      }
      ["tests"]=>
      array(0) {
      }
      ["subcommands"]=>
      array(0) {
      }
    }
    [6]=>
    object(sergiosgc\Sieve_Parser\Script_Command_If)#4984 (6) {
      ["identifier"]=>
      string(2) "if"
      ["comment"]=>
      object(sergiosgc\Sieve_Parser\Script_Comment)#5058 (2) {
        ["text"]=>
        string(21) " Google My Business
"
        ["encoding"]=>
        int(0)
      }
      ["testsAndCommands"]=>
      array(1) {
        [0]=>
        array(2) {
          ["test"]=>
          object(sergiosgc\Sieve_Parser\Script_Test)#4990 (2) {
            ["identifier"]=>
            string(5) "allof"
            ["arguments"]=>
            array(0) {
            }
          }
          ["commands"]=>
          array(2) {
            [0]=>
            object(sergiosgc\Sieve_Parser\Script_Command_Discard)#4752 (5) {
              ["identifier"]=>
              string(7) "discard"
              ["comment"]=>
              string(0) ""
              ["arguments"]=>
              array(0) {
              }
              ["tests"]=>
              array(0) {
              }
              ["subcommands"]=>
              array(0) {
              }
            }
            [1]=>
            object(sergiosgc\Sieve_Parser\Script_Command_Stop)#4996 (5) {
              ["identifier"]=>
              string(4) "stop"
              ["comment"]=>
              string(0) ""
              ["arguments"]=>
              array(0) {
              }
              ["tests"]=>
              array(0) {
              }
              ["subcommands"]=>
              array(0) {
              }
            }
          }
        }
      }
      ["arguments"]=>
      array(0) {
      }
      ["tests"]=>
      array(0) {
      }
      ["subcommands"]=>
      array(0) {
      }
    }
  }
}
