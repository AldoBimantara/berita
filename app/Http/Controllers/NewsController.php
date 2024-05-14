<?php

namespace App\Http\Controllers;

use App\Models\NewsModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\NewsCategoryModel;
use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function index()
    {
        $news = NewsModel::with('categories')
            ->orderBy('updated_at', 'desc')
            ->paginate(8);

        $newNews = NewsModel::with('categories')
            ->orderBy('created_at', 'desc')
            ->take(6)->get();

        return view('index', [
            'news' => $news,
            'newNews' => $newNews
        ]);
    }
    
    public function details($newsId)
    {
        $news = NewsModel::with('categories')->findOrFail($newsId);

        return view('details', [
            'news' => $news,
        ]);
    }

    public function data(Datatables $datatables)
    {
        $news = NewsModel::orderBy('updated_at', 'desc')->get();

        if ($datatables->getRequest()->ajax()) {
            return $datatables
                ->of($news)
                ->removeColumn('id')
                ->addIndexColumn()
                ->addColumn('kelola', function (NewsModel $data) {
                    $button = '<div class="d-flex justify-content-around">';
                    $button .= '<button class="btn btn-warning edit-btn me-2" data-id="' . $data->id . '">
                                <i class="fa-solid fa-pen-to-square" style="color: #ffffff" alt=""></i>
                               </button>';

                    $button .= '<button class="btn btn-danger delete-btn" data-id="' . $data->id . '">
                                <i class="fa-solid fa-trash" alt=""></i>
                               </button>';
                    $button .= '</div>';
                    return $button;
                })
                ->rawColumns(['kelola'])
                ->toJson();
        }
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        $this->validate($request, [
            'name' => ['required', 'min: 2', 'max: 50'],
            'tagline' => ['required', 'min:2', 'max: 100'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
            'description' => ['required', 'min: 4, max: 500'],
            'categories' => ['required', 'array'],
        ]);

        try {
            $news = new NewsModel();
            $news->name = $request->name;
            $news->tagline = $request->tagline;
            $news->description = $request->description;

            // Simpan file ke pulbic/images
            if ($request->hasFile('image')) {
                $request->file('image')->move('images/', $request->file('image')->getClientOriginalName());
                $news->image = $request->file('image')->getClientOriginalName();
            }

            $news->save();

            $selectedCategories = $request->input('categories', []);
            $news->categories()->sync($selectedCategories);

            DB::commit();
            return ResponseFormatter::success($news, 'Succesfully added News data');
        } catch (error) {
            DB::rollBack();
            return ResponseFormatter::error(null, 'Failed to add News data');
        }
    }

    public function edit($newsId)
    {
        $newsData = $news = NewsModel::with('categories')->where('id', $newsId)
            ->orderBy('updated_at', 'desc')
            ->get();

        return response()->json(['newsData' => $newsData]);
    }

    public function update(Request $request, $newsId)
    {
        DB::beginTransaction();
        $this->validate($request, [
            'edit_name' => ['required', 'min: 2', 'max: 50'],
            'edit_tagline' => ['required', 'min:2', 'max:100'],
            'edit_description' => ['required', 'min: 4, max: 500'],
            'edit_categories' => ['required', 'array'],
        ]);

        try {
            $news = NewsModel::findOrFail($newsId);
            $news->name = $request->edit_name;
            $news->tagline = $request->edit_tagline;
            $news->description = $request->edit_description;

            // Cek apakah ada perubahan gambar
            if ($request->hasFile('edit_image')) {
                $this->validate($request, [
                    'edit_image' => ['image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
                ]);

                $newImageName = $request->file('edit_image')->getClientOriginalName();

                // Hanya simpan gambar baru jika namanya berbeda
                if ($news->image !== $newImageName) {
                    $request->file('edit_image')->move('images/', $newImageName);
                    $news->image = $newImageName;
                }
            }

            $news->update();

            $selectedCategories = $request->input('edit_categories', []);
            $news->categories()->sync($selectedCategories);

            DB::commit();
            return ResponseFormatter::success($news, 'Successfully added News data');
        } catch (\Exception $e) {
            DB::rollBack();
            return ResponseFormatter::error(null, 'Failed to save News data: ' . $e->getMessage());
        }
    }

    public function destroy($newsId)
    {
        DB::beginTransaction();

        try {
            $news = NewsModel::findOrFail($newsId);
            $newsCategories = NewsCategoryModel::where('news_id', $newsId)->get();

            foreach ($newsCategories as $newsCategory) {
                $newsCategory->delete();
            }
            $news->delete();

            DB::commit();
            return ResponseFormatter::success($news, 'News data deleted');
        } catch (Exception $e) {
            DB::rollBack();
            return ResponseFormatter::error(null, 'News is used on another tables', 400);
        }
    }
}