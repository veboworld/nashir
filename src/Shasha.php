<?php
namespace Vebo\Shasha;

class Shasha
{

    protected $config = [];

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
}