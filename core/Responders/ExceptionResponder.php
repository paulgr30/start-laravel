<?php

declare(strict_types=1);

namespace Core\Responders;

use Core\Payloads\InterfaceException;

final class ExceptionResponder
{
    public function respond(\Exception $e)
    {
        $body = [
            'message' => $e->getMessage()
        ];

        /*if ($e instanceof InterfaceException) {
            $body = $e->getErrors();
        }*/

        return response()->json($body, $e->getCode());
    }
}
