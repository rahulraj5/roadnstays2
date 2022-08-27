@extends('admin.layout.layout')
@section('title', 'User - Profile')
@section('current_page_css')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('resources/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{ asset('resources/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('resources/plugins/summernote/summernote-bs4.min.css')}}">
<!-- fullCalendar -->
<link rel="stylesheet" href="{{ asset('resources/plugins/fullcalendar/main.css')}}">

<!-- <link rel="stylesheet" href="{{ url('resources/assets/css/materialize.min.css') }}"> -->

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
@endsection
@section('current_page_js')
<!-- Select2 -->
<script src="{{ asset('resources/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- Summernote -->
<script src="{{ asset('resources/plugins/summernote/summernote-bs4.min.js')}}"></script>

<!-- <script src="{{url('/')}}/resources/assets/js/materialize.min.js"></script> -->
<!-- fullCalendar 2.2.5 -->
<!-- <script src="../plugins/moment/moment.min.js"></script> -->
<script src="{{ asset('resources/plugins/fullcalendar/main.js')}}"></script>
<!-- Page specific script -->

<!-- calendar script start here -->

<!-- calendar script start here -->

<!-- this script with theme start here -->
<!-- <script>
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (https://fullcalendar.io/docs/event-object)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    ini_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendar.Draggable;

    var containerEl = document.getElementById('external-events');
    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');
    // alert(calendarEl);

    // initialize the external events
    // -----------------------------------------------------------------

    new Draggable(containerEl, {
      itemSelector: '.external-event',
      eventData: function(eventEl) {
        return {
          title: eventEl.innerText,
          backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
        };
      }
    });

    var calendar = new Calendar(calendarEl, {
      headerToolbar: {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      themeSystem: 'bootstrap',
      //Random default events
      events: [
        {
          title          : 'All Day Event',
          start          : new Date(y, m, 1),
          backgroundColor: '#f56954', //red
          borderColor    : '#f56954', //red
          allDay         : true
        },
        {
          title          : 'Long Event',
          start          : new Date(y, m, d - 5),
          end            : new Date(y, m, d - 2),
          backgroundColor: '#f39c12', //yellow
          borderColor    : '#f39c12' //yellow
        },
        {
          title          : 'Meeting',
          start          : new Date(y, m, d, 10, 30),
          allDay         : false,
          backgroundColor: '#0073b7', //Blue
          borderColor    : '#0073b7' //Blue
        },
        {
          title          : 'Lunch',
          start          : new Date(y, m, d, 12, 0),
          end            : new Date(y, m, d, 14, 0),
          allDay         : false,
          backgroundColor: '#00c0ef', //Info (aqua)
          borderColor    : '#00c0ef' //Info (aqua)
        },
        {
          title          : 'Birthday Party',
          start          : new Date(y, m, d + 1, 19, 0),
          end            : new Date(y, m, d + 1, 22, 30),
          allDay         : false,
          backgroundColor: '#00a65a', //Success (green)
          borderColor    : '#00a65a' //Success (green)
        },
        {
          title          : 'Click for Google',
          start          : new Date(y, m, 28),
          end            : new Date(y, m, 29),
          url            : 'https://www.google.com/',
          backgroundColor: '#3c8dbc', //Primary (light-blue)
          borderColor    : '#3c8dbc' //Primary (light-blue)
        }
      ],
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function(info) {
        // is the "remove after drop" checkbox checked?
        if (checkbox.checked) {
          // if so, remove the element from the "Draggable Events" list
          info.draggedEl.parentNode.removeChild(info.draggedEl);
        }
      }
    });

    calendar.render();
    // $('#calendar').fullCalendar()

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    // Color chooser button
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      // Save color
      currColor = $(this).css('color')
      // Add color effect to button
      $('#add-new-event').css({
        'background-color': currColor,
        'border-color'    : currColor
      })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      // Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      // Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.text(val)
      $('#external-events').prepend(event)

      // Add draggable funtionality
      ini_events(event)

      // Remove event from text input
      $('#new-event').val('')
    })
  })
</script> -->
<!-- this script with theme end here -->

<!-- <script>
  document.addEventListener('DOMContentLoaded', function() 
  {
    var calendarButton = document.getElementById('calendarButton');
    var calendarEl = document.getElementById('schedule_calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
      },
      defaultView: 'dayGridMonth',
      defaultDate: new Date(),
      navLinks: true, // can click day/week names to navigate views

      weekNumbers: true,
      weekNumbersWithinDays: true,
      weekNumberCalculation: 'ISO',
      eventTimeFormat: {
        hour: 'numeric',
        minute: '2-digit',
        // omitZeroMinute: true,
        meridiem: 'short'
      },
      selectable: true,
      selectMirror: true,
      select: function(arg) {
        console.log(arg);

        var check = convert(arg.start);
        var today = convert(new Date());

        var new_check = arg.start;
        var new_today = new Date();
        new_today.setHours(0, 0, 0, 0);

        if (new_check < new_today) {
          alert("You can't create lesson in previous date.");
        } else {
          $("#lesson_date").val(convert_formate(arg.start));
          openModal1();
        }
        calendar.unselect();
      },
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      eventRender: function(info) {
        info.el.classList.add("tooltipped");
        info.el.setAttribute("data-tooltip", info.event.title);
      },
      events: [
        <?php
        if (!empty($schedule_list)) {
            foreach ($schedule_list as $key => $value) {
                echo "{
                        id: '" . $value->id . "',
                        groupId: '" . $value->id . "_" . date('d M, Y', strtotime($value->lesson_date)) . "_" . date('H:iA', strtotime($value->time_from)) . "_" . date('H:iA', strtotime($value->time_until)) . "_" . $value->invite_type . "_" . $value->school . "_" . $value->grade . "_" . $value->section . "',
                        title: '" . trim(str_replace("'", "", $value->description)) . "',
                        start: '" . $value->lesson_date . "T" . $value->time_from . "',
                        end: '" . $value->lesson_date . "T" . $value->time_until . "'
                      },";
            }
        }
        ?>
      ],
      eventClick: function(arg) {
        var comma_str = arg.event.groupId;
        console.log(comma_str);
        var result = comma_str.split('_');
        var description = arg.event.title;
        $("#lesson_id").val(result[0]);
        $("#lesson_date").val(result[1]);
        var strarray = grade_id = result[6];
        var strar = strarray.split(',');
        $("#schoolFilterID").val(result[5]);
        var from_time = changeTimeFormate(result[2]);
        var until_time = changeTimeFormate(result[3]);
        $("#from").val(from_time);
        $("#until").val(until_time);
        $("#description").val(description);
        $("#lesson_id_group").val(result[0]);
        $("#lesson_date_group").val(result[1]);
        $("#from_group").val(from_time);
        $("#until_group").val(until_time);
        $("#grade_group").val(strar[0]);
        $("#description_group").val(description);
        var section_id = result[7];
        var lesson_id = result[0];

        if (result[4] == 4) {
          getLessonData(lesson_id);

        } else {
          getSectionGrade(section_id, grade_id);
        }


        if (result[5] != '') {
          $("#modal2 select#schoolFilterID option").each(function() {

            if ($(this).val() == result[5]) {
              $(this).attr("selected", "selected");
            }
          });
        }

        if (strar[0] != '') {
          $("#modal2 select#gradeFilterID option").each(function() {

            if ($(this).val() == strar[0]) {
              $(this).attr("selected", "selected");
            }
          });
        }

        if (result[7] != '') {
          $("#modal2 select#sectionFilterID option").each(function() {
            if ($(this).val() == result[7]) {
              $(this).attr("selected", "selected");
            }
          });
        }

        $("#edit_lesson_id").val(result[0]);
        $("#edit_lesson_date").val(result[1]);
        var strarray = grade_id = result[6];
        var strar = strarray.split(',');
        $("#edit_schoolFilterID").val(result[5]);
        var from_time = changeTimeFormate(result[2]);
        var until_time = changeTimeFormate(result[3]);
        $("#edit_from").val(from_time);
        $("#edit_until").val(until_time);
        $("#edit_description").val(description);

        $('#edit_re_school_id').val(result[5]);
        $('#edit_re_grade_id').val(result[6]);
        $('#edit_re_section_id').val(result[7]);

        $('#edit_from_label').addClass('active');
        $('#edit_until_label').addClass('active');
        //alert(result[7]);
        if (result[4] == 4) {
          openModalModal4();
        } else {
          openModal2();
        }


        $("#lesson_date_label").addClass("active");
        $("#from_label").addClass("active");
        $("#until_label").addClass("active");
        $("#description_label").addClass("active");

        if (result[0] != '' || result[0] != null) {
          $("#invite_class_btn").html('Update').css('background-color', 'green');
          $("#session_delete_box").html('<button type="button" lesson_attr="' + result[0] + '" id="delete_session" class="waves-effect waves-light btn" style="background-color:#ee6e73 !important;">Delete</button>');
          $("#session_delete_box_recuring").html('<button type="button" lesson_attr="' + result[0] + '" id="delete_session" class="waves-effect waves-light btn" style="background-color:#ee6e73 !important;">Delete</button>');

        } else {
          $("#invite_class_btn").html('Invite Class');
        }
      }
    });
    calendar.render();
  });

  function ShowCal() {
    // setTimeout(function () {
    document.addEventListener('DOMContentLoaded', function() {
      var calendarButton = document.getElementById('calendarButton');
      var calendarEl = document.getElementById('schedule_calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        },
        defaultView: 'timeGridWeek',
        defaultDate: new Date(),
        navLinks: true, // can click day/week names to navigate views

        weekNumbers: true,
        weekNumbersWithinDays: true,
        weekNumberCalculation: 'ISO',

        selectable: true,
        selectMirror: true,
        select: function(arg) {
          console.log(arg);

          var check = convert(arg.start);
          var today = convert(new Date());

          var new_check = arg.start;
          var new_today = new Date();
          new_today.setHours(0, 0, 0, 0);

          if (new_check < new_today) {
            // Previous Day. 
            alert("You can't create lesson in previous date.");
          } else {
            // Right Date
            $("#lesson_date").val(convert_formate(arg.start));
            openModal1();
          }

          calendar.fullCalendar('unselect');
        },
        editable: true,
        eventLimit: true, // allow "more" link when too many events
        eventRender: function(info) {
          info.el.classList.add("tooltipped");
          info.el.setAttribute("data-tooltip", info.event.title);
        },
        events: [
          <?php
            if (!empty($schedule_list)) {
                foreach ($schedule_list as $key => $value) {
                    echo "{
                                    id: '" . $value->id . "',
                                    groupId: '" . $value->id . "_" . date('d M, Y', strtotime($value->lesson_date)) . "_" . date('H:iA', strtotime($value->time_from)) . "_" . date('H:iA', strtotime($value->time_until)) . "_" . $value->grade . "',
                                    title: '" . trim(str_replace("'", "", $value->description)) . "',
                                    start: '" . $value->lesson_date . "T" . $value->time_from . "',
                                    end: '" . $value->lesson_date . "T" . $value->time_until . "'
                                  },";
                }
            }
            ?>
        ],
        eventClick: function(arg) {
          var comma_str = arg.event.groupId;
          var result = comma_str.split('_');
          var description = arg.event.title;

          $("#lesson_id").val(result[0]);
          $("#lesson_date").val(result[1]);
          $("#from").val(result[2]);
          $("#until").val(result[3]);
          $("#grade").val(result[4]);
          $("#description").val(description);

          openModal2();

          $("#lesson_date_label").addClass("active");
          $("#from_label").addClass("active");
          $("#until_label").addClass("active");
          $("#description_label").addClass("active");

          $('select[name^="grade"] option[value="' + result[4] + '"]').attr("selected", "selected");
          if (result[0] != '' || result[0] != null) {
            $("#invite_class_btn").html('Update').css('background-color', 'green');
            $("#session_delete_box").html('<button type="button" lesson_attr="' + result[0] + '" id="delete_session" class="waves-effect waves-light btn" style="background-color:#ee6e73 !important;">Delete</button>');
          } else {
            $("#invite_class_btn").html('Invite Class');
          }
        }
      });

      calendar.render();
    });
    $("button.fc-dayGridMonth-button").click();
    $("button.fc-timeGridWeek-button").click();
    // }, 200);   
  }

  function changeTimeFormate(time) {
    var timeString = time;
    var hourEnd = timeString.indexOf(":");
    var H = +timeString.substr(0, hourEnd);
    var h = H % 12 || 12;
    var ampm = H < 12 ? "AM" : "PM";
    return timeString = h + timeString.substr(hourEnd, 3) + ampm;
  }
</script> -->


<script>
    var date = new Date();
    var d = date.getDate();
    m = date.getMonth();
    y = date.getFullYear();

    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar1');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            themeSystem: 'bootstrap',
            initialView: 'dayGridMonth',

            navLinks: true, // can click day/week names to navigate views

            weekNumbers: true,
            weekNumberCalculation: 'ISO',
            eventTimeFormat: {
                hour: 'numeric',
                minute: '2-digit',
                // omitZeroMinute: true,
                meridiem: 'short'
            },
            selectable: true,
            selectMirror: true,
            select: function(arg) {
                console.log('selected date range arg 1');
                console.log(arg);

                // var check = convert(arg.start);
                // var today = convert(new Date());
                var check = arg.start;
                var today = new Date();
                // console.log(check);
                // console.log(today);
                var new_check = arg.start;
                var new_today = new Date();
                new_today.setHours(0, 0, 0, 0);

                if (new_check < new_today) {
                    error_noti("You can't select previous date.");
                    // alert("You can't select previous date.");
                } else {
                    // alert("You have selected date successfully.");
                    // success_noti("You have selected date successfully.");
                    openModal1();
                }
                calendar.unselect();
            },
            editable: true,
            events: [{
                    title: 'PKR 1500',
                    start: new Date(y, m, 1),
                    backgroundColor: '#f56954', //red
                    borderColor: '#f56954', //red
                    allDay: true
                },
                {
                    title: 'PKR 2000',
                    start: new Date(y, m, d - 5),
                    // start          : new Date(y, m, d),
                    end: new Date(y, m, d + 2),
                    // end            : new Date(y, m, d),
                    backgroundColor: '#f39c12', //yellow
                    borderColor: '#f39c12' //yellow
                },
                // {
                //   title          : 'Meeting',
                //   start          : new Date(y, m, d, 10, 30),
                //   allDay         : false,
                //   backgroundColor: '#0073b7', //Blue
                //   borderColor    : '#0073b7' //Blue
                // },
                // {
                //   title          : 'Lunch',
                //   start          : new Date(y, m, d, 12, 0),
                //   end            : new Date(y, m, d, 14, 0),
                //   allDay         : false,
                //   backgroundColor: '#00c0ef', //Info (aqua)
                //   borderColor    : '#00c0ef' //Info (aqua)
                // },
                // {
                //   title          : 'Birthday Party',
                //   start          : new Date(y, m, d + 1, 19, 0),
                //   end            : new Date(y, m, d + 1, 22, 30),
                //   allDay         : false,
                //   backgroundColor: '#00a65a', //Success (green)
                //   borderColor    : '#00a65a' //Success (green)
                // },
                // {
                //   title          : 'Click for Google',
                //   start          : new Date(y, m, 28),
                //   end            : new Date(y, m, 29),
                //   url            : 'https://www.google.com/',
                //   backgroundColor: '#3c8dbc', //Primary (light-blue)
                //   borderColor    : '#3c8dbc' //Primary (light-blue)
                // }
            ],
            eventClick: function(arg) {
                console.log('event click arg 2');
                console.log(arg);
            },
        });
        calendar.render();
    });
</script>

<script>
    $('.modal-trigger').leanModal();

    function openModal1() {
        //open the modal
        $('#modal1').modal('show');
        //   $('#modal1').openModal({
        //     dismissible: false
        //   });
    };
</script>

<!-- this script with theme start here -->
<!-- <script>
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (https://fullcalendar.io/docs/event-object)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    ini_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendar.Draggable;

    var containerEl = document.getElementById('external-events');
    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');
    // alert(calendarEl);

    // initialize the external events
    // -----------------------------------------------------------------

    new Draggable(containerEl, {
      itemSelector: '.external-event',
      eventData: function(eventEl) {
        return {
          title: eventEl.innerText,
          backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
        };
      }
    });

    var calendar = new Calendar(calendarEl, {
      headerToolbar: {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      themeSystem: 'bootstrap',
      //Random default events
      events: [
        {
          title          : 'All Day Event',
          start          : new Date(y, m, 1),
          backgroundColor: '#f56954', //red
          borderColor    : '#f56954', //red
          allDay         : true
        },
        {
          title          : 'Long Event',
          start          : new Date(y, m, d - 5),
          end            : new Date(y, m, d - 2),
          backgroundColor: '#f39c12', //yellow
          borderColor    : '#f39c12' //yellow
        },
        {
          title          : 'Meeting',
          start          : new Date(y, m, d, 10, 30),
          allDay         : false,
          backgroundColor: '#0073b7', //Blue
          borderColor    : '#0073b7' //Blue
        },
        {
          title          : 'Lunch',
          start          : new Date(y, m, d, 12, 0),
          end            : new Date(y, m, d, 14, 0),
          allDay         : false,
          backgroundColor: '#00c0ef', //Info (aqua)
          borderColor    : '#00c0ef' //Info (aqua)
        },
        {
          title          : 'Birthday Party',
          start          : new Date(y, m, d + 1, 19, 0),
          end            : new Date(y, m, d + 1, 22, 30),
          allDay         : false,
          backgroundColor: '#00a65a', //Success (green)
          borderColor    : '#00a65a' //Success (green)
        },
        {
          title          : 'Click for Google',
          start          : new Date(y, m, 28),
          end            : new Date(y, m, 29),
          url            : 'https://www.google.com/',
          backgroundColor: '#3c8dbc', //Primary (light-blue)
          borderColor    : '#3c8dbc' //Primary (light-blue)
        }
      ],
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function(info) {
        // is the "remove after drop" checkbox checked?
        if (checkbox.checked) {
          // if so, remove the element from the "Draggable Events" list
          info.draggedEl.parentNode.removeChild(info.draggedEl);
        }
      }
    });

    calendar.render();
    // $('#calendar').fullCalendar()

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    // Color chooser button
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      // Save color
      currColor = $(this).css('color')
      // Add color effect to button
      $('#add-new-event').css({
        'background-color': currColor,
        'border-color'    : currColor
      })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      // Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      // Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.text(val)
      $('#external-events').prepend(event)

      // Add draggable funtionality
      ini_events(event)

      // Remove event from text input
      $('#new-event').val('')
    })
  })
</script> -->
<!-- this script with theme end here -->

<!-- <script>
  document.addEventListener('DOMContentLoaded', function() 
  {
    var calendarButton = document.getElementById('calendarButton');
    var calendarEl = document.getElementById('schedule_calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
      },
      defaultView: 'dayGridMonth',
      defaultDate: new Date(),
      navLinks: true, // can click day/week names to navigate views

      weekNumbers: true,
      weekNumbersWithinDays: true,
      weekNumberCalculation: 'ISO',
      eventTimeFormat: {
        hour: 'numeric',
        minute: '2-digit',
        // omitZeroMinute: true,
        meridiem: 'short'
      },
      selectable: true,
      selectMirror: true,
      select: function(arg) {
        console.log(arg);

        var check = convert(arg.start);
        var today = convert(new Date());

        var new_check = arg.start;
        var new_today = new Date();
        new_today.setHours(0, 0, 0, 0);

        if (new_check < new_today) {
          alert("You can't create lesson in previous date.");
        } else {
          $("#lesson_date").val(convert_formate(arg.start));
          openModal1();
        }
        calendar.unselect();
      },
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      eventRender: function(info) {
        info.el.classList.add("tooltipped");
        info.el.setAttribute("data-tooltip", info.event.title);
      },
      events: [
        <?php
        if (!empty($schedule_list)) {
            foreach ($schedule_list as $key => $value) {
                echo "{
                        id: '" . $value->id . "',
                        groupId: '" . $value->id . "_" . date('d M, Y', strtotime($value->lesson_date)) . "_" . date('H:iA', strtotime($value->time_from)) . "_" . date('H:iA', strtotime($value->time_until)) . "_" . $value->invite_type . "_" . $value->school . "_" . $value->grade . "_" . $value->section . "',
                        title: '" . trim(str_replace("'", "", $value->description)) . "',
                        start: '" . $value->lesson_date . "T" . $value->time_from . "',
                        end: '" . $value->lesson_date . "T" . $value->time_until . "'
                      },";
            }
        }
        ?>
      ],
      eventClick: function(arg) {
        var comma_str = arg.event.groupId;
        console.log(comma_str);
        var result = comma_str.split('_');
        var description = arg.event.title;
        $("#lesson_id").val(result[0]);
        $("#lesson_date").val(result[1]);
        var strarray = grade_id = result[6];
        var strar = strarray.split(',');
        $("#schoolFilterID").val(result[5]);
        var from_time = changeTimeFormate(result[2]);
        var until_time = changeTimeFormate(result[3]);
        $("#from").val(from_time);
        $("#until").val(until_time);
        $("#description").val(description);
        $("#lesson_id_group").val(result[0]);
        $("#lesson_date_group").val(result[1]);
        $("#from_group").val(from_time);
        $("#until_group").val(until_time);
        $("#grade_group").val(strar[0]);
        $("#description_group").val(description);
        var section_id = result[7];
        var lesson_id = result[0];

        if (result[4] == 4) {
          getLessonData(lesson_id);

        } else {
          getSectionGrade(section_id, grade_id);
        }


        if (result[5] != '') {
          $("#modal2 select#schoolFilterID option").each(function() {

            if ($(this).val() == result[5]) {
              $(this).attr("selected", "selected");
            }
          });
        }

        if (strar[0] != '') {
          $("#modal2 select#gradeFilterID option").each(function() {

            if ($(this).val() == strar[0]) {
              $(this).attr("selected", "selected");
            }
          });
        }

        if (result[7] != '') {
          $("#modal2 select#sectionFilterID option").each(function() {
            if ($(this).val() == result[7]) {
              $(this).attr("selected", "selected");
            }
          });
        }

        $("#edit_lesson_id").val(result[0]);
        $("#edit_lesson_date").val(result[1]);
        var strarray = grade_id = result[6];
        var strar = strarray.split(',');
        $("#edit_schoolFilterID").val(result[5]);
        var from_time = changeTimeFormate(result[2]);
        var until_time = changeTimeFormate(result[3]);
        $("#edit_from").val(from_time);
        $("#edit_until").val(until_time);
        $("#edit_description").val(description);

        $('#edit_re_school_id').val(result[5]);
        $('#edit_re_grade_id').val(result[6]);
        $('#edit_re_section_id').val(result[7]);

        $('#edit_from_label').addClass('active');
        $('#edit_until_label').addClass('active');
        //alert(result[7]);
        if (result[4] == 4) {
          openModalModal4();
        } else {
          openModal2();
        }


        $("#lesson_date_label").addClass("active");
        $("#from_label").addClass("active");
        $("#until_label").addClass("active");
        $("#description_label").addClass("active");

        if (result[0] != '' || result[0] != null) {
          $("#invite_class_btn").html('Update').css('background-color', 'green');
          $("#session_delete_box").html('<button type="button" lesson_attr="' + result[0] + '" id="delete_session" class="waves-effect waves-light btn" style="background-color:#ee6e73 !important;">Delete</button>');
          $("#session_delete_box_recuring").html('<button type="button" lesson_attr="' + result[0] + '" id="delete_session" class="waves-effect waves-light btn" style="background-color:#ee6e73 !important;">Delete</button>');

        } else {
          $("#invite_class_btn").html('Invite Class');
        }
      }
    });
    calendar.render();
  });

  function ShowCal() {
    // setTimeout(function () {
    document.addEventListener('DOMContentLoaded', function() {
      var calendarButton = document.getElementById('calendarButton');
      var calendarEl = document.getElementById('schedule_calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        },
        defaultView: 'timeGridWeek',
        defaultDate: new Date(),
        navLinks: true, // can click day/week names to navigate views

        weekNumbers: true,
        weekNumbersWithinDays: true,
        weekNumberCalculation: 'ISO',

        selectable: true,
        selectMirror: true,
        select: function(arg) {
          console.log(arg);

          var check = convert(arg.start);
          var today = convert(new Date());

          var new_check = arg.start;
          var new_today = new Date();
          new_today.setHours(0, 0, 0, 0);

          if (new_check < new_today) {
            // Previous Day. 
            alert("You can't create lesson in previous date.");
          } else {
            // Right Date
            $("#lesson_date").val(convert_formate(arg.start));
            openModal1();
          }

          calendar.fullCalendar('unselect');
        },
        editable: true,
        eventLimit: true, // allow "more" link when too many events
        eventRender: function(info) {
          info.el.classList.add("tooltipped");
          info.el.setAttribute("data-tooltip", info.event.title);
        },
        events: [
          <?php
            if (!empty($schedule_list)) {
                foreach ($schedule_list as $key => $value) {
                    echo "{
                                    id: '" . $value->id . "',
                                    groupId: '" . $value->id . "_" . date('d M, Y', strtotime($value->lesson_date)) . "_" . date('H:iA', strtotime($value->time_from)) . "_" . date('H:iA', strtotime($value->time_until)) . "_" . $value->grade . "',
                                    title: '" . trim(str_replace("'", "", $value->description)) . "',
                                    start: '" . $value->lesson_date . "T" . $value->time_from . "',
                                    end: '" . $value->lesson_date . "T" . $value->time_until . "'
                                  },";
                }
            }
            ?>
        ],
        eventClick: function(arg) {
          var comma_str = arg.event.groupId;
          var result = comma_str.split('_');
          var description = arg.event.title;

          $("#lesson_id").val(result[0]);
          $("#lesson_date").val(result[1]);
          $("#from").val(result[2]);
          $("#until").val(result[3]);
          $("#grade").val(result[4]);
          $("#description").val(description);

          openModal2();

          $("#lesson_date_label").addClass("active");
          $("#from_label").addClass("active");
          $("#until_label").addClass("active");
          $("#description_label").addClass("active");

          $('select[name^="grade"] option[value="' + result[4] + '"]').attr("selected", "selected");
          if (result[0] != '' || result[0] != null) {
            $("#invite_class_btn").html('Update').css('background-color', 'green');
            $("#session_delete_box").html('<button type="button" lesson_attr="' + result[0] + '" id="delete_session" class="waves-effect waves-light btn" style="background-color:#ee6e73 !important;">Delete</button>');
          } else {
            $("#invite_class_btn").html('Invite Class');
          }
        }
      });

      calendar.render();
    });
    $("button.fc-dayGridMonth-button").click();
    $("button.fc-timeGridWeek-button").click();
    // }, 200);   
  }

  function changeTimeFormate(time) {
    var timeString = time;
    var hourEnd = timeString.indexOf(":");
    var H = +timeString.substr(0, hourEnd);
    var h = H % 12 || 12;
    var ampm = H < 12 ? "AM" : "PM";
    return timeString = h + timeString.substr(hourEnd, 3) + ampm;
  }
</script> -->

<!-- calendar script end here -->

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

    $("#room_type").change(function() {
        var room_type_id = this.value;
        $("#room_name-dropdown").html('<option value="">Select room</option>');
        $.ajax({
            url: "{{ url('admin/room_name') }}",
            method: 'POST',
            data: {
                room_type_id: room_type_id,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(data) {
                $.each(data.room_name_list, function(key, value) {
                    $("#room_name-dropdown").append('<option value="' + value.room_name + '">' + value.room_name + '</option>');
                });
            }
        });
    });
</script>

<script>
    $(function() {
        // Summernote
        $('#summernote').summernote()
        $('#summernote1').summernote()
    })
</script>
<script>
    // $(document).ready(function() {
    //     // Select2 Multiple
    //     $('.select2bs4').select2({
    //         theme: 'bootstrap4'
    //     })
    // });
    $("select").on("select2:select", function(evt) {
        var element = evt.params.data.element;
        var $element = $(element);

        $element.detach();
        $(this).append($element);
        $(this).trigger("change");
    });
</script>
<script>
    $("#allow_guest_in_room1").click(function() {
        $("#allow_guest_price_div").removeClass('d-none');
        $("#allow_guest_cap_div").removeClass('d-none');
        $("#pay_by_no_guest_div").removeClass('d-none');
    });

    $("#allow_guest_in_room2").click(function() {
        $("#allow_guest_price_div").addClass('d-none');
        $("#allow_guest_cap_div").addClass('d-none');
        $("#pay_by_no_guest_div").addClass('d-none');
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        var maxField = 10;
        var addButton = $('.add_button');
        var wrapper = $('.field_wrapper');
        var x = 0;

        $(addButton).click(function() {
            if (x < maxField) {
                x++;
                $(wrapper).append('<div class="form-group"><div class="row"><div class="col-md-3"><input type="text" class="form-control" name="extra[' + x + '][name]" placeholder="Enter Name" value="" /></div><div class="col-md-3"><input type="text" class="form-control" name="extra[' + x + '][price]" placeholder="Enter Price" value="" /></div><div class="col-md-3"><div class="form-group"><select class="form-control select2bs4" name="extra[' + x + '][type]" style="width: 100%;"><option value="">Select Price type</option><option value="single_fee">Single fee</option><option value="per_night">Per night</option><option value="per_guest">Per guest</option><option value="per_night_per_guest">Per night per guest</option></select></div></div><span><a href="javascript:void(0);" class="remove_button">Remove</a></span></div></div>');
            }
        });

        $(wrapper).on('click', '.remove_button', function(e) {
            e.preventDefault();
            $(this).parent().parent('div').remove();
            x--;
        });
    });
</script>
<script>
    $("#submit_btn").click(function() {
        // alert('shdfsd');
        var form = $("#roomAdmin_form");
        form.validate({
            rules: {
                hotel_name: {
                    required: true,
                },
                room_type: {
                    required: true,
                },
                room_name: {
                    required: true,
                },
                max_adults: {
                    required: true,
                },
                max_childern: {
                    required: true,
                },
                number_of_rooms: {
                    required: true,
                },
                price_per_night: {
                    required: true,
                },
                type_of_price: {
                    required: true,
                },
                tax_percentage: {
                    required: true,
                },
                price_per_night_7d: {
                    required: true,
                },
                price_per_night_30d: {
                    required: true,
                },
                room_size: {
                    required: true,
                },
                bed_type: {
                    required: true,
                },
                private_bathroom: {
                    required: true,
                },
                private_entrance: {
                    required: true,
                },
                family_friendly: {
                    required: true,
                },
                outdoor_facilities: {
                    required: true,
                },
                extra_people: {
                    required: true,
                },
            },
        });
        if (form.valid() === true) {
            var site_url = $("#baseUrl").val();
            // alert(site_url);
            var formData = $(form).serialize();
            $('#submit_btn').prop('disabled', true);
            $('#submit_btn').html(
                `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...`
            );
            // alert(formData);
            $(form).ajaxSubmit({
                type: 'POST',
                url: site_url + '/admin/submitroom',
                data: formData,
                success: function(response) {
                    console.log(response);
                    if (response.status == 'success') {
                        success_noti(response.msg);
                        if (response.hotel_id == 0) {
                            setTimeout(function() {
                                window.location.href = site_url + "/admin/roomlist"
                            }, 1000);
                        } else {
                            setTimeout(function() {
                                window.location.href = site_url + "/admin/viewHotelRooms/" + response.hotel_id
                            }, 1000);
                            // console.log(response.hotel_id);
                        }
                    } else {
                        error_noti(response.msg);
                        $('#submit_btn').html(
                            `<span class=""></span>Submit`
                        );
                        $('#submit_btn').prop('disabled', false);
                    }
                }
            });
            // event.preventDefault();
        }
    });
</script>

<script>
    $("#custom_price_btn").click(function() {
        // alert('shdfsd');
        var form = $("#customPrice_form");
        form.validate({
            rules: {
                start_date: {
                    required: true,
                },
                end_date: {
                    required: true,
                },
                new_price: {
                    required: true,
                    number: true,
                },
                // extra_price: {
                //     required: true,
                // },
                price_per_night_7d: {
                    number: true,
                },
                price_per_night_30d: {
                    number: true,
                },
                price_per_weekend: {
                    number: true,
                },
                min_day_of_booking: {
                    number: true,
                },
            },
        });
        if (form.valid() === true) {
            var site_url = $("#baseUrl").val();
            // alert(site_url);
            var formData = $(form).serialize();
            // $('#submit_btn').prop('disabled', true);
            // $('#submit_btn').html(
            //     `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...`
            // );
            // alert(formData);
            $(form).ajaxSubmit({
                type: 'POST',
                url: site_url + '/admin/roomCustomPriceUpdate',
                data: formData,
                success: function(response) {
                    console.log(response);
                    if (response.status == 'success') {
                        success_noti(response.msg);
                        setTimeout(function() {window.location.reload();}, 1000);
                        // if (response.hotel_id == 0) {
                        //     setTimeout(function() {
                        //         window.location.href = site_url + "/admin/roomlist"
                        //     }, 1000);
                        // } else {
                        //     setTimeout(function() {
                        //         window.location.href = site_url + "/admin/viewHotelRooms/" + response.hotel_id
                        //     }, 1000);
                        //     // console.log(response.hotel_id);
                        // }
                    } else {
                        error_noti(response.msg);
                        // $('#submit_btn').html(
                        //     `<span class=""></span>Submit`
                        // );
                        // $('#submit_btn').prop('disabled', false);
                    }
                }
            });
            // event.preventDefault();
        }
    });
</script>
@endsection
@section('content')


<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div id="LoginForm">
                <div class="container">
                    <div class="login-form">
                        <div class="main-div">
                            <div class="panel">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h2 class="user-lo">Custom Price</h2>
                                <p>Set custom price for selected period:</p>
                            </div>
                            <form id="customPrice_form" method="POST">
                                @csrf
                                <input type="hidden" name="room_id" id="room_id" value="">
                                <input type="hidden" name="hotel_id" id="hotel_id" value="">

                                <div class="form-group">
                                    <input type="text" class="form-control" name="start_date" id="start_date" placeholder="Start Date">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="end_date" id="end_date" placeholder="End Date">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="new_price" id="new_price" placeholder="New Price in PKR">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="extra_price" id="extra_price" placeholder="Extra Price per guest per night in PKR">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="price_per_night_7d" id="price_per_night_7d" placeholder="Price per night (7d+)">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="price_per_night_30d" id="price_per_night_30d" placeholder="Price per night (30d+)">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="price_per_weekend" id="price_per_weekend" placeholder="Price per weekend in PKR">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="min_day_of_booking" id="min_day_of_booking" placeholder="Minimum days of booking">
                                </div>
                                <button type="submit" id="custom_price_btn" class="btn btn-primary btn-dark button">Set Price for Period</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Structure -->
<!-- <div id="modal1" class="modal">
    <div class="modal-content">
        <div class="close_com">
            <a class="close_clear modal-close"><i class="material-icons dp48">clear</i></a>
        </div>
        <h4> Date Modal</h4>
        <div id="modal_content" class="row" style="text-align: center;">
            <div class="invite" style="width: 48%; float: left;">
                <img class="img_invImg" src="<?php if (!empty($manage_icon) && $manage_icon[0]) { ?> {{url('/public/uploads/icon/'.$manage_icon[0])}}<?php } ?>">
                <br>
                <button class="waves-effect waves-light btn" onclick="openModal2();blankModal();"> Button 1</button>
            </div>
            <div class="recurring" style="width: 48%; float: left;">
                <img class="img_invImg" src="<?php if (!empty($manage_icon) && $manage_icon[1]) { ?> {{url('/public/uploads/icon/'.$manage_icon[1])}}<?php } ?>">
                <br>
                <button class="waves-effect waves-light btn" onclick="openModal4();blankModal();">Button 2</button>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"> Cancel 1</a>
        </div>
    </div>
</div> -->

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    @if(!empty($hotel_id))
                    <a href="{{url('/admin/viewHotelRooms')}}/{{$hotel_id}}"><i class="right fas fa-angle-left"></i>Back</a>
                    @else
                    <a href="{{url('/admin/roomlist')}}"><i class="right fas fa-angle-left"></i>Back</a>
                    @endif
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
                        @if(!empty($hotel_id))
                        <input type="hidden" name="hotel_id" id="hotel_id" value="{{$hotel_id}}">
                        @endif
                        <div class="col-md-12">
                            <div class="tab-custom-content">
                                <p class="lead mb-0">
                                <h4>Price Adjustments Calendar</h4>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-primary">
                                        <div class="card-body p-0">
                                            <div id="calendar1"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-0">
                                <div class="tab-custom-content mt-0">
                                    <p class="lead mb-0">
                                    <h4>Description</h4>
                                    </p>
                                </div>
                            </div>
                            @if(empty($hotel_id))
                            <div class="col-md-6">

                                <div class="form-group">

                                    <label>Hotel name</label>

                                    <select class="form-control select2bs4" name="hotel_name" id="hotel_name" style="width: 100%;" required>

                                        <option value="">Select Hotel</option>

                                        @foreach ($hotels as $cont)

                                        <option value="{{ $cont->hotel_id }}">{{ $cont->hotel_name }}</option>

                                        @endforeach

                                    </select>

                                </div>

                            </div>
                            @endif

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

                                    <select class="form-control select2bs4" name="room_name" id="room_name-dropdown" style="width: 100%;">
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
                                    <label>Room description</label>
                                    <!-- <input type="text" class="form-control" name="description" id="description" placeholder="Enter room description"> -->
                                    <textarea class="form-control" id="summernoteRemoved" name="description" required></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Notes</label>
                                    <!-- <input type="text" class="form-control" name="notes" id="notes" placeholder="Enter notes"> -->
                                    <textarea class="form-control" id="summernote1Removed" name="notes" required></textarea>
                                </div>
                            </div>


                            <div class="col-md-12 mt-0">
                                <div class="tab-custom-content mt-0">
                                    <p class="lead mb-0">
                                    <h4>Listing Price</h4>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Price per night</label>
                                            <input type="text" class="form-control" name="price_per_night" id="price_per_night" placeholder="Enter price per night">
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
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Taxes in % (included in the price)</label>
                                    <input type="text" class="form-control" name="tax_percentage" id="tax_percentage" placeholder="Enter Taxes in %">
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
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Cleaning Fee in PKR</label>
                                            <input type="text" class="form-control" name="cleaning_fee" id="cleaning_fee" placeholder="Enter cleaning fee.">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Cleaning Fee type</label>
                                            <select class="form-control select2bs4" name="cleaning_fee_type" id="cleaning_fee_type" style="width: 100%;">
                                                <option value="">Select Cleaning Fee type</option>
                                                <option value="single_fee">Single fee</option>
                                                <option value="per_night">Per night</option>
                                                <option value="per_guest">Per guest</option>
                                                <option value="per_night_per_guest">Per night per guest</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>City fee</label>
                                            <input type="text" class="form-control" name="city_fee" id="city_fee" placeholder="Enter city_fee.">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>City Fee type</label>
                                            <select class="form-control select2bs4" name="city_fee_type" id="city_fee_type" style="width: 100%;">
                                                <option value="">Select City Fee type</option>
                                                <option value="single_fee">Single fee</option>
                                                <option value="per_night">Per night</option>
                                                <option value="per_guest">Per guest</option>
                                                <option value="per_night_per_guest">Per night per guest</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Earlybird Discount - in % from the price per night</label>
                                            <input type="text" class="form-control" name="earlybird_discount" id="earlybird_discount" placeholder="Enter discount in %.">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Minimum number of days in advance</label>
                                            <input type="text" class="form-control" name="min_days_in_advance" id="min_days_inadvance" placeholder="Enter Minimum No of days.">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Allow Guest in Room ?</label>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <div class="icheck-success d-inline">
                                                        <input type="radio" id="allow_guest_in_room1" name="is_guest_allow" value="1">
                                                        <label for="allow_guest_in_room1">Yes</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <div class="icheck-danger d-inline">
                                                        <input type="radio" id="allow_guest_in_room2" name="is_guest_allow" value="0" checked>
                                                        <label for="allow_guest_in_room2">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 d-none" id="allow_guest_price_div">
                                        <div class="form-group">
                                            <label>Extra guest per night</label>
                                            <input type="text" class="form-control" name="extra_guest_per_night" id="extra_guest_per_night" placeholder="Enter extra guest per night.">
                                        </div>
                                    </div>
                                    <div class="col-md-4 d-none" id="allow_guest_cap_div">
                                        <div class="form-group">
                                            <label>Please Check if Allow Above Capacity yes </label>
                                            <div class="icheck-success d-inline">
                                                <input type="checkbox" name="is_above_guest_cap" id="checkboxSuccess1" value="1">
                                                <label for="checkboxSuccess1">Allow guests above capacity?</label>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="col-md-12 d-none" id="pay_by_no_guest_div">
                                <div class="form-group">
                                    <!-- <label>Pay by the number of guests (room prices will NOT be used anymore and billing will be done by guest number only) </label> -->
                                    <div class="icheck-success d-inline">
                                        <input type="checkbox" name="is_pay_by_num_guest" id="checkboxSuccess2" value="1">
                                        <label for="checkboxSuccess2">Pay by the number of guests (room prices will NOT be used anymore and billing will be done by guest number only)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-0">
                                <div class="tab-custom-content mt-0">
                                    <p class="lead mb-0">
                                    <h4>Extra Option</h4>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-12 field_wrapper">
                                <div class="form-group" id="extra">
                                    <label>Extra</label>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="extra[0][name]" placeholder="Enter Name" value="" />
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="extra[0][price]" placeholder="Enter Price" value="" />
                                        </div>
                                        <!-- <div class="col-md-3">
                                            <input type="text" class="form-control" name="extra[0][type]" placeholder="Enter type" value="" />
                                        </div> -->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select class="form-control select2bs4" name="extra[0][type]" style="width: 100%;">
                                                    <option value="">Select Price type</option>
                                                    <option value="single_fee">Single fee</option>
                                                    <option value="per_night">Per night</option>
                                                    <option value="per_guest">Per guest</option>
                                                    <option value="per_night_per_guest">Per night per guest</option>
                                                </select>
                                            </div>
                                        </div>
                                        <span><a href="javascript:void(0);" class="add_button" title="Add field">Add</a></span>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12 mt-0">
                                <div class="tab-custom-content mt-0">
                                    <p class="lead mb-0">
                                    <h4>Listing Details</h4>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Size in ft2</label>
                                    <input type="text" class="form-control" name="room_size" id="room_size" placeholder="Enter Size in ft2.">
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
                                        <option value="Sofa">Sofa</option>
                                        <option value="Futon Mat">Futon Mat</option>
                                        <option value="Extra-Large double bed (Super - King size)">Extra-Large double bed (Super - King size)</option>
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

                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="field" align="left">
                                        <label>Upload room featured images</label>
                                        <input type="file" id="roomFeaturedImg" name="roomFeaturedImg" required />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="field" align="left">
                                        <label>Upload room gallery</label>
                                        <input type="file" id="files" name="imgupload[]" multiple required />
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
                                    <select class="form-control select2bs4" multiple="multiple" name="other_features_id[]" id="other_features_id" data-placeholder="Select Other Features" style="width: 100%;">
                                        <!-- <option value="">Services & Extras</option> -->
                                        @php $other_features = DB::table('room_others_features')->orderby('id', 'ASC')->where('status',1)->get(); @endphp
                                        @foreach ($other_features as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- full calendar start here -->

                            <div class="col-12">

                                <!-- <button class="btn btn-primary btn-dark float-right" name="submit" type="submit">Submit</button> -->
                                <button class="btn btn-primary btn-dark button float-right" name="submit" id="submit_btn" type="button"><span class=""></span>Submit</button>

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