<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name','subject_id','page_title','page_text','page_file','main_product_id'];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    public function subcategories()
    {
        return $this->hasMany(SubCategory::class);
    }
}
