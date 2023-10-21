

@extends('index')  


@section('content')
 
       
   


{{-- **************************** --}}

<div class="container-fluid pt-4 px-4">
<div class="col-12">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Basic Form</h6>


       
        <form  enctype="multipart/form-data" action="{{ url('types') }}" method="post">
            {!! csrf_field() !!}
            
            <div class="mb-3">
                <label>Name</label></br>
                <input type="text" name="name" id="name" class="form-control"></br>
            </div>
            @error('name')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror

                <input type="submit" value="Save" class="btn btn-success"></br>




        </form>
    </div>
</div>
</div>










{{-- ****************************** --}}
 
@stop