<?php

namespace Playgon\Nashir\Tests\Unit;

use Playgon\Nashir\Tests\TestCase as BaseUnitTestCase;

class TestCase extends BaseUnitTestCase
{
    protected $config;

    public function setUp(): void
    {
        parent::setUp();
        $this->config = [
            'default' => $_ENV['SHASHA_PROVIDER'] ?? 'tmdb',
            'cache' => false,
            'providers' => [
                'tmdb' => [
                    'apikey' => $_ENV['TMDB_KEY'] ?? null,
                ],
            ],
        ];
    }
}