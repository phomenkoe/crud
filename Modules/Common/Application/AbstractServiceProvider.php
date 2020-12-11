<?php

namespace Modules\Common\Application;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

/**
 * Class AbstractServiceProvider
 * @package Modules\Common\Application
 */
abstract class AbstractServiceProvider extends ServiceProvider{
    /**
     * @var string
     */
    protected $migrationsPath;
    /**
     * @var string
     */
    protected $routesPath;
    /**
     * Console commands list
     * @var array
     */
    protected $commands = [];
    /**
     * @var array
     */
    protected $dependencies = [];
    /**
     * @var array
     */
    protected $listen = [];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        if(!empty($this->migrationsPath)){
            $this->loadMigrationsFrom($this->migrationsPath);
        }

        if(!empty($this->routesPath)){
            $this->loadRoutesFrom($this->routesPath);
        }

        if ($this->app->runningInConsole() && !empty($this->commands)) {
            $this->commands($this->commands);
        }

        foreach ($this->dependencies as $dependency){
            $this->app->when($dependency['when'])
                ->needs($dependency['need'])
                ->give($dependency['give']);
        }

        foreach ($this->listen as $event => $listeners){
            foreach ($listeners as $listener){
                Event::listen($event, $listener);
            }
        }
    }

}
