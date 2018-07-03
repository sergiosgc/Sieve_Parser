<?php
namespace sergiosgc\Sieve_Parser;

class Script_Command_Fileinto extends Script_Command_Generic {
    public function __construct($mailbox) {
        parent::__construct('fileinto', [ $mailbox ]);
    }
}

