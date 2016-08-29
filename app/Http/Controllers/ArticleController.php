<?php

namespace App\Http\Controllers;

use App\Article;
use App\ArticleTag;
use App\Category;
use App\Http\Requests;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::latest()->get();
        
        return view('article.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            $categories = Category::all();
            $tags = Tag::all();
            return view('article.create', [
                'categories' => $categories,
                'tags' => $tags
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tags = $this->listTags(explode(', ', $request->tags));

       $this->validate($request, [
                'title' => 'required|unique:articles',
                'category' => 'required',
                'body' => 'required'
        ]);

        $article = new Article();
        $article->title = $request->title;
        $article->slug = str_slug($request->title);
        $article->body = $request->body;
        $article->category_id = $request->category;
        $article->user_id = 1;
        $article->save();
        $article->tags()->attach($tags);

        $request->session()->flash('success', 'Your post is created successfully!');

        return redirect()->route('article.show', [$article->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $article = Article::where('slug', $slug)->get()
                ->first();

        if (is_null($article)) {
            abort(404);
        }

        return view('article.show', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $article = Article::where('slug', $slug)->get()
                ->first();
        $categories = Category::all();

        $array = [];
        foreach($article->tags as $key => $tag) {
            $array[$key] = $tag->name;
        }
        $tags = implode(', ', $array );

        return view('article.edit', [
                'article' => $article,
                'categories' => $categories,
                'tags' => $tags
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
            $tags = $this->listTags(explode(', ', $request->tags));

            $this->validate($request, [
                'title' => 'required',
                'category' => 'required',
                'body' => 'required'
            ]);

            $article = Article::where('slug', $slug)->get()
                ->first();

            $article->title = $request->title;
            $article->slug = str_slug($request->title);
            $article->category_id = $request->category;
            $article->body = $request->body;
            $article->update();
            $article->tags()->sync($tags);

            $request->session()->flash('success', 'Your post is updated successfully!');

            return redirect()->route('article.show', [$article->slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $article = Article::where('slug', $slug)->get()
                ->first();

        $article->delete();

        session()->flash('success', 'Your post is deleted successfully!');

        return redirect()->route('article.index');
    }

    /**
     * Takes an array of tags from user and checks the if same tags are stored
     * on database or not.
     * Fetches available tag IDs from databse and stores new tags into database
     * and returns an array consiting tags IDs respected to all input tags.
     * 
     * @param  array $input_tags Array containing tag names
     * @return array             Array containing tag IDs
     */
    private function listTags($input_tags) {
        $stored_tags = Tag::all();
        $new_tags = $input_tags;
        $tags = [];
        foreach ($stored_tags as $stored_tag) {
            foreach ($input_tags as $key =>$input_tag) {
                if (Str::equals(Str::lower($input_tag), Str::lower($stored_tag->name))) {
                    $tags[$key] = $stored_tag->id;
                    unset($new_tags[$key]);
                }
            }
        }
        if(empty($tags)) {
            $key = 0;
        } else {
            $key = max(array_keys($tags));    
        }
        foreach ($new_tags as $new_tag) {
            $tag = new Tag();
            $tag->name = $new_tag;
            $tag->save();
            $tags[++$key] = $tag->id;
        }
        return $tags;
    }

    public function userarticle(Request $request) {
        $article = Article::where('user_id','=',$request->user_id)->get();
        if (is_null($article)) {
            abort(404);
        }

        return view('article.showuserarticle', ['articles' => $article]);

    }
}
