<?php
require_once 'sendgrid-php/sendgrid-php.php';

$email = new \SendGrid\Mail\Mail();
$email->setFrom("razielx3@live.com", "Raziel");
$email->setSubject("Sending with Twilio SendGrid is Fun");
$email->addTo("razielx3@live.com", "Raziel");
$email->addContent("text/plain", "and easy to do anywhere, even with PHP");
$email->addContent(
    "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
);
$sendgrid = new \SendGrid('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');
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}