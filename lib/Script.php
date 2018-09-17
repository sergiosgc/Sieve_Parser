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
        $thereAreOptionals = false;
        foreach($leftArray as $argument) if (is_callable($argument, 'isOptionalInTemplate') && $argument->isOptionalInTemplate) $thereAreOptionals = true;
        foreach($rightArray as $argument) if (is_callable($argument, 'isOptionalInTemplate') && $argument->isOptionalInTemplate) $thereAreOptionals = true;
        // The match algorithm is different when in the presence of optional arguments or not. When there are no optional arguments, ignore the order on matching
        if ($thereAreOptionals) {
            // When dealing with optionals, match in-order, and skip optionals where needed to complete the match
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
        } else {
            // When there are no optionals, match left and right pairwise regardless of order
            foreach ($leftArray as $left) {
                foreach ($rightArray as $index => $right) {
                    if (static::matchesTemplateOrIsVariable($left, $right)) {
                        $matched = true;
                        unset($rightArray[$index]);
                        $rightArray = array_values($rightArray);
                        continue 2;
                    }
                }
                return false;
            }
            return count($rightArray) == 0;
        }
    }
    public function matchesTemplate($template) {
        return $this->commands->matchesTemplate($template->commands);
    }
    public static function applyTemplateVariables($template, $instance) {
        if (is_callable(array($template, 'templateVariables'))) return $template->templateVariables($instance);
        if (is_array($template)) {
            $result = [];
            foreach($template as $index => $templateItem) {
                $subresult = Script::applyTemplateVariables($templateItem, is_array($instance) && isset($instance[$index]) ? $instance[$index] : null);
                $result = Script::array_merge_deep($result, $subresult);
            }
            return $result;
        }
        if (is_string($template)) {
            if (strlen($template) && $template[0] == '$') {
                $result = [ 'name' => substr($template, 1) ];
                if (!is_null($instance)) $result['value'] = $instance;
                return [ substr($template, 1) => $result ];
            }
            return [];
        }
        throw new \Exception('Unable to apply templateVariables to ' . $template);
    }
    public function templateVariables($extractValues = null) {
        return Script::applyTemplateVariables($this->commands, $extractValues && $extractValues->commands ? $extractValues->commands : null);
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
    public function instantiateFromTemplate($values) {
        return new Script($this->commands->instantiateFromTemplate($values));
    }
    public static function instantiateScalarFromTemplate($scalar, $values) {
        if (is_string($scalar)) {
            if (strlen($scalar) && $scalar[0] == '$') {
                $varName = substr($scalar, 1);
                if (isset($values[$varName])) return $values[$varName];
                return '';
            }
            if (preg_match('/optional_([a-z]+)_(.*)/', $scalar, $matches)) {
                $varName = $matches[1];
                $value = $matches[2];
                if (isset($values[$varName]) && $values[$varName]) return $value;
                return false;
            }
        }
        return $scalar;
    }
}
