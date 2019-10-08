<?php


namespace abaranchik178\i18n;

use abaranchik178\i18n\exceptions\Exception;

class I18N
{
    private static $instance;
    private static $dictionary;
    private static $initialized = false;

    public static function init(Dictionary $dictionary)
    {
        static::setDictionary($dictionary);
        static::$initialized = true;
    }

    public static function t($message)
    {
        try {
            if (!static::$initialized) {
                throw new Exception(__CLASS__ . 'has not been initialized');
            }
            if (is_string($message)) {
                return static::translateText($message);
            } else {
                throw new Exception('So far, ' . __CLASS__ . ' can only translate strings.');
            }
        } catch (Exception $e) {
            //fixme add logger
            error_log($e->getMessage() . ' ' . $e->getTraceAsString());
            return $message;
        }
    }

    public static function setDictionary(Dictionary $dictionary)
    {
        static::$dictionary = $dictionary;
    }

    private static function translateText(string $text): string
    {
        return static::$dictionary->translateText($text);
    }

}