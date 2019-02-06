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
    public static function value($literal) {
        if (is_string($literal)) return $literal;
        if ($literal instanceof Script_Argument_Literal) return $literal->value;
        if (is_array($literal)) return array_map([ '\sergiosgc\Sieve_Parser\Script_Argument_Literal', 'value' ], $literal);
        if (is_null($literal)) return '';
        throw new \Exception('Script_Argument_Literal::value can only process strings or Script_Argument_Literal');
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
