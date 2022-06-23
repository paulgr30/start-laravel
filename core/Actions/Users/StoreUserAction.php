<?php

namespace Core\Actions\Users;

use Core\Domain\Services\Users\StoreService;
use Core\Responders\{ExceptionResponder, ResourceResponder};
use Illuminate\Http\Request;

class StoreUserAction
{
    private $service;
    private $resourceResponder;
    private $exceptionResponder;


    public function __construct(StoreService $service)
    {
        $this->service = $service;
        $this->resourceResponder  = new ResourceResponder();
        $this->exceptionResponder = new ExceptionResponder();
    }

    public function __invoke(Request $request)
    {
        try {
            $user = $this->service->execute($request->collect());
        } catch (\Exception $e) {
            return $this->exceptionResponder->respond($e);
        }
        return $this->resourceResponder->withData($user)->respond();
    }
}