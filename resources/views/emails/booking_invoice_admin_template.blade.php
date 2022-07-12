<!doctype html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Email</title>
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
   </head>
   <body style="font-family: 'open Sans';font-size: 14px; line-height:20px;">
      <div style="padding: 0 10px;max-width: 700px;margin: 0 auto;">
         <div style="max-width:700px;width:100%;padding:10px;margin:0 auto 30px;border:1px solid #126c62;background: #126c62">
            <div style="background: #fff;padding: 12px;">
               <h2 style="text-align: center;">New Customer Booking</h2>
               <div>
                  <h2 style="text-align: center;"><a href="#" style="text-decoration: none; color: #008000;">Booking #{{$order_info->id}}</a> <span style="font-size: 16px; vertical-align: bottom;">({{$order_info->created_at}})</span></h2>
                  <h4>Hotel Details:-</h4>
                  <table style="border-collapse: collapse; border:1px solid #ccc; width: 100%;">
                     <tr style="border:1px solid #ccc; ">
                        <td style="border:1px solid #ccc; padding: 10px;"><strong>Room Name:</strong></td>
                        <td style="border:1px solid #ccc; padding: 10px;"><strong>Price:</strong></td>
                        <td style="border:1px solid #ccc; padding: 10px;"><strong>Room Qty:</strong></td>
                        <td style="border:1px solid #ccc; padding: 10px;"><strong>Total Price:</strong></td>
                     </tr>
                     <tr style="border:1px solid #ccc;">
                        <td style="border:1px solid #ccc; padding: 10px;">{{$order_info->name}}</td>
                        <td style="border:1px solid #ccc; padding: 10px;">{{$order_info->price_per_night}}</td>
                        <td style="border:1px solid #ccc; padding: 10px;">{{$order_info->total_room}}</td>
                        <td style="border:1px solid #ccc; padding: 10px;">{{$order_info->total_amount}}</td>
                     </tr>
                  </table>
               </div>
               <div>
                  <p style="margin-bottom: 5px;"><strong>Customer details:</strong></p>
                  <p style="margin-bottom: 5px; margin-top: 5px;"><strong>Name: </strong>{{$user_info->first_name}} {{$user_info->last_name}}</p>
                  <p style="margin-bottom: 5px; margin-top: 5px;"><strong>Email:</strong> <a href="mailto:{{$user_info->email}}" style="text-decoration: none;">{{$user_info->email}}</a></p>
                  <p style="margin-top: 5px;"><strong>Phone:</strong> <a href="tel:{{$user_info->contact_number}}" style="text-decoration: none;"> {{$user_info->contact_number}}</a></p>
               </div>
               <div style='width: 100%; display: block;'>
                  <div style='width: 50%; display: inline-block;'>
                     <p style="margin-bottom: 5px;"><strong>Billing Address:</strong></p>
                     <p style="margin-bottom: 5px; margin-top: 5px;">{{$user_info->address}}</p>
                     <p style="margin-top: 5px; margin-bottom: 5px;">{{$user_info->user_city}}</p>
                     <p style="margin-top: 5px; margin-bottom: 5px;">{{$user_info->postal_code}}</p>
                  </div>
                  <div style='width: 49%; display: inline-block;'>
                     <p style="margin-bottom: 5px;"><strong>Booking Address:</strong></p>
                     <p style="margin-bottom: 5px; margin-top: 5px;">{{$user_info->address}}</p>
                     <p style="margin-top: 5px; margin-bottom: 5px;">{{$user_info->user_city}}</p>
                     <p style="margin-top: 5px; margin-bottom: 5px;">{{$user_info->postal_code}}</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>