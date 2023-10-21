@extends('index')  
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Create New Event</div>
  <div class="card-body">
       
      <form action="{{ url('event') }}" method="post">
        {!! csrf_field() !!}
        <label>Nom</label></br>
        <input type="text" name="nom" id="nom" class="form-control"></br>
        @error('nom')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
        <label>Description</label></br>
        <input type="text" name="description" id="description" class="form-control"></br>
        @error('description')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
        <label>Date</label></br>
        <input type="date" name="date" id="date" class="form-control"></br>
        @error('date')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
        <label>Lieu</label></br>
        <input type="lieu" name="lieu" id="lieu" class="form-control"></br>
        @error('lieu')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
        <label>Artiste</label></br>
        <input type="artiste" name="artiste" id="artiste" class="form-control"></br>
        @error('artiste')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
        <label>Categorie</label></br>
        <input type="categorie" name="categorie" id="categorie" class="form-control"></br>
        @error('categorie')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
       
        
        
        


        
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
    
  </div>
</div>
  
@endsection