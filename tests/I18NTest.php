<?php


namespace abaranchik178\i18n\tests;


use abaranchik178\i18n\DictionaryFile;
use PHPUnit\Framework\TestCase;
use abaranchik178\i18n\I18N;

class I18NTest extends TestCase
{
    public function testT()
    {
        $dictionary = new DictionaryFile(__DIR__ . '/messages/ru.php');
        I18N::init($dictionary);

        $this->assertEquals('привет',  I18N::t('hello'));
        $this->assertEquals('пока',  I18N::t('bye'));
    }

    public function testFailTranslateString()
    {
        $dictionary = new DictionaryFile('not-existed-file.php');
        I18N::init($dictionary);

        $msg = 'That message should not change';
        $this->assertEquals($msg,  I18N::t($msg));
    }
}