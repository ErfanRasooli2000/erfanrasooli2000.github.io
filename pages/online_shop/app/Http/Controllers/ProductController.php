<?php

namespace App\Http\Controllers;
use App\Models\AboutProduct;
use App\Models\Category;
use App\Models\Detail;
use App\Models\Favourite;
use App\Models\SubCategory;
use App\Models\Subject;
use App\Models\User;
use DB;
use App\Models\Product;
use App\Models\Image;
use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Table;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::where('id',$id)->get()->firstOrFail();
        $images = $product->images;
        $details = DB::table('detail_product')->where('product_id',$id)->join('details','details.id','=','detail_product.detail_id')->get();
        $rates = $product->rates;
        $abouts = $product->about_product;
        if(Auth::user())
        {
            if(Rate::where('product_id',$product->id)->where('user_id',Auth::user()->id)->count()==0)
            {
                $rate = 0;
            }
            else
            {
                $rate = Rate::where('product_id',$product->id)->where('user_id',Auth::user()->id)->firstOrFail()->rate;
            }
        }
        else
        {
            $rate = 0;
        }
        return view('product',['product'=>$product,'images'=>$images,'rates'=>$rates,'details'=>$details , 'abouts'=>$abouts , 'rate'=>$rate]);
    }

    public function index()
    {
        $products = Product::all();
        return view('admin.all_products',compact('products'));
    }

    public function edit($id)
    {
        $product = Product::where('id',$id)->firstOrFail();
        $subjects = Subject::all();
        $categories = Category::where('subject_id',$product->subcategory->category->subject->id)->get();
        $subcategories = SubCategory::where('category_id',$product->subcategory->category->id)->get();
        $abouts = AboutProduct::where('product_id',$id)->get();
        $details = DB::table('detail_product')->where('product_id',$id)->join('details','details.id','=','detail_product.detail_id')->get();
        $alldetails = Detail::where('subcategory_id',$product->subcategory->id)->get();
        return view('admin.edit_product' , compact('product','subjects','categories','subcategories','abouts','details','alldetails'));
    }
    public function destroy($id)
    {
        Product::where('id',$id)->delete();
        $products = Product::all();
        return view('admin.all_products',compact('products'));
    }

    public function result()
    {
        $products = DB::table('products')
            ->join('rates','products.id','=','rates.product_id')->get()->all();
        $image = Image::select('*')->get()->all();
        $images = array();
        $num = 1;
        foreach ($image as $img)
        {
            if($num==$img->product_id)
            {
                $images[$num]=$img->file;
                $num++;
            }
        }
        return view('result',['products'=>$products ,'image'=>$images]);
    }
    public function category($id)
    {

        SubCategory::where('category_id',$id)->firstOrFail();
        $sub_categories = SubCategory::where('category_id',$id)->get();
        $products = SubCategory::where('category_id',$id)->join('products','sub_categories.id','=','products.subcategory_id')->join('images' , function ($join){
            $join->on('products.id','=','images.product_id')->where('order',1);
        });
        $top_sales = $products->orderBy('sales','DESC')->take(4)->get();
        $rates = array();
        foreach($products->get() as $product)
        {
            $sum = Rate::where('product_id',$product->product_id)->sum('rate');
            $count = Rate::where('product_id',$product->product_id)->count();
            if($count==0)
            {
                $rates[$product->product_id] = 0;
            }
            else
            {
                $rates[$product->product_id] = $sum/$count;
            }
        }
        arsort($rates);
        $count = 0;
        $top_rates = array();
        foreach($rates as $key => $value)
        {
            $count++;
            if($count>=5)
            {
                break;
            }
            $top_rates[] = SubCategory::where('category_id',$id)->join('products','sub_categories.id','=','products.subcategory_id')
                ->join('images',function ($join){
                  $join->on('products.id','=','images.product_id')->where('order',1);
                })->where('product_id',$key)->firstOrFail();
        }

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
            if($count>=5)
            {
                break;
            }
            $top_favs[] = SubCategory::where('category_id',$id)->join('products','sub_categories.id','=','products.subcategory_id')
                ->join('images',function ($join){
                  $join->on('products.id','=','images.product_id')->where('order',1);
                })->where('product_id',$key)->firstOrFail();
        }
        return view('category',compact('sub_categories','top_sales','top_rates','top_favs'));
    }

    public function store(Request $request)
    {
        $request -> validate([
            'title'=>'required|min:5|max:100',
            'full_name'=>'required|min:5|max:200',
            'price'=>'required|integer',
            'quantity'=>'required|integer|min:0',
            'discount'=>'required|integer|min:0|max:100',
            'subcategory_id'=>'required|exists:sub_categories,id'
        ]);
        $product = new Product();
        $product->title = $request->input('title');
        $product->full_name = $request->input('full_name');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->discount = $request->input('discount');
        $product->subcategory_id = $request->input('subcategory_id');
        $product->save();

        for($i=1 ; $i<=$request->input('detailcounter') ; $i++)
        {
            DB::table('detail_product')->insert([
                'value'=>$request->input('detailvalue'.$i),
                'detail_id'=>$request->input('detail'.$i),
                'product_id'=>$product->id
            ]);
        }
        for($i=1 ; $i<=$request->input('aboutcounter') ; $i++)
        {
            DB::table('about_products')->insert([
                'text'=>$request->input('about'.$i),
                'product_id'=>$product->id
            ]);
        }
        return redirect(route('admin.image.create',['id'=>$product->id]));
    }

    public function create()
    {
        $products = Product::orderBy('id','desc')->limit(5)->get();
        return view('admin.add_product' , compact('products'));
    }
}
