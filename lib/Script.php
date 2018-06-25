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
        return 'script';
    }
}

