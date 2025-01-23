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
@endsection
