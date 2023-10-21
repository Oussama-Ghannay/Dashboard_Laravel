@extends('index')  




@section('content')
     <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                        <div class="bg-secondary rounded h-100 p-4">
                        <a href="{{ url('/event/create') }}" class="btn btn-success btn-sm" title="Add New Event">
                            Add New
                        </a> 
            </div>
            <!-- Form End -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Affichage des évenements</h6>
                            <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Lieu</th>
                                        <th scope="col">Artiste</th>
                                        <th scope="col">Categorie</th> 
            
                                        <th scope="col">   Action  </th>

                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($event as $item)
                                    <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nom }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->date }}</td>
                                    <td>{{ $item->lieu }}</td>
                                    <td>{{ $item->artiste }}</td>
                                    <td>{{ $item->categorie }}</td>
                                    
                                    
                                  
                                    <td>
    <div class="btn-group" role="group" aria-label="Actions">
        <a href="{{ url('/event/' . $item->id) }}" title="View event" class="btn btn-primary mx-1"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
        <a href="{{ url('/event/' . $item->id . '/edit') }}" title="Edit event" class="btn btn-primary mx-1"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
        <form method="POST" action="{{ url('/event' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-primary mx-1" title="Delete Event" onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>

        </form>
    </div>
</td>

                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    </div>
                
                   
                   
                   
                    
                  
                </div>
            </div>



@endsection