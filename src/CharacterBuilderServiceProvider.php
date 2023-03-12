<?php

declare(strict_types=1);

namespace PreemStudio\CharacterBuilder;

use PreemStudio\Jetpack\Package\AbstractServiceProvider;
use PreemStudio\Jetpack\Package\Package;

class CharacterBuilderServiceProvider extends AbstractServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-character-builder')
            ->hasConfigFile('laravel-character-builder');
    }
}
