<?php
/* Assignment 4 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model {
    use HasFactory, SoftDeletes;
    /* Assignment 5 */
    protected $fillable = [
        "name",
        "description"
    ];
    public function articles() {
        return $this->hasMany(Article::class);
    }
}
