<?php

namespace VladimirS\TransliteratorUkr;

class TransliteratorUkr
{
    private static $letters = [
        'А' => ['A'],
        'а' => ['a'],
        'Б' => ['B'],
        'б' => ['b'],
        'В' => ['V'],
        'в' => ['v'],
        'Г' => ['H'],
        'г' => ['h'],
        'Ґ' => ['G'],
        'ґ' => ['g'],
        'Д' => ['D'],
        'д' => ['d'],
        'Е' => ['E'],
        'е' => ['e'],
        'Є' => ['Ye', 'ie'],
        'є' => ['ye', 'ie'],
        'Ж' => ['Zh'],
        'ж' => ['zh'],
        'З' => ['Z'],
        'з' => ['z'],
        'И' => ['Y'],
        'и' => ['y'],
        'І' => ['I'],
        'і' => ['i'],
        'Ї' => ['Yi', 'i'],
        'ї' => ['yi', 'i'],
        'Й' => ['Y', 'i'],
        'й' => ['y', 'i'],
        'К' => ['K'],
        'к' => ['k'],
        'Л' => ['L'],
        'л' => ['l'],
        'М' => ['M'],
        'м' => ['m'],
        'Н' => ['N'],
        'н' => ['n'],
        'О' => ['O'],
        'о' => ['o'],
        'П' => ['P'],
        'п' => ['p'],
        'Р' => ['R'],
        'р' => ['r'],
        'С' => ['S'],
        'с' => ['s'],
        'Т' => ['T'],
        'т' => ['t'],
        'У' => ['U'],
        'у' => ['u'],
        'Ф' => ['F'],
        'ф' => ['f'],
        'Х' => ['Kh'],
        'х' => ['kh'],
        'Ц' => ['Ts'],
        'ц' => ['ts'],
        'Ч' => ['Ch'],
        'ч' => ['ch'],
        'Ш' => ['Sh'],
        'ш' => ['sh'],
        'Щ' => ['Shch'],
        'щ' => ['shch'],
        'Ю' => ['Yu', 'iu'],
        'ю' => ['yu', 'iu'],
        'Я' => ['Ya', 'ia'],
        'я' => ['ya', 'ia'],
    ];

    private static $letterCombination = [
        'Зг' => ['Zgh'],
        'зг' => ['zgh'],
    ];

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

    private static $skipLetters = [
        "'" => '',
        'ь' => '',
    ];

    public static function convert($text)
    {
        $result     = '';
        $wordBegin  = true;
        $symbols = preg_split('//u', $text, -1, PREG_SPLIT_NO_EMPTY);
        $textLength = count($symbols);
        $i          = 0;
        while ($i < $textLength) {
            $curSymbol = $symbols[$i];
            if (isset(self::$punctuationMarks[$curSymbol])) {
                $result    .= self::$punctuationMarks[$curSymbol];
                $wordBegin = true;
                $i++;
            } elseif (isset(self::$letters[$curSymbol])) {
                $nextSumbol = $symbols[$i + 1] ?? '';
                if (isset(self::$letterCombination[$curSymbol . $nextSumbol])) {
                    $result .= self::$letterCombination[$curSymbol . $nextSumbol][0];
                    $i      += 2;
                } else {
                    if (false === $wordBegin && isset(self::$letters[$curSymbol][1])) {
                        $result .= self::$letters[$curSymbol][1];
                    } else {
                        $result .= self::$letters[$curSymbol][0];
                    }
                    $i++;
                }
                $wordBegin = false;
            } elseif (isset(self::$skipLetters[$curSymbol])) {
                $wordBegin = false;
                $i++;
            } else {
                $wordBegin = true;
                $i++;
            }
        }

        return $result;
    }
}
