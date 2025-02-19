<!-- Assignment 6 -->
@extends('master')

@section('title', 'Update Entry')

@section('content')
    <h1> Edit Category Form </h1>

    <form method="POST" action="{{ route('categories.update', $category->id) }}">
        @method('PATCH')
        @csrf

        <label for="name">SCP Object Class Designation: </label>
        <input name="name" type="text"
            value="{{ $category->name }}"><br>
        <label for="description">SCP Object Class Designation Description: </label>
        <input name="description" type="text"
            value="{{ $category->description }}"><br>
        <input type="submit" value="Submit"><br>
    </form>

    @if ($errors->any())
        @foreach($errors->all() as $error)
            {{ $error }}<br>
        @endforeach
    @endif

@endsection
