--TEST--
Test template match
--FILE--
<?php
require_once(__DIR__ . '/../vendor/autoload.php');

$template = \sergiosgc\Sieve_Parser\Reader::readString(file_get_contents(__DIR__ . '/inputs/template.txt'));
$target = \sergiosgc\Sieve_Parser\Reader::readString(file_get_contents(__DIR__ . '/inputs/template-nomatch.txt'));
var_dump($target->matchesTemplate($template));
?>
--EXPECT--
bool(false)
