<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class TagRepository
{
    public function getPopularTags()
    {
        return DB::table('tags')
            ->join('article_tag', 'tags.id', '=', 'article_tag.tag_id')
            ->selectRaw('tags.*, count(article_tag.tag_id) AS `popularity`')
            ->groupBy('article_tag.tag_id')
            ->orderBy('popularity', 'DESC')
            ->take(5)
            ->get();
    }
}