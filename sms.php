<?php

// Get the PHP helper library from twilio.com/docs/php/install
require_once ('Twilio/autoload.php'); // Loads the library
use Twilio\Rest\Client;

$sid = 'AC59979273b57307e0a7f8769b5a79caf6';
$token = '95326e2c66b0da00ba4a157f734ac412';
$client = new Client($sid, $token);

$client->messages->create(
  '+201126438060',
  array(
    'from' => '+17172104916',
    'body' => 'Transaction took place in your account. Check the mobile banking application for details.',
  )
);