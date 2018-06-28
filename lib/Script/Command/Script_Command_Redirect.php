<?php
namespace sergiosgc\Sieve_Parser;

class Script_Command_Redirect extends Script_Command {
    public $identifier;
    public $address;
    public $comment = '';

    public function __construct($address) {
        $this->identifier = 'fileinto';
        $this->address = $address;
    }
    public function __toString() 
    {
        return sprintf("%sredirect %s;\r\n", (string) $this->comment, Script_String::encode($this->address));
    }
    public function matchesTemplate($templateCommand) {
        if (get_class($templateCommand) != get_class()) return false;
        if (!$this->identifierMatchesTemplate($templateCommand) return false;
        if (strlen($templateCommand->address) && $templateCommand->address[0] == '$') return true;
        return false;
    }
}




