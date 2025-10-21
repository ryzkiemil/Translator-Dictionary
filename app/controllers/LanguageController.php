<?php
class LanguageController extends Controller
{

    public function switch($language)
    {
        if (in_array($language, ['en', 'id'])) {
            $this->translation->setLanguage($language);
        }

        // Redirect back to previous page or home
        $redirectUrl = $_SERVER['HTTP_REFERER'] ?? '/';
        header('Location: ' . $redirectUrl);
        exit;
    }
}
?>