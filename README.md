# BOATRACE SDK for PHP

[![Build Status](https://travis-ci.org/shimomo/boatrace-sdk-php.svg?branch=master)](https://travis-ci.org/shimomo/boatrace-sdk-php)
[![Coverage Status](https://coveralls.io/repos/github/shimomo/boatrace-sdk-php/badge.svg)](https://coveralls.io/github/shimomo/boatrace-sdk-php)
[![Latest Stable Version](https://poser.pugx.org/shimomo/boatrace-sdk-php/version)](https://packagist.org/packages/shimomo/boatrace-sdk-php)
[![Latest Unstable Version](https://poser.pugx.org/shimomo/boatrace-sdk-php/v/unstable)](//packagist.org/packages/shimomo/boatrace-sdk-php)
[![License](https://poser.pugx.org/shimomo/boatrace-sdk-php/license)](https://packagist.org/packages/shimomo/boatrace-sdk-php)

This SDK is for obtaining data of boatrace official website.

## Installation
```
$ composer require shimomo/boatrace-sdk-php
```

## Usage
```php
<?php

/**************************************************
 * BOATRACE SDK for PHPの利用準備
 **************************************************/

// ライブラリの読み込み
require __DIR__ . '/../vendor/autoload.php';

// インスタンスの生成
$boatrace = new \Boatrace\Client();



/**************************************************
 * 出走表データの取得
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
 * 結果データの取得
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



/**************************************************
 * データを取得してデータベースに登録
 **************************************************/

// データベースの設定
$config = [
    'driver'    => 'pgsql',
    'host'      => 'localhost',
    'database'  => 'boatrace',
    'username'  => 'postgres',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
];

// 2017年07月07日, 大村, 1R
$this->boatrace->setConfig($config);
$this->boatrace->storeRaceProgramInDatabase(20170707, 24, 1);

// 2017年07月07日, 大村, 1R
$this->boatrace->setConfig($config);
$this->boatrace->storeRaceResultInDatabase(20170707, 24, 1);
```

## Example
```
$ git clone https://github.com/shimomo/boatrace-sdk-php.git
$ cd boatrace-sdk-php
$ composer update
$ php examples/ClientExample.php
```

## Test
```
$ vendor/bin/paratest -p 10
```

## License
The BOATRACE SDK for PHP is open-sourced software licensed under the [MIT license](LICENSE).
