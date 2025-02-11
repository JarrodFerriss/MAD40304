@extends('master')
<!-- Assignment 5 -->

@section('title', 'Create New Article')

@section('content')

    <h1> Create New Article </h1>

    <form method="POST" action="{{ action([\App\Http\Controllers\ArticleController::class, 'store']) }}">
        {{ csrf_field() }}
        <label for="name">SCP Designation: </label>
        <input name="name" type="text"><br>

        <label for="body">SCP Containment: </label>
        <input name="body" type="text"><br>

        <label for="category_id">SCP Object Class ID: </label>
        <select name="category_id">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select><br>

        <input type="submit" value="Create"><br>
    </form>

@endsection
