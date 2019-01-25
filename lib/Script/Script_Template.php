<?php
namespace sergiosgc\Sieve_Parser;

abstract class Script_Template {
    public static function isOptional($string) {
        if (!is_string($string)) return false;
        return (bool) preg_match('/^optional_[a-z]+_(.*)/', $string);
    }
    public static function extractVariableName($string) {
        if (!is_string($string)) return false;
        if ($string[0] == '$') return substr($str, 1);
        if (preg_match('/^optional_([a-z]+)_.*/', $string, $matches)) {
            return $matches[1];
        }
        return false;
    }
    public static function extractOptionalValue($string) {
        if (!is_string($string)) return false;
        if (!preg_match('/^optional_[a-z]+_(.*)/', $string, $matches)) return false;
        return $matches[1];
    }
    public static function argumentToString($argument) {
        if (is_array($argument)) return sprintf('[%s]', implode(',', array_map(['Script_Template', 'argumentToString'], $argument)));
        return (string) $argument;
    }
}
