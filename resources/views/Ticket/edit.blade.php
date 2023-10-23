@extends('index')  


@section('content')
 
<div class="container-fluid pt-4 px-4">
<div class="col-12">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Edit Ticket</h6>


    <form action="{{ url('ticket/' .$ticket->id) }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PATCH')
  
      <div class="mb-3">
          <label for="name">Prix</label><br>
          <input type="prix" name="prix" id="prix" value="{{ $ticket->prix }}" class="form-control"><br>
      </div>
      @error('prix')
      <div class="alert alert-danger">{{ $message }}</div>
     @enderror

     <label>Date d'achat</label></br>
        <input type="date_achat" name="date_achat" id="date_achat" value="{{$ticket->date_achat}}" class="form-control"></br>
        @error('date_achat')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="mb-3">
      <label for="event_id">Event</label><br>
      <select name="event_id" id="event_id" class="form-control">
          @foreach($events as $event)
              <option value="{{ $event->id }}" {{ $ticket->event_id == $event->id ? 'selected' : '' }}>{{ $event->nom }}</option>
              @endforeach
      </select>
  </div>

  
      <input type="submit" value="Update" class="btn btn-success"><br>
  </form>
  
</div>
</div>
</div>

 
@stop