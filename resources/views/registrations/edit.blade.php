@extends('layouts.app')

@section('content')
<div class="container">
  </br>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit</div>
                <div class="panel-body">
                    {!!Form::model($registration,[
                        'method' => 'patch',
                        'route' => ['registration.update', $registration->id]
                        ])!!}
                        {!! csrf_field() !!}


                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{!! $registration->name !!}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Surname</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="surname" value="{!! $registration->surname !!}">

                                @if ($errors->has('surname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('mac_address') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Mac Address</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="mac_address" value="{!! $registration->mac_address !!}">

                                @if ($errors->has('mac_address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mac_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Phone</label>

                            <div class="col-md-6">
                                <input type="integer" class="form-control" name="phone" value="{!! $registration->phone !!}">

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                              <button type="submit" class="btn btn-primary">
                                  <i class="fa fa-lg fa-edit"></i> Edit
                              </button>
                              <button type="reset" class="btn btn-warning">
                                  <i class="fa fa-refresh fa-lg"></i> <b>Reset</b>
                              </button>
                            </div>
                        </div>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
