<?php

require_once("API-Forwarder.php");

use APIForwarder as classAPI;

$classAPI = New classAPI\API();

$classAPI->domain = "localhost:8080";
$classAPI->ssl = '';

echo $classAPI->forwarder();
