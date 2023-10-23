@extends('index')  




@section('content')
     <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                        <div class="bg-secondary rounded h-100 p-4">
                        <a href="{{ url('/ticket/create') }}" class="btn btn-success btn-sm" title="Add New Ticket">
                            Add New
                        </a> 
            </div>
            <!-- Form End -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Affichage les Tickets</h6>
                            <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Prix</th>
                                        <th scope="col">Date d'achat</th>
                                        <th scope="col">Event</th>
                                        
            
                                        <th scope="col">   Action  </th>

                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($ticket as $item)
                                    <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->prix }}</td>
                                    <td>{{ $item->date_achat }}</td>
                                    <td>{{ $item->event_id }}</td>
                                    
                                    
                                  
                                    <td>
    <div class="btn-group" role="group" aria-label="Actions">
        <a href="{{ url('/ticket/' . $item->id) }}" title="View ticket" class="btn btn-primary mx-1"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
        <a href="{{ url('/ticket/' . $item->id . '/edit') }}" title="Edit ticket" class="btn btn-primary mx-1"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
        <form method="POST" action="{{ url('/ticket' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-primary mx-1" title="Delete ticket" onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>

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