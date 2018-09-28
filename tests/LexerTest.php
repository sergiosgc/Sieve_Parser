<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class LexerTest extends TestCase
{
    public function testLexerIdentityOutput(): void
    {
        $acceptableDifferentChars = "\t\r\n #\":";
        {
            $temp = [];
            for ($i=0; $i<strlen($acceptableDifferentChars); $i++) $temp[$acceptableDifferentChars[$i]] = '';
            $acceptableDifferentChars = $temp;
        }
        $dh = opendir(__DIR__ . '/inputs');
        while (($file = readdir($dh)) !== false) {
            $canonicalFilename = realpath(sprintf("%s/inputs/%s", __DIR__, $file));
            if (!is_file($canonicalFilename)) continue;
            $originalContent = file_get_contents($canonicalFilename);
            $lexer = new \sergiosgc\Sieve_Parser\Tokenizer($originalContent, new \sergiosgc\Text_Tokenizer_Regex_Matcher_Php());
            $lexedContent = '';
            while ($token = $lexer->getNextToken()) {
                $lexedContent .= $token->getValue() . ' ';
            }
            $normalizedLeft = strtr($originalContent, $acceptableDifferentChars);
            $normalizedRight = strtr($lexedContent, $acceptableDifferentChars);
            $this->assertTrue( $normalizedLeft == $normalizedRight, sprintf("Lexer output for test input %s is not equal to original input", $file) );
        }
        closedir($dh);
    }
}
