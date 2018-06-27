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
}

