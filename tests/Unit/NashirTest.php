<?php

namespace Playgon\Nashir\Tests\Unit;

use Playgon\Nashir\Nashir;

class NashirTest extends TestCase
{
    protected $nashir;

    public function setUp(): void
    {
        parent::setUp();

        $this->nashir = new Nashir($this->config);
    }

    /**
     * @test
     */
    public function is_instance_of_shasha()
    {
        $this->assertInstanceOf('Playgon\Nashir\Nashir', $this->nashir);
    }
}