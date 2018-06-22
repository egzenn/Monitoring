@extends('layouts.app')

@section('content')
<style>
  #question,#answer {
      resize: vertical;
  }
</style>
<div class="container">
  </br>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Answer the question</div>
                <div class="panel-body">
                    {!!Form::model($contact,[
                        'method' => 'patch',
                        'route' => ['contact.update', $contact->id]
                        ])!!}
                        {!! csrf_field() !!}


                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{!! $contact->name !!}" disabled>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="email" value="{!! $contact->email !!}" disabled>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Status</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="status" value="{!! $contact->status !!}" disabled>

                                @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Question</label>

                            <div class="col-md-6">
                                <textarea name="comment" style="text-indent: -128px" id="question" rows="4" resize="null" class="form-control" disabled>
                                {!! $contact->comment !!}
                                </textarea>
                                @if ($errors->has('comment'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('created_at') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Date</label>

                            <div class="col-md-6">
                                <input type="integer" class="form-control" name="created_at" value="{!! $contact->created_at !!}" disabled>

                                @if ($errors->has('created_at'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('created_at') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            {!!Form::label('Language','', ['class' => 'col-md-4 control-label'])!!}
                            <div class="col-md-6">
                              {!!Form::select('language', array('eng' => 'English', 'pl' => 'Polish'),Request::get('language'),['class' => 'form-control']);!!}
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('created_at') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Answer</label>

                            <div class="col-md-6">
                                {!!Form::textarea('answer', Request::get('answer'), ['id' => 'answer','class' => 'form-control'])!!}
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                              <button type="submit" class="btn btn-success">
                                <i class="fa fa-envelope fa-lg" aria-hidden="true"></i> <b>Send</b>
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
