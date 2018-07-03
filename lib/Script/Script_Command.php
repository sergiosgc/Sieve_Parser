<?php
namespace sergiosgc\Sieve_Parser;

abstract class Script_Command {
    public abstract function getIdentifier();
    public abstract function getArguments();
    public abstract function getCommandBlock();
    public abstract function getComment();
    public function __toString() {
        $result = (string) $this->getComment();
        $result .= $this->getIdentifier();
        if ($this->getArguments() && count($this->getArguments())) {
            if (1 < count($this->getArguments()) && "sergiosgc\Sieve_Parser\Script_Test" === array_reduce($this->getArguments(), function($acc, $e) {
                if (is_null($acc)) return is_object($e) ? get_class($e) : gettype($e);
                if ($acc === false) return false;
                if ((is_object($e) ? get_class($e) : gettype($e)) === $acc) return $acc;
                return false;
            })) {
                $result .= sprintf(' ( %s )', implode(', ' ,array_map(array('\sergiosgc\Sieve_Parser\Script', 'encode'), $this->getArguments())));
            } else {
                $result .= ' ' . implode(' ' ,array_map(array('\sergiosgc\Sieve_Parser\Script', 'encode'), $this->getArguments()));
            }
        }
        if (!$this->getCommandBlock()) {
            $result .= ";\r\n";
        } elseif (is_object($this->getCommandBlock()) && $this->getCommandBlock() instanceof Script_Commands) {
            $result .= sprintf(" {\r\n%s}\r\n", preg_replace('_^_m', ' ', (string) $this->getCommandBlock()));
        } elseif (is_object($this->getCommandBlock()) && $this->getCommandBlock() instanceof Script_Command) {
            $result .= ' ' . $this->getCommandBlock() . ";\r\n";
        }
        return $result;
    }
    public function matchesTemplate($template) {
        if ($this->getIdentifier() != $template->getIdentifier() && 
            !(preg_match('/optional_[a-z]+_(.*)/', $template->getIdentifier(), $matches) && $matches[1] == $this->getIdentifier())) {
            return false;
        }
        if (!Script::optionallyMatchesTemplate( $this->getArguments() ?: [], $template->getArguments() ?: [] )) return false;
        if (!($this->getCommandBlock() ?: new Script_Commands([]))->matchesTemplate($template->getCommandBlock() ?: new Script_Commands([]))) return false;
        return true;
    }
    public function isOptionalInTemplate() {
        if (preg_match('/optional_[a-z]+_(.*)/', $this->getIdentifier())) return true;
        return false;
    }
    /*
    public function identifierMatchesTemplate(Script_Command $templateCommand) {
        if (preg_match('/optional_[a-z]+_(.*)/', $templateCommand->getIdentifier(), $matches) && $matches[1] == $this->getIdentifier()) return true;
        return false;
    }
    public function matchesTemplate(Script_Command $templateCommand) {
        if (get_class($templateCommand) != get_class($this)) return false;
        if (!Script::argumentMatchesTemplate($this->getArguments(), $templateCommand->getArguments())) return false;
        if (!Script::commandBlockMatchesTemplate($this->getCommandBlock(), $templateCommand->getCommandBlock())) return false;
        return true;
    }
     */

}

