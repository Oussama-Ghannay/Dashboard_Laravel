@extends('index')  


@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Events Page</div>
  <div class="card-body">
        <div class="card-body">
        <h5 class="card-title">Nom : {{ $event->nom }}</h5>
        <p class="card-text">Description : {{ $event->description }}</p>
        <p class="card-text">Date : {{ $event->date }}</p>
        <p class="card-text">Lieu : {{ $event->lieu }}</p>
        <p class="card-text">Artiste : {{ $event->artiste }}</p>
        <p class="card-text">Categorie : {{ $event->categorie }}</p>
        
  </div>
    </hr>
  </div>
</div>
@endsection