<?php
namespace sergiosgc\Sieve_Parser;

class Script_Argument_Tagged implements Script_Argument {
    public $tag;
    public $value;

    public function __construct($tag, $value = true) {
        $this->tag = $tag;
        $this->value = $value;
    }
    public static function create($tag, $value = true) {
        return new Script_Argument_Tagged($tag, $value);
    }
    public function __toString() {
        if (is_bool($this->value)) {
            if ($this->value) return sprintf(':%s', $this->tag);
            return '';
        } else {
            return sprintf(':%s %s', $this->tag, (string) $this->value);
        }
    }
}

