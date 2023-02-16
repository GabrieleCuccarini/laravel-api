<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker) {
        $types = Type::all();
        $users = User::all();
        $technologies = Technology::all();

        for ($i = 0; $i < 50; $i++) {
            $project = Project::create([
                "name" => $faker->sentence(),
                "description" => $faker->realText(),
                "cover_img" => "posts/5xPNmccPGgGMeMYBdPxfhHWlfBFouAqiRlI09SSR.jpg",
                // "user_id" => $users->random()->id,
                "link" => $faker->realText(),
                "type_id" => $types->random()->id
            ]);

            $project->technologies()->attach($technologies->random(rand(1, $technologies->count()))->pluck("id"));
        }
    }
}
