<?php


namespace chungachanga\i18n;


class Config
{
    private static $instance;
    private $translationSourceDir;
    private $lang;

    public static function getInstance(): Config
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    private function __construct()
    {
    }

    public function getTranslationSourceDir()
    {
        return $this->translationSourceDir;
    }

    public function setTranslationSourceDir(string $translationSourceDir)
    {
        if ( ! isset($translationSourceDir) ) {
            throw new \InvalidArgumentException('Need set translation directory source');
        }
        $this->translationSourceDir = $translationSourceDir;
    }

    public function setLang(string $lang)
    {
        $this->lang = $lang;
    }

    public function getTranslationFileName()
    {
        return $this->translationSourceDir . '/' . $this->lang . '.php';
    }

}