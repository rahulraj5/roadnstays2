@extends('admin.layout.layout')
@section('title', 'User - Profile')
@section('current_page_css')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('resources/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{ asset('resources/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('resources/plugins/summernote/summernote-bs4.min.css')}}">
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
<!-- Select2 -->
<script src="{{ asset('resources/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- Summernote -->
<script src="{{ asset('resources/plugins/summernote/summernote-bs4.min.js')}}"></script>
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

  $("#room_type").change(function(){
    var room_type_id = this.value;
    $("#room_name-dropdown").html('<option value="">Select room</option>');
    $.ajax({
        url: "{{ url('admin/room_name') }}",
        method: 'POST',
        data: {
          room_type_id: room_type_id,
          _token: '{{csrf_token()}}' 
          },
        dataType : 'json',
        success: function(data) {
            $.each(data.room_name_list,function(key,value){
            $("#room_name-dropdown").append('<option value="'+value.room_name+'">'+value.room_name+'</option>');
            });
        }
    });
  });

</script>

<script>
  $(function() {
    // Summernote
    $('#summernote').summernote()
  })

  $(function() {
    // Summernote
    $('#summernote1').summernote()
  })
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
          <h1>Add Room</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="#">Home</a></li>

            <li class="breadcrumb-item active">Add Room</li>

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

          <form method="POST" id="roomAdmin_form" enctype="multipart/form-data">

            @csrf

            <div class="row">

              <div class="col-md-6">

                <div class="form-group">

                  <label>Hotel name</label>

                  <select class="form-control select2bs4" name="hotel_name" id="hotel_name" style="width: 100%;">

                    <option value="">Select Hotel</option>

                    @foreach ($hotels as $cont)

                    <option value="{{ $cont->hotel_id }}">{{ $cont->hotel_name }}</option>

                    @endforeach

                  </select>

                  <!-- </div>   -->

                </div>

              </div>

              <div class="col-md-6">

                <div class="form-group">

                  <label>Room type</label>

                  <select class="form-control select2bs4" name="room_type" id="room_type" style="width: 100%;">

                    <option value="">Select room type</option>

                    @foreach ($room_type_categories as $cont)

                    <option value="{{ $cont->id }}">{{ $cont->title }}</option>

                    @endforeach

                  </select>

                  <!-- </div>   -->

                </div>

              </div>

              <div class="col-md-6">

                <div class="form-group">

                  <label>Room name</label>

                  <!-- <input type="text" class="form-control" name="room_name" placeholder="Enter Room Name"> -->

                  <select class="form-control select2bs4"  name="room_name" id="room_name-dropdown" style="width: 100%;">
                    <option value="">Select room</option>
                  </select>

                </div>

              </div>



              <div class="col-md-6">

                <div class="form-group">

                  <label>Max adults</label>

                  <input type="text" class="form-control" name="max_adults" id="max_adults" placeholder="Enter max adults">

                </div>

              </div>

              <div class="col-md-6">

                <div class="form-group">

                  <label>Max childern</label>

                  <input type="text" class="form-control" name="max_childern" id="max_childern" placeholder="Enter max childern">

                </div>

              </div>

              <div class="col-md-6">

                <div class="form-group">

                  <label>Room qty</label>

                  <input type="text" class="form-control" name="number_of_rooms" id="number_of_rooms" placeholder="Enter room qty.">

                </div>

              </div>
              <div class="col-md-6">

                <div class="form-group">

                  <label>Price per night</label>

                  <input type="text" class="form-control" name="price_per_night" id="price_per_night" placeholder="Enter price per night">

                </div>

              </div>
              <div class="col-md-6">

                <div class="form-group">

                  <label>Price per night 7 days</label>

                  <input type="text" class="form-control" name="price_per_night_7d" id="price_per_night_7d" placeholder="Enter price per night 7 days.">

                </div>

              </div>
              <div class="col-md-6">

                <div class="form-group">

                  <label>Price per night 30 days</label>

                  <input type="text" class="form-control" name="price_per_night_30d" id="price_per_night_30d" placeholder="Enter price per night 30 days.">

                </div>

              </div>
              <div class="col-md-6">

                <div class="form-group">

                  <label>Cleaning fee</label>

                  <input type="text" class="form-control" name="cleaning_fee" id="cleaning_fee" placeholder="Enter cleaning fee.">

                </div>

              </div>
              <div class="col-md-6">

                <div class="form-group">

                  <label>City fee</label>

                  <input type="text" class="form-control" name="city_fee" id="city_fee" placeholder="Enter city fee.">

                </div>

              </div>
              <div class="col-md-6">

                <div class="form-group">

                  <label>Bed type</label>

                  <select class="form-control select2bs4" name="bed_type" id="bed_type" style="width: 100%;">
                    <option value="">Select Bed type</option>
                    <option value="Single bed">Single bed</option>
                    <option value="Double bed">Double bed</option>
                    <option value="Bunk bed">Bunk bed</option>
                    <option value="Sofa bed">Sofa bed</option>
                    <option value="Futon Mat">Futon Mat</option>
                    <option value="Extra-Large double bed (Super - King size)">Extra-Large double bed (Super - King size)</option>
                  </select>

                </div>

              </div>
              <div class="col-md-6">

                <div class="form-group">

                  <label>Extra guest per night</label>

                  <input type="text" class="form-control" name="extra_guest_per_night" id="extra_guest_per_night" placeholder="Enter extra guest per night.">

                </div>

              </div>

              <div class="col-md-6">

                <div class="form-group">

                  <label>Type of price </label>

                  <select class="form-control select2bs4" name="type_of_price" id="type_of_price" style="width: 100%;">

                    <option value="">Select Price type</option>

                    <option value="single_fee">Single fee</option>
                    <option value="per_night">Per night</option>
                    <option value="per_guest">Per guest</option>
                    <option value="per_night_per_guest">Per night per guest</option>

                  </select>

                </div>

              </div>
              <div class="col-md-6">

                <div class="form-group">

                  <label>Private bathroom</label>

                  <select class="form-control select2bs4" name="private_bathroom" id="private_bathroom" style="width: 100%;">
                    <option value="">Please select</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                  </select>

                </div>

              </div>
              <div class="col-md-6">

                <div class="form-group">

                  <label>Private entrance</label>

                  <select class="form-control select2bs4" name="private_entrance" id="private_entrance" style="width: 100%;">
                    <option value="">Please select</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                  </select>

                </div>

              </div>
              <div class="col-md-6">

                <div class="form-group">

                  <label>Optional services</label>

                  <input type="text" class="form-control" name="optional_services" id="optional_services" placeholder="Enter optional services">

                </div>

              </div>
              <div class="col-md-6">

                <div class="form-group">

                  <label>Family friendly</label>

                  <select class="form-control select2bs4" name="family_friendly" id="family_friendly" style="width: 100%;">
                    <option value="">Please select</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                  </select>

                </div>

              </div>
              <div class="col-md-6">

                <div class="form-group">

                  <label>Outdoor facilities</label>

                  <input type="text" class="form-control" name="outdoor_facilities" id="outdoor_facilities" placeholder="Enter outdoor facilities.">

                </div>

              </div>
              <div class="col-md-6">

                <div class="form-group">

                  <label>Extra people</label>

                  <input type="text" class="form-control" name="extra_people" id="extra_people" placeholder="Enter extra people.">

                </div>

              </div>

              <div class="col-md-6">

                <div class="form-group">

                  <label>Room description</label>

                  <!-- <input type="text" class="form-control" name="description" id="description" placeholder="Enter room description"> -->
                  <textarea id="summernote" name="description" required></textarea>

                </div>

              </div>

              <div class="col-md-6">

                <div class="form-group">

                  <label>Notes</label>

                  <!-- <input type="text" class="form-control" name="notes" id="notes" placeholder="Enter notes"> -->
                  <textarea id="summernote1" name="notes" required></textarea>

                </div>

              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <div class="field" align="left">
                    <label>Upload room images</label>
                    <input type="file" id="files" name="imgupload[]" multiple />
                  </div>
                </div>
              </div>


              <!-- <div class="row"> -->
              <div class="col-md-12">
                <div class="tab-custom-content">
                  <p class="lead mb-0">
                  <h4>Facilities</h4>
                  </p>
                </div>
              </div>

              @foreach ($amenity_type as $value)
              @php $amenity_count = DB::table('H2_Amenities')->where('amenity_type',$value->id)->count(); @endphp

              @if($amenity_count > 0)
              @php $amenities = DB::table('H2_Amenities')->orderby('amenity_id', 'ASC')->where('amenity_type',$value->id)->get(); @endphp
              <div class="col-md-12">
                  <div class="form-group">
                      <label>{{$value->name}}</label>
                      <select class="form-control select2bs4" multiple="multiple" name="amenity[]" id="amenity_{{$value->id}}" data-placeholder="Select Room Amenities" style="width: 100%;">
                          <!-- <option value="">Select Room Amenities</option> -->

                          @foreach ($amenities as $amenity)
                          <option value="{{ $amenity->amenity_id }}">{{ $amenity->amenity_name }}</option>
                          @endforeach
                      </select>
                  </div>
              </div>
              @endif

              @endforeach

              <div class="col-md-12">
                <div class="tab-custom-content">
                  <p class="lead mb-0">
                  <h4>Services</h4>
                  </p>
                </div>
              </div>

              @foreach ($service_type as $value)
              @php $room_services_count = DB::table('H3_Services')->where('service_type_id',$value->id)->count(); @endphp

              @if($room_services_count > 0)
              @php $services = DB::table('H3_Services')->orderby('id', 'ASC')->where('service_type_id',$value->id)->get(); @endphp
              <div class="col-md-12">
                  <div class="form-group">
                      <label>{{$value->name}}</label>
                      <select class="form-control select2bs4" multiple="multiple" name="services[]" id="service_{{$value->id}}" data-placeholder="Select {{$value->name}}" style="width: 100%;">
                          <!-- <option value="">Select Room Amenities</option> -->

                          @foreach ($services as $service)
                          <option value="{{ $service->id }}">{{ $service->service_name }}</option>
                          @endforeach
                      </select>
                  </div>
              </div>
              @endif

              @endforeach

              <div class="col-md-12">
                <div class="tab-custom-content">
                  <p class="lead mb-0">
                  <h4>Other Features</h4>
                  </p>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label>Other Features</label>
                  <select class="form-control select2bs4" multiple="multiple" name="other_features_id[]" id="other_features_id" data-placeholder="Select Other Features" style="width: 100%;" required="required">
                    <!-- <option value="">Services & Extras</option> -->
                    @php $other_features = DB::table('room_others_features')->orderby('id', 'ASC')->where('status',1)->get(); @endphp
                    @foreach ($other_features as $value)
                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                  </select>
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