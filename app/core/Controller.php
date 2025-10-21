<?php
class Controller
{
    protected $translation;

    public function __construct()
    {
        // Start session if not already started
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Initialize translation
        $language = isset($_SESSION['language']) ? $_SESSION['language'] : 'en';
        $this->translation = new Translation($language);
    }

    public function view($view, $data = [])
    {
        // Make translation available to all views
        $trans = $this->translation;

        // Extract data array to variables
        extract($data);

        require_once '../app/views/layouts/header.php';
        require_once '../app/views/' . $view . '.php';
        require_once '../app/views/layouts/footer.php';
    }
}
?>