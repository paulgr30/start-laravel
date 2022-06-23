<?php

namespace Core\Actions\Users;

use Core\Domain\Services\Users\GetByCriteriaService;
use Core\Responders\ResourceResponder;
use Illuminate\Http\Request;

class GetUsersByCriteriaAction
{
    private $service;
    private $responder;


    public function __construct(GetByCriteriaService $service, ResourceResponder $responder)
    {
        $this->service = $service;
        $this->responder = $responder;
    }

    public function __invoke(Request $request)
    {
        $users = $this->service->execute((string) $request->searchValue, (int) $request->perPage);
        return $this->responder->withData($users)->respond();
    }
}