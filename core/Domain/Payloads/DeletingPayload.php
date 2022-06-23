<?php

namespace Core\Domain\Payloads;

use Core\Shareds\Abstracts\Payload;

class DeletingPayload extends Payload
{
    protected $data = null;
    // Sin contenido
    protected $status = 204;

    public function __construct($data)
    {
        if(!$data) {
            $this->data = ['message' => 'El recurso no se pudo eliminar'];
            // Hay un conflicto en el recurso
            $this->status = 409;
        }
    }
}
