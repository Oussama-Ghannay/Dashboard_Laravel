@extends('index')  
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Edit  Event</div>
  <div class="card-body">
       
      <form action="{{ url('event') }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <label>Nom</label></br>
        <input type="text" name="nom" id="nom" class="form-control"></br>
        <label>Description</label></br>
        <input type="text" name="description" id="description" class="form-control"></br>
        <label>Date</label></br>
        <input type="date" name="date" id="date" class="form-control"></br>
        <label>Lieu</label></br>
        <input type="lieu" name="lieu" id="lieu" class="form-control"></br>
        <label>Artiste</label></br>
        <input type="artiste" name="artiste" id="artiste" class="form-control"></br>
        <label>Categorie</label></br>
        <input type="categorie" name="categorie" id="categorie" class="form-control"></br>
        
 
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
    
  </div>
</div>
  
@endsection