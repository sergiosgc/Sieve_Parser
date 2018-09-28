<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class ParserTest extends TestCase
{
    public function testParser() {
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
            $tokenizer = new \sergiosgc\Sieve_Parser\Tokenizer(
                $originalContent,
                new \sergiosgc\Text_Tokenizer_Regex_Matcher_Php());
            $parser = new \sergiosgc\Sieve_Parser\Parser($tokenizer);
            $parsed = new \sergiosgc\Sieve_Parser\Script($parser->parse()->getValue());
            $this->assertInstanceOf( \sergiosgc\Sieve_Parser\Script::class, $parsed);
            $normalizedLeft = strtr($originalContent, $acceptableDifferentChars);
            $normalizedRight = strtr((string) $parsed, $acceptableDifferentChars);
            $this->assertTrue( $normalizedLeft == $normalizedRight, sprintf("Parsed output for test input %s is not equal to original input", $file) );
        }
        closedir($dh);
    }
}
