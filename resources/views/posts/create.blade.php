@extends('layouts.master')

@section('content')
	<form method="POST" action="{{ action('PostsController@store') }}">
		{!! csrf_field() !!}
		Title: <input type="text" name="title" value="{{ old('title') }}"><br>
		Content: <input type="text" name="content" value="{{ old('content') }}"><br>
		URL: <input type="text" name="url" value="{{ old('url') }}"><br>
		<input type="submit">
	</form>
@stop