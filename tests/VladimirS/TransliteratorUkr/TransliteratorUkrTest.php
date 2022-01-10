<?php

namespace Tests\VladimirS\TransliteratorUkr;

use PHPUnit\Framework\TestCase;
use VladimirS\TransliteratorUkr\TransliteratorUkr;

class TransliteratorUkrTest extends TestCase
{
    /*
    Проверить:
    https://github.com/Yoast/PHPUnit-Polyfills
    https://phpunit.de/supported-versions.html
    */

    private $transliterator;

    public function setUp(): void
    {
        $this->transliterator = new TransliteratorUkr();
        parent::setUp();
    }

    /**
     * @dataProvider textForTranslitProvider
     */
    public function testConvert(string $original, string $translit): void
    {
        $this->assertEquals($translit, $this->transliterator->convert($original));
    }

    public function textForTranslitProvider(): array
    {
        return [
            ['Алушта', 'Alushta'],
            ['Андрій', 'Andrii'],
            ['Борщагівка', 'Borshchahivka'],
            ['Борисенко', 'Borysenko'],
            ['Вінниця', 'Vinnytsia'],
            ['Володимир', 'Volodymyr'],
            ['Гадяч', 'Hadiach'],
            ['Богдан', 'Bohdan'],
            ['Згурський', 'Zghurskyi'],
            ['Ґалаґан', 'Galagan'],
            ['Ґорґани', 'Gorgany'],
            ['Донецьк', 'Donetsk'],
            ['Дмитро', 'Dmytro'],
            ['Рівне', 'Rivne'],
            ['Олег', 'Oleh'],
            ['Есмань', 'Esman'],
            ['Єнакієве', 'Yenakiieve'],
            ['Гаєвич', 'Haievych'],
            ['Короп\'є', 'Koropie'],
            ['Житомир', 'Zhytomyr'],
            ['Жанна', 'Zhanna'],
            ['Жежелів', 'Zhezheliv'],
            ['Закарпаття', 'Zakarpattia'],
            ['Казимирчук', 'Kazymyrchuk'],
            ['Медвин', 'Medvyn'],
            ['Михайленко', 'Mykhailenko'],
            ['Іванків', 'Ivankiv'],
            ['Іващенко', 'Ivashchenko'],
            ['Їжакевич', 'Yizhakevych'],
            ['Мар\'їне', 'Marine'],
            ['Йосипівка', 'Yosypivka'],
            ['Стрий', 'Stryi'],
            ['Олексій', 'Oleksii'],
            ['Київ', 'Kyiv'],
            ['Коваленко', 'Kovalenko'],
            ['Лебедин', 'Lebedyn'],
            ['Леонід', 'Leonid'],
            ['Миколаїв', 'Mykolaiv'],
            ['Маринич', 'Marynych'],
            ['Ніжин', 'Nizhyn'],
            ['Наталія', 'Nataliia'],
            ['Одеса', 'Odesa'],
            ['Онищенко', 'Onyshchenko'],
            ['Полтава', 'Poltava'],
            ['Петро', 'Petro'],
            ['Решетилівка', 'Reshetylivka'],
            ['Рибчинський', 'Rybchynskyi'],
            ['Суми', 'Sumy'],
            ['Соломія', 'Solomiia'],
            ['Тернопіль', 'Ternopil'],
            ['Троць', 'Trots'],
            ['Ужгород', 'Uzhhorod'],
            ['Уляна', 'Uliana'],
            ['Фастів', 'Fastiv'],
            ['Філіпчук', 'Filipchuk'],
            ['Харків', 'Kharkiv'],
            ['Христина', 'Khrystyna'],
            ['Біла Церква', 'Bila Tserkva'],
            ['Стеценко', 'Stetsenko'],
            ['Чернівці', 'Chernivtsi'],
            ['Шевченко', 'Shevchenko'],
            ['Шостка', 'Shostka'],
            ['Кишеньки', 'Kyshenky'],
            ['Щербухи', 'Shcherbukhy'],
            ['Гоща', 'Hoshcha'],
            ['Гаращенко', 'Harashchenko'],
            ['Юрій', 'Yurii'],
            ['Корюківка', 'Koriukivka'],
            ['Яготин', 'Yahotyn'],
            ['Ярошенко', 'Yaroshenko'],
            ['Знам\'янка', 'Znamianka'],
            ['Феодосія', 'Feodosiia'],
            ['Згорани', 'Zghorany'],
            ['Розгон', 'Rozghon'],
            ['тест 123', 'test 123'],
            ['тест 123ре', 'test 123re'],
        ];
    }
}