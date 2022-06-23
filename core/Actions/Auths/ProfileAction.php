<?php

namespace Core\Actions\Auths;

use Core\Domain\Services\Auths\ProfileService;
use Core\Responders\ResourceResponder;

class ProfileAction
{
    protected $service;
    protected $responder;

    public function __construct(ProfileService $service, ResourceResponder $responder)
    {
        $this->service = $service;
        $this->responder = $responder;
    }

    public function __invoke()
    {
        $profile = $this->service->execute();
        return $this->responder->withData($profile)->respond();
    }
}
