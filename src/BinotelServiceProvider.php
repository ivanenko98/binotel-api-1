<?php

namespace Sashalenz\Binotel;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class BinotelServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('binotel-api')
            ->hasConfigFile()
            ->hasMigration('create_binotel_api_table');
    }
}
