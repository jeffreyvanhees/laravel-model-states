<?php

namespace Spatie\ModelStates;

use Illuminate\Http\Request;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ModelStatesServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-model-states')
            ->hasConfigFile();
    }

    public function boot()
    {
        Request::macro('state', function ($key, State|string $stateClass) {
            return $stateClass::all()->get($this->input($key));
        });
    }
}
