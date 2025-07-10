<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Programming',
                'slug' => 'programming',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Digital Marketing',
                'slug' => 'digital-marketing',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Product Desing',
                'slug' => 'product-design',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
