<?php

namespace Tests\Unit;

use Tests\TestCase;;
use App\Components\Math\Facades\Math;

class MathTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Math::setScale(8);
    }

    public function test_percent(): void
    {
        $this->assertEquals(Math::percent('0.55544', 45),'0.24994800');
    }

    public function test_add_percent(): void
    {
        $this->assertEquals(Math::addPercent('0.55544', 45),'0.80538800');
    }

    public function test_sub_percent(): void
    {
        $this->assertEquals(Math::subPercent('0.55544', 45),'0.30549200');
    }

    public function test_mul(): void
    {
        $this->assertEquals(Math::mul('0.55544', '0.98654512'),'0.54796662');
    }

    public function test_sum(): void
    {
        $this->assertEquals(Math::sum('0.55544', '0.98654512'),'1.54198512');
    }

    public function test_sub(): void
    {
        $this->assertEquals(Math::sub('0.55544', '0.98654512'),'-0.43110512');
        $this->assertEquals(Math::sub('0.98654512', '0.55544'),'0.43110512');
    }

    public function test_div(): void
    {
        $this->assertEquals(Math::div('0.55544', '0.98654512'),'0.56301530');
    }

    public function test_delta(): void
    {
        $this->assertEquals(Math::delta('0.98654512', '0.55544'),'0.43110512');
    }

    public function test_part_percent(): void
    {
        $this->assertEquals(Math::partPercent('0.98654512', '0.55544'),'77.61506553');
    }

    public function test_min_max(): void
    {
        [$min, $max] = Math::minMax('0.98654512', '0.55544');
        $this->assertEquals($min,'0.55544');
        $this->assertEquals($max,'0.98654512');
    }
}
