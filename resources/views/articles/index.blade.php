<!-- Assignment 3A + 3C -->

<!-- 16. -->
@extends('master')

<!-- 17. -->
@section('title', 'Articles')

@section('content')
    <!-- 9. -->
    <h1> All Articles </h1>

    <!-- 10. 11. -->
    @foreach($articles as $article)
        SCP Entry ID: {{ $article->id }} <br>
        SCP Designation: {{ $article->name }} <br>
        SCP Containment: {{ $article->body }} <br>
        Author ID: {{ $article->author_id }} <br><br>

        <form method="POST" action="{{ route('articles.destroy', $article->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
        <br>

    @endforeach
@endsection
