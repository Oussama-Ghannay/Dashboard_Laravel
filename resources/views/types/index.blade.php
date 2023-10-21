@extends('index')  




@section('content')







{{-- **************** --}}
<div class="container-fluid pt-4 px-4">
<div class="col-12">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Responsive Table</h6>

        <a href="{{ url('/types/create') }}" class="btn btn-success btn-sm" title="Add New Type">
            <i class="fa fa-plus" aria-hidden="true"></i> Add New
            </a>


        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
               


                        <th scope="col">#</th>

                        <th scope="col">Name</th>
                        

                        <th>Actions</th>



                    </tr>
                </thead>
                <tbody>

                    @foreach($types as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->name }}</td>

                        <td>
                            <a href="{{ url('/types/' . $item->id) }}" title="View types"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                            <a href="{{ url('/types/' . $item->id . '/edit') }}" title="Edit musics"><button class="btn btn-success btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                            <form method="POST" action="{{ url('/types' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
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

