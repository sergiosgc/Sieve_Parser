<?php
namespace sergiosgc\Sieve_Parser;

class Script_Command_Addflag extends Script_Command_Generic {
    public function __construct($flags) {
        parent::__construct('addflag', [ $flags ]);
    }
}


