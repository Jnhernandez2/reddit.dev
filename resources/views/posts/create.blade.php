@extends('layouts.master')

@section('content')
<div class="container view">
	<section>
		<h1 class="section-title">Create a New Post</h1>
		<form method="POST" action="{{ action('PostsController@store') }}">
		{!! csrf_field() !!}
			<div class="form-group">
				<label for="title">Title</label>
				<input 
					type="text" 
					class="form-control"
					name="title" 
					value="{{ old('title') }}">	
			</div>
			@include('partials.error', ['field' => 'title'])
			<div class="form-group">
				<label for="content">Content</label>
				<input 
					type="text" 
					class="form-control"
					name="content" 
					value="{{ old('content') }}">	
			</div>
			@include('partials.error', ['field' => 'content'])
			<div class="form-group">
				<label for="url">Url</label>
				<input 
					type="text" 
					class="form-control"
					name="url" 
					value="{{ old('url') }}">				
			</div>
			@include('partials.error', ['field' => 'url'])
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
		<br>
		<a href="{{ action('PostsController@index')}}">Go Back to Main Page</a>
	</section>
</div>
@stop