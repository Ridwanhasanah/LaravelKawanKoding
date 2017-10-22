<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','content','category_id','slug'];

    /*===== Membuat Relasi =====*/
    public function category(){
      return $this->belongsTo(Category::class);
    }

    
}
