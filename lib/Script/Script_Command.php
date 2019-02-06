<?php
namespace sergiosgc\Sieve_Parser;

abstract class Script_Command {
    public abstract function getComment();
    public abstract function getIdentifier();
    public abstract function getArguments();
    public function commandTerminator() { return ';'; }
    public static function create() {
        $args = func_get_args();
        $classIdentifier = func_get_args()[0];
        if ($classIdentifier == 'else' || $classIdentifier == 'elsif') $classIdentifier = 'if';
        $className = sprintf('sergiosgc\Sieve_Parser\Script_Command_%s%s', strtoupper($classIdentifier[0]), substr($classIdentifier, 1));
        if (class_exists($className, true)) {
            return new $className(...$args);
        }
        $className = sprintf('sergiosgc\Sieve_Parser\Script_Argument_Test_%s%s', strtoupper($classIdentifier[0]), substr($classIdentifier, 1));
        if (class_exists($className, true)) {
            return new $className(...$args);
        }
        return new Script_Command_Generic(...$args);
    }
    public static function argumentToString($argument) {
        if (is_object($argument)) return (string) $argument;
        if (is_array($argument)) return sprintf('[%s]', implode(', ', array_map(function($s) { return sprintf('"%s"', strtr($s, [ '"' => '\\"' ])); }, $argument)));

        $unescaped = (string) $argument;
        if (strlen($unescaped) > 100) {
            return sprintf("text:\r\n%s\r\n.\r\n",
                preg_replace('_^\\._m', '..', $unescaped)
            );
        } else {
            return sprintf('"%s"', strtr($unescaped, [ '\\' => '\\\\', '"' => '\\"' ]));
        }
    }
    public function isTemplateOptional() {
        return Script_Template::isOptional($this->getIdentifier());
    }
    public function matchesTemplate($template) {
        return $this->matchTemplate($template) !== FALSE;
    }
    // If the command matches with template, return an associative array of template variable values that produce the command. Otherwise, return false.
    public function matchTemplate($template) {
        $result = [];
        if (!$template instanceof Script_Command) return false;
        if ($this->getIdentifier() != $template->getIdentifier()) {
            if (!Script_Template::isOptional($template->getIdentifier())) return false;
            $name = Script_Template::extractVariableName($template->getIdentifier());
            $value = Script_Template::extractOptionalValue($template->getIdentifier());
            if ($this->getIdentifier() != $value) return false;
            if ($name) $result[$name] = $value;
        }
        $thereAreOptionalArguments = array_reduce(array_map(['Script_Template', 'isOptional'], $template->getArguments()),
            function($acc, $isOptional) { return $acc || $isOptional; }, 
            false);
        // The match algorithm is different when in the presence of optional arguments or not. When there are no optional arguments, ignore the order on matching
        if ($thereAreOptionalArguments) {
            // When dealing with optionals, match in-order, and skip optionals where needed to complete the match
            $commandArguments = $this->getArguments();
            $commandArgumentIndex = 0;
            foreach ($this->templateArguments() as $templateArgument) {
                $name = Script_Template::extractVariableName($templateArgument);
                if ($name) { // It's a template variable
                    $value = Script_Template::argumentToString($commandArguments[$commandArgumentIndex]);
                    $result[$name] = $value;
                    continue;
                }
                if (is_callable([$commandArguments[$commandArgumentIndex], 'matchTemplate'])) { // Regular argument, which matches
                    $innerResult = $commandArguments[$commandArgumentIndex]->matchTemplate($templateArgument);
                    if (is_array($innerResult)) {
                        $result = array_merge($result, $innerResult);
                        continue;
                    }
                }
                if (is_callable([$templateArgument, 'isTemplateOptional']) && $templateArgument->isTemplateOptional()) { // Regular argument, does not match, but is optional
                    continue;
                }
                // No match
                return false;
            }
        } else {
            // When there are no optionals, match left and right pairwise regardless of order
            $commandArguments = $this->getArguments();
            $templateArguments = $template->getArguments();
            foreach ($commandArguments as $commandArgument) {
                for ($templateIndex = 0; $templateIndex < count($templateArguments); $templateIndex++) {
                    $name = Script_Template::extractVariableName($templateArguments[$templateIndex]);
                    $matched = false;
                    if ($name) {
                        // It's a variable
                        $matched = true;
                        $value = Script_Template::argumentToString($commandArgument);
                        $result[$name] = $value;
                    } else {
                        // Not a variable
                        if (is_callable([$commandArgument, 'matchTemplate'])) {
                            $innerResult = $commandArgument->matchTemplate($templateArguments[$templateIndex]);
                            $matched = is_array($innerResult);
                            $innerResult = is_array($innerResult) ?: [];
                            $result = array_merge($result, $innerResult);
                        } else {
                            $matched = ((string) $commandArgument) == ((string) $templateArguments[$templateIndex]);
                        }
                    }
                    if ($matched) {
                        unset($templateArguments[$templateIndex]);
                        $templateArguments = array_values($templateArguments);
                        continue 2;
                    }
                }
                return false; // $commandArgument not matched, whole command does not match
            }
        }
    }
    public function __toString() {
        $result = $this->getComment() ? ($this->getComment() ) : '';
        $result .= (string) $this->getIdentifier();
        if (count($this->getArguments())) $result .= ' ';
        $terminator = ($this instanceof Script_Argument_Test) ? '' : ';';
        $isTestList = (0 == count(array_filter($this->getArguments(), function($arg) { return !($arg instanceof Script_Argument_Test); }))) && count($this->getArguments());
        $result .= sprintf($isTestList ? '(%s)' : '%s', 
            implode(
                $isTestList ? ', ' : ' ',
                array_map(['\sergiosgc\Sieve_Parser\Script_Command', 'argumentToString'], $this->getArguments())
            ));
        $result .= $this->commandTerminator();

        return $result;
    }
}


