<?php


        $msg = "First line of text\nSecond line of text";

        // use wordwrap() if lines are longer than 70 characters
        $msg = wordwrap($msg, 70);

        // send email
        $sendmail =  mail("votivephp.rahulraj@gmail.com", "My subject", "First");

        $a1 = ['votivephp.rahulraj@gmail.com'];
        $r1 = fopen('a.txt', 'r');
        $r2 = curl_init('smtps://smtp.gmail.com');
        curl_setopt($r2, CURLOPT_MAIL_RCPT, $a1);
        curl_setopt($r2, CURLOPT_NETRC, true);
        curl_setopt($r2, CURLOPT_READDATA, $r1);
        curl_setopt($r2, CURLOPT_UPLOAD, true);
        $sendmailas = curl_exec($r2);

        print_r($sendmailas);

        

        ?>


<?php  ?>