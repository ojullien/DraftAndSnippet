<?php
// ---------------------
// Register framework
// ---------------------
$aMap = [
    'Zend\Loader\ClassMapAutoloader' => [
        'zf2' => realpath(APPLICATION_PATH . DIRECTORY_SEPARATOR . 'vendor/zendframework/autoload_classmap.php')
    ],
];

// Use of classmap autoloader strategy
require_once realpath(APPLICATION_PATH . DIRECTORY_SEPARATOR . 'vendor/zendframework/zend-loader/src/AutoloaderFactory.php');
require_once realpath(APPLICATION_PATH . DIRECTORY_SEPARATOR . 'vendor/zendframework/zend-loader/src/ClassMapAutoloader.php');
Zend\Loader\AutoloaderFactory::factory($aMap);

if (! class_exists('Zend\Loader\AutoloaderFactory')) {
    throw new RuntimeException('Unable to load ZF2.');
}
