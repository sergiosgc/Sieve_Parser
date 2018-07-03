<?php
namespace sergiosgc\Sieve_Parser;

class Script_Command_If extends Script_Command {
    private $comment = null;
    private $identifier; 
    private $test;
    private $block;
    private $else;
    public function __construct($identifier, $test, $block, $else = null) {
        if (!in_array($identifier, ['if', 'elsif', 'else'])) throw new \Exception(sprintf('Invalid identifier %s for IF command', $identifier));
        $this->identifier = $identifier;
        $this->test = $test;
        if (is_array($block)) $block = new Script_Commands($block);
        $this->block = $block;
        $this->else = $else;
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
        if ($this->test) return [ $this->test ];
        return [];
    }
    public function getCommandBlock() {
        return $this->block;
    }
    public function getElse() {
        return $this->else;
    }
    public function __toString() {
        $result = "\r\n" . parent::__toString();
        if (is_null($this->else)) return $result;
        if (substr($result, -2) == "\r\n") $result = substr($result, 0, -2);
        $result .= ' ' . (string) $this->else;
        return $result;
    }
    /*
    public function identifierMatchesTemplate($templateCommand) {
        if (!parent::identifierMatchesTemplate($templateCommand)) return false;
        if ($this->else && !$this->else->identifierMatchesTemplate($templateCommand->getElse())) return false;
        return true;
    }
    public function matchesTemplate(Script_Command $templateCommand) {
        if (!parent::matchesTemplate($templateCommand)) return false;
        if ($this->else && !$this->else->matchesTemplate($templateCommand->getElse())) return false;
        return true;
    }
     */
}

