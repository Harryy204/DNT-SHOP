<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class colors extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colors = [
            ['color_name' => 'Đỏ', 'color_code' => '#FF0000'],
            ['color_name' => 'Xanh lá cây', 'color_code' => '#008000'],
            ['color_name' => 'Xanh dương', 'color_code' => '#0000FF'],
            ['color_name' => 'Đen', 'color_code' => '#000000'],
            ['color_name' => 'Trắng', 'color_code' => '#FFFFFF'],
            ['color_name' => 'Vàng', 'color_code' => '#FFFF00'],
            ['color_name' => 'Cam', 'color_code' => '#FFA500'],
            ['color_name' => 'Tím', 'color_code' => '#800080'],
            ['color_name' => 'Hồng', 'color_code' => '#FFC0CB'],
            ['color_name' => 'Xám', 'color_code' => '#808080'],
            ['color_name' => 'Hoa kem', 'color_code' => '#e5a88e'],
            ['color_name' => 'Nâu', 'color_code' => '#c6b39c'],
        ];

        DB::table('colors')->insert($colors);
    }
}
