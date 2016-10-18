<?php

namespace Modules\Gallery\Test;

use Orchestra\Testbench\TestCase as Orchestra;
use Modules\Gallery\Providers\GalleryServiceProvider;

abstract class TestCase extends Orchestra
{
    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            // maybe VainServiceProvider::class is necessary, too?
            GalleryServiceProvider::class,
        ];
    }
}