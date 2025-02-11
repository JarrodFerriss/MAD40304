<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Article;
use App\Models\Category;

/* Assignment 3A + 3C */
// 7.
class ArticleController extends Controller {
    public function index() {

        // 20.
        //$testing = "Passing data...";

        // 8.
        // return "This is my new Article Controller.";

        // 5.
        $articles = DB::table('articles')->get();
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
        return view('articles.create', compact("categories"));
    }

    public function store(Request $request) {
        $category = Category::findOrFail($request->category_id);
        $article = new Article($request->all());
        $article->author_id = 1;
        $article->category()->associate($category)->save();
        return redirect('articles');
    }
}
