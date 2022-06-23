<?php

namespace Core\Actions\Users;

use Core\Domain\Services\Users\GetByIdService;
use Core\Responders\ResourceResponder;

class GetUserAction
{
    protected $service;
    protected $responder;

    public function __construct(GetByIdService $service, ResourceResponder $responder)
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