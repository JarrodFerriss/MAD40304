<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

/* Assignment 3C */

class Article extends Model {

    /* Assignment 4 */
    public function category() {
        return $this->belongsTo(Category::class);
    }
}
