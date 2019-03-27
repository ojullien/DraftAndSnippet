<?php
declare (strict_types = 1);

namespace DraftAndSnippet\current;

function isTrue($value) : bool
{
    return $value === true;
}

function isFalse($value) : bool
{
    return $value === false;
}

function isSame($expectedValue, $currentValue) : bool
{
    return $expectedValue === $currentValue;
}

function isEqual($expectedValue, $currentValue) : bool
{
    return $expectedValue == $currentValue;
}

function convertBoolToTxt($val) : string
{
    $sReturn = "FALSE";
    if ( $val )
    {
        $sReturn = "TRUE";
    }
    return $sReturn;
}
