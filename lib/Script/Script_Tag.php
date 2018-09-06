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
        // TODO: Handle optional_<varname>_<tagname> tag
        return [];
    }
    public function instantiateFromTemplate($values) {
        if (strlen($this->tag) && $this->tag[0] == '$') {
            $varName = substr($this->tag, 1);
            if (isset($values[$varName])) return new Script_Tag($values[$varName]);
            return new Script_Tag('');
        }
        if (strlen($this->tag) && preg_match('/optional_([a-z]+)_(.*)/', $this->tag, $matches)) {
            $varName = $matches[1];
            $tagName = $matches[2];
            if (isset($values[$varName]) && $values[$varName]) return new Script_Tag($tagName);
            return false;
        }
        return new Script_Tag($this->tag);
    }
}

