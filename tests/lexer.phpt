--TEST--
Test lexer against inputs
--FILE--
<?php
require_once(__DIR__ . '/../vendor/autoload.php');
$lexer = new \sergiosgc\Sieve_Parser\Tokenizer(file_get_contents(__DIR__ . '/inputs/1.txt'), new \sergiosgc\Text_Tokenizer_Regex_Matcher_Php());
while ($token = $lexer->getNextToken()) {
    printf("Lexer output token {%s, '%s'}\n", $token->getId(), addcslashes($token->getValue(), "\0..\37!@\177..\377"));
}
?>
--EXPECT--
Lexer output token {<hash-comment>, '# Whitelist addresses\r\n'}
Lexer output token {<identifier>, 'if'}
Lexer output token {<identifier>, 'address'}
Lexer output token {<tag>, ':all'}
Lexer output token {<tag>, ':comparator'}
Lexer output token {<quoted-string>, 'i;ascii-casemap'}
Lexer output token {<tag>, ':is'}
Lexer output token {<square-parenthesis-open>, ' ['}
Lexer output token {<quoted-string>, 'From'}
Lexer output token {<comma>, ','}
Lexer output token {<quoted-string>, 'Sender'}
Lexer output token {<comma>, ','}
Lexer output token {<quoted-string>, 'Resent-From'}
Lexer output token {<square-parenthesis-close>, ']'}
Lexer output token {<square-parenthesis-open>, ' ['}
Lexer output token {<quoted-string>, 'example\@gmail.com.example.com'}
Lexer output token {<comma>, ','}
Lexer output token {<quoted-string>, 'example2\@gmail.com.example.com'}
Lexer output token {<square-parenthesis-close>, ']'}
Lexer output token {<bracket-open>, '  {'}
Lexer output token {<identifier>, 'keep'}
Lexer output token {<semicolon>, ';'}
Lexer output token {<identifier>, 'stop'}
Lexer output token {<semicolon>, ';'}
Lexer output token {<bracket-close>, '\r\n}'}
Lexer output token {<hash-comment>, '# Database backup checker\r\n'}
Lexer output token {<identifier>, 'if'}
Lexer output token {<identifier>, 'anyof'}
Lexer output token {<parenthesis-open>, ' ('}
Lexer output token {<identifier>, 'header'}
Lexer output token {<tag>, ':comparator'}
Lexer output token {<quoted-string>, 'i;ascii-casemap'}
Lexer output token {<tag>, ':contains'}
Lexer output token {<quoted-string>, 'Subject'}
Lexer output token {<quoted-string>, 'Database backup incomplete'}
Lexer output token {<comma>, ','}
Lexer output token {<identifier>, 'header'}
Lexer output token {<tag>, ':comparator'}
Lexer output token {<quoted-string>, 'i;ascii-casemap'}
Lexer output token {<tag>, ':contains'}
Lexer output token {<quoted-string>, 'Subject'}
Lexer output token {<quoted-string>, 'Database backup missing'}
Lexer output token {<parenthesis-close>, ' )'}
Lexer output token {<bracket-open>, ' {'}
Lexer output token {<identifier>, 'keep'}
Lexer output token {<semicolon>, ';'}
Lexer output token {<identifier>, 'stop'}
Lexer output token {<semicolon>, ';'}
Lexer output token {<bracket-close>, '\r\n}'}
Lexer output token {<hash-comment>, '# Verbose crons\r\n'}
Lexer output token {<identifier>, 'if'}
Lexer output token {<identifier>, 'anyof'}
Lexer output token {<parenthesis-open>, ' ('}
Lexer output token {<identifier>, 'header'}
Lexer output token {<tag>, ':comparator'}
Lexer output token {<quoted-string>, 'i;octet'}
Lexer output token {<tag>, ':contains'}
Lexer output token {<quoted-string>, 'Subject'}
Lexer output token {<quoted-string>, 'cron'}
Lexer output token {<comma>, ','}
Lexer output token {<identifier>, 'header'}
Lexer output token {<tag>, ':comparator'}
Lexer output token {<quoted-string>, 'i;ascii-casemap'}
Lexer output token {<tag>, ':is'}
Lexer output token {<quoted-string>, 'Subject'}
Lexer output token {<quoted-string>, '[sometag] Cron <root\@example.com>'}
Lexer output token {<parenthesis-close>, ' )'}
Lexer output token {<bracket-open>, ' {'}
Lexer output token {<identifier>, 'discard'}
Lexer output token {<semicolon>, ';'}
Lexer output token {<identifier>, 'stop'}
Lexer output token {<semicolon>, ';'}
Lexer output token {<bracket-close>, '\r\n}'}
Lexer output token {<hash-comment>, '# systemroot\r\n'}
Lexer output token {<identifier>, 'if'}
Lexer output token {<identifier>, 'header'}
Lexer output token {<tag>, ':comparator'}
Lexer output token {<quoted-string>, 'i;ascii-casemap'}
Lexer output token {<tag>, ':contains'}
Lexer output token {<quoted-string>, 'Subject'}
Lexer output token {<quoted-string>, '[sometag]'}
Lexer output token {<bracket-open>, '  {'}
Lexer output token {<identifier>, 'fileinto'}
Lexer output token {<quoted-string>, 'Servers'}
Lexer output token {<semicolon>, ';'}
Lexer output token {<identifier>, 'stop'}
Lexer output token {<semicolon>, ';'}
Lexer output token {<bracket-close>, '\r\n}'}
Lexer output token {<hash-comment>, '# mxtoolbox 10.0.0.2\r\n'}
Lexer output token {<identifier>, 'if'}
Lexer output token {<identifier>, 'anyof'}
Lexer output token {<parenthesis-open>, ' ('}
Lexer output token {<identifier>, 'header'}
Lexer output token {<tag>, ':comparator'}
Lexer output token {<quoted-string>, 'i;octet'}
Lexer output token {<tag>, ':contains'}
Lexer output token {<quoted-string>, 'Subject'}
Lexer output token {<quoted-string>, 'BLACKLIST - ADDED - 10.0.0.2'}
Lexer output token {<comma>, ','}
Lexer output token {<identifier>, 'header'}
Lexer output token {<tag>, ':comparator'}
Lexer output token {<quoted-string>, 'i;octet'}
Lexer output token {<tag>, ':contains'}
Lexer output token {<quoted-string>, 'Subject'}
Lexer output token {<quoted-string>, 'BLACKLIST - REMOVED - 10.0.0.2'}
Lexer output token {<parenthesis-close>, ' )'}
Lexer output token {<bracket-open>, ' {'}
Lexer output token {<identifier>, 'addflag'}
Lexer output token {<square-parenthesis-open>, ' ['}
Lexer output token {<quoted-string>, '\\Seen'}
Lexer output token {<square-parenthesis-close>, ']'}
Lexer output token {<semicolon>, ';'}
Lexer output token {<identifier>, 'fileinto'}
Lexer output token {<quoted-string>, 'Trash'}
Lexer output token {<semicolon>, ';'}
Lexer output token {<identifier>, 'removeflag'}
Lexer output token {<square-parenthesis-open>, ' ['}
Lexer output token {<quoted-string>, '\\Seen'}
Lexer output token {<square-parenthesis-close>, ']'}
Lexer output token {<semicolon>, ';'}
Lexer output token {<identifier>, 'stop'}
Lexer output token {<semicolon>, ';'}
Lexer output token {<bracket-close>, '\r\n}'}
Lexer output token {<hash-comment>, '# Google My Business\r\n'}
Lexer output token {<identifier>, 'if'}
Lexer output token {<identifier>, 'allof'}
Lexer output token {<parenthesis-open>, ' ('}
Lexer output token {<identifier>, 'address'}
Lexer output token {<tag>, ':all'}
Lexer output token {<tag>, ':comparator'}
Lexer output token {<quoted-string>, 'i;ascii-casemap'}
Lexer output token {<tag>, ':is'}
Lexer output token {<quoted-string>, 'From'}
Lexer output token {<quoted-string>, 'googlemybusiness-noreply\@google.com'}
Lexer output token {<comma>, ','}
Lexer output token {<identifier>, 'address'}
Lexer output token {<tag>, ':all'}
Lexer output token {<tag>, ':comparator'}
Lexer output token {<quoted-string>, 'i;ascii-casemap'}
Lexer output token {<tag>, ':is'}
Lexer output token {<quoted-string>, 'To'}
Lexer output token {<quoted-string>, 'googlemybusiness-noreply\@google.com'}
Lexer output token {<parenthesis-close>, ' )'}
Lexer output token {<bracket-open>, ' {'}
Lexer output token {<identifier>, 'discard'}
Lexer output token {<semicolon>, ';'}
Lexer output token {<identifier>, 'stop'}
Lexer output token {<semicolon>, ';'}
Lexer output token {<bracket-close>, '\r\n}'}
