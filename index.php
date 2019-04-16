<?php 

include "vendor/autoload.php";

$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();


$host = getenv("SMTP_HOST");
$port = getenv("SMTP_PORT");
$user = getenv("SMTP_USER");
$pass = getenv("SMTP_PASS");
$from = getenv("SMTP_FROM");
$to = getenv("SMTP_TO");

echo "SMTP_HOST: $host \n";
echo "SMTP_PORT: $port \n";
echo "SMTP_USER: $user \n";
echo "SMTP_PASS: $pass \n";
echo "SMTP_FROM: $from \n";
echo "SMTP_TO: $to \n";




$transport = (new Swift_SmtpTransport($host, $port))
->setUsername($user)
->setPassword($pass);

$mailer = new Swift_Mailer($transport);

$message = (new Swift_Message("Wonderful Subject"))
->setFrom($from)
->setTo($to)
->setBody('Her is the message itself');


$result = $mailer->send($message);

var_dump($result);


//var_dump($transport);


