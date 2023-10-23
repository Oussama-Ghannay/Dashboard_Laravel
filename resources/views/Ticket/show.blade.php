@extends('index')  


@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Tickets Page</div>
  <div class="card-body">
        <div class="card-body">
        <p class="card-text">Prix : {{ $ticket->prix }}</p>
        <p class="card-text">Date d'achat : {{ $ticket->date_achat }}</p>
        <h5 class="card-title">Event : {{ $ticket->event_id }}</h5>


        
  </div>
    </hr>
  </div>
</div>
@endsection