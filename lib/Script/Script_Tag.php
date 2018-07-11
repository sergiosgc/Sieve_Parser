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
    public function templateVariables($extractValues = null) {
        if (strlen($this->tag) && $this->tag[0] == '$') {
            $result = [ 'name' => substr($this->tag, 1) ];
            if (!is_null($extractValues)) $result['value'] = (bool) $extractValues;
            return [ substr($this->tag, 1) => $result ];
        }
        return [];
    }
}

