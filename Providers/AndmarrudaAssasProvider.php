<?php
    namespace Andmarruda\Asaas\Providers;

    use Illuminate\Support\ServiceProvider;
    use Illuminate\Support\Facades\Route;

    class AndmarrudaAssasProvider extends ServiceProvider
    {
        /**
         * Bootstrap the application services.
         */
        public function boot()
        {
            //helps me publish my config asaas.php file
            $this->publishes([
                __DIR__.'/../Config/asaas.php' => config_path('asaas.php'),
            ], 'config');
            
            Route::middleware(config('asaas.middleware_api'))->prefix(config('asaas.prefix_api'))->group(function() {
                $this->loadRoutesFrom(__DIR__. '/../Routes/api.php');
            });

            Route::middleware(config('asaas.middleware_web'))->prefix(config('asaas.prefix_web'))->group(function() {
                $this->loadRoutesFrom(__DIR__. '/../Routes/web.php');
            });
        }

        /**
         * Register the application services.
         */
        public function register()
        {

        }
    }
?>