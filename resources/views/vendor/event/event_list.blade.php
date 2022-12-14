@extends('vendor.layout.layout')
@section('title', 'Event List')
@section('current_page_css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('resources/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('resources/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<style>
   .slow .toggle-group {
   transition: left 0.7s;
   -webkit-transition: left 0.7s;
   }
</style>
<style>
   /*.container-fluid {
   padding-right: 0px !important;
   padding-left: 0px !important;
   }*/
</style>
<style>
   .btn_add{
   margin-left: 20px; 
   top: 55px; 
   position: relative; 
   z-index: 999999;
   }
</style>
@endsection
@section('current_page_js')
<!-- DataTables  & Plugins -->
<script src="{{ asset('resources/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('resources/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('resources/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('resources/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('resources/assets/js/datatable_custom.js')}}"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script type="text/javascript">
   function deleteConfirmation(id) {
     toastDelete.fire({
     }).then(function(e) {
       if (e.value === true) {
           // alert(id);
         var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
         $.ajax({
           type: 'POST',
           url: "{{url('/servicepro/deleteEvent')}}",
           data: {
             id: id,
             _token: CSRF_TOKEN
           },
           dataType: 'JSON',
           success: function(results) {
             $("#row" + id).remove();
             // console.log(results);
             success_noti(results.msg);
             setTimeout(function() { window.location.reload() }, 1000);
           }
         });
       } else {
         e.dismiss;
       }
     }, function(dismiss) {
       return false;
     })
   }
</script>
<script>
   $('.toggle-class').on('change', function() {
     var status = $(this).prop('checked') == true ? 1 : 0; 
     var id = $(this).data('id');
     // alert(status);
     // alert(user_id);
     $.ajax({
       type: "GET",
       dataType: "json",
       url: "<?php echo url('/servicepro/changeEventStatus'); ?>",
       data: {'status': status, 'id': id},
       success: function(data){
         success_noti(data.success);
         // console.log(data);
         // $('#success_message').fadeIn().html(data.success);
         // setTimeout(function() { $('#success_message').fadeOut("slow"); }, 2000 );
       },
       error: function(errorData) {
         console.log(errorData);
         alert('Please refresh page and try again!');
       }
     });
   })
</script>
@endsection
@section('content')
<a href="{{ url('/servicepro/addEvent') }}" class="btn btn-primary btn-dark btn_add htl-add">Add</a>
<div class="card hotel_info-card">
   <div class="card-body table-responsive">
      <table id="example1" class="table table-bordered table-striped htl-listing">
         <thead>
            <tr>
               <th>SNo.</th>
               <th>Title</th>
               <th>Image</th>
               <th>Start Date</th>
               <th>Star Time</th>
               <th>End Date</th>
               <th>End Time</th>
               <th>Address</th>
               <th>Status</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            @if (!$eventList->isEmpty())
            <?php $i = 1; ?>
            @foreach ($eventList as $arr)
            <tr id="row{{ $arr->id }}">
               <td>{{ $i }}</td>
               <td>{{ $arr->title }}</td>
               <td><img src="{{url('/')}}/public/uploads/event_gallery/{{$arr->image}}" width="100" height="100"></td>
               <td>{{ $arr->start_date }}</td>
               <td>{{ $arr->start_time }}</td>
               <td>{{ $arr->end_date }}</td>
               <td>{{ $arr->end_time }}</td>
               <td>{{ $arr->address }}</td>
               <td class="project-state">
                  <input  type="checkbox" class="toggle-class" data-id="{{$arr->id}}" data-toggle="toggle" data-style="slow" data-onstyle="success" data-size="small" data-on="Approved" data-off="Pending for approval" {{ $arr->status ? 'checked' : '' }} disabled>
               </td>
               <td class="text-right py-0 align-middle">
                  <div class="btn-group btn-group-sm">
                     <a href="{{url('/servicepro/view-event')}}/{{base64_encode($arr->id)}}" class="btn btn-secondary" style="margin-right: 3px;"><i class="bx bxs-show"></i></a>
                     <a href="{{url('/servicepro/edit_event')}}/{{base64_encode($arr->id)}}" class="btn btn-info" style="margin-right: 3px;"><i class="bx bxs-edit"></i></a>
                     <a href="javascript:void(0)" onclick="deleteConfirmation('<?php echo $arr->id; ?>');" class="btn btn-danger" style="margin-right: 3px;"><i class="bx bxs-trash"  alt="user" title="user"></i></a>
                  </div>
               </td>
            </tr>
            <?php $i++; ?>
            @endforeach
            @endif
         </tbody>
      </table>
   </div>
   <!-- /.card-body -->
</div>
<!-- /.card -->
</div>
<!-- /.col -->
<!-- </div> -->
</div>
</div>
</div>
</div>
</div>
</section>
</main>
<!-- End #main -->
@endsection