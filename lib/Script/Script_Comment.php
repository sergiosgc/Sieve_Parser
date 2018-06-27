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
    public function __toString() {
        if ($this->encoding == self::ENCODING_AUTO) $this->encoding = strpos($this->text, "\n") !== FALSE ? self::ENCODING_HASH : self::ENCODING_MULTILINE;
        if ($this->encoding == self::ENCODING_HASH) return preg_replace('_^_m', '#', (string) $this->text);
        return sprintf('/*%s*/', preg_replace('_\\*/_', '', (string) $this->text));
    }
}
