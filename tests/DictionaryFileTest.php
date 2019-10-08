<?php


namespace abaranchik178\i18n\tests;

use PHPUnit\Framework\TestCase;
use abaranchik178\i18n\DictionaryFile;


class DictionaryFileTest extends TestCase
{
    public function testTranslateString()
    {
        $dictionary = new DictionaryFile(__DIR__ . '/messages/ru.php');
        $this->assertEquals('привет',  $dictionary->translateText('hello'));
        $this->assertEquals('пока',  $dictionary->translateText('bye'));
    }
}