<?php
/**
 * @author Marco Troisi
 * @created 03.04.15
 */

require 'vendor/autoload.php';

$f3 = Base::instance();

/**
 * Mongo Connection
 */
$m = new MongoClient();
$db = $m->selectDB('microtranslator');

/**
 * Translation Service
 */
$translationService = new \MicroTranslator\Service\Translation(new \MicroTranslator\Repository\Translation($db));

/**
 * Routes
 */

// Home
$f3->route('GET /',
    function() {
        echo 'Hello, world!';
    }
);

// Gets All Available Locales
$f3->route('GET /locale',
    function() use ($translationService) {
        $localeController = new \MicroTranslator\Controller\LocaleController($translationService);
        return $localeController->showAllAvailable();
    }
);

// Gets All Terms for a specific Locale

// Counts All Terms for a specific Locale

// Gets a Term for a specific Locale

// Gets Untranslated Terms for a specific Locale

// Counts Untranslated Terms for a specific Locale

/**
 * Run F3 Application
 */
$f3->run();