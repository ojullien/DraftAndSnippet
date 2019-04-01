<?php
declare (strict_types = 1);

function main()
{
    //test_02_01();
    //test_02_02();
    //test_02_03();
    test_02_07();
}

function test_02_07()
{
    $sFormat = '%s = %s [ %s ] type: %s' . PHP_EOL;
    // Donner la valeur booléenne des variables $a, $b, $c, $d, $e et $f :
    $a = "0";
    echo sprintf($sFormat, 'a', 'FALSE', convertBoolToTxt($a), gettype($a));
    $b = "TRUE";
    echo sprintf($sFormat, 'b', 'TRUE', convertBoolToTxt($b), gettype($b));
    $c = FALSE;
    echo sprintf($sFormat, 'c', 'FALSE', convertBoolToTxt($c), gettype($c));
    $d = ($a OR $b);
    echo sprintf($sFormat, 'd', 'TRUE', convertBoolToTxt($d), gettype($d));
    $e = ($a AND $c);
    echo sprintf($sFormat, 'e', 'FALSE', convertBoolToTxt($e), gettype($e));
    $f = ($a XOR $b);
    echo sprintf($sFormat, 'f', 'TRUE', convertBoolToTxt($f), gettype($f));

}

function test_02_06()
{
    $sFormat = '%s = %s [ %s ] type: %s' . PHP_EOL;
    //Donner la valeur des variables $x, $y, $z à la fin du script :
    $x = "7 personnes";
    $y = (integer) $x;
    $x = "9E3";
    $z = (double) $x;
    echo sprintf($sFormat, 'x', '9E3', $x, gettype($x));
    echo sprintf($sFormat, 'y', 7, $y, gettype($y));
    echo sprintf($sFormat, 'z', 9000.00, $z, gettype($z));
}

function test_02_05()
{
    $sFormat = '%s = %s [ %s ] type: %s' . PHP_EOL;

    //Donner la valeur de chacune des variables pendant et à la fin du script suivant et vérifier l’évolution du type de ces variables :
    $x = "PHP7";
    echo sprintf($sFormat, 'x', 'PHP7', $x, gettype($x));

    $a[0] = &$x;
    echo sprintf($sFormat, 'a[]', 'PHP7', $a[0], gettype($a[0]));

    $y = " 7e version de PHP";
    echo sprintf($sFormat, 'y', ' 7e version de PHP', $y, gettype($y));

    $z = (int)$y * 10;
    echo sprintf($sFormat, 'z', 7 * 10, $z, gettype($z));

    $x .= $y;
    echo sprintf($sFormat, 'x', 'PHP7 7e version de PHP', $x, gettype($x));

    $y = (int)$y * $z;
    echo sprintf($sFormat, 'y', 7 * 7 * 10, $y, gettype($y));

    $a[0] = "MySQL";
    echo sprintf($sFormat, 'a[0]', 'MySQL', $a[0], gettype($a[0]));
}

function test_02_04()
{
    //Déterminer le numéro de version de PHP, le nom du système d'exploitation de votre serveur ainsi que la langue du navigateur du poste client.
    echo \PHP_VERSION . PHP_EOL;
    echo \PHP_OS . PHP_EOL;
    if (array_key_exists('HTTP_ACCEPT_LANGUAGE',$_SERVER) )
    {
        echo $_SERVER['HTTP_ACCEPT_LANGUAGE'] . PHP_EOL;
    }
    else
    {
        echo 'run as cli' . PHP_EOL;
    }
}

function test_02_03()
{
    $x = "PostgreSQL";
    $y = "MySQL";
    $z = &$x;
    $x ="PHP 5";
    $y = &$x;

    $sFormat = '%s' . PHP_EOL;
    //echo sprintf($sFormat, $GLOBALS['x']);
    //echo sprintf($sFormat, $GLOBALS['y']);
    //echo sprintf($sFormat, $GLOBALS['z']);
    \print_r($GLOBALS);
}

function test_02_02()
{
    $x = "PostgreSQL";
    $y = "MySQL";
    $z = &$x;
    $x ="PHP 5";
    $y = &$x;

    $sFormat = '%s = %s [ %s ]' . PHP_EOL;
    echo sprintf($sFormat, 'x', 'PHP 5' , $x);
    echo sprintf($sFormat, 'y', 'PHP 5' , $y);
    echo sprintf($sFormat, 'z', 'PHP 5' , $z);
}

function test_02_01()
{
    // NotValid
    //mavar = 0;
    //$hotel4* = 0;

    // Valid
    $__élément1 = 0;
    $mavar = $var5 = $_mavar = $_5va = 0;
}
