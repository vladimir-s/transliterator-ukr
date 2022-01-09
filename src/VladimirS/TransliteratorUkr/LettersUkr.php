<?php

namespace VladimirS\TransliteratorUkr;

class LettersUkr
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
        "'" => [''],
        'ь' => [''],
    ];

    private static $lettersCombination = [
        'Зг' => ['Zgh'],
        'зг' => ['zgh'],
    ];

    public static function isLetter($symbol)
    {
        return isset(self::$letters[$symbol]);
    }

    public static function getLetter($symbol, $isWordBegin)
    {
        $res = '';
        if (false === $isWordBegin && isset(self::$letters[$symbol][1])) {
            $res = self::$letters[$symbol][1];
        } else {
            $res = self::$letters[$symbol][0];
        }

        return $res;
    }

    public static function isLetterCombination($symbols)
    {
        return isset(self::$lettersCombination[$symbols]);
    }

    public static function getLettersCombination($symbols)
    {
        $res = '';
        if (isset(self::$lettersCombination[$symbols])) {
            $res = self::$lettersCombination[$symbols][0];
        }

        return $res;
    }
}