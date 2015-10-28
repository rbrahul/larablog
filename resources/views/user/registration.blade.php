@extends('master')
@section('content')
    <div class="row">
        <h2>Sign Up</h2>
        <hr>
        @if(Session::has('success'))
            <div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ Session::get('success')  }}.</strong>
            </div>
            @endif
        <div class="panel panel-default">
            <div class="panel-body">
<form action="{{url('user/save')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
<fieldset>
    {!! csrf_field()!!}
    <div class="form-group">
    <label class="control-label col-md-2">Full Name</label>
    <div class="col-md-6">
        <input type="text" name="name" value="{{ old('name') }}" id="" class="form-control">
        {!! $errors->first('name',"<p class='text-danger'>:message</p>") !!}
    </div>
    {{--col-md-6--}}
</div>
    {{--form-group--}}

<div class="form-group">
    <label class="control-label col-md-2">Email Address</label>
    <div class="col-md-6">
        <input type="text" name="email" id="" value="{{old('email')}}" class="form-control">
        {!! $errors->first('email',"<p class='text-danger'>:message</p>") !!}
    </div>
    {{--col-md-6--}}
</div>
    {{--form-group--}}
    <div class="form-group">
    <label class="control-label col-md-2">Password</label>
    <div class="col-md-6">
        <input type="password" name="password" id="" class="form-control">
        {!! $errors->first('password',"<p class='text-danger'>:message</p>") !!}
    </div>
    {{--col-md-6--}}
</div>
    {{--form-group--}}
    <div class="form-group">
    <label class="control-label col-md-2">Confirm Password</label>
    <div class="col-md-6">
        <input type="password" name="password_confirmation" id="" class="form-control">
    </div>
    {{--col-md-6--}}
</div>
    {{--form-group--}}
    <div class="col-md-6 col-md-offset-2">
        <button type="submit" class="btn btn-sm btn-success"> Save</button>
    </div>
</fieldset>
</form>
            </div>
        </div>
        {{--panel panel-default--}}
    </div>
    {{--.row--}}
    @endsection