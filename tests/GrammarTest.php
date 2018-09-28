<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class GrammarTest extends TestCase
{

	private function parseGrammar() {
        $tokenizer = new \sergiosgc\Text_Parser_BNF_Tokenizer(
            file_get_contents(sprintf('%s/../data/grammar.txt', __DIR__)),
            new \sergiosgc\Text_Tokenizer_Regex_Matcher_Php());
        return (new \sergiosgc\Text_Parser_BNF($tokenizer))->parse()->getValue();
    }

    public function testSieveGrammarSyntax() {
        $grammar = $this->parseGrammar();
        $this->assertInstanceOf(\sergiosgc\Structures_Grammar::class, $grammar);
    }

    public function testSieveGrammarValid() {
        $generator = new \sergiosgc\Text_Parser_Generator_LALR($this->parseGrammar());
        $this->assertContains('class TestSieveParser extends \sergiosgc\Text_Parser_LALR', $generator->generate('TestSieveParser'));
    }
}
