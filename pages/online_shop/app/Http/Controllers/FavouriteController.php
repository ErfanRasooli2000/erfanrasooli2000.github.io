<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{
    public function delete($product_id)
    {
        if(Auth::check())
        {
            $user_id = Auth::user()->id;
            if(Favourite::where('product_id',$product_id)->where('user_id',$user_id)->count()==1)
            {
                Favourite::where('product_id',$product_id)->where('user_id',$user_id)->delete();
            }
        }
        return redirect(route('favourites'));
    }
    public function add($product_id , $user_id)
    {
        if(Auth::check())
        {
            $user_id = Auth::user()->id;
            if(Favourite::where('product_id',$product_id)->where('user_id',$user_id)->count()==0)
            {
                $favourite = new Favourite();
                $favourite->user_id = $user_id;
                $favourite->product_id = $product_id;
                $favourite->save();
                echo "added";
            }
            else
            {
                Favourite::where('product_id',$product_id)->where('user_id',$user_id)->delete();
                echo "deleted";
            }
        }
    }
    public function index()
    {
        if(auth()->check())
        {
            $favourites = Favourite::where('user_id',auth()->user()->id)->join('products','products.id','=','favourites.product_id')
                ->join('images',function ($join){
                    $join->on('products.id','=','images.product_id')->where('order',1);
                })->get();
        }
        else
        {
            $favourites = null;
        }
        return view('favourites',compact('favourites'));
    }
}
