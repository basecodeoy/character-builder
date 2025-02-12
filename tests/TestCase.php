<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests;

use BaseCodeOy\CharacterBuilder\ServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

/**
 * @internal
 */
abstract class TestCase extends Orchestra
{
    #[\Override()]
    protected function getPackageProviders($app)
    {
        return [
            ServiceProvider::class,
        ];
    }
}
