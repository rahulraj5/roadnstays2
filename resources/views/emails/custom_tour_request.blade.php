<html>
   <head>
      <meta charset="utf-8">
      <title>::Roadnstays::</title>
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
      <style type="text/css">
         .table-fr span {
         margin-bottom: 1px;
         font-size: 13px;
         margin-top: 1px;
         margin-right: 5px;
         color: #0e0e0e;
         }
         .grid-bar {
         border-bottom: 1px solid #d9f1ee;
         padding: 7px;
         display: flex;
         align-items: center;
         vertical-align: middle;
         justify-content: start;
         background: #e5fffc;
         }
         .grid-bar span strong{
         font-weight: 600;
         padding-left: 4px;
         }
      </style>
   </head>
   <body style="font-family: 'open Sans';font-size: 14px; line-height:20px;">
      <div style="padding: 0 10px;max-width: 700px;margin: 0 auto;">
         <div style="max-width:700px;width:100%;padding:1px;margin:0 auto 30px;border:1px solid #126c62;background: #126c62">
            <div style="background: #ffffff;padding: 15px;">
               <div style="text-align:center">
                  <h2 style="color: #126c62; margin: 0px;"><a href="{{url('/')}}" class="logo mr-auto"><img src="{{url('/')}}/resources/assets/img/road-logo.png" alt="" style="width: 70px;"></a></h2>
               </div>
               <div style="margin:0px auto 0px;padding:10px;display:block;overflow:hidden;max-width: 400px; text-align: center; color: #126c62;">
                  <h4 style="margin:0 0;">Hello {{$trip_data['your_name']}}</h4>
               </div>
               <div style="width: 100%; display: block;" class="table-fr">
                  <h2 style="text-align: center; width: 100%; padding: 0; margin: 0px;"><a href="#" style="text-decoration: none; color: #126c62; padding: 10px 6px 1px 5px; ">Enquiry Custom Trips</a></h2>
                  <h4 style="margin: 0; color: #008778; padding: 9px 1px;">Enquiry Details:-</h4>
                  <div class="grid-bar">
                     <span style="width: 28%; display: inline-block; vertical-align: top; "><strong>Contact details:</strong></span> 
                     <span style="width: 20%; display: inline-block; vertical-align: top; ">{{$trip_data['phone_number']}}</span>
                     <span style="width: 28%; display: inline-block; vertical-align: top; "><strong>Your Full Name:</strong></span>
                     <span style="width: 20%; display: inline-block; vertical-align: top; ">{{$trip_data['your_name']}}</span>
                  </div>
                  <div class="grid-bar">
                     <span style="width: 28%; display: inline-block; vertical-align: top; ">
                     <strong>Number of Travellers:</strong></span> 
                     <span style="width: 20%; display: inline-block; vertical-align: top; ">{{$trip_data['adult']}}</span>
                     <span style="width: 28%; display: inline-block; vertical-align: top; "><strong>Adults:</strong></span>
                     <span style="width: 20%; display: inline-block; vertical-align: top; ">{{$trip_data['adult']}}</span>
                  </div>
                  <div class="grid-bar">
                     <span style="width: 28%; display: inline-block; vertical-align: top; "><strong>Childern:</strong></span> 
                     <span style="width: 20%; display: inline-block; vertical-align: top; ">{{$trip_data['child']}}</span>
                     <span style="width: 28%; display: inline-block; vertical-align: top; "><strong>Rooms:</strong></span>
                     <span style="width: 20%; display: inline-block; vertical-align: top; ">{{$trip_data['rooms']}}</span>
                  </div>
                  <div class="grid-bar">
                     <span style="width: 28%; display: inline-block; vertical-align: top; "><strong>Mattress :</strong></span>
                     <span style="width: 20%; display: inline-block; vertical-align: top; ">{{$trip_data['mattress_quantity']}}</span>
                     <span style="width: 28%; display: inline-block; vertical-align: top; "><strong>Transport:</strong></span>
                     <span style="width: 20%; display: inline-block; vertical-align: top; ">{{$trip_data['transport']}}</span>
                  </div>
                  <div class="grid-bar">
                     <span style="width: 28%; display: inline-block; vertical-align: top; "><strong>Like to go?:</strong></span>
                     <span style="width: 20%; display: inline-block; vertical-align: top; ">{{$trip_data['date']}}</span>
                     <span style="width: 28%; display: inline-block; vertical-align: top; "><strong>Departure:</strong></span>
                     <span style="width: 20%; display: inline-block; vertical-align: top; ">{{$trip_data['departure_city']}}</span>
                  </div>
                  <div class="grid-bar">
                     <span style="width: 28%; display: inline-block; vertical-align: top; "><strong>date:</strong></span>
                     <span style="width: 20%; display: inline-block; vertical-align: top; ">{{$trip_data['date']}}</span>
                     <span style="width: 28%; display: inline-block; vertical-align: top; "><strong>flexible date:</strong></span>
                     <span style="width: 20%; display: inline-block; vertical-align: top; ">{{$trip_data['flexible_date']}}</span>
                  </div>
                  <div class="grid-bar">
                     <span style="width: 28%; display: inline-block; vertical-align: top; "><strong>Duration:</strong></span>
                     <span style="width: 20%; display: inline-block; vertical-align: top; ">{{$trip_data['tour_duration']}}</span>
                     <span style="width: 28%; display: inline-block; vertical-align: top; "><strong>No. of days:</strong></span>
                     <span style="width: 20%; display: inline-block; vertical-align: top; ">{{$trip_data['tour_duration']}}</span>
                  </div>
                  <div class="grid-bar">
                     <span style="width: 28%; display: inline-block; vertical-align: top; "><strong>flexible duration:</strong></span>
                     <span style="width: 20%; display: inline-block; vertical-align: top; ">{{$trip_data['flexible_date']}}</span>
                     <span style="width: 28%; display: inline-block; vertical-align: top; "><strong>Add. Requirmeent
                     :</strong></span>
                     <span style="width: 20%; display: inline-block; vertical-align: top; ">xyz</span>
                  </div>
                  <div class="grid-bar">
                     <span style="width: 28%; display: inline-block; vertical-align: top; "><strong>Trip Type:</strong></span>
                     <span style="width: 20%; display: inline-block; vertical-align: top; ">{{$trip_data['trip_type']}}</span>
                     <span style="width: 28%; display: inline-block; vertical-align: top; "><strong>Location:</strong></span>
                     <span style="width: 20%; display: inline-block; vertical-align: top; ">{{$trip_data['location']}}</span>
                  </div>
                  <div class="grid-bar">
                     <span style="width: 28%; display: inline-block; vertical-align: top; "><strong>Further details/ Preferences:</strong></span>
                     <span style="width: 20%; display: inline-block; vertical-align: top; ">{{$trip_data['details']}}</span>
                  </div>
                  <div style="background-color: #000; padding:10px;">
                     <div style="text-align: center;">
                        <a href="{{url('/')}}" style="text-decoration:none; color:#09b7a3; padding-bottom:2px; display:inline-block; text-align: center;font-size: 13px;">Visit site : - www.roadnstays.com</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>