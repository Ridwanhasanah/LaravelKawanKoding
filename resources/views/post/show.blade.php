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
    </div>

  </div>
</div>
@endsection()
