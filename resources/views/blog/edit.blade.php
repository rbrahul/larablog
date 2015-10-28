@extends('master')
@section('content')
    <div class="row">
        <h2>Edit Post</h2>
        <hr>
        @if(Session::has('success'))
            <div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ Session::get('success')  }}.</strong>
            </div>
            @endif
        <div class="panel panel-default">
            <div class="panel-body">
<form action="{{url('blog/update')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
<fieldset>
    {!! csrf_field()!!}
    <div class="form-group">
    <label class="control-label col-md-2">Title</label>
    <div class="col-md-6">
        <input type="text" name="title" value="{{ $post->title }}" id="" class="form-control">
        {!! $errors->first('title',"<p class='text-danger'>:message</p>") !!}
    </div>
    {{--col-md-6--}}
</div>
    {{--form-group--}}

<div class="form-group">
    <label class="control-label col-md-2">Content</label>
    <div class="col-md-10">
        <textarea type="text" name="content" rows="10" id=""  class="form-control">{{ $post->content }}</textarea>
        {!! $errors->first('content',"<p class='text-danger'>:message</p>") !!}
    </div>
    {{--col-md-6--}}
</div>
    {{--form-group--}}
    <div class="form-group">
    <label class="control-label col-md-2">Post Thumbnail</label>
    <div class="col-md-6">
        <input type="file" name="thumbnail" onchange="readURL(this);" id="postthumbnail" class="form-control">
        {!! $errors->first('thumbnail',"<p class='text-danger'>:message</p>") !!}
<div style="margin-top:20px;">

    <img id="showthumbnail" src="{{asset('postthumbnails/'.$post->thumbnail)}}" class="thumbnail" style="width:180px;height:auto;">
</div>
    </div>
    {{--col-md-6--}}

</div>
    {{--form-group--}}

    <div class="col-md-6 col-md-offset-2">
        <input type="hidden" name="id" value="{{$post->id}}">
        <button type="submit" class="btn btn-sm btn-success"> Publish</button>
    </div>
</fieldset>
</form>
            </div>
        </div>
        {{--panel panel-default--}}
    </div>
    {{--.row--}}


    @endsection