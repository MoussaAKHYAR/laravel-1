<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
        return view('posts.create');
        
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => ['required', 'min:10']
        ]);

        $post = new Post();

        $post->title = $request->input('title');
        $post->description =$request->input('description');

        $post->save();

        return redirect()
            ->route('posts.create')
            ->with('success', 'Post is submitted! Title: '.
            $post->title.' Description: '.
            $post->description);

    }


    public function show($id)
    {
        return view('posts.show',
            ['post' => Post::findOrfail($id)]
        );
    }

    public function edit($id)
    {
        return view('posts.edit',
            ['post' => Post::findOrfail($id)]
        );
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => ['required', 'min:10']
        ]);

        $post = Post::findOrfail($id);

        $post->title = $request->input('title');
        $post->description = $request->input('description');

        $post->save();

        return redirect()->route('posts.show',['post' => $post])->with('success', 'Post is updated');
    }

    public function destroy($id)
    {
        //
    }
}
