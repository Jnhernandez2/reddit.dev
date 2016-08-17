@extends('layouts.master')

@section('content')
	<h1>{{$message}}</h1><br>
    <h2>Guess: {{$guess}}</h2><br>
    <h2>Roll: {{$roll}}</h2>

    <a href="{{ action('HomeController@rollDice', 1) }}">1</a><br>
    <br>
    <a href="{{ action('HomeController@rollDice', 2) }}">2</a><br>
    <br>
    <a href="{{ action('HomeController@rollDice', 3) }}">3</a><br>
    <br>
    <a href="{{ action('HomeController@rollDice', 4) }}">4</a><br>
    <br>
    <a href="{{ action('HomeController@rollDice', 5) }}">5</a><br>
    <br>
    <a href="{{ action('HomeController@rollDice', 6) }}">6</a><br>
    <br>

@stop