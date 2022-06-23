<?php

namespace Database\Seeders;

use Core\Domain\Models\User;
use Database\Factories\UserFactory;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$factory = new UserFactory();
        $factory->count(150)->create();*/
        User::create([
            'name'              => 'Paul Garcia.',
            'email'             => 'admin@live.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('123456789'),
        ])->assignRole('Admin');

        User::create([
            'name'              => 'Juan Perez',
            'email'             => 'guest@live.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('123456789'),
        ])->assignRole('Visitant');
    }
}
