@extends('master')
@section('content')
    <div class="row">
        <h1>Image Gallery</h1>
        <hr/>
        <div class="col-md-12" id="image-holder">
@forelse($images as $image)
            <div class="col-md-3 image-box">
                <img src="{{asset('galleryimages/'.$image->image_name)}}" class="img-thumbnail">
                <div class="image-title"><h3>{{$image->caption}}</h3></div>
            </div>
@empty
            <h1>No Image Found</h1>
    @endforelse

        </div>
        {{--col-md-12--}}
    </div>
    <div class="row">
        <div class="col-md-12">
            <h2>Add New Image</h2>
            <hr/>
            <form action="{{url('gallery/save')}}"  enctype="multipart/form-data" id="galleryForm" method="post">
{!! csrf_field() !!}
                <table class="table" border="0" id="galleryformtable" style="width:100%;">

                		<tr>
                            <td>

                                <input type="text" placeholder="Image Caption" class="form-control " name="captions[]">

                            </td>

                			<td>
                                <input type="file" name="images[]" onchange="readGalleryImageAsUrl(this);" >
                            </td>
                            <td>
                                <img src="{{asset('galleryimages/testgallery.jpg')}}" style="display: none;" class="img-thumbnail sm-img">
                            </td>
                            <td><a href="#" class="deleteImg btn btn-danger">Delete</a> </td>
                		</tr>


                </table>
                <div class="col-md-12">
                    <button type="button" id="uploadBtn" class="btn btn-success">Upload</button>
                    <button type="button" id="addImgFieldBtn" onclick="addImageFieldForGallery()" class="btn btn-info">Add Field</button>
                    <button type="button" id="imgFormResetBtn" onclick="resetGalleryForm();" class="btn btn-primary">Refresh</button>
                </div>
            </form>
        </div>
        {{--.col-md-12--}}
    </div>
    @endsection