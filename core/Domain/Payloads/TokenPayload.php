<?php

namespace Core\Domain\Payloads;

use Core\Shareds\Abstracts\Payload;

class TokenPayload extends Payload
{
    protected $status = 200;
    
    /*public function __construct($data)
    {
        $this->data = ['token' => $data];
    }*/


    public function getData() {
        return ['token' => $this->data];
    }

}
