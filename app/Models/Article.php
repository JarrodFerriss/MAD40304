<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{

    use HasFactory, SoftDeletes;

    protected $fillable = [
        "name",
        "body"
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
