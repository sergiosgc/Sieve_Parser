<?php
namespace sergiosgc\Sieve_Parser;

class Script_Command_Reject extends Script_Command_Generic {
    public function __construct($errorMsg) {
        parent::__construct('reject', [ $errorMsg ]);
    }
}

