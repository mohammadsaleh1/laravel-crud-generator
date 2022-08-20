<?php

namespace Saleh\LaravelCrud;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class LaravelCrudServiceProvider extends ServiceProvider
{

    protected $commands = [
        'Saleh\LaravelCrud\Commands\GenrateCommand',
       
    ];
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands($this->commands);
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Sven\ArtisanView\ServiceProvider::class);
        }    
       // dd(File::exists(__DIR__ . '\helper.php'));
        if (File::exists(__DIR__ . '\helper.php')) {
            require __DIR__ . '\helper.php';
        }

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
     //  dd("ger");
    }
}
