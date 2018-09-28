<?php
namespace sergiosgc\Sieve_Parser;

class Script_Argument_Test_Not extends Script_Argument_Test {
    
    public function __construct($identifier, $args = []) {
        if (count($args) == 1 && !($args[0] instanceof Script_Argument_Test)) {
            $args[0] = Script_Argument_Test::create($args[0]->getIdentifier(), $args[0]->getArguments());
        }
        parent::__construct($identifier, $args);
    }
    public static function d() {
        return 'd';
    }
}
