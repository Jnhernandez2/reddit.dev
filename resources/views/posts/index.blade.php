@extends('layouts.master')

@section('content')
    <div class="container view">
        <section>
            <h1 class="section-title">Reddit Front Page</h1>
        	<table class="table table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Url</th>
                        <th>Created By</th>
                        <th>Posted</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
@foreach ($posts as $post)
                	<tr>
                        <td> {{ $post->id }} </td>
                        <td> {{ $post->title }} </td>                 
                        <td> {{ $post->url }} </td>              
                        <td> <a href="{{ action('UsersController@show', $post->user->id) }}">{{ $post->user->name }}</a> </td>    
                        <td>{!! $post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A') !!}</td>
                        <td><a href="{{ action('PostsController@show', $post->id)}}" class="btn btn-primary"><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>    Go To Post</a></td>
                    </tr>
@endforeach            
                </tbody>
            </table>
            <div class="text-center">
                <div>{!! $posts->render() !!}</div>
            </div>
        </section>
    </div>
	
	
@stop