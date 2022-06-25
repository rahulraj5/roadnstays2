@extends('admin.layout.layout')
@section('title', 'View - Room')
@section('current_page_css')
<link rel="stylesheet" href="{{ asset('resources/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{ asset('resources/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('resources/plugins/summernote/summernote-bs4.min.css')}}">
@endsection
@section('current_page_js')
<!-- Select2 -->
<script src="{{ asset('resources/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- Summernote -->
<script src="{{ asset('resources/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script type="text/javascript">
  $(function() {
    // Summernote
    $('#summernote').summernote()
    $('#summernote1').summernote()
    $('#summernote').summernote('disable');
    $('#summernote1').summernote('disable');
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
          <h1>View Room Details</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="#">Home</a></li>

            <!-- <li class="breadcrumb-item active">Add Room</li> -->

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

          <h3 class="card-title">View Room Details</h3>

        </div>


        <?php //echo "<pre>";print_r($room_data); 
        ?>
        <!-- /.card-header -->

        <div class="card-body">

          <form method="POST" id="roomAdmin_form" enctype="multipart/form-data">

            @csrf

            <div class="row">

              <div class="col-md-6">

                <div class="form-group">

                  <label>Hotel name</label>

                  <input type="text" name="hotel_name" class="form-control" value="{{$room_data->hotel_name}}" readonly="">

                  <!-- </div>   -->

                </div>

              </div>

              <div class="col-md-6">

                <div class="form-group">

                  <label>Room type</label>

                  <input type="text" name="room_type" class="form-control" value="{{$room_data->room_type}}" readonly="">

                  <!-- </div>   -->

                </div>

              </div>

              <div class="col-md-6">

                <div class="form-group">

                  <label>Room name</label>

                  <input type="text" class="form-control" name="room_name" value="{{$room_data->name}}" readonly="">

                </div>

              </div>



              <div class="col-md-6">

                <div class="form-group">

                  <label>Max adults</label>

                  <input type="text" class="form-control" name="max_adults" value="{{$room_data->max_adults}}" readonly="">

                </div>

              </div>

              <div class="col-md-6">

                <div class="form-group">

                  <label>Max childern</label>

                  <input type="text" class="form-control" name="max_childern" value="{{$room_data->max_childern}}" readonly="">

                </div>

              </div>

              <div class="col-md-6">

                <div class="form-group">

                  <label>Room qty</label>

                  <input type="text" class="form-control" name="number_of_rooms" value="{{$room_data->number_of_rooms}}" readonly="">

                </div>

              </div>
              <div class="col-md-6">

                <div class="form-group">

                  <label>Price per night</label>

                  <input type="text" class="form-control" name="price_per_night" value="{{$room_data->price_per_night}}" readonly="">

                </div>

              </div>
              <div class="col-md-6">

                <div class="form-group">

                  <label>Price per night 7 days</label>

                  <input type="text" class="form-control" name="price_per_night_7d" value="{{$room_data->price_per_night_7d}}" readonly="">

                </div>

              </div>
              <div class="col-md-6">

                <div class="form-group">

                  <label>Price per night 30 days</label>

                  <input type="text" class="form-control" name="price_per_night_30d" value="{{$room_data->price_per_night_30d}}" readonly="">

                </div>

              </div>
              <div class="col-md-6">

                <div class="form-group">

                  <label>Cleaning fee</label>

                  <input type="text" class="form-control" name="cleaning_fee" value="{{$room_data->cleaning_fee}}" readonly="">

                </div>

              </div>
              <div class="col-md-6">

                <div class="form-group">

                  <label>City fee</label>

                  <input type="text" class="form-control" name="city_fee" value="{{$room_data->city_fee}}" readonly="">

                </div>

              </div>
              <div class="col-md-6">

                <div class="form-group">

                  <label>Extra guest per night</label>

                  <input type="text" class="form-control" name="extra_guest_per_night" value="{{$room_data->extra_guest_per_night}}" readonly="">

                </div>

              </div>

              <div class="col-md-6">

                <div class="form-group">

                  <label>Type of price </label>

                  <select class="form-control select2bs4" name="type_of_price" id="type_of_price" style="width: 100%;" disabled="disabled">

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

                  <select class="form-control select2bs4" name="bed_type" id="bed_type" style="width: 100%;" disabled="disabled">
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
                  <select class="form-control select2bs4" name="private_bathroom" id="private_bathroom" style="width: 100%;" disabled="disabled">
                    <option value="">Please select</option>
                    <option value="1" {{ $room_data->private_bathroom == 1 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ $room_data->private_bathroom == 0 ? 'selected' : '' }}>No</option>
                  </select>
                </div>

              </div>
              <div class="col-md-6">

                <div class="form-group">

                  <label>Private entrance</label>
                  <select class="form-control select2bs4" name="private_entrance" id="private_entrance" style="width: 100%;" disabled="disabled">
                    <option value="">Please select</option>
                    <option value="1" {{ $room_data->private_entrance == 1 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ $room_data->private_entrance == 0 ? 'selected' : '' }}>No</option>
                  </select>
                </div>

              </div>
              <div class="col-md-6">

                <div class="form-group">

                  <label>Optional services</label>

                  <input type="text" class="form-control" name="optional_services" value="{{$room_data->optional_services}}" readonly="">

                </div>

              </div>
              <div class="col-md-6">

                <div class="form-group">

                  <label>Family friendly</label>
                  <select class="form-control select2bs4" name="family_friendly" id="family_friendly" style="width: 100%;" disabled="disabled">
                    <option value="">Please select</option>
                    <option value="1" {{ $room_data->family_friendly == 1 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ $room_data->family_friendly == 0 ? 'selected' : '' }}>No</option>
                  </select>

                </div>

              </div>
              <div class="col-md-6">

                <div class="form-group">

                  <label>Outdoor facilities</label>

                  <input type="text" class="form-control" name="outdoor_facilities" value="{{$room_data->outdoor_facilities}}" readonly="">

                </div>

              </div>
              <div class="col-md-6">

                <div class="form-group">

                  <label>Extra people</label>

                  <input type="text" class="form-control" name="extra_people" value="{{$room_data->extra_people}}" readonly="">

                </div>

              </div>

              <div class="col-md-6">

                <div class="form-group">

                  <label>Room description</label>

                  <!-- <input type="text" class="form-control" name="description" value="{{$room_data->description}}" readonly=""> -->
                  <textarea id="summernote" name="description" required>{{$room_data->description}}</textarea>
                </div>

              </div>

              <div class="col-md-6">

                <div class="form-group">

                  <label>Notes</label>

                  <!-- <input type="text" class="form-control" name="notes" value="{{$room_data->notes}}" readonly=""> -->
                  <textarea id="summernote1" name="notes" required>{{$room_data->notes}}</textarea>
                </div>

              </div>

              <div class="col-md-12">
                <div class="d-flex flex-wrap">
                  @foreach($room_images as $image)
                  <div class="image-gridiv">
                    <img src="{{url('public/uploads/room_images/')}}/{{$image->image}}">
                  </div>
                  @endforeach
                </div>
              </div>

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
                  <select class="form-control select2bs4" multiple="multiple" name="amenity[]" id="amenity_{{$value->id}}" data-placeholder="Select Room Amenities" style="width: 100%;" disabled="disabled">
                    <!-- <option value="">Select Room Amenities</option> -->
                    @foreach ($amenities as $amenity)
                    <option value="{{ $amenity->amenity_id }}" <?php if (in_array($amenity->amenity_id, $room_amenities)) {
                                                                  echo 'selected';
                                                                } ?>>{{ $amenity->amenity_name }}</option>
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
                  <select class="form-control select2bs4" multiple="multiple" name="services[]" id="service_{{$value->id}}" data-placeholder="Select {{$value->name}}" style="width: 100%;" disabled="disabled">
                    <!-- <option value="">Select Room Amenities</option> -->

                    @foreach ($services as $service)
                    <option value="{{ $service->id }}" <?php if (in_array($service->id, $room_services)) {
                                                          echo 'selected';
                                                        } ?>>{{ $service->service_name }}</option>
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
                  <select class="form-control select2bs4" multiple="multiple" name="other_features_id[]" id="other_features_id" data-placeholder="Select Other Features" style="width: 100%;" required="required" disabled="disabled">
                    <!-- <option value="">Services & Extras</option> -->
                    @php $other_features = DB::table('room_others_features')->orderby('id', 'ASC')->where('status',1)->get(); @endphp
                    @foreach ($other_features as $value)
                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                  </select>
                </div>
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