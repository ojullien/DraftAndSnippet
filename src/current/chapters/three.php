<?php
declare (strict_types = 1);

function main()
{
    test_last();
}

function test_last()
{
    // Effectuer une suite de tirages de nombres aléatoires jusqu’à obtenir une suite composée d’un nombre pair suivi de deux nombres impairs.
    $tirages=[]

    do {

        $tirages[0]=rand(0,1000);
        $tirages[1]=rand(0,1000);
        $tirages[2]=rand(0,1000);

    } while ($tirages[0]%2==1 or $tirages[1]%2==1 or $tirages[2]%2==1 );
}

function test_03_02()
{
    // Écrire une expression conditionnelle utilisant les variables $age et $sexe dans une instruction if
    // pour sélectionner une personne de sexe féminin dont l’age est compris entre 21 et 40 ans et afficher
    // un message de bienvenue approprié.
    $age = 30;
    $sexe = 'f';
    if($sexe=='f' and $age<41 and $age>20 )
    {
        echo 'Hello', PHP_EOL;
    }
}

function test_03_01()
{
    // Rédiger une expression conditionnelle pour tester si un nombre est à la fois un multiple de 3 et de 5.
    $x=1245;
    if($x%3==0 AND $x%5==0)
    {
        echo "$x est multiple de 3 et de 5", PHP_EOL;
    }
    else
    {
        echo "$x n'est pas multiple de 3 et de 5", PHP_EOL;
    }
}
