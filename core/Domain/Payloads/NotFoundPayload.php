<?php

namespace Core\Domain\Payloads;

use Core\Shareds\Abstracts\Payload;

class NotFoundPayload extends Payload
{
    // No se encontro el recurso
    protected $status = 404;


    // Sobre escribimos el metodo getData de Payload
    public function getData()
    {
        return [
            'message' => 'Recurso no encontrado'
        ];
    }
}
