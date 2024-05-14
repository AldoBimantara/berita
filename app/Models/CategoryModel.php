<?php

namespace App\Models;

use App\Models\NewsModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryModel extends Model
{
    use HasFactory;
    protected $table = "categories";
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
    ];

    public function categories()
    {
        return $this->belongsToMany(NewsModel::class, 'news_categories', 'category_id', 'news_id');
    }
    
}