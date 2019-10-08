<?php


namespace simpleweb\i18n;


class DictionaryFile
{
    public function loadFromFileArray($dictionaryFileName)
    {
        $dictionary = include "$dictionaryFileName";
        if ( false === $dictionary ) {
            throw new \RuntimeException("Failed to include file $dictionary");
        }
        if ( ! is_array($dictionary) ) {
            throw new \RuntimeException("Translation file source $dictionary must return array");
        }
    }
}