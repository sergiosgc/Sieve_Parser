<?php
namespace sergiosgc\Sieve_Parser;

class Script_Command_Generic extends Script_Command {
    public $comment = null;
    public $identifier;
    public $arguments;
    public $commandBlock;
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
    public function instantiateFromTemplate($values) {
        $class = get_class($this);
        $result = new $class();
        $result->identifier = $this->_instantiateIdentifier($values);
        if (!$result->identifier) return FALSE;
        $result->arguments = [];
        foreach($this->arguments as $argument) {
            $instantiated = is_object($argument) ? $argument->instantiateFromTemplate($values) : Script::instantiateScalarFromTemplate($argument, $values);
            if ($instantiated !== FALSE) $result->arguments[] = $instantiated;
        }
        if (is_array($this->commandBlock)) {
            $result->commandBlock = [];
            foreach($this->commandBlock as $command) {
                $instantiated = is_object($command) ? $command->instantiateFromTemplate($values) : Script::instantiateScalarFromTemplate($command, $values);
                if ($instantiated !== FALSE) $result->commandBlock[] = $instantiated;
            }
        } elseif (is_object($this->commandBlock)) {
            $result->commandBlock = $this->commandBlock->instantiateFromTemplate($values);
        } else {
            $result->commandBlock = [];
        }
        $result->comment = null;
        if ($this->comment) $result->comment = $this->comment->instantiateFromTemplate($values);
        return $result;
    }
}
