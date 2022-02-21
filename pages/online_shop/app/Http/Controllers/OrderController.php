<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function select_address()
    {
        if(auth()->check())
        {
            $addresses = Address::where('user_id',auth()->user()->id)->get();
            return view('select_address',compact('addresses'));
        }
    }
    public function check()
    {
        $order = Order::where('user_id',auth()->user()->id)->where('state',0)->orderBy('id','desc')->firstOrFail();
        $final = DB::table('order_product')->where('order_id',$order->id)->get();
        $price = 0;

        $counts = array();
        foreach ($final as $product)
        {
            $price += ($product->quantity) * ($product->buy_price);
            $counts[$product->product_id] = $product->quantity;
        }

        $address = Address::where('id',$order->address_id)->firstOrFail();

        $products = DB::table('order_product')->where('order_id',$order->id)
            ->join('products','order_product.product_id','=','products.id')
            ->join('images',function ($join){
                $join->on('products.id','=','images.product_id')->where('order',1);
            })->get();

        return view('final_bill',compact('final','price','address','products','order','counts'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'date'=>'required|date|after:+3 days',
            'address'=>'required|exists:addresses,id'
        ]);
        $order = new Order();
        $order->deliver_time = $request->input('date');
        $order->address_id = $request->input('address');
        $order->user_id = auth()->user()->id;
        $order->state = 0;
        $order->save();
        $id = $order->id;

        $products = Cart::where('user_id',auth()->user()->id)->get();
        foreach ($products as $product)
        {
            DB::table('order_product')->insert([
                'order_id'=>$id,
                'product_id'=>$product->product_id,
                'quantity'=>$product->count,
                'buy_price'=>Product::where('id',$product->product_id)->firstOrFail()->price
            ]);
            $product->state=2;
            $product->save();
        }
        return $this->check();
    }

    public function order_done($order_id)
    {
        $order = Order::where('id',$order_id)->firstOrFail();
        $order->state = 1;

        $final = DB::table('order_product')->where('order_id',$order->id)->get();
        $price=0;
        foreach ($final as $product)
        {
            $price += ($product->quantity) * ($product->buy_price);
            $sale = Product::where('id',$product->product_id)->firstOrFail();
            $sale->sales = $sale->sales + $product->quantity;
            $sale->save();
        }

        $payment = new Payment();
        $payment->price = $price;
        $payment->save();


        $order->payment_id = $payment->id;
        $order->save();


        Cart::where('user_id',auth()->user()->id)->delete();

        return view('index');
    }

    public function new()
    {
        $orders = Order::where('state',1)->join('addresses','orders.address_id','=','addresses.id')
            ->join('payments','orders.payment_id','=','payments.id')->get();
        $orders2 = Order::where('state',1)->get();
        $allid = array();
        $count = 0;
        foreach ($orders2 as $order)
        {
            $allid[$count] = $order->id;
            $count++;
        }
        return view('admin.new_order',compact('orders','allid'));
    }

    public function onway()
    {
        $orders = Order::where('state',2)->join('addresses','orders.address_id','=','addresses.id')
            ->join('payments','orders.payment_id','=','payments.id')->get();
        $orders2 = Order::where('state',2)->get();
        $allid = array();
        $count = 0;
        foreach ($orders2 as $order)
        {
            $allid[$count] = $order->id;
            $count++;
        }

        return view('admin.onway_order',compact('orders','allid'));
    }

    public function deliverd()
    {
        $orders = Order::where('state',3)->join('addresses','orders.address_id','=','addresses.id')
            ->join('payments','orders.payment_id','=','payments.id')->get();
        $orders2 = Order::where('state',3)->get();
        $allid = array();
        $count = 0;
        foreach ($orders2 as $order)
        {
            $allid[$count] = $order->id;
            $count++;
        }

        return view('admin.deliverd_order',compact('orders','allid'));
    }

    public function show($order_id)
    {
        $order = Order::where('id',$order_id)->firstOrFail();
        $order_state = $order->state;
        $final = DB::table('order_product')->where('order_id',$order_id)->get();
        $price = 0;

        $counts = array();
        foreach ($final as $product)
        {
            $price += ($product->quantity) * ($product->buy_price);
            $counts[$product->product_id] = $product->quantity;
        }

        $address = Address::where('id',$order->address_id)->firstOrFail();

        $products = DB::table('order_product')->where('order_id',$order->id)
            ->join('products','order_product.product_id','=','products.id')
            ->join('images',function ($join){
                $join->on('products.id','=','images.product_id')->where('order',1);
            })->get();

        return view('admin.show_order',compact('final','price','address','products','order','counts','order_id','order_state'));
    }
    public function send($order_id)
    {
        $order = Order::where('id',$order_id)->firstOrFail();
        if($order->state==1)
        {
            $order->state = 2;
        }
        $order->save();
        return $this->onway();
    }

    public function deliver($order_id)
    {
        $order = Order::where('id',$order_id)->firstOrFail();
        if($order->state==2)
        {
            $order->state = 3;
        }
        $order->save();
        return $this->deliverd();
    }
}

