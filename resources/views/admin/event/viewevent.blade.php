@extends('admin.layout.layout')
@section('title', 'Edit New Event')

@section('current_page_css')

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">

<link rel="stylesheet" href="//jonthornton.github.io/jquery-timepicker/jquery.timepicker.css">
<link rel="stylesheet" href="{{ asset('resources/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{ asset('resources/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<!-- iCheck -->
<link rel="stylesheet" href="{{ asset('resources/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{ asset('resources/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<!-- Datetime picker -->
<link rel="stylesheet" href="{{ asset('resources/css/bootstrap-datetimepicker.min.css')}}">
<!-- BS Stepper -->
<link rel="stylesheet" href="{{ asset('resources/plugins/bs-stepper/css/bs-stepper.min.css')}}">
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('resources/plugins/summernote/summernote-bs4.min.css')}}">
@endsection

@section('current_page_js')
<script src="//jonthornton.github.io/jquery-timepicker/jquery.timepicker.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
<!-- jquery-validation -->
<!-- Select2 -->
<script src="{{ asset('resources/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- datetimepicker -->
<script src="{{ asset('resources/js/bootstrap-datetimepicker.min.js')}}"></script>
<!-- BS-Stepper -->
<script src="{{ asset('resources/plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>
<!-- Summernote -->
<script src="{{ asset('resources/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- Multi-form -->
<script src="{{ asset('resources/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{ asset('resources/plugins/jquery-validation/additional-methods.min.js')}}"></script>
<script src="{{ asset('resources/plugins/select2/js/select2.full.min.js')}}"></script>
<script>
   $(document).ready(function() {
     // Select2 Multiple
     $('.select2bs4').select2({
       theme: 'bootstrap4'
     })
   });
   $("select").on("select2:select", function(evt) {
     var element = evt.params.data.element;
     var $element = $(element);
   
     $element.detach();
     $(this).append($element);
     $(this).trigger("change");
   });
</script>
<script>
  // $("#updateEvent_form").validate({
  //   debug: false,
  //   rules: {
  //     title: {
  //       required: true,
  //     },
  //     description: {
  //       required: true,
  //     },
  //     // event_img: {
  //     //   required: true,
  //     // },
  //     address: {
  //       required: true,
  //     },
  //     start_date: {
  //       required: true,
  //     },
  //     start_time: {
  //       required: true,
  //     },
  //     end_date: {
  //       required: true,
  //     },
  //     end_time: {
  //       required: true,
  //     },
  //   },
  //   submitHandler: function (form) {
  //     var site_url = $("#baseUrl").val();
  //     var formData = $(form).serialize();
  //     $(form).ajaxSubmit({
  //       type: 'POST',
  //       url: "{{url('/admin/updateEvent')}}",
  //       data: formData,
  //       success: function (response) {
  //         // console.log(response);
  //         if (response.status == 'success') {
  //           // $("#register_form")[0].reset();
  //           success_noti(response.msg);
  //           // setTimeout(function(){window.location.reload()},1000);
  //           setTimeout(function(){window.location.href=site_url+"/admin/events_list"},1000);
  //         } else {
  //           error_noti(response.msg);
  //         }

  //       }
  //     });
  //     // event.preventDefault();
  //   }
  // });

  // $(document).ready(function () {
  //     $("#start_date").datepicker({
  //         dateFormat: "dd-M-yy",
  //         minDate: 0,
  //         onSelect: function (date) {
  //             var dt2 = $('#end_date');
  //             var startDate = $(this).datepicker('getDate');
  //             var minDate = $(this).datepicker('getDate');
  //             dt2.datepicker('setDate', minDate);
  //             startDate.setDate(startDate.getDate() + 30);
  //             dt2.datepicker('option', 'maxDate', startDate);
  //             dt2.datepicker('option', 'minDate', minDate);
  //             $(this).datepicker('option', 'minDate', minDate);
  //         }
  //     });
  //     $('#end_date').datepicker({
  //         dateFormat: "dd-M-yy"
  //     });

  //     $('#start_time').timepicker();
  //     $('#end_time').timepicker();
  // });
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
          <a href="{{url('/admin/events_list')}}"><i class="right fas fa-angle-left"></i>Back</a>
          </div>
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Event</li>
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
            <h3 class="card-title">View Event</h3>
          </div>

          <!-- /.card-header -->
          <div class="card-body">
            <form  method="POST" id="updateEvent_form" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="event_id" id="event_id" value="{{$event['id']}}">
              <input type="hidden" name="old_event_image" id="old_event_image" value="{{$event['image']}}">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter title" value="{{$event['title']}}" readonly="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="customFile">Event Image</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="event_img" name="event_img" disabled="">
                      <label class="custom-file-label" for="customFile" disabled="">Choose file</label>
                    </div>
                  </div>
                  @if((!empty($event['image'])))
                    <div class="col-md-12">
                      <div class="d-flex flex-wrap">
                        <div class="image-gridiv">
                          <img src="{{url('public/uploads/event_gallery/')}}/{{$event['image']}}">
                        </div>
                      </div>
                    </div>
                  @endif
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="customFile">Event Gallery</label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="eventGallery" name="eventGallery[]" multiple disabled="">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Event Type</label>
                      <select class="form-control" id="type-dropdown" name="type" disabled="">
                        <option>Select Type</option>
                        <option value="free" <?php if ($event['type'] == 'free') { echo 'selected';} ?>>Free</option>
                        <option value="free_booking" <?php if ($event['type'] == 'free_booking') { echo 'selected';} ?>> Free Booking</option>
                        <option value="paid" <?php if ($event['type'] == 'paid') { echo 'selected';} ?>>Paid</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="d-flex flex-wrap">
                      @php $event_gallery = DB::table('event_gallery')->orderby('id', 'ASC')->where('event_id', $event->id)->get(); 
                      @endphp
                      @foreach($event_gallery as $image)
                      <div class="image-gridiv" id="hotelGalleryPreview">
                        <span class="pip" id="remove_img_{{$image->id}}">
                          <img class="imageThumb" src="{{url('public/uploads/event_gallery/')}}/{{$image->image}}">
                          <br /><span class="removeImage" id="@php echo $image->id; @endphp">Remove image</span></span>
                      </div>
                      @endforeach
                    </div>
                  </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Price</label>
                    <input type="text" class="form-control" name="price" id="price" placeholder="Enter price" value="{{$event['price']}}" readonly="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Ticket Qty.</label>
                    <input type="text" class="form-control" name="ticket_qty" id="ticket_qty" placeholder="Enter ticket qty" value="{{$event['ticket_qty']}}" readonly="">
                  </div>            
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description" id="description" required="" readonly="">{{$event['description']}}</textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address" id="address" placeholder="Enter address" required="" value="{{$event['address']}}" readonly="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Start date</label>
                    <input type="text" class="form-control" name="start_date" id="start_date" placeholder="Enter start date" required="" value="{{$event['start_date']}}" readonly="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Start time</label>
                    <input type="text" class="form-control timepicker" name="start_time" id="start_time" placeholder="Enter start time" value="{{$event['start_time']}}" readonly="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>End date</label>
                    <input type="text" class="form-control" name="end_date" id="end_date" placeholder="Enter end date" required="" value="{{$event['end_date']}}" readonly="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>End time</label>
                    <input type="text" class="form-control timepicker" name="end_time" id="end_time" placeholder="Enter end time" required="" value="{{$event['end_time']}}" readonly="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Select Distance</label>
                    <select class="form-control" id="mile-dropdown" disabled="">
                      <option>Select Distance</option>
                      <option value="1"> 1 Mile</option>
                      <option value="2"> 2 Mile</option>
                      <option value="3"> 3 Mile</option>
                      <option value="4"> 4 Mile</option>
                      <option value="5"> 5 Mile</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Vendor</label>
                    <select class="form-control select2bs4" name="vendor_id" id="vendor_id" style="width: 100%;" disabled>
                      <option value="">Select Vendors</option>
                      @php $vendors = DB::table('users')->orderby('first_name', 'ASC')->where('user_type', 'service_provider')->get(); @endphp
                      @foreach ($vendors as $value)
                      <option value="{{ $value->id }}" @php if($event['vendor_id']==$value->id){echo "selected";} @endphp>{{ $value->first_name }} {{ $value->last_name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <?php $hotel_ids = json_decode($event['hotel_ids']);?>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Hotels</label>
                      <select class="form-control select2bs4" multiple="multiple" name="hotelname[]"data-placeholder="Select Hotels"style="width: 100%;" disabled="">
                        @if (!$hotelList->isEmpty())
                        @foreach ($hotelList as $hotel)
                        <option value="{{ $hotel->hotel_id }}" <?php if (in_array($hotel->hotel_id, $hotel_ids )) { echo 'selected';} ?>>{{ $hotel->hotel_name }}</option>
                        @endforeach
                        @endif
                      </select>
                    </div>
                  </div> 
                  <?php $space_ids = json_decode($event['space_ids']);?>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Spaces</label>
                      <select class="form-control select2bs4" multiple="multiple" name="spacename[]"data-placeholder="Select Spaces" style="width: 100%;" disabled="">
                        @if (!$spaceList->isEmpty())
                        @foreach ($spaceList as $space)
                        <option value="{{ $space->space_id }}" <?php if (in_array($space->space_id, $space_ids)) {echo 'selected';} ?>>{{ $space->space_name }}</option>
                        @endforeach
                        @endif
                      </select>
                    </div>
                  </div> 

                <div class="col-md-12 mt-0">
                  <div class="tab-custom-content mt-0">
                    <p class="lead mb-0">
                    <h4>Operator Details</h4>
                    </p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Operator Name</label>
                    <input readonly type="text" class="form-control" name="operator_name" id="operator_name" value="{{$event->operator_name}}" placeholder="Enter Operator Name">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Operator Contact Name</label>
                    <input readonly type="text" class="form-control" name="operator_contact_name" id="operator_contact_name" value="{{$event->operator_contact_name}}" placeholder="Enter Contact Name">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Operator Contact Number</label>
                    <input readonly type="text" class="form-control" name="operator_contact_num" id="operator_contact_num" value="{{$event->operator_contact_num}}" placeholder="Enter Contact Number">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Operator Email</label>
                    <input readonly type="text" class="form-control" name="operator_email" id="operator_email" value="{{$event->operator_email}}" placeholder="Enter Operator Email">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Operator Booking Number</label>
                    <input readonly type="text" class="form-control" name="operator_booking_num" id="operator_booking_num" value="{{$event->operator_booking_num}}" placeholder="Enter Operator Booking Number">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Scouts</label>
                    <select class="form-control select2bs4" name="scout_id" id="scout_id" style="width: 100%;" disabled>
                      <option value="">Select Scouts</option>
                      @php $scouts = DB::table('users')->orderby('first_name', 'ASC')->where('user_type', 'scout')->get(); @endphp
                      @foreach ($scouts as $value)
                      <option value="{{ $value->id }}" @php if($event->scout_id == $value->id){echo "selected";} @endphp>{{ $value->first_name }} {{ $value->last_name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                 
                 
                <!-- <div class="col-12">
                  <button class="btn btn-primary btn-dark float-right" name="submit" type="submit">Submit</button>
                </div> -->
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