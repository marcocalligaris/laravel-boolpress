<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $user = new User();
        $user->name = 'marco';
        $user->email = 'marco@gmail.it';
        $user->password = bcrypt('calligaris');
        $user->save();

        for($i = 0; $i < 9; $i++) {
            $user = new User();
            $user->name = $faker->userName();
            $user->email = $faker->email();
            $user->password = bcrypt($faker->word());
            $user->save();
        }
    }
}
