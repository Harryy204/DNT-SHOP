<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class sizes extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sizes = [
            ['size_name' => 'S'],
            ['size_name' => 'M'],
            ['size_name' => 'L'],
            ['size_name' => 'XL'],
            ['size_name' => 'XXL'],
            ['size_name' => 'XXXL'],
            ['size_name' => 'XXXXL'],
            ['size_name' => '29'],
            ['size_name' => '30'],
            ['size_name' => '31'],
            ['size_name' => '32'],
            ['size_name' => '33'],
            ['size_name' => '34'],
            ['size_name' => '35'],
            ['size_name' => '36'],
            ['size_name' => '37'],
            ['size_name' => '38'],
            ['size_name' => '39'],
            ['size_name' => '40'],
            ['size_name' => '41'],
            ['size_name' => '42'],
            ['size_name' => '43'],
        ];

        DB::table('sizes')->insert($sizes);
    }
}
