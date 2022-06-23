<?php

namespace Core\Domain\Validators;

final class UserValidator
{
    private static $validator;

    static function validate($data)
    {
        $id = empty($data['id']) ? 0 : $data['id'];


        $attributes = [
            'name'      => 'Nombre',
            'password'  => 'Contraseña',
            'roles'     => 'Rol',
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
            'is_active'   => ['required', 'in:0,1'],
            'roles' => ['required'],
        ];

        if ($id == 0 or !empty($data['password'])) {
            $rules = array_merge($rules, [
                'password' => [
                    'required'
                ]
            ]);
        }

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