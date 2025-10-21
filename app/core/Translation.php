<?php
class Translation
{
    private $language;
    private $translations = [];

    public function __construct($language = 'en')
    {
        $this->language = $language;
        $this->loadTranslations();
    }

    public function loadTranslations()
    {
        $file = "../languages/{$this->language}.php";
        if (file_exists($file)) {
            $this->translations = require $file;
        } else {
            // Fallback to English if language file doesn't exist
            $this->translations = require "../languages/en.php";
        }
    }

    public function setLanguage($language)
    {
        $_SESSION['language'] = $language;
        $this->language = $language;
        $this->loadTranslations();
    }

    public function get($key)
    {
        return isset($this->translations[$key]) ? $this->translations[$key] : $key;
    }

    public function getCurrentLanguage()
    {
        return $this->language;
    }
}
?>