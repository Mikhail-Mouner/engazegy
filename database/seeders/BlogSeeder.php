<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        User::select('id')->get()->each( function ($user) use ($faker) {
            for ($i = 0; $i < rand( 1, 3 ); $i++) {
                $title = $faker->sentence;
                Blog::create( [
                    'title' => $title,
                    'slug' => Str::slug( $title ),
                    'desc' => $faker->realText,
                    'user_id' => $user->id,
                ] );
            }
        } );
    }

}
