@extends('index')  


@section('content')
 
 


<div class="container-fluid pt-4 px-4">
<div class="col-sm-12">
  <div class="bg-secondary rounded h-100 p-4">
      <h6 class="mb-4">Music Details</h6>
      <div class="m-n2">
        <div class="card-body">
   
    
          <div  class="p-4">
          <h5 class="card-title">title : {{ $music->title }}</h5>
          <p class="card-text">album : {{ $music->album }}</p>
          <p class="card-text">type : {{ $music->type->name }}</p>


          

          <p class="card-text">album 
            <audio   controls >
              <source src="/{{ $music->audio }}" type="audio/mpeg">
              Votre navigateur ne supporte pas l'élément audio.
          </audio>
          
          
          </p>





  
  
    </div>
      
      </div>
  </div>
</div>

</div>


@stop