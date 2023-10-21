@extends('index')  


@section('content')
 
 


<div class="container-fluid pt-4 px-4">
<div class="col-sm-12">
  <div class="bg-secondary rounded h-100 p-4">
      <h6 class="mb-4">Types Details</h6>
      <div class="m-n2">
        <div class="card-body">
   
    
          <div  class="p-4">
          <h5 class="card-title">title : {{ $type->name }}</h5>

          <h6 class="mt-4">Musics with this Type:</h6>
          <ul>
              @foreach($musics as $music)
                  <li>{{ $music->title }}</li>
              @endforeach
          </ul>
          

          

       
          
          
          </p>





  
  
    </div>
      
      </div>
  </div>
</div>

</div>


@stop