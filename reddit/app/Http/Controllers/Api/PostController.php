<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();

        return response()->json($posts);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|string|max:255',
                'content' => 'required|string|max:800'
            ]
        );
        $post = Post::create($request->all());
        return response()->json($post);
    }

    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'title' => 'required|string|max:255',
                'content' => 'required|string|max:1000'
            ]
        );

        $post = Post::find($id);
        $post->update($request->all());
        return response()->json($post, 200);
    }

    public function destroy(string $id)
    {
        $post = Post::find($id);
        $post->delete();
        return response()->json($post, 200);
    }
}
