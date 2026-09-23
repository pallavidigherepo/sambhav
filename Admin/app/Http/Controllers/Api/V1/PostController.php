<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // 1. Filter only published posts
        // 2. Load relationships (e.g., author) to avoid N+1 issues
        // 3. Paginate the result
        if (isset($request->recent)) {
            $posts = Post::where('is_published', true)
                    ->latest()
                    ->limit(5)
                    ->get();
            // $posts = Post::query()
            //     ->where('is_published', true)
            //     //->with('author:id,name') 
            //     ->latest()
            //     ->limit(5);
        } else {
            $posts = Post::query()
                ->where('is_published', true)
                //->with('author:id,name') 
                ->latest()
                ->paginate($request->query('limit', 10)); // Default to 10 per page
        }
        

        // Return as a Resource Collection to transform the data
        return PostResource::collection($posts);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        // Find by slug instead of ID for SEO-friendly URLs
        $post = Post::query()
            ->where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail(); // Throws 404 if not found or not published

        // Return the single resource
        return new PostResource($post);
    }
}
