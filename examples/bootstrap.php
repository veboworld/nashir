<?php

require __DIR__.'/../vendor/autoload.php';

$configs = require __DIR__.'/config.php';

use Playgon\Nashir\Configration as Config;
use Playgon\Nashir\Nashir;

$nashir = new Nashir($configs);

$config = new Config($configs);