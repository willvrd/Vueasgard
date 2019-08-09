<?php

namespace Modules\Vueasgard\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Vueasgard\Events\Handlers\RegisterVueasgardSidebar;

class VueasgardServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
        $this->app['events']->listen(BuildingSidebar::class, RegisterVueasgardSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('articles', array_dot(trans('vueasgard::articles')));
            // append translations

        });
    }

    public function boot()
    {
        $this->publishConfig('vueasgard', 'permissions');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Vueasgard\Repositories\ArticleRepository',
            function () {
                $repository = new \Modules\Vueasgard\Repositories\Eloquent\EloquentArticleRepository(new \Modules\Vueasgard\Entities\Article());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Vueasgard\Repositories\Cache\CacheArticleDecorator($repository);
            }
        );
// add bindings

    }
}
