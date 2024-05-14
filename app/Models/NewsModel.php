<?php

namespace App\Models;

use App\Models\CategoryModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NewsModel extends Model
{
    use HasFactory;
    protected $table = "news";
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'image',
        'tagline',
        'description',
    ];

    public function categories()
    {
        return $this->belongsToMany(CategoryModel::class, 'news_categories', 'news_id', 'category_id');
    }
}