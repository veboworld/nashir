<?php

namespace Vebo\Shasha;

use ArrayAccess;
use Illuminate\Support\Arr;

class Configration implements ArrayAccess
{
    protected $items = [];

    public function __construct(array $config)
    {
        $this->items = $config;
    }

    public function has($key)
    {
        return Arr::has($this->items, $key);
    }

    public function get($key, $default = null)
    {
        return Arr::get($this->items, $key, $default);
    }

    public function all()
    {
        return $this->items;
    }

    public function set($key, $value = null)
    {
        $keys = is_array($key) ? $key : [$key => $value];

        foreach ($keys as $key => $value) {
            Arr::set($this->items, $key, $value);
        }
    }

    public function offsetExists($key)
    {
        return $this->has($key);
    }

    public function offsetGet($key)
    {
        return $this->get($key);
    }

    public function offsetSet($key, $value)
    {
        $this->set($key, $value);
    }

    public function offsetUnset($key)
    {
        $this->set($key, null);
    }
}
