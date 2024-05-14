<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use App\Models\NewsCategoryModel;
use App\Models\NewsModel;
use Illuminate\Http\Request;

class NewsApiController extends Controller
{
    function getCategories()
    {
        $categories = CategoryModel::select('name')->get();

        return response()->json([
            'message' => 'success get data categories',
            'categories' => $categories
        ]);
    }

    function getAllNews()
    {
        $news = NewsModel::select('name', 'image', 'tagline', 'description')->get();

        return response()->json([
            'message' => 'success get data news',
            'news' => $news
        ]);
    }

    function getNewsByName(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $news = NewsModel::select('name', 'image', 'tagline', 'description')->where('name', $request->name)->first();

        return response()->json([
            'message' => 'success get data news',
            'data' => $news
        ]);
    }

    function getNewsByCategory(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255'
        ]);

        $category = CategoryModel::select('id')->where('name', $request->category)->first();
        if (!$category) {
            return response()->json([
                'message' => 'category not found'
            ], 404);
        }

        $news = NewsCategoryModel::where('category_id', $category->id)->with('news')->get()->pluck('news');

        return response()->json([
            'message' => 'success get data news',
            'category' => $request->category,
            'news' => $news
        ]);
    }
}
