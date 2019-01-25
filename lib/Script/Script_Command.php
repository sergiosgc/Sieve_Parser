<?php
namespace sergiosgc\Sieve_Parser;

abstract class Script_Command {
    public abstract function getComment();
    public abstract function getIdentifier();
    public abstract function getArguments();
    public function commandTerminator() { return ';'; }
    public static function create() {
        $args = func_get_args();
        $classIdentifier = func_get_args()[0];
        if ($classIdentifier == 'else' || $classIdentifier == 'elsif') $classIdentifier = 'if';
        $className = sprintf('sergiosgc\Sieve_Parser\Script_Command_%s%s', strtoupper($classIdentifier[0]), substr($classIdentifier, 1));
        if (class_exists($className, true)) {
            return new $className(...$args);
        }
        $className = sprintf('sergiosgc\Sieve_Parser\Script_Argument_Test_%s%s', strtoupper($classIdentifier[0]), substr($classIdentifier, 1));
        if (class_exists($className, true)) {
            return new $className(...$args);
        }
        return new Script_Command_Generic(...$args);
    }
    public static function argumentToString($argument) {
        if (is_object($argument)) return (string) $argument;
        if (is_array($argument)) return sprintf('[%s]', implode(', ', array_map(function($s) { return sprintf('"%s"', strtr($s, [ '"' => '\\"' ])); }, $argument)));

        return sprintf('"%s"', strtr($argument, [ '"' => '\\"' ]));
    }
    public function __toString() {
        $result = $this->getComment() ? ($this->getComment() ) : '';
        $result .= (string) $this->getIdentifier();
        if (count($this->getArguments())) $result .= ' ';
        $terminator = ($this instanceof Script_Argument_Test) ? '' : ';';
        $isTestList = (0 == count(array_filter($this->getArguments(), function($arg) { return !($arg instanceof Script_Argument_Test); }))) && count($this->getArguments());
        $result .= sprintf($isTestList ? '(%s)' : '%s', 
            implode(
                $isTestList ? ', ' : ' ',
                array_map(['\sergiosgc\Sieve_Parser\Script_Command', 'argumentToString'], $this->getArguments())
            ));
        $result .= $this->commandTerminator();

        return $result;
    }
}


