<?php
namespace sergiosgc\Sieve_Parser;

class Script_String {
    public static function encode($str) {
        return sprintf('"%s"', strtr($str, [ '\\' => '\\\\', '"' => '\\"' ]));
    }
}
