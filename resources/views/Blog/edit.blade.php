@extends('index')  
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Create New blog</div>
  <div class="card-body">
       
      <form action="{{ route('blog.update', $blog->id) }}" method="post">
      @csrf
      @method('PATCH')
        <label>Title</label></br>
        <input type="text"   id="title" name="title" class="form-control" value="{{ old('title', $blog->title) }}"></br>
        <label>Description</label></br>
        <input type="text"  id="content" name="content"class="form-control" value="{{ old('content', $blog->content) }}"> </br>
        
        <input type="submit" value="update" class="btn btn-success"></br>
    </form>
    
  </div>
</div>
  
@endsection