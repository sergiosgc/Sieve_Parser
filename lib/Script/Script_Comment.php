<?php
namespace sergiosgc\Sieve_Parser;

class Script_Comment {
    public $text = '';
    const ENCODING_AUTO = 0;
    const ENCODING_MULTILINE = 1;
    const ENCODING_HASH =2;
    public $encoding = self::ENCODING_AUTO;
    public function __construct($text = '') {
        $this->text = $text;
    }
    public static function create($text = '') {
        return new Script_Comment($text);
    }
    public function __toString() {
        if ($this->encoding == self::ENCODING_AUTO) $this->encoding = strpos($this->text, "\n") !== FALSE ? self::ENCODING_HASH : self::ENCODING_MULTILINE;
        if ($this->encoding == self::ENCODING_HASH) return preg_replace('_^_m', '#', (string) $this->text);
        return sprintf('/*%s*/', preg_replace('_\\*/_', '', (string) $this->text));
    }
    public function templateVariables() {
        if (!preg_match('_.*---TEMPLATE VARIABLES---(.*)---TEMPLATE VARIABLES---.*_ms', $this->text, $matches)) return [];
        $text = $matches[1];
        // Remove empty lines
        $text = implode("\n", array_filter(explode("\n", $text), function($line) { return !((bool) preg_match('_^\s*$_', $line)); }));
        // Calculate indent
        $indent = array_reduce(
            array_map(function($line) { 
                if (!preg_match('_^(\s*).*_', $line, $matches)) return 0;
                return strlen($matches[1]);
            }, explode("\n", $text)),
            function($acc, $len) { return min($acc, $len); },
            1024);
        if ($indent) {
            $regexp = '_^';
            while ($indent) { $regexp .= ' '; $indent--; }
            $regexp .= '_m';
            $text = preg_replace($regexp, '', $text);
        }
        return yaml_parse($text);
    }
    public function instantiateFromTemplate($values) {
        if (preg_match('_(.*)---TEMPLATE VARIABLES---.*---TEMPLATE VARIABLES---(.*)_ms', $this->text, $matches)) return new Script_Comment($matches[1] . $matches[2]);
        return new Script_Comment($this->text);
    }
}

