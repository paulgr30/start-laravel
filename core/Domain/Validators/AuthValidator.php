<?php

namespace Core\Domain\Validators;

final class AuthValidator
{
    private static $validator;
    
    static function validate($data)
    {
        $attributes = [
            'password'  => 'Contraseña',
        ];

        $rules = [
            'email'     => [ 'required', 'email', ],
            'password'  => [ 'required', ],
        ];

        self::$validator = validator($data, $rules, [], $attributes);
        return self::$validator->fails() ? false : true ;
    }

    static function validatedData() {
        return self::$validator->validated();
    }

    static function getMessage()
    {
        if (self::$validator->fails()) {
            return self::$validator->messages();
        }
    }
}
