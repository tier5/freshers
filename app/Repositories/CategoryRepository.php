<?php

namespace App\Repositories;

use App\Category;
use Illuminate\Support\Facades\DB;

class CategoryRepository
{
    public function getPopularCategories()
    {
        return DB::table('categories')
            ->join('articles', 'categories.id', '=', 'articles.category_id')
            ->selectRaw('categories.*, count(articles.category_id) AS `popularity`')
            ->groupBy('articles.category_id')
            ->orderBy('popularity', 'DESC')
            ->take(5)
            ->get();
    }
}