<?php
namespace Vebo\Shasha;

use Vebo\Shasha\Contracts\ShashaInterface;

class Shashau implements ShashaInterface
{
    protected $config = [];

    /**
     * The registered custom services creators.
     *
     * @var array
     */
    protected $customCreators = [];

    /**
     * The array of created "services".
     *
     * @var array
     */
    protected $services = [];

    public function __construct(array $config)
    {
        if($config) {
            $this->setConfig($config);
        }
    }

    public function getConfig()
    {
        return $this->config;
    }

    public function setConfig($config)
    {
        $this->config = new Configration( 
$config);

        return $this;
    }

    public function tmdb()
    {
        //return new 
    }

    /**
     * Dynamically call the default driver instance.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return $this->provider()->{$method}(...$parameters);
    }
}