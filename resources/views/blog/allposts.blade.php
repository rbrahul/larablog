@extends('master')
@section('content')
    <div class="row">
        @if(Session::has('success'))
            <div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ Session::get('success')  }}.</strong>
            </div>
        @endif
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">All Posts</h3>
            </div>
            {{--panel-heading--}}

            <div class="panel-body">
                @if($posts)
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Heading</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=0;?>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{$post->title}}</td>
                        <td>
                            <a href="{{url('blog/show/'.$post->id)}}" class="btn btn-info">View</a>
                            <a href="{{url('blog/edit/'.$post->id)}}" class="btn btn-success">Edit</a>
                            <a class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
    @endforeach
                    </tbody>
                </table>
                    {!! $posts->render() !!}
                    @endif
            </div>
            {{--panel-body--}}

        </div>
        {{--.panel-primary--}}
        </div>
    {{--.row--}}
 @endsection