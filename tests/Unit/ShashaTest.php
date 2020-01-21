<?php
namespace Vebo\Shasha\Tests\Unit;

use Vebo\Shasha\Shasha;

class ShashaTest extends TestCase
{

    protected $shasha;

    public function setUp(): void
    {
        parent::setUp();

        $this->shasha = new Shasha($this->config);
    }

    /**
     * @test
     */
    public function is_instance_of_shasha()
    {
        $this->assertInstanceOf('Vebo\Shasha\Shasha', $this->shasha);
    }
}