@extends('index')
@section('content')

<div class="card" style="margin:20px;">
    <div class="card-header">Create New Ticket</div>
    <div class="card-body">

        <form action="{{ url('ticket') }}" method="post">
            {!! csrf_field() !!}
            <label>Prix</label><br>
            <input type="number" step="0.01" name="prix" id="prix" class="form-control"><br>

            @error('prix')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label>Date d'achat</label><br>
            <input type="date" name="date_achat" id="date_achat" class="form-control"><br>

            @error('date_achat')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label for="event_id">Type</label><br>
            <select name="event_id" id="event_id" class="form-control bg-dark">
                @foreach($events as $event)
                    <option value="{{ $event->id }}">{{ $event->nom }}</option>
                @endforeach
            </select>

            <input type="submit" value="Save" class="btn btn-success"><br>
        </form>

    </div>
</div>

@endsection
