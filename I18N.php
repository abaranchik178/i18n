<?php


namespace abaranchik178\i18n;

class I18N
{
    private static $instance;
    private static $config;
    private static $translationFileContent;

    public static function getInstance(): I18N
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    private function __construct()
    {
    }

    public static function setConfig(Config $config)
    {
        static::$config = $config;
        static::$translationFileContent = [];
        $translationFileName = static::$config->getTranslationFileName();
        if ( ! file_exists($translationFileName) ) {
//            throw new \RuntimeException("File $translationFileName not found");
            return static::$translationFileContent;
        }


        static::$translationFileContent = $translationFileContent;
    }

    private static function loadDictionary()
    {

    }

    private static function translateString(string $message)
    {
        if ( isset(static::$translationFileContent[$message]) ) {
            return static::$translationFileContent[$message];
        }
        //todo log
        return $message;
    }

    public static function t($message)
    {
        return static::translateString($message);
    }
}