<?php
// Load environment variables
if (file_exists('../.env')) {
    $env = parse_ini_file('../.env');
    foreach ($env as $key => $value) {
        putenv("$key=$value");
        $_ENV[$key] = $value;
    }
}

// Base URL configuration
define('BASE_URL', 'http://localhost/mywebsite');
define('DEFAULT_LANGUAGE', 'en');

// API Configuration
define('TRANSLATION_PROVIDER', getenv('TRANSLATION_PROVIDER') ?: 'mymemory');
define('GOOGLE_API_KEY', getenv('GOOGLE_TRANSLATE_API_KEY') ?: '');
define('MYMEMORY_EMAIL', getenv('MYMEMORY_EMAIL') ?: '');

// Database configuration (if needed later)
define('DB_HOST', 'localhost');
define('DB_NAME', 'mywebsite');
define('DB_USER', 'root');
define('DB_PASS', '');

define('APP_ROOT', dirname(dirname(__FILE__)));
?>