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
        $transliterator = new TransliteratorUkr();
        $this->assertEquals('Alushta', $transliterator->convert('Алушта'));
        $this->assertEquals('Andrii', $transliterator->convert('Андрій'));
        $this->assertEquals('Borshchahivka', $transliterator->convert('Борщагівка'));
        $this->assertEquals('Borysenko', $transliterator->convert('Борисенко'));
    }
}