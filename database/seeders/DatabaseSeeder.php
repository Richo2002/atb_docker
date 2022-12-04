<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Album;
use App\Models\Article;
use App\Models\Media;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Album::factory(5)->create();
        // Article::factory(10)->create();
        // Media::factory(10)->create();
        // \App\Models\Project::factory(10)->create();

        $this->call([
            UserSeeder::class,
        ]);
    }
}
