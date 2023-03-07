<?php

namespace Tests;

use App\Time\Clock;
use PHPUnit\Framework\TestCase;

class ClockTest extends TestCase
{
    public function testClock()
    {
        $c = new Clock();

        $this->assertEquals(date('Y-m-d'), $c->now());
    }
}
