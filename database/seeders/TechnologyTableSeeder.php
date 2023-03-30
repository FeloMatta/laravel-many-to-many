<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Technology;

// Helpers
use Illuminate\Support\Str;

class TechnologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = [
            'html', 'css', 'javascript', 'bootstrap', 'vue', 'php', 'laravel', 'tailwind', 'sql'
        ];

        foreach ($technologies as $technology) {
            $newTech = Technology::create([
                'name' => $technology,
                'slug' => Str::slug($technology)
            ]);
        }
    }
}