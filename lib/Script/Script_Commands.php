<?php
namespace sergiosgc\Sieve_Parser;

class Script_Commands {
    public $commands = [];
    public function __construct($commands = []) {
        $this->commands = $commands;
    }
    public function __toString() {
        return implode("", array_map(function($c) { return (string) $c; }, $this->commands));
    }
    public function matchesTemplate($template) {
        return Script::optionallyMatchesTemplate($this->commands, $template->commands);
    }
    public function templateVariables() {
        return array_reduce(array_map(function ($c) { return $c->templateVariables(); }, $this->commands), ['\sergiosgc\Sieve_Parser\Script', 'array_merge_deep'], []);
    }
}
