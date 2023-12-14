<?php

namespace App\Providers;

use App\Repositry\teacherRepositry;
use App\Repositry\teacherRepositryInterface;
use Illuminate\Support\ServiceProvider;

class TeacherServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            teacherRepositryInterface::class,
            teacherRepositry::class,
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
