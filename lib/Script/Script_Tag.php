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
    public function templateVariables() {
        if (strlen($this->tag) && $this->tag[0] == '$') return [ substr($this->tag, 1) => [ 'name' => substr($this->tag, 1) ]];
        return [];
    }
}

