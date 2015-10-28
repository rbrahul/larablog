/**
 * Created by Rahul on 10/27/2015.
 */
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#showthumbnail').attr('src', e.target.result);
            //document.getElementById("blah").src=e.target.result;
        }

        reader.readAsDataURL(input.files[0]);
    }
}
function readGalleryImageAsUrl(input) {
    console.log(input.nodeValue);
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(input).parent().parent().find(".sm-img").css({"display":"block"}).attr('src', e.target.result);
            //document.getElementById("blah").src=e.target.result;
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function loadUploadedImages(){
    $.ajax({
        url:"http://localhost:8000/gallery/getimages",
        method:"GET",
        success:function(data){
           // console.log(data[0].caption);
            $("#image-holder").empty();
            $.each(data,function(index,value){
                //console.log(data[index].caption+"--"+value.caption);
                var nodeStr=' <div class="col-md-3 image-box">'+
                    '<img src="http://localhost:8000/galleryimages/'+value.image_name+'" class="img-thumbnail">'+
                    '<div class="image-title"><h3>'+value.caption+'</h3></div>'+
                    '</div>';
                $("#image-holder").append(nodeStr);
            });

        },
        error:function(res){
            console.log(res);
        }
    });
}


function addImageFieldForGallery(){
    var nodeStr='<tr>'+
            '<td>'+
            '<input type="text" placeholder="Image Caption" class="form-control" name="captions[]">'+
            '</td>'+
        ' <td>'+
        '<input type="file" name="images[]" onchange="readGalleryImageAsUrl(this);">'+
        '</td>'+
        '<td>'+
        '<img src="" style="display: none;" class="img-thumbnail sm-img">'+
        '</td>'+
        '<td><a  class="deleteImg btn btn-danger">Delete</a> </td>'+
        '</tr>';

    $("#galleryformtable").append(nodeStr);
}

function resetGalleryForm(){
    document.getElementById("galleryForm").reset();
    $(".sm-img").fadeOut(200);
}
///////MUltiple Image Uploading to Gallery/////////////

$(document).ready(function(){
    /////////Deleting gallery field///////////
    $(document).on("click",".deleteImg",function(e){

        e.preventDefault();
        console.log(555);
        $(this).parent().parent().remove();
    });

    //////////////TESTING AJAX////////
    $("#uploadBtn").click(function(){
       var formData=new FormData(document.forms[0]);
        formData._token=$("input[name='_token']").val();
       // console.log(document.forms[0]);
      $.ajax({
            url:"http://localhost:8000/gallery/ajaxtest",
            method:"POST",
            data:formData,
          contentType: false,       // The content type used when sending data to the server.
          cache: false,             // To unable request pages to be cached
          processData:false,
          success:function(data){
               // console.log(data.msg="Successfull");
              loadUploadedImages();
            },
            error:function(data){
                console.log(data);
            }
        });
    });
});