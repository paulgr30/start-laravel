<?php

namespace Core\Domain\Payloads;

use Core\Shareds\Abstracts\Payload;


class GenericPayload extends Payload
{
    protected $status = 200;
    
    public function __construct($data)
    {
        $this->data   = $data;
    }
}
