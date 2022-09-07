@extends('layouts.app')

@section('content')
<div class="container">
   <h1>{{$title}}</h1>
   <ul>
        @foreach ($services as $service)
            <li>
                {{$service}}
            </li>
        @endforeach
   </ul>
        
</div>
@endsection