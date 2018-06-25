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
}
