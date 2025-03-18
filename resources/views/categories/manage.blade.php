<!-- Assignment 4 -->
@extends('master')

@section('title', 'Categories')

@section('content')
    <h1> Deleted Categories </h1>

    @foreach($categories as $category)
        SCP Object Class ID: {{ $category->id }}<br>
        SCP Object Class Designation: {{ $category->name }}<br>
        SCP Object Class Designation Description: {{ $category->description }}<br><br>

        <a href="{{ route('categories.restore', $category->id) }}">
            [Restore]</a><br>

        <a href="{{ route('categories.forcedelete', $category->id) }}">
            [Force Delete]</a><br>
        <br>

    @endforeach
@endsection
