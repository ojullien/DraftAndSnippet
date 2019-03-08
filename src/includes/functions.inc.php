<?php
// ------------------
// Usefull functions
// ------------------
function formatException($pException)
{
    return 'Exception: ' . get_class($pException) . ':' . $pException->getCode() . PHP_EOL
        . '   File: ' . $pException->getFile() . ':' . $pException->getLine() . PHP_EOL
        . '   Message: ' . $pException->getMessage() . PHP_EOL
        . '   Stack trace: ' . PHP_EOL
        . $pException->getTraceAsString() . PHP_EOL;
}
