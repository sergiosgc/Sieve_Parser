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
    public function templateVariables($extractValues = null) {
        return Script::applyTemplateVariables($this->commands, $extractValues && $extractValues->commands ? $extractValues->commands : null);
    }
    public function instantiateFromTemplate($values) {
        $result = new Script_Commands([]);
        foreach ($this->commands as $command) $result->commands[] = $command->instantiateFromTemplate($values);
        $this->commands = array_filter($this->commands);
        return $result;
    }
}
