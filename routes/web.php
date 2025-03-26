<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/', function () {
    return view('welcome');
});

// 5.
Route::get('contact', function () {
    return "My name is Jarrod Ferriss.";
});

// 6.
Route::get('easy', function () {
    return "Laravel makes it easy to develop websites!";
});

// 7.
Route::get('uid/{id}', function ($id) {
    return "ID: $id";
}) -> where(['id' => '[0-9]+']);

// 10.
Route::group(['as' => 'users.', 'prefix' => 'users', 'where' => ['name' => '[A-Z a-z]+'],
    ], function () {

    // 8.
    Route::get('{name?}', function ($name = "Batman"){
        return "Name: $name";
    }) -> name('show');

    // 9.
    Route::get('{name?}/images/{id?}', function ($name = "Batman", $id = "1") {
        return "Name: $name Image: $id";
    }) -> where(['id' => '[0-9]+']) -> name('images.show');
});

/* Assignment 2A */
// 9.
Route::get('/aboutme', function () {
    $name = ['fullName' => 'Jarrod Ferriss']; // 10.
    return view('pages/about', $name); // 11.
}) -> name('pages/about');

// 16.
Route::get('/thingsiknow', function () {
    $items = ['Java', 'JavaScript', 'PHP', 'Python', 'HTML', 'CSS', 'Kotlin', 'Swift']; // 17.
    return view('pages/langs', compact('items')); // 18.
}) -> name('pages/langs');

/* Assignment 2B */
// 10.
Route::get('contact', function () {
    // 11.
    $email = 'jarrodferriss@gmail.com';
    return view('pages/contact') -> with('email', $email);
}) -> name('pages/contact');

Route::get('categories/manage', [CategoryController::class, 'manage']) -> name('categories.manage');

Route::get('categories/{category}/forcedelete', [CategoryController::class, 'forcedelete'])->name('categories.forcedelete');

Route::get('categories/{category}/restore', [CategoryController::class, 'restore'])->name('categories.restore');

Route::resource('articles', ArticleController::class);

Route::delete('articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');

///* Assignment 5 */
//Route::get('articles/create', [ArticleController::class, 'create']) -> name('articles.create');
//Route::post('articles', [ArticleController::class, 'store']) -> name('articles.store');
///* Assignment 3A + 3C */
//// 12.
//Route::get('articles', [ArticleController::class, 'index']) -> name('articles.index');
//// 14.
//Route::get('articles/{article}', [ArticleController::class, 'show']) -> name('articles.show');
//
//Route::delete('articles/{article}', [ArticleController::class, 'destroy']) -> name('articles.destroy');

Route::resource('categories', CategoryController::class);

///* Assignment 5 */
//Route::get('categories/create', [CategoryController::class, 'create']) -> name('categories.create');
//Route::post('categories', [CategoryController::class, 'store']) -> name('categories.store');
///* Assignment 4 */
//Route::get('categories', [CategoryController::class, 'index']) -> name('categories.index');
//Route::get('categories/{category}', [CategoryController::class, 'show']) -> name('categories.show');
//
//Route::delete('categories/{category}', [CategoryController::class, 'destroy']) -> name('categories.destroy');
//
///* Assignment 6 */
//Route::get('categories/{category}/edit', [CategoryController::class, 'edit']) -> name('categories.edit');
//Route::patch('categories/{category}', [CategoryController::class, 'update']) -> name('categories.update');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
