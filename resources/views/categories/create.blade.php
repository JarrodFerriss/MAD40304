<!-- Assignment 5 -->
@extends('master')

@section('title', 'Create New Category')

@section('content')
    <h1> Create New Category </h1>

    <form method="POST" action="{{ route('categories.store') }}">
        @csrf

        <label for="name">SCP Object Class Designation: </label>
        <input name="name" type="text"><br>
        <label for="description">SCP Object Class Designation Description: </label>
        <input name="description" type="text"><br>
        <input type="submit" value="Submit"><br>
    </form>

    @if ($errors->any())
        @foreach($errors->all() as $error)
            {{ $error }}<br>
        @endforeach
    @endif

@endsection

