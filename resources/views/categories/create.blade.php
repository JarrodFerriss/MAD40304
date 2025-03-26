<!-- Assignment 5 -->
@extends('master')

@section('title', 'Create New Category')

@section('content')
    <h1> Create New Category </h1>

    <form method="POST" action="{{ route('categories.store') }}">
        @include('partials.categoriesForm', [
            'buttonName' => 'Create',
            'name' => old('name'),
            'description' => old('description')
        ])
    </form>

    @include('partials.errors')

@endsection

