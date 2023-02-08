@extends('layout')

@section('title', 'Create new post')
    
@section('content')
        <h1>
            Create a new blog post
        </h1>
       <form action="{{route('posts.store')}}" method="post">
        @csrf
            <label>Title</label>
            <input type="text" name="title" value="{{ old('title') }}" class="@error('title') error-border @enderror">

            @error('title')
                <div class="error">
                    {{$message}}
                </div>
            @enderror

            <label>Description</label>
            <textarea name="description" class="@error('description') error-border @enderror">{{ old('description') }}</textarea>

            @error('description')
                <div class="error">
                    {{$message}}
                </div>
            @enderror

            <button type="submit">Submit</button>
       </form>
@endsection