@extends('layouts.master')

@section('content')
	<div class="container">
		<h1> {{ $post->title }} <h1>
		<h3><a href="{{ action('UsersController@show', $post->user->id) }}"> {{ $post->user->name }} </a></h3>	
		<h6> {{ $post->url }} <h6><br>
		<p> {{ $post->content }} </p><br>
		@if (Auth::user()->id == $post->created_by)
		<a href="{{ action('PostsController@edit', $post->id)}}" class="btn btn-success">Edit</a>
		<br>
		<form method="POST" action="{{ action('PostsController@destroy', $post->id)}}">
	        <input type="hidden" name="_method" value="DELETE">
	        {{ method_field('DELETE') }}
	        {!! csrf_field() !!}
	        <button type="submit" class="btn btn-danger">Delete</button>
	    </form><br>
	    @endif
	    <a href="{{ action('PostsController@index')}}">Go Back to Main Page</a>
	</div>
@stop