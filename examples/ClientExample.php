<?php

require __DIR__ . '/../vendor/autoload.php';

$boatrace = new \Boatrace\Client();

/**************************************************
 * 出走表のデータを取得する.
 **************************************************/

// 2017年07月07日, 大村, 1R
$response = $boatrace->getRaceProgram(20170707, 24, 1);
var_dump($response);

// 2017年07月07日, 大村, 1R ~ 12R
$response = $boatrace->getRaceProgram(20170707, 24);
var_dump($response);

// 2017年07月07日, 桐生 ~ 大村, 1R ~ 12R
$response = $boatrace->getRaceProgram(20170707, 24);
var_dump($response);

/**************************************************
 * 結果のデータを取得する.
 **************************************************/

// 2017年07月07日, 大村, 1R
$response = $boatrace->getRaceResult(20170707, 24, 1);
var_dump($response);

// 2017年07月07日, 大村, 1R ~ 12R
$response = $boatrace->getRaceResult(20170707, 24);
var_dump($response);

// 2017年07月07日, 桐生 ~ 大村, 1R ~ 12R
$response = $boatrace->getRaceResult(20170707);
var_dump($response);
