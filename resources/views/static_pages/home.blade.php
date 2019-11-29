@extends('layouts.default')

@section('content')
  <div class="jumbotron">
   <h1>Hello Miracle-</h1>
   <p class="lead">你现在看到的是<a href="">Miracle- 的微博</a>
   </p>
   <p>
     Everything begins from here.
   </p>
   <p>
     <a class="btn btn-lg btn-success" href="{{ route('signup') }}" role="button">Sign Up</a>
   </p>
  </div>
@stop
