<?php
namespace sergiosgc\Sieve_Parser;

class Script_Command_Keep extends Script_Command {
    public $identifier;
    public $comment = '';

    public function __construct() {
        $this->identifier = 'keep';
    }
    public function __toString() {
        return ((string) $this->comment) . "keep;\r\n";
    }
}

