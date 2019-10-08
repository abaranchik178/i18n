<?php


namespace simpleweb\i18n;


class Config
{
    private $translationSourceDir;
    private $lang;

    public function __construct(string $translationSourceDir, string $lang)
    {
        $this->translationSourceDir = $translationSourceDir;
        $this->lang = $lang;

        $this->validate();
    }

    public function getTranslationSourceDir()
    {
        return $this->translationSourceDir;
    }

    public function validate()
    {
        if ( ! is_dir($this->translationSourceDir) ) {
            throw new \RuntimeException("Not found directory: $this->translationSourceDir");
        }
//        if ( ! file_exists( $this->getTranslationFileName() ) ) {
//            throw new \RuntimeException("Not found directory: $this->translationSourceDir");
//        }
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