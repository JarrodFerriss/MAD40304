<!-- Assignment 6 -->
@extends('master')

@section('title', 'Update Entry')

@section('content')
    <h1> Edit Category Form </h1>

    <form method="POST" action="{{ route('categories.update', $category->id) }}">
        @method('PATCH')
        @include('partials.categoriesForm', [
            'buttonName' => 'Update',
            'name' => $category->name,
            'description' => $category->description
        ])
    </form>

    @include('partials.errors')

@endsection
