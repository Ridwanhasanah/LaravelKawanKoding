<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;

use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    public function store(Request $request, Post $post)
    {

      // Cara 1
        // Comment::create([
        //   'post_id' => $post->id, //mnegisi post id
        //   'user_id' => auth()->id(), //mnegisi user id
        //   'message' => $request->message // mengisi pesan komentar
        // ]);

        // Cara 2
        $post->comments()->create(
          array_merge(
        $request->only('message'),
        ['user_id' =>auth()->id()]
      )
    );

        return redirect()->back(); //membuat kembali ke link sebelumnya
    }
}
