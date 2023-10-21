@extends('index')  


@section('content')
 
<div class="container-fluid pt-4 px-4">
<div class="col-12">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Basic Form</h6>


    <form action="{{ url('types/' .$type->id) }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PATCH')
  
      <div class="mb-3">
          <label for="name">Name</label><br>
          <input type="text" name="name" id="name" value="{{ $type->name }}" class="form-control"><br>
      </div>
      @error('name')
      <div class="alert alert-danger">{{ $message }}</div>
     @enderror

  
      <input type="submit" value="Update" class="btn btn-success"><br>
  </form>
  
</div>
</div>
</div>

 
@stop