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

    public function testConvert()
    {
        $this->assertEquals('Alushta', TransliteratorUkr::convert('Алушта'));
        $this->assertEquals('Andrii', TransliteratorUkr::convert('Андрій'));
        $this->assertEquals('Borshchahivka', TransliteratorUkr::convert('Борщагівка'));
        $this->assertEquals('Borysenko', TransliteratorUkr::convert('Борисенко'));
    }
}