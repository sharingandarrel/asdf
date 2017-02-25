<!DOCTYPE html>
<html lang="en">
<head>
  <title>Records Management</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="">Record Management</a>
    </div>
      <ul class="nav navbar-nav">
        @if(Auth::user())
          <span class="caret"></span>
      </ul>

    <ul class="nav navbar-nav navbar-right">

      <li><a href="{{URL::to('/logout')}}">
      <span style="color: white"> {{ucwords(Auth::user()->name)}} &nbsp; </span>
      <span class="glyphicon glyphicon-log-in"></span>

       Logout</a></li>

      @else

      <li><a href="{{URL::to('/register')}}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="{{URL::to('/signin')}}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>

      @endif

    </ul>

  </div>
</nav>
  
<div class="container">
  
  @yield('content')

</div>

</body>
</html>