<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','show']]);
    }
    public function index(){
        //$posts = Post::all();
        //$posts = Post::where('title', 'post two')->get();

        //$posts = DB::SELECT("select * from posts");
        //$user = User::with('post')->get();
        //dd($user);
        $posts = Post::orderBy('title', 'desc')->paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function create(){
        return view('posts.create');
    }

    public function show($id){
        $post=Post::findOrfail($id);
        return view('posts.show', compact('post'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'title'=>'required',
            'body'=>'required'
        ]);
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->save();
        
        return redirect('/posts')->with('success', 'Post Created');
    }

    public function edit($id){
        $post= Post::findOrFail($id);
        //check for correct user
        if(auth()->user()->id !== $post->user_id){
            return redirect('/post')->with('error', 'Unauthorized page');
        }
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'title'=>'required',
            'body'=>'required'
        ]);
        $post = Post::findOrFail($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();
        return redirect('/posts')->with('success', 'Post Created');
    }

    public function destroy($id){
        
        $post = Post::findOrFail($id);
        if(auth()->user()->id !== $post->user_id){
            return redirect('/post')->with('error', 'Unauthorized page');
        }
        $post->delete();
        return redirect('/posts')->with('success', 'Post created');
    }
}
