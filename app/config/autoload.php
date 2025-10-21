<?php
// Autoload classes
spl_autoload_register(function ($class_name) {
    $directories = [
        'controllers/',
        'models/',
        'services/',
        'views/'
    ];

    foreach ($directories as $directory) {
        $file = __DIR__ . '/../' . $directory . $class_name . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});
?>