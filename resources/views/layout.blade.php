<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/main.css')}}">
</head>
<body>
    <ul class="nav"> 
        <li><a class="{{ request()->routeIs('home') ? 'active' : ''}}" href="{{route('home')}}">Home</a></li>
        <li><a class="{{ request()->routeIs('about') ? 'active' : ''}}" href="{{route('about')}}">About</a></li>
        <li><a class="{{ request()->routeIs('posts.create') ? 'active' : ''}}" href="{{route('posts.create')}}">Create Post</a></li>

    </ul>

    @includeWhen($errors->any(),'_errors')

    @if (session('success'))
        <div class="flash-success">
            {{ session('success')}}
        </div>
    @endif

    <div class="name">
        @yield('content')
    </div>
</body>
</html>