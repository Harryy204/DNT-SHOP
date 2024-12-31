<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class categories extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'category_name' => 'Áo thun',
                'slug' => 'ao-thun',
                'image' => '/uploads/categories/ao_thun.jpg',
                'description' => 'áo thun thời trang',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_name' => 'Quần jean',
                'slug' => 'quan-jean',
                'image' => '/uploads/categories/quan_jean.jpg',
                'description' => 'quần jean đa dạng kiểu dáng',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_name' => 'Áo khoác',
                'slug' => 'ao-khoac',
                'image' => '/uploads/categories/ao_khoac.jpg',
                'description' => 'áo khoác phong cách',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_name' => 'Đầm váy',
                'slug' => 'dam-vay',
                'image' => '/uploads/categories/dam_vay.jpg',
                'description' => 'đầm váy nữ tính',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_name' => 'Phụ kiện',
                'slug' => 'phu-kien',
                'image' => '/uploads/categories/phu_kien.jpg',
                'description' => 'Danh mục các phụ kiện thời trang',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_name' => 'Giày dép',
                'slug' => 'giay-dep',
                'image' => '/uploads/categories/giay_dep.jpg',
                'description' => 'giày dép đa dạng',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_name' => 'Túi xách',
                'slug' => 'tui-xach',
                'image' => '/uploads/categories/tui_xach.jpg',
                'description' => 'túi xách thời trang',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_name' => 'Mũ nón',
                'slug' => 'mu-non',
                'image' => '/uploads/categories/mu_non.jpg',
                'description' => 'mũ nón phong cách',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_name' => 'Đồ bộ',
                'slug' => 'do-bo',
                'image' => '/uploads/categories/do_bo.jpg',
                'description' => 'đồ bộ tiện lợi',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_name' => 'Đồ ngủ',
                'slug' => 'do-ngu',
                'image' => '/uploads/categories/do_ngu.jpg',
                'description' => 'đồ ngủ thoải mái',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}
