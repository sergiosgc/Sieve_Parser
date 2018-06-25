<?php
namespace sergiosgc\Sieve_Parser;

class Script_Test {
    public $identifier;
    public $arguments = [];
    public function __construct($identifier, $arguments = []) {
        $this->identifier = $identifier;
        $this->arguments = $arguments;
    }
}
