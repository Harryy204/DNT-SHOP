<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class brands extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            [
                'brand_name' => 'Nike',
                'slug' => 'nike',
                'logo' => '/uploads/brands/nike_logo.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'brand_name' => 'Adidas',
                'slug' => 'adidas',
                'logo' => '/uploads/brands/adidas_logo.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'brand_name' => 'Puma',
                'slug' => 'puma',
                'logo' => '/uploads/brands/puma_logo.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'brand_name' => 'Gucci',
                'slug' => 'gucci',
                'logo' => '/uploads/brands/gucci_logo.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'brand_name' => 'Chanel',
                'slug' => 'chanel',
                'logo' => '/uploads/brands/chanel_logo.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'brand_name' => 'Louis Vuitton',
                'slug' => 'louis-vuitton',
                'logo' => '/uploads/brands/louis_vuitton_logo.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'brand_name' => 'Dior',
                'slug' => 'dior',
                'logo' => '/uploads/brands/dior_logo.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'brand_name' => 'Zara',
                'slug' => 'zara',
                'logo' => '/uploads/brands/zara_logo.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('brands')->insert($brands);
    }
}
