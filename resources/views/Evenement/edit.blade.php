@extends('index')  
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Edit  Event</div>
  <div class="card-body">
       
<form action="{{ url('event/' .$event->id) }}" method="post">       
     {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$event->id}}" id="id" />
        <label>Nom</label></br>
        <input type="nom" name="nom" id="nom" value="{{$event->nom}}" class="form-control"></br>
        @error('nom')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
        <label>Description</label></br>
        <input type="description" name="description" id="description" value="{{$event->description}}" class="form-control"></br>
        @error('description')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
        <label>Date</label></br>
        <input type="date" name="date" id="date" value="{{$event->date}}" class="form-control"></br>
        @error('nom')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
        <label>Lieu</label></br>
        <input type="lieu" name="lieu" id="lieu" value="{{$event->lieu}}" class="form-control"></br>
        @error('nom')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
        <label>Artiste</label></br>
        <input type="artiste" name="artiste" id="artiste" value="{{$event->artiste}}" class="form-control"></br>
        @error('nom')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
        <label>Categorie</label></br>
        <input type="categorie" name="categorie" id="categorie" value="{{$event->categorie}}" class="form-control"></br>
        @error('nom')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
        
        
        
        
        


        
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
    
  </div>
</div>
  
@endsection

