<!-- Assignment 2B -->
<!-- 17 -->
@extends('master')

<!-- 7. -->
{{--<!DOCTYPE html>--}}
{{--<html lang = "en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <title>Contact</title>--}}
{{--</head>--}}
{{--<body>--}}

<!-- 18. -->
@section('title', 'Contact')

@section('content')
    <!-- 8. -->
    <h1>Contact Page</h1>
    <!-- 9. -->
    @if($email)
        {{ $email }}
    @else
        No email address given
    @endif
@endsection
{{--</body>--}}
{{--</html>--}}
