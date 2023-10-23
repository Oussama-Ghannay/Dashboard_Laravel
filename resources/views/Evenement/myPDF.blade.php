<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Event List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Event List</h1>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Date</th>
                <th>Lieu</th>
                <th>Artiste</th>
                <th>Categorie</th>
            </tr>
        </thead>
        <tbody>
        @foreach($events as $event)
<div class="card">
    <div class="card-header">Events Page</div>
    <div class="card-body">
        <div class="card-body">
            <h5 class="card-title">Nom : {{ $event->nom }}</h5>
            <img src="{{ asset('images/' . $event->image) }}" alt="Event Image" width="100" height="100">
            <p class="card-text">Description : {{ $event->description }}</p>
            <p class="card-text">Date : {{ $event->date }}</p>
            <p class="card-text">Lieu : {{ $event->lieu }}</p>
            <p class="card-text">Artiste : {{ $event->artiste }}</p>
            <p class="card-text">Categorie : {{ $event->categorie }}</p>
        </div>
    </div>
</div>
@endforeach
        </tbody>
    </table>
</body>
</html>
