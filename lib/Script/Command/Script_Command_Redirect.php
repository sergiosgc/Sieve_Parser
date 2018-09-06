<?php
namespace sergiosgc\Sieve_Parser;

class Script_Command_Redirect extends Script_Command_Generic {
    public function __construct($address = '') {
        parent::__construct('redirect', [ $address ] );
    }
}


