<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/* Assignment 3C */

class Article extends Model {
    use HasFactory;
    // 27.
    public function show(Article $article) {
        return view('articles.show', compact('article'));
    }
}
