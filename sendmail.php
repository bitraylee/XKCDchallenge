<?php
$to = "user2@randomxkcd.com";
$subject = "diamond";
$message = "diamond";
$from = "user1@randomxkcd.com";
$headers = "From: $from";
if (mail($to, $subject, $message, $headers)) {
   echo "Mail Sent.";
} else {
   echo "Mail is not sent.";
}
