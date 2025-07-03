<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $fillable = ['nama'];

    public function stockItems()
    {
        return $this->hasMany(StockItem::class);
    }
}
