<?php
class TranslationService
{
    private $provider;
    private $config;

    public function __construct($provider = null)
    {
        $this->provider = $provider ?: TRANSLATION_PROVIDER;
        $this->config = require_once '../app/config/api.php';
    }

    public function translate($text, $sourceLang, $targetLang)
    {
        if (empty(trim($text))) {
            return ['success' => false, 'error' => 'Text is empty'];
        }

        // Limit text length to prevent abuse
        if (strlen($text) > 5000) {
            return ['success' => false, 'error' => 'Text too long. Maximum 5000 characters allowed.'];
        }

        try {
            switch ($this->provider) {
                case 'google':
                    return $this->translateWithGoogle($text, $sourceLang, $targetLang);

                case 'mymemory':
                    return $this->translateWithMyMemory($text, $sourceLang, $targetLang);

                case 'libretranslate':
                    return $this->translateWithLibreTranslate($text, $sourceLang, $targetLang);

                default:
                    return $this->translateWithMyMemory($text, $sourceLang, $targetLang);
            }
        } catch (Exception $e) {
            return [
                'success' => false,
                'error' => 'Translation service temporarily unavailable',
                'debug' => $e->getMessage()
            ];
        }
    }

    private function translateWithMyMemory($text, $sourceLang, $targetLang)
    {
        $url = $this->config['translation']['providers']['mymemory']['url'];

        $params = [
            'q' => $text,
            'langpair' => $sourceLang . '|' . $targetLang,
            'de' => MYMEMORY_EMAIL, // Optional: your email for higher limits
            'ip' => $this->getClientIP() // Identify requests
        ];

        $url .= '?' . http_build_query($params);

        $response = $this->makeHttpRequest($url);

        if (!$response['success']) {
            return $response;
        }

        $data = json_decode($response['data'], true);

        if (isset($data['responseData']['translatedText'])) {
            return [
                'success' => true,
                'translatedText' => $data['responseData']['translatedText'],
                'provider' => 'MyMemory',
                'source' => $text
            ];
        } else {
            return [
                'success' => false,
                'error' => 'Translation failed: ' . ($data['responseDetails'] ?? 'Unknown error'),
                'provider' => 'MyMemory'
            ];
        }
    }

    private function translateWithGoogle($text, $sourceLang, $targetLang)
    {
        if (empty(GOOGLE_API_KEY)) {
            return ['success' => false, 'error' => 'Google Translate API key not configured'];
        }

        $url = $this->config['translation']['providers']['google']['url'];

        $data = [
            'q' => $text,
            'source' => $sourceLang,
            'target' => $targetLang,
            'format' => 'text'
        ];

        $headers = [
            'Content-Type: application/json',
            'X-Goog-Api-Key: ' . GOOGLE_API_KEY
        ];

        $response = $this->makeHttpRequest($url, 'POST', json_encode($data), $headers);

        if (!$response['success']) {
            return $response;
        }

        $data = json_decode($response['data'], true);

        if (isset($data['data']['translations'][0]['translatedText'])) {
            return [
                'success' => true,
                'translatedText' => $data['data']['translations'][0]['translatedText'],
                'provider' => 'Google',
                'source' => $text
            ];
        } else {
            return [
                'success' => false,
                'error' => 'Google Translate API error',
                'debug' => $data
            ];
        }
    }

    private function translateWithLibreTranslate($text, $sourceLang, $targetLang)
    {
        $url = $this->config['translation']['providers']['libretranslate']['url'];

        $data = [
            'q' => $text,
            'source' => $sourceLang,
            'target' => $targetLang,
            'format' => 'text'
        ];

        $headers = [
            'Content-Type: application/json'
        ];

        $response = $this->makeHttpRequest($url, 'POST', json_encode($data), $headers);

        if (!$response['success']) {
            return $response;
        }

        $data = json_decode($response['data'], true);

        if (isset($data['translatedText'])) {
            return [
                'success' => true,
                'translatedText' => $data['translatedText'],
                'provider' => 'LibreTranslate',
                'source' => $text
            ];
        } else {
            return [
                'success' => false,
                'error' => 'LibreTranslate API error',
                'debug' => $data
            ];
        }
    }

    private function makeHttpRequest($url, $method = 'GET', $data = null, $headers = [])
    {
        $ch = curl_init();

        curl_setopt_array($ch, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_USERAGENT => 'TranslateNow/1.0'
        ]);

        if ($method === 'POST') {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }

        if (!empty($headers)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);

        curl_close($ch);

        if ($response === false) {
            return [
                'success' => false,
                'error' => 'HTTP request failed: ' . $error
            ];
        }

        if ($httpCode !== 200) {
            return [
                'success' => false,
                'error' => 'HTTP error: ' . $httpCode,
                'data' => $response
            ];
        }

        return [
            'success' => true,
            'data' => $response,
            'http_code' => $httpCode
        ];
    }

    private function getClientIP()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            return $_SERVER['REMOTE_ADDR'];
        }
    }

    public function getSupportedLanguages()
    {
        return [
            'en' => 'English',
            'id' => 'Indonesian'
        ];
    }

    public function getProviderInfo()
    {
        return $this->config['translation']['providers'][$this->provider] ?? null;
    }
}
?>