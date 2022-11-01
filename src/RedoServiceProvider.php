<?php

namespace StarfolkSoftware\Redo;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use StarfolkSoftware\Redo\Commands\RedoCommand;

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
            ->name('redo')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_redo_table')
            ->hasCommand(RedoCommand::class);
    }
}
