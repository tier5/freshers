<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Http\Requests;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Vinkla\Hashids\Facades\Hashids;

class SearchController extends Controller
{
    /**
     * Search keywords to matches exact Tags, Articles or Categories
     * 
     * @param  App\Http\Requests\Request $request
     * @return mixed
     */
    public function search(Request $request)
    {
        $article = Article::where('title', $request->_query)->get()->first();
        $tag = Tag::where('name', $request->_query)->get()->first();
        $category = Category::where('name', $request->_query)->get()->first();

        if ($article) {
            return redirect()->route('article.show', [$article->slug]);
        } else if ($tag) {
            return redirect()->route('search.tag', [Hashids::encode($tag->id)]);
        } elseif ($category) {
            return redirect()->route('search.category', [Hashids::encode($category->id)]);
        } else {
            $request->session()->flash('warning', 'You should enter some keywords to search!');

            return redirect()->route('article.index');
        }
    }

    /**
     * Get matching Article associated with requested Tag keyword.
     * 
     * @param  App\Http\Requests\Request $request
     * @return App\Article
     */
    public function searchTag(Request $request)
    {
        $tag = Tag::find(Hashids::decode($request->id)[0]);

        return view('search.tag', ['articles' => $tag->articles]);
    }

    /**
     * Get matching Catgeory associated with requested Category keyword.
     * 
     * @param  Request $request
     * @return App\Category
     */
    public function searchCategory(Request $request)
    {
        $category = Category::find(Hashids::decode($request->id)[0]);

        return view('search.category', ['category' => $category]);
    }

    /**
     * Get all Article titles, Tags and Categories, should available for search keyword.
     * 
     * @return JSON    All Article titles, Tags and Categories packed in one JSON object .
     */
    public function getSearchData()
    {
        $tags = Tag::all();
        $articles = Article::all();
        $categories = Category::all();

        $data = [];
        foreach ($tags as $key => $tag) {
            $data[$key]['datum'] = $tag->name;
            $data[$key]['type'] = 'tag';
        }

        $key = max(array_keys($data));
        foreach ($articles as $article) {
            $data[++$key]['datum'] = $article->title;
            $data[$key]['type'] = 'article';
        }

        $key = max(array_keys($data));
        foreach ($categories as $category) {
            $data[++$key]['datum'] = $category->name;
            $data[$key]['type'] = 'category';
        }

        return json_encode($data);
    }
}
