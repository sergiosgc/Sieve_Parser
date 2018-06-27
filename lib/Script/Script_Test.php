<?php
namespace sergiosgc\Sieve_Parser;

class Script_Test {
    public $identifier;
    public $arguments = [];
    public function __construct($identifier, $arguments = []) {
        $this->identifier = $identifier;
        $this->arguments = $arguments;
    }
    public function __toString() 
    {
        return sprintf("%s %s",
            $this->identifier,
            implode(' ', array_map(array('\sergiosgc\Sieve_Parser\Script', 'encode'), $this->arguments)));
    }
}
