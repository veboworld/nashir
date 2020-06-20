<?php

namespace Playgon\Nashir\Services;

use Playgon\Nashir\Configration;
use Playgon\Nashir\Contracts\ServiceContract;

abstract class AbstractService implements ServiceContract
{
    protected $base_url;

    protected $url;

    public function __construct($name, array $config)
    {
        $this->config = new Configration($config);
    }

    public function getBaseUrl()
    {
        return $this->base_url;
    }
}