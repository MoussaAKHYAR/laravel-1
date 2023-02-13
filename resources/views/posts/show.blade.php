@extends('layout')

@section('title', $post->title)
    
@section('content')
<div class="post-item">
    <div class="post-content">
        <h2>{{$post->title}}</h2>
        <p>{{$post->description}}</p>
        <a href="{{route('posts.edit', [$post])}}">Edit post</a>

        <form action="{{route('posts.destroy', [$post])}}" method="post">
            @csrf
            @method('DELETE')
            <button class="delete" type="submit">Delete post</button>
        </form>
    </div>
</div>
@endsection