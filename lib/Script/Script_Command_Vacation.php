<?php
namespace sergiosgc\Sieve_Parser;

class Script_Command_Vacation extends Script_Command {
    private $comment = null;
    private $days = null;
    private $subject = null;
    private $from = null;
    private $addresses = null;
    private $mime = null;
    private $handle = null;
    private $reason = null;
    public function getComment() { return $this->comment; }
    public function setComment(Script_Comment $comment) { $this->comment = $comment; }
    public function getDays() { return $this->days; }
    public function setDays($days) { $this->days = $days; }
    public function getSubject() { return $this->subject; }
    public function setSubject($subject) { $this->subject = $subject; }
    public function getFrom() { return $this->from; }
    public function setFrom($from) { $this->from = $from; }
    public function getAddresses() { return $this->addresses; }
    public function setAddresses($addresses) { 
        if (!is_array($addresses) && !is_null($addresses)) throw new \Exception('Addresses must be an array. Unable to set field.'); 
        $this->addresses = $addresses; 
    }
    public function setAddress($address) {
        if (!is_array($this->addresses)) $this->addresses = [];
        $temp = array_flip($this->addresses);
        $temp[$address] = true;
        $this->addresses = array_keys($temp);
    }
    public function unsetAddress($address) {
        if (!is_array($this->addresses)) $this->addresses = [];
        $temp = array_flip($this->addresses);
        unset($temp[$address]);
        $this->addresses = array_keys($temp);
    }
    public function getMime() { return $this->mime; }
    public function setMime($mime = true) { $this->mime = $mime; }
    public function unsetMime() { $this->mime = false; }
    public function getHandle() { return $this->handle; }
    public function setHandle($handle) { $this->handle = $handle; }
    public function getReason() { return $this->reason; }
    public function setReason($reason) { $this->reason = $reason; }

    public function getIdentifier() { return 'vacation'; }
    public function getArguments() {
        $result = [];
        if (!is_null($this->getDays())) {
            $result[] = new Script_Argument_Tagged('days');
            $result[] = (string) $this->getDays();
        }
        if (!is_null($this->getSubject())) {
            $result[] = new Script_Argument_Tagged('subject');
            $result[] = (string) $this->getSubject();
        }
        if (!is_null($this->getFrom())) {
            $result[] = new Script_Argument_Tagged('from');
            $result[] = (string) $this->getFrom();
        }
        if (!is_null($this->getAddresses())) {
            $result[] = new Script_Argument_Tagged('addresses');
            $result[] = $this->getFrom();
        }
        if ($this->getMime()) {
            $result[] = new Script_Argument_Tagged('mime');
        }
        if (!is_null($this->getHandle())) {
            $result[] = new Script_Argument_Tagged('handle');
            $result[] = $this->getHandle();
        }
        $result[] = (string) $this->getReason();
        return $result;
    }
    
    
    public function __construct($identifier, $args = []) {
        if ($identifier != 'vacation') throw new \Exception(sprintf('Invalid identifier %s', $identifier));
        $args = array_values($args);
        $index = 0;
        while (true) {
            if (count($args) == 0) throw new \Exception('Vacation arguments contain no Reason argument');
            if (count($args) == 1) {
                $this->setReason($args[0]);
                return;
            }
            if (!$args[0] instanceof Script_Argument_Tagged) throw new \Exception(sprintf('Unrecognized argument %d: %s', $index, (string) $args[0]));
            switch ($args[0]->tag) {
                case 'days':
                    $this->setDays((int) $args[1]);
                    array_shift($args);
                    array_shift($args);
                    $index+=2;
                    break;
                case 'subject':
                    $this->setSubject($args[1]);
                    array_shift($args);
                    array_shift($args);
                    $index+=2;
                    break;
                case 'from':
                    $this->setFrom($args[1]);
                    array_shift($args);
                    array_shift($args);
                    $index+=2;
                    break;
                case 'addresses':
                    $this->setAddresses(is_string($args[1]) ? [ $args[1] ] : $args[1]);
                    array_shift($args);
                    array_shift($args);
                    $index+=2;
                    break;
                case 'mime':
                    $this->setMime();
                    array_shift($args);
                    $index+=1;
                    break;
                case 'handle':
                    $this->setHandle($args[1]);
                    array_shift($args);
                    array_shift($args);
                    $index+=2;
                    break;
                default: throw new \Exception(sprintf('Unknown tag %s on argument %d', $args[0]->tag, $index));
            }
        }
    }
    public function __toString() {
        $result = 'vacation';
        if (!is_null($this->days)) $result .= sprintf(' :days %s', (int) $this->days);
        if (!is_null($this->subject)) $result .= sprintf(' :subject %s', static::argumentToString($this->subject));
        if (!is_null($this->from)) $result .= sprintf(' :from %s', static::argumentToString($this->from));
        if (!is_null($this->addresses)) $result .= sprintf(' :addresses %s', static::argumentToString($this->addresses));
        if ($this->mime) $result .= ' :mime';
        if (!is_null($this->handle)) $result .= sprintf(' :handle %s', static::argumentToString($this->handle));
        $result .= sprintf(' %s', static::argumentToString($this->reason));
        return $result;
    }
}

