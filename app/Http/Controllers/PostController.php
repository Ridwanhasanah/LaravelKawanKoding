<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;


class PostController extends Controller
{
  public function index(){
    $posts = Post::all();

    return view('post.index',compact('posts'));
  }
    public function create(){
      $categories = Category::all();


      return view('post.create', compact('categories'));
    }

    public function store(){
        Post::create([
          'title'       => request('title'),
          'slug'        => str_slug(request('title')),
          'content'     => request('content'),
          'category_id' => request('category_id')
        ]);

        return redirect()->route('post.index');
    }

    // ===== Edit
    public function edit(Post $post){//($id){
      //$post = Post::find($id);
      $categories = Category::all();

      return view('post.edit', compact('post','categories'));
    }

    public function update(Post $post){//($id){
      //$post = Post::find($id);

      $post->update([
        'title'       => request('title'),
        'category_id' => request('category_id'),
        'content'     => request('content')
      ]);

      return redirect()->route('post.index');
    }
}
