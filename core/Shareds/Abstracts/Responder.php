<?php

namespace Core\Shareds\Abstracts;

abstract class Responder
{
    protected $response;

    public function withData($data)
    {
        $this->response = $data;
        return $this;
    }
}