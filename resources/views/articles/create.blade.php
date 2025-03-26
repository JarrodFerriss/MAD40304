@extends('master')
<!-- Assignment 5 -->

@section('title', 'Create New Article')

@section('content')

    <h1> Create New Article </h1>

    <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
        @csrf

        <label for="name">SCP Designation: </label>
        <input name="name" type="text" value="{{ old('name') }}" required><br>

        <label for="body">SCP Containment: </label>
        <textarea name="body" required>{{ old('body') }}</textarea><br>

        <label for="file">Attach Image: </label>
        <input type="file" name="file"><br>

        <label for="category_id">SCP Object Class ID: </label>
        <select name="category_id">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select><br>

        <label for="tags">Tags:</label>
        <select name="tags[]" multiple>
            @foreach($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
        </select><br><br>

        <input type="submit" value="Create"><br>
    </form>

    @include('partials.errors')

@endsection
