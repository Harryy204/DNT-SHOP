<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class userAdmin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            'full_name' => 'ADMIN DNTSHOP',
            'email' => 'admin@dntshop.tokyo',
            'address' => 'k42/7 Nguyễn Huy Tưởng, Đà Nẵng',
            'phone' => '1900190000',
            'password' => bcrypt('admin'),
            'role' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
