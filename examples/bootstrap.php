<?php

require __DIR__.'/../vendor/autoload.php';

$configs = require __DIR__.'/config.php';

use Vebo\Shasha\Configration as Config;
use Vebo\Shasha\Shasha;

$shasha = new Shasha($configs);

$config = new Config($configs);
