<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Media;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    public function posts()
    {
        $categories = Category::get();
        return view('post.add_post', compact('categories'));
    }

    public function add_post(Request $request, PostRequest $postrequest)
    {

        $validatedData = $postrequest->validated();

        // ---------- POST things ------------------

        $post = new Post;
        $post->title= $postrequest->input('title');
        $post->content= $postrequest->input('content');
        $post->slug= $request->input('slug');
        $post->meta_title= $postrequest->input('meta_title');
        $post->meta_desc= $request->input('meta_desc');
        $post->meta_keyword= $request->input('meta_keyword');

        // ---------- IMAGE things ------------------
        $defaultImageUploaded = false;

        foreach ($postrequest->file("image") as $file){
            # name
            $imagename= $file->getClientOriginalName();
            $uinqeimage= time().rand(99,999).$imagename;
            # save image
            Storage::putFileAs('public/images',$file,$uinqeimage);

            $size = $file->getSize();
            $type= $file->getClientOriginalExtension();
            $path = 'public/images';
            # store image
            $media= new Media();
            $media->title= $uinqeimage;
            $media->size= $size;
            $media->path= $path;
            $media->type= $type;
            $media->save();

            # add default image

            if ($defaultImageUploaded==false) {
                $post->media_id = $media->id;
                $defaultImageUploaded = true;
            } else {
                $post->media()->attach($media);
            }
        }

        $post->save();

        # update post_category and media_post pivot table
        $post->category()->sync($request->category);
        $post->media()->sync([$media->id]);


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
    public function image(){

            return view('post.upload');

    }
    public function show_post()
    {
        $files =
        $posts= Post::with('default')->get();

        return view('show_posts', compact('posts', 'files'));
    }

}
