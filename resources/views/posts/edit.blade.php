@extends('layouts.app')
@section('content')
<div class="container">
    @include('inc.messages')
    <form action="/post/{{$post->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="container">
    
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Title</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="{{$post->title}}">
            </div>
    
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Body</label>
              <textarea class="form-control" id="textarea" rows="5" name="body"> {{$post->body}}</textarea>
            </div>
         </div>
         <button type="submit" class="btn btn-primary">Submit</button>
    
    </form>
</div>

   
   
@endsection