<?php

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $labels = ['dogs', 'cats', 'reptiles', 'birds', 'fishes', 'rodents'];

        foreach($labels as $label)
        {
            $tag = new Tag();
            $tag->label = $label;
            $tag->color = $faker->safeHexColor();
            $tag-> save();
        }
    }
}
