<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search($input)
    {
        $output = $this->product_search($input);
        arsort($output);
        $count = 0;

        foreach ($output as $key => $value)
        {
            if($value==0)
            {
                break;
            }
            $product = Product::where('id',$key)->firstOrFail();
            echo '<div class="search-result-child">
                        <a class="text-decoration-none text-body" href="/product/'.$key.'">'.$product->title.'</a>
                        <p class="text-secondary p-0 m-0">'.'</p>
                    </div>';
            $count++;
            if($count>=5)
            {
                break;
            }
        }
    }


    public function search_result($input)
    {
        $output = $this->product_search($input);
        arsort($output);
        $count = 0;
        $product = array();

        foreach ($output as $key => $value)
        {
            if($value==0)
            {
                break;
            }

            $product[] = Image::where('product_id',$key)->where('order',1)->join('products','images.product_id','=','products.id')->firstOrFail();
            $count++;
            if($count>=20)
            {
                break;
            }
        }
        //dd($product);
        return view('result',compact('product'));
    }


    public function product_search($input)
    {
        $points = array();
        $products = Product::all();
        foreach ($products as $product)
        {
            $points += [$product->id => 0];
            if(strpos(strtolower($product->title),strtolower($input))!==false)
            {
                $points[$product->id] += 5;
            }

            if(strpos(strtolower($product->full_name),strtolower($input))!==false)
            {
                $points[$product->id] += 4;
            }
            $words = explode(' ',$input);
            foreach ($words as $word)
            {
                if(strpos(strtolower($product->title),strtolower($word))!==false)
                {
                    $points[$product->id] += 2;
                }

                if(strpos(strtolower($product->full_name),strtolower($word))!==false)
                {
                    $points[$product->id] += 1;
                }
            }
        }
    return $points;
    }
}
