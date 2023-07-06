<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Media;
use App\Models\Post;
use Illuminate\Http\Request;



class PostController extends Controller
{
    public function posts()
    {
        $categories = Category::get();
        return view('post.add_post', compact('categories'));
    }

    public function add_post(Request $request)
    {
        $post = new Post;
        $post->title= $request->input('title');
        $post->content= $request->input('content');
        $post->slug= $request->input('slug');
        $post->meta_title= $request->input('meta_title');
        $post->meta_desc= $request->input('meta_desc');
//        $post->media_id= $request->input('media_id');
//        $post->user_id= $request->input('user_id');
        $post->meta_keyword= $request->input('meta_keyword');
//        $category= $request->input('category');
//        dd((int)$request->category);
        $validatedData = $request->validate([
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            // Other validation rules for title, content, etc.
        ]);
        $defaultImageUploaded = false;
        foreach ($request->file('images') as $image) {
            $path = $image->store('images', 'public'); // Store the image in the 'public' disk under the 'images' directory

            $media = new Media;
            $media->title = $image->getClientOriginalName();
            $media->type = $image->getClientOriginalExtension();
            $media->path = $path;
            $media->save();

            if (!$defaultImageUploaded) {
                $post->default_image_id = $media->id;
                $defaultImageUploaded = true;
            } else {
                $post->gallery()->attach($media);
            }
        }
        $post->save();

        $post->category()->sync($request->category);

        // Return a JSON response with the created post
        return response()->json($post, 201);
    }

    public function get_posts()
    {
        $post= Post::with('category')->get();
        return response()->json($post);
    }

    public function show($slug)
    {
        $post_id = Post::where('slug', $slug)->first();
        $post_id->view = $post_id->view + 1;
        $post_id->save();
        return response()->json($post_id);
    }

}
