<!-- Assignment 4 -->
@extends('master')

@section('title', 'Categories')

@section('content')
    <h1> All Categories </h1>

    @foreach($categories as $category)
        SCP Object Class ID: {{ $category->id }}<br>
        SCP Object Class Designation: {{ $category->name }}<br>
        SCP Object Class Designation Description: {{ $category->description }}<br><br>

        <form method="POST" action="{{ route('categories.destroy', $category->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
        <br>

    @endforeach

    {{ $categories->links() }}

@endsection
