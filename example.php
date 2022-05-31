<?php

require_once("API-Forwarder.php");

use APIForwarder as classForwarder;

$classHTTP = New classForwarder\API();

$classHTTP->domain = "localhost:8000";
$classHTTP->ssl = '';

echo $classHTTP->forwarder();
