@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-8 col-sm-offset-2">
      <div class="panel panel-default">
          <div class="panel-heading">
          {{ $post->title }}
            <div class="pull-right">
            </div>
          </div>

          <div class="panel-body">
            <p>{{ $post->content }}</p>
             <small>{{ $post->category->name }} | <a href="{{route('post.edit',$post->id) }}">edit</a> </small>
          </div>
      </div>
      <div class="panel panel-default">
          <div class="panel-heading">Add Comment</div>

          <div class="panel-body">
            <form class="form-horizontal" action="{{ route('post.comment.store',$post)}}" method="post">
              {{ csrf_field() }}
                <textarea name="message" class="form-control" placeholder="give the comments please ...." rows="5" cols="80"></textarea><br>
                <input type="submit" class="btn btn-primary" name="send" value="Comment">
            </form>
          </div>
          <!--Menampilkan komentar Start-->
            @foreach ($post->comments()->orderBy('created_at', 'desc')->get() as $comment)
              <div class="panel-body">
                <h4><b>{{ $comment->user->name }} :</b></h4>
                <p>{{ $comment->message }}</p>
                <i>{{ $comment->created_at->diffForHumans()}}</i>
              </div>
            @endforeach
            <!--Menampilkan komentar End-->
      </div>
    </div>

  </div>
</div>
@endsection()
