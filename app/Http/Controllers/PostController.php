<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(2);//orderBy('created_at', 'desc')->get();//

        return view('post.index', compact('posts'));
    }
    public function create()
    {
        $categories = Category::all();


        return view('post.create', compact('categories'));
    }

    public function store()
    {
        /* Validasi Start*/
        $this->validate(request(), [
        'title'   => 'required|min:5',
        'content' => 'required|min:50'
      ]);
        /* Validasi End*/

        Post::create([
          'title'       => request('title'),
          'slug'        => str_slug(request('title')),
          'content'     => request('content'),
           'category_id' => request('category_id')
        ]);

        return redirect()->route('post.index')->withInfo('Post Aded');//->with('success','Post aded');
        //->with('success','Post aded');  untuk membuat alert jika berhasil membuat post
    }

    // ===== Edit
    public function edit(Post $post)
    {//($id){
        //$post = Post::find($id); di gunakan jika tidak menggunakan data binding
        $categories = Category::all();

        return view('post.edit', compact('post', 'categories'));
    }

    public function update(Post $post)
    {//($id){
        //$post = Post::find($id);

        $post->update([
        'title'       => request('title'),
        'category_id' => request('category_id'),
        'content'     => request('content')
      ]);

        return redirect()->route('post.index')->withSuccess('Post Changed');
    }

    // Delete
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index')->withDanger('Post Deleted');
    }
    // Tampil
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }
}
