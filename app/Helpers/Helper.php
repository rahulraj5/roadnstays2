<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

use GuzzleHttp\Client as GuzzleClient;

class Helper

{
    public static function getFromEmail()
    {
        if ($_SERVER['SERVER_NAME'] == 'votivelaravel.in') {
            return 'testing@votivelaravel.in';
        } 
        // elseif ($_SERVER['SERVER_NAME'] == 'pix2arts.com') {
        //     return 'info@pix2arts.com';
        // } 
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
}
