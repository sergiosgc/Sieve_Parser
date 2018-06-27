<?php
namespace sergiosgc\Sieve_Parser;

class Script_Command_Require extends Script_Command {
    public $identifier;
    public $comment = '';
    public $capabilities = [];

    public function __construct($capabilities) {
        $this->identifier = 'require';
        $this->capabilities = $capabilities;
    }
    public function __toString() 
    {
        return sprintf("%srequire [%s];\r\n", (string) $this->comment, implode(',', array_map(array('\sergiosgc\Sieve_Parser\Script_String', 'encode'), $this->capabilities)));
    }
        
}

