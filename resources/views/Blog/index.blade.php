@extends('index')  




@section('content')
     <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                        <div class="bg-secondary rounded h-100 p-4">
                        <a href="{{ url('/blog/create') }}" class="btn btn-success btn-sm" title="Add New blog">
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
                                          
            
                                        <th scope="col">   Action  </th>

                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($blogg as $item)
                                    <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->content }}</td>
                                   
                                    <td>
    <div class="btn-group" role="group" aria-label="Actions">
        <a href="{{ url('/blog/' . $item->id) }}" title="View blog" class="btn btn-primary mx-1"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
        <a href="{{ url('/blog/' . $item->id . '/edit') }}" title="Edit blog" class="btn btn-primary mx-1"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
        <form method="POST" action="{{ url('/blog' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-primary mx-1" title="Delete blog" onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>

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