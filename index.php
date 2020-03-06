<?php

use Dinosaur\File;

include_once 'class/Gravitational_formula.php';
include_once 'class/File.php';

define('METER_PER_SECOND', 9.8);

$gravitationalFormula = new Gravitational_formula(METER_PER_SECOND);

$file = new File();

$f1 = $file->fileOpen("1");
$f2 = $file->fileOpen("2");

$dinosaursP = $file->filterAndMarge($f1, $f2);
//print_r($dinosaursP);
foreach ($dinosaursP as $key => $dp) {
        $dinosaursP[$key]['speed'] = $gravitationalFormula->calculateSpeed($dp);
}

usort($dinosaursP, function ($a, $b) {
    return $b['speed'] - $a['speed'];
});

print_r($dinosaursP);
//print_r(((1.4 / 1.2) - 1) * sqrt(1.2 * pow(9.8, 2)));
$file->writeFile($dinosaursP);

