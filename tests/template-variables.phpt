--TEST--
Test template match
--FILE--
<?php
require_once(__DIR__ . '/../vendor/autoload.php');

$template = \sergiosgc\Sieve_Parser\Reader::readString(file_get_contents(__DIR__ . '/inputs/template-with-variables.txt'));
var_dump($template->templateVariables());
?>
--EXPECT--
array(3) {
  ["quit"]=>
  array(4) {
    ["name"]=>
    string(4) "quit"
    ["type"]=>
    string(7) "boolean"
    ["label"]=>
    string(5) "Quit?"
    ["options"]=>
    array(2) {
      [1]=>
      string(3) "Yes"
      [0]=>
      string(2) "No"
    }
  }
  ["store"]=>
  array(4) {
    ["name"]=>
    string(5) "store"
    ["type"]=>
    string(7) "boolean"
    ["label"]=>
    string(6) "Store?"
    ["options"]=>
    array(2) {
      [1]=>
      string(5) "Store"
      [0]=>
      string(7) "Discard"
    }
  }
  ["addressList"]=>
  array(2) {
    ["type"]=>
    string(4) "list"
    ["label"]=>
    string(7) "senders"
  }
}
