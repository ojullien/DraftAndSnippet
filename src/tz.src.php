<?php
// -------------------------------
// Defines application constants -
// -------------------------------
define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'development'));
define('APPLICATION_NAME', 'oju');
define('APPLICATION_VERSION', '2015.03.04');
define('APPLICATION_PATH', dirname(__DIR__));



function display(DateTime $pDateTime)
{
    var_dump($pDateTime->format('c'));
    var_dump($pDateTime);
}


$pDTZ_UTC = new DateTimeZone("UTC");
$pDateWinter = new DateTime("2015-04-14 15:26:36", $pDTZ_UTC);
$pDateSummer = new DateTime("2015-01-13 14:45:51", $pDTZ_UTC);
display($pDateWinter);
display($pDateSummer);
$pDTZ = new DateTimeZone("Europe/Brussels");
$pDateWinter->setTimezone($pDTZ);
$pDateSummer->setTimezone($pDTZ);
display($pDateWinter);
display($pDateSummer);
//var_dump($date->format('Y-m-d\TH:i:sP'));
//var_dump($date);
exit;

$date->setTimezone($newTZ);
echo $date->format('Y-m-d H:i:s');
exit;
/*

//
//$UTCObj = new DateTime("now", new DateTimeZone("UTC"));
//echo "Current UTC Time is: ". $UTCObj->format("F d, Y g:i a") . "<br />";
//exit();
//$UTCObj = DateTime::createFromFormat("j-M-Y g:i", "25-Apr-2014 8:25", new DateTimeZone("UTC"));
//echo "UTC Time is: ". $UTCObj->format("F d, Y g:i a") . "<br />";

// ------
// Code -
// ------
function format( $sTimezone, $iOffset )
{
    $sPrefix = $iOffset < 0 ? '-' : '+';
    $sFormatted = gmdate( 'H:i', abs($iOffset) );

    $sPretty_offset = "UTC${sPrefix}${sFormatted}";
    $sPretty_timezone = strtr(substr(strrchr($sTimezone, "/"), 1),'_',' ');
    return [
    'offset' => $iOffset,
    'timezone' => "(${sPretty_offset}) $sPretty_timezone" ];
}

function getOffsets( array $aTimezones  )
{
    $aReturn = [];
    $aOffsets = [];
    $pDT = new DateTime();

    // Extract offsets
    foreach( $aTimezones as $sTimezone )
    {
        $pTimezone = new DateTimeZone( $sTimezone );
        $aOffsets[$sTimezone] = $pTimezone->getOffset( $pDT );
        unset( $pTimezone );
    }
    unset( $pDT );

    // sort timezone by offset
    asort( $aOffsets );

    foreach( $aOffsets as $sTimezone => $iOffset )
    {
        $aReturn[$sTimezone] = format( $sTimezone, $iOffset );
    }

    return $aReturn;
}

$aRegions = [
        'Africa' => DateTimeZone::AFRICA,
        'America' => DateTimeZone::AMERICA,
        'Antarctica' => DateTimeZone::ANTARCTICA,
        'Asia' => DateTimeZone::ASIA,
        'Atlantic' => DateTimeZone::ATLANTIC,
        'Australia' => DateTimeZone::AUSTRALIA,
        'Europe' => DateTimeZone::EUROPE,
        'Indian' => DateTimeZone::INDIAN,
        'Pacific' => DateTimeZone::PACIFIC ];

// Get all timezones
$aList = [];
foreach( $aRegions as $sRegion => $iRegion )
{
    $aList[$sRegion] = getOffsets( DateTimeZone::listIdentifiers( $iRegion ) );
}

//var_dump($aList);
//exit;

//$handle = fopen('d:\temp\tz.php', 'wb');
//fwrite($handle, print_r($aList,true));
//fclose($handle);

//$handle = fopen('d:\temp\tz.html', 'wb');
//fwrite($handle, '<select>'.PHP_EOL);
foreach( $aList as $sRegion => $aTimezones )
{
//    fwrite($handle, '   <optgroup label="' . $sRegion . '">' . PHP_EOL);
    $length = 0;
    foreach( $aTimezones as $sTimezone => $aData )
    {
        $l = strlen($sTimezone);
        if( $l>$length)
        {
            $length = $l;
        }
//        fwrite($handle, '       <option value="' . $sTimezone . '">' . $aData['timezone'] . '</option>">' . PHP_EOL);
    }
//    fwrite($handle, '   </optgroup>'.PHP_EOL);
}
echo $length;
//fwrite($handle, '</select>'.PHP_EOL);
//fclose($handle);
//exit;
