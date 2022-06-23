<?php

declare(strict_types=1);

namespace Core\Domain\Exceptions;

final class NotFoundException extends \Exception
{
    protected $message = null;
    const CODE = 404;

    public function __construct(string $message = 'Recurso no encontrado')
    {
        $this->message = $message;
        parent::__construct($this->message . '', self::CODE);
    }
}