@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-8 col-sm-offset-2">
      <div class="panel panel-default">
          <div class="panel-heading">Edit Post</div>
          <div class="panel-body">
            <form class="" action="{{ route('post.update',$post->id) }}" method="post">
              {{ csrf_field() }}
              {{ method_field('PATCH') }}
              <div class="from-group">
                <label for="">Title</label>
                <input type="text" class="form-control" name="title" value="{{ $post->title }}" placeholder="Post title">
              </div><br>
              <div class="from-group">
                <label for="">Category</label>
                <select class="form-control" name="category_id">
                  @foreach( $categories as $category )
                    <option
                    value="{{ $category->id}}"
                    @if ($category->id === $post->category_id)
                      selected
                    @endif
                    >
                      {{ $category->name }}
                    </option>
                  @endforeach
                </select>
              </div>
              <div class="from-group">
                <label for="">Content</label>
                <textarea name="content" rows="5" class="form-control" placeholder="Post content">{{ $post->content }}</textarea>
              </div><br>
              <div class="from-group">
                <input type="submit" name="" class="btn btn-primary" value="Save">
              </div>
            </form>
          </div>
      </div>


    </div>

  </div>
</div>
@endsection()
