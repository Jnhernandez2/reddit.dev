@extends('layouts.master')

@section('content')
	
@foreach ($posts as $post)
	<h3>Title</h3>	
    <div> {{ $post->title }} </div> 
    <h3>URL</h3>
    <div> {{ $post->url }} </div>
    <h3>Content</h3>
    <div> {{ $post->content }} </div><br>
    <h4>Posted</h4>
    <div>{!!$post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A') !!}</div><br>
    <div>---------------------------------------------------------<div>
@endforeach
{!! $posts->render() !!}
	
	
@stop