<?php

namespace App\Http\Composers;

use App\Repositories\TagRepository;
use Illuminate\Contracts\View\View;

class PopularTagsSidebarComposer
{
    /**
     * The tag repository implementation.
     *
     * @var TagRepository
     */
    protected $tags;

    /**
     * Create a new sidebar composer.
     *
     * @param  TagRepository  $tags
     * @return void
     */
    public function __construct(TagRepository $tags)
    {
        // Dependencies automatically resolved by service container...
        $this->tags = $tags;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        return $view->with('tags', $this->tags->getPopularTags());
    }
}
