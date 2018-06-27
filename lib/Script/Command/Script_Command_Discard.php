<?php
namespace sergiosgc\Sieve_Parser;

class Script_Command_Discard extends Script_Command {
    public $identifier;
    public $comment = '';

    public function __construct() {
        $this->identifier = 'discard';
    }
    public function __toString() {
        return ((string) $this->comment) . "discard;\r\n";
    }
}
