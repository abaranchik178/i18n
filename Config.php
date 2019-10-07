<?php


namespace chch;


class Config
{
    private $translationSourceDir;
    private $lang;

    public function __construct(string $translationSourceDir, string $lang)
    {
        $this->setTranslationSourceDir($translationSourceDir);
        $this->lang = $lang;
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

    public function getTranslationFileName()
    {
        return $this->translationSourceDir . '/' . $this->lang;
    }
}