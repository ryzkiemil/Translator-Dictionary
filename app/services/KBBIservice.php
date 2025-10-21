<?php
class KBBIservice
{
    private $base_url = "https://raw.githubusercontent.com/hanjoyo/kbbi/master";

    public function search($word)
    {
        // Clean and validate input
        $word = strtolower(trim($word));
        if (empty($word)) {
            return ['error' => 'Kata tidak boleh kosong', 'status' => 400];
        }

        // Get first letter for folder structure
        $first_letter = $word[0];

        // Build URL
        $url = $this->base_url . "/" . $first_letter . "/" . $word . ".json";

        return $this->fetchWordData($url, $word);
    }

    private function fetchWordData($url, $word)
    {
        // Use cURL for better error handling
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
            CURLOPT_SSL_VERIFYPEER => false
        ]);

        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($http_code === 404) {
            return [
                'status' => 404,
                'error' => 'Kata "' . $word . '" tidak ditemukan dalam KBBI'
            ];
        }

        if ($http_code !== 200 || !$response) {
            return [
                'status' => 500,
                'error' => 'Terjadi kesalahan saat mengambil data dari KBBI'
            ];
        }

        $data = json_decode($response, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return [
                'status' => 500,
                'error' => 'Format data tidak valid'
            ];
        }

        return [
            'status' => 200,
            'data' => $data,
            'searched_word' => $word // Pass the original searched word
        ];
    }
}
?>