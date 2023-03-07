<?php

namespace Tests\Services;

use App\Services\FooService;
use PHPUnit\Framework\TestCase;

class FooServiceTest extends TestCase
{

    public function testDoBar()
    {
        $service = new FooService();
        $data = $service->doBar();

        $this->assertEquals(2, count($data));
        $this->assertEquals([
            'foo' => 'some bar data',
            'bar' => 'some foo data',
        ], $data);
    }
}
