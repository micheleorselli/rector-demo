<?php

namespace App\Time;

class Clock
{
    public function now()
    {
        return date('Y-m-d');
    }
}