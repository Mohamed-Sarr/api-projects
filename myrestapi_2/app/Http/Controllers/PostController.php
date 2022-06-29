<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $posts  = Post::paginate(10);
        $posts  = Post::all();
        return PostResource::collection($posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        if (!$post->save()) {
            return new PostResource($post);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
            $post = Post::findOrFail($id);
            return new PostResource($post);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $post = Post::findOrFail($id);
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        if (!$post->save()) {
            return new PostResource($post);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::findOrFail($id);
        if (!$post->delete()) {
            return new PostResource($post);
        }


    }
   /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function search($name)
    {
        //
            // $post = Post::where('title','like','%'.$name.'%')->get();
            return Post::where('title','like','%'.$name.'%')->get();

        


    }



}
