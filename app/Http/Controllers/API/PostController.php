<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Retrieve a list of all blog posts
    public function index()
    {
        $posts = Post::all();
        return response()->json([
            'data' => $posts,
            'message' => 'success'
        ], 200);
    }

    // Retrieve details of a single blog post
    public function show($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json([
                'message' => 'failure'
            ], 404);
        }

        return response()->json([
            'data' => $post,
            'message' => 'success'
        ], 200);    
    }

}
