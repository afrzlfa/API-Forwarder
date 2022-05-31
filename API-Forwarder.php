<?php

// PHP API Forwarder
// Copyright (c)2022 - RND ICWR - Afrizal F.A

namespace APIForwarder;

class API
{

    public function __construct()
    {

        $this->domain = '';
        $this->ssl = '';

    }

    public function requester($url, $method, $headers, $body)
    {

        $c = curl_init();

        curl_setopt($c, CURLOPT_URL, $url);
        curl_setopt($c, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($c, CURLOPT_HTTPHEADER, $headers);

        if (!empty($body)) {

            curl_setopt($c, CURLOPT_POSTFIELDS, $body);

        }

        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec($c);
        curl_close($c);

        return $response;

    }

    public function forwarder()
    {

        if (!empty($this->ssl) && $this->ssl == true) {

            $protocol = "https://";

        } else {

            $protocol = "http://";

        }

        $requestMethod = $_SERVER['REQUEST_METHOD'];

        if (!empty($_GET['path'])) {

            $url = $protocol . $this->domain . "/" . $_GET['path'];

        } else {

            $url = $protocol . $this->domain;

        }

        $headers = [];

        foreach(getallheaders() as $key => $value)
        {

            $headers []= $key . ": " . $value;

        }

        if (!empty(file_get_contents("php://input"))) {

            $body = file_get_contents("php://input");

        } else {

            $body = null;

        }

        return $this->requester($url, $requestMethod, $headers, $body);

    }

}
