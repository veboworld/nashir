<?php

namespace Playgon\Nashir;

use Closure;
use Illuminate\Support\Str;
use InvalidArgumentException;
use Playgon\Nashir\Contracts\NashirContract;
use Playgon\Nashir\Services\TmdbService;

class Nashir implements NashirContract
{
    /**
     * The configuration repository instance.
     *
     * @var \Illuminate\Contracts\Config\Repository
     */
    protected $config;

    /**
     * The registered custom service creators.
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

    /**
     * Create a new manager instance.
     *
     * @param  \Illuminate\Contracts\Container\Container  $container
     * @return void
     */
    public function __construct($config)
    {
        $this->config = new Configration($config);
    }

    /**
     * Get the default service name.
     *
     * @return string
     */
    public function getDefaultService()
    {
        return $this->config->get('default');
    }

    /**
     * Get a service instance.
     *
     * @param  string  $service
     * @throws \InvalidArgumentException
     * @return mixed
     *
     */
    public function service($service = null)
    {
        $service = $service ?: $this->getDefaultService();

        if (is_null($service)) {
            throw new InvalidArgumentException(sprintf(
                'Unable to resolve NULL service for [%s].',
                static::class
            ));
        }

        // If the given service has not been created before, we will create the instances
        // here and cache it so we can return it next time very quickly. If there is
        // already a service created by this name, we'll just return that instance.
        if (! isset($this->services[$service])) {
            $this->services[$service] = $this->createService($service);
        }

        return $this->services[$service];
    }

    /**
     * Create a new service instance.
     *
     * @param  string  $service
     * @throws \InvalidArgumentException
     * @return mixed
     *
     */
    protected function createService($name)
    {
        $config = $this->config->get('services.'.$name);

        // First, we will determine if a custom service creator exists for the given service and
        // if it does not we will check for a creator method for the service. Custom creator
        // callbacks allow developers to build their own "services" easily using Closures.
        if (isset($this->customCreators[$name])) {
            return $this->callCustomCreator($name);
        }
        $method = 'create'.Str::studly($name).'Service';

        if (method_exists($this, $method)) {
            return $this->$method($name, $config);
        }
        
        throw new InvalidArgumentException("Service [$name] not supported.");
    }

    /**
     * Call a custom service creator.
     *
     * @param  string  $service
     * @return mixed
     */
    protected function callCustomCreator($service)
    {
        return $this->customCreators[$service]($this->config);
    }

    /**
     * Register a custom service creator Closure.
     *
     * @param  string  $service
     * @param  \Closure  $callback
     * @return $this
     */
    public function extend($service, Closure $callback)
    {
        $this->customCreators[$service] = $callback;

        return $this;
    }

    /**
     * Get all of the created "services".
     *
     * @return array
     */
    public function getServices()
    {
        return $this->services;
    }

    public function createTmdbService($name, $config)
    {
        return new TmdbService(
            $name,
            $config
        );
    }

    /**
     * Dynamically call the default service instance.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return $this->service()->$method(...$parameters);
    }
}