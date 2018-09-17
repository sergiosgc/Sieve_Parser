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
try {
    eval($generator->generate('TestSieveParser'));
} catch (\sergiosgc\Text_Parser_Generator_ShiftReduceConflictException $ex) {
    print($ex->getMessage());
}

$tokenizer = new \sergiosgc\Sieve_Parser\Tokenizer(
    file_get_contents(__DIR__ . '/inputs/1.txt'),
    new \sergiosgc\Text_Tokenizer_Regex_Matcher_Php());

$parser = new TestSieveParser($tokenizer);
print(new \sergiosgc\Sieve_Parser\Script($parser->parse()->getValue()));
?>
--EXPECT--
# A line
# Requires
require ["fileinto", "imap4flags"];

# Whitelist addresses
if address :all :comparator "i;ascii-casemap" :is ["From", "Sender", "Resent-From"] ["example@gmail.com.example.com", "example2@gmail.com.example.com"] {
 keep;
 stop;
}

# Database backup checker
if not anyof ( header :comparator "i;ascii-casemap" :contains "Subject" "Database backup missing", header :comparator "i;ascii-casemap" :contains "Subject" "Database backup incomplete" ) {
 keep;
 stop;
}

# Verbose crons
if anyof ( header :comparator "i;ascii-casemap" :is "Subject" "[sometag] Cron <root@example.com>", header :comparator "i;octet" :contains "Subject" "cron" ) {
 discard;
 stop;
}

# systemroot
if header :comparator "i;ascii-casemap" :contains "Subject" "[sometag]" {
 fileinto "Servers";
 stop;
}

# mxtoolbox 10.0.0.2
if anyof ( header :comparator "i;octet" :contains "Subject" "BLACKLIST - REMOVED - 10.0.0.2", header :comparator "i;octet" :contains "Subject" "BLACKLIST - ADDED - 10.0.0.2" ) {
 addflag ["\\Seen"];
 fileinto "Trash";
 removeflag ["\\Seen"];
 stop;
}

# Google My Business
if allof ( address :all :comparator "i;ascii-casemap" :is "To" "googlemybusiness-noreply@google.com", address :all :comparator "i;ascii-casemap" :is "From" "googlemybusiness-noreply@google.com" ) {
 discard;
 stop;
}

# Not
if not false {
 keep;
}
