<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Retrieve a list of all blog posts
    public function index()
    {
        try {
            $posts = Post::with('user')->get();

            return response()->json([
                'data' => $posts,
                'message' => 'success'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while retrieving posts.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Retrieve details of a single blog post
    public function show($id)
    {
        try {
            $post = Post::with('user')->findOrFail($id);

            return response()->json([
                'data' => $post,
                'message' => 'success'
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Post not found',
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while retrieving the post.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

}
