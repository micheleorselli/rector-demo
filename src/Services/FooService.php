<?php

namespace App\Services;

use App\Time\Clock;

class FooService
{
    public function doFoo(): string
    {
        $clock = new Clock();

        return $clock->now();
    }

    public function doBar(): array
    {
        return [
            'foo' => 'some bar data',
            'bar' => 'some foo data',
        ];
    }
}