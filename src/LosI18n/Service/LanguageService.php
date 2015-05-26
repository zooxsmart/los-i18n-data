<?php
namespace LosI18n\Service;

final class LanguageService
{

    private $language;

    public function getLanguage()
    {
        return $this->language;
    }

    public function setLanguage($language)
    {
        $this->language = (string) $language;
        return $this;
    }

    public function getAllLanguages($language = null)
    {
        if (null !== $language) {
            $this->setLanguage($language);
        } else {
            $language = $this->language;
        }
        $fileName = 'vendor/umpirsky/country-list/country/icu/'.$language.'/country.php';
        if (!file_exists($fileName)) {
            throw new \InvalidArgumentException("Língua $language não encontrada.");
        }
        return include $fileName;
    }
}