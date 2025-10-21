<?php
class TranslationController extends Controller
{
    private $translationService;

    public function __construct()
    {
        parent::__construct();
        $this->translationService = new TranslationService();
    }

    public function index()
    {
        $data = [
            'title' => $this->translation->get('translation_tool'),
            'description' => 'Translate text between English and Indonesian instantly'
        ];
        $this->view('translation/index', $data);
    }

    public function process()
    {
        // Handle form submission for translation
        if ($_POST) {
            $text = $_POST['text'] ?? '';
            $direction = $_POST['direction'] ?? 'en-id';

            // Basic validation
            if (empty(trim($text))) {
                $result = [
                    'success' => false,
                    'error' => 'Please enter text to translate'
                ];
            } else {
                // Parse direction (en-id -> source='en', target='id')
                list($sourceLang, $targetLang) = explode('-', $direction);

                // Process translation using the service
                $translationResult = $this->translationService->translate($text, $sourceLang, $targetLang);

                $result = [
                    'success' => $translationResult['success'],
                    'original' => $text,
                    'translated' => $translationResult['success'] ? $translationResult['translatedText'] : '',
                    'direction' => $direction,
                    'provider' => $translationResult['provider'] ?? 'Unknown',
                    'error' => $translationResult['error'] ?? null
                ];
            }

            // If it's an AJAX request, return JSON
            if ($this->isAjaxRequest()) {
                header('Content-Type: application/json');
                echo json_encode($result);
                exit;
            }

            // For regular form submission, pass data to view
            $data = [
                'title' => 'Translation Result',
                'result' => $result
            ];
            $this->view('translation/result', $data);
        } else {
            // Redirect to translation page if no POST data
            header('Location: /translate');
            exit;
        }
    }

    public function dictionary()
    {
        $data = [
            'title' => $this->translation->get('dictionary'),
            'description' => 'English-Indonesian dictionary with definitions and examples'
        ];
        $this->view('translation/dictionary', $data);
    }

    public function apiTranslate()
    {
        // API endpoint for AJAX translation
        if ($this->isAjaxRequest()) {
            $text = $_POST['text'] ?? '';
            $direction = $_POST['direction'] ?? 'en-id';

            if (empty(trim($text))) {
                $this->jsonResponse(false, 'Please enter text to translate');
                return;
            }

            // Parse direction
            list($sourceLang, $targetLang) = explode('-', $direction);

            // Process translation
            $translationResult = $this->translationService->translate($text, $sourceLang, $targetLang);

            if ($translationResult['success']) {
                $this->jsonResponse(true, '', [
                    'translatedText' => $translationResult['translatedText'],
                    'direction' => $direction,
                    'provider' => $translationResult['provider'] ?? 'Unknown'
                ]);
            } else {
                $this->jsonResponse(false, $translationResult['error']);
            }
        } else {
            $this->notFound();
        }
    }

    private function jsonResponse($success, $message = '', $data = [])
    {
        header('Content-Type: application/json');
        $response = [
            'success' => $success,
            'message' => $message
        ];

        if ($success && !empty($data)) {
            $response['data'] = $data;
        }

        echo json_encode($response);
        exit;
    }

    private function isAjaxRequest()
    {
        return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
            strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
    }

    private function notFound()
    {
        http_response_code(404);
        echo '404 - Not Found';
        exit;
    }
}
?>