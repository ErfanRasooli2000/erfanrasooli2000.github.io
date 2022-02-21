<?php
namespace App\Helpers;

use App\Models\Cart;
use App\Models\Favourite;
use Illuminate\Support\Facades\Auth;

class AppHelper
{
    public function is_favourite($product_id , $user_id)
    {
        $user_id = Auth::user()->id;
        if(Favourite::where('product_id',$product_id)->where('user_id',$user_id)->count()!=0)
        {
            return 'selected-btn';
        }
        return '';
    }
    public function is_cart($product_id , $user_id)
    {
        $user_id = Auth::user()->id;
        if(Cart::where('product_id',$product_id)->where('user_id',$user_id)->count()!=0)
        {
            return 'selected-btn';
        }
        return '';
    }
    public function is_favourite2($product_id , $user_id)
    {
        $user_id = Auth::user()->id;
        if(Favourite::where('product_id',$product_id)->where('user_id',$user_id)->count()!=0)
        {
            return 'product-added-to-favourites';
        }
        return '';
    }
    public function is_cart2($product_id , $user_id)
    {
        $user_id = Auth::user()->id;
        if(Cart::where('product_id',$product_id)->where('user_id',$user_id)->count()!=0)
        {
            return 'product-added-to-basket';
        }
        return '';
    }

    public function is_cart3($product_id)
    {
        $user_id = Auth::user()->id;
        if(Cart::where('product_id',$product_id)->where('user_id',$user_id)->count()!=0)
        {
            return 'in-cart';
        }
        return 'add-to-cart';
    }
    public function is_cart4($product_id)
    {
        $user_id = Auth::user()->id;
        if(Cart::where('product_id',$product_id)->where('user_id',$user_id)->count()!=0)
        {
            return 'In Cart';
        }
        return 'Add To Cart';
    }
    public static function instance()
    {
        return new AppHelper();
    }
}
