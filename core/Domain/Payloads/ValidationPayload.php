<?php

namespace Core\Domain\Payloads;

use Core\Shareds\Abstracts\Payload;

class ValidationPayload extends Payload
{
    // Entidad no procesable - La solicitud del cliente contiene errores semánticos
    // y el servidor no puede procesarla.
    protected $status = 422;


    // Sobre escribimos el metodo getData de Payload
    public function getData()
    {
        if(!$this->data) {
            $this->data = ['login' => ['Las credenciales de acceso no son validas']];
        }
        return [
            'errors' => $this->data
        ];
    }
}