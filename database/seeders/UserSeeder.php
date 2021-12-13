<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
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

        $faker = Factory::create();
        User::create( [
            'name' => 'admin',
            'email' => 'admin@test.com',
            'type' => 'admin',
            'password' => Hash::make( '123456' ),
        ] );

        for ($i = 0; $i < 15; $i++) {
            User::create( [
                'name' => $faker->name,
                'email' => $faker->email(),
                'password' => Hash::make( '123456' ),
            ] );
        }

    }

}
