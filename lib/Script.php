<?php
namespace sergiosgc\Sieve_Parser;

class Script {
    public $commands = [];
    public function __construct($commands = [])
    {
        $this->commands = $commands;
    }
    public function __toString() 
    {
        ob_start();
        foreach($this->commands as $command) print($command);
        return ob_get_clean();
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
    public static function commandBlockMatchesTemplate($localCommands, $templateCommands) {
        $localCommandCursor = 0;
        $templateCommandCursor = 0;
        while ($localCommandCursor < count($localCommands) && $templateCommandCursor < count($templateCommands)) {
            if ($localCommands[$localCommandCursor]->matchesTemplate($templateCommands[$templateCommandCursor])) { // If command matches template, consume both and continue
                $localCommandCursor++;
                $templateCommandCursor++;
                continue;
            }
            if ($templateCommands[$templateCommandCursor]->isOptionalInTemplate()) { // If command didn't match template but template command is optional, consume template and continue
                $templateCommandCursor++;
                continue;
            }
            return false; // Command didn't match and template was not optional
        }
        if ($localCommandCursor < count($localCommands)) return false; // Local script has more commands than template
        while ($templateCommandCursor < count($templateCommands) && $templateCommands[$templateCommandCursor]->isOptionalInTemplate()) $templateCommandCursor++; // Consume remaining optional template commands
        if ($templateCommandCursor < count($templateCommands)) return false; // Template has more commands than local script
        return true; // Both local and template commands matched and have been consumed
    }
    public static function argumentMatchesTemplate($localArgument, $templateArgument) {
        if (is_string($templateArgument) && strlen($templateArgument) && $templateArgument[0] == '$') return true;
        if (gettype($localArgument) != gettype($templateArgument)) return false;
        if (is_array($localArgument)) {
            foreach($localArgument as $i => $item) if (!static::argumentMatchesTemplate($localArgument[$i], $templateArgument[$i])) return false; 
            return true;
        }
        return $localArgument == $templateArgument;
    }
    public function matchesTemplate($templateScript) {
        return static::commandBlockMatchesTemplate($this->commands, $templateScript->commands);
    }
}

