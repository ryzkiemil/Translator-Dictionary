<?php
// Start session
session_start();

// Load configuration
require_once "../app/config/config.php";

// Load core classes
require_once '../app/core/Router.php';
require_once '../app/core/Controller.php';
require_once '../app/core/Translation.php';
require_once '../app/core/TranslationService.php'; // Add this line

// load service
require_once '../app/services/KBBIservice.php'; // Add this line

// Initialize router
$router = new Router();

// Define routes
$router->addRoute('', 'HomeController', 'index');
$router->addRoute('home', 'HomeController', 'index');

// Page routes
$router->addRoute('contact', 'PageController', 'contact');
$router->addRoute('terms', 'PageController', 'terms');
$router->addRoute('privacy', 'PageController', 'privacy');
$router->addRoute('about', 'PageController', 'about');
$router->addRoute('services', 'PageController', 'services');
$router->addRoute('cookies', 'PageController', 'cookies');
$router->addRoute('disclaimer', 'PageController', 'disclaimer');

// Translation routes
$router->addRoute('translate', 'TranslationController', 'index');
$router->addRoute('translate/process', 'TranslationController', 'process');
$router->addRoute('dictionary', 'TranslationController', 'dictionary');
$router->addRoute('api/translate', 'TranslationController', 'apiTranslate');

// Dictionary routes
$router->addRoute('dictionary', 'DictionaryController', 'index');
$router->addRoute('dictionary/search', 'DictionaryController', 'search');
$router->addRoute('dictionary/search/:word', 'DictionaryController', 'search');
$router->addRoute('api/dictionary/search', 'DictionaryController', 'apiSearch');

// Language switch route
$router->addRoute('language/switch/:language', 'LanguageController', 'switch');

// Dispatch the request
$router->dispatch();
?>