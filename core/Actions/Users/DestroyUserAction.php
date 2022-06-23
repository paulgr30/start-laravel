<?php

namespace Core\Actions\Users;

use Core\Domain\Services\Users\DestroyService;
use Core\Responders\ResourceResponder;

class DestroyUserAction
{
    private $service;
    private $responder;


    public function __construct(DestroyService $service, resourceResponder $responder)
    {
        $this->service = $service;
        $this->responder = $responder;
    }

    public function __invoke($id)
    {
        $user = $this->service->execute((int) $id);
        return $this->responder->withData($user)->respond();
    }
}