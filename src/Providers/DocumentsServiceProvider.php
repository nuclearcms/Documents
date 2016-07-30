<?php

namespace Nuclear\Documents\Providers;


use Illuminate\Support\ServiceProvider;
use Nuclear\Documents\Contract\Repositories\DocumentsRepository as DocumentsRepositoryContract;
use Nuclear\Documents\Repositories\DocumentsRepository;

class DocumentsServiceProvider extends ServiceProvider {

    const version = '0.9.1';

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerDocumentsRepository();
    }

    /**
     * Registers the DocumentsRepository
     */
    protected function registerDocumentsRepository()
    {
        $this->app->singleton(
            DocumentsRepositoryContract::class,
            DocumentsRepository::class
        );
    }

    /**
     * Boot the service provider.
     */
    public function boot()
    {
        if ( ! $this->app->environment('production'))
        {
            $this->publishes([
                dirname(__DIR__) . '/resources/config/files.php'      => config_path('files.php'),
                dirname(__DIR__) . '/resources/config/image.php'      => config_path('image.php'),
                dirname(__DIR__) . '/resources/config/imagecache.php' => config_path('imagecache.php'),
                dirname(__DIR__) . '/resources/config/transit.php'    => config_path('transit.php'),
            ], 'config');

            $this->publishes([
                dirname(__DIR__) . '/resources/migrations/' => database_path('migrations')
            ], 'migrations');
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [DocumentsRepositoryContract::class];
    }
}