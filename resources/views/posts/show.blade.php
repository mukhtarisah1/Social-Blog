@extends('layouts.app')
@include('inc.messages')
@section('content')
   <div class="container">
       
        <button type="submit" class="btn btn-secondary mb-5" ><a href="/posts" style="text-decoration:none; color:white;">Go back</a> </button>
        
        <h1>{{$post->title}}</h1>
        <div class="card card-body bg-light">
            <h4>{{$post->body}}</h4>
            <hr>
            <small>Written on {{$post->created_at}}</small>
        </div>  
    @if(!Auth::guest()) 
        @if(Auth::user()->id == $post->user_id)
            <button class="btn btn-primary mt-3"style="display:inline" > <a href="/post/{{$post->id}}/edit" style="text-decoration:none; color:white;" >Edit</a> </button>

            <form action="/post/{{$post->id}}" method="post" >
                @method('DELETE')
                @csrf    
                <button type="submit" class="btn btn-danger">Delete</button>
            </form> 
        @endif
    @endif  
   </div>
@endsection