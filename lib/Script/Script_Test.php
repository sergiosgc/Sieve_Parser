<?php
namespace sergiosgc\Sieve_Parser;

class Script_Test {
    public $identifier;
    public $arguments = [];
    public function __construct($identifier, $arguments = []) {
        $this->identifier = $identifier;
        $this->arguments = $arguments;
    }
    public function __toString() 
    {
        $nonTestArguments = array_filter($this->arguments, function($arg) { return !($arg instanceof Script_Test); });
        $testArguments = array_filter($this->arguments, function($arg) { return $arg instanceof Script_Test; });
        return sprintf("%s %s %s",
            $this->identifier,
            count($nonTestArguments) ? implode(' ', array_map(array('\sergiosgc\Sieve_Parser\Script', 'encode'), $nonTestArguments)) : '',
            count($testArguments) ? Script::encode($testArguments) : '');
    }
    public function matchesTemplate($templateTest) {
        if (get_class($templateTest) != get_class()) return false;
        if ($this->identifier != $templateTest->identifier) return false;
        return Script::argumentMatchesTemplate($this->arguments, $templateTest->arguments);
    }
}
