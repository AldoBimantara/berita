<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories = [
            'Politik',
            'Olahraga',
            'Ekonomi',
            'Sosial',
            'Kesehatan',
            'Pendidikan',
            'Kebudayaan',
        ];

        foreach ($categories as $index => $categoryName) {
            DB::table('categories')->insert([
                'name' => $categoryName,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}