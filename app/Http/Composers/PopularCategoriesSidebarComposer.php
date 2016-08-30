<?php

namespace App\Http\Composers;

use App\Repositories\CategoryRepository;
use Illuminate\Contracts\View\View;

class PopularCategoriesSidebarComposer
{
    /**
     * The category repository implementation.
     *
     * @var CategoryRepository
     */
    protected $categories;

    /**
     * Create a new sidebar composer.
     *
     * @param  CategoryRepository  $categories
     * @return void
     */
    public function __construct(CategoryRepository $categories)
    {
        // Dependencies automatically resolved by service container...
        $this->categories = $categories;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function composeCategories(View $view)
    {
        return $view->with('categories', $this->categories->getPopularCategories());
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        return $view->with('categories', $this->categories->getPopularCategories());
    }
}
