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
   12:  * [6] <command>-><identifier-notify><string><semicolon>
   13:  * [7] <command>-><identifier-fileinto><string><semicolon>
   14:  * [8] <command>-><identifier-redirect><string><semicolon>
   15:  * [9] <command>-><identifier-keep><semicolon>
   16:  * [10] <command>-><identifier-discard><semicolon>
   17:  * [11] <command>-><identifier-require><string-list><semicolon>
   18:  * [12] <command>-><identifier-if><test><bracket-open><block>
   19:  * [13] <command>-><identifier-if><test><bracket-open><block><command-elsif>
   20:  * [14] <command>-><identifier-if><test><bracket-open><block><command-else>
   21:  * [15] <command-elsif>-><identifier-elsif><test><bracket-open><block>
   22:  * [16] <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif>
   23:  * [17] <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else>
   24:  * [18] <command-else>-><identifier-else><bracket-open><block>
   25:  * [19] <command>-><identifier><arguments><semicolon>
   26:  * [20] <command>-><identifier><arguments><bracket-open><block>
   27:  * [21] <command>-><identifier><semicolon>
   28:  * [22] <command>-><identifier><bracket-open><block>
   29:  * [23] <block>-><command><block>
   30:  * [24] <block>-><bracket-close>
   31:  * [25] <arguments>-><arguments-plus>
   32:  * [26] <arguments>-><arguments-plus><test>
   33:  * [27] <arguments>-><arguments-plus><test-list>
   34:  * [28] <arguments>-><test>
   35:  * [29] <arguments>-><test-list>
   36:  * [30] <arguments-plus>-><arguments-plus><argument>
   37:  * [31] <arguments-plus>-><argument>
   38:  * [32] <test>-><identifier-not><test>
   39:  * [33] <test>-><identifier><arguments>
   40:  * [34] <test>-><identifier>
   41:  * [35] <test-list>-><parenthesis-open><test-plus-csv><parenthesis-close>
   42:  * [36] <test-plus-csv>-><test>
   43:  * [37] <test-plus-csv>-><test-plus-csv><comma><test>
   44:  * [38] <argument>-><string-list>
   45:  * [39] <argument>-><number>
   46:  * [40] <argument>-><tag>
   47:  * [41] <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close>
   48:  * [42] <string-list>-><string>
   49:  * [43] <string-plus-csv>-><string>
   50:  * [44] <string-plus-csv>-><string-plus-csv><comma><string>
   51:  * [45] <string>-><quoted-string>
   52:  * [46] <string>-><multi-line>
   53:  * [47] <comment>-><comment><single-comment>
   54:  * [48] <comment>-><single-comment>
   55:  * [49] <single-comment>-><hash-comment>
   56:  * [50] <single-comment>-><bracket-comment>
   57:  *
   58:  * -- Finite State Automaton States --
   59:  * ----------- 0 -----------
   60:  *   --Itemset--
   61:  *     <start>->•<commands>
   62:  *    +<commands>->•<commands><commented-command>
   63:  *    +<commands>->•<commented-command>
   64:  *    +<commented-command>->•<comment><command>
   65:  *    +<commented-command>->•<command>
   66:  *    +<comment>->•<comment><single-comment>
   67:  *    +<comment>->•<single-comment>
   68:  *    +<command>->•<identifier-stop><semicolon>
   69:  *    +<command>->•<identifier-notify><string><semicolon>
   70:  *    +<command>->•<identifier-fileinto><string><semicolon>
   71:  *    +<command>->•<identifier-redirect><string><semicolon>
   72:  *    +<command>->•<identifier-keep><semicolon>
   73:  *    +<command>->•<identifier-discard><semicolon>
   74:  *    +<command>->•<identifier-require><string-list><semicolon>
   75:  *    +<command>->•<identifier-if><test><bracket-open><block>
   76:  *    +<command>->•<identifier-if><test><bracket-open><block><command-elsif>
   77:  *    +<command>->•<identifier-if><test><bracket-open><block><command-else>
   78:  *    +<command>->•<identifier><arguments><semicolon>
   79:  *    +<command>->•<identifier><arguments><bracket-open><block>
   80:  *    +<command>->•<identifier><semicolon>
   81:  *    +<command>->•<identifier><bracket-open><block>
   82:  *    +<single-comment>->•<hash-comment>
   83:  *    +<single-comment>->•<bracket-comment>
   84:  *   --Transitions--
   85:  *    Goto on <commands> to 1 because of <start>->•<commands>
   86:  *    Goto on <commands> to 1 because of <commands>->•<commands><commented-command>
   87:  *    Goto on <commented-command> to 2 because of <commands>->•<commented-command>
   88:  *    Goto on <comment> to 3 because of <commented-command>->•<comment><command>
   89:  *    Goto on <command> to 4 because of <commented-command>->•<command>
   90:  *    Goto on <comment> to 3 because of <comment>->•<comment><single-comment>
   91:  *    Goto on <single-comment> to 5 because of <comment>->•<single-comment>
   92:  *    Shift on <identifier-stop> to 6 because of <command>->•<identifier-stop><semicolon> Lookahead = 
   93:  *    Shift on <identifier-notify> to 7 because of <command>->•<identifier-notify><string><semicolon> Lookahead = 
   94:  *    Shift on <identifier-fileinto> to 8 because of <command>->•<identifier-fileinto><string><semicolon> Lookahead = 
   95:  *    Shift on <identifier-redirect> to 9 because of <command>->•<identifier-redirect><string><semicolon> Lookahead = 
   96:  *    Shift on <identifier-keep> to 10 because of <command>->•<identifier-keep><semicolon> Lookahead = 
   97:  *    Shift on <identifier-discard> to 11 because of <command>->•<identifier-discard><semicolon> Lookahead = 
   98:  *    Shift on <identifier-require> to 12 because of <command>->•<identifier-require><string-list><semicolon> Lookahead = 
   99:  *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block> Lookahead = 
  100:  *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
  101:  *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block><command-else> Lookahead = 
  102:  *    Shift on <identifier> to 14 because of <command>->•<identifier><arguments><semicolon> Lookahead = 
  103:  *    Shift on <identifier> to 14 because of <command>->•<identifier><arguments><bracket-open><block> Lookahead = 
  104:  *    Shift on <identifier> to 14 because of <command>->•<identifier><semicolon> Lookahead = 
  105:  *    Shift on <identifier> to 14 because of <command>->•<identifier><bracket-open><block> Lookahead = 
  106:  *    Shift on <hash-comment> to 15 because of <single-comment>->•<hash-comment> Lookahead = 
  107:  *    Shift on <bracket-comment> to 16 because of <single-comment>->•<bracket-comment> Lookahead = 
  108:  * ----------- 1 -----------
  109:  *   --Itemset--
  110:  *     <start>-><commands>•
  111:  *     <commands>-><commands>•<commented-command>
  112:  *    +<commented-command>->•<comment><command>
  113:  *    +<commented-command>->•<command>
  114:  *    +<comment>->•<comment><single-comment>
  115:  *    +<comment>->•<single-comment>
  116:  *    +<command>->•<identifier-stop><semicolon>
  117:  *    +<command>->•<identifier-notify><string><semicolon>
  118:  *    +<command>->•<identifier-fileinto><string><semicolon>
  119:  *    +<command>->•<identifier-redirect><string><semicolon>
  120:  *    +<command>->•<identifier-keep><semicolon>
  121:  *    +<command>->•<identifier-discard><semicolon>
  122:  *    +<command>->•<identifier-require><string-list><semicolon>
  123:  *    +<command>->•<identifier-if><test><bracket-open><block>
  124:  *    +<command>->•<identifier-if><test><bracket-open><block><command-elsif>
  125:  *    +<command>->•<identifier-if><test><bracket-open><block><command-else>
  126:  *    +<command>->•<identifier><arguments><semicolon>
  127:  *    +<command>->•<identifier><arguments><bracket-open><block>
  128:  *    +<command>->•<identifier><semicolon>
  129:  *    +<command>->•<identifier><bracket-open><block>
  130:  *    +<single-comment>->•<hash-comment>
  131:  *    +<single-comment>->•<bracket-comment>
  132:  *   --Transitions--
  133:  *    Accept on  using <start>-><commands>
  134:  *    Goto on <commented-command> to 17 because of <commands>-><commands>•<commented-command>
  135:  *    Goto on <comment> to 3 because of <commented-command>->•<comment><command>
  136:  *    Goto on <command> to 4 because of <commented-command>->•<command>
  137:  *    Goto on <comment> to 3 because of <comment>->•<comment><single-comment>
  138:  *    Goto on <single-comment> to 5 because of <comment>->•<single-comment>
  139:  *    Shift on <identifier-stop> to 6 because of <command>->•<identifier-stop><semicolon> Lookahead = 
  140:  *    Shift on <identifier-notify> to 7 because of <command>->•<identifier-notify><string><semicolon> Lookahead = 
  141:  *    Shift on <identifier-fileinto> to 8 because of <command>->•<identifier-fileinto><string><semicolon> Lookahead = 
  142:  *    Shift on <identifier-redirect> to 9 because of <command>->•<identifier-redirect><string><semicolon> Lookahead = 
  143:  *    Shift on <identifier-keep> to 10 because of <command>->•<identifier-keep><semicolon> Lookahead = 
  144:  *    Shift on <identifier-discard> to 11 because of <command>->•<identifier-discard><semicolon> Lookahead = 
  145:  *    Shift on <identifier-require> to 12 because of <command>->•<identifier-require><string-list><semicolon> Lookahead = 
  146:  *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block> Lookahead = 
  147:  *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
  148:  *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block><command-else> Lookahead = 
  149:  *    Shift on <identifier> to 14 because of <command>->•<identifier><arguments><semicolon> Lookahead = 
  150:  *    Shift on <identifier> to 14 because of <command>->•<identifier><arguments><bracket-open><block> Lookahead = 
  151:  *    Shift on <identifier> to 14 because of <command>->•<identifier><semicolon> Lookahead = 
  152:  *    Shift on <identifier> to 14 because of <command>->•<identifier><bracket-open><block> Lookahead = 
  153:  *    Shift on <hash-comment> to 15 because of <single-comment>->•<hash-comment> Lookahead = 
  154:  *    Shift on <bracket-comment> to 16 because of <single-comment>->•<bracket-comment> Lookahead = 
  155:  * ----------- 2 -----------
  156:  *   --Itemset--
  157:  *     <commands>-><commented-command>•
  158:  *   --Transitions--
  159:  *    Reduce on <identifier-stop> using <commands>-><commented-command> Lookahead = 
  160:  *    Reduce on <identifier-notify> using <commands>-><commented-command> Lookahead = 
  161:  *    Reduce on <identifier-fileinto> using <commands>-><commented-command> Lookahead = 
  162:  *    Reduce on <identifier-redirect> using <commands>-><commented-command> Lookahead = 
  163:  *    Reduce on <identifier-keep> using <commands>-><commented-command> Lookahead = 
  164:  *    Reduce on <identifier-discard> using <commands>-><commented-command> Lookahead = 
  165:  *    Reduce on <identifier-require> using <commands>-><commented-command> Lookahead = 
  166:  *    Reduce on <identifier-if> using <commands>-><commented-command> Lookahead = 
  167:  *    Reduce on <identifier> using <commands>-><commented-command> Lookahead = 
  168:  *    Reduce on <hash-comment> using <commands>-><commented-command> Lookahead = 
  169:  *    Reduce on <bracket-comment> using <commands>-><commented-command> Lookahead = 
  170:  *    Reduce on  using <commands>-><commented-command> Lookahead = 
  171:  * ----------- 3 -----------
  172:  *   --Itemset--
  173:  *     <commented-command>-><comment>•<command>
  174:  *     <comment>-><comment>•<single-comment>
  175:  *    +<command>->•<identifier-stop><semicolon>
  176:  *    +<command>->•<identifier-notify><string><semicolon>
  177:  *    +<command>->•<identifier-fileinto><string><semicolon>
  178:  *    +<command>->•<identifier-redirect><string><semicolon>
  179:  *    +<command>->•<identifier-keep><semicolon>
  180:  *    +<command>->•<identifier-discard><semicolon>
  181:  *    +<command>->•<identifier-require><string-list><semicolon>
  182:  *    +<command>->•<identifier-if><test><bracket-open><block>
  183:  *    +<command>->•<identifier-if><test><bracket-open><block><command-elsif>
  184:  *    +<command>->•<identifier-if><test><bracket-open><block><command-else>
  185:  *    +<command>->•<identifier><arguments><semicolon>
  186:  *    +<command>->•<identifier><arguments><bracket-open><block>
  187:  *    +<command>->•<identifier><semicolon>
  188:  *    +<command>->•<identifier><bracket-open><block>
  189:  *    +<single-comment>->•<hash-comment>
  190:  *    +<single-comment>->•<bracket-comment>
  191:  *   --Transitions--
  192:  *    Goto on <command> to 18 because of <commented-command>-><comment>•<command>
  193:  *    Goto on <single-comment> to 19 because of <comment>-><comment>•<single-comment>
  194:  *    Shift on <identifier-stop> to 6 because of <command>->•<identifier-stop><semicolon> Lookahead = 
  195:  *    Shift on <identifier-notify> to 7 because of <command>->•<identifier-notify><string><semicolon> Lookahead = 
  196:  *    Shift on <identifier-fileinto> to 8 because of <command>->•<identifier-fileinto><string><semicolon> Lookahead = 
  197:  *    Shift on <identifier-redirect> to 9 because of <command>->•<identifier-redirect><string><semicolon> Lookahead = 
  198:  *    Shift on <identifier-keep> to 10 because of <command>->•<identifier-keep><semicolon> Lookahead = 
  199:  *    Shift on <identifier-discard> to 11 because of <command>->•<identifier-discard><semicolon> Lookahead = 
  200:  *    Shift on <identifier-require> to 12 because of <command>->•<identifier-require><string-list><semicolon> Lookahead = 
  201:  *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block> Lookahead = 
  202:  *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
  203:  *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block><command-else> Lookahead = 
  204:  *    Shift on <identifier> to 14 because of <command>->•<identifier><arguments><semicolon> Lookahead = 
  205:  *    Shift on <identifier> to 14 because of <command>->•<identifier><arguments><bracket-open><block> Lookahead = 
  206:  *    Shift on <identifier> to 14 because of <command>->•<identifier><semicolon> Lookahead = 
  207:  *    Shift on <identifier> to 14 because of <command>->•<identifier><bracket-open><block> Lookahead = 
  208:  *    Shift on <hash-comment> to 15 because of <single-comment>->•<hash-comment> Lookahead = 
  209:  *    Shift on <bracket-comment> to 16 because of <single-comment>->•<bracket-comment> Lookahead = 
  210:  * ----------- 4 -----------
  211:  *   --Itemset--
  212:  *     <commented-command>-><command>•
  213:  *   --Transitions--
  214:  *    Reduce on <identifier-stop> using <commented-command>-><command> Lookahead = 
  215:  *    Reduce on <identifier-notify> using <commented-command>-><command> Lookahead = 
  216:  *    Reduce on <identifier-fileinto> using <commented-command>-><command> Lookahead = 
  217:  *    Reduce on <identifier-redirect> using <commented-command>-><command> Lookahead = 
  218:  *    Reduce on <identifier-keep> using <commented-command>-><command> Lookahead = 
  219:  *    Reduce on <identifier-discard> using <commented-command>-><command> Lookahead = 
  220:  *    Reduce on <identifier-require> using <commented-command>-><command> Lookahead = 
  221:  *    Reduce on <identifier-if> using <commented-command>-><command> Lookahead = 
  222:  *    Reduce on <identifier> using <commented-command>-><command> Lookahead = 
  223:  *    Reduce on <hash-comment> using <commented-command>-><command> Lookahead = 
  224:  *    Reduce on <bracket-comment> using <commented-command>-><command> Lookahead = 
  225:  *    Reduce on  using <commented-command>-><command> Lookahead = 
  226:  * ----------- 5 -----------
  227:  *   --Itemset--
  228:  *     <comment>-><single-comment>•
  229:  *   --Transitions--
  230:  *    Reduce on <identifier-stop> using <comment>-><single-comment> Lookahead = 
  231:  *    Reduce on <identifier-notify> using <comment>-><single-comment> Lookahead = 
  232:  *    Reduce on <identifier-fileinto> using <comment>-><single-comment> Lookahead = 
  233:  *    Reduce on <identifier-redirect> using <comment>-><single-comment> Lookahead = 
  234:  *    Reduce on <identifier-keep> using <comment>-><single-comment> Lookahead = 
  235:  *    Reduce on <identifier-discard> using <comment>-><single-comment> Lookahead = 
  236:  *    Reduce on <identifier-require> using <comment>-><single-comment> Lookahead = 
  237:  *    Reduce on <identifier-if> using <comment>-><single-comment> Lookahead = 
  238:  *    Reduce on <identifier> using <comment>-><single-comment> Lookahead = 
  239:  *    Reduce on <hash-comment> using <comment>-><single-comment> Lookahead = 
  240:  *    Reduce on <bracket-comment> using <comment>-><single-comment> Lookahead = 
  241:  * ----------- 6 -----------
  242:  *   --Itemset--
  243:  *     <command>-><identifier-stop>•<semicolon>
  244:  *   --Transitions--
  245:  *    Shift on <semicolon> to 20 because of <command>-><identifier-stop>•<semicolon> Lookahead = 
  246:  * ----------- 7 -----------
  247:  *   --Itemset--
  248:  *     <command>-><identifier-notify>•<string><semicolon>
  249:  *    +<string>->•<quoted-string>
  250:  *    +<string>->•<multi-line>
  251:  *   --Transitions--
  252:  *    Goto on <string> to 21 because of <command>-><identifier-notify>•<string><semicolon>
  253:  *    Shift on <quoted-string> to 22 because of <string>->•<quoted-string> Lookahead = 
  254:  *    Shift on <multi-line> to 23 because of <string>->•<multi-line> Lookahead = 
  255:  * ----------- 8 -----------
  256:  *   --Itemset--
  257:  *     <command>-><identifier-fileinto>•<string><semicolon>
  258:  *    +<string>->•<quoted-string>
  259:  *    +<string>->•<multi-line>
  260:  *   --Transitions--
  261:  *    Goto on <string> to 24 because of <command>-><identifier-fileinto>•<string><semicolon>
  262:  *    Shift on <quoted-string> to 22 because of <string>->•<quoted-string> Lookahead = 
  263:  *    Shift on <multi-line> to 23 because of <string>->•<multi-line> Lookahead = 
  264:  * ----------- 9 -----------
  265:  *   --Itemset--
  266:  *     <command>-><identifier-redirect>•<string><semicolon>
  267:  *    +<string>->•<quoted-string>
  268:  *    +<string>->•<multi-line>
  269:  *   --Transitions--
  270:  *    Goto on <string> to 25 because of <command>-><identifier-redirect>•<string><semicolon>
  271:  *    Shift on <quoted-string> to 22 because of <string>->•<quoted-string> Lookahead = 
  272:  *    Shift on <multi-line> to 23 because of <string>->•<multi-line> Lookahead = 
  273:  * ----------- 10 -----------
  274:  *   --Itemset--
  275:  *     <command>-><identifier-keep>•<semicolon>
  276:  *   --Transitions--
  277:  *    Shift on <semicolon> to 26 because of <command>-><identifier-keep>•<semicolon> Lookahead = 
  278:  * ----------- 11 -----------
  279:  *   --Itemset--
  280:  *     <command>-><identifier-discard>•<semicolon>
  281:  *   --Transitions--
  282:  *    Shift on <semicolon> to 27 because of <command>-><identifier-discard>•<semicolon> Lookahead = 
  283:  * ----------- 12 -----------
  284:  *   --Itemset--
  285:  *     <command>-><identifier-require>•<string-list><semicolon>
  286:  *    +<string-list>->•<square-parenthesis-open><string-plus-csv><square-parenthesis-close>
  287:  *    +<string-list>->•<string>
  288:  *    +<string>->•<quoted-string>
  289:  *    +<string>->•<multi-line>
  290:  *   --Transitions--
  291:  *    Goto on <string-list> to 28 because of <command>-><identifier-require>•<string-list><semicolon>
  292:  *    Shift on <square-parenthesis-open> to 29 because of <string-list>->•<square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
  293:  *    Goto on <string> to 30 because of <string-list>->•<string>
  294:  *    Shift on <quoted-string> to 22 because of <string>->•<quoted-string> Lookahead = 
  295:  *    Shift on <multi-line> to 23 because of <string>->•<multi-line> Lookahead = 
  296:  * ----------- 13 -----------
  297:  *   --Itemset--
  298:  *     <command>-><identifier-if>•<test><bracket-open><block>
  299:  *     <command>-><identifier-if>•<test><bracket-open><block><command-elsif>
  300:  *     <command>-><identifier-if>•<test><bracket-open><block><command-else>
  301:  *    +<test>->•<identifier-not><test>
  302:  *    +<test>->•<identifier><arguments>
  303:  *    +<test>->•<identifier>
  304:  *   --Transitions--
  305:  *    Goto on <test> to 31 because of <command>-><identifier-if>•<test><bracket-open><block>
  306:  *    Goto on <test> to 31 because of <command>-><identifier-if>•<test><bracket-open><block><command-elsif>
  307:  *    Goto on <test> to 31 because of <command>-><identifier-if>•<test><bracket-open><block><command-else>
  308:  *    Shift on <identifier-not> to 32 because of <test>->•<identifier-not><test> Lookahead = 
  309:  *    Shift on <identifier> to 33 because of <test>->•<identifier><arguments> Lookahead = 
  310:  *    Shift on <identifier> to 33 because of <test>->•<identifier> Lookahead = 
  311:  * ----------- 14 -----------
  312:  *   --Itemset--
  313:  *     <command>-><identifier>•<arguments><semicolon>
  314:  *     <command>-><identifier>•<arguments><bracket-open><block>
  315:  *     <command>-><identifier>•<semicolon>
  316:  *     <command>-><identifier>•<bracket-open><block>
  317:  *    +<arguments>->•<arguments-plus>
  318:  *    +<arguments>->•<arguments-plus><test>
  319:  *    +<arguments>->•<arguments-plus><test-list>
  320:  *    +<arguments>->•<test>
  321:  *    +<arguments>->•<test-list>
  322:  *    +<arguments-plus>->•<arguments-plus><argument>
  323:  *    +<arguments-plus>->•<argument>
  324:  *    +<test>->•<identifier-not><test>
  325:  *    +<test>->•<identifier><arguments>
  326:  *    +<test>->•<identifier>
  327:  *    +<test-list>->•<parenthesis-open><test-plus-csv><parenthesis-close>
  328:  *    +<argument>->•<string-list>
  329:  *    +<argument>->•<number>
  330:  *    +<argument>->•<tag>
  331:  *    +<string-list>->•<square-parenthesis-open><string-plus-csv><square-parenthesis-close>
  332:  *    +<string-list>->•<string>
  333:  *    +<string>->•<quoted-string>
  334:  *    +<string>->•<multi-line>
  335:  *   --Transitions--
  336:  *    Goto on <arguments> to 34 because of <command>-><identifier>•<arguments><semicolon>
  337:  *    Goto on <arguments> to 34 because of <command>-><identifier>•<arguments><bracket-open><block>
  338:  *    Shift on <semicolon> to 35 because of <command>-><identifier>•<semicolon> Lookahead = 
  339:  *    Shift on <bracket-open> to 36 because of <command>-><identifier>•<bracket-open><block> Lookahead = 
  340:  *    Goto on <arguments-plus> to 37 because of <arguments>->•<arguments-plus>
  341:  *    Goto on <arguments-plus> to 37 because of <arguments>->•<arguments-plus><test>
  342:  *    Goto on <arguments-plus> to 37 because of <arguments>->•<arguments-plus><test-list>
  343:  *    Goto on <test> to 38 because of <arguments>->•<test>
  344:  *    Goto on <test-list> to 39 because of <arguments>->•<test-list>
  345:  *    Goto on <arguments-plus> to 37 because of <arguments-plus>->•<arguments-plus><argument>
  346:  *    Goto on <argument> to 40 because of <arguments-plus>->•<argument>
  347:  *    Shift on <identifier-not> to 32 because of <test>->•<identifier-not><test> Lookahead = 
  348:  *    Shift on <identifier> to 33 because of <test>->•<identifier><arguments> Lookahead = 
  349:  *    Shift on <identifier> to 33 because of <test>->•<identifier> Lookahead = 
  350:  *    Shift on <parenthesis-open> to 41 because of <test-list>->•<parenthesis-open><test-plus-csv><parenthesis-close> Lookahead = 
  351:  *    Goto on <string-list> to 42 because of <argument>->•<string-list>
  352:  *    Shift on <number> to 43 because of <argument>->•<number> Lookahead = 
  353:  *    Shift on <tag> to 44 because of <argument>->•<tag> Lookahead = 
  354:  *    Shift on <square-parenthesis-open> to 29 because of <string-list>->•<square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
  355:  *    Goto on <string> to 30 because of <string-list>->•<string>
  356:  *    Shift on <quoted-string> to 22 because of <string>->•<quoted-string> Lookahead = 
  357:  *    Shift on <multi-line> to 23 because of <string>->•<multi-line> Lookahead = 
  358:  * ----------- 15 -----------
  359:  *   --Itemset--
  360:  *     <single-comment>-><hash-comment>•
  361:  *   --Transitions--
  362:  *    Reduce on <identifier-stop> using <single-comment>-><hash-comment> Lookahead = 
  363:  *    Reduce on <identifier-notify> using <single-comment>-><hash-comment> Lookahead = 
  364:  *    Reduce on <identifier-fileinto> using <single-comment>-><hash-comment> Lookahead = 
  365:  *    Reduce on <identifier-redirect> using <single-comment>-><hash-comment> Lookahead = 
  366:  *    Reduce on <identifier-keep> using <single-comment>-><hash-comment> Lookahead = 
  367:  *    Reduce on <identifier-discard> using <single-comment>-><hash-comment> Lookahead = 
  368:  *    Reduce on <identifier-require> using <single-comment>-><hash-comment> Lookahead = 
  369:  *    Reduce on <identifier-if> using <single-comment>-><hash-comment> Lookahead = 
  370:  *    Reduce on <identifier> using <single-comment>-><hash-comment> Lookahead = 
  371:  *    Reduce on <hash-comment> using <single-comment>-><hash-comment> Lookahead = 
  372:  *    Reduce on <bracket-comment> using <single-comment>-><hash-comment> Lookahead = 
  373:  * ----------- 16 -----------
  374:  *   --Itemset--
  375:  *     <single-comment>-><bracket-comment>•
  376:  *   --Transitions--
  377:  *    Reduce on <identifier-stop> using <single-comment>-><bracket-comment> Lookahead = 
  378:  *    Reduce on <identifier-notify> using <single-comment>-><bracket-comment> Lookahead = 
  379:  *    Reduce on <identifier-fileinto> using <single-comment>-><bracket-comment> Lookahead = 
  380:  *    Reduce on <identifier-redirect> using <single-comment>-><bracket-comment> Lookahead = 
  381:  *    Reduce on <identifier-keep> using <single-comment>-><bracket-comment> Lookahead = 
  382:  *    Reduce on <identifier-discard> using <single-comment>-><bracket-comment> Lookahead = 
  383:  *    Reduce on <identifier-require> using <single-comment>-><bracket-comment> Lookahead = 
  384:  *    Reduce on <identifier-if> using <single-comment>-><bracket-comment> Lookahead = 
  385:  *    Reduce on <identifier> using <single-comment>-><bracket-comment> Lookahead = 
  386:  *    Reduce on <hash-comment> using <single-comment>-><bracket-comment> Lookahead = 
  387:  *    Reduce on <bracket-comment> using <single-comment>-><bracket-comment> Lookahead = 
  388:  * ----------- 17 -----------
  389:  *   --Itemset--
  390:  *     <commands>-><commands><commented-command>•
  391:  *   --Transitions--
  392:  *    Reduce on <identifier-stop> using <commands>-><commands><commented-command> Lookahead = 
  393:  *    Reduce on <identifier-notify> using <commands>-><commands><commented-command> Lookahead = 
  394:  *    Reduce on <identifier-fileinto> using <commands>-><commands><commented-command> Lookahead = 
  395:  *    Reduce on <identifier-redirect> using <commands>-><commands><commented-command> Lookahead = 
  396:  *    Reduce on <identifier-keep> using <commands>-><commands><commented-command> Lookahead = 
  397:  *    Reduce on <identifier-discard> using <commands>-><commands><commented-command> Lookahead = 
  398:  *    Reduce on <identifier-require> using <commands>-><commands><commented-command> Lookahead = 
  399:  *    Reduce on <identifier-if> using <commands>-><commands><commented-command> Lookahead = 
  400:  *    Reduce on <identifier> using <commands>-><commands><commented-command> Lookahead = 
  401:  *    Reduce on <hash-comment> using <commands>-><commands><commented-command> Lookahead = 
  402:  *    Reduce on <bracket-comment> using <commands>-><commands><commented-command> Lookahead = 
  403:  *    Reduce on  using <commands>-><commands><commented-command> Lookahead = 
  404:  * ----------- 18 -----------
  405:  *   --Itemset--
  406:  *     <commented-command>-><comment><command>•
  407:  *   --Transitions--
  408:  *    Reduce on <identifier-stop> using <commented-command>-><comment><command> Lookahead = 
  409:  *    Reduce on <identifier-notify> using <commented-command>-><comment><command> Lookahead = 
  410:  *    Reduce on <identifier-fileinto> using <commented-command>-><comment><command> Lookahead = 
  411:  *    Reduce on <identifier-redirect> using <commented-command>-><comment><command> Lookahead = 
  412:  *    Reduce on <identifier-keep> using <commented-command>-><comment><command> Lookahead = 
  413:  *    Reduce on <identifier-discard> using <commented-command>-><comment><command> Lookahead = 
  414:  *    Reduce on <identifier-require> using <commented-command>-><comment><command> Lookahead = 
  415:  *    Reduce on <identifier-if> using <commented-command>-><comment><command> Lookahead = 
  416:  *    Reduce on <identifier> using <commented-command>-><comment><command> Lookahead = 
  417:  *    Reduce on <hash-comment> using <commented-command>-><comment><command> Lookahead = 
  418:  *    Reduce on <bracket-comment> using <commented-command>-><comment><command> Lookahead = 
  419:  *    Reduce on  using <commented-command>-><comment><command> Lookahead = 
  420:  * ----------- 19 -----------
  421:  *   --Itemset--
  422:  *     <comment>-><comment><single-comment>•
  423:  *   --Transitions--
  424:  *    Reduce on <identifier-stop> using <comment>-><comment><single-comment> Lookahead = 
  425:  *    Reduce on <identifier-notify> using <comment>-><comment><single-comment> Lookahead = 
  426:  *    Reduce on <identifier-fileinto> using <comment>-><comment><single-comment> Lookahead = 
  427:  *    Reduce on <identifier-redirect> using <comment>-><comment><single-comment> Lookahead = 
  428:  *    Reduce on <identifier-keep> using <comment>-><comment><single-comment> Lookahead = 
  429:  *    Reduce on <identifier-discard> using <comment>-><comment><single-comment> Lookahead = 
  430:  *    Reduce on <identifier-require> using <comment>-><comment><single-comment> Lookahead = 
  431:  *    Reduce on <identifier-if> using <comment>-><comment><single-comment> Lookahead = 
  432:  *    Reduce on <identifier> using <comment>-><comment><single-comment> Lookahead = 
  433:  *    Reduce on <hash-comment> using <comment>-><comment><single-comment> Lookahead = 
  434:  *    Reduce on <bracket-comment> using <comment>-><comment><single-comment> Lookahead = 
  435:  * ----------- 20 -----------
  436:  *   --Itemset--
  437:  *     <command>-><identifier-stop><semicolon>•
  438:  *   --Transitions--
  439:  *    Reduce on <identifier-stop> using <command>-><identifier-stop><semicolon> Lookahead = 
  440:  *    Reduce on <identifier-notify> using <command>-><identifier-stop><semicolon> Lookahead = 
  441:  *    Reduce on <identifier-fileinto> using <command>-><identifier-stop><semicolon> Lookahead = 
  442:  *    Reduce on <identifier-redirect> using <command>-><identifier-stop><semicolon> Lookahead = 
  443:  *    Reduce on <identifier-keep> using <command>-><identifier-stop><semicolon> Lookahead = 
  444:  *    Reduce on <identifier-discard> using <command>-><identifier-stop><semicolon> Lookahead = 
  445:  *    Reduce on <identifier-require> using <command>-><identifier-stop><semicolon> Lookahead = 
  446:  *    Reduce on <identifier-if> using <command>-><identifier-stop><semicolon> Lookahead = 
  447:  *    Reduce on <identifier> using <command>-><identifier-stop><semicolon> Lookahead = 
  448:  *    Reduce on <bracket-close> using <command>-><identifier-stop><semicolon> Lookahead = 
  449:  *    Reduce on <hash-comment> using <command>-><identifier-stop><semicolon> Lookahead = 
  450:  *    Reduce on <bracket-comment> using <command>-><identifier-stop><semicolon> Lookahead = 
  451:  *    Reduce on  using <command>-><identifier-stop><semicolon> Lookahead = 
  452:  * ----------- 21 -----------
  453:  *   --Itemset--
  454:  *     <command>-><identifier-notify><string>•<semicolon>
  455:  *   --Transitions--
  456:  *    Shift on <semicolon> to 45 because of <command>-><identifier-notify><string>•<semicolon> Lookahead = 
  457:  * ----------- 22 -----------
  458:  *   --Itemset--
  459:  *     <string>-><quoted-string>•
  460:  *   --Transitions--
  461:  *    Reduce on <semicolon> using <string>-><quoted-string> Lookahead = 
  462:  *    Reduce on <bracket-open> using <string>-><quoted-string> Lookahead = 
  463:  *    Reduce on <identifier> using <string>-><quoted-string> Lookahead = 
  464:  *    Reduce on <identifier-not> using <string>-><quoted-string> Lookahead = 
  465:  *    Reduce on <parenthesis-open> using <string>-><quoted-string> Lookahead = 
  466:  *    Reduce on <parenthesis-close> using <string>-><quoted-string> Lookahead = 
  467:  *    Reduce on <comma> using <string>-><quoted-string> Lookahead = 
  468:  *    Reduce on <number> using <string>-><quoted-string> Lookahead = 
  469:  *    Reduce on <tag> using <string>-><quoted-string> Lookahead = 
  470:  *    Reduce on <square-parenthesis-open> using <string>-><quoted-string> Lookahead = 
  471:  *    Reduce on <square-parenthesis-close> using <string>-><quoted-string> Lookahead = 
  472:  *    Reduce on <quoted-string> using <string>-><quoted-string> Lookahead = 
  473:  *    Reduce on <multi-line> using <string>-><quoted-string> Lookahead = 
  474:  * ----------- 23 -----------
  475:  *   --Itemset--
  476:  *     <string>-><multi-line>•
  477:  *   --Transitions--
  478:  *    Reduce on <semicolon> using <string>-><multi-line> Lookahead = 
  479:  *    Reduce on <bracket-open> using <string>-><multi-line> Lookahead = 
  480:  *    Reduce on <identifier> using <string>-><multi-line> Lookahead = 
  481:  *    Reduce on <identifier-not> using <string>-><multi-line> Lookahead = 
  482:  *    Reduce on <parenthesis-open> using <string>-><multi-line> Lookahead = 
  483:  *    Reduce on <parenthesis-close> using <string>-><multi-line> Lookahead = 
  484:  *    Reduce on <comma> using <string>-><multi-line> Lookahead = 
  485:  *    Reduce on <number> using <string>-><multi-line> Lookahead = 
  486:  *    Reduce on <tag> using <string>-><multi-line> Lookahead = 
  487:  *    Reduce on <square-parenthesis-open> using <string>-><multi-line> Lookahead = 
  488:  *    Reduce on <square-parenthesis-close> using <string>-><multi-line> Lookahead = 
  489:  *    Reduce on <quoted-string> using <string>-><multi-line> Lookahead = 
  490:  *    Reduce on <multi-line> using <string>-><multi-line> Lookahead = 
  491:  * ----------- 24 -----------
  492:  *   --Itemset--
  493:  *     <command>-><identifier-fileinto><string>•<semicolon>
  494:  *   --Transitions--
  495:  *    Shift on <semicolon> to 46 because of <command>-><identifier-fileinto><string>•<semicolon> Lookahead = 
  496:  * ----------- 25 -----------
  497:  *   --Itemset--
  498:  *     <command>-><identifier-redirect><string>•<semicolon>
  499:  *   --Transitions--
  500:  *    Shift on <semicolon> to 47 because of <command>-><identifier-redirect><string>•<semicolon> Lookahead = 
  501:  * ----------- 26 -----------
  502:  *   --Itemset--
  503:  *     <command>-><identifier-keep><semicolon>•
  504:  *   --Transitions--
  505:  *    Reduce on <identifier-stop> using <command>-><identifier-keep><semicolon> Lookahead = 
  506:  *    Reduce on <identifier-notify> using <command>-><identifier-keep><semicolon> Lookahead = 
  507:  *    Reduce on <identifier-fileinto> using <command>-><identifier-keep><semicolon> Lookahead = 
  508:  *    Reduce on <identifier-redirect> using <command>-><identifier-keep><semicolon> Lookahead = 
  509:  *    Reduce on <identifier-keep> using <command>-><identifier-keep><semicolon> Lookahead = 
  510:  *    Reduce on <identifier-discard> using <command>-><identifier-keep><semicolon> Lookahead = 
  511:  *    Reduce on <identifier-require> using <command>-><identifier-keep><semicolon> Lookahead = 
  512:  *    Reduce on <identifier-if> using <command>-><identifier-keep><semicolon> Lookahead = 
  513:  *    Reduce on <identifier> using <command>-><identifier-keep><semicolon> Lookahead = 
  514:  *    Reduce on <bracket-close> using <command>-><identifier-keep><semicolon> Lookahead = 
  515:  *    Reduce on <hash-comment> using <command>-><identifier-keep><semicolon> Lookahead = 
  516:  *    Reduce on <bracket-comment> using <command>-><identifier-keep><semicolon> Lookahead = 
  517:  *    Reduce on  using <command>-><identifier-keep><semicolon> Lookahead = 
  518:  * ----------- 27 -----------
  519:  *   --Itemset--
  520:  *     <command>-><identifier-discard><semicolon>•
  521:  *   --Transitions--
  522:  *    Reduce on <identifier-stop> using <command>-><identifier-discard><semicolon> Lookahead = 
  523:  *    Reduce on <identifier-notify> using <command>-><identifier-discard><semicolon> Lookahead = 
  524:  *    Reduce on <identifier-fileinto> using <command>-><identifier-discard><semicolon> Lookahead = 
  525:  *    Reduce on <identifier-redirect> using <command>-><identifier-discard><semicolon> Lookahead = 
  526:  *    Reduce on <identifier-keep> using <command>-><identifier-discard><semicolon> Lookahead = 
  527:  *    Reduce on <identifier-discard> using <command>-><identifier-discard><semicolon> Lookahead = 
  528:  *    Reduce on <identifier-require> using <command>-><identifier-discard><semicolon> Lookahead = 
  529:  *    Reduce on <identifier-if> using <command>-><identifier-discard><semicolon> Lookahead = 
  530:  *    Reduce on <identifier> using <command>-><identifier-discard><semicolon> Lookahead = 
  531:  *    Reduce on <bracket-close> using <command>-><identifier-discard><semicolon> Lookahead = 
  532:  *    Reduce on <hash-comment> using <command>-><identifier-discard><semicolon> Lookahead = 
  533:  *    Reduce on <bracket-comment> using <command>-><identifier-discard><semicolon> Lookahead = 
  534:  *    Reduce on  using <command>-><identifier-discard><semicolon> Lookahead = 
  535:  * ----------- 28 -----------
  536:  *   --Itemset--
  537:  *     <command>-><identifier-require><string-list>•<semicolon>
  538:  *   --Transitions--
  539:  *    Shift on <semicolon> to 48 because of <command>-><identifier-require><string-list>•<semicolon> Lookahead = 
  540:  * ----------- 29 -----------
  541:  *   --Itemset--
  542:  *     <string-list>-><square-parenthesis-open>•<string-plus-csv><square-parenthesis-close>
  543:  *    +<string-plus-csv>->•<string>
  544:  *    +<string-plus-csv>->•<string-plus-csv><comma><string>
  545:  *    +<string>->•<quoted-string>
  546:  *    +<string>->•<multi-line>
  547:  *   --Transitions--
  548:  *    Goto on <string-plus-csv> to 49 because of <string-list>-><square-parenthesis-open>•<string-plus-csv><square-parenthesis-close>
  549:  *    Goto on <string> to 50 because of <string-plus-csv>->•<string>
  550:  *    Goto on <string-plus-csv> to 49 because of <string-plus-csv>->•<string-plus-csv><comma><string>
  551:  *    Shift on <quoted-string> to 22 because of <string>->•<quoted-string> Lookahead = 
  552:  *    Shift on <multi-line> to 23 because of <string>->•<multi-line> Lookahead = 
  553:  * ----------- 30 -----------
  554:  *   --Itemset--
  555:  *     <string-list>-><string>•
  556:  *   --Transitions--
  557:  *    Reduce on <semicolon> using <string-list>-><string> Lookahead = 
  558:  *    Reduce on <bracket-open> using <string-list>-><string> Lookahead = 
  559:  *    Reduce on <identifier> using <string-list>-><string> Lookahead = 
  560:  *    Reduce on <identifier-not> using <string-list>-><string> Lookahead = 
  561:  *    Reduce on <parenthesis-open> using <string-list>-><string> Lookahead = 
  562:  *    Reduce on <parenthesis-close> using <string-list>-><string> Lookahead = 
  563:  *    Reduce on <comma> using <string-list>-><string> Lookahead = 
  564:  *    Reduce on <number> using <string-list>-><string> Lookahead = 
  565:  *    Reduce on <tag> using <string-list>-><string> Lookahead = 
  566:  *    Reduce on <square-parenthesis-open> using <string-list>-><string> Lookahead = 
  567:  *    Reduce on <quoted-string> using <string-list>-><string> Lookahead = 
  568:  *    Reduce on <multi-line> using <string-list>-><string> Lookahead = 
  569:  * ----------- 31 -----------
  570:  *   --Itemset--
  571:  *     <command>-><identifier-if><test>•<bracket-open><block>
  572:  *     <command>-><identifier-if><test>•<bracket-open><block><command-elsif>
  573:  *     <command>-><identifier-if><test>•<bracket-open><block><command-else>
  574:  *   --Transitions--
  575:  *    Shift on <bracket-open> to 51 because of <command>-><identifier-if><test>•<bracket-open><block> Lookahead = 
  576:  *    Shift on <bracket-open> to 51 because of <command>-><identifier-if><test>•<bracket-open><block><command-elsif> Lookahead = 
  577:  *    Shift on <bracket-open> to 51 because of <command>-><identifier-if><test>•<bracket-open><block><command-else> Lookahead = 
  578:  * ----------- 32 -----------
  579:  *   --Itemset--
  580:  *     <test>-><identifier-not>•<test>
  581:  *    +<test>->•<identifier-not><test>
  582:  *    +<test>->•<identifier><arguments>
  583:  *    +<test>->•<identifier>
  584:  *   --Transitions--
  585:  *    Goto on <test> to 52 because of <test>-><identifier-not>•<test>
  586:  *    Shift on <identifier-not> to 32 because of <test>->•<identifier-not><test> Lookahead = 
  587:  *    Shift on <identifier> to 33 because of <test>->•<identifier><arguments> Lookahead = 
  588:  *    Shift on <identifier> to 33 because of <test>->•<identifier> Lookahead = 
  589:  * ----------- 33 -----------
  590:  *   --Itemset--
  591:  *     <test>-><identifier>•<arguments>
  592:  *     <test>-><identifier>•
  593:  *    +<arguments>->•<arguments-plus>
  594:  *    +<arguments>->•<arguments-plus><test>
  595:  *    +<arguments>->•<arguments-plus><test-list>
  596:  *    +<arguments>->•<test>
  597:  *    +<arguments>->•<test-list>
  598:  *    +<arguments-plus>->•<arguments-plus><argument>
  599:  *    +<arguments-plus>->•<argument>
  600:  *    +<test>->•<identifier-not><test>
  601:  *    +<test>->•<identifier><arguments>
  602:  *    +<test>->•<identifier>
  603:  *    +<test-list>->•<parenthesis-open><test-plus-csv><parenthesis-close>
  604:  *    +<argument>->•<string-list>
  605:  *    +<argument>->•<number>
  606:  *    +<argument>->•<tag>
  607:  *    +<string-list>->•<square-parenthesis-open><string-plus-csv><square-parenthesis-close>
  608:  *    +<string-list>->•<string>
  609:  *    +<string>->•<quoted-string>
  610:  *    +<string>->•<multi-line>
  611:  *   --Transitions--
  612:  *    Goto on <arguments> to 53 because of <test>-><identifier>•<arguments>
  613:  *    Reduce on <semicolon> using <test>-><identifier> Lookahead = 
  614:  *    Reduce on <bracket-open> using <test>-><identifier> Lookahead = 
  615:  *    Reduce on <parenthesis-close> using <test>-><identifier> Lookahead = 
  616:  *    Reduce on <comma> using <test>-><identifier> Lookahead = 
  617:  *    Goto on <arguments-plus> to 37 because of <arguments>->•<arguments-plus>
  618:  *    Goto on <arguments-plus> to 37 because of <arguments>->•<arguments-plus><test>
  619:  *    Goto on <arguments-plus> to 37 because of <arguments>->•<arguments-plus><test-list>
  620:  *    Goto on <test> to 38 because of <arguments>->•<test>
  621:  *    Goto on <test-list> to 39 because of <arguments>->•<test-list>
  622:  *    Goto on <arguments-plus> to 37 because of <arguments-plus>->•<arguments-plus><argument>
  623:  *    Goto on <argument> to 40 because of <arguments-plus>->•<argument>
  624:  *    Shift on <identifier-not> to 32 because of <test>->•<identifier-not><test> Lookahead = 
  625:  *    Shift on <identifier> to 33 because of <test>->•<identifier><arguments> Lookahead = 
  626:  *    Shift on <identifier> to 33 because of <test>->•<identifier> Lookahead = 
  627:  *    Shift on <parenthesis-open> to 41 because of <test-list>->•<parenthesis-open><test-plus-csv><parenthesis-close> Lookahead = 
  628:  *    Goto on <string-list> to 42 because of <argument>->•<string-list>
  629:  *    Shift on <number> to 43 because of <argument>->•<number> Lookahead = 
  630:  *    Shift on <tag> to 44 because of <argument>->•<tag> Lookahead = 
  631:  *    Shift on <square-parenthesis-open> to 29 because of <string-list>->•<square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
  632:  *    Goto on <string> to 30 because of <string-list>->•<string>
  633:  *    Shift on <quoted-string> to 22 because of <string>->•<quoted-string> Lookahead = 
  634:  *    Shift on <multi-line> to 23 because of <string>->•<multi-line> Lookahead = 
  635:  * ----------- 34 -----------
  636:  *   --Itemset--
  637:  *     <command>-><identifier><arguments>•<semicolon>
  638:  *     <command>-><identifier><arguments>•<bracket-open><block>
  639:  *   --Transitions--
  640:  *    Shift on <semicolon> to 54 because of <command>-><identifier><arguments>•<semicolon> Lookahead = 
  641:  *    Shift on <bracket-open> to 55 because of <command>-><identifier><arguments>•<bracket-open><block> Lookahead = 
  642:  * ----------- 35 -----------
  643:  *   --Itemset--
  644:  *     <command>-><identifier><semicolon>•
  645:  *   --Transitions--
  646:  *    Reduce on <identifier-stop> using <command>-><identifier><semicolon> Lookahead = 
  647:  *    Reduce on <identifier-notify> using <command>-><identifier><semicolon> Lookahead = 
  648:  *    Reduce on <identifier-fileinto> using <command>-><identifier><semicolon> Lookahead = 
  649:  *    Reduce on <identifier-redirect> using <command>-><identifier><semicolon> Lookahead = 
  650:  *    Reduce on <identifier-keep> using <command>-><identifier><semicolon> Lookahead = 
  651:  *    Reduce on <identifier-discard> using <command>-><identifier><semicolon> Lookahead = 
  652:  *    Reduce on <identifier-require> using <command>-><identifier><semicolon> Lookahead = 
  653:  *    Reduce on <identifier-if> using <command>-><identifier><semicolon> Lookahead = 
  654:  *    Reduce on <identifier> using <command>-><identifier><semicolon> Lookahead = 
  655:  *    Reduce on <bracket-close> using <command>-><identifier><semicolon> Lookahead = 
  656:  *    Reduce on <hash-comment> using <command>-><identifier><semicolon> Lookahead = 
  657:  *    Reduce on <bracket-comment> using <command>-><identifier><semicolon> Lookahead = 
  658:  *    Reduce on  using <command>-><identifier><semicolon> Lookahead = 
  659:  * ----------- 36 -----------
  660:  *   --Itemset--
  661:  *     <command>-><identifier><bracket-open>•<block>
  662:  *    +<block>->•<command><block>
  663:  *    +<block>->•<bracket-close>
  664:  *    +<command>->•<identifier-stop><semicolon>
  665:  *    +<command>->•<identifier-notify><string><semicolon>
  666:  *    +<command>->•<identifier-fileinto><string><semicolon>
  667:  *    +<command>->•<identifier-redirect><string><semicolon>
  668:  *    +<command>->•<identifier-keep><semicolon>
  669:  *    +<command>->•<identifier-discard><semicolon>
  670:  *    +<command>->•<identifier-require><string-list><semicolon>
  671:  *    +<command>->•<identifier-if><test><bracket-open><block>
  672:  *    +<command>->•<identifier-if><test><bracket-open><block><command-elsif>
  673:  *    +<command>->•<identifier-if><test><bracket-open><block><command-else>
  674:  *    +<command>->•<identifier><arguments><semicolon>
  675:  *    +<command>->•<identifier><arguments><bracket-open><block>
  676:  *    +<command>->•<identifier><semicolon>
  677:  *    +<command>->•<identifier><bracket-open><block>
  678:  *   --Transitions--
  679:  *    Goto on <block> to 56 because of <command>-><identifier><bracket-open>•<block>
  680:  *    Goto on <command> to 57 because of <block>->•<command><block>
  681:  *    Shift on <bracket-close> to 58 because of <block>->•<bracket-close> Lookahead = 
  682:  *    Shift on <identifier-stop> to 6 because of <command>->•<identifier-stop><semicolon> Lookahead = 
  683:  *    Shift on <identifier-notify> to 7 because of <command>->•<identifier-notify><string><semicolon> Lookahead = 
  684:  *    Shift on <identifier-fileinto> to 8 because of <command>->•<identifier-fileinto><string><semicolon> Lookahead = 
  685:  *    Shift on <identifier-redirect> to 9 because of <command>->•<identifier-redirect><string><semicolon> Lookahead = 
  686:  *    Shift on <identifier-keep> to 10 because of <command>->•<identifier-keep><semicolon> Lookahead = 
  687:  *    Shift on <identifier-discard> to 11 because of <command>->•<identifier-discard><semicolon> Lookahead = 
  688:  *    Shift on <identifier-require> to 12 because of <command>->•<identifier-require><string-list><semicolon> Lookahead = 
  689:  *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block> Lookahead = 
  690:  *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
  691:  *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block><command-else> Lookahead = 
  692:  *    Shift on <identifier> to 14 because of <command>->•<identifier><arguments><semicolon> Lookahead = 
  693:  *    Shift on <identifier> to 14 because of <command>->•<identifier><arguments><bracket-open><block> Lookahead = 
  694:  *    Shift on <identifier> to 14 because of <command>->•<identifier><semicolon> Lookahead = 
  695:  *    Shift on <identifier> to 14 because of <command>->•<identifier><bracket-open><block> Lookahead = 
  696:  * ----------- 37 -----------
  697:  *   --Itemset--
  698:  *     <arguments>-><arguments-plus>•
  699:  *     <arguments>-><arguments-plus>•<test>
  700:  *     <arguments>-><arguments-plus>•<test-list>
  701:  *     <arguments-plus>-><arguments-plus>•<argument>
  702:  *    +<test>->•<identifier-not><test>
  703:  *    +<test>->•<identifier><arguments>
  704:  *    +<test>->•<identifier>
  705:  *    +<test-list>->•<parenthesis-open><test-plus-csv><parenthesis-close>
  706:  *    +<argument>->•<string-list>
  707:  *    +<argument>->•<number>
  708:  *    +<argument>->•<tag>
  709:  *    +<string-list>->•<square-parenthesis-open><string-plus-csv><square-parenthesis-close>
  710:  *    +<string-list>->•<string>
  711:  *    +<string>->•<quoted-string>
  712:  *    +<string>->•<multi-line>
  713:  *   --Transitions--
  714:  *    Reduce on <semicolon> using <arguments>-><arguments-plus> Lookahead = 
  715:  *    Reduce on <bracket-open> using <arguments>-><arguments-plus> Lookahead = 
  716:  *    Reduce on <parenthesis-close> using <arguments>-><arguments-plus> Lookahead = 
  717:  *    Reduce on <comma> using <arguments>-><arguments-plus> Lookahead = 
  718:  *    Goto on <test> to 59 because of <arguments>-><arguments-plus>•<test>
  719:  *    Goto on <test-list> to 60 because of <arguments>-><arguments-plus>•<test-list>
  720:  *    Goto on <argument> to 61 because of <arguments-plus>-><arguments-plus>•<argument>
  721:  *    Shift on <identifier-not> to 32 because of <test>->•<identifier-not><test> Lookahead = 
  722:  *    Shift on <identifier> to 33 because of <test>->•<identifier><arguments> Lookahead = 
  723:  *    Shift on <identifier> to 33 because of <test>->•<identifier> Lookahead = 
  724:  *    Shift on <parenthesis-open> to 41 because of <test-list>->•<parenthesis-open><test-plus-csv><parenthesis-close> Lookahead = 
  725:  *    Goto on <string-list> to 42 because of <argument>->•<string-list>
  726:  *    Shift on <number> to 43 because of <argument>->•<number> Lookahead = 
  727:  *    Shift on <tag> to 44 because of <argument>->•<tag> Lookahead = 
  728:  *    Shift on <square-parenthesis-open> to 29 because of <string-list>->•<square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
  729:  *    Goto on <string> to 30 because of <string-list>->•<string>
  730:  *    Shift on <quoted-string> to 22 because of <string>->•<quoted-string> Lookahead = 
  731:  *    Shift on <multi-line> to 23 because of <string>->•<multi-line> Lookahead = 
  732:  * ----------- 38 -----------
  733:  *   --Itemset--
  734:  *     <arguments>-><test>•
  735:  *   --Transitions--
  736:  *    Reduce on <semicolon> using <arguments>-><test> Lookahead = 
  737:  *    Reduce on <bracket-open> using <arguments>-><test> Lookahead = 
  738:  * ----------- 39 -----------
  739:  *   --Itemset--
  740:  *     <arguments>-><test-list>•
  741:  *   --Transitions--
  742:  *    Reduce on <semicolon> using <arguments>-><test-list> Lookahead = 
  743:  *    Reduce on <bracket-open> using <arguments>-><test-list> Lookahead = 
  744:  *    Reduce on <parenthesis-close> using <arguments>-><test-list> Lookahead = 
  745:  *    Reduce on <comma> using <arguments>-><test-list> Lookahead = 
  746:  * ----------- 40 -----------
  747:  *   --Itemset--
  748:  *     <arguments-plus>-><argument>•
  749:  *   --Transitions--
  750:  *    Reduce on <semicolon> using <arguments-plus>-><argument> Lookahead = 
  751:  *    Reduce on <bracket-open> using <arguments-plus>-><argument> Lookahead = 
  752:  *    Reduce on <identifier> using <arguments-plus>-><argument> Lookahead = 
  753:  *    Reduce on <identifier-not> using <arguments-plus>-><argument> Lookahead = 
  754:  *    Reduce on <parenthesis-open> using <arguments-plus>-><argument> Lookahead = 
  755:  *    Reduce on <parenthesis-close> using <arguments-plus>-><argument> Lookahead = 
  756:  *    Reduce on <comma> using <arguments-plus>-><argument> Lookahead = 
  757:  *    Reduce on <number> using <arguments-plus>-><argument> Lookahead = 
  758:  *    Reduce on <tag> using <arguments-plus>-><argument> Lookahead = 
  759:  *    Reduce on <square-parenthesis-open> using <arguments-plus>-><argument> Lookahead = 
  760:  *    Reduce on <quoted-string> using <arguments-plus>-><argument> Lookahead = 
  761:  *    Reduce on <multi-line> using <arguments-plus>-><argument> Lookahead = 
  762:  * ----------- 41 -----------
  763:  *   --Itemset--
  764:  *     <test-list>-><parenthesis-open>•<test-plus-csv><parenthesis-close>
  765:  *    +<test-plus-csv>->•<test>
  766:  *    +<test-plus-csv>->•<test-plus-csv><comma><test>
  767:  *    +<test>->•<identifier-not><test>
  768:  *    +<test>->•<identifier><arguments>
  769:  *    +<test>->•<identifier>
  770:  *   --Transitions--
  771:  *    Goto on <test-plus-csv> to 62 because of <test-list>-><parenthesis-open>•<test-plus-csv><parenthesis-close>
  772:  *    Goto on <test> to 63 because of <test-plus-csv>->•<test>
  773:  *    Goto on <test-plus-csv> to 62 because of <test-plus-csv>->•<test-plus-csv><comma><test>
  774:  *    Shift on <identifier-not> to 32 because of <test>->•<identifier-not><test> Lookahead = 
  775:  *    Shift on <identifier> to 33 because of <test>->•<identifier><arguments> Lookahead = 
  776:  *    Shift on <identifier> to 33 because of <test>->•<identifier> Lookahead = 
  777:  * ----------- 42 -----------
  778:  *   --Itemset--
  779:  *     <argument>-><string-list>•
  780:  *   --Transitions--
  781:  *    Reduce on <semicolon> using <argument>-><string-list> Lookahead = 
  782:  *    Reduce on <bracket-open> using <argument>-><string-list> Lookahead = 
  783:  *    Reduce on <identifier> using <argument>-><string-list> Lookahead = 
  784:  *    Reduce on <identifier-not> using <argument>-><string-list> Lookahead = 
  785:  *    Reduce on <parenthesis-open> using <argument>-><string-list> Lookahead = 
  786:  *    Reduce on <parenthesis-close> using <argument>-><string-list> Lookahead = 
  787:  *    Reduce on <comma> using <argument>-><string-list> Lookahead = 
  788:  *    Reduce on <number> using <argument>-><string-list> Lookahead = 
  789:  *    Reduce on <tag> using <argument>-><string-list> Lookahead = 
  790:  *    Reduce on <square-parenthesis-open> using <argument>-><string-list> Lookahead = 
  791:  *    Reduce on <quoted-string> using <argument>-><string-list> Lookahead = 
  792:  *    Reduce on <multi-line> using <argument>-><string-list> Lookahead = 
  793:  * ----------- 43 -----------
  794:  *   --Itemset--
  795:  *     <argument>-><number>•
  796:  *   --Transitions--
  797:  *    Reduce on <semicolon> using <argument>-><number> Lookahead = 
  798:  *    Reduce on <bracket-open> using <argument>-><number> Lookahead = 
  799:  *    Reduce on <identifier> using <argument>-><number> Lookahead = 
  800:  *    Reduce on <identifier-not> using <argument>-><number> Lookahead = 
  801:  *    Reduce on <parenthesis-open> using <argument>-><number> Lookahead = 
  802:  *    Reduce on <parenthesis-close> using <argument>-><number> Lookahead = 
  803:  *    Reduce on <comma> using <argument>-><number> Lookahead = 
  804:  *    Reduce on <number> using <argument>-><number> Lookahead = 
  805:  *    Reduce on <tag> using <argument>-><number> Lookahead = 
  806:  *    Reduce on <square-parenthesis-open> using <argument>-><number> Lookahead = 
  807:  *    Reduce on <quoted-string> using <argument>-><number> Lookahead = 
  808:  *    Reduce on <multi-line> using <argument>-><number> Lookahead = 
  809:  * ----------- 44 -----------
  810:  *   --Itemset--
  811:  *     <argument>-><tag>•
  812:  *   --Transitions--
  813:  *    Reduce on <semicolon> using <argument>-><tag> Lookahead = 
  814:  *    Reduce on <bracket-open> using <argument>-><tag> Lookahead = 
  815:  *    Reduce on <identifier> using <argument>-><tag> Lookahead = 
  816:  *    Reduce on <identifier-not> using <argument>-><tag> Lookahead = 
  817:  *    Reduce on <parenthesis-open> using <argument>-><tag> Lookahead = 
  818:  *    Reduce on <parenthesis-close> using <argument>-><tag> Lookahead = 
  819:  *    Reduce on <comma> using <argument>-><tag> Lookahead = 
  820:  *    Reduce on <number> using <argument>-><tag> Lookahead = 
  821:  *    Reduce on <tag> using <argument>-><tag> Lookahead = 
  822:  *    Reduce on <square-parenthesis-open> using <argument>-><tag> Lookahead = 
  823:  *    Reduce on <quoted-string> using <argument>-><tag> Lookahead = 
  824:  *    Reduce on <multi-line> using <argument>-><tag> Lookahead = 
  825:  * ----------- 45 -----------
  826:  *   --Itemset--
  827:  *     <command>-><identifier-notify><string><semicolon>•
  828:  *   --Transitions--
  829:  *    Reduce on <identifier-stop> using <command>-><identifier-notify><string><semicolon> Lookahead = 
  830:  *    Reduce on <identifier-notify> using <command>-><identifier-notify><string><semicolon> Lookahead = 
  831:  *    Reduce on <identifier-fileinto> using <command>-><identifier-notify><string><semicolon> Lookahead = 
  832:  *    Reduce on <identifier-redirect> using <command>-><identifier-notify><string><semicolon> Lookahead = 
  833:  *    Reduce on <identifier-keep> using <command>-><identifier-notify><string><semicolon> Lookahead = 
  834:  *    Reduce on <identifier-discard> using <command>-><identifier-notify><string><semicolon> Lookahead = 
  835:  *    Reduce on <identifier-require> using <command>-><identifier-notify><string><semicolon> Lookahead = 
  836:  *    Reduce on <identifier-if> using <command>-><identifier-notify><string><semicolon> Lookahead = 
  837:  *    Reduce on <identifier> using <command>-><identifier-notify><string><semicolon> Lookahead = 
  838:  *    Reduce on <bracket-close> using <command>-><identifier-notify><string><semicolon> Lookahead = 
  839:  *    Reduce on <hash-comment> using <command>-><identifier-notify><string><semicolon> Lookahead = 
  840:  *    Reduce on <bracket-comment> using <command>-><identifier-notify><string><semicolon> Lookahead = 
  841:  *    Reduce on  using <command>-><identifier-notify><string><semicolon> Lookahead = 
  842:  * ----------- 46 -----------
  843:  *   --Itemset--
  844:  *     <command>-><identifier-fileinto><string><semicolon>•
  845:  *   --Transitions--
  846:  *    Reduce on <identifier-stop> using <command>-><identifier-fileinto><string><semicolon> Lookahead = 
  847:  *    Reduce on <identifier-notify> using <command>-><identifier-fileinto><string><semicolon> Lookahead = 
  848:  *    Reduce on <identifier-fileinto> using <command>-><identifier-fileinto><string><semicolon> Lookahead = 
  849:  *    Reduce on <identifier-redirect> using <command>-><identifier-fileinto><string><semicolon> Lookahead = 
  850:  *    Reduce on <identifier-keep> using <command>-><identifier-fileinto><string><semicolon> Lookahead = 
  851:  *    Reduce on <identifier-discard> using <command>-><identifier-fileinto><string><semicolon> Lookahead = 
  852:  *    Reduce on <identifier-require> using <command>-><identifier-fileinto><string><semicolon> Lookahead = 
  853:  *    Reduce on <identifier-if> using <command>-><identifier-fileinto><string><semicolon> Lookahead = 
  854:  *    Reduce on <identifier> using <command>-><identifier-fileinto><string><semicolon> Lookahead = 
  855:  *    Reduce on <bracket-close> using <command>-><identifier-fileinto><string><semicolon> Lookahead = 
  856:  *    Reduce on <hash-comment> using <command>-><identifier-fileinto><string><semicolon> Lookahead = 
  857:  *    Reduce on <bracket-comment> using <command>-><identifier-fileinto><string><semicolon> Lookahead = 
  858:  *    Reduce on  using <command>-><identifier-fileinto><string><semicolon> Lookahead = 
  859:  * ----------- 47 -----------
  860:  *   --Itemset--
  861:  *     <command>-><identifier-redirect><string><semicolon>•
  862:  *   --Transitions--
  863:  *    Reduce on <identifier-stop> using <command>-><identifier-redirect><string><semicolon> Lookahead = 
  864:  *    Reduce on <identifier-notify> using <command>-><identifier-redirect><string><semicolon> Lookahead = 
  865:  *    Reduce on <identifier-fileinto> using <command>-><identifier-redirect><string><semicolon> Lookahead = 
  866:  *    Reduce on <identifier-redirect> using <command>-><identifier-redirect><string><semicolon> Lookahead = 
  867:  *    Reduce on <identifier-keep> using <command>-><identifier-redirect><string><semicolon> Lookahead = 
  868:  *    Reduce on <identifier-discard> using <command>-><identifier-redirect><string><semicolon> Lookahead = 
  869:  *    Reduce on <identifier-require> using <command>-><identifier-redirect><string><semicolon> Lookahead = 
  870:  *    Reduce on <identifier-if> using <command>-><identifier-redirect><string><semicolon> Lookahead = 
  871:  *    Reduce on <identifier> using <command>-><identifier-redirect><string><semicolon> Lookahead = 
  872:  *    Reduce on <bracket-close> using <command>-><identifier-redirect><string><semicolon> Lookahead = 
  873:  *    Reduce on <hash-comment> using <command>-><identifier-redirect><string><semicolon> Lookahead = 
  874:  *    Reduce on <bracket-comment> using <command>-><identifier-redirect><string><semicolon> Lookahead = 
  875:  *    Reduce on  using <command>-><identifier-redirect><string><semicolon> Lookahead = 
  876:  * ----------- 48 -----------
  877:  *   --Itemset--
  878:  *     <command>-><identifier-require><string-list><semicolon>•
  879:  *   --Transitions--
  880:  *    Reduce on <identifier-stop> using <command>-><identifier-require><string-list><semicolon> Lookahead = 
  881:  *    Reduce on <identifier-notify> using <command>-><identifier-require><string-list><semicolon> Lookahead = 
  882:  *    Reduce on <identifier-fileinto> using <command>-><identifier-require><string-list><semicolon> Lookahead = 
  883:  *    Reduce on <identifier-redirect> using <command>-><identifier-require><string-list><semicolon> Lookahead = 
  884:  *    Reduce on <identifier-keep> using <command>-><identifier-require><string-list><semicolon> Lookahead = 
  885:  *    Reduce on <identifier-discard> using <command>-><identifier-require><string-list><semicolon> Lookahead = 
  886:  *    Reduce on <identifier-require> using <command>-><identifier-require><string-list><semicolon> Lookahead = 
  887:  *    Reduce on <identifier-if> using <command>-><identifier-require><string-list><semicolon> Lookahead = 
  888:  *    Reduce on <identifier> using <command>-><identifier-require><string-list><semicolon> Lookahead = 
  889:  *    Reduce on <bracket-close> using <command>-><identifier-require><string-list><semicolon> Lookahead = 
  890:  *    Reduce on <hash-comment> using <command>-><identifier-require><string-list><semicolon> Lookahead = 
  891:  *    Reduce on <bracket-comment> using <command>-><identifier-require><string-list><semicolon> Lookahead = 
  892:  *    Reduce on  using <command>-><identifier-require><string-list><semicolon> Lookahead = 
  893:  * ----------- 49 -----------
  894:  *   --Itemset--
  895:  *     <string-list>-><square-parenthesis-open><string-plus-csv>•<square-parenthesis-close>
  896:  *     <string-plus-csv>-><string-plus-csv>•<comma><string>
  897:  *   --Transitions--
  898:  *    Shift on <square-parenthesis-close> to 64 because of <string-list>-><square-parenthesis-open><string-plus-csv>•<square-parenthesis-close> Lookahead = 
  899:  *    Shift on <comma> to 65 because of <string-plus-csv>-><string-plus-csv>•<comma><string> Lookahead = 
  900:  * ----------- 50 -----------
  901:  *   --Itemset--
  902:  *     <string-plus-csv>-><string>•
  903:  *   --Transitions--
  904:  *    Reduce on <comma> using <string-plus-csv>-><string> Lookahead = 
  905:  *    Reduce on <square-parenthesis-close> using <string-plus-csv>-><string> Lookahead = 
  906:  * ----------- 51 -----------
  907:  *   --Itemset--
  908:  *     <command>-><identifier-if><test><bracket-open>•<block>
  909:  *     <command>-><identifier-if><test><bracket-open>•<block><command-elsif>
  910:  *     <command>-><identifier-if><test><bracket-open>•<block><command-else>
  911:  *    +<block>->•<command><block>
  912:  *    +<block>->•<bracket-close>
  913:  *    +<command>->•<identifier-stop><semicolon>
  914:  *    +<command>->•<identifier-notify><string><semicolon>
  915:  *    +<command>->•<identifier-fileinto><string><semicolon>
  916:  *    +<command>->•<identifier-redirect><string><semicolon>
  917:  *    +<command>->•<identifier-keep><semicolon>
  918:  *    +<command>->•<identifier-discard><semicolon>
  919:  *    +<command>->•<identifier-require><string-list><semicolon>
  920:  *    +<command>->•<identifier-if><test><bracket-open><block>
  921:  *    +<command>->•<identifier-if><test><bracket-open><block><command-elsif>
  922:  *    +<command>->•<identifier-if><test><bracket-open><block><command-else>
  923:  *    +<command>->•<identifier><arguments><semicolon>
  924:  *    +<command>->•<identifier><arguments><bracket-open><block>
  925:  *    +<command>->•<identifier><semicolon>
  926:  *    +<command>->•<identifier><bracket-open><block>
  927:  *   --Transitions--
  928:  *    Goto on <block> to 66 because of <command>-><identifier-if><test><bracket-open>•<block>
  929:  *    Goto on <block> to 66 because of <command>-><identifier-if><test><bracket-open>•<block><command-elsif>
  930:  *    Goto on <block> to 66 because of <command>-><identifier-if><test><bracket-open>•<block><command-else>
  931:  *    Goto on <command> to 57 because of <block>->•<command><block>
  932:  *    Shift on <bracket-close> to 58 because of <block>->•<bracket-close> Lookahead = 
  933:  *    Shift on <identifier-stop> to 6 because of <command>->•<identifier-stop><semicolon> Lookahead = 
  934:  *    Shift on <identifier-notify> to 7 because of <command>->•<identifier-notify><string><semicolon> Lookahead = 
  935:  *    Shift on <identifier-fileinto> to 8 because of <command>->•<identifier-fileinto><string><semicolon> Lookahead = 
  936:  *    Shift on <identifier-redirect> to 9 because of <command>->•<identifier-redirect><string><semicolon> Lookahead = 
  937:  *    Shift on <identifier-keep> to 10 because of <command>->•<identifier-keep><semicolon> Lookahead = 
  938:  *    Shift on <identifier-discard> to 11 because of <command>->•<identifier-discard><semicolon> Lookahead = 
  939:  *    Shift on <identifier-require> to 12 because of <command>->•<identifier-require><string-list><semicolon> Lookahead = 
  940:  *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block> Lookahead = 
  941:  *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
  942:  *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block><command-else> Lookahead = 
  943:  *    Shift on <identifier> to 14 because of <command>->•<identifier><arguments><semicolon> Lookahead = 
  944:  *    Shift on <identifier> to 14 because of <command>->•<identifier><arguments><bracket-open><block> Lookahead = 
  945:  *    Shift on <identifier> to 14 because of <command>->•<identifier><semicolon> Lookahead = 
  946:  *    Shift on <identifier> to 14 because of <command>->•<identifier><bracket-open><block> Lookahead = 
  947:  * ----------- 52 -----------
  948:  *   --Itemset--
  949:  *     <test>-><identifier-not><test>•
  950:  *   --Transitions--
  951:  *    Reduce on <semicolon> using <test>-><identifier-not><test> Lookahead = 
  952:  *    Reduce on <bracket-open> using <test>-><identifier-not><test> Lookahead = 
  953:  *    Reduce on <parenthesis-close> using <test>-><identifier-not><test> Lookahead = 
  954:  *    Reduce on <comma> using <test>-><identifier-not><test> Lookahead = 
  955:  * ----------- 53 -----------
  956:  *   --Itemset--
  957:  *     <test>-><identifier><arguments>•
  958:  *   --Transitions--
  959:  *    Reduce on <semicolon> using <test>-><identifier><arguments> Lookahead = 
  960:  *    Reduce on <bracket-open> using <test>-><identifier><arguments> Lookahead = 
  961:  *    Reduce on <parenthesis-close> using <test>-><identifier><arguments> Lookahead = 
  962:  *    Reduce on <comma> using <test>-><identifier><arguments> Lookahead = 
  963:  * ----------- 54 -----------
  964:  *   --Itemset--
  965:  *     <command>-><identifier><arguments><semicolon>•
  966:  *   --Transitions--
  967:  *    Reduce on <identifier-stop> using <command>-><identifier><arguments><semicolon> Lookahead = 
  968:  *    Reduce on <identifier-notify> using <command>-><identifier><arguments><semicolon> Lookahead = 
  969:  *    Reduce on <identifier-fileinto> using <command>-><identifier><arguments><semicolon> Lookahead = 
  970:  *    Reduce on <identifier-redirect> using <command>-><identifier><arguments><semicolon> Lookahead = 
  971:  *    Reduce on <identifier-keep> using <command>-><identifier><arguments><semicolon> Lookahead = 
  972:  *    Reduce on <identifier-discard> using <command>-><identifier><arguments><semicolon> Lookahead = 
  973:  *    Reduce on <identifier-require> using <command>-><identifier><arguments><semicolon> Lookahead = 
  974:  *    Reduce on <identifier-if> using <command>-><identifier><arguments><semicolon> Lookahead = 
  975:  *    Reduce on <identifier> using <command>-><identifier><arguments><semicolon> Lookahead = 
  976:  *    Reduce on <bracket-close> using <command>-><identifier><arguments><semicolon> Lookahead = 
  977:  *    Reduce on <hash-comment> using <command>-><identifier><arguments><semicolon> Lookahead = 
  978:  *    Reduce on <bracket-comment> using <command>-><identifier><arguments><semicolon> Lookahead = 
  979:  *    Reduce on  using <command>-><identifier><arguments><semicolon> Lookahead = 
  980:  * ----------- 55 -----------
  981:  *   --Itemset--
  982:  *     <command>-><identifier><arguments><bracket-open>•<block>
  983:  *    +<block>->•<command><block>
  984:  *    +<block>->•<bracket-close>
  985:  *    +<command>->•<identifier-stop><semicolon>
  986:  *    +<command>->•<identifier-notify><string><semicolon>
  987:  *    +<command>->•<identifier-fileinto><string><semicolon>
  988:  *    +<command>->•<identifier-redirect><string><semicolon>
  989:  *    +<command>->•<identifier-keep><semicolon>
  990:  *    +<command>->•<identifier-discard><semicolon>
  991:  *    +<command>->•<identifier-require><string-list><semicolon>
  992:  *    +<command>->•<identifier-if><test><bracket-open><block>
  993:  *    +<command>->•<identifier-if><test><bracket-open><block><command-elsif>
  994:  *    +<command>->•<identifier-if><test><bracket-open><block><command-else>
  995:  *    +<command>->•<identifier><arguments><semicolon>
  996:  *    +<command>->•<identifier><arguments><bracket-open><block>
  997:  *    +<command>->•<identifier><semicolon>
  998:  *    +<command>->•<identifier><bracket-open><block>
  999:  *   --Transitions--
 1000:  *    Goto on <block> to 67 because of <command>-><identifier><arguments><bracket-open>•<block>
 1001:  *    Goto on <command> to 57 because of <block>->•<command><block>
 1002:  *    Shift on <bracket-close> to 58 because of <block>->•<bracket-close> Lookahead = 
 1003:  *    Shift on <identifier-stop> to 6 because of <command>->•<identifier-stop><semicolon> Lookahead = 
 1004:  *    Shift on <identifier-notify> to 7 because of <command>->•<identifier-notify><string><semicolon> Lookahead = 
 1005:  *    Shift on <identifier-fileinto> to 8 because of <command>->•<identifier-fileinto><string><semicolon> Lookahead = 
 1006:  *    Shift on <identifier-redirect> to 9 because of <command>->•<identifier-redirect><string><semicolon> Lookahead = 
 1007:  *    Shift on <identifier-keep> to 10 because of <command>->•<identifier-keep><semicolon> Lookahead = 
 1008:  *    Shift on <identifier-discard> to 11 because of <command>->•<identifier-discard><semicolon> Lookahead = 
 1009:  *    Shift on <identifier-require> to 12 because of <command>->•<identifier-require><string-list><semicolon> Lookahead = 
 1010:  *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block> Lookahead = 
 1011:  *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 1012:  *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block><command-else> Lookahead = 
 1013:  *    Shift on <identifier> to 14 because of <command>->•<identifier><arguments><semicolon> Lookahead = 
 1014:  *    Shift on <identifier> to 14 because of <command>->•<identifier><arguments><bracket-open><block> Lookahead = 
 1015:  *    Shift on <identifier> to 14 because of <command>->•<identifier><semicolon> Lookahead = 
 1016:  *    Shift on <identifier> to 14 because of <command>->•<identifier><bracket-open><block> Lookahead = 
 1017:  * ----------- 56 -----------
 1018:  *   --Itemset--
 1019:  *     <command>-><identifier><bracket-open><block>•
 1020:  *   --Transitions--
 1021:  *    Reduce on <identifier-stop> using <command>-><identifier><bracket-open><block> Lookahead = 
 1022:  *    Reduce on <identifier-notify> using <command>-><identifier><bracket-open><block> Lookahead = 
 1023:  *    Reduce on <identifier-fileinto> using <command>-><identifier><bracket-open><block> Lookahead = 
 1024:  *    Reduce on <identifier-redirect> using <command>-><identifier><bracket-open><block> Lookahead = 
 1025:  *    Reduce on <identifier-keep> using <command>-><identifier><bracket-open><block> Lookahead = 
 1026:  *    Reduce on <identifier-discard> using <command>-><identifier><bracket-open><block> Lookahead = 
 1027:  *    Reduce on <identifier-require> using <command>-><identifier><bracket-open><block> Lookahead = 
 1028:  *    Reduce on <identifier-if> using <command>-><identifier><bracket-open><block> Lookahead = 
 1029:  *    Reduce on <identifier> using <command>-><identifier><bracket-open><block> Lookahead = 
 1030:  *    Reduce on <bracket-close> using <command>-><identifier><bracket-open><block> Lookahead = 
 1031:  *    Reduce on <hash-comment> using <command>-><identifier><bracket-open><block> Lookahead = 
 1032:  *    Reduce on <bracket-comment> using <command>-><identifier><bracket-open><block> Lookahead = 
 1033:  *    Reduce on  using <command>-><identifier><bracket-open><block> Lookahead = 
 1034:  * ----------- 57 -----------
 1035:  *   --Itemset--
 1036:  *     <block>-><command>•<block>
 1037:  *    +<block>->•<command><block>
 1038:  *    +<block>->•<bracket-close>
 1039:  *    +<command>->•<identifier-stop><semicolon>
 1040:  *    +<command>->•<identifier-notify><string><semicolon>
 1041:  *    +<command>->•<identifier-fileinto><string><semicolon>
 1042:  *    +<command>->•<identifier-redirect><string><semicolon>
 1043:  *    +<command>->•<identifier-keep><semicolon>
 1044:  *    +<command>->•<identifier-discard><semicolon>
 1045:  *    +<command>->•<identifier-require><string-list><semicolon>
 1046:  *    +<command>->•<identifier-if><test><bracket-open><block>
 1047:  *    +<command>->•<identifier-if><test><bracket-open><block><command-elsif>
 1048:  *    +<command>->•<identifier-if><test><bracket-open><block><command-else>
 1049:  *    +<command>->•<identifier><arguments><semicolon>
 1050:  *    +<command>->•<identifier><arguments><bracket-open><block>
 1051:  *    +<command>->•<identifier><semicolon>
 1052:  *    +<command>->•<identifier><bracket-open><block>
 1053:  *   --Transitions--
 1054:  *    Goto on <block> to 68 because of <block>-><command>•<block>
 1055:  *    Goto on <command> to 57 because of <block>->•<command><block>
 1056:  *    Shift on <bracket-close> to 58 because of <block>->•<bracket-close> Lookahead = 
 1057:  *    Shift on <identifier-stop> to 6 because of <command>->•<identifier-stop><semicolon> Lookahead = 
 1058:  *    Shift on <identifier-notify> to 7 because of <command>->•<identifier-notify><string><semicolon> Lookahead = 
 1059:  *    Shift on <identifier-fileinto> to 8 because of <command>->•<identifier-fileinto><string><semicolon> Lookahead = 
 1060:  *    Shift on <identifier-redirect> to 9 because of <command>->•<identifier-redirect><string><semicolon> Lookahead = 
 1061:  *    Shift on <identifier-keep> to 10 because of <command>->•<identifier-keep><semicolon> Lookahead = 
 1062:  *    Shift on <identifier-discard> to 11 because of <command>->•<identifier-discard><semicolon> Lookahead = 
 1063:  *    Shift on <identifier-require> to 12 because of <command>->•<identifier-require><string-list><semicolon> Lookahead = 
 1064:  *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block> Lookahead = 
 1065:  *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 1066:  *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block><command-else> Lookahead = 
 1067:  *    Shift on <identifier> to 14 because of <command>->•<identifier><arguments><semicolon> Lookahead = 
 1068:  *    Shift on <identifier> to 14 because of <command>->•<identifier><arguments><bracket-open><block> Lookahead = 
 1069:  *    Shift on <identifier> to 14 because of <command>->•<identifier><semicolon> Lookahead = 
 1070:  *    Shift on <identifier> to 14 because of <command>->•<identifier><bracket-open><block> Lookahead = 
 1071:  * ----------- 58 -----------
 1072:  *   --Itemset--
 1073:  *     <block>-><bracket-close>•
 1074:  *   --Transitions--
 1075:  *    Reduce on <identifier-stop> using <block>-><bracket-close> Lookahead = 
 1076:  *    Reduce on <identifier-notify> using <block>-><bracket-close> Lookahead = 
 1077:  *    Reduce on <identifier-fileinto> using <block>-><bracket-close> Lookahead = 
 1078:  *    Reduce on <identifier-redirect> using <block>-><bracket-close> Lookahead = 
 1079:  *    Reduce on <identifier-keep> using <block>-><bracket-close> Lookahead = 
 1080:  *    Reduce on <identifier-discard> using <block>-><bracket-close> Lookahead = 
 1081:  *    Reduce on <identifier-require> using <block>-><bracket-close> Lookahead = 
 1082:  *    Reduce on <identifier-if> using <block>-><bracket-close> Lookahead = 
 1083:  *    Reduce on <identifier-elsif> using <block>-><bracket-close> Lookahead = 
 1084:  *    Reduce on <identifier-else> using <block>-><bracket-close> Lookahead = 
 1085:  *    Reduce on <identifier> using <block>-><bracket-close> Lookahead = 
 1086:  *    Reduce on <bracket-close> using <block>-><bracket-close> Lookahead = 
 1087:  *    Reduce on <hash-comment> using <block>-><bracket-close> Lookahead = 
 1088:  *    Reduce on <bracket-comment> using <block>-><bracket-close> Lookahead = 
 1089:  *    Reduce on  using <block>-><bracket-close> Lookahead = 
 1090:  * ----------- 59 -----------
 1091:  *   --Itemset--
 1092:  *     <arguments>-><arguments-plus><test>•
 1093:  *   --Transitions--
 1094:  *    Reduce on <semicolon> using <arguments>-><arguments-plus><test> Lookahead = 
 1095:  *    Reduce on <bracket-open> using <arguments>-><arguments-plus><test> Lookahead = 
 1096:  * ----------- 60 -----------
 1097:  *   --Itemset--
 1098:  *     <arguments>-><arguments-plus><test-list>•
 1099:  *   --Transitions--
 1100:  *    Reduce on <semicolon> using <arguments>-><arguments-plus><test-list> Lookahead = 
 1101:  *    Reduce on <bracket-open> using <arguments>-><arguments-plus><test-list> Lookahead = 
 1102:  *    Reduce on <parenthesis-close> using <arguments>-><arguments-plus><test-list> Lookahead = 
 1103:  *    Reduce on <comma> using <arguments>-><arguments-plus><test-list> Lookahead = 
 1104:  * ----------- 61 -----------
 1105:  *   --Itemset--
 1106:  *     <arguments-plus>-><arguments-plus><argument>•
 1107:  *   --Transitions--
 1108:  *    Reduce on <semicolon> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
 1109:  *    Reduce on <bracket-open> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
 1110:  *    Reduce on <identifier> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
 1111:  *    Reduce on <identifier-not> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
 1112:  *    Reduce on <parenthesis-open> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
 1113:  *    Reduce on <parenthesis-close> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
 1114:  *    Reduce on <comma> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
 1115:  *    Reduce on <number> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
 1116:  *    Reduce on <tag> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
 1117:  *    Reduce on <square-parenthesis-open> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
 1118:  *    Reduce on <quoted-string> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
 1119:  *    Reduce on <multi-line> using <arguments-plus>-><arguments-plus><argument> Lookahead = 
 1120:  * ----------- 62 -----------
 1121:  *   --Itemset--
 1122:  *     <test-list>-><parenthesis-open><test-plus-csv>•<parenthesis-close>
 1123:  *     <test-plus-csv>-><test-plus-csv>•<comma><test>
 1124:  *   --Transitions--
 1125:  *    Shift on <parenthesis-close> to 69 because of <test-list>-><parenthesis-open><test-plus-csv>•<parenthesis-close> Lookahead = 
 1126:  *    Shift on <comma> to 70 because of <test-plus-csv>-><test-plus-csv>•<comma><test> Lookahead = 
 1127:  * ----------- 63 -----------
 1128:  *   --Itemset--
 1129:  *     <test-plus-csv>-><test>•
 1130:  *   --Transitions--
 1131:  *    Reduce on <parenthesis-close> using <test-plus-csv>-><test> Lookahead = 
 1132:  *    Reduce on <comma> using <test-plus-csv>-><test> Lookahead = 
 1133:  * ----------- 64 -----------
 1134:  *   --Itemset--
 1135:  *     <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close>•
 1136:  *   --Transitions--
 1137:  *    Reduce on <semicolon> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 1138:  *    Reduce on <bracket-open> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 1139:  *    Reduce on <identifier> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 1140:  *    Reduce on <identifier-not> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 1141:  *    Reduce on <parenthesis-open> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 1142:  *    Reduce on <parenthesis-close> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 1143:  *    Reduce on <comma> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 1144:  *    Reduce on <number> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 1145:  *    Reduce on <tag> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 1146:  *    Reduce on <square-parenthesis-open> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 1147:  *    Reduce on <quoted-string> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 1148:  *    Reduce on <multi-line> using <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close> Lookahead = 
 1149:  * ----------- 65 -----------
 1150:  *   --Itemset--
 1151:  *     <string-plus-csv>-><string-plus-csv><comma>•<string>
 1152:  *    +<string>->•<quoted-string>
 1153:  *    +<string>->•<multi-line>
 1154:  *   --Transitions--
 1155:  *    Goto on <string> to 71 because of <string-plus-csv>-><string-plus-csv><comma>•<string>
 1156:  *    Shift on <quoted-string> to 22 because of <string>->•<quoted-string> Lookahead = 
 1157:  *    Shift on <multi-line> to 23 because of <string>->•<multi-line> Lookahead = 
 1158:  * ----------- 66 -----------
 1159:  *   --Itemset--
 1160:  *     <command>-><identifier-if><test><bracket-open><block>•
 1161:  *     <command>-><identifier-if><test><bracket-open><block>•<command-elsif>
 1162:  *     <command>-><identifier-if><test><bracket-open><block>•<command-else>
 1163:  *    +<command-elsif>->•<identifier-elsif><test><bracket-open><block>
 1164:  *    +<command-elsif>->•<identifier-elsif><test><bracket-open><block><command-elsif>
 1165:  *    +<command-elsif>->•<identifier-elsif><test><bracket-open><block><command-else>
 1166:  *    +<command-else>->•<identifier-else><bracket-open><block>
 1167:  *   --Transitions--
 1168:  *    Reduce on <identifier-stop> using <command>-><identifier-if><test><bracket-open><block> Lookahead = 
 1169:  *    Reduce on <identifier-notify> using <command>-><identifier-if><test><bracket-open><block> Lookahead = 
 1170:  *    Reduce on <identifier-fileinto> using <command>-><identifier-if><test><bracket-open><block> Lookahead = 
 1171:  *    Reduce on <identifier-redirect> using <command>-><identifier-if><test><bracket-open><block> Lookahead = 
 1172:  *    Reduce on <identifier-keep> using <command>-><identifier-if><test><bracket-open><block> Lookahead = 
 1173:  *    Reduce on <identifier-discard> using <command>-><identifier-if><test><bracket-open><block> Lookahead = 
 1174:  *    Reduce on <identifier-require> using <command>-><identifier-if><test><bracket-open><block> Lookahead = 
 1175:  *    Reduce on <identifier-if> using <command>-><identifier-if><test><bracket-open><block> Lookahead = 
 1176:  *    Reduce on <identifier> using <command>-><identifier-if><test><bracket-open><block> Lookahead = 
 1177:  *    Reduce on <bracket-close> using <command>-><identifier-if><test><bracket-open><block> Lookahead = 
 1178:  *    Reduce on <hash-comment> using <command>-><identifier-if><test><bracket-open><block> Lookahead = 
 1179:  *    Reduce on <bracket-comment> using <command>-><identifier-if><test><bracket-open><block> Lookahead = 
 1180:  *    Reduce on  using <command>-><identifier-if><test><bracket-open><block> Lookahead = 
 1181:  *    Goto on <command-elsif> to 72 because of <command>-><identifier-if><test><bracket-open><block>•<command-elsif>
 1182:  *    Goto on <command-else> to 73 because of <command>-><identifier-if><test><bracket-open><block>•<command-else>
 1183:  *    Shift on <identifier-elsif> to 74 because of <command-elsif>->•<identifier-elsif><test><bracket-open><block> Lookahead = 
 1184:  *    Shift on <identifier-elsif> to 74 because of <command-elsif>->•<identifier-elsif><test><bracket-open><block><command-elsif> Lookahead = 
 1185:  *    Shift on <identifier-elsif> to 74 because of <command-elsif>->•<identifier-elsif><test><bracket-open><block><command-else> Lookahead = 
 1186:  *    Shift on <identifier-else> to 75 because of <command-else>->•<identifier-else><bracket-open><block> Lookahead = 
 1187:  * ----------- 67 -----------
 1188:  *   --Itemset--
 1189:  *     <command>-><identifier><arguments><bracket-open><block>•
 1190:  *   --Transitions--
 1191:  *    Reduce on <identifier-stop> using <command>-><identifier><arguments><bracket-open><block> Lookahead = 
 1192:  *    Reduce on <identifier-notify> using <command>-><identifier><arguments><bracket-open><block> Lookahead = 
 1193:  *    Reduce on <identifier-fileinto> using <command>-><identifier><arguments><bracket-open><block> Lookahead = 
 1194:  *    Reduce on <identifier-redirect> using <command>-><identifier><arguments><bracket-open><block> Lookahead = 
 1195:  *    Reduce on <identifier-keep> using <command>-><identifier><arguments><bracket-open><block> Lookahead = 
 1196:  *    Reduce on <identifier-discard> using <command>-><identifier><arguments><bracket-open><block> Lookahead = 
 1197:  *    Reduce on <identifier-require> using <command>-><identifier><arguments><bracket-open><block> Lookahead = 
 1198:  *    Reduce on <identifier-if> using <command>-><identifier><arguments><bracket-open><block> Lookahead = 
 1199:  *    Reduce on <identifier> using <command>-><identifier><arguments><bracket-open><block> Lookahead = 
 1200:  *    Reduce on <bracket-close> using <command>-><identifier><arguments><bracket-open><block> Lookahead = 
 1201:  *    Reduce on <hash-comment> using <command>-><identifier><arguments><bracket-open><block> Lookahead = 
 1202:  *    Reduce on <bracket-comment> using <command>-><identifier><arguments><bracket-open><block> Lookahead = 
 1203:  *    Reduce on  using <command>-><identifier><arguments><bracket-open><block> Lookahead = 
 1204:  * ----------- 68 -----------
 1205:  *   --Itemset--
 1206:  *     <block>-><command><block>•
 1207:  *   --Transitions--
 1208:  *    Reduce on <identifier-stop> using <block>-><command><block> Lookahead = 
 1209:  *    Reduce on <identifier-notify> using <block>-><command><block> Lookahead = 
 1210:  *    Reduce on <identifier-fileinto> using <block>-><command><block> Lookahead = 
 1211:  *    Reduce on <identifier-redirect> using <block>-><command><block> Lookahead = 
 1212:  *    Reduce on <identifier-keep> using <block>-><command><block> Lookahead = 
 1213:  *    Reduce on <identifier-discard> using <block>-><command><block> Lookahead = 
 1214:  *    Reduce on <identifier-require> using <block>-><command><block> Lookahead = 
 1215:  *    Reduce on <identifier-if> using <block>-><command><block> Lookahead = 
 1216:  *    Reduce on <identifier-elsif> using <block>-><command><block> Lookahead = 
 1217:  *    Reduce on <identifier-else> using <block>-><command><block> Lookahead = 
 1218:  *    Reduce on <identifier> using <block>-><command><block> Lookahead = 
 1219:  *    Reduce on <bracket-close> using <block>-><command><block> Lookahead = 
 1220:  *    Reduce on <hash-comment> using <block>-><command><block> Lookahead = 
 1221:  *    Reduce on <bracket-comment> using <block>-><command><block> Lookahead = 
 1222:  *    Reduce on  using <block>-><command><block> Lookahead = 
 1223:  * ----------- 69 -----------
 1224:  *   --Itemset--
 1225:  *     <test-list>-><parenthesis-open><test-plus-csv><parenthesis-close>•
 1226:  *   --Transitions--
 1227:  *    Reduce on <semicolon> using <test-list>-><parenthesis-open><test-plus-csv><parenthesis-close> Lookahead = 
 1228:  *    Reduce on <bracket-open> using <test-list>-><parenthesis-open><test-plus-csv><parenthesis-close> Lookahead = 
 1229:  *    Reduce on <parenthesis-close> using <test-list>-><parenthesis-open><test-plus-csv><parenthesis-close> Lookahead = 
 1230:  *    Reduce on <comma> using <test-list>-><parenthesis-open><test-plus-csv><parenthesis-close> Lookahead = 
 1231:  * ----------- 70 -----------
 1232:  *   --Itemset--
 1233:  *     <test-plus-csv>-><test-plus-csv><comma>•<test>
 1234:  *    +<test>->•<identifier-not><test>
 1235:  *    +<test>->•<identifier><arguments>
 1236:  *    +<test>->•<identifier>
 1237:  *   --Transitions--
 1238:  *    Goto on <test> to 76 because of <test-plus-csv>-><test-plus-csv><comma>•<test>
 1239:  *    Shift on <identifier-not> to 32 because of <test>->•<identifier-not><test> Lookahead = 
 1240:  *    Shift on <identifier> to 33 because of <test>->•<identifier><arguments> Lookahead = 
 1241:  *    Shift on <identifier> to 33 because of <test>->•<identifier> Lookahead = 
 1242:  * ----------- 71 -----------
 1243:  *   --Itemset--
 1244:  *     <string-plus-csv>-><string-plus-csv><comma><string>•
 1245:  *   --Transitions--
 1246:  *    Reduce on <comma> using <string-plus-csv>-><string-plus-csv><comma><string> Lookahead = 
 1247:  *    Reduce on <square-parenthesis-close> using <string-plus-csv>-><string-plus-csv><comma><string> Lookahead = 
 1248:  * ----------- 72 -----------
 1249:  *   --Itemset--
 1250:  *     <command>-><identifier-if><test><bracket-open><block><command-elsif>•
 1251:  *   --Transitions--
 1252:  *    Reduce on <identifier-stop> using <command>-><identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 1253:  *    Reduce on <identifier-notify> using <command>-><identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 1254:  *    Reduce on <identifier-fileinto> using <command>-><identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 1255:  *    Reduce on <identifier-redirect> using <command>-><identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 1256:  *    Reduce on <identifier-keep> using <command>-><identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 1257:  *    Reduce on <identifier-discard> using <command>-><identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 1258:  *    Reduce on <identifier-require> using <command>-><identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 1259:  *    Reduce on <identifier-if> using <command>-><identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 1260:  *    Reduce on <identifier> using <command>-><identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 1261:  *    Reduce on <bracket-close> using <command>-><identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 1262:  *    Reduce on <hash-comment> using <command>-><identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 1263:  *    Reduce on <bracket-comment> using <command>-><identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 1264:  *    Reduce on  using <command>-><identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 1265:  * ----------- 73 -----------
 1266:  *   --Itemset--
 1267:  *     <command>-><identifier-if><test><bracket-open><block><command-else>•
 1268:  *   --Transitions--
 1269:  *    Reduce on <identifier-stop> using <command>-><identifier-if><test><bracket-open><block><command-else> Lookahead = 
 1270:  *    Reduce on <identifier-notify> using <command>-><identifier-if><test><bracket-open><block><command-else> Lookahead = 
 1271:  *    Reduce on <identifier-fileinto> using <command>-><identifier-if><test><bracket-open><block><command-else> Lookahead = 
 1272:  *    Reduce on <identifier-redirect> using <command>-><identifier-if><test><bracket-open><block><command-else> Lookahead = 
 1273:  *    Reduce on <identifier-keep> using <command>-><identifier-if><test><bracket-open><block><command-else> Lookahead = 
 1274:  *    Reduce on <identifier-discard> using <command>-><identifier-if><test><bracket-open><block><command-else> Lookahead = 
 1275:  *    Reduce on <identifier-require> using <command>-><identifier-if><test><bracket-open><block><command-else> Lookahead = 
 1276:  *    Reduce on <identifier-if> using <command>-><identifier-if><test><bracket-open><block><command-else> Lookahead = 
 1277:  *    Reduce on <identifier> using <command>-><identifier-if><test><bracket-open><block><command-else> Lookahead = 
 1278:  *    Reduce on <bracket-close> using <command>-><identifier-if><test><bracket-open><block><command-else> Lookahead = 
 1279:  *    Reduce on <hash-comment> using <command>-><identifier-if><test><bracket-open><block><command-else> Lookahead = 
 1280:  *    Reduce on <bracket-comment> using <command>-><identifier-if><test><bracket-open><block><command-else> Lookahead = 
 1281:  *    Reduce on  using <command>-><identifier-if><test><bracket-open><block><command-else> Lookahead = 
 1282:  * ----------- 74 -----------
 1283:  *   --Itemset--
 1284:  *     <command-elsif>-><identifier-elsif>•<test><bracket-open><block>
 1285:  *     <command-elsif>-><identifier-elsif>•<test><bracket-open><block><command-elsif>
 1286:  *     <command-elsif>-><identifier-elsif>•<test><bracket-open><block><command-else>
 1287:  *    +<test>->•<identifier-not><test>
 1288:  *    +<test>->•<identifier><arguments>
 1289:  *    +<test>->•<identifier>
 1290:  *   --Transitions--
 1291:  *    Goto on <test> to 77 because of <command-elsif>-><identifier-elsif>•<test><bracket-open><block>
 1292:  *    Goto on <test> to 77 because of <command-elsif>-><identifier-elsif>•<test><bracket-open><block><command-elsif>
 1293:  *    Goto on <test> to 77 because of <command-elsif>-><identifier-elsif>•<test><bracket-open><block><command-else>
 1294:  *    Shift on <identifier-not> to 32 because of <test>->•<identifier-not><test> Lookahead = 
 1295:  *    Shift on <identifier> to 33 because of <test>->•<identifier><arguments> Lookahead = 
 1296:  *    Shift on <identifier> to 33 because of <test>->•<identifier> Lookahead = 
 1297:  * ----------- 75 -----------
 1298:  *   --Itemset--
 1299:  *     <command-else>-><identifier-else>•<bracket-open><block>
 1300:  *   --Transitions--
 1301:  *    Shift on <bracket-open> to 78 because of <command-else>-><identifier-else>•<bracket-open><block> Lookahead = 
 1302:  * ----------- 76 -----------
 1303:  *   --Itemset--
 1304:  *     <test-plus-csv>-><test-plus-csv><comma><test>•
 1305:  *   --Transitions--
 1306:  *    Reduce on <parenthesis-close> using <test-plus-csv>-><test-plus-csv><comma><test> Lookahead = 
 1307:  *    Reduce on <comma> using <test-plus-csv>-><test-plus-csv><comma><test> Lookahead = 
 1308:  * ----------- 77 -----------
 1309:  *   --Itemset--
 1310:  *     <command-elsif>-><identifier-elsif><test>•<bracket-open><block>
 1311:  *     <command-elsif>-><identifier-elsif><test>•<bracket-open><block><command-elsif>
 1312:  *     <command-elsif>-><identifier-elsif><test>•<bracket-open><block><command-else>
 1313:  *   --Transitions--
 1314:  *    Shift on <bracket-open> to 79 because of <command-elsif>-><identifier-elsif><test>•<bracket-open><block> Lookahead = 
 1315:  *    Shift on <bracket-open> to 79 because of <command-elsif>-><identifier-elsif><test>•<bracket-open><block><command-elsif> Lookahead = 
 1316:  *    Shift on <bracket-open> to 79 because of <command-elsif>-><identifier-elsif><test>•<bracket-open><block><command-else> Lookahead = 
 1317:  * ----------- 78 -----------
 1318:  *   --Itemset--
 1319:  *     <command-else>-><identifier-else><bracket-open>•<block>
 1320:  *    +<block>->•<command><block>
 1321:  *    +<block>->•<bracket-close>
 1322:  *    +<command>->•<identifier-stop><semicolon>
 1323:  *    +<command>->•<identifier-notify><string><semicolon>
 1324:  *    +<command>->•<identifier-fileinto><string><semicolon>
 1325:  *    +<command>->•<identifier-redirect><string><semicolon>
 1326:  *    +<command>->•<identifier-keep><semicolon>
 1327:  *    +<command>->•<identifier-discard><semicolon>
 1328:  *    +<command>->•<identifier-require><string-list><semicolon>
 1329:  *    +<command>->•<identifier-if><test><bracket-open><block>
 1330:  *    +<command>->•<identifier-if><test><bracket-open><block><command-elsif>
 1331:  *    +<command>->•<identifier-if><test><bracket-open><block><command-else>
 1332:  *    +<command>->•<identifier><arguments><semicolon>
 1333:  *    +<command>->•<identifier><arguments><bracket-open><block>
 1334:  *    +<command>->•<identifier><semicolon>
 1335:  *    +<command>->•<identifier><bracket-open><block>
 1336:  *   --Transitions--
 1337:  *    Goto on <block> to 80 because of <command-else>-><identifier-else><bracket-open>•<block>
 1338:  *    Goto on <command> to 57 because of <block>->•<command><block>
 1339:  *    Shift on <bracket-close> to 58 because of <block>->•<bracket-close> Lookahead = 
 1340:  *    Shift on <identifier-stop> to 6 because of <command>->•<identifier-stop><semicolon> Lookahead = 
 1341:  *    Shift on <identifier-notify> to 7 because of <command>->•<identifier-notify><string><semicolon> Lookahead = 
 1342:  *    Shift on <identifier-fileinto> to 8 because of <command>->•<identifier-fileinto><string><semicolon> Lookahead = 
 1343:  *    Shift on <identifier-redirect> to 9 because of <command>->•<identifier-redirect><string><semicolon> Lookahead = 
 1344:  *    Shift on <identifier-keep> to 10 because of <command>->•<identifier-keep><semicolon> Lookahead = 
 1345:  *    Shift on <identifier-discard> to 11 because of <command>->•<identifier-discard><semicolon> Lookahead = 
 1346:  *    Shift on <identifier-require> to 12 because of <command>->•<identifier-require><string-list><semicolon> Lookahead = 
 1347:  *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block> Lookahead = 
 1348:  *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 1349:  *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block><command-else> Lookahead = 
 1350:  *    Shift on <identifier> to 14 because of <command>->•<identifier><arguments><semicolon> Lookahead = 
 1351:  *    Shift on <identifier> to 14 because of <command>->•<identifier><arguments><bracket-open><block> Lookahead = 
 1352:  *    Shift on <identifier> to 14 because of <command>->•<identifier><semicolon> Lookahead = 
 1353:  *    Shift on <identifier> to 14 because of <command>->•<identifier><bracket-open><block> Lookahead = 
 1354:  * ----------- 79 -----------
 1355:  *   --Itemset--
 1356:  *     <command-elsif>-><identifier-elsif><test><bracket-open>•<block>
 1357:  *     <command-elsif>-><identifier-elsif><test><bracket-open>•<block><command-elsif>
 1358:  *     <command-elsif>-><identifier-elsif><test><bracket-open>•<block><command-else>
 1359:  *    +<block>->•<command><block>
 1360:  *    +<block>->•<bracket-close>
 1361:  *    +<command>->•<identifier-stop><semicolon>
 1362:  *    +<command>->•<identifier-notify><string><semicolon>
 1363:  *    +<command>->•<identifier-fileinto><string><semicolon>
 1364:  *    +<command>->•<identifier-redirect><string><semicolon>
 1365:  *    +<command>->•<identifier-keep><semicolon>
 1366:  *    +<command>->•<identifier-discard><semicolon>
 1367:  *    +<command>->•<identifier-require><string-list><semicolon>
 1368:  *    +<command>->•<identifier-if><test><bracket-open><block>
 1369:  *    +<command>->•<identifier-if><test><bracket-open><block><command-elsif>
 1370:  *    +<command>->•<identifier-if><test><bracket-open><block><command-else>
 1371:  *    +<command>->•<identifier><arguments><semicolon>
 1372:  *    +<command>->•<identifier><arguments><bracket-open><block>
 1373:  *    +<command>->•<identifier><semicolon>
 1374:  *    +<command>->•<identifier><bracket-open><block>
 1375:  *   --Transitions--
 1376:  *    Goto on <block> to 81 because of <command-elsif>-><identifier-elsif><test><bracket-open>•<block>
 1377:  *    Goto on <block> to 81 because of <command-elsif>-><identifier-elsif><test><bracket-open>•<block><command-elsif>
 1378:  *    Goto on <block> to 81 because of <command-elsif>-><identifier-elsif><test><bracket-open>•<block><command-else>
 1379:  *    Goto on <command> to 57 because of <block>->•<command><block>
 1380:  *    Shift on <bracket-close> to 58 because of <block>->•<bracket-close> Lookahead = 
 1381:  *    Shift on <identifier-stop> to 6 because of <command>->•<identifier-stop><semicolon> Lookahead = 
 1382:  *    Shift on <identifier-notify> to 7 because of <command>->•<identifier-notify><string><semicolon> Lookahead = 
 1383:  *    Shift on <identifier-fileinto> to 8 because of <command>->•<identifier-fileinto><string><semicolon> Lookahead = 
 1384:  *    Shift on <identifier-redirect> to 9 because of <command>->•<identifier-redirect><string><semicolon> Lookahead = 
 1385:  *    Shift on <identifier-keep> to 10 because of <command>->•<identifier-keep><semicolon> Lookahead = 
 1386:  *    Shift on <identifier-discard> to 11 because of <command>->•<identifier-discard><semicolon> Lookahead = 
 1387:  *    Shift on <identifier-require> to 12 because of <command>->•<identifier-require><string-list><semicolon> Lookahead = 
 1388:  *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block> Lookahead = 
 1389:  *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block><command-elsif> Lookahead = 
 1390:  *    Shift on <identifier-if> to 13 because of <command>->•<identifier-if><test><bracket-open><block><command-else> Lookahead = 
 1391:  *    Shift on <identifier> to 14 because of <command>->•<identifier><arguments><semicolon> Lookahead = 
 1392:  *    Shift on <identifier> to 14 because of <command>->•<identifier><arguments><bracket-open><block> Lookahead = 
 1393:  *    Shift on <identifier> to 14 because of <command>->•<identifier><semicolon> Lookahead = 
 1394:  *    Shift on <identifier> to 14 because of <command>->•<identifier><bracket-open><block> Lookahead = 
 1395:  * ----------- 80 -----------
 1396:  *   --Itemset--
 1397:  *     <command-else>-><identifier-else><bracket-open><block>•
 1398:  *   --Transitions--
 1399:  *    Reduce on <identifier-stop> using <command-else>-><identifier-else><bracket-open><block> Lookahead = 
 1400:  *    Reduce on <identifier-notify> using <command-else>-><identifier-else><bracket-open><block> Lookahead = 
 1401:  *    Reduce on <identifier-fileinto> using <command-else>-><identifier-else><bracket-open><block> Lookahead = 
 1402:  *    Reduce on <identifier-redirect> using <command-else>-><identifier-else><bracket-open><block> Lookahead = 
 1403:  *    Reduce on <identifier-keep> using <command-else>-><identifier-else><bracket-open><block> Lookahead = 
 1404:  *    Reduce on <identifier-discard> using <command-else>-><identifier-else><bracket-open><block> Lookahead = 
 1405:  *    Reduce on <identifier-require> using <command-else>-><identifier-else><bracket-open><block> Lookahead = 
 1406:  *    Reduce on <identifier-if> using <command-else>-><identifier-else><bracket-open><block> Lookahead = 
 1407:  *    Reduce on <identifier> using <command-else>-><identifier-else><bracket-open><block> Lookahead = 
 1408:  *    Reduce on <bracket-close> using <command-else>-><identifier-else><bracket-open><block> Lookahead = 
 1409:  *    Reduce on <hash-comment> using <command-else>-><identifier-else><bracket-open><block> Lookahead = 
 1410:  *    Reduce on <bracket-comment> using <command-else>-><identifier-else><bracket-open><block> Lookahead = 
 1411:  *    Reduce on  using <command-else>-><identifier-else><bracket-open><block> Lookahead = 
 1412:  * ----------- 81 -----------
 1413:  *   --Itemset--
 1414:  *     <command-elsif>-><identifier-elsif><test><bracket-open><block>•
 1415:  *     <command-elsif>-><identifier-elsif><test><bracket-open><block>•<command-elsif>
 1416:  *     <command-elsif>-><identifier-elsif><test><bracket-open><block>•<command-else>
 1417:  *    +<command-elsif>->•<identifier-elsif><test><bracket-open><block>
 1418:  *    +<command-elsif>->•<identifier-elsif><test><bracket-open><block><command-elsif>
 1419:  *    +<command-elsif>->•<identifier-elsif><test><bracket-open><block><command-else>
 1420:  *    +<command-else>->•<identifier-else><bracket-open><block>
 1421:  *   --Transitions--
 1422:  *    Reduce on <identifier-stop> using <command-elsif>-><identifier-elsif><test><bracket-open><block> Lookahead = 
 1423:  *    Reduce on <identifier-notify> using <command-elsif>-><identifier-elsif><test><bracket-open><block> Lookahead = 
 1424:  *    Reduce on <identifier-fileinto> using <command-elsif>-><identifier-elsif><test><bracket-open><block> Lookahead = 
 1425:  *    Reduce on <identifier-redirect> using <command-elsif>-><identifier-elsif><test><bracket-open><block> Lookahead = 
 1426:  *    Reduce on <identifier-keep> using <command-elsif>-><identifier-elsif><test><bracket-open><block> Lookahead = 
 1427:  *    Reduce on <identifier-discard> using <command-elsif>-><identifier-elsif><test><bracket-open><block> Lookahead = 
 1428:  *    Reduce on <identifier-require> using <command-elsif>-><identifier-elsif><test><bracket-open><block> Lookahead = 
 1429:  *    Reduce on <identifier-if> using <command-elsif>-><identifier-elsif><test><bracket-open><block> Lookahead = 
 1430:  *    Reduce on <identifier> using <command-elsif>-><identifier-elsif><test><bracket-open><block> Lookahead = 
 1431:  *    Reduce on <bracket-close> using <command-elsif>-><identifier-elsif><test><bracket-open><block> Lookahead = 
 1432:  *    Reduce on <hash-comment> using <command-elsif>-><identifier-elsif><test><bracket-open><block> Lookahead = 
 1433:  *    Reduce on <bracket-comment> using <command-elsif>-><identifier-elsif><test><bracket-open><block> Lookahead = 
 1434:  *    Reduce on  using <command-elsif>-><identifier-elsif><test><bracket-open><block> Lookahead = 
 1435:  *    Goto on <command-elsif> to 82 because of <command-elsif>-><identifier-elsif><test><bracket-open><block>•<command-elsif>
 1436:  *    Goto on <command-else> to 83 because of <command-elsif>-><identifier-elsif><test><bracket-open><block>•<command-else>
 1437:  *    Shift on <identifier-elsif> to 74 because of <command-elsif>->•<identifier-elsif><test><bracket-open><block> Lookahead = 
 1438:  *    Shift on <identifier-elsif> to 74 because of <command-elsif>->•<identifier-elsif><test><bracket-open><block><command-elsif> Lookahead = 
 1439:  *    Shift on <identifier-elsif> to 74 because of <command-elsif>->•<identifier-elsif><test><bracket-open><block><command-else> Lookahead = 
 1440:  *    Shift on <identifier-else> to 75 because of <command-else>->•<identifier-else><bracket-open><block> Lookahead = 
 1441:  * ----------- 82 -----------
 1442:  *   --Itemset--
 1443:  *     <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif>•
 1444:  *   --Transitions--
 1445:  *    Reduce on <identifier-stop> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif> Lookahead = 
 1446:  *    Reduce on <identifier-notify> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif> Lookahead = 
 1447:  *    Reduce on <identifier-fileinto> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif> Lookahead = 
 1448:  *    Reduce on <identifier-redirect> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif> Lookahead = 
 1449:  *    Reduce on <identifier-keep> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif> Lookahead = 
 1450:  *    Reduce on <identifier-discard> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif> Lookahead = 
 1451:  *    Reduce on <identifier-require> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif> Lookahead = 
 1452:  *    Reduce on <identifier-if> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif> Lookahead = 
 1453:  *    Reduce on <identifier> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif> Lookahead = 
 1454:  *    Reduce on <bracket-close> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif> Lookahead = 
 1455:  *    Reduce on <hash-comment> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif> Lookahead = 
 1456:  *    Reduce on <bracket-comment> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif> Lookahead = 
 1457:  *    Reduce on  using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif> Lookahead = 
 1458:  * ----------- 83 -----------
 1459:  *   --Itemset--
 1460:  *     <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else>•
 1461:  *   --Transitions--
 1462:  *    Reduce on <identifier-stop> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else> Lookahead = 
 1463:  *    Reduce on <identifier-notify> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else> Lookahead = 
 1464:  *    Reduce on <identifier-fileinto> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else> Lookahead = 
 1465:  *    Reduce on <identifier-redirect> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else> Lookahead = 
 1466:  *    Reduce on <identifier-keep> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else> Lookahead = 
 1467:  *    Reduce on <identifier-discard> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else> Lookahead = 
 1468:  *    Reduce on <identifier-require> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else> Lookahead = 
 1469:  *    Reduce on <identifier-if> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else> Lookahead = 
 1470:  *    Reduce on <identifier> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else> Lookahead = 
 1471:  *    Reduce on <bracket-close> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else> Lookahead = 
 1472:  *    Reduce on <hash-comment> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else> Lookahead = 
 1473:  *    Reduce on <bracket-comment> using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else> Lookahead = 
 1474:  *    Reduce on  using <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else> Lookahead =
 1475:  *
 1476:  */
 1477: class TestSieveParser extends \sergiosgc\Text_Parser_LALR
 1478: {
 1479:     /* Constructor {{{ */
 1480:     /**
 1481:      * Parser constructor
 1482:      * 
 1483:      * @param Text_Tokenizer Tokenizer that will feed this parser
 1484:      */
 1485:     public function __construct(&$tokenizer)
 1486:     {
 1487:         parent::__construct($tokenizer);
 1488:         $this->_gotoTable = unserialize('a:25:{i:0;a:5:{s:10:"<commands>";i:1;s:19:"<commented-command>";i:2;s:9:"<comment>";i:3;s:9:"<command>";i:4;s:16:"<single-comment>";i:5;}i:1;a:4:{s:19:"<commented-command>";i:17;s:9:"<comment>";i:3;s:9:"<command>";i:4;s:16:"<single-comment>";i:5;}i:3;a:2:{s:9:"<command>";i:18;s:16:"<single-comment>";i:19;}i:7;a:1:{s:8:"<string>";i:21;}i:8;a:1:{s:8:"<string>";i:24;}i:9;a:1:{s:8:"<string>";i:25;}i:12;a:2:{s:13:"<string-list>";i:28;s:8:"<string>";i:30;}i:13;a:1:{s:6:"<test>";i:31;}i:14;a:7:{s:11:"<arguments>";i:34;s:16:"<arguments-plus>";i:37;s:6:"<test>";i:38;s:11:"<test-list>";i:39;s:10:"<argument>";i:40;s:13:"<string-list>";i:42;s:8:"<string>";i:30;}i:29;a:2:{s:17:"<string-plus-csv>";i:49;s:8:"<string>";i:50;}i:32;a:1:{s:6:"<test>";i:52;}i:33;a:7:{s:11:"<arguments>";i:53;s:16:"<arguments-plus>";i:37;s:6:"<test>";i:38;s:11:"<test-list>";i:39;s:10:"<argument>";i:40;s:13:"<string-list>";i:42;s:8:"<string>";i:30;}i:36;a:2:{s:7:"<block>";i:56;s:9:"<command>";i:57;}i:37;a:5:{s:6:"<test>";i:59;s:11:"<test-list>";i:60;s:10:"<argument>";i:61;s:13:"<string-list>";i:42;s:8:"<string>";i:30;}i:41;a:2:{s:15:"<test-plus-csv>";i:62;s:6:"<test>";i:63;}i:51;a:2:{s:7:"<block>";i:66;s:9:"<command>";i:57;}i:55;a:2:{s:7:"<block>";i:67;s:9:"<command>";i:57;}i:57;a:2:{s:7:"<block>";i:68;s:9:"<command>";i:57;}i:65;a:1:{s:8:"<string>";i:71;}i:66;a:2:{s:15:"<command-elsif>";i:72;s:14:"<command-else>";i:73;}i:70;a:1:{s:6:"<test>";i:76;}i:74;a:1:{s:6:"<test>";i:77;}i:78;a:2:{s:7:"<block>";i:80;s:9:"<command>";i:57;}i:79;a:2:{s:7:"<block>";i:81;s:9:"<command>";i:57;}i:81;a:2:{s:15:"<command-elsif>";i:82;s:14:"<command-else>";i:83;}}');
 1489:         $this->_actionTable = unserialize('a:84:{i:1;a:12:{s:0:"";a:1:{s:6:"action";s:6:"accept";}s:17:"<identifier-stop>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:6;}s:19:"<identifier-notify>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:7;}s:21:"<identifier-fileinto>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:8;}s:21:"<identifier-redirect>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:9;}s:17:"<identifier-keep>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:10;}s:20:"<identifier-discard>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:11;}s:20:"<identifier-require>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:12;}s:15:"<identifier-if>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:13;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:14;}s:14:"<hash-comment>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:15;}s:17:"<bracket-comment>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:16;}}i:0;a:11:{s:17:"<identifier-stop>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:6;}s:19:"<identifier-notify>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:7;}s:21:"<identifier-fileinto>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:8;}s:21:"<identifier-redirect>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:9;}s:17:"<identifier-keep>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:10;}s:20:"<identifier-discard>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:11;}s:20:"<identifier-require>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:12;}s:15:"<identifier-if>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:13;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:14;}s:14:"<hash-comment>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:15;}s:17:"<bracket-comment>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:16;}}i:3;a:11:{s:17:"<identifier-stop>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:6;}s:19:"<identifier-notify>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:7;}s:21:"<identifier-fileinto>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:8;}s:21:"<identifier-redirect>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:9;}s:17:"<identifier-keep>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:10;}s:20:"<identifier-discard>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:11;}s:20:"<identifier-require>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:12;}s:15:"<identifier-if>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:13;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:14;}s:14:"<hash-comment>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:15;}s:17:"<bracket-comment>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:16;}}i:6;a:1:{s:11:"<semicolon>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:20;}}i:7;a:2:{s:15:"<quoted-string>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:22;}s:12:"<multi-line>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:23;}}i:8;a:2:{s:15:"<quoted-string>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:22;}s:12:"<multi-line>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:23;}}i:9;a:2:{s:15:"<quoted-string>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:22;}s:12:"<multi-line>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:23;}}i:10;a:1:{s:11:"<semicolon>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:26;}}i:11;a:1:{s:11:"<semicolon>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:27;}}i:12;a:3:{s:25:"<square-parenthesis-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:29;}s:15:"<quoted-string>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:22;}s:12:"<multi-line>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:23;}}i:13;a:2:{s:16:"<identifier-not>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:32;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:33;}}i:14;a:10:{s:11:"<semicolon>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:35;}s:14:"<bracket-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:36;}s:16:"<identifier-not>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:32;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:33;}s:18:"<parenthesis-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:41;}s:8:"<number>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:43;}s:5:"<tag>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:44;}s:25:"<square-parenthesis-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:29;}s:15:"<quoted-string>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:22;}s:12:"<multi-line>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:23;}}i:21;a:1:{s:11:"<semicolon>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:45;}}i:24;a:1:{s:11:"<semicolon>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:46;}}i:25;a:1:{s:11:"<semicolon>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:47;}}i:28;a:1:{s:11:"<semicolon>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:48;}}i:29;a:2:{s:15:"<quoted-string>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:22;}s:12:"<multi-line>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:23;}}i:31;a:1:{s:14:"<bracket-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:51;}}i:32;a:2:{s:16:"<identifier-not>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:32;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:33;}}i:33;a:12:{s:16:"<identifier-not>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:32;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:33;}s:18:"<parenthesis-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:41;}s:8:"<number>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:43;}s:5:"<tag>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:44;}s:25:"<square-parenthesis-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:29;}s:15:"<quoted-string>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:22;}s:12:"<multi-line>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:23;}s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:3:"$id";}s:15:"leftNonTerminal";s:6:"<test>";s:8:"function";s:14:"reduce_rule_34";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:3:"$id";}s:15:"leftNonTerminal";s:6:"<test>";s:8:"function";s:14:"reduce_rule_34";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:3:"$id";}s:15:"leftNonTerminal";s:6:"<test>";s:8:"function";s:14:"reduce_rule_34";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:3:"$id";}s:15:"leftNonTerminal";s:6:"<test>";s:8:"function";s:14:"reduce_rule_34";}}i:34;a:2:{s:11:"<semicolon>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:54;}s:14:"<bracket-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}}i:36;a:10:{s:15:"<bracket-close>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:58;}s:17:"<identifier-stop>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:6;}s:19:"<identifier-notify>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:7;}s:21:"<identifier-fileinto>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:8;}s:21:"<identifier-redirect>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:9;}s:17:"<identifier-keep>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:10;}s:20:"<identifier-discard>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:11;}s:20:"<identifier-require>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:12;}s:15:"<identifier-if>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:13;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:14;}}i:37;a:12:{s:16:"<identifier-not>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:32;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:33;}s:18:"<parenthesis-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:41;}s:8:"<number>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:43;}s:5:"<tag>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:44;}s:25:"<square-parenthesis-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:29;}s:15:"<quoted-string>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:22;}s:12:"<multi-line>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:23;}s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:5:"$args";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_25";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:5:"$args";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_25";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:5:"$args";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_25";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:5:"$args";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_25";}}i:41;a:2:{s:16:"<identifier-not>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:32;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:33;}}i:49;a:2:{s:26:"<square-parenthesis-close>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:64;}s:7:"<comma>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:65;}}i:51;a:10:{s:15:"<bracket-close>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:58;}s:17:"<identifier-stop>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:6;}s:19:"<identifier-notify>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:7;}s:21:"<identifier-fileinto>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:8;}s:21:"<identifier-redirect>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:9;}s:17:"<identifier-keep>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:10;}s:20:"<identifier-discard>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:11;}s:20:"<identifier-require>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:12;}s:15:"<identifier-if>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:13;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:14;}}i:55;a:10:{s:15:"<bracket-close>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:58;}s:17:"<identifier-stop>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:6;}s:19:"<identifier-notify>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:7;}s:21:"<identifier-fileinto>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:8;}s:21:"<identifier-redirect>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:9;}s:17:"<identifier-keep>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:10;}s:20:"<identifier-discard>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:11;}s:20:"<identifier-require>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:12;}s:15:"<identifier-if>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:13;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:14;}}i:57;a:10:{s:15:"<bracket-close>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:58;}s:17:"<identifier-stop>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:6;}s:19:"<identifier-notify>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:7;}s:21:"<identifier-fileinto>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:8;}s:21:"<identifier-redirect>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:9;}s:17:"<identifier-keep>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:10;}s:20:"<identifier-discard>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:11;}s:20:"<identifier-require>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:12;}s:15:"<identifier-if>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:13;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:14;}}i:62;a:2:{s:19:"<parenthesis-close>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:69;}s:7:"<comma>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:70;}}i:65;a:2:{s:15:"<quoted-string>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:22;}s:12:"<multi-line>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:23;}}i:66;a:15:{s:18:"<identifier-elsif>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:74;}s:17:"<identifier-else>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:75;}s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_12";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_12";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_12";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_12";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_12";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_12";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_12";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_12";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_12";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_12";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_12";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_12";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_12";}}i:70;a:2:{s:16:"<identifier-not>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:32;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:33;}}i:74;a:2:{s:16:"<identifier-not>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:32;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:33;}}i:75;a:1:{s:14:"<bracket-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:78;}}i:77;a:1:{s:14:"<bracket-open>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:79;}}i:78;a:10:{s:15:"<bracket-close>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:58;}s:17:"<identifier-stop>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:6;}s:19:"<identifier-notify>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:7;}s:21:"<identifier-fileinto>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:8;}s:21:"<identifier-redirect>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:9;}s:17:"<identifier-keep>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:10;}s:20:"<identifier-discard>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:11;}s:20:"<identifier-require>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:12;}s:15:"<identifier-if>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:13;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:14;}}i:79;a:10:{s:15:"<bracket-close>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:58;}s:17:"<identifier-stop>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:6;}s:19:"<identifier-notify>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:7;}s:21:"<identifier-fileinto>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:8;}s:21:"<identifier-redirect>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:9;}s:17:"<identifier-keep>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:10;}s:20:"<identifier-discard>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:11;}s:20:"<identifier-require>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:12;}s:15:"<identifier-if>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:13;}s:12:"<identifier>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:14;}}i:81;a:15:{s:18:"<identifier-elsif>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:74;}s:17:"<identifier-else>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:75;}s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_15";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_15";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_15";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_15";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_15";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_15";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_15";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_15";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_15";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_15";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_15";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_15";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_15";}}i:2;a:12:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_2";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_2";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_2";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_2";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_2";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_2";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_2";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_2";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_2";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_2";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_2";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_2";}}i:4;a:12:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_4";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_4";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_4";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_4";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_4";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_4";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_4";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_4";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_4";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_4";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_4";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_4";}}i:5;a:11:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_48";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_48";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_48";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_48";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_48";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_48";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_48";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_48";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_48";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_48";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_48";}}i:15;a:11:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_49";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_49";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_49";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_49";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_49";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_49";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_49";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_49";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_49";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_49";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_49";}}i:16;a:11:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_50";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_50";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_50";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_50";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_50";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_50";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_50";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_50";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_50";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_50";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:8:"$comment";}s:15:"leftNonTerminal";s:16:"<single-comment>";s:8:"function";s:14:"reduce_rule_50";}}i:17;a:12:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_1";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_1";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_1";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_1";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_1";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_1";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_1";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_1";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_1";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_1";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_1";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$cmd";}s:15:"leftNonTerminal";s:10:"<commands>";s:8:"function";s:13:"reduce_rule_1";}}i:18;a:12:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_3";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_3";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_3";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_3";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_3";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_3";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_3";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_3";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_3";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_3";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_3";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:8:"$command";}s:15:"leftNonTerminal";s:19:"<commented-command>";s:8:"function";s:13:"reduce_rule_3";}}i:19;a:11:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_47";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_47";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_47";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_47";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_47";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_47";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_47";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_47";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_47";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_47";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$comment";i:1;s:14:"$singleComment";}s:15:"leftNonTerminal";s:9:"<comment>";s:8:"function";s:14:"reduce_rule_47";}}i:20;a:13:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_5";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_5";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_5";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_5";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_5";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_5";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_5";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_5";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_5";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_5";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_5";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_5";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_5";}}i:22;a:13:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_45";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_45";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_45";}s:16:"<identifier-not>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_45";}s:18:"<parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_45";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_45";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_45";}s:8:"<number>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_45";}s:5:"<tag>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_45";}s:25:"<square-parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_45";}s:26:"<square-parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_45";}s:15:"<quoted-string>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_45";}s:12:"<multi-line>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:7:"$quoted";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_45";}}i:23;a:13:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_46";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_46";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_46";}s:16:"<identifier-not>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_46";}s:18:"<parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_46";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_46";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_46";}s:8:"<number>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_46";}s:5:"<tag>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_46";}s:25:"<square-parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_46";}s:26:"<square-parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_46";}s:15:"<quoted-string>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_46";}s:12:"<multi-line>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:10:"$multiline";}s:15:"leftNonTerminal";s:8:"<string>";s:8:"function";s:14:"reduce_rule_46";}}i:26;a:13:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_9";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_9";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_9";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_9";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_9";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_9";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_9";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_9";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_9";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_9";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_9";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_9";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_9";}}i:27;a:13:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_10";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_10";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_10";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_10";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_10";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_10";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_10";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_10";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_10";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_10";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_10";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_10";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_10";}}i:30;a:12:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_42";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_42";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_42";}s:16:"<identifier-not>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_42";}s:18:"<parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_42";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_42";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_42";}s:8:"<number>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_42";}s:5:"<tag>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_42";}s:25:"<square-parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_42";}s:15:"<quoted-string>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_42";}s:12:"<multi-line>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_42";}}i:35;a:13:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_21";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_21";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_21";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_21";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_21";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_21";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_21";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_21";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_21";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_21";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_21";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_21";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_21";}}i:38;a:2:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:5:"$test";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_28";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:5:"$test";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_28";}}i:39;a:4:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:6:"$tests";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_29";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:6:"$tests";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_29";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:6:"$tests";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_29";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:6:"$tests";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_29";}}i:40;a:12:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_31";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_31";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_31";}s:16:"<identifier-not>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_31";}s:18:"<parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_31";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_31";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_31";}s:8:"<number>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_31";}s:5:"<tag>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_31";}s:25:"<square-parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_31";}s:15:"<quoted-string>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_31";}s:12:"<multi-line>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_31";}}i:42;a:12:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_38";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_38";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_38";}s:16:"<identifier-not>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_38";}s:18:"<parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_38";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_38";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_38";}s:8:"<number>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_38";}s:5:"<tag>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_38";}s:25:"<square-parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_38";}s:15:"<quoted-string>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_38";}s:12:"<multi-line>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_38";}}i:43;a:12:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_39";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_39";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_39";}s:16:"<identifier-not>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_39";}s:18:"<parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_39";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_39";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_39";}s:8:"<number>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_39";}s:5:"<tag>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_39";}s:25:"<square-parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_39";}s:15:"<quoted-string>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_39";}s:12:"<multi-line>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$arg";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_39";}}i:44;a:12:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_40";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_40";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_40";}s:16:"<identifier-not>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_40";}s:18:"<parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_40";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_40";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_40";}s:8:"<number>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_40";}s:5:"<tag>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_40";}s:25:"<square-parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_40";}s:15:"<quoted-string>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_40";}s:12:"<multi-line>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$tag";}s:15:"leftNonTerminal";s:10:"<argument>";s:8:"function";s:14:"reduce_rule_40";}}i:45;a:13:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:12:"$destination";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_6";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:12:"$destination";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_6";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:12:"$destination";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_6";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:12:"$destination";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_6";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:12:"$destination";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_6";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:12:"$destination";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_6";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:12:"$destination";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_6";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:12:"$destination";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_6";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:12:"$destination";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_6";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:12:"$destination";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_6";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:12:"$destination";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_6";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:12:"$destination";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_6";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:12:"$destination";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_6";}}i:46;a:13:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$mailbox";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_7";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$mailbox";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_7";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$mailbox";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_7";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$mailbox";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_7";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$mailbox";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_7";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$mailbox";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_7";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$mailbox";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_7";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$mailbox";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_7";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$mailbox";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_7";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$mailbox";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_7";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$mailbox";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_7";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$mailbox";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_7";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$mailbox";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_7";}}i:47;a:13:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$address";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_8";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$address";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_8";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$address";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_8";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$address";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_8";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$address";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_8";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$address";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_8";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$address";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_8";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$address";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_8";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$address";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_8";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$address";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_8";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$address";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_8";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$address";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_8";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:8:"$address";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:13:"reduce_rule_8";}}i:48;a:13:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:13:"$capabilities";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_11";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:13:"$capabilities";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_11";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:13:"$capabilities";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_11";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:13:"$capabilities";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_11";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:13:"$capabilities";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_11";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:13:"$capabilities";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_11";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:13:"$capabilities";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_11";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:13:"$capabilities";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_11";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:13:"$capabilities";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_11";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:13:"$capabilities";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_11";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:13:"$capabilities";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_11";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:13:"$capabilities";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_11";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:13:"$capabilities";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_11";}}i:50;a:2:{s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:17:"<string-plus-csv>";s:8:"function";s:14:"reduce_rule_43";}s:26:"<square-parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:4:"$str";}s:15:"leftNonTerminal";s:17:"<string-plus-csv>";s:8:"function";s:14:"reduce_rule_43";}}i:52;a:4:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:5:"$test";}s:15:"leftNonTerminal";s:6:"<test>";s:8:"function";s:14:"reduce_rule_32";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:5:"$test";}s:15:"leftNonTerminal";s:6:"<test>";s:8:"function";s:14:"reduce_rule_32";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:5:"$test";}s:15:"leftNonTerminal";s:6:"<test>";s:8:"function";s:14:"reduce_rule_32";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:5:"$test";}s:15:"leftNonTerminal";s:6:"<test>";s:8:"function";s:14:"reduce_rule_32";}}i:53;a:4:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:5:"$args";}s:15:"leftNonTerminal";s:6:"<test>";s:8:"function";s:14:"reduce_rule_33";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:5:"$args";}s:15:"leftNonTerminal";s:6:"<test>";s:8:"function";s:14:"reduce_rule_33";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:5:"$args";}s:15:"leftNonTerminal";s:6:"<test>";s:8:"function";s:14:"reduce_rule_33";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:3:"$id";i:1;s:5:"$args";}s:15:"leftNonTerminal";s:6:"<test>";s:8:"function";s:14:"reduce_rule_33";}}i:54;a:13:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_19";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_19";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_19";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_19";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_19";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_19";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_19";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_19";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_19";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_19";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_19";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_19";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_19";}}i:56;a:13:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_22";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_22";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_22";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_22";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_22";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_22";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_22";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_22";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_22";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_22";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_22";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_22";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:3:"$id";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_22";}}i:58;a:15:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_24";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_24";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_24";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_24";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_24";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_24";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_24";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_24";}s:18:"<identifier-elsif>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_24";}s:17:"<identifier-else>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_24";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_24";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_24";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_24";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_24";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_24";}}i:59;a:2:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:5:"$args";i:1;s:5:"$test";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_26";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:5:"$args";i:1;s:5:"$test";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_26";}}i:60;a:4:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:5:"$args";i:1;s:6:"$tests";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_27";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:5:"$args";i:1;s:6:"$tests";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_27";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:5:"$args";i:1;s:6:"$tests";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_27";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:5:"$args";i:1;s:6:"$tests";}s:15:"leftNonTerminal";s:11:"<arguments>";s:8:"function";s:14:"reduce_rule_27";}}i:61;a:12:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_30";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_30";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_30";}s:16:"<identifier-not>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_30";}s:18:"<parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_30";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_30";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_30";}s:8:"<number>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_30";}s:5:"<tag>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_30";}s:25:"<square-parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_30";}s:15:"<quoted-string>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_30";}s:12:"<multi-line>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:4:"$acc";i:1;s:4:"$arg";}s:15:"leftNonTerminal";s:16:"<arguments-plus>";s:8:"function";s:14:"reduce_rule_30";}}i:63;a:2:{s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:5:"$test";}s:15:"leftNonTerminal";s:15:"<test-plus-csv>";s:8:"function";s:14:"reduce_rule_36";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:5:"$test";}s:15:"leftNonTerminal";s:15:"<test-plus-csv>";s:8:"function";s:14:"reduce_rule_36";}}i:64;a:12:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_41";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_41";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_41";}s:16:"<identifier-not>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_41";}s:18:"<parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_41";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_41";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_41";}s:8:"<number>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_41";}s:5:"<tag>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_41";}s:25:"<square-parenthesis-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_41";}s:15:"<quoted-string>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_41";}s:12:"<multi-line>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:7:"$strArr";i:2;s:0:"";}s:15:"leftNonTerminal";s:13:"<string-list>";s:8:"function";s:14:"reduce_rule_41";}}i:67;a:13:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_20";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_20";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_20";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_20";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_20";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_20";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_20";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_20";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_20";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_20";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_20";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_20";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:3:"$id";i:1;s:5:"$args";i:2;s:0:"";i:3;s:6:"$block";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_20";}}i:68;a:15:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_23";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_23";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_23";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_23";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_23";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_23";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_23";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_23";}s:18:"<identifier-elsif>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_23";}s:17:"<identifier-else>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_23";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_23";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_23";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_23";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_23";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:8:"$command";i:1;s:4:"$acc";}s:15:"leftNonTerminal";s:7:"<block>";s:8:"function";s:14:"reduce_rule_23";}}i:69;a:4:{s:11:"<semicolon>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:6:"$tests";i:2;s:0:"";}s:15:"leftNonTerminal";s:11:"<test-list>";s:8:"function";s:14:"reduce_rule_35";}s:14:"<bracket-open>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:6:"$tests";i:2;s:0:"";}s:15:"leftNonTerminal";s:11:"<test-list>";s:8:"function";s:14:"reduce_rule_35";}s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:6:"$tests";i:2;s:0:"";}s:15:"leftNonTerminal";s:11:"<test-list>";s:8:"function";s:14:"reduce_rule_35";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:6:"$tests";i:2;s:0:"";}s:15:"leftNonTerminal";s:11:"<test-list>";s:8:"function";s:14:"reduce_rule_35";}}i:71;a:2:{s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:4:"$acc";i:1;s:0:"";i:2;s:4:"$str";}s:15:"leftNonTerminal";s:17:"<string-plus-csv>";s:8:"function";s:14:"reduce_rule_44";}s:26:"<square-parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:4:"$acc";i:1;s:0:"";i:2;s:4:"$str";}s:15:"leftNonTerminal";s:17:"<string-plus-csv>";s:8:"function";s:14:"reduce_rule_44";}}i:72;a:13:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_13";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_13";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_13";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_13";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_13";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_13";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_13";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_13";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_13";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_13";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_13";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_13";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_13";}}i:73;a:13:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_14";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_14";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_14";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_14";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_14";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_14";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_14";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_14";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_14";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_14";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_14";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_14";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:9:"<command>";s:8:"function";s:14:"reduce_rule_14";}}i:76;a:2:{s:19:"<parenthesis-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:4:"$acc";i:1;s:0:"";i:2;s:5:"$test";}s:15:"leftNonTerminal";s:15:"<test-plus-csv>";s:8:"function";s:14:"reduce_rule_37";}s:7:"<comma>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:4:"$acc";i:1;s:0:"";i:2;s:5:"$test";}s:15:"leftNonTerminal";s:15:"<test-plus-csv>";s:8:"function";s:14:"reduce_rule_37";}}i:80;a:13:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:14:"<command-else>";s:8:"function";s:14:"reduce_rule_18";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:14:"<command-else>";s:8:"function";s:14:"reduce_rule_18";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:14:"<command-else>";s:8:"function";s:14:"reduce_rule_18";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:14:"<command-else>";s:8:"function";s:14:"reduce_rule_18";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:14:"<command-else>";s:8:"function";s:14:"reduce_rule_18";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:14:"<command-else>";s:8:"function";s:14:"reduce_rule_18";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:14:"<command-else>";s:8:"function";s:14:"reduce_rule_18";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:14:"<command-else>";s:8:"function";s:14:"reduce_rule_18";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:14:"<command-else>";s:8:"function";s:14:"reduce_rule_18";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:14:"<command-else>";s:8:"function";s:14:"reduce_rule_18";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:14:"<command-else>";s:8:"function";s:14:"reduce_rule_18";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:14:"<command-else>";s:8:"function";s:14:"reduce_rule_18";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:0:"";i:2;s:6:"$block";}s:15:"leftNonTerminal";s:14:"<command-else>";s:8:"function";s:14:"reduce_rule_18";}}i:82;a:13:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_16";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_16";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_16";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_16";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_16";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_16";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_16";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_16";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_16";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_16";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_16";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_16";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_16";}}i:83;a:13:{s:17:"<identifier-stop>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_17";}s:19:"<identifier-notify>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_17";}s:21:"<identifier-fileinto>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_17";}s:21:"<identifier-redirect>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_17";}s:17:"<identifier-keep>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_17";}s:20:"<identifier-discard>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_17";}s:20:"<identifier-require>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_17";}s:15:"<identifier-if>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_17";}s:12:"<identifier>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_17";}s:15:"<bracket-close>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_17";}s:14:"<hash-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_17";}s:17:"<bracket-comment>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_17";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:5:"$test";i:2;s:0:"";i:3;s:6:"$block";i:4;s:5:"$else";}s:15:"leftNonTerminal";s:15:"<command-elsif>";s:8:"function";s:14:"reduce_rule_17";}}}');
 1490:     }
 1491:     /* }}} */
 1492:     /* reduce_rule_2 {{{ */
 1493:     /**
 1494:      * Reduction function for rule 2 
 1495:      *
 1496:      * Rule 2 is:
 1497:      * <commands>-><commented-command>
 1498:      *
 1499:      * @param Text_Tokenizer_Token Token of type '<commented-command>'
 1500:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<commands>' token
 1501:      */
 1502:     protected function reduce_rule_2($cmd = null)
 1503:     {
 1504:             if (!isset($acc)) $acc = new \sergiosgc\Text_Tokenizer_Token('<commands>', []);
 1505:         array_push($acc->getValue(), $cmd->getValue());
 1506:         return $acc;
 1507:         return new \sergiosgc\Text_Tokenizer_Token('<commands>', $result);
 1508:     }
 1509:     /* }}} */
 1510:     /* reduce_rule_4 {{{ */
 1511:     /**
 1512:      * Reduction function for rule 4 
 1513:      *
 1514:      * Rule 4 is:
 1515:      * <commented-command>-><command>
 1516:      *
 1517:      * @param Text_Tokenizer_Token Token of type '<command>'
 1518:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<commented-command>' token
 1519:      */
 1520:     protected function reduce_rule_4($command = null)
 1521:     {
 1522:             if (!isset($comment)) $comment = new \sergiosgc\Text_Tokenizer_Token('<comment>', null);
 1523:         $command->getValue()->setComment($comment->getValue());
 1524:         return new \sergiosgc\Text_Tokenizer_Token('<commented-command>', $command->getValue());
 1525:         return new \sergiosgc\Text_Tokenizer_Token('<commented-command>', $result);
 1526:     }
 1527:     /* }}} */
 1528:     /* reduce_rule_48 {{{ */
 1529:     /**
 1530:      * Reduction function for rule 48 
 1531:      *
 1532:      * Rule 48 is:
 1533:      * <comment>-><single-comment>
 1534:      *
 1535:      * @param Text_Tokenizer_Token Token of type '<single-comment>'
 1536:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<comment>' token
 1537:      */
 1538:     protected function reduce_rule_48($singleComment = null)
 1539:     {
 1540:             if (isset($comment)) {
 1541:             $comment->getValue()->text .= $singleComment->getValue();
 1542:             return $comment;
 1543:         }
 1544:         $result = new \sergiosgc\Sieve_Parser\Script_Comment($singleComment->getValue());
 1545:         return new \sergiosgc\Text_Tokenizer_Token('<comment>', $result);
 1546:     }
 1547:     /* }}} */
 1548:     /* reduce_rule_49 {{{ */
 1549:     /**
 1550:      * Reduction function for rule 49 
 1551:      *
 1552:      * Rule 49 is:
 1553:      * <single-comment>-><hash-comment>
 1554:      *
 1555:      * @param Text_Tokenizer_Token Token of type '<hash-comment>'
 1556:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<single-comment>' token
 1557:      */
 1558:     protected function reduce_rule_49($comment = null)
 1559:     {
 1560:             $result = $comment->getValue();
 1561:         return new \sergiosgc\Text_Tokenizer_Token('<single-comment>', $result);
 1562:     }
 1563:     /* }}} */
 1564:     /* reduce_rule_50 {{{ */
 1565:     /**
 1566:      * Reduction function for rule 50 
 1567:      *
 1568:      * Rule 50 is:
 1569:      * <single-comment>-><bracket-comment>
 1570:      *
 1571:      * @param Text_Tokenizer_Token Token of type '<bracket-comment>'
 1572:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<single-comment>' token
 1573:      */
 1574:     protected function reduce_rule_50($comment = null)
 1575:     {
 1576:             $result = $comment->getValue();
 1577:         return new \sergiosgc\Text_Tokenizer_Token('<single-comment>', $result);
 1578:     }
 1579:     /* }}} */
 1580:     /* reduce_rule_1 {{{ */
 1581:     /**
 1582:      * Reduction function for rule 1 
 1583:      *
 1584:      * Rule 1 is:
 1585:      * <commands>-><commands><commented-command>
 1586:      *
 1587:      * @param Text_Tokenizer_Token Token of type '<commands>'
 1588:      * @param Text_Tokenizer_Token Token of type '<commented-command>'
 1589:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<commands>' token
 1590:      */
 1591:     protected function reduce_rule_1($acc = null,$cmd = null)
 1592:     {
 1593:             if (!isset($acc)) $acc = new \sergiosgc\Text_Tokenizer_Token('<commands>', []);
 1594:         array_push($acc->getValue(), $cmd->getValue());
 1595:         return $acc;
 1596:         return new \sergiosgc\Text_Tokenizer_Token('<commands>', $result);
 1597:     }
 1598:     /* }}} */
 1599:     /* reduce_rule_3 {{{ */
 1600:     /**
 1601:      * Reduction function for rule 3 
 1602:      *
 1603:      * Rule 3 is:
 1604:      * <commented-command>-><comment><command>
 1605:      *
 1606:      * @param Text_Tokenizer_Token Token of type '<comment>'
 1607:      * @param Text_Tokenizer_Token Token of type '<command>'
 1608:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<commented-command>' token
 1609:      */
 1610:     protected function reduce_rule_3($comment = null,$command = null)
 1611:     {
 1612:             if (!isset($comment)) $comment = new \sergiosgc\Text_Tokenizer_Token('<comment>', null);
 1613:         $command->getValue()->setComment($comment->getValue());
 1614:         return new \sergiosgc\Text_Tokenizer_Token('<commented-command>', $command->getValue());
 1615:         return new \sergiosgc\Text_Tokenizer_Token('<commented-command>', $result);
 1616:     }
 1617:     /* }}} */
 1618:     /* reduce_rule_47 {{{ */
 1619:     /**
 1620:      * Reduction function for rule 47 
 1621:      *
 1622:      * Rule 47 is:
 1623:      * <comment>-><comment><single-comment>
 1624:      *
 1625:      * @param Text_Tokenizer_Token Token of type '<comment>'
 1626:      * @param Text_Tokenizer_Token Token of type '<single-comment>'
 1627:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<comment>' token
 1628:      */
 1629:     protected function reduce_rule_47($comment = null,$singleComment = null)
 1630:     {
 1631:             if (isset($comment)) {
 1632:             $comment->getValue()->text .= $singleComment->getValue();
 1633:             return $comment;
 1634:         }
 1635:         $result = new \sergiosgc\Sieve_Parser\Script_Comment($singleComment->getValue());
 1636:         return new \sergiosgc\Text_Tokenizer_Token('<comment>', $result);
 1637:     }
 1638:     /* }}} */
 1639:     /* reduce_rule_5 {{{ */
 1640:     /**
 1641:      * Reduction function for rule 5 
 1642:      *
 1643:      * Rule 5 is:
 1644:      * <command>-><identifier-stop><semicolon>
 1645:      *
 1646:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
 1647:      */
 1648:     protected function reduce_rule_5()
 1649:     {
 1650:             $result = new \sergiosgc\Sieve_Parser\Script_Command_Stop();
 1651:         return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
 1652:     }
 1653:     /* }}} */
 1654:     /* reduce_rule_45 {{{ */
 1655:     /**
 1656:      * Reduction function for rule 45 
 1657:      *
 1658:      * Rule 45 is:
 1659:      * <string>-><quoted-string>
 1660:      *
 1661:      * @param Text_Tokenizer_Token Token of type '<quoted-string>'
 1662:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<string>' token
 1663:      */
 1664:     protected function reduce_rule_45($quoted = null)
 1665:     {
 1666:             $result = isset($quoted) ?
 1667:             strtr($quoted->getValue(), [ '\\r' => "\r", '\\n' => "\n", '\\\\' => '\\' ]) : # Unquote string
 1668:             substr($multiline->getValue(), 0, -3); # Remove .CRLF marker
 1669:         return new \sergiosgc\Text_Tokenizer_Token('<string>', $result);
 1670:     }
 1671:     /* }}} */
 1672:     /* reduce_rule_46 {{{ */
 1673:     /**
 1674:      * Reduction function for rule 46 
 1675:      *
 1676:      * Rule 46 is:
 1677:      * <string>-><multi-line>
 1678:      *
 1679:      * @param Text_Tokenizer_Token Token of type '<multi-line>'
 1680:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<string>' token
 1681:      */
 1682:     protected function reduce_rule_46($multiline = null)
 1683:     {
 1684:             $result = isset($quoted) ?
 1685:             strtr($quoted->getValue(), [ '\\r' => "\r", '\\n' => "\n", '\\\\' => '\\' ]) : # Unquote string
 1686:             substr($multiline->getValue(), 0, -3); # Remove .CRLF marker
 1687:         return new \sergiosgc\Text_Tokenizer_Token('<string>', $result);
 1688:     }
 1689:     /* }}} */
 1690:     /* reduce_rule_9 {{{ */
 1691:     /**
 1692:      * Reduction function for rule 9 
 1693:      *
 1694:      * Rule 9 is:
 1695:      * <command>-><identifier-keep><semicolon>
 1696:      *
 1697:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
 1698:      */
 1699:     protected function reduce_rule_9()
 1700:     {
 1701:             $result = new \sergiosgc\Sieve_Parser\Script_Command_Keep();
 1702:         return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
 1703:     }
 1704:     /* }}} */
 1705:     /* reduce_rule_10 {{{ */
 1706:     /**
 1707:      * Reduction function for rule 10 
 1708:      *
 1709:      * Rule 10 is:
 1710:      * <command>-><identifier-discard><semicolon>
 1711:      *
 1712:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
 1713:      */
 1714:     protected function reduce_rule_10()
 1715:     {
 1716:             $result = new \sergiosgc\Sieve_Parser\Script_Command_Discard();
 1717:         return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
 1718:     }
 1719:     /* }}} */
 1720:     /* reduce_rule_42 {{{ */
 1721:     /**
 1722:      * Reduction function for rule 42 
 1723:      *
 1724:      * Rule 42 is:
 1725:      * <string-list>-><string>
 1726:      *
 1727:      * @param Text_Tokenizer_Token Token of type '<string>'
 1728:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<string-list>' token
 1729:      */
 1730:     protected function reduce_rule_42($str = null)
 1731:     {
 1732:             if (isset($str)) return new \sergiosgc\Text_Tokenizer_Token('<string-list>', $str->getValue());
 1733:         return new \sergiosgc\Text_Tokenizer_Token('<string-list>', $strArr->getValue());
 1734:         return new \sergiosgc\Text_Tokenizer_Token('<string-list>', $result);
 1735:     }
 1736:     /* }}} */
 1737:     /* reduce_rule_34 {{{ */
 1738:     /**
 1739:      * Reduction function for rule 34 
 1740:      *
 1741:      * Rule 34 is:
 1742:      * <test>-><identifier>
 1743:      *
 1744:      * @param Text_Tokenizer_Token Token of type '<identifier>'
 1745:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<test>' token
 1746:      */
 1747:     protected function reduce_rule_34($id = null)
 1748:     {
 1749:             if (isset($args)) {
 1750:             $result = new \sergiosgc\Sieve_Parser\Script_Test($id->getValue(), array_merge($args->getValue()['arguments'], $args->getValue()['tests']));
 1751:         } else {
 1752:             $result = new \sergiosgc\Sieve_Parser\Script_Test($id->getValue(), []);
 1753:         }
 1754:         return new \sergiosgc\Text_Tokenizer_Token('<test>', $result);
 1755:     }
 1756:     /* }}} */
 1757:     /* reduce_rule_21 {{{ */
 1758:     /**
 1759:      * Reduction function for rule 21 
 1760:      *
 1761:      * Rule 21 is:
 1762:      * <command>-><identifier><semicolon>
 1763:      *
 1764:      * @param Text_Tokenizer_Token Token of type '<identifier>'
 1765:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
 1766:      */
 1767:     protected function reduce_rule_21($id = null)
 1768:     {
 1769:             if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments>', [ 'arguments' => [], 'tests' => [] ]);
 1770:         if (!isset($block)) $block = new \sergiosgc\Text_Tokenizer_Token('<block>', []);
 1771:         $result = new \sergiosgc\Sieve_Parser\Script_Command_Generic(
 1772:             $id->getValue(),
 1773:             array_merge($args->getValue()['arguments'], $args->getValue()['tests']),
 1774:             $block->getValue());
 1775:         return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
 1776:     }
 1777:     /* }}} */
 1778:     /* reduce_rule_25 {{{ */
 1779:     /**
 1780:      * Reduction function for rule 25 
 1781:      *
 1782:      * Rule 25 is:
 1783:      * <arguments>-><arguments-plus>
 1784:      *
 1785:      * @param Text_Tokenizer_Token Token of type '<arguments-plus>'
 1786:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<arguments>' token
 1787:      */
 1788:     protected function reduce_rule_25($args = null)
 1789:     {
 1790:             if (isset($tests)) $debug = true;
 1791:         if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments-plus>', []);
 1792:         if (!isset($tests)) $tests = new \sergiosgc\Text_Tokenizer_Token('<test-list>', []);
 1793:         if (isset($test)) array_unshift($tests->getValue(), $test->getValue());
 1794:         $result = [ 'arguments' => $args->getValue(), 'tests' => $tests->getValue() ];
 1795:         return new \sergiosgc\Text_Tokenizer_Token('<arguments>', $result);
 1796:     }
 1797:     /* }}} */
 1798:     /* reduce_rule_28 {{{ */
 1799:     /**
 1800:      * Reduction function for rule 28 
 1801:      *
 1802:      * Rule 28 is:
 1803:      * <arguments>-><test>
 1804:      *
 1805:      * @param Text_Tokenizer_Token Token of type '<test>'
 1806:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<arguments>' token
 1807:      */
 1808:     protected function reduce_rule_28($test = null)
 1809:     {
 1810:             if (isset($tests)) $debug = true;
 1811:         if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments-plus>', []);
 1812:         if (!isset($tests)) $tests = new \sergiosgc\Text_Tokenizer_Token('<test-list>', []);
 1813:         if (isset($test)) array_unshift($tests->getValue(), $test->getValue());
 1814:         $result = [ 'arguments' => $args->getValue(), 'tests' => $tests->getValue() ];
 1815:         return new \sergiosgc\Text_Tokenizer_Token('<arguments>', $result);
 1816:     }
 1817:     /* }}} */
 1818:     /* reduce_rule_29 {{{ */
 1819:     /**
 1820:      * Reduction function for rule 29 
 1821:      *
 1822:      * Rule 29 is:
 1823:      * <arguments>-><test-list>
 1824:      *
 1825:      * @param Text_Tokenizer_Token Token of type '<test-list>'
 1826:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<arguments>' token
 1827:      */
 1828:     protected function reduce_rule_29($tests = null)
 1829:     {
 1830:             if (isset($tests)) $debug = true;
 1831:         if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments-plus>', []);
 1832:         if (!isset($tests)) $tests = new \sergiosgc\Text_Tokenizer_Token('<test-list>', []);
 1833:         if (isset($test)) array_unshift($tests->getValue(), $test->getValue());
 1834:         $result = [ 'arguments' => $args->getValue(), 'tests' => $tests->getValue() ];
 1835:         return new \sergiosgc\Text_Tokenizer_Token('<arguments>', $result);
 1836:     }
 1837:     /* }}} */
 1838:     /* reduce_rule_31 {{{ */
 1839:     /**
 1840:      * Reduction function for rule 31 
 1841:      *
 1842:      * Rule 31 is:
 1843:      * <arguments-plus>-><argument>
 1844:      *
 1845:      * @param Text_Tokenizer_Token Token of type '<argument>'
 1846:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<arguments-plus>' token
 1847:      */
 1848:     protected function reduce_rule_31($arg = null)
 1849:     {
 1850:             if (!isset($acc)) $acc = new \sergiosgc\Text_Tokenizer_Token('<arguments-plus>', []);
 1851:         array_push($acc->getValue(), $arg->getValue());
 1852:         return $acc;
 1853:         return new \sergiosgc\Text_Tokenizer_Token('<arguments-plus>', $result);
 1854:     }
 1855:     /* }}} */
 1856:     /* reduce_rule_38 {{{ */
 1857:     /**
 1858:      * Reduction function for rule 38 
 1859:      *
 1860:      * Rule 38 is:
 1861:      * <argument>-><string-list>
 1862:      *
 1863:      * @param Text_Tokenizer_Token Token of type '<string-list>'
 1864:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<argument>' token
 1865:      */
 1866:     protected function reduce_rule_38($arg = null)
 1867:     {
 1868:             if (isset($tag)) return new \sergiosgc\Text_Tokenizer_Token('<argument>', new \sergiosgc\Sieve_Parser\Script_Tag($tag->getValue()));
 1869:         $result = $arg->getValue();
 1870:         return new \sergiosgc\Text_Tokenizer_Token('<argument>', $result);
 1871:     }
 1872:     /* }}} */
 1873:     /* reduce_rule_39 {{{ */
 1874:     /**
 1875:      * Reduction function for rule 39 
 1876:      *
 1877:      * Rule 39 is:
 1878:      * <argument>-><number>
 1879:      *
 1880:      * @param Text_Tokenizer_Token Token of type '<number>'
 1881:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<argument>' token
 1882:      */
 1883:     protected function reduce_rule_39($arg = null)
 1884:     {
 1885:             if (isset($tag)) return new \sergiosgc\Text_Tokenizer_Token('<argument>', new \sergiosgc\Sieve_Parser\Script_Tag($tag->getValue()));
 1886:         $result = $arg->getValue();
 1887:         return new \sergiosgc\Text_Tokenizer_Token('<argument>', $result);
 1888:     }
 1889:     /* }}} */
 1890:     /* reduce_rule_40 {{{ */
 1891:     /**
 1892:      * Reduction function for rule 40 
 1893:      *
 1894:      * Rule 40 is:
 1895:      * <argument>-><tag>
 1896:      *
 1897:      * @param Text_Tokenizer_Token Token of type '<tag>'
 1898:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<argument>' token
 1899:      */
 1900:     protected function reduce_rule_40($tag = null)
 1901:     {
 1902:             if (isset($tag)) return new \sergiosgc\Text_Tokenizer_Token('<argument>', new \sergiosgc\Sieve_Parser\Script_Tag($tag->getValue()));
 1903:         $result = $arg->getValue();
 1904:         return new \sergiosgc\Text_Tokenizer_Token('<argument>', $result);
 1905:     }
 1906:     /* }}} */
 1907:     /* reduce_rule_6 {{{ */
 1908:     /**
 1909:      * Reduction function for rule 6 
 1910:      *
 1911:      * Rule 6 is:
 1912:      * <command>-><identifier-notify><string><semicolon>
 1913:      *
 1914:      * @param Text_Tokenizer_Token Token of type '<string>'
 1915:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
 1916:      */
 1917:     protected function reduce_rule_6($destination = null)
 1918:     {
 1919:             $result = new \sergiosgc\Sieve_Parser\Script_Command_Generic('notify', [$destination->getValue()]);
 1920:         return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
 1921:     }
 1922:     /* }}} */
 1923:     /* reduce_rule_7 {{{ */
 1924:     /**
 1925:      * Reduction function for rule 7 
 1926:      *
 1927:      * Rule 7 is:
 1928:      * <command>-><identifier-fileinto><string><semicolon>
 1929:      *
 1930:      * @param Text_Tokenizer_Token Token of type '<string>'
 1931:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
 1932:      */
 1933:     protected function reduce_rule_7($mailbox = null)
 1934:     {
 1935:             $result = new \sergiosgc\Sieve_Parser\Script_Command_Fileinto($mailbox->getValue());
 1936:         return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
 1937:     }
 1938:     /* }}} */
 1939:     /* reduce_rule_8 {{{ */
 1940:     /**
 1941:      * Reduction function for rule 8 
 1942:      *
 1943:      * Rule 8 is:
 1944:      * <command>-><identifier-redirect><string><semicolon>
 1945:      *
 1946:      * @param Text_Tokenizer_Token Token of type '<string>'
 1947:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
 1948:      */
 1949:     protected function reduce_rule_8($address = null)
 1950:     {
 1951:             $result = new \sergiosgc\Sieve_Parser\Script_Command_Redirect($address->getValue());
 1952:         return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
 1953:     }
 1954:     /* }}} */
 1955:     /* reduce_rule_11 {{{ */
 1956:     /**
 1957:      * Reduction function for rule 11 
 1958:      *
 1959:      * Rule 11 is:
 1960:      * <command>-><identifier-require><string-list><semicolon>
 1961:      *
 1962:      * @param Text_Tokenizer_Token Token of type '<string-list>'
 1963:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
 1964:      */
 1965:     protected function reduce_rule_11($capabilities = null)
 1966:     {
 1967:             $result = new \sergiosgc\Sieve_Parser\Script_Command_Require($capabilities->getValue());
 1968:         return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
 1969:     }
 1970:     /* }}} */
 1971:     /* reduce_rule_43 {{{ */
 1972:     /**
 1973:      * Reduction function for rule 43 
 1974:      *
 1975:      * Rule 43 is:
 1976:      * <string-plus-csv>-><string>
 1977:      *
 1978:      * @param Text_Tokenizer_Token Token of type '<string>'
 1979:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<string-plus-csv>' token
 1980:      */
 1981:     protected function reduce_rule_43($str = null)
 1982:     {
 1983:             if (!isset($acc)) $acc = new \sergiosgc\Text_Tokenizer_Token('<string-plus-csv>', []);
 1984:         array_push($acc->getValue(), $str->getValue());
 1985:         return $acc;
 1986:         return new \sergiosgc\Text_Tokenizer_Token('<string-plus-csv>', $result);
 1987:     }
 1988:     /* }}} */
 1989:     /* reduce_rule_32 {{{ */
 1990:     /**
 1991:      * Reduction function for rule 32 
 1992:      *
 1993:      * Rule 32 is:
 1994:      * <test>-><identifier-not><test>
 1995:      *
 1996:      * @param Text_Tokenizer_Token Token of type '<test>'
 1997:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<test>' token
 1998:      */
 1999:     protected function reduce_rule_32($test = null)
 2000:     {
 2001:             $result = new \sergiosgc\Sieve_Parser\Script_Test('not', [ $test->getValue() ]);
 2002:         return new \sergiosgc\Text_Tokenizer_Token('<test>', $result);
 2003:     }
 2004:     /* }}} */
 2005:     /* reduce_rule_33 {{{ */
 2006:     /**
 2007:      * Reduction function for rule 33 
 2008:      *
 2009:      * Rule 33 is:
 2010:      * <test>-><identifier><arguments>
 2011:      *
 2012:      * @param Text_Tokenizer_Token Token of type '<identifier>'
 2013:      * @param Text_Tokenizer_Token Token of type '<arguments>'
 2014:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<test>' token
 2015:      */
 2016:     protected function reduce_rule_33($id = null,$args = null)
 2017:     {
 2018:             if (isset($args)) {
 2019:             $result = new \sergiosgc\Sieve_Parser\Script_Test($id->getValue(), array_merge($args->getValue()['arguments'], $args->getValue()['tests']));
 2020:         } else {
 2021:             $result = new \sergiosgc\Sieve_Parser\Script_Test($id->getValue(), []);
 2022:         }
 2023:         return new \sergiosgc\Text_Tokenizer_Token('<test>', $result);
 2024:     }
 2025:     /* }}} */
 2026:     /* reduce_rule_19 {{{ */
 2027:     /**
 2028:      * Reduction function for rule 19 
 2029:      *
 2030:      * Rule 19 is:
 2031:      * <command>-><identifier><arguments><semicolon>
 2032:      *
 2033:      * @param Text_Tokenizer_Token Token of type '<identifier>'
 2034:      * @param Text_Tokenizer_Token Token of type '<arguments>'
 2035:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
 2036:      */
 2037:     protected function reduce_rule_19($id = null,$args = null)
 2038:     {
 2039:             if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments>', [ 'arguments' => [], 'tests' => [] ]);
 2040:         if (!isset($block)) $block = new \sergiosgc\Text_Tokenizer_Token('<block>', []);
 2041:         $result = new \sergiosgc\Sieve_Parser\Script_Command_Generic(
 2042:             $id->getValue(),
 2043:             array_merge($args->getValue()['arguments'], $args->getValue()['tests']),
 2044:             $block->getValue());
 2045:         return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
 2046:     }
 2047:     /* }}} */
 2048:     /* reduce_rule_22 {{{ */
 2049:     /**
 2050:      * Reduction function for rule 22 
 2051:      *
 2052:      * Rule 22 is:
 2053:      * <command>-><identifier><bracket-open><block>
 2054:      *
 2055:      * @param Text_Tokenizer_Token Token of type '<identifier>'
 2056:      * @param Text_Tokenizer_Token Token of type '<block>'
 2057:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
 2058:      */
 2059:     protected function reduce_rule_22($id = null,$block = null)
 2060:     {
 2061:             if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments>', [ 'arguments' => [], 'tests' => [] ]);
 2062:         if (!isset($block)) $block = new \sergiosgc\Text_Tokenizer_Token('<block>', []);
 2063:         $result = new \sergiosgc\Sieve_Parser\Script_Command_Generic(
 2064:             $id->getValue(),
 2065:             array_merge($args->getValue()['arguments'], $args->getValue()['tests']),
 2066:             $block->getValue());
 2067:         return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
 2068:     }
 2069:     /* }}} */
 2070:     /* reduce_rule_24 {{{ */
 2071:     /**
 2072:      * Reduction function for rule 24 
 2073:      *
 2074:      * Rule 24 is:
 2075:      * <block>-><bracket-close>
 2076:      *
 2077:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<block>' token
 2078:      */
 2079:     protected function reduce_rule_24()
 2080:     {
 2081:             if (!isset($acc)) $acc = new \sergiosgc\Text_Tokenizer_Token('<block>', []);
 2082:         if (isset($command)) array_unshift($acc->getValue(), $command->getValue());
 2083:         return $acc;
 2084:         return new \sergiosgc\Text_Tokenizer_Token('<block>', $result);
 2085:     }
 2086:     /* }}} */
 2087:     /* reduce_rule_26 {{{ */
 2088:     /**
 2089:      * Reduction function for rule 26 
 2090:      *
 2091:      * Rule 26 is:
 2092:      * <arguments>-><arguments-plus><test>
 2093:      *
 2094:      * @param Text_Tokenizer_Token Token of type '<arguments-plus>'
 2095:      * @param Text_Tokenizer_Token Token of type '<test>'
 2096:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<arguments>' token
 2097:      */
 2098:     protected function reduce_rule_26($args = null,$test = null)
 2099:     {
 2100:             if (isset($tests)) $debug = true;
 2101:         if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments-plus>', []);
 2102:         if (!isset($tests)) $tests = new \sergiosgc\Text_Tokenizer_Token('<test-list>', []);
 2103:         if (isset($test)) array_unshift($tests->getValue(), $test->getValue());
 2104:         $result = [ 'arguments' => $args->getValue(), 'tests' => $tests->getValue() ];
 2105:         return new \sergiosgc\Text_Tokenizer_Token('<arguments>', $result);
 2106:     }
 2107:     /* }}} */
 2108:     /* reduce_rule_27 {{{ */
 2109:     /**
 2110:      * Reduction function for rule 27 
 2111:      *
 2112:      * Rule 27 is:
 2113:      * <arguments>-><arguments-plus><test-list>
 2114:      *
 2115:      * @param Text_Tokenizer_Token Token of type '<arguments-plus>'
 2116:      * @param Text_Tokenizer_Token Token of type '<test-list>'
 2117:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<arguments>' token
 2118:      */
 2119:     protected function reduce_rule_27($args = null,$tests = null)
 2120:     {
 2121:             if (isset($tests)) $debug = true;
 2122:         if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments-plus>', []);
 2123:         if (!isset($tests)) $tests = new \sergiosgc\Text_Tokenizer_Token('<test-list>', []);
 2124:         if (isset($test)) array_unshift($tests->getValue(), $test->getValue());
 2125:         $result = [ 'arguments' => $args->getValue(), 'tests' => $tests->getValue() ];
 2126:         return new \sergiosgc\Text_Tokenizer_Token('<arguments>', $result);
 2127:     }
 2128:     /* }}} */
 2129:     /* reduce_rule_30 {{{ */
 2130:     /**
 2131:      * Reduction function for rule 30 
 2132:      *
 2133:      * Rule 30 is:
 2134:      * <arguments-plus>-><arguments-plus><argument>
 2135:      *
 2136:      * @param Text_Tokenizer_Token Token of type '<arguments-plus>'
 2137:      * @param Text_Tokenizer_Token Token of type '<argument>'
 2138:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<arguments-plus>' token
 2139:      */
 2140:     protected function reduce_rule_30($acc = null,$arg = null)
 2141:     {
 2142:             if (!isset($acc)) $acc = new \sergiosgc\Text_Tokenizer_Token('<arguments-plus>', []);
 2143:         array_push($acc->getValue(), $arg->getValue());
 2144:         return $acc;
 2145:         return new \sergiosgc\Text_Tokenizer_Token('<arguments-plus>', $result);
 2146:     }
 2147:     /* }}} */
 2148:     /* reduce_rule_36 {{{ */
 2149:     /**
 2150:      * Reduction function for rule 36 
 2151:      *
 2152:      * Rule 36 is:
 2153:      * <test-plus-csv>-><test>
 2154:      *
 2155:      * @param Text_Tokenizer_Token Token of type '<test>'
 2156:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<test-plus-csv>' token
 2157:      */
 2158:     protected function reduce_rule_36($test = null)
 2159:     {
 2160:             if (!isset($acc)) $acc = new \sergiosgc\Text_Tokenizer_Token('<test-plus-csv>', []);
 2161:         array_unshift($acc->getValue(), $test->getValue());
 2162:         return $acc;
 2163:         return new \sergiosgc\Text_Tokenizer_Token('<test-plus-csv>', $result);
 2164:     }
 2165:     /* }}} */
 2166:     /* reduce_rule_41 {{{ */
 2167:     /**
 2168:      * Reduction function for rule 41 
 2169:      *
 2170:      * Rule 41 is:
 2171:      * <string-list>-><square-parenthesis-open><string-plus-csv><square-parenthesis-close>
 2172:      *
 2173:      * @param Text_Tokenizer_Token Token of type '<string-plus-csv>'
 2174:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<string-list>' token
 2175:      */
 2176:     protected function reduce_rule_41($strArr = null)
 2177:     {
 2178:             if (isset($str)) return new \sergiosgc\Text_Tokenizer_Token('<string-list>', $str->getValue());
 2179:         return new \sergiosgc\Text_Tokenizer_Token('<string-list>', $strArr->getValue());
 2180:         return new \sergiosgc\Text_Tokenizer_Token('<string-list>', $result);
 2181:     }
 2182:     /* }}} */
 2183:     /* reduce_rule_12 {{{ */
 2184:     /**
 2185:      * Reduction function for rule 12 
 2186:      *
 2187:      * Rule 12 is:
 2188:      * <command>-><identifier-if><test><bracket-open><block>
 2189:      *
 2190:      * @param Text_Tokenizer_Token Token of type '<test>'
 2191:      * @param Text_Tokenizer_Token Token of type '<block>'
 2192:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
 2193:      */
 2194:     protected function reduce_rule_12($test = null,$block = null)
 2195:     {
 2196:             $result = new \sergiosgc\Sieve_Parser\Script_Command_If('if', $test->getValue(), $block->getValue(), isset($else) ? $else->getValue() : null);
 2197:         return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
 2198:     }
 2199:     /* }}} */
 2200:     /* reduce_rule_20 {{{ */
 2201:     /**
 2202:      * Reduction function for rule 20 
 2203:      *
 2204:      * Rule 20 is:
 2205:      * <command>-><identifier><arguments><bracket-open><block>
 2206:      *
 2207:      * @param Text_Tokenizer_Token Token of type '<identifier>'
 2208:      * @param Text_Tokenizer_Token Token of type '<arguments>'
 2209:      * @param Text_Tokenizer_Token Token of type '<block>'
 2210:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
 2211:      */
 2212:     protected function reduce_rule_20($id = null,$args = null,$block = null)
 2213:     {
 2214:             if (!isset($args)) $args = new \sergiosgc\Text_Tokenizer_Token('<arguments>', [ 'arguments' => [], 'tests' => [] ]);
 2215:         if (!isset($block)) $block = new \sergiosgc\Text_Tokenizer_Token('<block>', []);
 2216:         $result = new \sergiosgc\Sieve_Parser\Script_Command_Generic(
 2217:             $id->getValue(),
 2218:             array_merge($args->getValue()['arguments'], $args->getValue()['tests']),
 2219:             $block->getValue());
 2220:         return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
 2221:     }
 2222:     /* }}} */
 2223:     /* reduce_rule_23 {{{ */
 2224:     /**
 2225:      * Reduction function for rule 23 
 2226:      *
 2227:      * Rule 23 is:
 2228:      * <block>-><command><block>
 2229:      *
 2230:      * @param Text_Tokenizer_Token Token of type '<command>'
 2231:      * @param Text_Tokenizer_Token Token of type '<block>'
 2232:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<block>' token
 2233:      */
 2234:     protected function reduce_rule_23($command = null,$acc = null)
 2235:     {
 2236:             if (!isset($acc)) $acc = new \sergiosgc\Text_Tokenizer_Token('<block>', []);
 2237:         if (isset($command)) array_unshift($acc->getValue(), $command->getValue());
 2238:         return $acc;
 2239:         return new \sergiosgc\Text_Tokenizer_Token('<block>', $result);
 2240:     }
 2241:     /* }}} */
 2242:     /* reduce_rule_35 {{{ */
 2243:     /**
 2244:      * Reduction function for rule 35 
 2245:      *
 2246:      * Rule 35 is:
 2247:      * <test-list>-><parenthesis-open><test-plus-csv><parenthesis-close>
 2248:      *
 2249:      * @param Text_Tokenizer_Token Token of type '<test-plus-csv>'
 2250:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<test-list>' token
 2251:      */
 2252:     protected function reduce_rule_35($tests = null)
 2253:     {
 2254:             $result = $tests->getValue();
 2255:         return new \sergiosgc\Text_Tokenizer_Token('<test-list>', $result);
 2256:     }
 2257:     /* }}} */
 2258:     /* reduce_rule_44 {{{ */
 2259:     /**
 2260:      * Reduction function for rule 44 
 2261:      *
 2262:      * Rule 44 is:
 2263:      * <string-plus-csv>-><string-plus-csv><comma><string>
 2264:      *
 2265:      * @param Text_Tokenizer_Token Token of type '<string-plus-csv>'
 2266:      * @param Text_Tokenizer_Token Token of type '<string>'
 2267:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<string-plus-csv>' token
 2268:      */
 2269:     protected function reduce_rule_44($acc = null,$str = null)
 2270:     {
 2271:             if (!isset($acc)) $acc = new \sergiosgc\Text_Tokenizer_Token('<string-plus-csv>', []);
 2272:         array_push($acc->getValue(), $str->getValue());
 2273:         return $acc;
 2274:         return new \sergiosgc\Text_Tokenizer_Token('<string-plus-csv>', $result);
 2275:     }
 2276:     /* }}} */
 2277:     /* reduce_rule_13 {{{ */
 2278:     /**
 2279:      * Reduction function for rule 13 
 2280:      *
 2281:      * Rule 13 is:
 2282:      * <command>-><identifier-if><test><bracket-open><block><command-elsif>
 2283:      *
 2284:      * @param Text_Tokenizer_Token Token of type '<test>'
 2285:      * @param Text_Tokenizer_Token Token of type '<block>'
 2286:      * @param Text_Tokenizer_Token Token of type '<command-elsif>'
 2287:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
 2288:      */
 2289:     protected function reduce_rule_13($test = null,$block = null,$else = null)
 2290:     {
 2291:             $result = new \sergiosgc\Sieve_Parser\Script_Command_If('if', $test->getValue(), $block->getValue(), isset($else) ? $else->getValue() : null);
 2292:         return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
 2293:     }
 2294:     /* }}} */
 2295:     /* reduce_rule_14 {{{ */
 2296:     /**
 2297:      * Reduction function for rule 14 
 2298:      *
 2299:      * Rule 14 is:
 2300:      * <command>-><identifier-if><test><bracket-open><block><command-else>
 2301:      *
 2302:      * @param Text_Tokenizer_Token Token of type '<test>'
 2303:      * @param Text_Tokenizer_Token Token of type '<block>'
 2304:      * @param Text_Tokenizer_Token Token of type '<command-else>'
 2305:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command>' token
 2306:      */
 2307:     protected function reduce_rule_14($test = null,$block = null,$else = null)
 2308:     {
 2309:             $result = new \sergiosgc\Sieve_Parser\Script_Command_If('if', $test->getValue(), $block->getValue(), isset($else) ? $else->getValue() : null);
 2310:         return new \sergiosgc\Text_Tokenizer_Token('<command>', $result);
 2311:     }
 2312:     /* }}} */
 2313:     /* reduce_rule_37 {{{ */
 2314:     /**
 2315:      * Reduction function for rule 37 
 2316:      *
 2317:      * Rule 37 is:
 2318:      * <test-plus-csv>-><test-plus-csv><comma><test>
 2319:      *
 2320:      * @param Text_Tokenizer_Token Token of type '<test-plus-csv>'
 2321:      * @param Text_Tokenizer_Token Token of type '<test>'
 2322:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<test-plus-csv>' token
 2323:      */
 2324:     protected function reduce_rule_37($acc = null,$test = null)
 2325:     {
 2326:             if (!isset($acc)) $acc = new \sergiosgc\Text_Tokenizer_Token('<test-plus-csv>', []);
 2327:         array_unshift($acc->getValue(), $test->getValue());
 2328:         return $acc;
 2329:         return new \sergiosgc\Text_Tokenizer_Token('<test-plus-csv>', $result);
 2330:     }
 2331:     /* }}} */
 2332:     /* reduce_rule_18 {{{ */
 2333:     /**
 2334:      * Reduction function for rule 18 
 2335:      *
 2336:      * Rule 18 is:
 2337:      * <command-else>-><identifier-else><bracket-open><block>
 2338:      *
 2339:      * @param Text_Tokenizer_Token Token of type '<block>'
 2340:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command-else>' token
 2341:      */
 2342:     protected function reduce_rule_18($block = null)
 2343:     {
 2344:             $result = new \sergiosgc\Sieve_Parser\Script_Command_If('else', null, $block->getValue());
 2345:         return new \sergiosgc\Text_Tokenizer_Token('<command-else>', $result);
 2346:     }
 2347:     /* }}} */
 2348:     /* reduce_rule_15 {{{ */
 2349:     /**
 2350:      * Reduction function for rule 15 
 2351:      *
 2352:      * Rule 15 is:
 2353:      * <command-elsif>-><identifier-elsif><test><bracket-open><block>
 2354:      *
 2355:      * @param Text_Tokenizer_Token Token of type '<test>'
 2356:      * @param Text_Tokenizer_Token Token of type '<block>'
 2357:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command-elsif>' token
 2358:      */
 2359:     protected function reduce_rule_15($test = null,$block = null)
 2360:     {
 2361:             $result = new \sergiosgc\Sieve_Parser\Script_Command_If('elsif', $test->getValue(), $block->getValue(), isset($else) ? $else->getValue() : null);
 2362:         return new \sergiosgc\Text_Tokenizer_Token('<command-elsif>', $result);
 2363:     }
 2364:     /* }}} */
 2365:     /* reduce_rule_16 {{{ */
 2366:     /**
 2367:      * Reduction function for rule 16 
 2368:      *
 2369:      * Rule 16 is:
 2370:      * <command-elsif>-><identifier-elsif><test><bracket-open><block><command-elsif>
 2371:      *
 2372:      * @param Text_Tokenizer_Token Token of type '<test>'
 2373:      * @param Text_Tokenizer_Token Token of type '<block>'
 2374:      * @param Text_Tokenizer_Token Token of type '<command-elsif>'
 2375:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command-elsif>' token
 2376:      */
 2377:     protected function reduce_rule_16($test = null,$block = null,$else = null)
 2378:     {
 2379:             $result = new \sergiosgc\Sieve_Parser\Script_Command_If('elsif', $test->getValue(), $block->getValue(), isset($else) ? $else->getValue() : null);
 2380:         return new \sergiosgc\Text_Tokenizer_Token('<command-elsif>', $result);
 2381:     }
 2382:     /* }}} */
 2383:     /* reduce_rule_17 {{{ */
 2384:     /**
 2385:      * Reduction function for rule 17 
 2386:      *
 2387:      * Rule 17 is:
 2388:      * <command-elsif>-><identifier-elsif><test><bracket-open><block><command-else>
 2389:      *
 2390:      * @param Text_Tokenizer_Token Token of type '<test>'
 2391:      * @param Text_Tokenizer_Token Token of type '<block>'
 2392:      * @param Text_Tokenizer_Token Token of type '<command-else>'
 2393:      * @return Text_Tokenizer_Token Result token from reduction. It must be a '<command-elsif>' token
 2394:      */
 2395:     protected function reduce_rule_17($test = null,$block = null,$else = null)
 2396:     {
 2397:             $result = new \sergiosgc\Sieve_Parser\Script_Command_If('elsif', $test->getValue(), $block->getValue(), isset($else) ? $else->getValue() : null);
 2398:         return new \sergiosgc\Text_Tokenizer_Token('<command-elsif>', $result);
 2399:     }
 2400:     /* }}} */
 2401: }
