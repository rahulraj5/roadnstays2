@extends('admin.layout.layout')
@section('title', 'Room - Edit')
@section('current_page_css')
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
</style>
@endsection
@section('current_page_js')
<script type="text/javascript">
  $(document).ready(function() {
  if (window.File && window.FileList && window.FileReader) {
    $("#files").on("change", function(e) {
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
            "</span>").insertAfter("#files");
          $(".remove").click(function(){
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
@endsection
@section('content')

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">
            <a href="{{url('/admin/roomlist')}}"><i class="right fas fa-angle-left"></i>Back</a>
            <h1>Edit Room</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active">Edit Room</li>

            </ol>

          </div>

        </div>

      </div><!-- /.container-fluid -->

    </section>

    <!-- Main content -->

    <section class="content">

      <div class="container-fluid">

        <!-- SELECT2 EXAMPLE -->

        <div class="card card-default">

          <div class="card-header">

            <h3 class="card-title">Room Form</h3>

          </div>

          <!-- /.card-header -->

          <div class="card-body">

              <form  method="POST" id="updateroomAdmin_form" enctype="multipart/form-data"> 

                @csrf

                <input type="hidden" name="room_id" id="room_id" value="{{$room_data->id}}">
                <div class="row">

                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Hotel name</label>

                        <select class="form-control select2bs4" name="hotel_name"  id="hotel_name" style="width: 100%;" >

                          <option value="">Select Hotel</option>

                          @foreach ($hotels as $cont)

                            <option value="{{ $cont->hotel_id }}" {{ $cont->hotel_id == $room_data->hotel_id ? 'selected' : '' }}>{{ $cont->hotel_name }}</option>

                          @endforeach

                        </select>

                      <!-- </div>   -->

                    </div>

                  </div>

                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Room type</label>

                        <select class="form-control select2bs4" name="room_type"  id="room_type" style="width: 100%;" >

                          <option value="">Select Hotel</option>

                          @foreach ($room_type_categories as $cont)

                            <option value="{{ $cont->id }}" {{ $cont->id == $room_data->room_types_id ? 'selected' : '' }}>{{ $cont->title }}</option>

                          @endforeach

                        </select>

                      <!-- </div>   -->

                    </div>

                  </div>

                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Room name</label>

                      <input type="text" class="form-control" name="room_name" id="room_name" placeholder="Enter Room Name" value="{{$room_data->name}}">

                    </div>

                  </div>

                  

                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Max adults</label>

                      <input type="text" class="form-control" name="max_adults" id="max_adults" placeholder="Enter max adults" value="{{$room_data->max_adults}}">

                    </div>

                  </div>

                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Max childern</label>

                      <input type="text" class="form-control" name="max_childern" id="max_childern" placeholder="Enter max childern" value="{{$room_data->max_childern}}">

                    </div>

                  </div>

                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Room qty</label>

                      <input type="text" class="form-control" name="number_of_rooms" id="number_of_rooms" placeholder="Enter room qty." value="{{$room_data->number_of_rooms}}" >

                    </div>

                  </div>
                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Price per night</label>

                      <input type="text" class="form-control" name="price_per_night" id="price_per_night" placeholder="Enter price per night" value="{{$room_data->price_per_night}}" >

                    </div>

                  </div>
                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Price per night 7 days</label>

                      <input type="text" class="form-control" name="price_per_night_7d" id="price_per_night_7d" placeholder="Enter price per night 7 days." value="{{$room_data->price_per_night_7d}}">

                    </div>

                  </div>
                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Price per night 30 days</label>

                      <input type="text" class="form-control" name="price_per_night_30d" id="price_per_night_30d" placeholder="Enter price per night 30 days." value="{{$room_data->price_per_night_30d}}" >

                    </div>

                  </div>
                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Cleaning fee</label>

                      <input type="text" class="form-control" name="cleaning_fee" id="cleaning_fee" placeholder="Enter cleaning fee."  value="{{$room_data->cleaning_fee}}" >

                    </div>

                  </div>
                  <div class="col-md-6">

                    <div class="form-group">

                      <label>City fee</label>

                      <input type="text" class="form-control" name="city_fee" id="city_fee" placeholder="Enter city fee." value="{{$room_data->city_fee}}">

                    </div>

                  </div>
                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Extra guest per night</label>

                      <input type="text" class="form-control" name="extra_guest_per_night" id="extra_guest_per_night" placeholder="Enter extra guest per night." value="{{$room_data->extra_guest_per_night}}">

                    </div>

                  </div>

                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Type of price  </label>

                       <select class="form-control select2bs4" name="type_of_price"  id="type_of_price" style="width: 100%;" >

                          <option value="">Select Price type</option>

                          <option value="single_fee" {{ $room_data->type_of_price == "single_fee" ? 'selected' : '' }}>Single fee</option>
                          <option value="per_night" {{ $room_data->type_of_price == "per_night" ? 'selected' : '' }}>Per night</option>
                          <option value="per_guest" {{ $room_data->type_of_price == "per_guest" ? 'selected' : '' }}>Per guest</option>
                          <option value="per_night_per_guest" {{ $room_data->type_of_price == "per_night_per_guest" ? 'selected' : '' }}>Per night per guest</option>

                       </select>

                    </div>

                  </div>
                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Bed type</label>

                       <select class="form-control select2bs4" name="bed_type"  id="bed_type" style="width: 100%;" >
                          <option value="">Select Bed type</option>
                          <option value="Single bed" {{ $room_data->bed_type == "Single bed" ? 'selected' : '' }}>Single bed</option>
                          <option value="Double bed" {{ $room_data->bed_type == "Double bed" ? 'selected' : '' }}>Double bed</option>
                          <option value="Bunk bed" {{ $room_data->bed_type == "Bunk bed" ? 'selected' : '' }}>Bunk bed</option>
                          <option value="Sofa bed" {{ $room_data->bed_type == "Sofa bed" ? 'selected' : '' }}>Sofa bed</option>
                          <option value="Futon Mat" {{ $room_data->bed_type == "Futon Mat" ? 'selected' : '' }}>Futon Mat</option>
                          <option value="Extra-Large double bed (Super - King size)" {{ $room_data->bed_type == "Extra-Large double bed (Super - King size)" ? 'selected' : '' }}>Extra-Large double bed (Super - King size)</option>
                       </select>

                    </div>

                  </div>
                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Private bathroom</label>

                     <select class="form-control select2bs4" name="private_bathroom"  id="private_bathroom" style="width: 100%;" >
                          <option value="">Please select</option>
                          <option value="1" {{ $room_data->private_bathroom == 1 ? 'selected' : '' }}>Yes</option>
                          <option value="0" {{ $room_data->private_bathroom == 0 ? 'selected' : '' }}>No</option>
                       </select>

                    </div>

                  </div>
                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Private entrance</label>

                      <select class="form-control select2bs4" name="private_entrance"  id="private_entrance" style="width: 100%;" >
                          <option value="">Please select</option>
                          <option value="1"  {{ $room_data->private_entrance == 1 ? 'selected' : '' }}>Yes</option>
                          <option value="0"  {{ $room_data->private_entrance == 0 ? 'selected' : '' }}>No</option>
                       </select>

                    </div>

                  </div>
                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Optional services</label>

                      <input type="text" class="form-control" name="optional_services" id="optional_services" placeholder="Enter optional services" value="{{$room_data->optional_services}}" >

                    </div>

                  </div>
                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Family friendly</label>

                      <select class="form-control select2bs4" name="family_friendly"  id="family_friendly" style="width: 100%;" >
                          <option value="">Please select</option>
                          <option value="1" {{ $room_data->family_friendly == 1 ? 'selected' : '' }}>Yes</option>
                          <option value="0" {{ $room_data->family_friendly == 0 ? 'selected' : '' }}>No</option>
                       </select>

                    </div>

                  </div>
                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Outdoor facilities</label>

                      <input type="text" class="form-control" name="outdoor_facilities" id="outdoor_facilities" placeholder="Enter outdoor facilities." value="{{$room_data->outdoor_facilities}}" >

                    </div>

                  </div>
                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Extra people</label>

                      <input type="text" class="form-control" name="extra_people" id="extra_people" placeholder="Enter extra people." value="{{$room_data->extra_people}}" >

                    </div>

                  </div>

                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Room description</label>

                      <input type="text" class="form-control" name="description" id="description" placeholder="Enter room description" value="{{$room_data->description}}">

                    </div>

                  </div>

                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Notes</label>

                      <input type="text" class="form-control" name="notes" id="notes" placeholder="Enter notes" value="{{$room_data->notes}}" >

                    </div>

                  </div>
                  <!-- <div class="col-md-12">
                    <div class="form-group">
                      <div class="field" align="left">
                        <label>Upload room images</label>
                        <input type="file" id="files" name="imgupload[]" multiple />
                        <?php foreach($room_images as $key => $ad_image){?>
                           <span class="pip"><img class="imageThumb" src="{{url('public/uploads/room_images/')}}/{{$ad_image->image}}"><span class="remove">Remove image</span></span>
                        <?php } ?>

                      </div>
                    </div>
                  </div>  --> 
                  <div class="col-12">

                    <button class="btn btn-primary btn-dark float-right" name="submit" type="submit">Update</button>

                  </div>

                </div>

              </form>
            <!-- /.row -->

          </div>

          <!-- /.card-body -->

          <div class="card-footer">

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