<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(userAdmin::class);
        $this->call(banners::class);
        $this->call(tags::class);
        $this->call(categories::class);
        $this->call(brands::class);
        $this->call(colors::class);
        $this->call(sizes::class);
    }
}
