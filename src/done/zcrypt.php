<?php
// -------------------------------
// Defines application constants -
// -------------------------------
define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'development'));
define('APPLICATION_NAME', 'oju');
define('APPLICATION_VERSION', '2015.05.23');
define('APPLICATION_PATH', dirname(__DIR__));

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

// ------
// Code -
// ------
$sEncryptionKey = "encryption key.encryption key.encryption key.encryption key.encryption key.encryption key.encryption key.encryption key";
$blockCipher = Zend\Crypt\BlockCipher::factory('mcrypt', ['algo' => 'aes']);
$blockCipher->setBinaryOutput(false);
/*
$sData = '1234567890123456';
$blockCipher->setKey($sEncryptionKey);
$result = $blockCipher->encrypt($sData);
$length = strlen($result);
echo "Encrypted text: $result \n";
echo "Encrypted text length: $length \n";
$sDe = $blockCipher->decrypt($result);
echo "Decrypted text: $sDe \n";
 */
//$jsonHst = utf8_encode(str_pad('', 255 , "H"));
//$jsonPrt = 12345;
//$jsonUsr = utf8_encode(str_pad('', 50 , "�"));
//$jsonPwd = utf8_encode(str_pad('', 64 , "�"));
$jsonArray = [
    'host' => str_pad('', 110, "h"),
    'port' => '12345',
    'user' => str_pad('', 16, "u"),
    'pass' => str_pad('', 41, "p"),
];
$sData = json_encode($jsonArray);
if (false === $sData) {
    echo "json_last_error: " + json_last_error() + "\n";
}


$blockCipher->setKey($sEncryptionKey);
$result = $blockCipher->encrypt($sData);
$length = mb_strlen($result);
$lengthdata = mb_strlen($sData);
echo "Raw text: $sData \n";
echo "Raw text length: $lengthdata \n";
echo "Encrypted text: $result \n";
echo "Encrypted text length: $length \n";
$sDe = $blockCipher->decrypt($result);
echo "Decrypted text: $sDe \n";
$jsondecode = json_decode($sDe);
if (false === $jsondecode) {
    echo "json_last_error: " + json_last_error() + "\n";
}

$handle = fopen('d:\temp\aes.txt', "wb");
fwrite($handle, $result);
fwrite($handle, PHP_EOL);
fwrite($handle, print_r($jsonArray, true));
fwrite($handle, PHP_EOL);
fwrite($handle, print_r($jsondecode, true));
fclose($handle);

/**
$bcrypt = new Zend\Crypt\Password\Bcrypt();
$result = $bcrypt->create($sData);
$length = mb_strlen($result);
echo "Encrypted text: $result \n";
echo "Encrypted text length: $length \n";
 */

/**
$result2 = bin2hex($result);
$length2 = strlen($result2);
echo "Encrypted text: $result2 \n";
echo "Encrypted text length: $length2 \n";
$result3 = dechex(bindec($result));
$length3 = strlen($result3);
echo "Encrypted text: $result3 \n";
echo "Encrypted text length: $length3 \n";
 **/
