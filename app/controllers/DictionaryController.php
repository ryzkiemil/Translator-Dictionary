<?php
class DictionaryController extends Controller
{

    public function index()
    {
        $data = [
            'title' => $this->translation->get('indonesian_dictionary'),
            'description' => 'Comprehensive Indonesian-English dictionary with definitions, examples, and pronunciation',
            'keywords' => 'indonesian dictionary, kamus indonesia, terjemahan kata, definisi bahasa indonesia'
        ];
        $this->view('dictionary/index', $data);
    }

    public function search($word = '')
    {
        $searchTerm = $word ?: ($_GET['q'] ?? '');

        if ($searchTerm) {
            $seo_title = "Meaning of \"$searchTerm\" - Indonesian Dictionary | TranslateNow";
            $seo_description = "Definition and examples for Indonesian word: $searchTerm. Learn pronunciation, usage, and translations.";
            $canonical_url = "https://yourdomain.com/dictionary/search?q=" . urlencode($searchTerm);
        } else {
            $seo_title = "Indonesian Dictionary - Search Words & Meanings | TranslateNow";
            $seo_description = "Comprehensive Indonesian-English dictionary with definitions, examples, and pronunciation guides.";
            $canonical_url = "https://yourdomain.com/dictionary";
        }

        $data = [
            'seo_title' => $seo_title,
            'seo_description' => $seo_description,
            'canonical_url' => $canonical_url,
            'searchTerm' => $searchTerm,
            'results' => $searchTerm ? $this->getDictionaryResults($searchTerm) : []
        ];

        $this->view('dictionary/search', $data);
    }

    private function getDictionaryResults($word)
    {
        $word = strtolower(trim($word));

        // Create KBBI service instance
        $kbbiService = new KBBIservice();
        $result = $kbbiService->search($word);

        if ($result['status'] === 200) {
            return $this->formatKBBIResult($result);
        }

        // If word not found, return empty array
        return [];
    }

    private function formatKBBIResult($apiResult)
    {
        $kbbiData = $apiResult['data'];
        $searchedWord = $apiResult['searched_word'];

        // Check if we have entries
        if (empty($kbbiData['entri'])) {
            return [];
        }

        $results = [];

        // Loop through all entries (some words have multiple entries)
        foreach ($kbbiData['entri'] as $entryIndex => $entry) {
            $formatted = [
                'word' => $searchedWord,
                'pronunciation' => $entry['nama'] ?? '',
                'partOfSpeech' => $this->extractPartOfSpeech($entry['makna'] ?? []),
                'definitions' => [],
                'synonyms' => [],
                'antonyms' => []
            ];

            // Extract definitions from all meanings in this entry
            if (!empty($entry['makna'])) {
                foreach ($entry['makna'] as $meaningIndex => $meaning) {
                    // Each meaning can have multiple submakna (definitions)
                    if (!empty($meaning['submakna'])) {
                        foreach ($meaning['submakna'] as $submaknaIndex => $submakna) {
                            $definitionNumber = count($formatted['definitions']) + 1;

                            $formatted['definitions'][] = [
                                'meaning' => $submakna,
                                'translation' => $this->translateDefinition($submakna),
                                'examples' => $meaning['contoh'] ?? []
                            ];
                        }
                    }
                }
            }

            // Only add this entry if it has definitions
            if (!empty($formatted['definitions'])) {
                $results[] = $formatted;
            }
        }

        return $results;
    }

    private function extractPartOfSpeech($meanings)
    {
        if (empty($meanings)) {
            return 'unknown';
        }

        $partsOfSpeech = [];

        foreach ($meanings as $meaning) {
            if (!empty($meaning['kelas'])) {
                foreach ($meaning['kelas'] as $kelas) {
                    if (!empty($kelas['kode'])) {
                        $posCode = $kelas['kode'];
                        // Map KBBI part of speech codes to English
                        $posMap = [
                            'n' => 'noun',
                            'v' => 'verb',
                            'a' => 'adjective',
                            'adv' => 'adverb',
                            'num' => 'numeral',
                            'p' => 'particle',
                            'pr' => 'preposition',
                            'pron' => 'pronoun',
                            'konj' => 'conjunction',
                            'interj' => 'interjection'
                        ];

                        $pos = $posMap[$posCode] ?? $kelas['nama'] ?? 'unknown';
                        if (!in_array($pos, $partsOfSpeech)) {
                            $partsOfSpeech[] = $pos;
                        }
                    }
                }
            }
        }

        return !empty($partsOfSpeech) ? implode(', ', $partsOfSpeech) : 'unknown';
    }

    private function translateDefinition($indonesianDefinition)
    {
        // For now, return empty - you can implement translation later
        // Or use a translation API to translate the definition to English
        return '';
    }

    private function notFound()
    {
        http_response_code(404);
        echo '404 - Not Found';
        exit;
    }
}
?>