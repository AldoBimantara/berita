<?php

namespace Database\Seeders;

use App\Models\NewsModel;
use App\Models\CategoryModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NewsCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
        public function run()
        {
            $newsCount = NewsModel::count();
            $categories = CategoryModel::all();

            $pivotData = [];

            for ($i = 0; $i < 15; $i++) {
                $newsId = rand(1, $newsCount);
                $category = $categories->random();

                $pivotData[] = [
                    'news_id' => $newsId,
                    'category_id' => $category->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            DB::table('news_categories')->insert($pivotData);
        }
}
