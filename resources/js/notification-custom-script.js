/* Default Notifications */
var toastMixin = Swal.mixin({
  toast: true,
  icon: 'success',
  title: 'General Title',
  animation: false,
  position: 'top-right',
  // 'top-start', 'top-end', 'center', 'center-start', 'center-end', 'bottom', 'bottom-start', or 'bottom-end'
  showConfirmButton: false,
  // showCancelButton : true,
  // cancelButtonText : 'X',
  // cancelButtonColor : '#039e07' , 
  // imageUrl : ,
  // background : '#039e07' ,
  // width : '38rem',
  // padding : '1.55rem',
  // target: 'div',
  // grow: 'column',
  // target: '',
  showCloseButton : true,
  timer: 5000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
});

var toastMixinSuccess = Swal.mixin({
  toast: true,
  icon: 'success',
  title: 'General Title',
  // animation: false,
  position: 'top-right',
  showConfirmButton: false,
  showCloseButton : true,
  width : '24rem',
  // padding : '1.55rem',
  timer: 5000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
});

var toastMixinError = Swal.mixin({
  toast: true,
  icon: 'error',
  title: 'General Title',
  // animation: false,
  position: 'top-right',
  showConfirmButton: false,
  showCloseButton : true,
  width : '24rem',
  // padding : '1.55rem',
  timer: 5000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
});

var toastMixinInfo = Swal.mixin({
  toast: true,
  icon: 'info',
  title: 'General Title',
  animation: false,
  position: 'top-right',
  showConfirmButton: false,
  showCloseButton : true,
  width : '38rem',
  padding : '1.55rem',
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
});

// delete notification

// Swal.fire({
//   title: 'Are you sure?',
//   text: "You won't be able to revert this!",
//   icon: 'warning',
//   showCancelButton: true,
//   confirmButtonColor: '#3085d6',
//   cancelButtonColor: '#d33',
//   confirmButtonText: 'Yes, delete it!'
// }).then((result) => {
//   if (result.isConfirmed) {
//     Swal.fire(
//       'Deleted!',
//       'Your file has been deleted.',
//       'success'
//     )
//   }
// })

var toastMixinDelete = Swal.mixin({
  toast: true,
  // icon: 'success',
  // title: 'General Title',

  title: 'Are you sure?',
  // title: 'Are you sure you want to delete this ?',
  // text: "You won't be able to revert this!",
  icon: 'warning',
  // iconHtml: ,
  animation: false,
  position: 'top-right',
  // showConfirmButton: false,
  // showCloseButton : true,

  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!',

  width : '32rem',
  padding : '1.55rem',
  // timer: 5000,
  // timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
});

// function delete_noti(msg) {
//   toastMixinDelete.fire({
//     animation: true,
//     title: msg
//   }).then((result) => {
//       if (result.isConfirmed) {
//         toastMixinSuccess.fire(
//           'Item Delete Sucessfully!',
//           // 'success'
//         )
//       }
//     });
// }

function delete_noti(msg) {
  toastMixinDelete.fire({
    // animation: true,
    // title: msg
    
  }).then((result) => {
      if (result.isConfirmed) {
        // delete_user(id)
        toastMixinSuccess.fire(
          'Item Delete Sucessfully!',
          // 'success'
        )
      }
    });
}

var toastDelete = Swal.mixin({
  toast: true,
  title: 'Are you sure?',
  icon: 'warning',
  // animation: false,
  position: 'top-right',
  // showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!',
  // width : '37rem',
  // padding : '1.55rem',
  // showCloseButton : true,
  // type: "warning",
  showCancelButton: !0,
  // cancelButtonText: "No, cancel!",
  reverseButtons: !0
});

var toastMixinLeftSuccess = Swal.mixin({
  toast: true,
  icon: 'success',
  title: 'General Title',
  animation: false,
  position: 'top-start',
  showConfirmButton: false,
  showCloseButton : true,
  timer: 5000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
});

var toastMixinLeftError = Swal.mixin({
  toast: true,
  icon: 'error',
  title: 'General Title',
  animation: false,
  position: 'top-start',
  showConfirmButton: false,
  showCloseButton : true,
  timer: 5000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
});

function default_noti(msg) {
  toastMixin.fire({
    animation: true,
    title: msg
  });
}

function success_noti(msg) {
  toastMixinSuccess.fire({
    // animation: true,
    title: msg
  });
}

function error_noti(msg) {
  toastMixinError.fire({
    // animation: true,
    title: msg
  });
}

function info_noti(msg) {
  toastMixinInfo.fire({
    animation: true,
    title: msg
  });
}

function success_l_noti(msg) {
  toastMixinLeftSuccess.fire({
    animation: true,
    title: msg
  });
}

function error_l_noti(msg) {
  toastMixinLeftError.fire({
    animation: true,
    title: msg
  });
}