<?php
namespace sergiosgc\Sieve_Parser;

class Script_Command_Generic extends Script_Command {
    private $identifier;
    private $arguments = [];
    private $comment = null;
    public function getIdentifier() {
        return $this->identifier;
    }
    public function getArguments() {
        return $this->arguments;
    }
    public function setComment(Script_Comment $comment) {
        $this->comment = $comment;
    }
    public function getComment() {
        return $this->comment;
    }
    public function __construct($identifier, $args = []) {
        $this->identifier = $identifier;
        $this->arguments = $args;
    }
}

