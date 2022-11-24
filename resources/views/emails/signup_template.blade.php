<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <title>Email</title>
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
   <style>
      .button {
         /* padding: 55px 0 0; */
         padding: 5px !important;
      }

      .parag {
         margin: 0 0 8px 0;
         color: #126c62;
         text-align: center;
      }
   </style>
</head>
<body style="font-family: 'open Sans';font-size: 14px; line-height:20px;">
   <div style="padding: 0 10px;max-width: 700px;margin: 0 auto;">
      <div style="max-width:700px;width:100%;padding:10px;margin:0 auto 30px;border:1px solid #126c62;background: #126c62;">
         <div style="background: #fff;padding: 15px;">
            <div style="padding:30px;border:1px solid #fff;background:#eafdfc;">
               <div style="text-align:center">
                  <h2 style="color: #fff; margin-bottom: 0;"><a href="{{ url('/') }}" class="logo mr-auto"><img src="{{url('resources/assets/img/road-logo.png')}}" alt="" class="img-fluid" style="width: 80px;"></a></h2>
               </div>
               <div style="border-bottom:2px solid #9acfc9;margin:15px auto 15px;padding:10px;display:block;overflow:hidden;max-width: 400px; text-align: center; color: #126c62;">
                  <h4 style="margin:0 0;">Hello {{$first_name}} {{$last_name}}</h4>
               </div>
               <div style=" display:block; overflow:hidden">
                  <p class="parag">Thank you for Signup</p>
                  @if(!empty($email))
                  <p class="parag">E-mail - {{$email}}</p>
                  <p class="parag">Password - {{$password}}</p>
                  @endif
                  <p class="parag">Almost done!</p>
                  <p class="parag">Click on the button below to verify your account.</p>
                  
                  <div class="button parag">
                     <a href="{{ url('/api/changeStatus') }}?user_id={{ $user_id }}&full_url={{ $full_url }}" target="_blank" style="background-color:#ff6f6f;border-radius:5px;color:#ffffff;display:inline-block;font-family:Cabin, Helvetica, Arial, sans-serif;font-size:14px;font-weight:regular;line-height:45px;text-align:center;text-decoration:none;width:155px;-webkit-text-size-adjust:none;mso-hide:all;">
                        Click Here
                     </a>
                  </div>
                  <p style="text-align: center;"><a style="color: #e81e2a;font-size: 14px;font-weight: 600; color: #126c62; text-align: center; text-decoration:none;" href="{{ url('/') }}">Get More Details</a></p>
               </div>
               <div style="text-align: center;">
                  <a href="{{ url('/') }}" style="text-decoration:none; color:#126c62; padding-bottom:2px; display:inline-block; text-align: center;">Visit site : - roadNstays.com</a>
               </div>
            </div>
            <!-- <p style="text-align: center;  padding-top: 15px;"><a style="color: #126c62;font-size: 14px;font-weight: 600;padding:8px 15px;border:2px solid #126c62;display:inline-block; text-decoration: none;" href="#">View Booking</a></p> -->
         </div>
      </div>
   </div>
</body>
</html>