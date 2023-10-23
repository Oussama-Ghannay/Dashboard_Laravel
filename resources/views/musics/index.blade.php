@extends('index')  




@section('content')







{{-- **************** --}}
<div class="container-fluid pt-4 px-4">
<div class="col-12">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Responsive Table</h6>

        <a href="{{ url('/musicindex/create') }}" class="btn btn-success btn-sm" title="Add New Music">
            <i class="fa fa-plus" aria-hidden="true"></i> Add New
            </a>


        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
               


                        <th scope="col">#</th>

                        <th scope="col">title</th>
                        <th scope="col">audio</th>
                        <th scope="col">type</th>
                        <th scope="col">QRCodeType</th>


                        <th scope="col">Propritaire</th>

                        
                        <th scope="col">album</th>

                        <th>Actions</th>



                    </tr>
                </thead>
                <tbody>

                    @foreach($musics as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->title }}</td>

                        <td>
                            {{-- {{ $item->audio }} --}}

            
                            <audio controls>
                                <source src="{{ asset($item->audio) }}" type="audio/mpeg">
                                Votre navigateur ne supporte pas l'élément audio.
                            </audio>

                       
                        
                         
                        
                        
                        
                        </td>

                        <td>{{ $item->type->name }}</td>

                        <td style="background-color: white;">{!! DNS2D::getBarcodeHTML($item->type->name, 'QRCODE', 5, 5) !!}</td>





                       





                        <td>{{ $item->user->name }}</td>

                        <td>{{ $item->album }}</td>

                      

                        

                        <td>
                            <a href="{{ url('/musicindex/' . $item->id) }}" title="View musics"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                            <a href="{{ url('/musicindex/' . $item->id . '/edit') }}" title="Edit musics"><button class="btn btn-success btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                            <form method="POST" action="{{ url('/musicindex' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete musics" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                            </form>
                        </td>
                    </tr>

                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

</div>




{{-- ******************* --}}




@endsection

