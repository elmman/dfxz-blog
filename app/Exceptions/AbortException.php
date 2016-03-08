<?php

namespace App\Exceptions;


class AbortException extends \Exception
{
    private $httpCode;
    private $errorCode;
    private $errorMessage;
    private $headers;
    public function __construct($httpCode, $errorMessage, $exception = null, $headers = [], $errorCode) {
        $this->httpCode = $httpCode;
        $this->errorCode = $errorCode;
        $this->errorMessage = $errorMessage;
        $this->headers = $headers;
    }

    public function getHttpCode() {
        return $this->httpCode;
    }

    public function getErrorCode() {
        return $this->errorCode;
    }

    public function getErrorMessage() {
        return $this->errorMessage;
    }

    public function getHeaders() {
        return $this->headers;
    }

    public function getResult() {
        return [
            'errorCode' => $this->getErrorCode(),
            'errorMessage' => $this->getErrorMessage(),
        ];
    }
}