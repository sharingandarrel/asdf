@extends('layout')

@section('header')
  <h2>Edit Records</h2>
@stop
 
@section('content')
  
    {!! Form::model($blog, ['route'=>['blog.update', $blog->id], 'method'=>'PATCH', 'class'=>'form-horizontal']) !!}
      <div class="form-group">
        {!! Form::label('title', 'Name', ['class'=>'control-label col-md-2']) !!}
        <div class="col-md-10">
          {!! Form::text('title', null, ['class'=>'form-control']) !!}
          {!! $errors->has('title')?$errors->first('title'):'' !!}
        </div>
      </div>
      <div class="form-group">
        {!! Form::label('description', 'Contact Number', ['class'=>'control-label col-md-2']) !!}
        <div class="col-md-10">
        {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
        {!! $errors->has('description')?$errors->first('description'):'' !!}
          
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-offset-2 col-md-10">
          {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
        </div>
      </div>
    {!! Form::close() !!}
    
@stop