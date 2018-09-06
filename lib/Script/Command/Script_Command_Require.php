<?php
namespace sergiosgc\Sieve_Parser;

class Script_Command_Require extends Script_Command_Generic {
    public function __construct($extensions = '') {
        parent::__construct('require', [ $extensions ]);
    }
}


