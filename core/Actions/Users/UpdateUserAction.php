<?php

namespace Core\Actions\Users;

use Core\Domain\Services\Users\UpdateService;
use Core\Responders\{ExceptionResponder, ResourceResponder};
use Illuminate\Http\Request;

final class UpdateUserAction
{
    private $service;
    private $resourceResponder;
    private $exceptionResponder;


    public function __construct(UpdateService $service)
    {
        $this->service            = $service;
        $this->resourceResponder  = new resourceResponder();
        $this->exceptionResponder = new ExceptionResponder();
    }

    public function __invoke($id, Request $request)
    {
        try {
            $user = $this->service->execute((int) $id, $request->collect());
        } catch (\Exception $e) {
            return $this->exceptionResponder->respond($e);
        }
        return $this->resourceResponder->withData($user)->respond();
    }
}