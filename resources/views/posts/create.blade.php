@extends('layouts.app')
@section('content')
<div class="container">
    @include('inc.messages')
    <form action="/post" method="POST">
        @csrf
        <div class="container">
    
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Title</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" name="title" placeholder="Enter title here">
            </div>
    
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Body</label>
              <textarea class="form-control" id="textarea" rows="5" name="body"></textarea>
            </div>
         </div>
         <button type="submit" class="btn btn-primary">Submit</button>
    
    </form>
</div>

   
   
@endsection