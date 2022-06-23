<?php

namespace Core\Actions\Users;

use Core\Domain\Services\Users\GetAllService;
use Core\Responders\ResourceResponder;

class GetUsersAction
{
    private $service;
    private $responder;


    public function __construct(GetAllService $service, ResourceResponder $responder)
    {
        $this->service   = $service;
        $this->responder = $responder;
    }

    public function __invoke()
    {
        $users = $this->service->execute();
        return $this->responder->withData($users)->respond();
    }
}