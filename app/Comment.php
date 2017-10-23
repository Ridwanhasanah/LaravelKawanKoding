<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

  /*Yang boleh di isi ke databse*/
    protected $fillable = [
    'post_id',
    'user_id',
    'message'
  ];
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    /* Realasi dari user Ke Comment*/
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
