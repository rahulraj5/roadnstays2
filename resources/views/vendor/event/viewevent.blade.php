@extends('vendor.layout.layout')
@section('title', 'Event List')
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
  $("#updateEvent_form").validate({
    debug: false,
    rules: {
      title: {
        required: true,
      },
      description: {
        required: true,
      },
      event_img: {
        required: true,
      },
      price: {
        required: true,
      },
      ticket_qty: {
        required: true,
      },
      address: {
        required: true,
      },
      start_date: {
        required: true,
      },
      start_time: {
        required: true,
      },
      end_date: {
        required: true,
      },
      end_time: {
        required: true,
      },
    },
    submitHandler: function (form) {
      var site_url = $("#baseUrl").val();
      // alert(site_url);
      var formData = $(form).serialize();
      $(form).ajaxSubmit({
        type: 'POST',
        url: "{{url('/admin/updateEvent')}}",
        data: formData,
        success: function (response) {
          // console.log(response);
          if (response.status == 'success') {
            // $("#register_form")[0].reset();
            success_noti(response.msg);
            // setTimeout(function(){window.location.reload()},1000);
            setTimeout(function(){window.location.href=site_url+"/vendor/events_list"},1000);
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
@endsection
@section('content')
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
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Title</label>
                      <input type="text" class="form-control" name="title" id="title" placeholder="Enter title" value="{{$event->title}}" readonly="">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="customFile">Event Image</label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="event_img" name="event_img" disabled="">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>
                    </div>
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
                      <input type="text" class="form-control" name="price" id="price" placeholder="Enter price" value="{{$event->price}}" readonly="">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Ticket Qty.</label>
                      <input type="text" class="form-control" name="ticket_qty" id="ticket_qty" placeholder="Enter ticket qty" value="{{$event->ticket_qty}}" readonly="">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Description</label>
                      <textarea class="form-control" name="description" id="description" required="" readonly="">{{$event->description}}</textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Address</label>
                      <input type="text" class="form-control" name="address" id="address" placeholder="Enter address" required="" value="{{$event->address}}" readonly="">
                      <input type="hidden" name="latitude" id="latitude" value="">
                      <input type="hidden" name="longitude" id="longitude" value="">
                      <input type="hidden" name="city" id="city" value="">
                      <input type="hidden" name="country" id="country" value="">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Start date</label>
                      <input type="text" class="form-control" name="start_date" id="start_date" placeholder="Enter start date" required="" value="{{$event->start_date}}" readonly="">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Start time</label>
                      <input type="text" class="form-control timepicker" name="start_time" id="start_time" placeholder="Enter start time" value="{{$event->start_time}}" readonly="">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>End date</label>
                      <input type="text" class="form-control" name="end_date" id="end_date" placeholder="Enter end date" required="" value="{{$event->end_date}}" readonly="">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>End time</label>
                      <input type="text" class="form-control timepicker" name="end_time" id="end_time" placeholder="Enter end time" required="" value="{{$event->end_time}}" disabled="">
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
                  <?php $hotel_ids = json_decode($event['hotel_ids']);?>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Hotels</label>
                      <select class="form-control select2bs4" multiple="multiple" name="hotelname[]"data-placeholder="Select Hotels"style="width: 100%;" disabled="">
                        @if (!$hotelList->isEmpty())
                        @foreach ($hotelList as $hotel)
                        <option value="{{ $hotel->hotel_id }}"  <?php if (in_array($hotel->hotel_id, $hotel_ids )) { echo 'selected';} ?>>{{ $hotel->hotel_name }}</option>
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
                  
                 
                  <!-- <div class="col-12"> 
                    <button class="btn btn-primary btn-dark float-right" name="submit" type="submit">Update</button>
                  </div> -->
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
@endsection