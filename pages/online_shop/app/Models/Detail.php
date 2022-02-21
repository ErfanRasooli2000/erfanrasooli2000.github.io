<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    protected $fillable = ['key','subcategory_id'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
}
