<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Utils\Rector\UseAssertCountWhenPossible;

return static function (RectorConfig $rectorConfig): void {

    $rectorConfig->rule(UseAssertCountWhenPossible::class);
};