<?php
namespace sergiosgc\Sieve_Parser;

class Script_Argument_Test extends Script_Command_Generic implements Script_Argument {
    
    public function __construct($identifier, $args = []) {
        parent::__construct($identifier, $args);
    }
    public static function create() {
        $args = func_get_args();
        $identifier = func_get_args()[0];
        $className = sprintf('sergiosgc\Sieve_Parser\Script_Argument_Test_%s%s', strtoupper($identifier[0]), substr($identifier, 1));
        if (class_exists($className, true)) {
            return new $className(...$args);
        }
        return new Script_Argument_Test(...$args);
    }
}

