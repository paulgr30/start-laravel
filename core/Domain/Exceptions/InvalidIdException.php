<?php

declare(strict_types=1);

namespace Core\Domain\Exceptions;

final class InvalidIdException extends \Exception
{
    const MESSAGE = 'Identificador de recurso invalido';
    const CODE = 400;

    public function __construct()
    {
        parent::__construct(self::MESSAGE, self::CODE);
    }
}
