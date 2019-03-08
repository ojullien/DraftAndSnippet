<?php
declare (strict_types = 1);
// --------------------------------
// Defines application constants
// --------------------------------
define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'dev'));
define('APPLICATION_NAME', 'json');
define('APPLICATION_VERSION', '2018.09.22');
define('APPLICATION_PATH', dirname(__DIR__));

// --------------------------------
// Includes
// --------------------------------
require_once(APPLICATION_PATH . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'functions.inc.php');

// ---------------------
// variables
// ---------------------
$sSourceFile = APPLICATION_PATH . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'json' . DIRECTORY_SEPARATOR . 'googlecharts.json';
$sDestinationPath = APPLICATION_PATH . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR;

// ---------------------
// Main
// ---------------------

try {
    // Reads entire file into a string
    $sSourceContents = file_get_contents($sSourceFile);
    if (false === $sSourceContents) {
        echo 'ERROR : file_get_contents("' . sSourceFile . '")' . PHP_EOL;
        die();
    }

    // Encodes an ISO-8859-1 string to UTF-8
    $sSource = utf8_encode($sSourceContents);
    $sJson = json_decode($sSource);
    $aJson = json_decode($sSource, true);

    // Write to file
    $handle = fopen($sDestinationPath . '01.txt', 'wb');
    fwrite($handle, print_r($sJson, true));
    fclose($handle);

    // Write to file
    $handle = fopen($sDestinationPath . '02.php', 'wb');
    fwrite($handle, print_r($aJson, true));
    fclose($handle);

    // Write to file
    $handle = fopen($sDestinationPath . '03.json', 'wb');
    fwrite($handle, json_encode($sJson));
    fclose($handle);

    // Write to file
    $handle = fopen($sDestinationPath . '04.json', 'wb');
    fwrite($handle, json_encode($aJson));
    fclose($handle);
} catch (Exception $exc) {
    // Current exception
    echo formatException($exc) . PHP_EOL;

    // Previous exception
    $e = $exc->getPrevious();
    if ($e) {
        while ($e) {
            echo formatException($e) . PHP_EOL;
            $e = $e->getPrevious();
        }
    }
} finally {
    echo PHP_EOL . json_last_error_msg() . PHP_EOL;
}
