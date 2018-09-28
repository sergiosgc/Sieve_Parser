<?php
namespace sergiosgc\Sieve_Parser;

class Script_Argument_Literal implements Script_Argument {
    public $value;

    public function __construct($value = '') {
        $this->value = $value;
    }
    public static function create($value = '') {
        return new Script_Argument_Literal($value);
    }
    public function __toString() {
        if (is_array($this->value)) {
            return sprintf('[%s]', implode(', ', array_map(function($obj) { return (string) $obj; }, $this->value)));
        } else {
            $unescaped = (string) $this->value;
            if (strlen($unescaped) > 100) {
                return sprintf("text:\r\n%s\r\n.\r\n",
                    preg_replace('_^\\._m', '..', $unescaped)
                );
            } else {
                return sprintf('"%s"', strtr($unescaped, [ '\\' => '\\\\', '"' => '\\"' ]));
            }
        }
    }
}
