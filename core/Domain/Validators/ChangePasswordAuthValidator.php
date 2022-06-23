<?php

namespace Core\Domain\Validators;

final class ChangePasswordAuthValidator
{
    private static $validator;

    static function validate($data)
    {
        $attributes = [
            'current_password'          => 'Contraseña Actual',
            'new_password'              => 'Nueva Contraseña',
            'new_password_confirmation' => 'Configrmar Nueva Contraseña'
        ];

        $rules = [
            'current_password'          => [ 'required', 'current_password', ],
            'new_password'              => [ 'required', 'confirmed', 'min:10', ],
            'new_password_confirmation' => [ 'required', 'min:10', ],
        ];

        self::$validator = validator($data, $rules, [], $attributes);
        return self::$validator->fails() ? false : true;
    }

    static function validatedData()
    {
        return self::$validator->validated();
    }

    static function getMessage()
    {
        if (self::$validator->fails()) {
            return self::$validator->messages();
        }
    }
}
