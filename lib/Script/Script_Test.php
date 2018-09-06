<?php
namespace sergiosgc\Sieve_Parser;

class Script_Test extends Script_Command {
    public $identifier;
    public $arguments = [];
    public $comment = null;
    public function __construct($identifier, $arguments = []) {
        $this->identifier = $identifier;
        $this->arguments = $arguments;
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
        return null;
    }
    public function __toString() {
        $result = parent::__toString();
        if (substr($result, -3) == ";\r\n") $result = substr($result, 0, -3);
        return $result;
    }
    public function instantiateFromTemplate($values) {
        $identifier = $this->_instantiateIdentifier($values);
        if (!$identifier) return FALSE;
        $arguments = [];
        foreach($this->arguments as $argument) {
            $instantiated = is_object($argument) ? $argument->instantiateFromTemplate($values) : Script::instantiateScalarFromTemplate($argument, $values);
            if ($instantiated !== FALSE) $arguments[] = $instantiated;
        }
        $result = new Script_Test($identifier, $arguments);
        if ($this->comment) $result->setComment($this->comment->instantiateFromTemplate($values));
        return $result;
    }
}
