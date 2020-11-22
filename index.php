<?php

$email = "raziel@rzdev.codes";
$name = "RZ";
$body = "<h1>hello</h1>";
$time = new DateTime("Y");
$subject = "tentando com o raziel@rzdev.codes será que foi denovo? $time";
$headers = array(
    "Authorization: Bearer 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",
    'Content-Type: application/json'
);

$data = array(
    "personalizations" => array(
        array(
            "to" => array(
                array(
                    "email" => $email,
                    "name" => $name
                )
            )
        )
    ),
    "from" => array(
        "email" => "raziel@rzdev.codes"
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

if($response){
    echo "ok";
}
// curl --request POST \
//   --url https://api.sendgrid.com/v3/mail/send \
//   --header "Authorization: Bearer $SENDGRID_API_KEY" \
//   --header 'Content-Type: application/json' \
//   --data '{"personalizations": [{"to": [{"email": "test@example.com"}]}],"from": {"email": "test@example.com"},"subject": "Sending with SendGrid is Fun","content": [{"type": "text/plain", "value": "and easy to do anywhere, even with cURL"}]}'