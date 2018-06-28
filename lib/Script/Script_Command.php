<?php
namespace sergiosgc\Sieve_Parser;

class Script_Command {
    public $identifier;
    public $arguments = [];
    public $tests = [];
    public $subcommands = [];
    public $comment = '';

    public function __construct($identifier, $arguments = [], $tests = [], $subcommands = [], $comment = '') {
        $this->identifier = $identifier;
        $this->arguments = $arguments;
        $this->tests = $tests;
        $this->subcommands = $subcommands;
        $this->comment = '';
    }
    public function __toString() {
        $result = $this->identifier;
        if (count($this->arguments)) {
            $result .= ' ' . implode(' ', array_map(array('\sergiosgc\Sieve_Parser\Script', 'encode'), $this->arguments));
        }
        if (count($this->tests)) {
            $result .= ' ' . Script::encode($this->tests);
        }
        if (count($this->subcommands) == 0) {
            $result .= ';';
        }
        if (count($this->subcommands) == 1) {
            $result .= ' ' . Script::encode($this->subcommands[0]) . ';';
        }
        if (count($this->subcommands) > 1) {
            $result .= sprintf("{\r\n%s}", 
                '  ' . implode('  ', array_map(function($command) { return (string) $command; }, $this->subcommands)));
        }
        $result .= "\r\n";
        return $result;
    }
    public function isOptionalInTemplate() {
        if (preg_match('/optional_[a-z]+_(.*)/', $this->identifier)) return true;
        return false;
    }
    public function identifierMatchesTemplate($templateCommand) {
        if ($this->identifier == $templateCommand->identifier) return true;
        if (preg_match('/optional_[a-z]+_(.*)/', $templateCommand->identifier, $matches) && $matches[1] == $this->identifier) return true;
        return false;
    }
    public function matchesTemplate($templateCommand) {
        if (get_class($templateCommand) != get_class()) return false;
        if (!Script::argumentMatchesTemplate($this->arguments, $templateCommand->arguments)) return false;
        if (count($this->tests) != count($templateCommand->tests)) return false;
        foreach ($this->tests as $i => $t) if (!$this->tests[$i]->matchesTemplate($templateCommand->tests[$i])) return false;
        if (!Script::commandBlockMatchesTemplate($this->subcommands, $templateCommand->subcommands)) return false;
        return true;
    }
}
