<?php

namespace App\DTO;

class ApiResponse
{
    public $response = [];
    public $message = "";
    public $statusCode = 0;
    public $serviceName = "";

    public function __construct($response = [], $message = "", $statusCode = 0, $serviceName = "")
    {
        $this->response = $response;
        $this->message = $message;
        $this->statusCode = $statusCode;
        $this->serviceName = $serviceName;
    }
}


