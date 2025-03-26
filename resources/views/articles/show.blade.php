<!-- Assignment 3C -->

<!-- 16. -->
@extends('master')

<!-- 17. -->
@section('title', 'Article - Show')

@section('content')

    <!-- 18. -->
    <h1>SCP Entry ID: {{ $article->id }}</h1>

    SCP Designation: {{ $article->name }} <br>
    SCP Containment: {{ $article->body }} <br>
    Author ID: {{ $article->author_id }} <br><br>

    SCP Object Class Designation: {{ $article->category->name ?? 'Unknown Category' }}<br>
    SCP Object Class Description: {{ $article->category->description ?? 'No description available.' }}<br><br>

    @if ($article->file)
        <h3>Attached Image:</h3>
        <img src="{{ asset('storage/' . $article->file) }}" width="100px" height="100px" alt="Article Image">
    @endif

    <h3>Tags:</h3>
    <ul>
        @foreach($article->tags as $tag)
            <li>{{ $tag->name }}</li>
        @endforeach
    </ul>
@endsection
