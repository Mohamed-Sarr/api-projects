<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostApiController extends Controller
{
    //
    public function index(){

        return Post::all();

    }



    public function show(Post $post){

        return $post;

    }



    public function store(){
        
        request()->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $post = Post::create([
            'title'=> request('title'),
            'content'=> request('content'),
        ]);
        
        return response($post);

    }



    public function update(Post $post){

        request()->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
    
        $success =  $post->update([
            'title'=> request('title'),
            'content'=> request('content'),
        ]);
    
        return [
            "success"=> $success 
        ];
    }



    public function destroy (Post $post){

            $success =  $post->delete();
          
              return [
                  "success"=> $success ,
              ];
          
    }

    public function search($name){
      
          return Post::where('title','like','%'.$name.'%')->get();
      
    }



    
}
