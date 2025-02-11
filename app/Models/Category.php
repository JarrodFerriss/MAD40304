<?php
/* Assignment 4 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {
    use HasFactory;
    /* Assignment 5 */
    protected $fillable = [
        "name",
        "description"
    ];
    public function articles() {
        return $this->hasMany(Article::class);
    }
}
