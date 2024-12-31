<?php

namespace Database\Seeders;

use Carbon\Carbon;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tags extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            ['tag_name' => 'Áo', 'slug' => 'ao', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['tag_name' => 'Quần', 'slug' => 'quan', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['tag_name' => 'Đồ bộ', 'slug' => 'do-bo', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['tag_name' => 'Nike', 'slug' => 'nike', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['tag_name' => 'Giày thể thao', 'slug' => 'giay-the-thao', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['tag_name' => 'Áo sơ mi', 'slug' => 'ao-so-mi', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['tag_name' => 'Áo khoác', 'slug' => 'ao-khoac', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['tag_name' => 'Áo dài', 'slug' => 'ao-dai', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['tag_name' => 'Đầm váy', 'slug' => 'dam-vay', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['tag_name' => 'Túi xách', 'slug' => 'tui-xach', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['tag_name' => 'Giày cao gót', 'slug' => 'giay-cao-got', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['tag_name' => 'Quần short', 'slug' => 'quan-short', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['tag_name' => 'Mũ', 'slug' => 'mu', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['tag_name' => 'Kính mắt', 'slug' => 'kinh-mat', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['tag_name' => 'Dép lê', 'slug' => 'dep-le', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        DB::table('tags')->insert($tags);
    }
}
