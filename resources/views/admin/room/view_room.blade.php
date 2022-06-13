@extends('admin.layout.layout')
@section('title', 'View - Room')
@section('current_page_css')
@endsection
@section('current_page_js')
<script type="text/javascript">
  
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


          <?php //echo "<pre>";print_r($room_data); ?>
          <!-- /.card-header -->

          <div class="card-body">

              <form  method="POST" id="roomAdmin_form" enctype="multipart/form-data"> 

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

                      <label>Type of price  </label>
                      <input type="text" class="form-control" name="type_of_price" value="{{$room_data->type_of_price}}" readonly="">
                      
                    </div>

                  </div>
                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Bed type</label>

                      <input type="text" class="form-control" name="bed_type" value="{{$room_data->bed_type}}" readonly="">
                    </div>

                  </div>
                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Private bathroom</label>
                      <input type="text" class="form-control" name="private_bathroom" value="{{$room_data->private_bathroom}}" readonly="">
                    </div>

                  </div>
                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Private entrance</label>
                      <input type="text" class="form-control" name="private_entrance" value="{{$room_data->private_entrance}}" readonly="">
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
                      <input type="text" class="form-control" name="" value="{{$room_data->family_friendly}}" readonly="">

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

                      <input type="text" class="form-control" name="description" value="{{$room_data->description}}" readonly="">

                    </div>

                  </div>

                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Notes</label>

                      <input type="text" class="form-control" name="notes" value="{{$room_data->notes}}" readonly="" >

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