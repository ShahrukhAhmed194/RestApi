<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsApiController extends Controller
{
    public function index(){
        
        return post::all();
    }


    public function store(){
        request()->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
    
        Post::create([
            'title'=>request('title'),
            'content'=>request('content'),
        ]);
    
        return post::all();
    
    }


    public function update(Post $post){

        request()->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
         
        $post->update([
            'title'=>request('title'),
            'content'=>request('content')
        ]); 
    
        return post::all();
    
    }


    public function destroy(Post $post){

        $post->delete();
    
        return post::all();
    }
}
