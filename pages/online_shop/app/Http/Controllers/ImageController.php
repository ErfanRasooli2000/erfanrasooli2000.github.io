<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function create($id)
    {
        $product = Product::where('id',$id)->firstOrFail();
        return view('admin.add_product_image',compact('product'));
    }
    public function store(Request $request)
    {
        $file = $request['file-select'];
        $image = new Image();
        $last = Image::where('product_id',$request->input('productId'))->orderBy('order','desc')->first();
        if(is_null($last))
        {
            $order = 1;
        }
        else
        {
            $order = $last->order+1;
        }
        $image->product_id = $request->input('productId');
        $image->order = $order;
        $path = $file->store('public/images');
        $image->file = $path;
        $image->save();
    }

    public function show($id)
    {
        $images = Image::where('product_id',$id)->orderBy('order','asc')->get();
        $result1 = '';
        $result2 = '';
        foreach ($images as $image)
        {
            if($image->order%2==0)
            {
                $result1 .= "<div class=\"w-100 m-2 imageHolder\">";
                $result1 .= "<img src=\"".asset('storage/'.substr($image->file,7))."\" alt=\"img\">";
                $result1 .= "<a onclick=\"imageDelete(".$image->order.",".$image->product_id.")\" id=\"deleteImg".$image->order."\" class=\"delete-image\"><i class=\"bi bi-x-circle\"></i></a>";
                $result1 .= "</div>";
            }
            else
            {
                $result2 .= "<div class=\"w-100 m-2 imageHolder\">";
                $result2 .= "<img src=\"".asset('storage/'.substr($image->file,7))."\" alt=\"img\">";
                $result2 .= "<a onclick=\"imageDelete(".$image->order.",".$image->product_id.")\" id=\"deleteImg".$image->order."\" class=\"delete-image\"><i class=\"bi bi-x-circle\"></i></a>";
                $result2 .= "</div>";
            }
        }

        $result = "<div class=\"col-5 p-1\">".$result2."</div>"."<div class=\"col-5 p-1\">".$result1."</div>";
        echo $result;
    }
    public function destroy($order,$id)
    {
        $images = Image::where('product_id',$id)->where('order','>=',$order)->get();
        $count = 0;
        foreach ($images as $image)
        {
            $count++;
            if($count==1)
            {
                $image->delete();
            }
            else
            {
                $image->update([
                    'order'=>$image->order-1
                ]);
            }
        }
    }

}
