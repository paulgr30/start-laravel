<?php

namespace Core\Actions\Auths;

use Core\Domain\Services\Auths\RefreshTokenService;
use Core\Responders\ResourceResponder;
use Illuminate\Http\Request;

class RefreshTokenAction
{
    protected $service;
    protected $responder;

    public function __construct(RefreshTokenService $service, ResourceResponder $responder)
    {
        $this->service = $service;
        $this->responder = $responder;
    }

    public function __invoke(Request $request)
    {
        $token = $this->service->execute((int) $request->id);
        return $this->responder->withData($token)->respond();
    }
}
