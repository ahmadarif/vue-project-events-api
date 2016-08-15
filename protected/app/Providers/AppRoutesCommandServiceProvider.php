<?php 
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Console\Commands\AppRoutesCommand;

class AppRoutesCommandServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('command.routes.list', function()
        {
            return new AppRoutesCommand;
        });
        $this->commands(
            'command.routes.list'
        );
    }
}