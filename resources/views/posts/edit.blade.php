@extends('layouts.master')

@section('content')
<div class="container view">
	<section>
		<h1 class="section-title">Edit Post</h1>
		<form method="POST" action="{{ action('PostsController@update', $post->id) }}">
		{!! csrf_field() !!}
		{{ method_field('PUT') }}
			<div class="form-group">
				<label for="title">Title</label>
				<input 
					type="text" 
					class="form-control"
					name="title" 
					value="{{ old('title')?: $post->title }}">	
			</div>
			@include('partials.error', ['field' => 'title'])
			<div class="form-group">
				<label for="url">Url</label>
				<input 
					type="text" 
					class="form-control"
					name="url" 
					value="{{ old('url')?: $post->url }}">				
			</div>
			@include('partials.error', ['field' => 'url'])
			<div class="form-group">
				<label for="content">Content</label>
				<input 
					type="text" 
					class="form-control"
					name="content" 
					value="{{ old('content')?: $post->content }}">	
			</div>
			@include('partials.error', ['field' => 'content'])
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
		<br>
		<a href="{{ action('PostsController@index')}}">Go Back to Main Page</a>
	</section>
</div>
@stop