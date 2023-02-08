<?php

declare(strict_types=1);

namespace PreemStudio\CharacterBuilder;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class CharacterBuilderServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-character-builder')
            ->hasConfigFile('laravel-character-builder');
    }
}
