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
}




