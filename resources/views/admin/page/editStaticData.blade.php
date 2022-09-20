@extends('admin.layouts.layout')
@section('title', 'Space - Add New Banner')

@section('current_page_css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">

<link rel="stylesheet" href="//jonthornton.github.io/jquery-timepicker/jquery.timepicker.css">
<link rel="stylesheet" href="{{ asset('resources/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{ asset('resources/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

<style>
   .active .bs-stepper-circle {
   background-color: #126c62 !important;
   }
</style>
<style type="text/css">
   input[type="file"] {
   display: block;
   }
   .imageThumb {
   max-height: 75px;
   border: 2px solid;
   padding: 1px;
   cursor: pointer;
   width: 100%;
   }
   .pip {
   display: inline-block;
   margin: 10px 10px 0 0;
   }
   .remove {
   display: block;
   background: #444;
   border: 1px solid black;
   color: white;
   text-align: center;
   cursor: pointer;
   }
   .remove:hover {
   background: white;
   color: black;
   }
   .d-none {
   display: none;
   }
</style>
<style>
   .card {
   box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);
   margin-bottom: 1rem;
   padding: 0 0.5rem;
   }
</style>
<style>
   /*.container-fluid {
   padding-right: 0px !important;
   padding-left: 0px !important;
   }*/
</style>
@endsection

@section('current_page_js')
<script src="//jonthornton.github.io/jquery-timepicker/jquery.timepicker.js"></script>
<script src="{{ asset('resources/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="https://cdn.ckeditor.com/4.19.1/standard-all/ckeditor.js"></script>

  
  <script>
    CKEDITOR.replace('content2');
  </script>
<script>
  $("#updateBanner_form").validate({
    debug: false,
    rules: {
     
     
    },
    submitHandler: function (form) {
      var site_url = $("#baseUrl").val();
      CKEDITOR.instances.content2.updateElement();
      // alert(site_url);
      var formData = $(form).serialize();
      
      $(form).ajaxSubmit({
        type: 'POST',
        url: "{{url('/admin/updateStaticData')}}",
        data: formData,
        
        success: function (response) {
          console.log(response);
          
          if (response.status == 'success') {
            // $("#register_form")[0].reset();
            success_noti(response.msg);
            // setTimeout(function(){window.location.reload()},1000);
            setTimeout(function(){window.location.href=site_url+"/admin/showStaticData"},1000);
          } else {
            error_noti(response.msg);
          }

        }
      });
      // event.preventDefault();
    }
  });

    $(document).ready(function () {
        $("#start_date").datepicker({
            dateFormat: "dd-M-yy",
            minDate: 0,
            onSelect: function (date) {
                var dt2 = $('#end_date');
                var startDate = $(this).datepicker('getDate');
                var minDate = $(this).datepicker('getDate');
                dt2.datepicker('setDate', minDate);
                startDate.setDate(startDate.getDate() + 30);
                dt2.datepicker('option', 'maxDate', startDate);
                dt2.datepicker('option', 'minDate', minDate);
                $(this).datepicker('option', 'minDate', minDate);
            }
        });
        $('#end_date').datepicker({
            dateFormat: "dd-M-yy"
        });

        
    });
    $('#start_time').timepicker();
    $('#end_time').timepicker();
      $("select").on("select2:select", function(evt) {
    var element = evt.params.data.element;
    var $element = $(element);

    $element.detach();
    $(this).append($element);
    $(this).trigger("change");
  });
</script> 
<script type="text/javascript">
  function initialize() {
    var input = document.getElementById('address');
    var options = document.getElementById("country").options;
    var autocomplete = new google.maps.places.Autocomplete(input);
    google.maps.event.addListener(autocomplete, 'place_changed', function() {
      var place = autocomplete.getPlace();
      console.log(place);
      document.getElementById('latitude').value = place.geometry.location.lat();
      document.getElementById('longitude').value = place.geometry.location.lng();
      // document.getElementById('neighb_area').value = place.vicinity;
      for (let i = 0; i < place.address_components.length; i++) {
        if (place.address_components[i].types[0] == "administrative_area_level_2") {
          document.getElementById('city').value = place.address_components[i].long_name;
        }
        if (place.address_components[i].types[0] == "sublocality_level_1") {
          document.getElementById('neighb_area').value = place.address_components[i].long_name;
        }
        if (place.address_components[i].types[0] == "country") {
          // console.log(place.address_components[i].long_name);
          for (var j = 0; j < options.length; j++) {
            if (options[j].text == place.address_components[i].long_name) {
              options[j].selected = true;
              document.getElementById("select2-hotel_country-container").textContent = options[j].text;
              const getSpan = document.getElementById("select2-hotel_country-container")
              getSpan.setAttribute("title", options[j].text);
              break;
            }
          }
        }
        // if (place.address_components[i].types[0] == "neighborhood") {
        //   document.getElementById('neighb_area').value = place.address_components[i].long_name;
        // }
      }
    });
  }
  google.maps.event.addDomListener(window, 'load', initialize);
</script>
<script type="text/javascript">
  $(document).ready(function() {
    if (window.File && window.FileList && window.FileReader) {
      $("#eventGallery").on("change", function(e) {
        var files = e.target.files,
          filesLength = files.length;
        for (var i = 0; i < filesLength; i++) {
          var f = files[i]
          var fileReader = new FileReader();
          fileReader.onload = (function(e) {
            var file = e.target;
            $("<span class=\"pip\">" +
              "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
              "<br/><span class=\"remove\">Remove image</span>" +
              "</span>").insertAfter("#hotelGalleryPreview");
            $(".remove").click(function() {
              $(this).parent(".pip").remove();
            });
          });
          fileReader.readAsDataURL(f);
        }
      });
    } else {
      alert("Your browser doesn't support to File API")
    }
  });
</script>
<script type="text/javascript">
 $(document).ready(function() {
    $('#mile-dropdown').on('change', function() {
        var mile = this.value;
        var latitude = $('#latitude').val();
        var longitude = $('#longitude').val();
        if(latitude === '' || longitude === '' ){
          alert('Please enter address first');
          return false;
        } 
        $("#hotelname").html('');
        $("#spacename").html('');
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type: 'POST',
            url: "{{url('/admin/eventMileData')}}",
            data: {
                mile: mile,
                latitude: latitude,
                longitude: longitude,
                _token: CSRF_TOKEN
            },
            dataType: 'json',
            success: function(result) {

              $('#hotelname').html('<option value="">Select Hotels</option>'); 
              $.each(result.hotelList,function(key,value){
              $("#hotelname").append('<option value="'+value.hotel_id+'">'+value.hotel_name+'</option>');
              });

              $('#spacename').html('<option value="">Select Spaces</option>'); 
              $.each(result.spaceList,function(key1,value1){
              $("#spacename").append('<option value="'+value1.space_id+'">'+value1.space_name+'</option>');
              });
            }
        });
    });
  });
$(document).ready(function(){
  $('#type-dropdown').on('change', function(){
    var value = $(this).val(); 
     if (value == 'paid') {
      $('#price').prop("disabled", false);
     }else{
      $('#price').prop("disabled",true);
     }
  });
});          
</script>
@endsection

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <a href="{{url('/admin/showStaticData')}}"><i class="right fas fa-angle-left"></i>Back</a>
          </div>
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Event</li>
            </ol> -->
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Edit Static Page Content</h3>
          </div>

          <!-- /.card-header -->
          <div class="card-body">
              <form  method="POST" id="updateBanner_form" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <input type="hidden" name="banner_id" id="banner_id" value="{{ $static_content[0]->id }}">
                  <input type="hidden" name="old_images" id="old_images" value="{{$static_content[0]->banner}}">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="customFile">Image</label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="banner_img" name="banner_img">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="d-flex flex-wrap">
                        <div class="image-gridiv">
                          <img src="{{ url('resources/assets/img') }}/{{ $static_content[0]->banner }}">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Heading</label>
                      <input type="text" class="form-control" name="heading" id="heading" placeholder="Enter Heading" value="{{ $static_content[0]->heading }}">
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Content</label>
                      <textarea name="content2" id="content2" placeholder="Enter Content">{{ $static_content[0]->content }}</textarea>
                      <!-- <textarea cols="10" id="editor1" name="content" rows="10">{{ $static_content[0]->content }}</textarea> -->
                      <!-- <textarea cols="80" id="editor1" name="editor2" rows="10"></textarea> -->
                     
                    </div>
                  </div>
                  <div class="col-12"> 
                    <button class="btn btn-primary btn-dark float-right" name="submit" type="submit">Submit</button>
                  </div>
                </div>
              </form>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <!-- Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
            the plugin. -->
          </div>
        </div>
        <!-- /.card -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  


@endsection         
