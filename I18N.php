<?php


namespace chch;

class I18N
{
    private $config;
    private $translationFileContent;
    public function __construct(Config $config)
    {
        $this->config = $config;

        $translationFileName = $this->config->getTranslationFileName();
        if ( ! file_exists($translationFileName) ) {
            throw new \RuntimeException("File $translationFileName not found");
        }

        $translationFileContent = include "$translationFileName";
        if ( false === $translationFileContent ) {
            throw new \RuntimeException("Failed to include file $translationFileName");
        }
        if ( ! is_array($translationFileContent) ) {
            throw new \RuntimeException("Translation file source $translationFileName must return array");
        }
        $this->translationFileContent = $translationFileContent;
    }

    private function translateString(string $message)
    {
        if ( isset($this->translationFileContent[$message]) ) {
            return $this->translationFileContent[$message];
        }
        //todo log
        return $message;
    }

    public function t($message)
    {

        return $this->translateString($message);
    }
}