<?php

namespace CaS\SimplyGrid\Provider;

use Illuminate\Support\ServiceProvider;

/**
 * Service provider to add directive grid
 */
class DirectiveServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     * @return string
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'cas_simplygrid');
        require_once __DIR__ . '/../Directive/directive.php';

        \Blade::directive('gridView', function ($expression) {
            return "<?php echo gridView($expression) ?>";
        });
    }

    /**
     * Register any application services.
     * @return void
     */
    public function register()
    {
        //
    }
}