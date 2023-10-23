<!DOCTYPE html>
<html>
<head>
    <title>Event List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<h1>Event List</h1>
<p>{{ $date }}</p>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Description</th>
        <th>Date</th>
        <th>Lieu</th>
        <th>Artiste</th>
        <th>Categorie</th>
    </tr>
    @foreach($events as $event)
        <tr>
            <td>{{ $event->id  }}</td>
            <td>{{ $event->nom  }}</td>
            <td>{{ $event->description }}</td>
            <td>{{ $event->date }}</td>
            <td>{{ $event->lieu }}</td>
            <td>{{ $event->artiste }}</td>
            <td>{{ $event->categorie }}</td>
        </tr>
    @endforeach
</table>

</body>
</html>