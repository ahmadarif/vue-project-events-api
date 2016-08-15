<?php
namespace App\Providers;

use Illuminate\Http\Response;
use Illuminate\Support\ServiceProvider;

class CorsServiceProvider extends ServiceProvider
{
    /**
     * Register OPTIONS route to any requests
     */
    public function register()
    {
        /** @var \Illuminate\Http\Request $request */
        $request = $this->app->make('request');
        if ($request->isMethod('OPTIONS')) {
            $this->app->options($request->path(), function () {
                return response('OK', 200);
            });
        }
    }
}