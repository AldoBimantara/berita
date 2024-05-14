<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as FakerFactory;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $images = [
            'pemilu.jpg',
            'olimpiadetokyo.webp',
            'ekonomipandemi.jpg',
            'alam.jpg',
            'kesehatan.jpg',
            'tekno-pendidikan.jpg',
            'kebudayaan.jpg',
        ];

        $names = [
            'Pemilihan Umum 2023',
            'Prestasi Gemilang di Olimpiade Tokyo 2022',
            'Pertumbuhan Ekonomi Global',
            'Gerakan Peduli Lingkungan',
            'Perkembangan Vaksin COVID-19',
            'Inovasi Pendidikan di Era Digital',
            'Warisan Budaya yang Dilindungi',
        ];

        $numberOfNewsEntries = 5;

        $faker = FakerFactory::create();

        for ($i = 1; $i <= $numberOfNewsEntries; $i++) {
            $name = $names[$i];
            $image = $image = $images[$i];
            $tagline = $faker->sentence(rand(10, 15));
            $description = $faker->sentence(rand(20, 25));

            DB::table('news')->insert([
                'name' => $name,
                'image' => $image,
                'tagline' => $tagline,
                'description' => $description,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}