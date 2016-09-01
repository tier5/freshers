<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * Get the articles associated with the tag.
     * 
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function articles()
    {
        return $this->belongsToMany('App\Article');
    }

    /**
     * A user could own many articles.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function article_tag()
    {
        return $this->hasMany('App\ArticleTag');
    }
}
