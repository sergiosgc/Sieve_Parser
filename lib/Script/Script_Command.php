<?php
namespace sergiosgc\Sieve_Parser;

abstract class Script_Command {
    public abstract function getComment();
    public abstract function getIdentifier();
    public abstract function getArguments();
    public static function create() {
        $args = func_get_args();
        $identifier = func_get_args()[0];
        $className = sprintf('sergiosgc\Sieve_Parser\Script_Command_%s%s', strtoupper($identifier[0]), substr($identifier, 1));
        if (class_exists($className, true)) {
            return new $className(...$args);
        }
        $className = sprintf('sergiosgc\Sieve_Parser\Script_Argument_Test_%s%s', strtoupper($identifier[0]), substr($identifier, 1));
        if (class_exists($className, true)) {
            return new $className(...$args);
        }
        return new Script_Command_Generic(...$args);
    }
    public function __toString() {
        $terminator = ';';
        if ($this instanceof Script_Argument_Test) $terminator = '';
        if (count($this->getArguments()) && (
            $this->getArguments()[count($this->getArguments())-1] instanceof Script_Argument_Block ||
            $this->getArguments()[count($this->getArguments())-1] instanceof Script_Argument_Test)) $terminator = '';
        if (array_reduce(
            array_map(
                function($obj) { return $obj instanceof Script_Argument_Test; }, 
                $this->getArguments()
            ),
            function($carry, $item) { return $carry && $item; },
            true
        ) && count($this->getArguments()) > 1) { // Every argument is a test
            return sprintf('%s%s (%s)%s',
                (string) $this->getComment(),
                (string) $this->getIdentifier(),
                implode(', ', array_map(function ($obj) { return (string) $obj; }, $this->getArguments())),
                $terminator);
        } else {
            return sprintf('%s%s%s',
                (string) $this->getComment(),
                implode(' ', array_map(function ($obj) { return (string) $obj; }, 
                    array_merge(
                        [ $this->getIdentifier() ],
                        $this->getArguments()
                    )
                )),
                $terminator
            );
        }
    }
}


