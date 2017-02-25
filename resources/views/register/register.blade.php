@extends('layout');

@section('content')

  <h2>R e g i s t e r </h2>

  @if(Session::has('success'))
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-success">
            {{Session::get('success')}}
           </div>
          </div>   
      </div>
  @endif


  <form action="register_action" method="post">

<input type="hidden" name="_token" value="{{csrf_token()}}">

    <div class="form-group">
      <label for="name">Name:</label>
      <input type="name" name="username" class="form-control" id="name" placeholder="Enter Name">

      @if($errors->has('username'))
        <p> {{$errors->first('username')}} </p>
      @endif

    </div>

     <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email">

      @if($errors->has('email'))
        <p> {{$errors->first('email')}} </p>
      @endif


    </div>

    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter password">

      @if($errors->has('password'))
        <p> {{$errors->first('password')}} </p>
      @endif

    </div>

     <div class="form-group">
      <label for="pwd">Confirm Password:</label>
      <input type="password" name="cpassword" class="form-control" id="pwd" placeholder="Confirm password">

      @if($errors->has('cpassword'))
        <p> {{$errors->first('cpassword')}} </p>
      @endif

    </div>

    <div class="checkbox">
      <label><input type="checkbox"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>


@endsection