<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Support\Facades\Log;
use App\User;
use Illuminate\Support\Facades\Auth;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }
    public function index(Request $request)
    {
        // $searchItem = $request->input('search');
        $posts = Post::with('user');
        
        //$data = compact('posts');

        return view('posts.index')->with('posts', Post::orderBy('created_at', 'desc')->paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, Post::rules());

        $post = new Post;
        $post->title = $request->input('title');
        $post->url = $request->input('url');
        $post->content = $request->input('content');
        $post->created_by = Auth::user()->id;
        $post->save();
        $request->session()->flash('message', 'Your post was created!');
        return redirect( action('PostsController@index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        if (!$post) {
            Log::info("Post with $id not found.");
            abort(404);
        }

        $data = compact('post');

        return view('posts.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        if (!$post) {
            Log::info("Post with $id not found for edit.");
            abort(404);
        }

        $data = compact('post');

        return view('posts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, Post::rules());

        $post = Post::find($id);
        //dd($post);
        if (!$post) {
            Log::info("Post with $id not found for edit.");
            abort(404);
        }

        $post->title = $request->input('title');
        $post->url = $request->input('url');
        $post->content = $request->input('content');
        $post->save();
        $request->session()->flash('message', 'Your post has been updated!');
        return redirect()->action('PostsController@show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        $post = Post::find($id);

        if (!$post) {
            Log::info("Post with $id not found for delete.");
            abort(404);
        }

        $post->delete();
        $request->session()->flash('message', 'Your post has been deleted!');
        return redirect()->action('UsersController@index');
    }

    public function searchByPostOrUser(Request $request) {

        $searchItem = $request->input('search');

        $posts = Post::search($searchItem)->with('user')->paginate(10);
        return view('posts.index')->with('posts', $posts);

    }
}
