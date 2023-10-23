@extends('index')  


@section('content')
 
 


<div class="container-fluid pt-4 px-4">
<div class="col-sm-12">

</div>

<div class="col-sm-12 col-xl-6">
  <div class="bg-secondary rounded h-100 p-4">
      <h6 class="mb-4">Music Details</h6>
      <div class="owl-carousel testimonial-carousel">
          
        
        <div class="testimonial-item text-center">

          <audio   controls >
            <source src="/{{ $music->audio }}" type="audio/mpeg">
            Votre navigateur ne supporte pas l'élément audio.
        </audio> 
              <h5 class="mb-1"></span>{{ $music->user->name }}</h5>
              <h5 class="mb-1">title : {{ $music->title }}</h5>
              <p>Type :{{ $music->type->name }}</p>

              <p class="mb-0">album : {{ $music->album }}</p>


          </div>
         



      </div>
  </div>
</div>

</div>


@stop