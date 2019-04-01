<?php
declare (strict_types = 1);


// --------------------------------
// Defines application constants
// --------------------------------
const APPLICATION = [ 'ENV' => 'dev', 'NAME' => 'exos', 'VERSION' => '2019.03.29', 'PATH' => __DIR__ ];

// --------------------------------
// Includes
// --------------------------------
require_once(APPLICATION["PATH"] . DIRECTORY_SEPARATOR . 'common.php');
require_once(APPLICATION["PATH"] . DIRECTORY_SEPARATOR . 'chapters' . DIRECTORY_SEPARATOR . 'three.php');

main();
