<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

use GuzzleHttp\Client as GuzzleClient;
use Twilio\Rest\Client;
class Helper

{
    public static function getFromEmail()
    {
        if ($_SERVER['SERVER_NAME'] == 'roadnstays.com') {
            return 'info@roadnstays.com';
        }
        else {
            return 'votivephp.rahulraj@gmail.com';
        }
    }

    public static function generateRandomString($length = 10)
    {

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $charactersLength = strlen($characters);

        $randomString = '';

        for ($i = 0; $i < $length; $i++) {

            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    public static function generateRandomBookingId($length = 10)
    {

        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $charactersLength = strlen($characters);

        $randomString = 'RnS-B-'.'';

        for ($i = 0; $i < $length; $i++) {
            
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    public static function generateRandomInvoiceId($length = 5)
    {

        $characters = '0123456789';

        $charactersLength = strlen($characters);

        $randomString = 'INV'.'';

        for ($i = 0; $i < $length; $i++) {
            
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    public static function my_simple_crypt($string, $action = 'e')
    {

        // you may change these values to your own

        $secret_key = 'my_simple_secret_key';

        $secret_iv = 'my_simple_secret_iv';



        $output = false;

        $encrypt_method = "AES-256-CBC";

        $key = hash('sha256', $secret_key);

        $iv = substr(hash('sha256', $secret_iv), 0, 16);



        if ($action == 'e') {

            $output = base64_encode(openssl_encrypt($string, $encrypt_method, $key, 0, $iv));
        } else if ($action == 'd') {

            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }



        return $output;
    }

    public static function smsapi($otp,$mobile)
    {

      /* End of file common_helper.php */
      // Your Account SID and Auth Token from twilio.com/console
      $sid = 'ACf3b3fc329f0580b55940ee53236b9178';
      $token = 'f5bcaec5d584856a6a994183ed0e5fe6';
      $client = new Client($sid, $token);

      // Use the client to do fun stuff like send text messages!
      $client->messages->create(
          // the number you'd like to send the message to
          "+966".$mobile,
          array(
              // A Twilio phone number you purchased at twilio.com/console
              'from' => '+18126128552',
              // the body of the text message you'd like to send
              'body' => $otp. "Please verify this otp in RoadNstays"
          )
      );
    }

}
