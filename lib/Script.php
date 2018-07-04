<?php
namespace sergiosgc\Sieve_Parser;

class Script {
    public $commands;
    public function __construct($commands = []) {
        if (!($commands instanceof Script_Commands)) $commands = new Script_Commands($commands);
        $this->commands = $commands;
    }
    public function __toString() {
        return (string) $this->commands;
    }
    public static function encode($val) {
        if (is_object($val)) return (string) $val;
        if (is_string($val)) return Script_String::encode($val);
        if (is_int($val)) return Script_String::encode((string) $val);
        if (is_array($val)) {
            if (count($val) && is_object($val[0])) {
                return sprintf("(%s)", implode(', ', array_map(array('\sergiosgc\Sieve_Parser\Script', 'encode'), $val)));
            } else {
                return sprintf("[%s]", implode(', ', array_map(array('\sergiosgc\Sieve_Parser\Script', 'encode'), $val)));
            }
        }
        throw new \Exception("Unexpected type");
    }
    public static function matchesTemplateOrIsVariable($left, $right) {
        if (is_string($right) && strlen($right) && $right[0] == '$') return true;
        if (is_callable(array($left, 'matchesTemplate'))) return $left->matchesTemplate($right);
        if (is_array($left) || is_array($right)) {
            if (is_array($left) && is_array($right)) {
                return static::optionallyMatchesTemplate($left, $right);
            }
            return false;
        }
        return (string) $left == (string) $right;
    }
    public static function optionallyMatchesTemplate($leftArray, $rightArray) {
        if (!is_array($leftArray) || !is_array($rightArray)) throw new \Exception('Arrays expected');
        $leftCursor = $rightCursor = 0;
        while ($leftCursor < count($leftArray) && $rightCursor < count($rightArray)) {
            if (static::matchesTemplateOrIsVariable($leftArray[$leftCursor], $rightArray[$rightCursor])) { // Match. Consume both and continue
                $leftCursor++;
                $rightCursor++;
                continue;
            }
            // No match. Try to consume optional left or right and continue
            if (is_callable(array($leftArray[$leftCursor], 'isOptionalInTemplate')) && $leftArray[$leftCursor]->isOptionalInTemplate()) {
                $leftCursor++;
                continue;
            }
            if (is_callable(array($rightArray[$rightCursor], 'isOptionalInTemplate')) && $rightArray[$rightCursor]->isOptionalInTemplate()) {
                $rightCursor++;
                continue;
            }
            
            // No match and no optional content to consume
            return false;
        }
        // Consume remaining optionals
        while ($leftCursor < count($leftArray) && is_callable(array($leftArray[$leftCursor], 'isOptionalInTemplate')) && $leftArray[$leftCursor]->isOptionalInTemplate()) $leftCursor++;
        while ($rightCursor < count($rightArray) && is_callable(array($rightArray[$rightCursor], 'isOptionalInTemplate')) && $rightArray[$rightCursor]->isOptionalInTemplate()) $rightCursor++;
        if ($leftCursor < count($leftArray) || $rightCursor < count($rightArray)) {
            return false; // Leftover in either left or right
        }
        return true;
    }
    public function matchesTemplate($template) {
        return $this->commands->matchesTemplate($template->commands);
    }
    public function templateVariables() {
        return $this->commands->templateVariables();
    }
    public static function argumentTemplateVariables($argument) {
        if (is_callable($argument, 'templateVariables')) return $argument->templateVariables();
        if (is_array($argument)) return array_map(array('\\sergiosgc\\Sieve_Parser\\Script', 'argumentTemplateVariables'), $argument);
        if (is_string($argument)) {
            if (strlen($argument) && $argument[0] == '$') return [ substr($argument, 1) => [ 'name' => substr($argument, 1) ]];
            return [];
        }
        return [];
    }
    public static function array_merge_deep($left, $right) {
        foreach ($right as $index => $value) {
            if (!isset($left[$index]) || !is_array($left[$index]) || !is_array($value)) {
                $left[$index] = $right[$index]; 
                continue;
            }
            $left[$index] = static::array_merge_deep($left[$index], $right[$index]);
        }
        return $left;
    }
}

