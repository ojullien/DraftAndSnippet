<?php
// -------------------------------
// Defines application constants -
// -------------------------------
define(
    'APPLICATION_ENV',
    (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'development')
);
define(
    'APPLICATION_NAME',
    'oju'
);
define(
    'APPLICATION_VERSION',
    '2015.05.23'
);
define(
    'APPLICATION_PATH',
    dirname(__DIR__)
);
define(
    'SSL_PATH',
    realpath('D:\SSL')
);

// ---------------------
// Register frameworks -
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

function formatException($pException)
{
    return 'Exception: ' . get_class($pException) . ':' . $pException->getCode() . PHP_EOL
        . '   File: ' . $pException->getFile() . ':' . $pException->getLine() . PHP_EOL
        . '   Message: ' . $pException->getMessage() . PHP_EOL
        . '   Stack trace: ' . PHP_EOL
        . $pException->getTraceAsString() . PHP_EOL;
}
//
$rows = ['a' => 1];
$a = array_intersect_key(
    $rows,
    array_flip([])
);
var_dump($a);
exit();


$credentials = [
//
// Credentials
    'super' => [
        'username' => 'xxx',
        'password' => 'xxx'
    ],
    'admin' => [
        'username' => 'xxx',
        'password' => 'xxx'
    ],
    'console' => [
        'username' => 'xxx',
        'password' => 'xxx'
    ],
    'test' => [
        'username' => 'xxx',
        'password' => 'xxx'
    ]
];

$conf = [
    'driver' => 'Pdo_Mysql',
    'hostname' => '192.168.33.91',
    'port' => '3306',
    'charset' => 'UTF8',
    'driver_options' => [
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_PERSISTENT => true,
        \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'',
        \PDO::MYSQL_ATTR_SSL_KEY => realpath(\SSL_PATH . '/jessie/clientkey.pem'),
        \PDO::MYSQL_ATTR_SSL_CERT => realpath(\SSL_PATH . '/jessie/clientcert.pem'),
        \PDO::MYSQL_ATTR_SSL_CA => realpath(\SSL_PATH . '/jessie/cacert.pem')
    ]
];

$sDSN = 'mysql:dbname=pbrDdb;host=192.168.33.91;port=3306;charset=UTF8';

$credential = &$credentials['console'];

try {
    $pdo = new \PDO(
        $sDSN,
        $credential['username'],
        $credential['password'],
        $conf['driver_options']
    );
} catch (\PDOException $exc) {
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
    echo 'finally';
}


$pdo = null;
