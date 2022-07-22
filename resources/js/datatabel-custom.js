$(function () {
  $("#example1").DataTable({
    "responsive": true, "lengthChange": false, "autoWidth": false,
    "buttons": ["copy", "csv", "excel", "pdf", "print"],
    // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    "scrollCollapse": true,
    "paging":         true,
    "fnDrawCallback": function() {
        jQuery('.toggle-class').bootstrapToggle();
    }
  }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  // $('#example1').DataTable({
  //   "paging": true,
  //   "lengthChange": false,
  //   "searching": false,
  //   "ordering": true,
  //   "info": true,
  //   "autoWidth": false,
  //   "responsive": true,
  // });
});

// $('#email_alerts').DataTable( {

//   "scrollCollapse": true,
//   "paging":         true,
//   "fnDrawCallback": function() {
//       jQuery('.toggle').bootstrapToggle();
//   }

// });

