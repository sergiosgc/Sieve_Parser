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
    public function templateVariables($extractValues = null) {
        $result = [];
        if ($this->getComment()) $result = Script::array_merge_deep($result, $this->getComment()->templateVariables());
        if (preg_match('/optional_([a-z]+)_.*/', $this->getIdentifier(), $matches)) {
            $result[$matches[1]] = ['name' => $matches[1]];
            if (!is_null($extractValues)) $result[$matches[1]]['value'] = (bool) $extractValues;
        }
        if ($this->getArguments()) $result = Script::array_merge_deep($result, Script::applyTemplateVariables($this->getArguments(), $extractValues && $extractValues->getArguments() ? $extractValues->getArguments() : null));
        if ($this->getCommandBlock()) $result = Script::array_merge_deep($result, Script::applyTemplateVariables($this->getCommandBlock(), $extractValues && $extractValues->getCommandBlock() ? $extractValues->getCommandBlock() : null));
        return $result;
    }
}

