@extends('index')  


@section('content')
 
<div class="container-fluid pt-4 px-4">
<div class="col-12">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Basic Form</h6>


      
      {{-- <form action="{{ url('musicindex/' .$musics->id) }}" method="post">
        {!! csrf_field() !!}



        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$musics->id}}" id="id" />
        
        <div class="mb-3">

        <label>title</label></br>
        <input type="text" name="title" id="title" value="{{$musics->title}}" class="form-control"></br>
        </div>

        <div class="mb-3">

        <label>artist</label></br>
        <input type="text" name="artist" id="artist" value="{{$musics->artist}}" class="form-control"></br>
        </div>

        <div class="mb-3">

        <label>album</label></br>
        <input type="text" name="album" id="album" value="{{$musics->album}}" class="form-control"></br>
        </div>


      
    
        <div class="mb-3">
          <label>audio</label></br>
          <input type="text" name="audio" id="audio" value="{{$musics->audio}}" class="form-control"></br>
        </div>
        
        


        
        
        
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form> --}}
   


    <form action="{{ url('musicindex/' .$musics->id) }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PATCH')
  
      <div class="mb-3">
          <label for="title">Title</label><br>
          <input type="text" name="title" id="title" value="{{ $musics->title }}" class="form-control"><br>
      </div>
      @error('title')
      <div class="alert alert-danger">{{ $message }}</div>
     @enderror
  
      {{-- <div class="mb-3">
          <label for="artist">Artist</label><br>
          <input type="text" name="artist" id="artist" value="{{ $musics->artist }}" class="form-control"><br>
      </div>
      @error('artist')
      <div class="alert alert-danger">{{ $message }}</div>
     @enderror --}}

  
      <div class="mb-3">
          <label for="album">Album</label><br>
          <input type="text" name="album" id="album" value="{{ $musics->album }}" class="form-control"><br>
      </div>
      @error('album')
      <div class="alert alert-danger">{{ $message }}</div>
     @enderror
  
      <div class="mb-3">
          <label for="audio">Audio</label><br>
          <input type="file" name="audio" id="audio" class="form-control bg-dark">
      </div>
      @error('audio')
      <div class="alert alert-danger">{{ $message }}</div>
     @enderror



     <div class="mb-3">
      <label for="type_id">Type</label><br>
      <select name="type_id" id="type_id" class="form-control">
          @foreach($types as $type)
              <option value="{{ $type->id }}" {{ $musics->type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
              @endforeach
      </select>
  </div>
  
      <input type="submit" value="Update" class="btn btn-success"><br>
  </form>
  
</div>
</div>
</div>

 
@stop