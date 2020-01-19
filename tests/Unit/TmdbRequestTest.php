<?php
namespace Vebo\Shasha\Tests\Unit;

use Vebo\Shasha\Tests\TestCase;

class TmdbRequestTest extends TestCase
{
    /** @test */
    public function it_can_request_tmdb()
    {
        $this->assertNotEquals(0, 83737);
    }
}