@extends('master')
@section('content')
<div class="row">
@if($blog->thumbnail!="")
<div class="thumbnail">
<img src="{{asset('postthumbnails/'.$blog->thumbnail)}}" alt="">
</div>
@endif
<h1>{{ $blog->title}}</h1>
<hr>
<b class="pull-left">Published on: {{$blog->created_at->format('jS M, Y')}}</b><b class="pull-right">Author: {{$author->name}}</b>
<div class="clearfix"></div>
<hr/>
<p>{{$blog->content}}</p>
</div>
</div>
<!-- .row -->
@endsection