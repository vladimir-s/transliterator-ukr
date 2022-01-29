# Transliterator for Ukrainian language

## Transliteration rules

The transliteration rules correspond to
Resolution of the Cabinet of Ministers of Ukraine dated January 27, 2010 N 55
Edition of 01/12/2016 
https://zakon.rada.gov.ua/laws/show/55-2010-%D0%BF#Text

## Правила транслитерации

Правила транислитерации соответствуют
Постановлению Кабинета Министров Украины от 27 января 2010 г. N 55
Редакция от 12.01.2016
https://zakon.rada.gov.ua/laws/show/55-2010-%D0%BF#Text

## Правила транслітерації

Правила транслітерації відповідають
Постанові Кабінету Міністрів України від 27 січня 2010 р. N 55
"Про впорядкування транслітерації українського алфавіту латиницею"
Редакція від 12.01.2016
https://zakon.rada.gov.ua/laws/show/55-2010-%D0%BF#Text

## Requirements

 - PHP >= 7.3

## Installation

The easiest way to install transliterator-ukr is by using Composer:

```
$ composer require vladimir-s/transliterator-ukr
```

## Basic Usage

```
$text = '';

$transliterator = new TransliteratorUkr();
$translit = $transliterator->convert('text');
```

## Development

Run PHP-CS-Fixer

```
$ ./vendor/bin/php-cs-fixer fix src
```

Run Psalm

```
$ ./vendor/bin/psalm
```

Run tests

```
$ ./vendor/bin/phpunit tests/
or
$ composer test
```