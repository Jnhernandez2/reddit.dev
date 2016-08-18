@extends('layouts.master')

@section('content')
	<form method="POST" action="{{ action('PostsController@store') }}">
		{!! csrf_field() !!}
		Title: <input type="text" name="title" value="{{ old('title') }}"><br>
		@include('partials.error', ['field' => 'title'])
		<br>
		Content: <input type="text" name="content" value="{{ old('content') }}"><br>
		@include('partials.error', ['field' => 'content'])
		<br>
		URL: <input type="text" name="url" value="{{ old('url') }}"><br>
		@include('partials.error', ['field' => 'url'])
		<br>
		<input type="submit">
	</form>
@stop