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
}



