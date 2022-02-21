<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Favourite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function delete($product_id)
    {
        if(Auth::check())
        {
            $user_id = Auth::user()->id;
            if(Cart::where('product_id',$product_id)->where('user_id',$user_id)->count()==1)
            {
                Cart::where('product_id',$product_id)->where('user_id',$user_id)->delete();
            }
        }
        return redirect(route('cart'));
    }

    public function cart()
    {
        if(auth()->check())
        {
            $cart_products = Cart::where('user_id',auth()->user()->id)->join('products','products.id','=','carts.product_id')
                ->join('images',function ($join){
                    $join->on('products.id','=','images.product_id')->where('order',1);
                })->get();
        }
        else
        {
            $cart_products = null;
        }
        if(Cart::where('user_id',auth()->user()->id)->join('products','products.id','=','carts.product_id')
            ->join('images',function ($join){
                $join->on('products.id','=','images.product_id')->where('order',1);
            })->count()==0)
        {
            $cart_products = null;
        }
        return view('cart',compact('cart_products'));
    }

    public function add($product_id , $user_id)
    {
        if(Auth::check())
        {
            $user_id = Auth::user()->id;
            if(Cart::where('product_id',$product_id)->where('user_id',$user_id)->count()==0)
            {
                $cart = new Cart();
                $cart->user_id = $user_id;
                $cart->product_id = $product_id;
                $cart->count = 1;
                $cart->state = 1;
                $cart->save();
                echo "added";
            }
            else
            {
                Cart::where('product_id',$product_id)->where('user_id',$user_id)->delete();
                echo "deleted";
            }
        }
    }

    public function counter($product_id,$count)
    {
        if(auth()->check())
        {
            $product = Cart::where('product_id',$product_id)->where('user_id',auth()->user()->id)->firstOrFail();
            $product->count = $count;
            $product->save();
        }
    }
}
