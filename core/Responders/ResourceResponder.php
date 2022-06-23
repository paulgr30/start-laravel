<?php

namespace Core\Responders;

use Core\Shareds\Abstracts\Responder;

class ResourceResponder extends Responder
{
    public function respond()
    {
        return response()->json($this->response->getData(), $this->response->getStatus());
    }
}
