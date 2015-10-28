@extends('master')
@section('content')
    <div class="row" style="margin-top:70px;">

        <div class="col-md-4 col-sm-6 col-xs-12 col-md-offset-4 col-sm-offset-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2 align="center" style="margin:0">Sign In</h2>
                    <hr>
                    <form  class="form-horizontal" action="{{url('user/signin')}}" method="post">

{!! csrf_field() !!}
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label ">Email</label>
                                    <input type="text" name="email" value="{{ old('email') }}" id="" class="form-control">
                                    {!! $errors->first('email',"<p class='text-danger'>:message</p>") !!}
                                </div>
                                {{--col-md-6--}}
                            </div>
                            {{--form-group--}}
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label ">Password</label>
                                    <input type="text" name="password"  id="" class="form-control">
                                    {!! $errors->first('password',"<p class='text-danger'>:message</p>") !!}
                                </div>
                                {{--col-md-6--}}
                            </div>
                            {{--form-group--}}
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-sm btn-success"> Sign In</button>
                            </div>

                    </form>

                </div>
                {{--.panel-body--}}
            </div>
            {{--.panel--}}
        </div>
        {{--col-md-4--}}
    </div>
    {{--.row--}}
    @endsection