<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Project;
use App\Models\Type;

// Helpers
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $title = $faker->unique()->sentence(4);

            $typeId = null;
            if (rand(0, 1)) {
                $typeId = Type::inRandomOrder()->first()->id;
            }

            Project::create([
                'title' => $title,
                'description' => $faker->paragraph(4),
                'type_id' => $typeId,
                'slug' => Str::slug($title),
                'status' => $faker->randomElement(['completed', 'active', 'on_hold', 'cancelled'])
            ]);
        }
    }
}