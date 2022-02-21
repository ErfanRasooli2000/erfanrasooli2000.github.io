<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title','full_name','subcategory_id','price','body','discount','quantity'];

    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function rates()
    {
        return $this->hasMany(Rate::class);
    }
    public function about_product()
    {
        return $this->hasMany(AboutProduct::class);
    }
    public function details()
    {
        return $this->belongsToMany(Detail::class);
    }
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function favourites()
    {
        return $this->belongsToMany(Favourite::class);
    }
    public function carts()
    {
        return $this->belongsToMany(Cart::class);
    }
    public function comments()
    {
        return $this->belongsToMany(Comment::class);
    }

}
