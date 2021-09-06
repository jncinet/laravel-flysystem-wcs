<?php

namespace Jncinet\LaravelFilesystem\Wcs;

use Illuminate\Support\ServiceProvider;
use Jncinet\Flysystem\Wcs\WcsAdapter;
use League\Flysystem\Config;
use League\Flysystem\Filesystem;

class WcsStorageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        app('filesystem')->extend('wcs', function ($app, $config) {
            $adapter = new WcsAdapter(
                $config['bucket']
            );

            return new Filesystem($adapter, new Config(['disable_asserts' => true]));
        });
    }

    /**
     * Register any application services.
     */
    public function register()
    {
    }
}
