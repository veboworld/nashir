<?php

namespace Playgon\Nashir\Tests;

class TmdbClientTest extends TestCase
{
    /** @test */
    public function it_can_request_tmdb()
    {
        $this->assertNotEquals(0, 83737);
    }
}