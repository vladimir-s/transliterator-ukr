<?php

namespace VladimirS\TransliteratorUkr;

class Symbol
{
    private $letters = [
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
        "’" => [''],
        'ь' => [''],
        'Ь' => [''],
    ];

    private $lettersCombination = [
        'Зг' => ['Zgh'],
        'зг' => ['zgh'],
    ];

    /**
     * @param string $symbol
     *
     * @return bool
     */
    public function isLetter(string $symbol): bool
    {
        return isset($this->letters[$symbol]);
    }

    /**
     * @param string $symbol
     * @param bool   $isWordBegin
     *
     * @return string
     */
    public function getLetter(string $symbol, bool $isWordBegin): string
    {
        $res = '';
        if (isset($this->letters[$symbol])) {
            if (false === $isWordBegin && isset($this->letters[$symbol][1])) {
                $res = $this->letters[$symbol][1];
            } else {
                $res = $this->letters[$symbol][0];
            }
        }

        return $res;
    }

    /**
     * @param string $symbols
     *
     * @return bool
     */
    public function isLetterCombination(string $symbols): bool
    {
        return isset($this->lettersCombination[$symbols]);
    }

    /**
     * @param string $symbols
     *
     * @return string
     */
    public function getLettersCombination(string $symbols): string
    {
        $res = '';
        if (isset($this->lettersCombination[$symbols])) {
            $res = $this->lettersCombination[$symbols][0];
        }

        return $res;
    }
}
