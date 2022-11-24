<!DOC<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>Email</title>
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
   </head>
   <body style="font-family: 'open Sans';font-size: 14px; line-height:20px;">
      <div style="padding: 0 10px;max-width: 700px;margin: 0 auto;">
         <div style="max-width:700px;width:100%;padding:10px;margin:0 auto 30px;border:1px solid #126c62;background: #126c62;">
            <div style="background: #fff;padding: 15px;">
               <div style="padding:30px;border:1px solid #fff;background:#eafdfc;">
                  <div style="text-align:center">
                     <h2 style="color: #fff; margin-bottom: 0;"><a href="https://roadnstays.com/" class="logo mr-auto"><img src="{{url('resources/assets/img/road-logo.png')}}" alt="" class="img-fluid" style="width: 80px;"></a></h2>
                  </div>
                  <div style="border-bottom:2px solid #9acfc9;margin:15px auto 15px;padding:10px;display:block;overflow:hidden;max-width: 400px; text-align: center; color: #126c62;">
                     <h4 style="margin:0 0;">Hello {{$order_info->first_name}} {{$order_info->last_name}}</h4>
                  </div>
                  <div style=" display:block; overflow:hidden">
                     <p style=" margin:0 0 8px 0; color: #126c62; text-align: center;">Thank you for your Booking</p>
                     <p style="text-align: center;"><a style="color: #e81e2a;font-size: 14px;font-weight: 600; color: #126c62; text-align: center; text-decoration:none;" href="#">Get More Details</a></p>
                  </div>
                  <div style="text-align: center;">
                     <a href="#" style="text-decoration:none; color:#126c62; padding-bottom:2px; display:inline-block; text-align: center;">Visit site : - roadNstays.com</a>
                  </div>
               </div>
               <div style="width: 100%; display: block; text-align: center;  padding-bottom: 15px; padding-top: 15px;">
                  <span  style="width: 20%; display: inline-block; vertical-align: top; padding-bottom: 5px;"><strong>Booking Date:</strong></span>
                  <span  style="width: 24%; display: inline-block; vertical-align: top; padding-bottom: 5px;">{{$order_info->created_at}}</span>
               </div>
               <div style="width: 100%; display: block;">
                  <span style="width: 23%; display: inline-block; vertical-align: top; padding-bottom: 5px;"><strong>Booking ID:</strong></span> 
                  <span  style="width: 24%; display: inline-block; vertical-align: top; padding-bottom: 5px;">#{{$order_info->id}}</span>
                  <span  style="width: 23%; display: inline-block; vertical-align: top; padding-bottom: 5px;"><strong>Payment Type:</strong></span>
                  <span  style="width: 24%; display: inline-block; vertical-align: top; padding-bottom: 5px;">Online payment</span>
               </div>
               <div style="width: 100%; display: block;">
                  <span style="width: 23%; display: inline-block; vertical-align: top; padding-bottom: 5px;"><strong>User-Name:</strong></span> 
                  <span  style="width: 24%; display: inline-block; vertical-align: top; padding-bottom: 5px;">{{$order_info->first_name}} {{$order_info->last_name}}</span>
                  <span  style="width: 23%; display: inline-block; vertical-align: top; padding-bottom: 5px;"><strong>Address:</strong></span>
                  <span  style="width: 24%; display: inline-block; vertical-align: top; padding-bottom: 5px;">{{$order_info->address}} {{$order_info->user_city}}{{$order_info->postal_code}}</span>
               </div>
               <div style="width: 100%; display: block;">
                  <span style="width: 23%; display: inline-block; vertical-align: top; padding-bottom: 5px;"><strong>Phone Number:</strong></span> 
                  <span  style="width: 24%; display: inline-block; vertical-align: top; padding-bottom: 5px;">{{$order_info->contact_number}}</span>
                  <span  style="width: 23%; display: inline-block; vertical-align: top; padding-bottom: 5px;"><strong>Email Address:</strong></span>
                  <span  style="width: 24%; display: inline-block; vertical-align: top; padding-bottom: 5px;">{{$order_info->email}}</span>
               </div>
               <div>
                  <h2><a href="#" style="text-decoration: none; color: #126c62;">Booking #{{$order_info->id}}</a></h2>
                  <h4>Booking Details:-</h4>
                  <table style="border-collapse: collapse; border:1px solid #ccc; width: 100%;">
                     <tr style="border:1px solid #ccc;">
                        <td style="border:1px solid #ccc; padding: 10px;"><strong>Room Type:</strong></td>
                        <td style="border:1px solid #ccc; padding: 10px;"><strong> Price:</strong></td>
                        <td style="border:1px solid #ccc; padding: 10px;"><strong>Room Qty:</strong></td>
                        <td style="border:1px solid #ccc; padding: 10px;"><strong>Guest Qty:</strong></td>
                        <td style="border:1px solid #ccc; padding: 10px;"><strong>Total Price:</strong></td>
                     </tr>
                     <tr style="border:1px solid #ccc; ">
                        <td style="border:1px solid #ccc; padding: 10px;">{{$order_info->name}}</td>
                        <td style="border:1px solid #ccc; padding: 10px;">{{$order_info->price_per_night}}</td>
                        <td style="border:1px solid #ccc; padding: 10px;">{{$order_info->total_room}}</td>
                        <td style="border:1px solid #ccc; padding: 10px;">{{$order_info->total_member}}</td>
                        <td style="border:1px solid #ccc; padding: 10px;">{{$order_info->total_amount}}</td>
                     </tr>
                  </table>
               </div>
               <p style="text-align: center;  padding-top: 15px;"><a style="color: #126c62;font-size: 14px;font-weight: 600;padding:8px 15px;border:2px solid #126c62;display:inline-block; text-decoration: none;" href="#">View Booking</a></p>
            </div>
         </div>
      </div>
   </body>
</html>