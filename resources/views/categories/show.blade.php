<!-- Assignment 4 -->
@extends('master')

@section('title', 'Category - Show')

@section('content')
    <h1>SCP Object Class ID: {{ $category->id }}</h1>

    SCP Object Class Designation: {{ $category->name }}<br>
    SCP Object Class Description: {{ $category->description }}<br><br>

    @foreach($category->articles as $article)
        SCP Entry ID: {{ $article->id }} <br>
        SCP Designation: {{ $article->name }} <br>
        SCP Containment: {{ $article->body }} <br>
        Author ID: {{ $article->author_id }} <br><br>
    @endforeach
@endsection
