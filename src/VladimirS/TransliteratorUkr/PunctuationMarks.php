<?php

namespace VladimirS\TransliteratorUkr;

class PunctuationMarks
{
    private static $punctuationMarks = [
        '.' => '.',
        ',' => ',',
        ';' => ';',
        ':' => ':',
        '?' => '?',
        '!' => '!',
        '-' => '-',
        '"' => '"',
        ' ' => ' ',
    ];

    public static function isPunctuationMark($symbol)
    {
        return isset(self::$punctuationMarks[$symbol]);
    }

    public static function getPunctuationMark($symbol)
    {
        $res = '';
        if (isset(self::$punctuationMarks[$symbol])) {
            $res = self::$punctuationMarks[$symbol];
        }

        return $res;
    }
}