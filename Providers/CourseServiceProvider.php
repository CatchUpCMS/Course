<?php

namespace modules\Course\Providers;

use Illuminate\Support\ServiceProvider;

class CourseServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the application events.
     */
    public function boot()
    {
        $this->registerConfig();
        $this->registerTranslations();
        $this->registerViews();
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        //
    }

    /**
     * Register config.
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__.'/../Config/config.php' => config_path('course.php'),
        ]);
        $this->mergeConfigFrom(
            __DIR__.'/../Config/config.php', 'course'
        );
    }

    /**
     * Register views.
     */
    public function registerViews()
    {
        $viewPath = base_path('resources/views/modules/course');

        $sourcePath = __DIR__.'/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath,
        ]);

        $this->loadViewsFrom([$viewPath, $sourcePath], 'course');
    }

    /**
     * Register translations.
     */
    public function registerTranslations()
    {
        $langPath = base_path('resources/lang/modules/course');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'course');
        } else {
            $this->loadTranslationsFrom(__DIR__.'/../Resources/lang', 'course');
        }
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
}
