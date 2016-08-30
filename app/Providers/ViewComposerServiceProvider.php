<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composePopularTagsSidebar();
        $this->composePopularCategoriesSidebar();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Compose the Pouplar Tags Sidebar
     */
    private function composePopularTagsSidebar()
    {
        view()->composer('layouts.article', 'App\Http\Composers\PopularTagsSidebarComposer@compose');
    }

    /**
     * Compose the Pouplar Categories Sidebar
     */
    private function composePopularCategoriesSidebar()
    {
        view()->composer('layouts.article', 'App\Http\Composers\PopularCategoriesSidebarComposer@compose');
    }
}
