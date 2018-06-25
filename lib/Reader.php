<?php
namespace sergiosgc\Sieve_Parser;

class Reader {
    public static function readString($str) {
        $tokenizer = new \sergiosgc\Sieve_Parser\Tokenizer(
            $str,
            new \sergiosgc\Text_Tokenizer_Regex_Matcher_Php());

        $parser = new TestSieveParser(
            new \sergiosgc\Sieve_Parser\Tokenizer(
                $str,
                new \sergiosgc\Text_Tokenizer_Regex_Matcher_Php()
            ));
        return $parser->parse()->getValue();
    }
}


