<?php
class HomeController extends Controller
{
    private $translationService;

    public function __construct()
    {
        parent::__construct();
        $this->translationService = new TranslationService();
    }

    public function index()
    {
        $providerInfo = $this->translationService->getProviderInfo();

        $data = [
            'title' => $this->translation->get('home'),
            'description' => 'Free English-Indonesian translation service - Fast, accurate, and easy to use',
            'provider' => $providerInfo['name'] ?? 'Translation Service',
            'is_free' => $providerInfo['free'] ?? true
        ];
        $this->view('home/index', $data);
    }
}
?>