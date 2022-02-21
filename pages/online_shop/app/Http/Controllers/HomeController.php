<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cellphone = array();
        $laptop = array();
        $display = array();
        $speaker = array();
        for($id=1 ; $id<=4 ; $id++)
        {
            $favs = array();
            $products = SubCategory::where('category_id',$id)->join('products','sub_categories.id','=','products.subcategory_id')->join('images' , function ($join){
                $join->on('products.id','=','images.product_id')->where('order',1);
            })->get();
            foreach($products as $product)
            {
                $favs[$product->product_id] = Favourite::where('product_id',$product->product_id)->count();
            }
            arsort($favs);

            $count = 0;
            $top_favs = array();
            foreach($favs as $key => $value)
            {
                $count++;
                if($count>=4)
                {
                    break;
                }
                $top_favs[] = SubCategory::where('category_id',$id)->join('products','sub_categories.id','=','products.subcategory_id')
                    ->join('images',function ($join){
                        $join->on('products.id','=','images.product_id')->where('order',1);
                    })->where('product_id',$key)->firstOrFail();
            }
            switch ($id)
            {
                case 1:
                    $cellphone = $top_favs;
                    break;
                case 2:
                    $laptop =  $top_favs;
                    break;
                case 3:
                    $display = $top_favs;
                    break;
                case 4:
                    $speaker = $top_favs;
                    break;
            }
        }

        return view('index',compact('cellphone','laptop','display','speaker'));
    }
}
