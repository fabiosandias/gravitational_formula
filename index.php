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

foreach ($dinosaursP as $key => $dp) {
    $dinosaursP[$key]['speed'] =
        $gravitationalFormula->calculateSpeed($dp['STRIDE_LENGTH'], $dp['LEG_LENGTH']);
}

usort($dinosaursP, function ($a, $b) {
    return $a['speed'] - $b['speed'];
});

$file->writeFile($dinosaursP);

