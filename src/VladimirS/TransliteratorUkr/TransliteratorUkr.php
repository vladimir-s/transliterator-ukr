<?php

namespace VladimirS\TransliteratorUkr;

class TransliteratorUkr
{
    /** @var Symbol $symbol */
    private $symbol;

    public function __construct()
    {
        $this->symbol = new Symbol();
    }

    /**
     * @param string $text
     *
     * @return string
     */
    public function convert(string $text): string
    {
        $result     = '';
        $wordBegin  = true;
        $symbols    = preg_split('//u', $text, -1, PREG_SPLIT_NO_EMPTY);
        $textLength = count($symbols);
        $i          = 0;
        while ($i < $textLength) {
            $curSymbol = $symbols[$i];
            if ($this->symbol->isPunctuationMark($curSymbol)) {
                $result    .= $this->symbol->getPunctuationMark($curSymbol);
                $wordBegin = true;
                $i++;
            } elseif ($this->symbol->isLetter($curSymbol)) {
                $nextSumbol = $symbols[$i + 1] ?? '';
                if ($this->symbol->isLetterCombination($curSymbol.$nextSumbol)) {
                    $result .= $this->symbol->getLettersCombination($curSymbol.$nextSumbol);
                    $i      += 2;
                } else {
                    $result .= $this->symbol->getLetter($curSymbol, $wordBegin);
                    $i++;
                }
                $wordBegin = false;
            } else {
                $wordBegin = true;
                $i++;
            }
        }

        return $result;
    }
}
