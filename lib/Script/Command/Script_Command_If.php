<?php
namespace sergiosgc\Sieve_Parser;

class Script_Command_If extends Script_Command {
    public $identifier;
    public $comment = '';
    public $testsAndCommands = [];

    public function __construct($testsAndCommands) {
        $this->identifier = 'if';
        $this->comment = '';
        foreach ($testsAndCommands as $item) {
            $this->testsAndCommands[] = [
                'test' => $item['test'],
                'commands' => $item['commands']
            ];
        }
    }
    public function __toString() 
    {
        ob_start();
        print((string) $this->comment);
        print($this->identifier);
        print(' ');
        foreach ($this->testsAndCommands as $tc) {
//            var_dump((string) $tc['test'], $tc['test']); exit;
            printf("%s {\r\n%s}\r\n", 
                (string) $tc['test'],
                '  ' . implode('  ', array_map(function($command) { return (string) $command; }, $tc['commands']))
                );
        }
        return ob_get_clean();
    }
    public function matchesTemplate($templateIfCommand) {
        if (get_class($templateIfCommand) != get_class()) return false;
        if (!$this->identifierMatchesTemplate($templateIfCommand)) return false;
        for ($i=0; $i < count($this->testsAndCommands); $i++) {
            if (gettype($this->testsAndCommands[$i]['test']) != gettype($templateIfCommand->testsAndCommands[$i]['test'])) return false;
            if (is_object($this->testsAndCommands[$i]['test']) && !$this->testsAndCommands[$i]['test']->matchesTemplate($templateIfCommand->testsAndCommands[$i]['test'])) return false;
            if (!Script::commandBlockMatchesTemplate($this->testsAndCommands[$i]['commands'], $templateIfCommand->testsAndCommands[$i]['commands'])) return false;
        }
        return true;
    }
}

