<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reddit</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
    crossorigin="anonymous">
</head>
<body>
	@if (!Auth::check())
	<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ action('PostsController@index') }}">Reddit.dev</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <form class="navbar-form navbar-right">
        <a href="{{ action('Auth\AuthController@getLogin') }}" class="btn btn-primary">Login</a>
      </form>
      <form class="navbar-form navbar-right">
      	<a href="{{ action('Auth\AuthController@getRegister') }}">Don't have an account? Create one!</a>
      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	@else
	<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ action('PostsController@index') }}">Reddit.dev</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <form class="navbar-form navbar-left">
      	<a href="{{ action('UsersController@index', Auth::user()->id) }}" class="btn btn-primary">My Account</a>
      </form>
      <form class="navbar-form navbar-left">
      	<a href="{{ action('PostsController@create') }}" class="btn btn-primary">Create New Post</a>
      </form>
      <form class="navbar-form navbar-right">
        <a href="{{ action('Auth\AuthController@getLogout') }}" class="btn btn-primary">Logout</a>
      </form>
      <form method="get" class="navbar-form navbar-right" action="{{ action('PostsController@searchByPostOrUser') }}">
      	{!! csrf_field() !!}
        <div class="form-group">
          <input type="text" name="search" id="search" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	@endif
	@if (session()->has('message'))
    	<div class="alert alert-success">{{ session('message') }}</div>
	@endif
    @yield('content')
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" 
    crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</body>
</html>