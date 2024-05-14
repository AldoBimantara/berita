<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsCategoryModel extends Model
{
    use HasFactory;
    protected $table = "news_categories";
    protected $primaryKey = 'id';
    protected $fillable = [
        'post_id',
        'category_id'
    ];

    public function news()
    {
        return $this->belongsTo(NewsModel::class, 'news_id', 'id');
    }

    public function categories()
    {
        return $this->belongsTo(CategoryModel::class, 'category_id', 'id');
    }
}