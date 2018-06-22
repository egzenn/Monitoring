@extends('layouts.app')

@section('title')
  Map
@stop
@section('content')
  <div class="input-group">
  </div>
    <br/>
    <p>
    <form action="" method="POST" enctype="multipart/form-data" files = true>
    {!! csrf_field() !!}
      <div class="form-group">
          <h3>CSV Product Import</h3>
          {!! Form::file('file',null, array('class' => 'file')) !!}
      </div>

      <div class="form-group">
          {!! Form::submit('Upload Products', array('class' => 'btn btn-success')) !!}
      </div>
    </form>
@stop
 