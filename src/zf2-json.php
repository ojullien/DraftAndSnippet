<?php
// --------------------------------
// Defines application constants
// --------------------------------
define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'development'));
define('APPLICATION_NAME', 'json');
define('APPLICATION_VERSION', '2015.09.26');
define('APPLICATION_PATH', __DIR__);

// --------------------------------
// Includes
// --------------------------------
require_once(APPLICATION_PATH . '/includes/zf2.inc.php');
require_once(APPLICATION_PATH . '/includes/functions.inc.php');

// ---------------------
// Function
// ---------------------
/** */
function getAndFormatDate(array $aEvent)
{
    if (! isset($aEvent['startDate'])) {
        throw new \InvalidArgumentException('startDate key is missing.');
    }

    $aDate = explode(',', $aEvent['startDate']);

    if (count($aDate) !== 3) {
        throw new \InvalidArgumentException('date data are missing.');
    }

    return [
        'year' => $aDate[0],
        'month' => $aDate[1],
        'day' => $aDate[2]
    ];
}

/** */
function getAndFormatGroupe(array $aEvent)
{
    if (! isset($aEvent['headline'])) {
        throw new \InvalidArgumentException('headline key is missing.');
    }

    if (stristr($aEvent['headline'], 'France') === false) {
        $sReturn = 'International';
    } else {
        if (stristr($aEvent['headline'], 'Millennium Series') === false) {
            $sReturn = 'National';
        } else {
            $sReturn = 'International';
        }
    }

    return $sReturn;
}

/** */
function getAndFormatMedia(array $aEvent)
{
    if (! isset($aEvent['asset'])) {
        throw new \InvalidArgumentException('asset key is missing.');
    }

    $aMedia = &$aEvent['asset'];

    if (! isset($aMedia['media'])) {
        throw new \InvalidArgumentException('media key is missing.');
    }

    $aReturn = ['url' => $aMedia['media']];

    if (isset($aMedia['caption'])) {
        $aReturn['caption'] = $aMedia['caption'];
    }

    if (isset($aMedia['credit'])) {
        $aReturn['credit'] = $aMedia['credit'];
    }

    return $aReturn;
}

/** */
function getAndFormatText(array $aEvent)
{
    if (! isset($aEvent['headline'])) {
        throw new \InvalidArgumentException('headline key is missing.');
    }

    if (! isset($aEvent['text'])) {
        throw new \InvalidArgumentException('text key is missing.');
    }

    return [
        'headline' => $aEvent['headline'],
        'text' => $aEvent['text']
    ];
}

// ---------------------
// variables
// ---------------------
$sSourceFile = 'D:\Projects.Src\teammortifieurs\public\data\in.jsonp';
$sDestinationFile = 'D:\Projects.Src\teammortifieurs\public\data\out.json';

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

    // Decodes JSON
    $aSource = Zend\Json\Json::decode($sSource, Zend\Json\Json::TYPE_ARRAY);
    $aEvents = &$aSource['timeline']['date'];

    // Format
    $aDestination = [];

    foreach ($aEvents as $aEvent) {
        $aDestination[] = [
            "start_date" => getAndFormatDate($aEvent),
            "group" => getAndFormatGroupe($aEvent),
            "media" => getAndFormatMedia($aEvent),
            "text" => getAndFormatText($aEvent)
        ];
    }

    // Final
    $aFinal = [
        'scale' => 'human',
        'title' => [
            'media' => [
                'caption' => 'First logo (1993-2007)',
                'url' => 'http://e6510-teammortifieurs.com/data/timeline/999.png'
            ],
            'text' => [
                'headline' => 'Episode IV',
                'text' => 'Before this time Mortifieurs played paintball only for fun.<br />Then, we decided to play among the bests &hellip;'
            ]
        ],
        'events' => $aDestination
    ];

    // Encode to JSON
    $sJson = Zend\Json\Json::encode($aFinal);

    // Write to file
    $handle = fopen($sDestinationFile, 'wb');
    fwrite($handle, $sJson);
    //fwrite($handle, Zend\Json\Json::prettyPrint( $sJson, [ 'indent' => '    ' ] ) );
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
exit();
