<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Cho phép insert dữ liệu
    protected $fillable = [
        'id',
        'name',
        'price',
        'category_id',
        'image',       // nếu có ảnh
        'description'  // nếu có mô tả
    ];

    // Quan hệ với bảng Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}