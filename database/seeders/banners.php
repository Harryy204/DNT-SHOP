<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class banners extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banners = [
            [
                'image_url' => '1731834697.jpg',
                'hidden' => 0,
                'position' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'image_url' => '1731834704.jpg',
                'hidden' => 0,
                'position' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'image_url' => '1730771022.jpg',
                'hidden' => 0,
                'position' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'image_url' => '1730771013.jpg',
                'hidden' => 0,
                'position' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'image_url' => '1730771000.jpg',
                'hidden' => 1,
                'position' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'image_url' => '1730770988.jpg',
                'hidden' => 1,
                'position' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'image_url' => '1730770975.jpg',
                'hidden' => 1,
                'position' => 7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('banners')->insert($banners);
    }
}
