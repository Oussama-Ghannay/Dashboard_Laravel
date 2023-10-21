@extends('index')  
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Create New blog</div>
  <div class="card-body">
       
      <form action="{{ url('blog') }}" method="post">
        {!! csrf_field() !!}
        <label>Title</label></br>
        <input type="text"   id="title" name="title" class="form-control"></br>
        <label>Description</label></br>
        @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
        <input type="text"  id="content" name="content"class="form-control"></br>
        @error('content')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
    
  </div>
</div>
  
@endsection