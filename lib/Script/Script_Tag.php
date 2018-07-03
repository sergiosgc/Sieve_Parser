<?php
namespace sergiosgc\Sieve_Parser;

class Script_Tag {
    public $tag = '';
    public function __construct($tag = '') {
        $this->tag = $tag;
    }
    public function __toString() {
        return ':' . $this->tag;
    }
    public function matchesTemplate($template) {
        return $this->tag == $template->tag;
    }
}

