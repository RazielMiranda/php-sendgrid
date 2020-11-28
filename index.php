<?php
    function send_simple_message() {  
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, 'api:a90ac9807d7344cd6918abfe32a35b1a-360a0b2c-33c2c308');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_URL, 
            'https://api.mailgun.net/v3/sandbox872f22dc9e2540bfb03d809e1e137ef9.mailgun.org');
        curl_setopt($ch, CURLOPT_POSTFIELDS, 
              array('from' => 'Dwight Schrute <mailgun@sandbox872f22dc9e2540bfb03d809e1e137ef9.mailgun.org>',
                    'to' => 'Michael Scott <raziel@rzdev.codes>',
                    'subject' => 'The Printer Caught Fire',
                    'text' => 'We have a problem.'));
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
      }
      echo send_simple_message();