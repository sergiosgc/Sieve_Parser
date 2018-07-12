<?php
namespace sergiosgc\Sieve_Parser;

/**
 * A tokenizer for a Sieve parser. 
 */
class Tokenizer extends \sergiosgc\Text_Tokenizer_Regex {
    /*     __construct {{ { */
    /**
     * Constructor
     *
     * @param string Input text to tokenize
     * @param Text_Tokenizer_Regex_Matcher (optional) Matcher to use 
     */
    public function __construct($input = null, $matcher = null)
    {
        parent::__construct($matcher);
        if (!is_null($input)) $this->setInput($input);
// Tokens are documented with the text from the RFC

// Pg 34
//bracket-comment    = "/*" *not-star 1*STAR
//                     *(not-star-slash *not-star 1*STAR) "/"
//                       ; No */ allowed inside a comment.
//                       ; (No * is allowed unless it is the last
//                       ; character, or unless it is followed by a
//                       ; character that isn't a slash.)
//not-star           = CRLF / %x01-09 / %x0B-0C / %x0E-29 / %x2B-FF
//                       ; either a CRLF pair, OR a single octet
//                       ; other than NUL, CR, LF, or star
//not-star-slash     = CRLF / %x01-09 / %x0B-0C / %x0E-29 / %x2B-2E /
//                        %x30-FF
//                       ; either a CRLF pair, OR a single octet
//                       ; other than NUL, CR, LF, star, or slash
        // The regex is a reinterpretation of all these tokens: "/*" followed by zero or more characters other than the sequence "*/"
        //   terminated by "*/". It allows a lone LF (not in a CRLF pair), it allows NUL, which the original doesn't; it is assumed 
        //   to be non-problematic.
        $this->addRegex('@([ \\r\\n\\t])*/[*](?<comment>([^*]|[*][^/])*)[*]/@Am', '<bracket-comment>', '<comment>');

// Pg 35
// comment            = bracket-comment / hash-comment
// Moved to grammar

// hash-comment       = "#" *octet-not-crlf CRLF
        $this->addRegex('@([ \\r\\n\\t])*#(?<comment>[^\\r\\n]*\\r\\n)@A', '<hash-comment>', '<comment>');

//multi-line         = "text:" *(SP / HTAB) (hash-comment / CRLF)
//                      *(multiline-literal / multiline-dotstart)
//                      "." CRLF
//
// multiline-literal  = [ octet-not-period *octet-not-crlf ] CRLF
//
// multiline-dotstart = "." 1*octet-not-crlf CRLF
//                        ; A line containing only "." ends the
//                        ; multi-line.  Remove a leading '.' if
//                        ; followed by another '.'. 
		// The regex is a reinterpretation of all these tokens: "text:" then a hash-comment-minus-CRLF (optional) then a CRLF, followed by 
		//   0 or more lines of 0 or more characters, which are either a dot not followed by CRLF or a non-dot followed by anything or an empty string. 
        // The token ends with a line of a dot followed by CRLF
        $this->addRegex('@([ \\r\\n\\t])*text:(?<text>[ \\t]*(#[^\\r\\n]*)?\\r\\n([.][^\\r]+\\r\\n|[^.\\r]*\\r\\n)*[.]\\r\\n)@Am', '<multi-line>', '<text>');
// identifier         = (ALPHA / "_") *(ALPHA / DIGIT / "_")
		// Out of order so that it does not capture the "text:" in <multi-line>
        $this->addRegex('@([ \\r\\n\\t])*(?<identifier>not)@Ai', '<identifier-not>', '<identifier>');
        $this->addRegex('@([ \\r\\n\\t])*(?<identifier>if)@Ai', '<identifier-if>', '<identifier>');
        $this->addRegex('@([ \\r\\n\\t])*(?<identifier>elsif)@Ai', '<identifier-elsif>', '<identifier>');
        $this->addRegex('@([ \\r\\n\\t])*(?<identifier>else)@Ai', '<identifier-else>', '<identifier>');
        $this->addRegex('@([ \\r\\n\\t])*(?<identifier>require)@Ai', '<identifier-require>', '<identifier>');
        $this->addRegex('@([ \\r\\n\\t])*(?<identifier>stop)@Ai', '<identifier-stop>', '<identifier>');
        $this->addRegex('@([ \\r\\n\\t])*(?<identifier>fileinto)@Ai', '<identifier-fileinto>', '<identifier>');
        $this->addRegex('@([ \\r\\n\\t])*(?<identifier>keep)@Ai', '<identifier-keep>', '<identifier>');
        $this->addRegex('@([ \\r\\n\\t])*(?<identifier>redirect)@Ai', '<identifier-redirect>', '<identifier>');
        $this->addRegex('@([ \\r\\n\\t])*(?<identifier>discard)@Ai', '<identifier-discard>', '<identifier>');
        $this->addRegex('@([ \\r\\n\\t])*(?<identifier>[a-zA-Z_][a-zA-Z_0-9]*)@A', '<identifier>', '<identifier>');
//  number             = 1*DIGIT [ QUANTIFIER ]
//  QUANTIFIER         = "K" / "M" / "G"
		$this->addRegex('@([ \\r\\n\\t])*(?<number>[0-9]+([KMG]?))@A', '<number>', '<number>');
//   quoted-other       = "\" octet-not-qspecial
//                          ; represents just the octet-no-qspecial
//                          ; character.  SHOULD NOT be used
//
//   quoted-safe        = CRLF / octet-not-qspecial
//                          ; either a CRLF pair, OR a single octet other
//                          ; than NUL, CR, LF, double-quote, or backslash
//   quoted-special     = "\" (DQUOTE / "\")
//                          ; represents just a double-quote or backslash
//
//   quoted-string      = DQUOTE quoted-text DQUOTE
//
//   quoted-text        = *(quoted-safe / quoted-special / quoted-other)
		$this->addRegex('@([ \\r\\n\\t])*"(?<quotedstring>(\\r\\n|[^\\x00\\x0a\\x0d"\\\\]|\\\\[^\\x00\\x0a\\x0d])*)"@Am', '<quoted-string>', '<quotedstring>');
//   tag                = ":" identifier
		$this->addRegex('@([ \\r\\n\\t])*:(?<tag>[a-zA-Z_][a-zA-Z_0-9]*)@A', '<tag>', '<tag>');

// Tokens required by single characters in the grammar definition (section 8.2 of the RFC)
        $this->addRegex('@([ \\r\\n\\t])*({)@A', '<bracket-open>');
        $this->addRegex('@([ \\r\\n\\t])*(})@A', '<bracket-close>');
        $this->addRegex('@([ \\r\\n\\t])*(;)@A', '<semicolon>');
        $this->addRegex('@([ \\r\\n\\t])*(,)@A', '<comma>');
        $this->addRegex('@([ ]|\\r\\n|\t)*(\\[)@A', '<square-parenthesis-open>');
        $this->addRegex('@([ \\r\\n\\t])*(\\])@A', '<square-parenthesis-close>');
        $this->addRegex('@([ \\r\\n\\t])*(\\()@A', '<parenthesis-open>');
        $this->addRegex('@([ \\r\\n\\t])*(\\))@A', '<parenthesis-close>');
// Pg 36
// white-space        = 1*(SP / CRLF / HTAB) / comment
// Comment option moved to grammar under <white-space>
        $this->addRegex('@([ ]|\\r\\n|\t)+$@Am', '<eof>');
        $this->addRegex('@([ ]|\\r\\n|\t)+@Am', '<white-space-token>');

		$this->setEOFToken('<eof>');		
        $this->setSelectionCriteria(\sergiosgc\Text_Tokenizer_Regex::SELECTFIRST);
    }
    /* }}} */
}
