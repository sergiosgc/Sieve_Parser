<?php
namespace sergiosgc\Sieve_Parser;

class Script_Command_Generic extends Script_Command {
    private $comment = null;
    private $identifier;
    private $arguments;
    private $commandBlock;
    public function __construct($identifier, $arguments = [], $commandBlock = [], $comment = null) {
        $this->identifier = $identifier;
        $this->arguments = $arguments;
        $this->commandBlock = $commandBlock;
        $this->comment = $comment;
    }
    public function getComment() {
        return $this->comment;
    }
    public function setComment($comment) {
        $this->comment = $comment;
    }
    public function getIdentifier() {
        return $this->identifier;
    }
    public function getArguments() {
        return $this->arguments;
    }
    public function getCommandBlock() {
        return $this->commandBlock;
    }
}
