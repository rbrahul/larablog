  @extends('master')
          @section('content')
  <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer header-bg"
                style="background:url(
                @if($banner_post->thumbnail=="")
                        'images/colorful-triangles-background.jpg'
                     @else
                        '{{asset('postthumbnails/'.$banner_post->thumbnail)}}'
                     @endif
                        );background-size:cover;">
            <h1 style="color:#fff;text-shadow:2px 2px 2px black;">{{$banner_post->title}}</h1>
            <p style="color:#fff;text-shadow:1px 1px 1px black;">{{str_limit($banner_post->content,100)}}</p>
            <p><a href="{{url('blog/show/'.$banner_post->id)}}" class="btn btn-primary btn-large">Learn More!</a>
            </p>
        </header>

        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Latest Features</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">
@forelse($posts as $post)
            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                @if($post->thumbnail!="")
                    <img src="{{asset('postthumbnails/'.$post->thumbnail)}}" alt="">
                    @else
                     <img src="{{asset('images/colorful-triangles-background.jpg')}}" alt="">
                     @endif
                    <div class="caption">
                        <h3>{{ str_limit($post->title,30)}}</h3>
                        <p>{{ str_limit($post->content,50)}}</p>
                        <p align="center">
                            <a href="{{url('blog/show/'.$post->id)}}" class="btn btn-primary" >Read More</a>
                        </p>
                    </div>
                </div>
            </div>
@empty
<h2 align="center">No Post Found</h2>
@endforelse

          <!--   <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="http://placehold.it/800x500" alt="">
                    <div class="caption">
                        <h3>Feature Label</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p>
                            <a href="#" class="btn btn-primary">Buy Now!</a> <a href="#" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="http://placehold.it/800x500" alt="">
                    <div class="caption">
                        <h3>Feature Label</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p>
                            <a href="#" class="btn btn-primary">Buy Now!</a> <a href="#" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="http://placehold.it/800x500" alt="">
                    <div class="caption">
                        <h3>Feature Label</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p>
                            <a href="#" class="btn btn-primary">Buy Now!</a> <a href="#" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div> -->

        </div>
        <!-- /.row -->
@stop