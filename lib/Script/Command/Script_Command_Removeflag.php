<?php
namespace sergiosgc\Sieve_Parser;

class Script_Command_Removeflag extends Script_Command_Generic {
    public function __construct($flags = '') {
        parent::__construct('removeflag', [ $flags ]);
    }
}


