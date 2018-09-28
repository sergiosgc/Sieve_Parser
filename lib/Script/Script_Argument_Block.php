<?php
namespace sergiosgc\Sieve_Parser;

class Script_Argument_Block implements Script_Argument {
    public $commands;
    public function __construct($commands = []) {
        $this->commands = $commands;
    }
    public static function create($commands = []) {
        return new Script_Argument_Block($commands);
    }
    public function __toString() {
        return sprintf("{\r\n%s\r\n}", 
            implode("\r\n", array_map(function($obj) { return (string) $obj; }, $this->commands)));
    }
}
