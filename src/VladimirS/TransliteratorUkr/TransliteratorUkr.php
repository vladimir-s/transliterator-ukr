<?php

namespace VladimirS\TransliteratorUkr;

class TransliteratorUkr
{
    public static function convert($text)
    {
        $result     = '';
        $wordBegin  = true;
        $symbols    = preg_split('//u', $text, -1, PREG_SPLIT_NO_EMPTY);
        $textLength = count($symbols);
        $i          = 0;
        while ($i < $textLength) {
            $curSymbol = $symbols[$i];
            if (PunctuationMarks::isPunctuationMark($curSymbol)) {
                $result    .= PunctuationMarks::getPunctuationMark($curSymbol);
                $wordBegin = true;
                $i++;
            } elseif (LettersUkr::isLetter($curSymbol)) {
                $nextSumbol = $symbols[$i + 1] ?? '';
                if (LettersUkr::isLetterCombination($curSymbol . $nextSumbol)) {
                    $result .= LettersUkr::getLettersCombination($curSymbol . $nextSumbol);
                    $i      += 2;
                } else {
                    $result .= LettersUkr::getLetter($curSymbol, $wordBegin);
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
