@extends('layouts.app')

@section('content')

<div class="container">
  <form class="" action="{{ route('post.store') }}" method="post">
    {{ csrf_field() }}
    <div class="from-group has-feedback{{ $errors->has('title') ? 'has-error' : ''}}">
      <label for="">Title</label>
      <input type="text" class="form-control" name="title" placeholder="Post title" value="{{ old('title')}}">
      @if ($errors->has('title'))
        <span class="help-block">
          <p>{{ $errors ->first('title') }}</p>
        </span>
      @endif
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
      <textarea name="content" class="form-control has-feedback{{ $errors->has('content') ? 'has-error' : ''}}" rows="5" placeholder="Post content">
        {{ old('content')}}
      </textarea>
        @if ($errors->has('content'))
          <span class="help-block">
            <p>{{ $errors ->first('content') }}</p>
          </span>
        @endif
    </div><br>
    <div class="from-group">
      <input type="submit" name="" class="btn btn-primary" value="Save">
    </div>
  </form>

</div>
@endsection()
