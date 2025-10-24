<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku',
        'name',
        'descrcleararaiption',
        'category_id',
        'quantity',
        'price',
        'location',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
