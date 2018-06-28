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
}
