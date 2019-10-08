<?php


namespace abaranchik178\i18n;


use abaranchik178\i18n\exceptions\Exception;

class DictionaryFile extends Dictionary
{
    private $dictionaryFilesDir;
    private $dictionaryFileName;
    private $dictionaryCache;

    public function __construct(string $dictionaryFileName)
    {
        $this->setDictionaryFileName($dictionaryFileName);
        $this->dictionaryCache = $this->loadDictionaryFromFile();
    }

    public function translateText(string $text)
    {
        if ( isset($this->dictionaryCache[$text]) ) {
            return $this->dictionaryCache[$text];
        }
        //todo log
        return $text;
    }

    public function setDictionaryFileName(string $dictionaryFileName)
    {
        $this->checkDictionaryFile($dictionaryFileName);
        $this->dictionaryFileName = $dictionaryFileName;
    }

    private function loadDictionaryFromFile($dictionaryFileName)
    {
        return include $dictionaryFileName;
    }

    public function checkDictionaryFile(string $dictionaryFileName)
    {
        if ( ! file_exists($dictionaryFileName) ) {
            throw new Exception("Dictionary file is not exists: $dictionaryFileName");
        }
        $dictionary = $this->loadDictionaryFromFile($dictionaryFileName);
        if ( false === $dictionary ) {
            throw new \Exception("Failed to include file {$this->dictionaryFileName}");
        }
        if ( ! is_array($dictionary) ) {
            throw new \Exception("Dictionary file  {$this->dictionaryFileName} must return array");
        }
        foreach ($dictionary as $fieldName => $fieldValue) {
            $this->checkDictionaryFileField($fieldName, $fieldValue);
        }
    }

    private function checkDictionaryFileField($fieldName, $fieldValue)
    {
        if ( !is_string($fieldValue) ) {
            throw new Exception("Dictionary file field $fieldName must contain a string");
        }
    }
}