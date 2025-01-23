<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\article;

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
}
