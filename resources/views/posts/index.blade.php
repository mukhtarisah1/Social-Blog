@extends('layouts.app')
@section('content')
   <div class="container">
    <h1>Posts</h1>
        @if (count($posts) > 0)
            @foreach ($posts as $post)
                <div class="card card-body bg-light mt-5">
                    <h3 class="card-title" ><a href="/post/{{$post->id}}" style="text-decoration:none">{{$post->title}}</a></h3>
                    <h4>{{$post->body}}</h4>
                    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
                </div>
            @endforeach
        @else
            <h3> No Posts Available</h3>
        @endif
            
   </div>
   <div class=" m-5">
    {{$posts->links()}}
   </div>
   
@endsection