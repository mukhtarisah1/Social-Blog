@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <button type="submit" class="btn btn-secondary mb-3" ><a href="/post/create" style="text-decoration:none; color:white;">Create Post</a> </button>
                    <h3>Your blog posts</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                              <th scope="col">Title</th>
                              <th scope="col"></th>
                              <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($posts as $post)
                                    <td>{{$post->title}}</td>
                                    <td>
                                        <button type="submit" class="btn btn-secondary mb-3" ><a href="/post/{{$post->id}}/edit" style="text-decoration:none; color:white;">Edit</a> </button>
                                    </td>
                                    <td>
                                        <form action="/post/{{$post->id}}" method="post" >
                                            @method('DELETE')
                                            @csrf    
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>                                     
                                    </td>
                                     
                                 @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
