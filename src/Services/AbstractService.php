<?php

namespace Vebo\Shasha\Services;

use Vebo\Shasha\Configration;
use Vebo\Shasha\Contracts\ServiceContract;

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
