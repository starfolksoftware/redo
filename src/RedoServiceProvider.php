<?php

namespace StarfolkSoftware\Redo;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use StarfolkSoftware\Redo\Commands\InstallCommand;

class RedoServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('gauge')
            ->hasConfigFile()
            ->hasCommand(InstallCommand::class);

        if (Redo::$runsMigrations) {
            $package->hasMigration('create_redo_table');
        }
    }
}
