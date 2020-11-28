<?php

$email = "razielx3@live.com";
$name = "RZ";
$body = "<h1>hello trying again</h1>";
$subject = "Novos testes!";
$headers = array(
    "Authorization: Bearer ",
    'Content-Type: application/json'
);

$data = array(
    "personalizations" => array(
        array(
            "to" => array(
                array(
                    "email" => "raziel@rzdev.codes",
                    "name" => $name
                )
            )
        )
    ),
    "from" => array(
        "email" => $email,
    ),
    "subject" => $subject,
    "content" => array(
        array(
            "type" => "text/html",
            "value" => $body
        )
    )
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.sendgrid.com/v3/mail/send");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
curl_close($ch);

var_dump($response);
if($response == true){
    echo "ok";
}
// curl --request POST \
//   --url https://api.sendgrid.com/v3/mail/send \
//   --header "Authorization: Bearer $SENDGRID_API_KEY" \
//   --header 'Content-Type: application/json' \
//   --data '{"personalizations": [{"to": [{"email": "test@example.com"}]}],"from": {"email": "test@example.com"},"subject": "Sending with SendGrid is Fun","content": [{"type": "text/plain", "value": "and easy to do anywhere, even with cURL"}]}'