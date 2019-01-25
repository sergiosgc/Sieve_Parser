<?php
namespace sergiosgc\Sieve_Parser;

class Script_Command_If extends Script_Command_Generic {
    public function commandTerminator() { return "\r\n"; }
    public function __construct($identifier, $args = []) {
        parent::__construct($identifier, $args);
        if (count($this->getArguments()) != 1 && count($this->getArguments()) != 2 && count($this->getArguments()) != 3) throw new Exception('Script_Command_If must either contain 1 argument (a command block) or two arguments (a test and a command block) or three arguments (a test, a command block and an else/elsif command)');
    }
    public function getCommandBlock() {
        if (count($this->getArguments()) == 3) {
            return $this->getArguments()[1]; 
        } else return $this->getArguments()[count($this->getArguments()) - 1];
    }
    public function getTest() {
        if (count($this->getArguments()) == 1) return false;
        return $this->getArguments()[0];
    }
    public function getElse() {
        if (count($this->getArguments()) != 3) return false;
        return $this->getArguments()[2];
    }
    public function __toString() {
        if (0 == count($this->getCommandBlock()->commands)) return '';        
        if ($this->getIdentifier() == 'else') try { 
            // Sanitize arguments, removing tests. 
            $originalArguments = $this->arguments;
            $this->arguments = array_values(array_filter($this->arguments, function($arg) { return !($arg instanceof \sergiosgc\Sieve_Parser\Script_Argument_Test); }));
            return parent::__toString();
        } finally {
            $this->arguments = $originalArguments;
        }
        return parent::__toString();
    }
}
