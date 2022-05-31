<?php

require_once("forwarder.php");

use APIForwarder as classAPI;

$classAPI = New classAPI\API();

$classAPI->domain = "localhost:8080";
$classAPI->ssl = '';

echo $classHTTP->forwarder();
