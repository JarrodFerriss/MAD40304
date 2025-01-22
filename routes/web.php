<?php

use Illuminate\Support\Facades\Route;

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
