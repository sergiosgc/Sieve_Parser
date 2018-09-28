<?php
namespace sergiosgc\Sieve_Parser;

class Script {
    public $commands;
    public function __construct($commands) {
        $this->commands = $commands;
    }
    public function __toString() {
        $result = '';
        if ($this->commands) foreach ($this->commands as $command) $result .= ((string) $command) . "\n";
        return $result;
    }
}
