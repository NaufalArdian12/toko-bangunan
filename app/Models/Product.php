<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'nama',
        'category_id',
        'satuan',
        'harga_jual',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function stockItems()
    {
        return $this->hasMany(StockItem::class);
    }
}
