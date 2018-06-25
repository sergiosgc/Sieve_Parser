<?php
namespace sergiosgc\Sieve_Parser;

class Script_Comment {
    public $text = '';
    const ENCODING_MULTILINE = 1;
    const ENCODING_HASH =2;
    public $encoding = self::ENCODING_MULTILINE;
    public function __construct($text = '') {
        $this->text = $text;
    }
    public function __toString() {
        return $this->text;
    }
}
