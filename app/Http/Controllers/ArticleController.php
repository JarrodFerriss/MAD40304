<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Article;
use App\Models\Category;

/* Assignment 3A + 3C */
// 7.
class ArticleController extends Controller {

    public function __construct() {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index() {

        // 20.
        //$testing = "Passing data...";

        // 8.
        // return "This is my new Article Controller.";

        // 5.
        $articles = Article::paginate(7);
        return view('articles.index', compact('articles'));
    }

    // 24.
    public function show($article) {
        // 25.
        $article = Article::find($article);
        // 26.
        return view('articles.show', compact('article'));
    }

    /* Assignment 5 */
    public function create() {
        $categories = Category::all();
        $tags = Tag::all();
        return view('articles.create', compact("categories", "tags"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'body' => 'required',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $category = Category::findOrFail($request->category_id);

        $articleData = [
            'name' => $request->name,
            'body' => $request->body,
            'author_id' => auth()->id(),
        ];

        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $filePath = $request->file('file')->storePublicly('articles', 'public');
            $articleData['file'] = $filePath;
        }

        $article = Article::create($articleData);
        $article->category()->associate($category)->save();

        if ($request->has('tags')) {
            $article->tags()->sync($request->tags);
        }

        return redirect()->route('articles.index')->with('success', 'Article created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->tags()->detach(); // Remove article's tags from the pivot table
        $article->delete(); // Delete the article

        return redirect()->route('articles.index')->with('success', 'Article deleted successfully!');
    }
}
