<?php
namespace sergiosgc\Sieve_Parser;

class Script_Command_Fileinto extends Script_Command {
    public $identifier;
    public $mailbox;
    public $comment = '';

    public function __construct($mailbox) {
        $this->identifier = 'fileinto';
        $this->mailbox = $mailbox;
    }
    public function __toString() 
    {
        return sprintf("%sfileinto %s;\r\n", (string) $this->comment, Script_String::encode($this->mailbox));
    }
    public function matchesTemplate($templateCommand) {
        if (get_class($templateCommand) != get_class()) return false;
        if (!$this->identifierMatchesTemplate($templateCommand) return false;
        if (strlen($templateCommand->mailbox) && $templateCommand->mailbox[0] == '$') return true;
        return false;
    }
}



