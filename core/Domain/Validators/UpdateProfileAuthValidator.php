<?php

namespace Core\Domain\Validators;

use Illuminate\Support\Facades\Auth;

final class UpdateProfileAuthValidator
{    
    private static $validator;

    static function validate($data)
    {
        $id = Auth::user()->id;

        $attributes = [
            'name'  => 'Nombre',
        ];

        $rules = [
            'name' => [
                'required',
                'unique:users,name,' . $id . ',id',
            ],
            'email' => [
                'required',
                'email',
                'unique:users,email,' . $id . ',id',
            ],
        ];
        self::$validator = validator($data, $rules, [], $attributes);
        return self::$validator->fails() ? false : true;
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
