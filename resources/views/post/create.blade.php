@extends('layouts.app')

@section('content')

<div class="container">
  <form class="" action="{{ route('post.store') }}" method="post">
    {{ csrf_field() }}
    <div class="from-group">
      <label for="">Title</label>
      <input type="text" class="form-control" name="title" placeholder="Post title">
    </div><br>
    <div class="from-group">
      <label for="">Category</label>
      <select class="form-control" name="category_id">
        @foreach( $categories as $category )
          <option value="{{ $category->id}}">{{ $category->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="from-group">
      <label for="">Content</label>
      <textarea name="content" rows="5" class="form-control" placeholder="Post content"></textarea>
    </div><br>
    <div class="from-group">
      <input type="submit" name="" class="btn btn-primary" value="Save">
    </div>
  </form>

</div>
@endsection()
