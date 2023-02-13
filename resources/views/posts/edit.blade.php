@extends('layout')

@section('title', $post->title)
    
@section('content')
        <h1>
            Update blog post
        </h1>
       <form action="{{route('posts.update', [$post])}}" method="post">
        @csrf
        @method('PUT')
            <label>Title</label>
            <input type="text" name="title" value="{{ old('title', $post->title) }}" class="@error('title') error-border @enderror">

            @error('title')
                <div class="error">
                    {{$message}}
                </div>
            @enderror

            <label>Description</label>
            <textarea name="description" class="@error('description') error-border @enderror">{{ old('description', $post->description) }}</textarea>

            @error('description')
                <div class="error">
                    {{$message}}
                </div>
            @enderror

            <button type="submit">Update</button>
       </form>
@endsection