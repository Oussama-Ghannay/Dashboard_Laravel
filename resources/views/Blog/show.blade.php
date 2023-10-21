@extends('index')  


@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">blog detail</div>
  <div class="card-body">
        <div class="card-body">
        <h1 class="card-text">Nom : {{ $blog->title }}</h1>
        <p class="card-text">Description : {{ $blog->content }}</p>
        
        
  </div>
    </hr>
  </div>
</div>
@endsection