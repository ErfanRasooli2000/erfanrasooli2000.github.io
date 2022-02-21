<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use App\Models\User;
use Illuminate\Http\Request;

class RateController extends Controller
{
    public function rateProduct($user_id,$product_id,$rate)
    {
        if($rate<=5)
        {
            if(Rate::where('product_id',$product_id)->where('user_id',$user_id)->count()==0)
            {
                $rates = new Rate();
                $rates->product_id = $product_id;
                $rates->user_id = $user_id;
                $rates->rate = $rate;
                $rates->save();
            }
            else
            {
                $rates = Rate::where('product_id',$product_id)->where('user_id',$user_id)->firstOrFail();
                $rates->rate = $rate;
                $rates->save();
            }
        }
    }
}
